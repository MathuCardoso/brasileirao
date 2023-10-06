<?php
//View para inserir alunos

require_once(__DIR__ . "/../../controller/JogadorController.php");
require_once(__DIR__ . "/../../model/Jogador.php");
require_once(__DIR__ . "/../../model/Clube.php");
require_once(__DIR__ . "/../../dao/ClubeDAO.php");

$jogador = null;
$posicao = null;
$erros = array();


if (isset($_POST['submetido'])) {
    //echo "clicou no gravar";
    //Captura os campo do formulário
    $nomeJogador = trim($_POST['nomeJogador']) ? trim($_POST['nomeJogador']) : null;
    $idade = $_POST['idade'] ? $_POST['idade'] : null;
    $numero = trim($_POST['numero']) ? trim($_POST['numero']) : null;
    $nomeUniforme = trim($_POST['nome_uniforme']) ? trim($_POST['nome_uniforme']) : null;
    $altura = trim($_POST['altura']) ? trim($_POST['altura']) : null;
    $peso = trim($_POST['peso']) ? trim($_POST['peso']) : null;
    $pe = trim($_POST['pe']) ? trim($_POST['pe']) : null;
    $pais = trim($_POST['pais']) ? trim($_POST['pais']) : null;
    $posicao = isset($_POST['posicao']) ? trim($_POST['posicao']) : null;
    $idClube = trim($_POST['id_clube']) ? trim($_POST['id_clube']) : null;
    if (isset($_FILES['foto']) && !empty($_FILES['foto'])) {
        $foto = "./img/" . $_FILES['foto']['name'];
        move_uploaded_file($_FILES['foto']['tmp_name'], $foto);
    }else{
        $foto = "";
    }

    // Criar um objeto Jogador e atribuir o clube a ele
    $jogador = new Jogador();
    $jogador->setNomeJogador($nomeJogador);
    $jogador->setIdade($idade);
    $jogador->setNumero($numero);
    $jogador->setNomeUniforme($nomeUniforme);
    $jogador->setAltura($altura);
    $jogador->setPeso($peso);
    $jogador->setPe($pe);
    $jogador->setPais($pais);
    $jogador->setPosicao($posicao);

    if($idClube) {
        $clube = new Clube();
        $clube->setId($idClube);
        $jogador->setClube($clube);
    }
    $jogador->setFoto($foto);

    // Agora você pode prosseguir com a inserção do jogador
    $jogadorCont = new JogadorController();
    $erros = $jogadorCont->inserir($jogador);

    if (!$erros) { //Caso não tenha erros
        //Redirecionar para o listar
        header("location: listar.php");
        exit;
    }
}

//Inclui o formulário
include_once(__DIR__ . "/form.php");
