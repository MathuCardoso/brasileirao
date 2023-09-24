<?php 
//View para alterar clubes

require_once(__DIR__ . "/../../controller/ClubeController.php");
require_once(__DIR__ . "/../../model/Clube.php");
require_once(__DIR__ . "/../../model/Estadio.php");

$msgErro = '';
$aluno = null;

$alunoCont = new ClubeController();




if(isset($_POST['submetido'])) {
    //Usuário clicou no botão gravar (submeteu o formulário)
    //Captura os campo do formulário
    $nome = trim($_POST['nome_clube']) ? trim($_POST['nome_clube']) : null;
    $iniciais = trim($_POST['iniciais']) ? trim($_POST['iniciais']) : null;
    $escudo = is_numeric($_POST['escudo']) ? $_POST['escudo'] : null;
    $sede = trim($_POST['sede']) ? trim($_POST['sede']) : null;
    $tecnico = is_numeric($_POST['tecnico']) ? $_POST['tecnico'] : null;
    $cor1 = trim($_POST['cor1']) ? trim($_POST['cor1']) : null;
    $cor2 = trim($_POST['cor2']) ? trim($_POST['cor2']) : null;
    $cor3 = trim($_POST['cor3']) ? trim($_POST['cor3']) : null;
    $idEstadio = is_numeric($_POST['estadio']) ? $_POST['estadio'] : null;


    $idClube = $_POST['id'];

    
    //Criar um objeto Aluno para persistência
    $clube = new Clube();
    $clube->setId($idClube);
    $clube->setNomeClube($nome);
    $clube->setIniciais($iniciais);
    $clube->setEscudo($escudo);
    $clube->setSede($sede);
    $clube->setTecnico($tecnico);
    $clube->setCor1($cor1);
    $clube->setCor2($cor2);
    $clube->setCor3($cor3);
    
    if($idEstadio) {
        $estadio = new Estadio();
        $estadio->setId($idEstadio);
        $Clube->setEstadio($estadio);
    }

    //Criar um alunoController 
    $clubeCont = new ClubeController();
    $erros = $clubeCont->atualizar($clube);

    if(! $erros) { //Caso não tenha erros
        //Redirecionar para o listar
        header("location: listar.php");
        exit;
    } else { //Em caso de erros, exibí-los
        $msgErro = implode("<br>", $erros);
        //print_r($erros);
    }



} else {
    //Usuário apenas entrou na página para alterar
    $idClube = 0;
    if(isset($_GET['idClube']))
        $idClube = $_GET['idClube'];
    
    $clube = $clubeCont->buscarPorId($idClube);
    if(! $clube) {
        echo "Clube não encontrado!<br>";
        echo "<a href='listar.php'>Voltar</a>";
        exit;
    }

}

//Inclui o formulário
include_once(__DIR__ . "/form.php");
