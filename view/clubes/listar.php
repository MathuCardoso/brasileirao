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

<h4>Listagem de $clubes</h4>

<div>
    <a class="btn btn-success" href="inserir.php">Inserir</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Nome</th>
            <th>Iniciais</th>
            <th>Escudo</th>
            <th>Sede</th>
            <th>Tecnico</th>
            <th>cor 1</th>
            <th>cor 2</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($clube as $a): ?>
            <tr>
                <td><?= $a->getNome(); ?></td>
                <td><?= $a->getInicias(); ?></td>
                <td><?= $a->getEscudo(); ?></td>
                <td><?= $a->getSede(); ?></td>
                <td><?= $a->getTecnico(); ?></td>
                <td><?= $a->getCor1(); ?></td>
                <td><?= $a->getCor2(); ?></td>
                <td><a href="alterar.php?idClube=<?= $a->getId() ?>"> 
                        <img src="../../img/btn_editar.png" /> 
                    </a>
                </td>
                <td><a href="excluir.php?idAluno=<?= $a->getId() ?>"
                       onclick="return confirm('Confirma a exclusão?');" > 
                        <img src="../../img/btn_excluir.png" /> 
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>


<?php 
require(__DIR__ . "/../include/footer.php");
?>
    
