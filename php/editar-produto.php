<h1>Editar Produto</h1>
<?php 
    $sql= "SELECT * FROM produtos WHERE id_produto=".$_REQUEST["id_produto"];
    $res = $conn->query($sql);
    $row = $res->fetch_object();
?>
    <form action="?page=prod_salvar" method="POST"> 
        <input type="hidden" name="acao" value="editar">
        <input type="hidden" name="id_produto" value="<?php
        print $row->id_produto; ?>">

        <div class= "mb-3">
         <label>Nome </label>   
         <input type="text" name= "nome_produto" value="<?php print $row->nome_produto;?>" class="form-control">
        </div>
        <div class= "mb-3">
            <label>Descricao</label>
            <input type="text" name="descricao" value="<?php print $row->descricao;?>" class="form-control">
        </div>
                <div class= "mb-3">
            <label>Preco</label>
            <input type="preco" name="preco" class="form-control" required>
        </div>
        <div class= "mb-3">
            <label>Quantidade</label>
            <input type="text" name="quantidade" value="<?php print $row->quantidade;?>" class="form-control">
        </div>
        <div class= "mb-3">
            <label>Imagem</label>
            <input type="file" name="imagem" class="form-control" accept="image/*">
        </div>
        <div class= "mb-3">
            <button type="submit" class="btn btn-primary">Enviar</button> 
        </div>
        
    </form>