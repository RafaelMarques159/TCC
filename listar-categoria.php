<h1>Listar Categorias</h1>

<?php

$sql = "SELECT * FROM categorias";
$res = $conn->query($sql);

if (!$res) {
    die("Erro na query: " . $conn->error);
}

$qtd = $res->num_rows;

if ($qtd > 0) {
 print "<div class='container mt-4'>"; 
 print "<div class='table-responsive'>";
 print"<table class='table table-hover table-striped'>";
    print "<tr>";
    print "<th>#</th>";
    print "<th>Nome da Categoria</th>";
    print "<th>Imagem</th>";
    print "<th></th>";
    print "</tr>";

    while ($row = $res->fetch_object()) {
        
        print "<tr>";
        print "<td>{$row->id_categoria}</td>";
        print "<td>{$row->nome_categoria}</td>";
        print "<td><img src='{$row->img_categoria}' width='100' height='100'></td>";
        print "<td>
                <button onclick=\"location.href='?page=cat_editar&id_categoria={$row->id_categoria}';\" class='btn btn-success'>Editar</button>
                <button onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='?page=cat_salvar&acao=excluir&id_categoria={$row->id_categoria}';}\" class='btn btn-danger'>Excluir</button>
              </td>";
        print "</tr>";
    }

    print "</table>";
    print "</div>"; // Fecha table-responsive
    print "</div>"; // Fecha container
} else {
    print "<p class='alert alert-danger'>Não encontrou resultados!</p>";
}
?>