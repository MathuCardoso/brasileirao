<?php
//Página view para listagem de alunos
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once(__DIR__ . "/../../controller/JogadorController.php");

$jogadorCont = new JogadorController();
$jogadores = $jogadorCont->listar();
//print_r($jogadores);

?>

<?php
require(__DIR__ . "/../../view/include/header.php");
?>

<h2 class="mt-4 text-center">Listagem de jogadores</h2>

<div>
    <a class="btn btn-primary mt-1 mb-3" href="inserir.php">Cadastrar jogador</a>
</div>

<div class="row">

    <?php foreach ($jogadores as $j) : ?>


        <div class="card mb-3 mx-auto p-2 rounded-4 text-bg-dark card-jogadores" data-id="<?= $j->getId() ?>" style="max-width: 300px; border: 5px solid black; height: max-content;">
                <div class="row text-center">
                    <div class="card-title">
                        <h4 class="card-title mb-0 fs-2 fw-bold parametro text-center"><?php echo $j->getNomeJogador(); ?></h4>
                    </div>
                    <div>
                        <img class="mt-4" style="width: 151px; height: 151px; border-radius: 50%;" src="<?php

                                                                                                            if ($j->getFoto() and $j->getFoto() != "./img/") {
                                                                                                                echo $j->getFoto();
                                                                                                            } else {
                                                                                                                echo "../../assets/74472.png";
                                                                                                            }
                                                                                                            ?>" class="img-fluid rounded-start">
                        <div class="outros text-center ">
                            <a class="text-info fs-5" href="alterar.php?idJogador=<?= $j->getId() ?>">Editar</a>
                            <a class="text-danger fs-5" href="excluir.php?idJogador=<?= $j->getId() ?>" onclick="return confirm('Confirma a exclusão?');">Excluir</a>
                        </div>
                    </div>
                </div>
        </div>

    <?php endforeach; ?>
</div>

<?php
require(__DIR__ . "/../include/footer.php");
?>

<script src="js/jogadores.js"></script>