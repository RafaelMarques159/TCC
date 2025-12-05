<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Compra Finalizada</title>

    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f8f9fa;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .card {
            padding: 30px;
            border-radius: 15px;
        }
        .check-icon {
            font-size: 80px;
            color: #28a745;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            
            <div class="card shadow text-center">
                
                <div class="check-icon mb-3">✔️</div>

                <h2 class="mb-3">Compra Finalizada!</h2>

                <p class="mb-4">
                    Obrigado por comprar conosco. Seu pedido foi processado com sucesso!
                </p>

                <a href="produtos.php" class="btn btn-success w-100">
                    Voltar à Loja
                </a>

            </div>

        </div>
    </div>
</div>

</body>
</html>