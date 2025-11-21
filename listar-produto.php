
<h1>Listar Produto</h1>
    <?php
    $sql = "SELECT p.*, c.nome_categoria 
        FROM produtos p
        LEFT JOIN categorias c ON p.categoria_id = c.id_categoria";
    
    $res= $conn->query($sql);
    
    if(!$res){
    echo "Erro na query: " . $conn->error;
    exit;
}
    $qtd = $res-> num_rows;

    if($qtd > 0){
        print"<table class='table table-hover table-striped table-bordered'>";
            print"<tr>";
            print"<th>#</th>";
            print"<th>Nome</th>";
            print"<th>Preço</th>";
            print"<th>Descrição</th>";
            print"<th>Em Estoque</th>";
            print"<th>Categoria</th>";
            print"<th>Imagem</th>";
            print"<th>Acoes</th>";
            print"</tr>";

        while($row = $res->fetch_object()){
            print"<tr>";
            print"<td>".$row->id_produto;"</td>";
            print"<td>".$row->nome_produto;"</td>";
            print "<td>R$ " . number_format($row->preco, 2, ',', '.') . "</td>";
            print"<td>".$row->descricao;"</td>";
            print"<td>".$row->quantidade;"</td>";
            print "<td>".$row->nome_categoria."</td>";
            print "<td><img src='".$row->imagem."' width='100' height='100'></td>";



            print"<td>
            <button onclick =\"location.href='?page=prod_editar&id_produto=".$row->id_produto."';\" class='btn btn-success'> Editar </button>

            <button onclick =\"if(confirm('Tem certeza que deseja excluir?')){location.href='?page=prod_salvar&acao=excluir&id_produto=".$row->id_produto."';}else{false}\" class='btn btn-danger'> Excluir </button>
            </td>";

            print"</tr>";


        }
        print"</table>";

    } else{
        print "<p class='alert alert-danger'>Não encontrou resultados!</p>";

    }
    ?>