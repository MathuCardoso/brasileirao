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
    <a class="btn btn-primary mt-1 mb-3" href="inserir.php">Inserir</a>
</div>

<table class="tb" border="1">
    <thead>
        <tr>
            <th>Nome</th>
            <th>Idade</th>
            <th>Nº</th>
            <th>Nome no uniforme</th>
            <th>Altura</th>
            <th>Peso</th>
            <th>Pé</th>
            <th>Nacionalidade</th>
            <th>Posição</th>
            <th>Clube</th>
            <th>Editar</th>
            <th>Excluir</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($jogadores as $j) : ?>
            <tr align="center">
                <td><?= $j->getNomeJogador(); ?></td>
                <td><?= $j->getIdade(); ?></td>
                <td><?= $j->getNumero(); ?></td>
                <td><?= $j->getNomeUniforme(); ?></td>
                <td><?= $j->getAltura() . "cm"; ?></td>
                <td><?= $j->getPeso() . "kg";?></td>
                <td><?= $j->getPe(); ?></td>
                <td><?= $j->getPais(); ?></td>
                <td><?= $j->getPosicao(); ?></td>
                <td><?php $clube = $j->getClube();
                    if ($clube) {
                        echo $clube->getNomeClube();
                    } else {
                        echo "Nenhum clube associado";
                    } ?></td>
                <td><a href="alterar.php?idJogador=<?= $j->getId() ?>">Editar</a></td>
                <td><a href="excluir.php?idJogador=<?= $j->getId() ?>" onclick="
                return confirm('Confirma a exclusão?');">Excluir</a></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>


<?php
require(__DIR__ . "/../include/footer.php");
?>