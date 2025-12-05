<?php
session_start();
include "config.php";

if (!isset($_SESSION['carrinho']) || empty($_SESSION['carrinho'])) {
    echo "Carrinho vazio!";
    exit;
}

foreach ($_SESSION['carrinho'] as $id => $item) {
    $id_produto = intval($id);
    $qtd = intval($item['qtd']);

    // Atualiza comprados E reduz a quantidade no estoque
    $sql = "UPDATE produtos 
            SET 
                comprados = comprados + $qtd,
                quantidade = quantidade - $qtd
            WHERE id_produto = $id_produto";

    $conn->query($sql);
}

// limpa carrinho
$_SESSION['carrinho'] = [];

header("Location: obrigado.php");
exit;