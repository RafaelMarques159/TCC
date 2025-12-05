<?php
// finalizar_compra.php
session_start();
include __DIR__ . '/config.php'; // ajuste se necessário

// Se não existe carrinho ou está vazio
if (!isset($_SESSION['carrinho']) || empty($_SESSION['carrinho'])) {
    header('Content-Type: text/html; charset=utf-8');
    echo '<!doctype html><html><head><meta charset="utf-8"><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"></head><body class="p-4">';
    echo '<div class="container"><div class="alert alert-info">Carrinho vazio.</div><a href="produtos.php" class="btn btn-primary">Voltar às compras</a></div></body></html>';
    exit;
}

// Extrai os IDs do carrinho (as chaves do array)
// Exemplo: $_SESSION['carrinho'][123] = ['id'=>123,...]
$ids = array_keys($_SESSION['carrinho']);
$ids = array_map('intval', $ids); // garante ints

if (empty($ids)) {
    echo "Carrinho inválido.";
    exit;
}

$ids_string = implode(",", $ids);

// Monta SQL — usa id_produto como sua coluna
$sql = "SELECT * FROM produtos WHERE id_produto IN ($ids_string)";
$result = $conn->query($sql);

if (!$result) {
    // mostra erro legível durante dev
    echo "Erro na query: " . $conn->error;
    exit;
}

// Prepara dados do carrinho: precisamos da quantidade de cada id
// $_SESSION['carrinho'][$id]['qtd']
$itens_mapa = [];
foreach ($_SESSION['carrinho'] as $k => $v) {
    $idint = intval($k);
    $itens_mapa[$idint] = [
        'qtd' => isset($v['qtd']) ? intval($v['qtd']) : 1
    ];
}

// Agora exibe a página com Bootstrap
?>
<!doctype html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<title>Finalizar Compra</title>
</head>
<body class="bg-light">
<div class="container my-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3">Finalizar Compra</h1>
        <a href="produtos.php" class="btn btn-secondary">Continuar Comprando</a>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table align-middle">
                    <thead>
                        <tr>
                            <th>Imagem</th>
                            <th>Produto</th>
                            <th>Preço Unit.</th>
                            <th>Quantidade</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $total = 0.0;
                        while ($row = $result->fetch_assoc()) {
                            $idp = intval($row['id_produto']);
                            $nome = htmlspecialchars($row['nome_produto'], ENT_QUOTES, 'UTF-8');
                            $preco = (float)$row['preco'];
                            $qtd = isset($itens_mapa[$idp]) ? $itens_mapa[$idp]['qtd'] : 1;
                            $subtotal = $preco * $qtd;
                            $total += $subtotal;

                            // imagem: se você salva com "./img/file.jpg" removemos "./"
                            $img_raw = $row['imagem'] ?? '';
                            $img = ltrim($img_raw, "./");
                            if (empty($img)) $img = "img/placeholder.png";
                            ?>
                            <tr>
                                <td style="width:80px;">
                                    <img src="<?php echo htmlspecialchars($img, ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo $nome; ?>" class="img-fluid rounded" style="width:70px;height:70px;object-fit:cover;">
                                </td>
                                <td><?php echo $nome; ?></td>
                                <td>R$ <?php echo number_format($preco,2,',','.'); ?></td>
                                <td><?php echo $qtd; ?></td>
                                <td>R$ <?php echo number_format($subtotal,2,',','.'); ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-between align-items-center mt-4">
                <div>
                    <a href="produtos.php" class="btn btn-outline-secondary">Voltar</a>
                    <a href="limpar_carrinho.php" class="btn btn-warning">Limpar Carrinho</a>
                </div>
                <div>
                    <strong class="me-3">Total: R$ <?php echo number_format($total,2,',','.'); ?></strong>
                    <form action="processar_compra.php" method="POST" class="d-inline">
                        <!-- Você pode enviar os dados necessários para processar a compra -->
                        <input type="hidden" name="total" value="<?php echo number_format($total,2,'.',''); ?>">
                        <button type="submit" class="btn btn-success">Finalizar Compra</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
</body>
</html>