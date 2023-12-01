<?php
//View para inserir clube

require_once(__DIR__ . "/../../controller/ClubeController.php");
require_once(__DIR__ . "/../../model/Clube.php");
require_once(__DIR__ . "/../../model/Estadio.php");
require_once(__DIR__ . "/../../dao/EstadioDAO.php");

$clube = null;
$divisao = null;

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
    $tecnico = trim($_POST['tecnico']) ? ($_POST['tecnico']) : null;
    $presidente = trim($_POST['presidente']) ? ($_POST['presidente']) : null;
    $divisao = trim($_POST['divisao']) ? ($_POST['divisao']) : null;
    $cor1 = trim($_POST['cor1']) ? trim($_POST['cor1']) : null;
    $cor2 = trim($_POST['cor2']) ? trim($_POST['cor2']) : null;
    $idEstadio = is_numeric($_POST['id_estadio']) ? $_POST['id_estadio'] : null;

    //echo $idEstadio;
    //exit;
    
    $estadioDAO = new EstadioDAO();
    $estadio = $estadioDAO->findById($idEstadio);
    
    $clube = new Clube();
    $clube->setNomeClube($nomeClube);
    $clube->setIniciais($iniciais);
    $clube->setSede($sede);
    $clube->setTecnico($tecnico);
    $clube->setPresidente($presidente);
    $clube->setDivisao($divisao);
    $clube->setEscudo($escudo);
    $clube->setCor1($cor1);
    $clube->setCor2($cor2);
    $clube->setEstadio($estadio);
    

    $clubeCont = new ClubeController();
    $erros = $clubeCont->inserir($clube);
    
    if (!$erros) { //Caso não tenha erros
        //Redirecionar para o listar
        header("location: listar.php");
        exit;
    }
}


//Inclui o formulário
include_once(__DIR__ . "/form.php");
