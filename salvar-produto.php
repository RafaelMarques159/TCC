<?php
    switch($_REQUEST["acao"]){
    case'cadastrar':
        $nome_produto=$_POST["nome_produto"];
        $preco=$_POST["preco"];
        $descricao=$_POST["descricao"];
        $quantidade=$_POST["quantidade"];
        $imagem=$_FILES["imagem"];

    if( isset($_FILES["imagem"]) && !empty($_FILES["imagem"]))
    {
    $imagem = "./img/".$_FILES["imagem"]["name"];
    move_uploaded_file($_FILES["imagem"]["tmp_name"] ,$imagem);
    }else{
        $imagem="";
    }

        $sql ="INSERT INTO produtos(nome_produto, preco, descricao, quantidade,imagem) VALUES('{$nome_produto}', '{$preco}', '{$descricao}', '{$quantidade}','{$imagem}')";

        $res=$conn->query($sql);
        if($res==true){
            print"<script>alert('Cadastrado com sucesso!');</script>";
            print"<script>location.href='?page=prod_listar';</script>";

        }else{
            print"<script>alert('Nao foi possivel cadastrar');</script>";
            print"<script>location.href='?page=prod_listar';</script>";
        }
        break;

    case'editar':
        $nome_produto=$_POST["nome_produto"];
        $preco=$_POST["preco"];
        $descricao=$_POST["descricao"];
        $quantidade=$_POST["quantidade"];

        
        $sql = "UPDATE produtos SET
        nome_produto='{$nome_produto}', 
        preco='{$preco}', 
        descricao='{$descricao}', 
        quantidade='{$quantidade}',
        imagem='{$imagem}'
        WHERE id_produto=".$_REQUEST["id_produto"];

        $res=$conn->query($sql);
        if($res==true){
            print"<script>alert('Editado com sucesso!');</script>";
            print"<script>location.href='?page=prod_listar';</script>";

        }else{
            print"<script>alert('Nao foi possivel editar');</script>";
            print"<script>location.href='?page=prod_listar';</script>";
        }

        break;

    case'excluir':
        
    $sql = "DELETE FROM produtos WHERE id_produto=".$_REQUEST["id_produto"];

     $res=$conn->query($sql);
        if($res==true){
            print"<script>alert('Excluido com sucesso!');</script>";
            print"<script>location.href='?page=prod_listar';</script>";

        }else{
            print"<script>alert('Nao foi possivel excluir');</script>";
            print"<script>location.href='?page=prod_listar';</script>";
        }

        break;    
    }