<?php
    include_once "config.php";

    $acao = $_REQUEST["acao"] ?? '';

    $categorias = [
        1 => "Acabamento",
        2 => "Coberturas",
        3 => "Elétricos",
        4 => "Hidráulicos",
        5 => "Estruturais",
        6=> "Ferramentas",
        
];

    switch($_REQUEST["acao"]){
    case'cadastrar':
        $nome_produto=$_POST["nome_produto"];
        $preco=$_POST["preco"];
        $descricao=$_POST["descricao"];
        $quantidade=$_POST["quantidade"];
        $categoria=$_POST["categoria"];
        $imagem=$_FILES["imagem"];

    if( isset($_FILES["imagem"]) && !empty($_FILES["imagem"]))
    {
    $imagem = "./img/".$_FILES["imagem"]["name"];
    move_uploaded_file($_FILES["imagem"]["tmp_name"] ,$imagem);
    }else{
        $imagem="";
    }

        $sql ="INSERT INTO produtos(nome_produto, preco, descricao, quantidade,imagem,categoria) VALUES('{$nome_produto}', '{$preco}', '{$descricao}', '{$quantidade}','{$imagem}','{$categoria}')";

        $res=$conn->query($sql);
        if($res==true){
            print"<script>alert('Cadastrado com sucesso!');</script>";
            print"<script>location.href='?page=prod_listar';</script>";

        }else{
            echo "<pre>Erro ao cadastrar: " . $conn->error . "</pre>";

        }
        break;

    case 'editar':
    // pegar valores do formulário
    $nome_produto = $_POST["nome_produto"];
    $preco = $_POST["preco"];
    $descricao = $_POST["descricao"];
    $quantidade = $_POST["quantidade"];
    $categoria = $_POST["categoria"]; // pega o valor do select de categoria
    $id_produto = $_POST["id_produto"];

    // pega a imagem atual do DB para manter caso não envie nova
    $sql_img = "SELECT imagem FROM produtos WHERE id_produto = " . intval($id_produto);
    $res_img = $conn->query($sql_img);
    if ($res_img && $res_img->num_rows > 0) {
        $row_img = $res_img->fetch_object();
        $imagem = $row_img->imagem;
    } else {
        $imagem = ""; // fallback
    }

    // se foi enviado um novo arquivo, processa upload e sobrescreve $imagem
    if (isset($_FILES["imagem"]) && !empty($_FILES["imagem"]["name"])) {
        // ajusta o caminho conforme sua pasta (ex: "./img/" ou "imagens/")
        $novoNome = basename($_FILES["imagem"]["name"]);
        $destino = "./img/" . $novoNome;
        if (move_uploaded_file($_FILES["imagem"]["tmp_name"], $destino)) {
            $imagem = $destino;
        } else {
            // upload falhou — opcional: você pode die aqui ou continuar com imagem anterior
            // die("Falha ao enviar a imagem.");
        }
    }
    
    // monta o UPDATE incluindo a coluna categoria e imagem
    $sql = "UPDATE produtos SET
                nome_produto = '{$conn->real_escape_string($nome_produto)}',
                preco = '{$conn->real_escape_string($preco)}',
                descricao = '{$conn->real_escape_string($descricao)}',
                quantidade = '{$conn->real_escape_string($quantidade)}',
                imagem = '{$conn->real_escape_string($imagem)}',
                categoria = '{$conn->real_escape_string($categoria)}'
            WHERE id_produto = " . intval($id_produto);

    $res = $conn->query($sql);

    if ($res === TRUE) {
        print "<script>alert('Editado com sucesso!');</script>";
        print "<script>location.href='?page=prod_listar';</script>";
    } else {
        // mostra o erro real do MySQL (substitui a mensagem genérica)
        die("Erro ao editar: " . $conn->error . " -- SQL: " . htmlspecialchars($sql));
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
    