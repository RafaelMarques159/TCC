<?php
session_start();
include_once "config.php";

$action = $_GET['action'] ?? null;
$id = intval($_GET['id'] ?? 0);

if (!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = [];
}

if ($action === "add" && $id > 0) {

    $sql = "SELECT id_produto, nome_produto, preco, imagem 
            FROM produtos 
            WHERE id_produto = $id";

    $res = $conn->query($sql);
    $produto = $res->fetch_assoc();

    if ($produto) {
        if (!isset($_SESSION['carrinho'][$id])) {
            $_SESSION['carrinho'][$id] = [
                "nome" => $produto["nome_produto"],
                "preco" => (float)$produto["preco"],
                "qtd"   => 1,
                "imagem"=> $produto["imagem"]
            ];
        } else {
            $_SESSION['carrinho'][$id]["qtd"]++;
        }
    }
}

if ($action === "remove" && $id > 0) {
    unset($_SESSION['carrinho'][$id]);
}

if ($action === "clear") {
    unset($_SESSION['carrinho']);
}

echo json_encode([
    "sucesso" => true,
    "carrinho" => $_SESSION['carrinho'] ?? []
]);

if ($_GET['action'] == 'count') {
    $total = 0;
    if (isset($_SESSION['carrinho'])) {
        foreach ($_SESSION['carrinho'] as $item) {
            $total += $item['qtd'];
        }
    }
    echo json_encode(['total_itens' => $total]);
    exit;
}