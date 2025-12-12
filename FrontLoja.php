<?php
include_once "config.php";
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css">
  <link rel="stylesheet" href="/TCC/Front.css">
  <title>Bella Contrucoes</title>

</head>

<body>
  <header class="py-4 mb-3 border-bottom">
    <div class="container">
      <div class="row align-items-center justify-content-between py-3">

        <!-- Logo -->
        <div style="max-width:140px;" class="col-6 col-md-2 text-center text-md-start mb-2 mb-md-0">
          <img src="imagensfront/logo.png" class="img-fluid logo-site" alt="Logo da loja">
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
              <span class="cart-badge">0</span><br><small>Meu Carrinho</small>
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Ver Carrinho</a></li>
              <li><a class="dropdown-item" href="#">Finalizar Compra</a></li>
            </ul>
          </div>

        </div>
      </div>
    </div>

    </div>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
                  <li><a class="dropdown-item" href="http://localhost/TCC/produtos.php">Cimento</a></li>
                  <li><a class="dropdown-item" href="http://localhost/TCC/produtos.php">Areia & Pedra</a></li>
                  <li><a class="dropdown-item" href="http://localhost/TCC/produtos.php">Cal & Argamassa</a></li>
                  <li><a class="dropdown-item" href="http://localhost/TCC/produtos.php">Blocos & Tijolos</a></li>
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

            <!-- Admin -->
            <li class="nav-item mx-4">
              <div class="dropdown-center">
                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                  Admin
                </button>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="index.php">Sistema</a></li>
                </ul>
              </div>
            </li>

          </ul>


        </div>
      </div>
    </nav>
  </header>

  <!-- Carrossel Inicio -->
  <div class="d-flex justify-content-center">
    <div id="carouselExampleCaptions" class="carousel carousel-dark slide carousel-fixed-height">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
          aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
          aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
          aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="/TCC/imagensfront/bannersuvinil.png" class="d-block w-100" alt="banner suvinil">
          <div class="carousel-caption d-none d-md-block">

          </div>
        </div>
        <div class="carousel-item">
          <img src="/TCC/imagensfront/banner.jpg" class="d-block w-100" alt="banner de construcao">
          <div class="carousel-caption d-none d-md-block">

          </div>
        </div>
        <div class="carousel-item">
          <img src="/TCC/imagensfront/bannereletrica.png" class="d-block w-100" alt="banner eletrica">
          <div class="carousel-caption d-none d-md-block">

          </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
        data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
        data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </div>
  <!--cards inicio-->
  <div class="container my-5">
    <div class="row g-4 justify-content-center">

      <div class="col-12 col-sm-6 col-md-4 d-flex justify-content-center">
        <div class="card3">
          <img src="/TCC/imagensfront/3.png" class="card-img-top" alt="Entrega Rápida">
          <p class="card-title3">Entrega rápida</p>
          <p class="card-body3">Receba seu material no mesmo dia (consulte região).</p>
        </div>
      </div>

      <div class="col-12 col-sm-6 col-md-4 d-flex justify-content-center">
        <div class="card3">
          <img src="/TCC/imagensfront/1.png" class="card-img-top" alt="Qualidade garantida">
          <p class="card-title3 ">Qualidade Garantida</p>
          <p class="card-body3">Marcas aprovadas por profissionais da construção.</p>
        </div>
      </div>

      <div class="col-12 col-sm-6 col-md-4 d-flex justify-content-center">
        <div class="card3">
          <img src="/TCC/imagensfront/2.png" class="card-img-top" alt="Compra Segura">
          <p class="card-title3">Compra Segura</p>
          <p class="card-body3">Pagamento protegido, sua compra sem dor de cabeça.</p>
        </div>
      </div>

    </div>
  </div>
<section class="py-5 overflow-hidden">
    <div class="container-lg container-ajuste">
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

                  // Marca categoria ativa se estiver no filtro (GET)
                  $ativo = (!empty($_GET['categorias']) && in_array($row->id_categoria, $_GET['categorias']))
                    ? "categoria-ativa"
                    : "";
                  echo "
                                <a href='produtos.php?categorias[]={$row->id_categoria}' class='nav-link swiper-slide text-center categoria-item {$ativo}'>
                                    
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


  <div id="carouselExample" class="carousel slide" data-bs-interval="false">
    <div class="carousel-inner">

      <!-- ===== SLIDE 1 ===== -->
      <div class="carousel-item active">
        <div class="cards-wrapper">

          <!-- CARD 1 -->
          <div class="card2">
            <img src="/TCC/imagensfront/piso vinilico.png" alt="piso vinilico">

            <div class="card-body">
              <h5 class="card-title">Piso Vinílico 0,7mm 98104-8 Fosco M²</h5>

              <p class="card-text">
                <span class="card-old-price">R$ 399,98</span>
                <span class="card-discount">-25%</span><br>

                <span class="card-price">R$ 299,98 /caixa</span><br>

                <span class="card-parcel">em até 2x sem juros de R$ 149,99</span>
              </p>

              <a href="#" class="btn-primary add-btn">
                ADICIONAR
                <i class="bi bi-cart"></i>
              </a>
            </div>
          </div>

          <!-- CARD 2 -->
          <div class="card2 d-none d-md-block">
            <img src="/TCC/imagensfront/bica.png" alt="bica Inox">

            <div class="card-body">
              <h5 class="card-title">Torneira para Cozinha de Parede Em Aço Inox 304</h5>

              <p class="card-text">
                <span class="card-old-price">R$ 259,99</span>
                <span class="card-discount">-15%</span><br>

                <span class="card-price">R$ 199,90</span><br>

                <span class="card-parcel">em até 2x de R$ 99,95</span>
              </p>

              <a href="#" class="btn-primary add-btn">
                ADICIONAR
                <i class="bi bi-cart"></i>
              </a>
            </div>
          </div>

          <!-- CARD 3 -->
          <div class="card2 d-none d-md-block">
            <img src="/TCC/imagensfront/telha.png" alt="Produto">

            <div class="card-body">
              <h5 class="card-title">Telha De PVC Colonial 3,94x0,86 Cerâmica</h5>

              <p class="card-text">
                <span class="card-old-price">R$ 189,90</span>
                <span class="card-discount">-10%</span><br>

                <span class="card-price">R$ 169,99/Cada</span><br>

                <span class="card-parcel">em até 2x de R$ 84,99</span>
              </p>

              <a href="#" class="btn-primary add-btn">
                ADICIONAR
                <i class="bi bi-cart"></i>
              </a>
            </div>
          </div>

          <!-- CARD 4 -->
          <div class="card2 d-none d-md-block">
            <img src="/TCC/imagensfront/carrinhodemao.png" alt="carrinho de mao">

            <div class="card-body">
              <h5 class="card-title">Carrinho de Mão Tramontina Extra Forte - 80L/120kg</h5>

              <p class="card-text">
                <span class="card-old-price">R$ 129,90</span>
                <span class="card-discount">-20%</span><br>

                <span class="card-price">R$ 99,99</span><br>

                <span class="card-parcel">em até 2x de R$ 49,99</span>
              </p>

              <a href="#" class="btn-primary add-btn">
                ADICIONAR
                <i class="bi bi-cart"></i>
              </a>
            </div>
          </div>

        </div>
      </div>

      <!-- ===== SLIDE 2 ===== -->
      <div class="carousel-item">
        <div class="cards-wrapper">

          <div class="card2">
            <img src="/TCC/imagensfront/bomba.png" alt="Bomba d'Água">

            <div class="card-body">
              <h5 class="card-title">Vazão de 2400L/h - Motor 1/2CV 127/220V</h5>

              <p class="card-text">
                <span class="card-old-price">R$ 499,99</span>
                <span class="card-discount">-30%</span><br>

                <span class="card-price">R$ 349,90</span><br>

                <span class="card-parcel">em até 3x de R$ 116,63</span>
              </p>

              <a href="#" class="btn-primary add-btn">
                ADICIONAR
                <i class="bi bi-cart"></i>
              </a>
            </div>
          </div>

          <div class="card2 d-none d-md-block">
            <img src="/TCC/imagensfront/chuveiro.png" alt="Chuveiro">

            <div class="card-body">
              <h5 class="card-title">Chuveiro elétrico maxi loren 220 3200W Lorenzetti</h5>

              <p class="card-text">
                <span class="card-old-price">R$ 299,90</span>
                <span class="card-discount">-12%</span><br>

                <span class="card-price">R$ 263,90</span><br>

                <span class="card-parcel">em até 2x de R$ 131,95</span>
              </p>

              <a href="#" class="btn-primary add-btn">
                ADICIONAR
                <i class="bi bi-cart"></i>
              </a>
            </div>
          </div>

          <div class="card2 d-none d-md-block">
            <img src="/TCC/imagensfront/quadroeletrico.png" alt="quadro eletrico">

            <div class="card-body">
              <h5 class="card-title">Quadro Distribuição Embutir Para 3/4 Disjuntor</h5>

              <p class="card-text">
                <span class="card-old-price">R$ 159,90</span>
                <span class="card-discount">-8%</span><br>

                <span class="card-price">R$ 146,90</span><br>

                <span class="card-parcel">em até 2x de R$ 73,45</span>
              </p>

              <a href="#" class="btn-primary add-btn">
                ADICIONAR
                <i class="bi bi-cart"></i>
              </a>
            </div>
          </div>

          <div class="card2 d-none d-md-block">
            <img src="/TCC/imagensfront/tijolo.png" alt="tijolo">

            <div class="card-body">
              <h5 class="card-title">Tijolo Cerâmico de Vedação 14x19x39CM</h5>

              <p class="card-text">
                <span class="card-old-price">R$ 89,99</span>
                <span class="card-discount">-18%</span><br>

                <span class="card-price">R$ 73,50</span><br>

                <span class="card-parcel">em até 2x de R$ 36,75</span>
              </p>

              <a href="#" class="btn-primary add-btn">
                ADICIONAR
                <i class="bi bi-cart"></i>
              </a>
            </div>
          </div>

        </div>
      </div>

    </div>

    <!-- CONTROLES DO CARROSSEL -->
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev"
      style="left: 18%;">
      <span class="carousel-control-prev-icon"></span>
    </button>

    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next"
      style="right: 18%;">
      <span class="carousel-control-next-icon"></span>
    </button>
  </div>

  
  <!--inicio do rodape-->
  <!-- Footer -->
  <footer class="text-center text-lg-start text-dark" style="background-color: #ECEFF1">
    <!-- Section: Social media -->
    <section class="d-flex justify-content-between p-4 text-white" style="background-color: #374151">
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











  <!-- Código para incluir o widget VLibras -->
  <div vw class="enabled">
    <div vw-access-button class="active"></div>
    <div vw-plugin-wrapper>
      <div class="vw-plugin-top-wrapper"></div>
    </div>
  </div>
  <script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>
  <script>
    new window.VLibras.Widget('https://vlibras.gov.br/app');
  </script>
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
  <script src="js/jquery-1.11.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
  <script src="js/script.js"></script>
</body>

</html>