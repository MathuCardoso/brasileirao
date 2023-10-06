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


        <div class="card mb-3 mx-auto p-2 rounded-4 text-bg-dark card-jogadores" style="max-width: 540px; border: 5px solid black; height: max-content;">
            <div class="row pr-0">
                <div class="col-md-4">
                    <img class="mt-4 p-3" style="width: 151px; height: 151px; border-radius: 50%;" src="<?php

                    if ($j->getFoto() and $j->getFoto() != "./img/") {
                        echo $j->getFoto();
                    } else {
                        echo "../../assets/74472.png";
                    }
                    ?>" class="img-fluid rounded-start">
                    <div class="outros text-center ">
                        <a class="text-info mr-1 fs-5" href="alterar.php?idJogador=<?= $j->getId() ?>">Editar</a>
                        <a class="text-danger ml-1 fs-5" href="excluir.php?idJogador=<?= $j->getId() ?>" onclick="return confirm('Confirma a exclusão?');">Excluir</a>
                    </div>
                </div>
                <div class="col-md-8 px-0">
                    <div class="card-title">
                        <h4 class="card-title mb-0 fs-2 fw-bold"><?php echo $j->getNomeJogador(); ?></h4>
                    </div>
                    <div class="card-body d-flex py-0 pl-0 pr-0 p-0">
                        <div class="card-body p-0">
                            <p class="card-text fw-bold mb-0 py-1 fs-5">Idade: <?php echo "<span class='fw-normal'>" . $j->getIdade() . "</span>"; ?></p>
                            <p class="card-text fw-bold mb-0 py-1 fs-5">Peso: <?php echo "<span class='fw-normal'>" . $j->getPeso() . "kg" . "</span>"; ?></p>
                            <p class="card-text fw-bold mb-0 py-1 fs-5">Altura: <?php echo "<span class='fw-normal'>" . $j->getAltura() . "cm" . "</span>"; ?></p>
                            <p class="card-text fw-bold mb-0 py-1 fs-5">Pé: <?php echo "<span class='fw-normal'>" . $j->getPe() . "</span>"; ?></p>
                        </div>
                        <div class="card-body ml-3 p-0">
                            <p class="card-text fw-bold mb-0 py-1 fs-5">Número: <?php echo "<span class='fw-normal'>" . $j->getNumero() . "</span>"; ?></p>
                            <p class="card-text fw-bold mb-0 py-1 fs-5">País: <?php echo "<span class='fw-normal'>" . $j->getPais() . "</span>"; ?></p>
                            <p class="card-text fw-bold mb-0 py-1 fs-5">Posicao: <?php echo "<span class='fw-normal'>" . $j->getPosicao() . "</span>"; ?></p>
                            <p class="card-text fw-bold mb-0 py-1 fs-5">Clube: <?php $clube = $j->getClube();
                                                                        if ($clube) {
                                                                            echo "<span class='fw-normal'>" . $clube->getNomeClube() . "</span>";
                                                                        } ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php endforeach; ?>
</div>


<?php
require(__DIR__ . "/../include/footer.php");
?>