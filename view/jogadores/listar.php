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


        <div class="card mb-3 mx-auto p-2 rounded-4 text-bg-dark card-jogadores" style="max-width: 540px; border: 5px solid black;">
            <div class="row pr-0">
                <div class="col-md-4">
                    <img src="https://cdn-icons-png.flaticon.com/512/74/74472.png" class="img-fluid rounded-start" alt="...">
                    <div class="outros text-center">
                        <a class="text-info mr-1" href="alterar.php?idJogador=<?= $j->getId() ?>">Editar</a>
                        <a class="text-danger ml-1" href="excluir.php?idJogador=<?= $j->getId() ?>" onclick="return confirm('Confirma a exclusão?');">Excluir</a>
                    </div>
                </div>
                <div class="col-md-8 px-0">
                    <div class="card-title">
                        <h4 class="card-title mb-0"><?php echo $j->getNomeJogador(); ?></h4>
                    </div>
                    <div class="card-body d-flex p-0">
                        <div class="card-body p-0">
                            <p class="card-text fw-bold mb-0">Idade: <?php echo "<span class='fw-normal'>" . $j->getIdade() . "</span>"; ?></p>
                            <p class="card-text fw-bold mb-0">Peso: <?php echo "<span class='fw-normal'>" . $j->getPeso() . "kg" . "</span>"; ?></p>
                            <p class="card-text fw-bold mb-0">Altura: <?php echo "<span class='fw-normal'>" . $j->getAltura() . "cm" . "</span>"; ?></p>
                            <p class="card-text fw-bold mb-0">Pé: <?php echo "<span class='fw-normal'>" . $j->getPe() . "</span>"; ?></p>
                        </div>
                        <div class="card-body ml-3 p-0">
                            <p class="card-text fw-bold mb-0">Número: <?php echo "<span class='fw-normal'>" . $j->getNumero() . "</span>"; ?></p>
                            <p class="card-text fw-bold mb-0">País: <?php echo "<span class='fw-normal'>" . $j->getPais() . "</span>"; ?></p>
                            <p class="card-text fw-bold mb-0">Posicao: <?php echo "<span class='fw-normal'>" . $j->getPosicao() . "</span>"; ?></p>
                            <p class="card-text fw-bold mb-0">Clube: <?php  $clube = $j->getClube();
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