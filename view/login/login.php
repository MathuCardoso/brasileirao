<?php

require_once(__DIR__ . "/../../controller/LoginController.php");

    if(isset($_POST['submetido'])){
        $usuario = $_POST['usuario'];
        $senha = $_POST['senha'];

        $loginCont = new LoginController();
        $loginCont->logar($usuario, $senha);

        echo $usuario . " - " . $senha;
    }
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap e CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel="shortcut icon" href="https://p2.trrsf.com/image/fget/cf/1200/1600/middle/images.terra.com/2023/02/18/919177108-brasileirao-a.jpg" type="image/x-icon">
    <title>Brasileirao</title>
</head>

<body>


    <div class="container">

        <div class="row">

            <div class="col-12">
                <h3>Login</h3>
            </div>

        </div>

        <div class="row">
            <div class="col-6 alert alert-info">

                <form method="post">
                    <div class="form-gorup">
                        <label for="txtUsuario">Usuário</label>
                        <input type="text" id="txtUsuario" class="form-control" name="usuario">
                    </div>

                    <div class="form-gorup">
                        <label for="txtSenha">Senha</label>
                        <input type="password" id="txtSenha" class="form-control" name="senha">
                    </div>

                        <input type="hidden" name="submetido">
                        <button class="btn btn-success">Enviar</button>
                </form>

            </div>

        </div>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>