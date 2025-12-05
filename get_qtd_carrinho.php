<?php
session_start();

$total = 0;

if (!empty($_SESSION['carrinho'])) {
    foreach ($_SESSION['carrinho'] as $item) {
        $total += $item['qtd'];
    }
}

echo $total;