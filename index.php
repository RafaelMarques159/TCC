<!doctype html>
<html lang="pt-br" dir="ltr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.rtl.min.css" integrity="sha384-CfCrinSRH2IR6a4e6fy2q6ioOX7O6Mtm1L9vRvFZ1trBncWmMePhzvafv7oIcWiW" crossorigin="anonymous">

    <title> Cadastro</title>
  </head>
  <body>
     <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="?page=novo">Novo Usuário</a>
        </li>

        <!-- 
        <li class="nav-item">
          <a class="nav-link" href="?page=listar">Listar Usuários</a>
        </li>
        -->

        <li class="nav-item">
          <a class="nav-link" href="?page=prod_novo">Adicionar Produto</a>
        </li>

        <!--
        <li class="nav-item">
          <a class="nav-link" href="?page=prod_listar">Listar Produto</a>
        </li>
        -->

        <li class="nav-item">
          <a class="nav-link" href="?page=cat_nova">Adicionar Categorias</a>
        </li>

        <!--
        <li class="nav-item">
          <a class="nav-link" href="?page=cat_listar">Listar Categorias</a>
        </li>
        -->
        
      </ul> 
    </div>
  </div>
</nav>

<div class="container">
  <div class="row">
    <div class="col mt-5">
      <?php
    include("config.php");
    switch(@$_REQUEST["page"]){

        // Cases Usuario
        case "novo":
          include("novo-usuario.php");
        break;
        case "listar":
          include("listar-usuario.php");
        break;
        case "salvar":
          include("salvar-usuario.php");
        break;
        case "editar":
          include("editar-usuario.php");
        break;
        
          // Cases Produtos
        case "prod_novo":
          include("novo-produto.php");
        break;
        case "prod_listar":
          include("listar-produto.php");
        break;
        case "prod_salvar":
          include("salvar-produto.php");
        break;
        case "prod_editar":
          include("editar-produto.php");
        break;  
        // Cases Categorias
        case "cat_nova":
          include("nova-categoria.php");
        break;
        case "cat_listar":
          include("listar-categoria.php");
        break;
        case "cat_salvar":
          include("salvar-categoria.php");
        break;
        case "cat_editar":
          include("editar-categoria.php");
        break;  
        default:
          include("home.php");
}
?>
    </div>
  </div>
</div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js" integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y" crossorigin="anonymous"></script>
    -->
  </body>
</html>