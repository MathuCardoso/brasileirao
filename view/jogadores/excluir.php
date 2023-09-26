<?php
//View para excluir um jogador

require_once(__DIR__ . '/../../controller/JogadorController.php');

//Receber o parâmetro
$idJogador = 0;
if(isset($_GET['idJogador']))
    $idJogador = $_GET['idJogador'];

//Carregar o aluno 
$jogadorCont = new JogadorController();   
$jogador = $jogadorCont->buscarPorId($idJogador);

//Verificar se o aluno existe
if(! $jogador) {
    echo "Jogador não encontrado!<br>";
    echo "<a href='listar.php'>Voltar</a>";
    exit;
}

//Excluir o aluno
$jogadorCont->excluirPorId($jogador->getId());

//Redirecionar para a listar
header("location: listar.php");