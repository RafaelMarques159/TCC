<h1>Listar Produto</h1>
    <?php
    $sql = "SELECT * FROM produtos";
    
    $res= $conn->query($sql);
    
    $qtd = $res-> num_rows;

    if($qtd > 0){
        print"<table class='table table-hover table-striped table-bordered'>";
            print"<tr>";
            print"<th>#</th>";
            print"<th>Nome</th>";
            print"<th>Preço</th>";
            print"<th>Descrição</th>";
            print"<th>Quantidade</th>";
            print "<th>Categoria</th>";
            print"<th>Imagem</th>";
            print"<th>Acoes</th>";
            print"</tr>";
        
    $categorias = [
        1 => "Acabamento",
        2 => "Coberturas",
        3 => "Elétricos",
        4 => "Hidráulicos",
        5 => "Estruturais",
        6=> "Ferramentas",
];
        while($row = $res->fetch_object()){
            print"<tr>";
            print"<td>".$row->id_produto;"</td>";
            print"<td>".$row->nome_produto;"</td>";
            print"<td>".$row->preco;"</td>";
            print"<td>".$row->descricao;"</td>";
            print"<td>".$row->quantidade;"</td>";
            $nomeCategoria = isset($categorias[$row->categoria]) ? $categorias[$row->categoria] : "Não definida"; 
            print"<td>".$nomeCategoria."</td>";            
            print "<td><img src='".$row->imagem."' width='100' height='100'></td>";



            print"<td>
            <button onclick =\"location.href='?page=prod_editar&id_produto=".$row->id_produto."';\" class='btn btn-success'> Editar </button>

            <button onclick =\"if(confirm('Tem certeza que deseja excluir?')){location.href='?page=prod_salvar&acao=excluir&id_produto=".$row->id_produto."';}else{false}\" class='btn btn-danger'> Excluir </button>
            </td>";

            print"</tr>";


        }
        print"</table>";

    } else{
        print "<p class='alert alert-danger'>Nao encontrou resultados!>";
    }
    ?>