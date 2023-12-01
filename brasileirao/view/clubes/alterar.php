<?php
//View para alterar clubes

require_once(__DIR__ . "/../../controller/ClubeController.php");
require_once(__DIR__ . "/../../model/Clube.php");
require_once(__DIR__ . "/../../model/Estadio.php");

$msgErro = '';
$clube = null;

$clubeCont = new ClubeController();

if (isset($_POST['submetido'])) {
    //Usuário clicou no botão gravar (submeteu o formulário)
    //Captura os campo do formulário
    $nomeClube = trim($_POST['nome_clube']) ? trim($_POST['nome_clube']) : null;
    $iniciais = trim($_POST['iniciais']) ? trim($_POST['iniciais']) : null;
    
    if (isset($_FILES['escudo']) && !empty($_FILES['escudo'])) {
        $escudo = "./img/" . $_FILES['escudo']['name'];
        move_uploaded_file($_FILES['escudo']['tmp_name'], $escudo);
    }else{
        $escudo = "";
    }

    $sede = trim($_POST['sede']) ? trim($_POST['sede']) : null;
    $tecnico = trim($_POST['tecnico']) ? $_POST['tecnico'] : null;
    $presidente = trim($_POST['presidente']) ? ($_POST['presidente']) : null;
    $divisao = trim($_POST['divisao']) ? ($_POST['divisao']) : null;
    $cor1 = trim($_POST['cor1']) ? trim($_POST['cor1']) : null;
    $cor2 = trim($_POST['cor2']) ? trim($_POST['cor2']) : null;
    $idEstadio = isset($_POST['id_estadio']) ? $_POST['id_estadio'] : null;


    $idClube = $_POST['id'];


    //Criar um objeto Clube para persistência
    $clube = new Clube();
    $clube->setId($idClube);
    $clube->setNomeClube($nomeClube);
    $clube->setIniciais($iniciais);
    $clube->setEscudo($escudo);
    $clube->setSede($sede);
    $clube->setTecnico($tecnico);
    $clube->setPresidente($presidente);
    $clube->setDivisao($divisao);
    $clube->setCor1($cor1);
    $clube->setCor2($cor2);

    if($idEstadio){
        $estadio = new Estadio();
        $estadio->setId($idEstadio);
        $clube->setEstadio($estadio);
    }


    //Criar um alunoController 
    $clubeCont = new ClubeController();
    $erros = $clubeCont->atualizar($clube);

    if (!$erros) { //Caso não tenha erros
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
    if (isset($_GET['idClube']))
        $idClube = $_GET['idClube'];

    $clube = $clubeCont->buscarPorId($idClube);
    if (!$clube) {
        echo "Clube não encontrado!<br>";
        echo "<a href='listar.php'>Voltar</a>";
        exit;
    }
}

//Inclui o formulário
include_once(__DIR__ . "/form.php");