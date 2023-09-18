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
require(__DIR__ . "/../include/header.php");
?>

<h4>Listagem de jogadores</h4>

<div>
    <a class="btn btn-success" href="inserir.php">Inserir</a>
</div>

<table class="table table-striped" border="1">
    <thead>
        <tr>
            <th>Nome</th>
            <th>Nascimento</th>
            <th>Nº da camisa</th>
            <th>Nome no uniforme</th>
            <th>Altura</th>
            <th>Peso</th>
            <th>Pé</th>
            <th>Nacionalidade</th>
            <th>Posição</th>
            <th>Clube</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($jogadores as $j) : ?>
            <tr>
                <td><?= $j->getNomeJogador(); ?></td>
                <td><?= $j->getNascimento(); ?></td>
                <td><?= $j->getNumero(); ?></td>
                <td><?= $j->getNomeUniforme(); ?></td>
                <td><?= $j->getAltura(); ?></td>
                <td><?= $j->getPeso(); ?></td>
                <td><?= $j->getPe(); ?></td>
                <td><?= $j->getNacionalidade(); ?></td>
                <td><?= $j->getPosicao(); ?></td>
                <td><?= $j->getClube(); ?></td>
                <td><a href="alterar.php?idJogador=<?= $j->getId() ?>"></a></td>
                <td><a href="excluir.php?idJogador=<?= $j->getId() ?>" onclick="
                return confirm('Confirma a exclusão?');"></a></td></tr>
        <?php endforeach; ?>
    </tbody>
</table>


<?php
require(__DIR__ . "/../include/footer.php");
?>