<?php 
//Página view para listagem de clube
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once(__DIR__ . "/../../controller/ClubeController.php");

$clubeCont = new ClubeController();
$clubes = $clubeCont->listar();
?>

<?php 
require_once(__DIR__ . "/../include/header.php");
?>

<h2 class="mt-4 text-center">Listagem de clubes</h2>

<div>
    <a class="btn btn-primary mt-1 mb-3" href="inserir.php">Cadastrar clube</a>
</div>

<div class="row">

    <?php foreach ($clubes as $c) : ?>


        <div class="card mb-3 mx-auto p-2 rounded-4 text-bg-dark card-clubes col-md-6" style="max-width: 540px; border: 3px solid <?= $c->getCor1();?>;">
            <div class="row pr-0">
                <div class="col-md-4 px-0" style="text-align: center; display: flex; justify-content: center; align-items: center; flex-direction: column;">
                    <img class="mt-4 p-3" style="width: 100%;" src="<?php

                    if ($c->getEscudo() and $c->getEscudo() != "./img/") {
                        echo $c->getEscudo();
                    } else {
                        echo "../../assets/74472.png";
                    }
                    ?>" class="img-fluid rounded-start">
                    <div class="outros text-center mt-3">
                        <a class="text-info mr-1 fs-5" href="alterar.php?idClube=<?= $c->getId() ?>">Editar</a>
                        <a class="text-danger ml-1 fs-5" href="excluir.php?idClube=<?= $c->getId() ?>" onclick="return confirm('Confirma a exclusão?');">Excluir</a>
                    </div>
                </div>
                <div class="col-md-8 px-0">
                    <div class="card-title">
                        <h4 class="card-title mb-0 fs-2 fw-bold" style="color: <?= $c->getCor2();?>;"><?php echo $c->getNomeClube(); ?></h4>
                    </div>
                    <div class="card-body d-flex py-0 pl-0 pr-0">
                        <div class="card-body p-0">
                            <p class="card-text fw-bold mb-0 py-1 fs-5">Iniciais: <?php echo "<br><span class='fw-normal'>" . $c->getIniciais() . "</span>"; ?></p>
                            <p class="card-text fw-bold mb-0 py-1 fs-5">Técnico: <?php echo "<br><span class='fw-normal'>" . $c->getTecnico() ."</span>"; ?></p>
                            <p class="card-text fw-bold mb-0 py-1 fs-5">Sede: <?php echo "<br><span class='fw-normal'>" . $c->getSede() . "</span>"; ?></p>

                        </div>
                        <div class="card-body py-0 pl-0 pr-0">
                        <p class="card-text fw-bold mb-0 py-1 fs-5">Estádio: <?php  $estadio = $c->getEstadio();
                                                                        if ($estadio) {
                                                                            echo "<br><span class='fw-normal'>" . $estadio->getNomeEstadio() . "</span>";
                                                                        } ?></p>                            <p class="card-text fw-bold mb-0">
                                                                            
                            <p class="card-text fw-bold mb-0 py-1 fs-5">Presidente: <?php echo "<br><span class='fw-normal'>" . $c->getPresidente() . "</span>"; ?></p>
                            <p class="card-text fw-bold mb-0 py-1 fs-5">Divisão: <?php echo "<br><span class='fw-normal'>" . $c->getDivisao() . "</span>"; ?></p>

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
    
