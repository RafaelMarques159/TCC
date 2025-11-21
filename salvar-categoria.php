<?php
    switch($_REQUEST["acao"]){
    case'cadastrar':
        $nome_categoria=$_POST["nome_categoria"];



        $sql ="INSERT INTO categorias(nome_categoria) VALUES('{$nome_categoria}')";

        $res=$conn->query($sql);
        if($res==true){
            print"<script>alert('Cadastrado com sucesso!');</script>";
            print"<script>location.href='?page=cat_listar';</script>";

        }else{
            print"<script>alert('Nao foi possivel cadastrar');</script>";
            print"<script>location.href='?page=cat_listar';</script>";
        }
        break;

    case'editar':
        $nome_categoria=$_POST["nome_categoria"];
        $sql = "UPDATE categorias SET
        nome_categoria='{$nome_categoria}' 
        WHERE id_categoria=".$_REQUEST["id_categoria"];

        $res=$conn->query($sql);
        if($res==true){
            print"<script>alert('Editado com sucesso!');</script>";
            print"<script>location.href='?page=cat_listar';</script>";

        }else{
            print"<script>alert('Nao foi possivel editar');</script>";
            print"<script>location.href='?page=cat_listar';</script>";
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