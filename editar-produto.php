<h1>Editar Produto</h1>
<?php 
    $sql= "SELECT * FROM produtos WHERE id_produto=".$_REQUEST["id_produto"];
    $res = $conn->query($sql);
    $row = $res->fetch_object();
?>
    <form action="?page=prod_salvar" method="POST" enctype="multipart/form-data">
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
        <div class="mb-3">
            <label>Preço</label>
            <div class="input-group">
                <span class="input-group-text">R$</span>
                <input type="text" name="preco" value="<?php print $row->preco; ?>" class="form-control" required>
            </div>
        </div>
        <div class= "mb-3">
            <label>Quantidade</label>
            <input type="text" name="quantidade" value="<?php print $row->quantidade;?>" class="form-control">
        </div>
    <div class="mb-3">
        <label>Categoria</label>
        <select name="id_categoria" class="form-control" required>
            <option value="">Selecione uma categoria</option>
            <?php
        include("config.php");
        $cat = $conn->query("SELECT * FROM categorias ORDER BY nome_categoria");
       while ($c = $cat->fetch_assoc()) {
            $selected = ($c['id_categoria'] == $row->categoria_id) ? "selected" : "";
            echo "<option value='{$c['id_categoria']}' $selected>{$c['nome_categoria']}</option>";
    }
        ?>
    </select>
    
    <div class="mb-3">
        <label>Desconto:</label>
        <select name="desconto" required>
        <option value="0" selected>Nenhum desconto</option>  
    <?php for($i = 8; $i <= 30; $i++): ?>
        <option value="<?= $i ?>"><?= $i ?>%</option>
    <?php endfor; ?>
</select>
    </div>

    <br>
    <div class="mb-3">
    <label>Imagem</label>

    <div style="display:flex; align-items:center; gap:20px;">

        <!-- Input de arquivo (cresce normalmente) -->
        <input type="file" name="imagem" class="form-control" accept="image/*"
               style="flex-grow:1;">

        <!-- Imagem pequena ao lado, sem esmagar -->
        <img src="<?php echo $row->imagem; ?>"
             style="width:90px; height:auto; border:1px solid #ccc; padding:3px; border-radius:5px; flex-shrink:0;">
    </div>
</div>
        <div class= "mb-3">
            <button type="submit" class="btn btn-primary">Enviar</button> 
        </div>
        
    </form>