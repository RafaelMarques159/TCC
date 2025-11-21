<h1>Adicionar Produto</h1>
    <form action="?page=prod_salvar" method="POST" enctype="multipart/form-data"> 
        <input type="hidden" name="acao" value="cadastrar">
        <div class= "mb-3">
         <label>Nome </label>   
         <input type="text" name= "nome_produto" class="form-control">
        </div>
        <div class="mb-3">
            <label>Preço</label>
            <div class="input-group">
                <span class="input-group-text">R$</span>
                <input type="text" name="preco" class="form-control" required>
            </div>
                <div class= "mb-3">
            <label>Descrição</label>
            <input type="descricao" name="descricao" class="form-control">
        </div>
        <div class= "mb-3">
            <label>Quantidade</label>
            <input type="quantidade" name="quantidade" class="form-control">
        </div>

    <div class="mb-3">
    <label>Categoria</label>
    <select name="id_categoria" class="form-control" required>
        <option value="">Selecione uma categoria</option>
        <?php
        include("config.php");
        $cat = $conn->query("SELECT * FROM categorias ORDER BY nome_categoria");
        while ($c = $cat->fetch_assoc()) {
            echo "<option value='{$c['id_categoria']}'>{$c['nome_categoria']}</option>";
        }
        ?>
    </select>
    </div>
        <div class= "mb-3">
            <label>Imagem</label>
            <input type="file" name="imagem" class="form-control" accept="image/*">
        </div>
        <div class="mb-3 d-flex justify-content-center gap-3">
            <button type="submit" class="btn btn-primary">Enviar</button>
            <a href="?page=prod_listar" class="btn btn-secondary">Produtos Registrados</a>
        </div>
            </form>
        </div>
    </div>
        
    </form>