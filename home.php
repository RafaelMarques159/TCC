<?php
require_once("config.php");
$res = $conn->query("SELECT nome_produto, quantidade FROM produtos WHERE quantidade < 5");

// Total de produtos
$total_prod = $conn->query("SELECT COUNT(*) AS t FROM produtos")->fetch_assoc()['t'];

// Estoque baixo (ex: < 5)
$baixo_estoque = $conn->query("SELECT COUNT(*) AS e FROM produtos WHERE quantidade < 5")->fetch_assoc()['e'];

// Total categorias
$total_cat = $conn->query("SELECT COUNT(*) AS c FROM categorias")->fetch_assoc()['c'];
?>

<div class="container mt-5">

    <div class="alert alert-secondary text-center">
        <h2>Bem-vindo ao Sistema de Estoque</h2>
        <p>Use os atalhos abaixo para navegar rapidamente.</p>
    </div>

    <div class="row g-4">

        <div class="col-md-4">
            <div class="card p-3 text-center">
                <h4>Produtos</h4>
                <a href="?page=prod_listar" class="btn btn-primary mt-2">Listar</a>
                <a href="?page=prod_novo" class="btn btn-success mt-2">Adicionar</a>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card p-3 text-center">
                <h4>Categorias</h4>
                <a href="?page=cat_listar" class="btn btn-primary mt-2">Listar</a>
                <a href="?page=cat_nova" class="btn btn-success mt-2">Adicionar</a>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card p-3 text-center">
                <h4>Usuários</h4>
                <a href="?page=listar" class="btn btn-primary mt-2">Listar</a>
                <a href="?page=novo" class="btn btn-success mt-2">Adicionar</a>
            </div>
        </div>

    </div>

</div>

<div class="alert alert-info mt-4">
    <strong>Resumo do Sistema:</strong><br>
    Produtos cadastrados: <b><?= $total_prod ?></b><br>
    Produtos com estoque baixo: <b><?= $baixo_estoque ?></b><br>
    Categorias cadastradas: <b><?= $total_cat ?></b>
</div>

<div class="card mt-4">
    <div class="card-header bg-danger text-white">
        ⚠ Produtos com Estoque Baixo
    </div>
    <div class="card-body">
        <?php
        if ($res->num_rows > 0) {
            while ($p = $res->fetch_object()) {
                echo "<p><b>$p->nome_produto</b> — Apenas <b>$p->quantidade</b> unidades</p>";
            }
        } else {
            echo "Nenhum produto com estoque baixo.";
        }
        ?>
    </div>
</div>