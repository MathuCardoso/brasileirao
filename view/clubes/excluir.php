<?php
//View para excluir um clube

require_once(__DIR__ . '/../../controller/ClubeController.php');

//Receber o parâmetro
$idClube = 0;
if(isset($_GET['idClube']))
    $idClube = $_GET['idClube'];

//Carregar o aluno 
$ClubeCont = new ClubeController();   
$clube = $clubeCont->buscarPorId($idClube);

//Verificar se o aluno existe
if(! $clube) {
    echo "Aluno não encontrado!<br>";
    echo "<a href='listar.php'>Voltar</a>";
    exit;
}

//Excluir o aluno
$clubeCont->excluirPorId($clube->getId());

//Redirecionar para a listar
header("location: listar.php");
