<?php
    switch($_REQUEST["acao"]){
    case'cadastrar':
        case 'cadastrar':
    $nome_categoria = $_POST["nome_categoria"];

    // upload
    if (!empty($_FILES["img_categoria"]["name"])) {
        $nomeArquivo = time() . "-" . basename($_FILES["img_categoria"]["name"]);
        $caminho = "imagescategoria/" . $nomeArquivo; // caminho salvo no DB
        $caminhoFisico = __DIR__ . "/imagescategoria/" . $nomeArquivo; // caminho real

        move_uploaded_file($_FILES["img_categoria"]["tmp_name"], $caminhoFisico);
    } else {
        $caminho = "";
    }

    $sql = "INSERT INTO categorias(nome_categoria, img_categoria)
            VALUES ('{$nome_categoria}', '{$caminho}')";

    $res = $conn->query($sql);

    if ($res == true) {
        print "<script>alert('Cadastrado com sucesso!');</script>";
        print "<script>location.href='?page=cat_listar';</script>";
    } else {
        print "<script>alert('Não foi possível cadastrar');</script>";
        print "<script>location.href='?page=cat_listar';</script>";
    }

    break;

    case 'editar':

    $id_categoria = intval($_POST["id_categoria"]);
    $nome_categoria = $_POST["nome_categoria"];

    // pega imagem atual
    $sql_img = "SELECT img_categoria FROM categorias WHERE id_categoria={$id_categoria}";
    $res_img = $conn->query($sql_img);
    $row_img = $res_img->fetch_object();
    $img_categoria = $row_img->img_categoria;

    // enviou nova imagem?
    if (!empty($_FILES["img_categoria"]["name"])) {
        $novoNome = time() . "-" . basename($_FILES["img_categoria"]["name"]);
        $destDB = "imagescategoria/" . $novoNome;      // o que salva no banco
        $destFS = __DIR__ . "/imagescategoria/" . $novoNome; // caminho físico

        if (move_uploaded_file($_FILES["img_categoria"]["tmp_name"], $destFS)) {
            $img_categoria = $destDB;
        }
    }

    // update
    $sql = "UPDATE categorias SET 
                nome_categoria='{$nome_categoria}', 
                img_categoria='{$img_categoria}'
            WHERE id_categoria={$id_categoria}";
    
    $res = $conn->query($sql);

    if ($res == true) {
        print "<script>alert('Editado com sucesso!');</script>";
        print "<script>location.href='?page=cat_listar';</script>";
    } else {
        print "<script>alert('Não foi possível editar');</script>";
        print "<script>location.href='?page=cat_listar';</script>";
    }

    break;

    case'excluir':
        
    $sql = "DELETE FROM categorias WHERE id_categoria=".$_REQUEST["id_categoria"];

     $res=$conn->query($sql);
        if($res==true){
            print"<script>alert('Excluido com sucesso!');</script>";
            print"<script>location.href='?page=cat_listar';</script>";

        }else{
            print"<script>alert('Nao foi possivel excluir');</script>";
            print"<script>location.href='?page=cat_listar';</script>";
        }

        break;    
    }