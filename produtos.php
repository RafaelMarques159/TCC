<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include_once("config.php");

if (isset($_GET['add_carrinho'])) {

    $idProduto = intval($_GET['add_carrinho']);

    // se o carrinho não existe, cria
    if (!isset($_SESSION['carrinho'])) {
        $_SESSION['carrinho'] = [];
    }

    // se o produto já existe no carrinho, aumenta quantidade
    if (isset($_SESSION['carrinho'][$idProduto])) {
        $_SESSION['carrinho'][$idProduto]['qtd']++;
    } else {
        // buscar dados do produto
        $sqlProd = "SELECT * FROM produtos WHERE id_produto = $idProduto";
        $resProd = $conn->query($sqlProd);
        $produto = $resProd->fetch_object();

        // adicionar ao carrinho
        $_SESSION['carrinho'][$idProduto] = [
            "nome" => $produto->nome_produto,
            "preco" => $produto->preco,
            "qtd" => 1
        ];
    }

    header("Location: produtos.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css">
    <link rel="stylesheet" href="produtos.css">
    <title>Produtos</title>

</head>

<body>
    <header class="py-4 mb-3 border-bottom">
        <div class="container">
            <div class="row align-items-center justify-content-between py-3">

                <!-- Logo -->
                <div class="col-6 col-md-2 text-center text-md-start mb-2 mb-md-0">
                    <a href="" class="d-flex align-items-center link-body-emphasis text-decoration-none">
                        <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
                            <use xlink:href="#bootstrap" />
                        </svg>
                    </a>
                </div>

                <!-- Barra de Pesquisa -->
                <div class="col-12 col-md-6 mb-3 mb-md-0">
                    <form role="search">
                        <input type="search" class="form-control" placeholder="Pesquisar..." aria-label="Search">
                    </form>
                </div>

                <!-- Ícones de Navegação -->
                <div class="col-12 col-md-4 d-flex justify-content-around nav-icons mt-2 mt-md-0">

                    <!-- Minha Conta -->
                    <div class="dropdown nav-item position-relative">
                        <a href="#" class="text-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa-solid fa-user"></i><br><small>Minha Conta</small>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Perfil</a></li>
                            <li><a class="dropdown-item" href="#">Configurações</a></li>
                            <li><a class="dropdown-item" href="#">Sair</a></li>
                        </ul>
                    </div>

                    <!-- Serviço e Atendimento -->
                    <div class="dropdown nav-item position-relative">
                        <a href="#" class="text-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fas fa-headset"></i><br><small>Atendimento</small>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Suporte</a></li>
                            <li><a class="dropdown-item" href="#">FAQ</a></li>
                            <li><a class="dropdown-item" href="#">Fale Conosco</a></li>
                        </ul>
                    </div>

                    <!-- Carrinho -->
                    <div class="dropdown nav-item position-relative">
                        <a href="#" class="text-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fas fa-shopping-cart"></i>
                            <span class="cart-badge" id="contador-carrinho">0</span><br><small>Meu Carrinho</small>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Ver Carrinho</a></li>
                            <li><a class="dropdown-item" href="#">Finalizar Compra</a></li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>

        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav justify-content-center gap-xxl-5 w-100 mb-1 mb-lg-0">

                        <!-- Materiais Básicos -->
                        <li class="nav-item mx-4">
                            <div class="dropdown-center">
                                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                    Materiais Básicos
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Cimento</a></li>
                                    <li><a class="dropdown-item" href="#">Areia & Pedra</a></li>
                                    <li><a class="dropdown-item" href="#">Cal & Argamassa</a></li>
                                    <li><a class="dropdown-item" href="#">Blocos & Tijolos</a></li>
                                </ul>
                            </div>
                        </li>

                        <!-- Hidráulica -->
                        <li class="nav-item mx-4">
                            <div class="dropdown-center">
                                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                    Hidráulica
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Tubos PVC</a></li>
                                    <li><a class="dropdown-item" href="#">Torneiras</a></li>
                                    <li><a class="dropdown-item" href="#">Caixas d'Água</a></li>
                                    <li><a class="dropdown-item" href="#">Conexões</a></li>
                                </ul>
                            </div>
                        </li>

                        <!-- Elétrica -->
                        <li class="nav-item mx-4">
                            <div class="dropdown-center">
                                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                    Elétrica
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Fios & Cabos</a></li>
                                    <li><a class="dropdown-item" href="#">Interruptores</a></li>
                                    <li><a class="dropdown-item" href="#">Lâmpadas</a></li>
                                    <li><a class="dropdown-item" href="#">Quadro de Distribuição</a></li>
                                </ul>
                            </div>
                        </li>

                        <!-- Ferramentas -->
                        <li class="nav-item mx-4">
                            <div class="dropdown-center">
                                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                    Ferramentas
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Elétricas</a></li>
                                    <li><a class="dropdown-item" href="#">Manuais</a></li>
                                    <li><a class="dropdown-item" href="#">EPI & Segurança</a></li>
                                </ul>
                            </div>
                        </li>

                        <!-- Acabamento -->
                        <li class="nav-item mx-4">
                            <div class="dropdown-center">
                                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                    Acabamento
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Pisos</a></li>
                                    <li><a class="dropdown-item" href="#">Revestimentos</a></li>
                                    <li><a class="dropdown-item" href="#">Tintas</a></li>
                                    <li><a class="dropdown-item" href="#">Portas & Janelas</a></li>
                                </ul>
                            </div>
                        </li>

                    </ul>


                </div>
            </div>
        </nav>
    </header>

    <section class="py-5 overflow-hidden">
        <div class="container-lg">
            <div class="row">
                <div class="col-md-12">

                    <div class="section-header d-flex flex-wrap justify-content-between mb-5">
                        <h2 class="section-title">Categorias</h2>

                        <div class="d-flex align-items-center">
                            <a href="#" class="btn btn-primary me-2">Ver Tudo</a>
                            <div class="swiper-buttons">
                                <button class="swiper-prev category-carousel-prev btn btn-yellow">❮</button>
                                <button class="swiper-next category-carousel-next btn btn-yellow">❯</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="row">
                <div class="col-md-12">

                    <?php
                    include_once "config.php";

                    $sql = "SELECT * FROM categorias";
                    $res = $conn->query($sql);
                    ?>

                    <div class="category-carousel swiper">
                        <div class="swiper-wrapper">

                            <?php
                            if ($res && $res->num_rows > 0) {
                                while ($row = $res->fetch_object()) {

                                    // Proteção evitando HTML quebrado
                                    $img = htmlspecialchars($row->img_categoria, ENT_QUOTES, 'UTF-8');
                                    $nome = htmlspecialchars($row->nome_categoria, ENT_QUOTES, 'UTF-8');

                                    echo "
                                <a href='category.php?id={$row->id_categoria}' class='nav-link swiper-slide text-center'>
                                    
                                    <img src='{$img}' 
                                         class='rounded-circle'
                                         style='width:140px;height:140px;object-fit:cover;'
                                         alt='{$nome}'>

                                    <h4 class='fs-6 mt-3 fw-normal category-title'>
                                        {$nome}
                                    </h4>

                                </a>
                                ";
                                }
                            }
                            ?>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <div class="container my-4">
        <!-- Bloco centralizado com filtros + cards -->
        <div class="d-flex justify-content-center gap-4 flex-wrap">

            <!-- Coluna filtros -->
            <div class="col-md-3 col-lg-2 p-0">
                <div class="card">
                    <div class="card-body">
                        <h5 class="mb-3">Filtros</h5>

                        <form method="GET" action="produtos.php">

                            <!-- Categoria -->
                            <div class="mb-2">
                                <button
                                    class="btn btn-link w-100 text-start d-flex justify-content-between align-items-center"
                                    data-bs-toggle="collapse" data-bs-target="#categoria">
                                    Categoria
                                    <i class="bi bi-chevron-down"></i>
                                </button>


                                <div class="collapse show" id="categoria">
                                    <?php

                                    $sqlCat = "SELECT * FROM categorias ORDER BY nome_categoria";
                                    $resCat = $conn->query($sqlCat);

                                    if ($resCat && $resCat->num_rows > 0) {
                                        while ($cat = $resCat->fetch_object()) {
                                            $checked = "";
                                            if (!empty($_GET['categorias']) && in_array($cat->id_categoria, $_GET['categorias'])) {
                                                $checked = "checked";
                                            }
                                            echo "
                                <div class='form-check'>
                                <input class='form-check-input' name='categorias[]' type='checkbox' id='cat{$cat->id_categoria}' value='{$cat->id_categoria}' {$checked}>
                                <label class='form-check-label' for='cat{$cat->id_categoria}'>
                                {$cat->nome_categoria}
                                </label>
                                </div>";
                                        }
                                    } else {
                                        echo "<p class='text-muted'>Nenhuma categoria encontrada.</p>";
                                    }
                                    ?>
                                </div>
                            </div>


                            <!-- Subcategoria -->
                            <div class="mb-2">
                                <button
                                    class="btn btn-link w-100 text-start d-flex justify-content-between align-items-center"
                                    data-bs-toggle="collapse" data-bs-target="#subcategoria">
                                    Subcategoria
                                    <i class="bi bi-chevron-down"></i>
                                </button>
                                <div class="collapse" id="subcategoria">
                                    <p class="text-muted ms-3">Opções...</p>
                                </div>
                            </div>

                            <!-- Marca -->
                            <div class="mb-2">
                                <button
                                    class="btn btn-link w-100 text-start d-flex justify-content-between align-items-center"
                                    data-bs-toggle="collapse" data-bs-target="#marca">
                                    Marca
                                    <i class="bi bi-chevron-down"></i>
                                </button>
                                <div class="collapse" id="marca">
                                    <p class="text-muted ms-3">Opções...</p>
                                </div>
                            </div>

                            <!-- Botão buscar -->
                            <button type="submit" class="btn btn-primary w-100 mt-3">Buscar</button>

                        </form>
                    </div>
                </div>
            </div>


            <!-- Cards -->
            <div style="width: 48rem;">
                <div class="row g-3">
                    <!-- Primeira linha -->
                    <?php
                    // 🔵 MONTA A QUERY
                    $sql = "SELECT * FROM produtos";

                    if (!empty($_GET['categorias'])) {
                        // converte valores para inteiros e monta IN()
                        $cats = implode(",", array_map('intval', $_GET['categorias']));
                        $sql .= " WHERE categoria_id IN ($cats)";
                    }

                    // 🔵 Executa a query
                    $res = $conn->query($sql);

                    if ($res->num_rows > 0) {
                        while ($row = $res->fetch_object()) {

                            $limite = 123;
                            $descricaoCompleta = htmlspecialchars($row->descricao, ENT_QUOTES);
                            $descricaoCurta = substr($row->descricao, 0, $limite);

                            if (strlen($row->descricao) > $limite) {

                                $descricaoCortada = "
                            <span class='texto-curto'>{$descricaoCurta}...</span>
                            <span class='texto-completo d-none'>{$descricaoCompleta}</span>
                            <a href='#' class='toggle-text'>Ver mais</a>";
                            } else {
                                $descricaoCortada = $descricaoCompleta;
                            }

                            echo "
                    <div class='col-4'>
                        <div class='card'>
                            <img src='{$row->imagem}' class='card-img-top' alt='{$row->nome_produto}'>
                            <div class='card-body'>
                                <h5 class='card-title'>{$row->nome_produto}</h5>
                                <p class='card-text'>{$descricaoCortada}</p>
                                <p class='card-text'>R$ " . number_format($row->preco, 2, ',', '.') . "</p>
                                <button class='btn btn-success' onclick='addCarrinho({$row->id_produto})'>Adicionar ao Carrinho</button>
                            </div>
                        </div>
                    </div>";
                        }
                    } else {
                        echo "<p>Nenhum produto encontrado!</p>";
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>


    <!--inicio do rodape-->
    <!-- Footer -->
    <footer class="text-center text-lg-start text-dark" style="background-color: #ECEFF1">
        <!-- Section: Social media -->
        <section class="d-flex justify-content-between p-4 text-white" style="background-color: #21D192">
            <!-- Left -->
            <div class="me-5">
                <span>Conecte-se conosco nas redes sociais:</span>
            </div>
            <!-- Left -->

            <!-- Right -->
            <div>
                <a href="#" class="text-white me-4"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="text-white me-4"><i class="fab fa-twitter"></i></a>
                <a href="#" class="text-white me-4"><i class="fab fa-google"></i></a>
                <a href="#" class="text-white me-4"><i class="fab fa-instagram"></i></a>
                <a href="#" class="text-white me-4"><i class="fab fa-linkedin"></i></a>
                <a href="#" class="text-white me-4"><i class="fab fa-github"></i></a>
            </div>
            <!-- Right -->
        </section>
        <!-- Section: Social media -->

        <!-- Section: Links  -->
        <section class="">
            <div class="container text-center text-md-start mt-5">
                <!-- Grid row -->
                <div class="row mt-3">
                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                        <!-- Content -->
                        <h6 class="text-uppercase fw-bold">BELLA Construções</h6>
                        <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #7c4dff; height: 2px" />
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                    </div>

                    <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                        <h6 class="text-uppercase fw-bold">Departamentos</h6>
                        <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #7c4dff; height: 2px" />
                        <p><a href="#!" class="text-dark">Materiais de Construção</a></p>
                        <p><a href="#!" class="text-dark">Material Elétrico</a></p>
                        <p><a href="#!" class="text-dark">Iluminação</a></p>
                        <p><a href="#!" class="text-dark">Tintas e Impermeabilizantes</a></p>
                    </div>

                    <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                        <h6 class="text-uppercase fw-bold">Suporte</h6>
                        <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #7c4dff; height: 2px" />
                        <p><a href="#!" class="text-dark">Fale conosco</a></p>
                        <p><a href="#!" class="text-dark">Troca e Devolução</a></p>
                        <p><a href="#!" class="text-dark">Políticas de Entrega</a></p>
                        <p><a href="#!" class="text-dark">Sobre</a></p>
                    </div>

                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                        <h6 class="text-uppercase fw-bold">Contato</h6>
                        <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #7c4dff; height: 2px" />
                        <p><i class="fas fa-home mr-3"></i> Bangu</p>
                        <p><i class="fas fa-envelope mr-3"></i> Contato@gmail.com</p>
                        <p><i class="fas fa-phone mr-3"></i> (21) 4003-4456</p>
                        <p><i class="fas fa-print mr-3"></i> +01 234 567 89</p>
                    </div>
                </div>
                <!-- Grid row -->
            </div>
        </section>
        <!-- Section: Links  -->

        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
            © 2025 Company, Inc. All rights reserved.
        </div>
    </footer>
    <!-- Footer -->
















    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="js/jquery-1.11.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script src="js/descricao.js"></script>
    <script src="js/script.js"></script>
    <script>
        function atualizarCarrinho(dados) {
            document.getElementById("carrinho-itens").innerHTML = dados.html;
            document.getElementById("carrinho-total").innerText = dados.total;
        }
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {

            const btnCarrinho = document.querySelector(".fa-shopping-cart");
            const carrinho = document.getElementById("carrinho-lateral");
            const fecharBtn = document.getElementById("fecharCarrinho");

            if (btnCarrinho) {
                btnCarrinho.addEventListener("click", function() {
                    carrinho.classList.add("aberto");
                });
            }

            if (fecharBtn) {
                fecharBtn.addEventListener("click", function() {
                    carrinho.classList.remove("aberto");
                });
            }

        });
    </script>
    <script>
        function addCarrinho(id) {
            fetch("add_carrinho.php?id=" + id)
                .then(response => response.json())
                .then(data => {
                    if (data.success) {

                        // Atualiza contador do carrinho
                        document.getElementById("contador-carrinho").innerText = data.total_itens;

                        // Atualiza total
                        document.getElementById("carrinho-total").innerText = data.total_formatado;
                    }
                });
        }
    </script>
    <!-- Carrinho Lateral -->
    <div id="carrinho-lateral" class="carrinho-fechado">
        <div class="carrinho-header">
            <h5>Carrinho</h5>
            <button class="btn btn-sm btn-danger" id="fecharCarrinho">X</button>
        </div>

        <div id="carrinho-itens" class="p-2">
            <?php
            $total = 0;
            if (isset($_SESSION['carrinho']) && count($_SESSION['carrinho']) > 0) {
                $total = 0;
                foreach ($_SESSION['carrinho'] as $id => $item) {

                    // garante segurança e evita erros
                    $nome = htmlspecialchars($item['nome'] ?? 'Produto', ENT_QUOTES, 'UTF-8');
                    $preco_val = (float)($item['preco'] ?? 0);
                    $qtd = (int)($item['qtd'] ?? 1);
                    $subtotal_val = $preco_val * $qtd;
                    $total += $subtotal_val;
                    $preco = number_format($preco_val, 2, ',', '.');
                    $subtotal = number_format($subtotal_val, 2, ',', '.');

                    // pega caminho salvo no banco
                    $imagem_raw = $item['imagem'] ?? '';

                    // REMOVE './' DO COMEÇO → EX: "./img/imagem.jpg" vira "img/imagem.jpg"
                    $img = ltrim($imagem_raw, "./");

                    // se ficar vazio, usa placeholder
                    if (empty($img)) {
                        $img = "img/placeholder.png";
                    }

                    echo "
    <div class='item-carrinho mb-3 d-flex align-items-center'>

        <img src='" . $img . "' 
             alt='" . $nome . "' 
             style='width:50px;height:50px;object-fit:cover;border-radius:5px;margin-right:10px;'>

        <div>
            <strong>" . $nome . "</strong><br>
            Preço: R$ " . $preco . "<br>
            Quantidade: " . $qtd . "<br>
            <small>Subtotal: R$ " . $subtotal . "</small>
        </div>

        <button onclick=\"removerItem($id)\" class='btn btn-sm btn-danger ms-2'>Remover</button>


    </div>
    ";
                }

                echo "<hr><strong>Total: R$ " . number_format($total, 2, ',', '.') . "</strong>";
            } else {
                echo "<p>Seu carrinho está vazio...</p>";
            }
            ?>
        </div> <!-- fecha carrinho-itens -->

        <div class="carrinho-footer">
            <strong>Total:</strong>
            R$ <span id="carrinho-total">
                <?php echo isset($total) ? number_format($total, 2, ',', '.') : '0,00'; ?>
            </span>

            <button onclick="limparCarrinho()" class="btn btn-warning w-100 mt-2">Limpar Carrinho</button>
            <a href="finalizar_compra.php" class="btn btn-success w-100 mt-2"> Finalizar Compra </a>

        </div> <!-- fecha carrinho-footer -->

    </div> <!-- AQUI sim fecha carrinho-lateral -->
    <script>
        function addCarrinho(id) {
            fetch("produtos.php?add_carrinho=" + id)
                .then(r => r.text())
                .then(() => {
                    alert("Produto adicionado ao carrinho!");
                });
        }
    </script>
    <script>
        function addCarrinho(id) {
            fetch("ajax_carrinho.php?action=add&id=" + id)
                .then(r => r.json())
                .then(data => {
                    atualizarCarrinho(data.carrinho);
                    atualizarContadorCarrinho(); // <—
                });
        }

        function removerItem(id) {
            fetch("ajax_carrinho.php?action=remove&id=" + id)
                .then(r => r.json())
                .then(data => {
                    atualizarCarrinho(data.carrinho);
                    atualizarContadorCarrinho(); // <—
                });
        }

        function limparCarrinho() {
            fetch("ajax_carrinho.php?action=clear")
                .then(r => r.json())
                .then(data => {
                    atualizarCarrinho(data.carrinho);
                    atualizarContadorCarrinho(); // <—
                });
        }

        function atualizarContadorCarrinho() {
            fetch("ajax_carrinho.php?action=count")
                .then(r => r.json())
                .then(data => {
                    document.getElementById("contador-carrinho").textContent = data.total_itens;
                });
        }

        function atualizarCarrinho(carrinho) {

            let div = document.getElementById("carrinho-itens");
            let total = 0;

            div.innerHTML = "";

            for (let id in carrinho) {

                let item = carrinho[id];
                let subtotal = item.preco * item.qtd;
                total += subtotal;

                div.innerHTML += `
            <div class='item-carrinho mb-3 d-flex align-items-center'>
                <img src='${item.imagem.replace("./","")}'
                     style='width:50px;height:50px;object-fit:cover;border-radius:5px;margin-right:10px;'>

                <div>
                    <strong>${item.nome}</strong><br>
                    Preço: R$ ${item.preco.toFixed(2).replace(".", ",")}<br>
                    Quantidade: ${item.qtd}<br>
                    <small>Subtotal: R$ ${subtotal.toFixed(2).replace(".", ",")}</small>
                </div>

                <button class='btn btn-sm btn-danger ms-2'
                        onclick='removerItem(${id})'>
                    Remover
                </button>
            </div>
        `;
            }

            document.getElementById("carrinho-total").innerText =
                total.toFixed(2).replace(".", ",");

        }
    </script>
</body>

</html>