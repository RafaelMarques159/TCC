<?php
session_start();
include_once "config.php";

$action = $_GET['action'] ?? null;
$id = intval($_GET['id'] ?? 0);

if (!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = [];
}

/* ================================
      ADICIONAR ITEM AO CARRINHO
=================================*/
if ($action === "add" && $id > 0) {

    $sql = "SELECT id_produto, nome_produto, preco, imagem 
            FROM produtos 
            WHERE id_produto = $id";

    $res = $conn->query($sql);
    $produto = $res->fetch_assoc();

    if ($produto) {
        if (!isset($_SESSION['carrinho'][$id])) {
            $_SESSION['carrinho'][$id] = [
                "nome"   => $produto["nome_produto"],
                "preco"  => (float)$produto["preco"],
                "qtd"    => 1,
                "imagem" => $produto["imagem"]
            ];
        } else {
            $_SESSION['carrinho'][$id]["qtd"]++;
        }
    }

    echo json_encode(["carrinho" => $_SESSION['carrinho']]);
    exit;
}

/* ================================
      REMOVER UM ITEM DO CARRINHO
=================================*/
if ($action === "remove" && $id > 0) {

    unset($_SESSION['carrinho'][$id]);

    echo json_encode(["carrinho" => $_SESSION['carrinho']]);
    exit;
}

/* ================================
      LIMPAR TODO O CARRINHO
=================================*/
if ($action === "clear") {

    unset($_SESSION['carrinho']);

    echo json_encode(["carrinho" => []]);
    exit;
}

/* ================================
      ATUALIZAR QUANTIDADE (NOVO)
=================================*/
if ($action === "update" && $id > 0) {

    $qtd = intval($_GET['qtd'] ?? 1);

    if ($qtd < 1) $qtd = 1; // nunca deixa ir abaixo de 1

    if (isset($_SESSION['carrinho'][$id])) {
        $_SESSION['carrinho'][$id]["qtd"] = $qtd;
    }

    echo json_encode(["carrinho" => $_SESSION['carrinho']]);
    exit;
}

/* ================================
      CONTAR ITENS NO CARRINHO
=================================*/
if ($action === "count") {

    $total = 0;

    if (isset($_SESSION['carrinho'])) {
        foreach ($_SESSION['carrinho'] as $item) {
            $total += $item["qtd"];
        }
    }

    echo json_encode(["total_itens" => $total]);
    exit;
}

/* ================================
      RESPOSTA PADRÃO (CASO TENHA FALTOU ACTION)
=================================*/
echo json_encode(["carrinho" => $_SESSION['carrinho']]);
exit;
