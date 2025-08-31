<?php 
if( isset($_FILES["imagem"])&& !empty($_FILES["imagem"]))
{
move_uploaded_file($_FILES["imagem"]["tmp_name"],"./img/".$_FILES["imagem"]["name"]);
echo "Upload realizado com sucesso";
}
?>
<h1>  Imagem </h1>
    <div class="row">
        <div class="col-md-4">
            <form action="./upload.php" method=post enctype="multipart/form-data"> 
                <label> Selecione a Imagem </label>
                <input type="file" name=imagem accept="image/*" class="form-control" />
                <button type="submit" class="btn btn-sucess"> Enviar imagem </button>
            </form>
        </div>
    </div>

