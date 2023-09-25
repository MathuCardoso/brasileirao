<?php
include_once(__DIR__ . "/view/include/header.php");
?>

<div class="row mt-3 justify-content-center">
    <div class="col-3">
        <a href="<?= BASE_URL ?>/view/jogadores/listar.php">
            <div class="card text-center mt-5 mb-4 pt-2">
                <img class="card-image-top mx-auto" src="https://static.vecteezy.com/system/resources/previews/001/199/877/original/silhouettes-soccer-png.png" style="max-width: 200px; height: auto;" />
                <div class="card-body">
                    <h5 class="card-title">Jogadores</h5>
                </div>
            </div>
        </a>
    </div>

    <div class="col-3">
        <a href="<?= BASE_URL ?>/view/clubes/listar.php">

            <div class="card text-center mt-5 mb-5">
                <img class="card-image-center mx-auto pt-5" src="https://imagepng.org/wp-content/uploads/2018/02/escudo-do-botafogo.png" style="max-width: 200px; height: auto;" />
                <div class="card-body">
                    <h5 class="card-title">Clubes</h5>
                </div>
            </div>
        </a>
    </div>
</div>

<?php
include_once(__DIR__ . "/view/include/footer.php");
?>