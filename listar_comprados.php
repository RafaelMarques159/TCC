<h1>Lista de Compras Realizadas</h1>

<style>
td.descricao {
    max-width: 350px;
    height: 120px;
    overflow-y: auto;
    overflow-x: hidden;
    display: block;
    padding-right: 10px;
    white-space: normal !important;
}
</style>

<?php
$sql = "
    SELECT 
        ped.id_pedido,
        ped.criado_em,

        u.nome AS usuario_nome,
        u.email AS usuario_email,

        p.nome_produto,
        p.imagem,

        ip.quantidade,
        ip.preco_unit,
        ip.subtotal

    FROM pedidos ped
    INNER JOIN usuarios u ON ped.usuario_id = u.id
    INNER JOIN itens_pedido ip ON ped.id_pedido = ip.pedido_id
    INNER JOIN produtos p ON ip.produto_id = p.id_produto
    ORDER BY ped.id_pedido DESC;
";

$res = $conn->query($sql);

if (!$res) {
    echo "Erro na query: " . $conn->error;
    exit;
}

$qtd = $res->num_rows;

if ($qtd > 0) {

    print "<table class='table table-hover table-striped table-bordered'>";
    print "<tr>";
    print "<th>ID Pedido</th>";
    print "<th>Usuário</th>";
    print "<th>Email</th>";
    print "<th>Produto</th>";
    print "<th>Quantidade</th>";
    print "<th>Preço Unit.</th>";
    print "<th>Subtotal</th>";
    print "<th>Imagem</th>";
    print "</tr>";

    while ($row = $res->fetch_object()) {

        print "<tr>";
        print "<td>".$row->id_pedido."</td>";
        print "<td>".$row->usuario_nome."</td>";
        print "<td>".$row->usuario_email."</td>";
        print "<td>".$row->nome_produto."</td>";
        print "<td>".$row->quantidade."</td>";
        print "<td>R$ ".number_format($row->preco_unit,2,',','.')."</td>";
        print "<td>R$ ".number_format($row->subtotal,2,',','.')."</td>";
        print "<td><img src='".$row->imagem."' width='80' height='80'></td>";
        print "</tr>";
    }

    print "</table>";

} else {
    print "<p class='alert alert-danger'>Nenhuma compra registrada!</p>";
}
?>