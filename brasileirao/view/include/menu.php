<?php
require_once(__DIR__ . "/../../util/config.php");
require_once(__DIR__ . "/../../controller/LoginController.php");


$loginCont = new LoginController();
$nomeUsuario = $loginCont->getNomeUsuario();

?>
<nav class="navbar navbar-expand-md navbar-light bg-primary">
    <a class="navbar-brand fs-3" href="<?= BASE_URL ?>/index.php">Brasileirão 2023</a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" 
            data-target="#navSite">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navSite">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link text-black" href="<?= BASE_URL ?>/index.php">Home</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-black" href="#" id="navDropDown" data-toggle="dropdown">Cadastros</a>
                <div class="dropdown-menu">
                    <a class="dropdown-item text-black" href="<?= BASE_URL ?>/view/jogadores/listar.php">Jogadores</a>
                    <a class="dropdown-item text-black" href="<?= BASE_URL ?>/view/clubes/listar.php">Clubes</a>
                </div>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-black" href="#" id="navDropDown" data-toggle="dropdown"><?php echo $nomeUsuario; ?></a>
                <div class="dropdown-menu">
                    <a class="dropdown-item text-black" href="<?= BASE_URL ?>/view/login/sair.php">Sair</a>
                </div>
            </li>

        </ul>
    </div>
</nav>