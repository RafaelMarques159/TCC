<?php
// processar_compra.php
session_start();
include_once __DIR__ . '/config.php';

if (!isset($_SESSION['carrinho']) || empty($_SESSION['carrinho'])) {
    header('Location: produtos.php');
    exit;
}

// obtém usuario: primeiro tenta usuario existente, senão tenta criar novo
$usuario_id = isset($_POST['usuario_id']) && $_POST['usuario_id'] !== '' ? intval($_POST['usuario_id']) : 0;

if ($usuario_id <= 0 && !empty($_POST['novo_nome'])) {
    // criar novo usuário
    $nome = $conn->real_escape_string($_POST['novo_nome']);
    $email = $conn->real_escape_string($_POST['novo_email'] ?? '');
    $senha_raw = $_POST['novo_senha'] ?? '';
    $data_nasc = !empty($_POST['novo_data_nasc']) ? $conn->real_escape_string($_POST['novo_data_nasc']) : null;

    // se quiser, hash da senha (recomendado)
    $senha_hash = !empty($senha_raw) ? password_hash($senha_raw, PASSWORD_DEFAULT) : null;

    $sqlIns = "INSERT INTO usuarios (nome, email, senha, data_nasc) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sqlIns);
    $stmt->bind_param('ssss', $nome, $email, $senha_hash, $data_nasc);
    if (!$stmt->execute()) {
        echo "Erro ao cadastrar usuário: " . $stmt->error;
        exit;
    }
    $usuario_id = $stmt->insert_id;
    $stmt->close();
}

// se ainda não tem usuario_id -> erro
if ($usuario_id <= 0) {
    echo "Selecione ou cadastre um usuário antes de finalizar.";
    exit;
}

// calcula total real (para garantir integridade)
$total = 0.0;
foreach ($_SESSION['carrinho'] as $id => $item) {
    $preco = (float)$item['preco'];
    $qtd = (int)$item['qtd'];
    $total += $preco * $qtd;
}

// Inicia transação
$conn->begin_transaction();

try {
    // 1) inserir pedido
    $sqlPedido = "INSERT INTO pedidos (usuario_id, total) VALUES (?, ?)";
    $stmt = $conn->prepare($sqlPedido);
    $stmt->bind_param('id', $usuario_id, $total);
    if (!$stmt->execute()) throw new Exception("Erro inserir pedido: " . $stmt->error);
    $pedido_id = $stmt->insert_id;
    $stmt->close();

    // 2) para cada item, inserir pedido_itens e atualizar produtos (comprados e quantidade)
    $sqlItem = "INSERT INTO itens_pedido (pedido_id, produto_id, quantidade, preco_unit, subtotal) VALUES (?, ?, ?, ?, ?)";
    $stmtItem = $conn->prepare($sqlItem);

    $sqlUpdate = "UPDATE produtos SET comprados = comprados + ?, quantidade = quantidade - ? WHERE id_produto = ? AND quantidade >= ?";
    $stmtUpdate = $conn->prepare($sqlUpdate);

    foreach ($_SESSION['carrinho'] as $prodId => $it) {
        $prodId = (int)$prodId;
        $qtd = (int)$it['qtd'];
        $preco = (float)$it['preco'];
        $subtotal = $preco * $qtd;

        // inserir item
        $stmtItem->bind_param('iiidd', $pedido_id, $prodId, $qtd, $preco, $subtotal);
        if (!$stmtItem->execute()) throw new Exception("Erro inserir item: " . $stmtItem->error);

        // atualizar produto: somar comprados e subtrair quantidade (somente se estoque suficiente)
        $stmtUpdate->bind_param('iiii', $qtd, $qtd, $prodId, $qtd);
        if (!$stmtUpdate->execute()) {
            throw new Exception("Erro atualizar produto: " . $stmtUpdate->error);
        }
        if ($stmtUpdate->affected_rows === 0) {
            // ou quantidade insuficiente, decide como tratar. Vamos abortar.
            throw new Exception("Estoque insuficiente para o produto ID $prodId");
        }
    }

    $stmtItem->close();
    $stmtUpdate->close();

    // 3) commit
    $conn->commit();

    // 4) limpar carrinho e redirecionar para obrigado
    $_SESSION['carrinho'] = [];
    header("Location: obrigado.php");
    exit;

} catch (Exception $e) {
    $conn->rollback();
    echo "Erro ao processar compra: " . $e->getMessage();
    // para depuração: echo $e->getTraceAsString();
    exit;
}