<?php 
//Página view para listagem de clube
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once(__DIR__ . "/../../controller/ClubeController.php");

$clubeCont = new ClubeController();
$clubes = $clubeCont->listar();
//print_r($alunos);
?>

<?php 
require(__DIR__ . "/../include/header.php");
?>

<h4>Listagem de clubes</h4>

<div>
    <a class="btn btn-success" href="inserir.php">Inserir</a>
</div>

<div class="row">

    <?php foreach ($clubes as $c) : ?>


        <div class="card mb-3 mx-auto p-2 rounded-4 text-bg-dark card-clubes col-md-6" style="max-width: 540px; border: 2px solid <?= $c->getCor2();?>;">

        <style>
            .card-clubes:hover{
                border: 2px solid white;
            }
        </style>
            <div class="row pr-0">
                <div class="col-md-4" style="text-align: center;">
                    <img src="../../assets/74472.png" class="img-fluid rounded-start">
                    <div class="outros text-center">
                        <a class="text-info mr-1" href="alterar.php?idJogador=<?= $c->getId() ?>">Editar</a>
                        <a class="text-danger ml-1" href="excluir.php?idJogador=<?= $c->getId() ?>" onclick="return confirm('Confirma a exclusão?');">Excluir</a>
                    </div>
                </div>
                <div class="col-md-8 px-0">
                    <div class="card-title">
                        <h4 class="card-title mb-0" style="color: <?= $c->getCor1();?>;"><?php echo $c->getNomeClube(); ?></h4>
                    </div>
                    <div class="card-body d-flex p-0">
                        <div class="card-body p-0">
                            <p class="card-text fw-bold mb-0">Iniciais: <?php echo "<span class='fw-normal'>" . $c->getIniciais() . "</span>"; ?></p>
                            <p class="card-text fw-bold mb-0">Técnico: <?php echo "<span class='fw-normal'>" . $c->getTecnico() ."</span>"; ?></p>
                            <p class="card-text fw-bold mb-0">Sede: <?php echo "<span class='fw-normal'>" . $c->getSede() . "</span>"; ?></p>
                            <p class="card-text fw-bold mb-0">Estádio: <?php  $estadio = $c->getEstadio();
                                                                        if ($estadio) {
                                                                            echo "<span class='fw-normal'>" . $estadio->getNomeEstadio() . "</span>";
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
    
