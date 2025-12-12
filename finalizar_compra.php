<?php
// finalizar_compra.php
session_start();
include __DIR__ . '/config.php'; // ajuste se necessário

// Se não existe carrinho ou está vazio
if (!isset($_SESSION['carrinho']) || empty($_SESSION['carrinho'])) {
    header('Content-Type: text/html; charset=utf-8');
    echo '<!doctype html><html><head><meta charset="utf-8"><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"></head><body class="p-4">';
    echo '<div class="container"><div class="alert alert-info">Carrinho vazio.</div><a href="produtos.php" class="btn btn-primary">Voltar às compras</a></div></body></html>';
    exit;
}

// Extrai os IDs do carrinho (as chaves do array)
// Exemplo: $_SESSION['carrinho'][123] = ['id'=>123,...]
$ids = array_keys($_SESSION['carrinho']);
$ids = array_map('intval', $ids); // garante ints

if (empty($ids)) {
    echo "Carrinho inválido.";
    exit;
}

$ids_string = implode(",", $ids);

// Monta SQL — usa id_produto como sua coluna
$sql = "SELECT * FROM produtos WHERE id_produto IN ($ids_string)";
$result = $conn->query($sql);

if (!$result) {
    // mostra erro legível durante dev
    echo "Erro na query: " . $conn->error;
    exit;
}

// Prepara dados do carrinho: precisamos da quantidade de cada id
// $_SESSION['carrinho'][$id]['qtd']
$itens_mapa = [];
foreach ($_SESSION['carrinho'] as $k => $v) {
    $idint = intval($k);
    $itens_mapa[$idint] = [
        'qtd' => isset($v['qtd']) ? intval($v['qtd']) : 1
    ];
}

// Agora exibe a página com Bootstrap
?>
<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="finalizar.css">
    <title>Finalizar Compra</title>
</head>

<body class="bg-light">
    <header class="py-4 mb-3 border-bottom">
        <div class="container">
            <div class="row align-items-center justify-content-between py-3">

                <!-- Logo -->
                <div class="col-6 col-md-2 text-center text-md-start mb-2 mb-md-0">
                    <a href="http://localhost/TCC/FrontLoja.php" class="d-flex align-items-center link-body-emphasis text-decoration-none">
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
    <div class="container my-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3">Finalizar Compra</h1>
            <a href="produtos.php" class="btn btn-secondary">Continuar Comprando</a>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table align-middle">
                        <thead>
                            <tr>
                                <th>Imagem</th>
                                <th>Produto</th>
                                <th>Preço Unit.</th>
                                <th>Quantidade</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $total = 0.0;
                            while ($row = $result->fetch_assoc()) {
                                $idp = intval($row['id_produto']);
                                $nome = htmlspecialchars($row['nome_produto'], ENT_QUOTES, 'UTF-8');
                                $preco = (float)$row['preco'];
                                $precoFinal = $preco;

                                if (!empty($row['desconto']) && $row['desconto'] > 0) {
                                $valorDesc = $preco * ($row['desconto'] / 100);
                                $precoFinal = $preco - $valorDesc;
                                }

                                $qtd = isset($itens_mapa[$idp]) ? $itens_mapa[$idp]['qtd'] : 1;
                                $subtotal = $preco * $qtd;
                                $subtotal = $precoFinal * $qtd;


                                // imagem: se você salva com "./img/file.jpg" removemos "./"
                                $img_raw = $row['imagem'] ?? '';
                                $img = ltrim($img_raw, "./");
                                if (empty($img)) $img = "img/placeholder.png";
                            ?>
                                <tr>
                                    <td style="width:80px;">
                                        <img src="<?php echo htmlspecialchars($img, ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo $nome; ?>" class="img-fluid rounded" style="width:70px;height:70px;object-fit:cover;">
                                    </td>
                                    <td><?php echo $nome; ?></td>
                                    <td>R$ <?php echo number_format($precoFinal, 2, ',', '.'); ?></td>
                                    <td><?php echo $qtd; ?></td>
                                    <td>R$ <?php echo number_format($subtotal, 2, ',', '.'); ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <!-- --- INÍCIO: formulário do comprador --- -->
                <form action="processar_compra.php" method="POST">

                    <h5>Dados do comprador</h5>

                    <!-- Usuário existente -->
                    <div class="mb-2">
                        <label for="usuario_existente" class="form-label">Usuário existente</label>
                        <select class="form-select" id="usuario_existente" name="usuario_id">
                            <option value="">-- Selecionar --</option>
                            <?php
                            $resUsuarios = $conn->query("SELECT id, nome FROM usuarios ORDER BY nome");
                            if ($resUsuarios && $resUsuarios->num_rows > 0) {
                                while ($u = $resUsuarios->fetch_assoc()) {
                                    echo "<option value='" . intval($u['id']) . "'>" . htmlspecialchars($u['nome'], ENT_QUOTES, 'UTF-8') . "</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <small class="text-muted">Ou cadastre novo comprador abaixo:</small>
                    </div>

                    <div class="row g-2">
                        <div class="col-md-6">
                            <label class="form-label">Nome</label>
                            <input type="text" name="novo_nome" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">E-mail</label>
                            <input type="email" name="novo_email" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Senha</label>
                            <input type="password" name="novo_senha" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Data de Nascimento</label>
                            <input type="date" name="novo_data_nasc" class="form-control">
                        </div>
                    </div>

                    <hr class="my-4">

                    <div class="d-flex justify-content-between">
                        <div>
                            <a href="produtos.php" class="btn btn-outline-secondary">Voltar</a>
                            <a href="limpar_carrinho.php" class="btn btn-warning">Limpar Carrinho</a>
                        </div>

                        <div>
                            <input type="hidden" name="total" value="<?php echo number_format($total, 2, '.', ''); ?>">
                            <button type="submit" class="btn btn-success btn-lg">Finalizar Compra</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
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
</body>

</html>