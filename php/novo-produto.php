<h1>Adicionar Produto</h1>
    <form action="?page=prod_salvar" method="POST" enctype="multipart/form-data"> 
        <input type="hidden" name="acao" value="cadastrar">
        <div class= "mb-3">
         <label>Nome </label>   
         <input type="text" name= "nome_produto" class="form-control">
        </div>
        <div class= "mb-3">
            <label>Preço</label>
            <input type="preco" name="preco" class="form-control">
        </div>
                <div class= "mb-3">
            <label>Descrição</label>
            <input type="descricao" name="descricao" class="form-control">
        </div>
        <div class= "mb-3">
            <label>Quantidade</label>
            <input type="quantidade" name="quantidade" class="form-control">
        </div>
        <div class= "mb-3">
            <label>Imagem</label>
            <input type="file" name="imagem" class="form-control" accept="image/*">
        </div>
         <div class= "mb-3">
            <button type="submit" class="btn btn-primary">Enviar</button> 
        </div>
            </form>
        </div>
    </div>
        
    </form>