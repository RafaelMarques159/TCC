<h1>Adicionar Categoria</h1>
<form action="?page=cat_salvar" method="POST" enctype="multipart/form-data"> 
    <input type="hidden" name="acao" value="cadastrar">

    <div class="mb-3">
        <label>Digite o nome da Categoria</label>
        <input type="text" name="nome_categoria" class="form-control">
    </div>

    <div class="mb-3">
        <label>Imagem da Categoria</label>
        <input type="file" name="img_categoria" class="form-control">
    </div>

    <div class="mb-3 d-flex justify-content-center gap-3">
        <button type="submit" class="btn btn-primary">Enviar</button>
        <a href="?page=cat_listar" class="btn btn-secondary">Categorias Registradas</a>
    </div>
</form>
