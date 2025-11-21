<h1>Editar Categoria</h1>
<?php 
    $sql= "SELECT * FROM categorias WHERE id_categoria=".$_REQUEST["id_categoria"];
    $res = $conn->query($sql);
    $row = $res->fetch_object();
?>
    <form action="?page=cat_salvar" method="POST"> 
        <input type="hidden" name="acao" value="editar">
        <input type="hidden" name="id_categoria" value="<?php
        print $row->id_categoria; ?>">

        <div class= "mb-3">
         <label>Digite o nome da Categoria </label>   
         <input type="text" name="nome_categoria" value="<?php print $row->nome_categoria; ?>" class="form-control">
        </div>
        <div class= "mb-3">
            <button type="submit" class="btn btn-primary">Enviar</button> 
        </div>
    
    </form>