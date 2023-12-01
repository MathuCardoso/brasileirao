<?php
//View para excluir um clube

require_once(__DIR__ . '/../../controller/ClubeController.php');

//Receber o parâmetro
$idClube = 0;
if(isset($_GET['idClube']))
    $idClube = $_GET['idClube'];

//Carregar o clube 
$clubeCont = new ClubeController();   
$clube = $clubeCont->buscarPorId($idClube);

//Verificar se o clube existe
if(! $clube) {
    echo "clube não encontrado!<br>";
    echo "<a href='listar.php'>Voltar</a>";
    exit;
}

//Excluir o clube
$clubeCont->excluirPorId($clube->getId());

//Redirecionar para a listar
header("location: listar.php");