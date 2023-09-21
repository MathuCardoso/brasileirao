<?php 
//View para alterar alunos

require_once(__DIR__ . "/../../controller/JogadorController.php");
require_once(__DIR__ . "/../../model/Jogador.php");
require_once(__DIR__ . "/../../model/Clube.php");

$msgErro = '';
$jogador = null;
$posicao = '';

$jogadorCont = new JogadorController();

if(isset($_POST['submetido'])) {
    //Usuário clicou no botão gravar (submeteu o formulário)
    //Captura os campo do formulário
    $nomeJogador = trim($_POST['nomeJogador']) ? trim($_POST['nomeJogador']) : null;
    $idade = $_POST['idade'] ? $_POST['idade'] : null;
    $numero = trim($_POST['numero']) ? trim($_POST['numero']) : null;
    $nomeUniforme = trim($_POST['nome_uniforme']) ? trim($_POST['nome_uniforme']) : null;
    $altura = trim($_POST['altura']) ? trim($_POST['altura']) : null;
    $peso = trim($_POST['peso']) ? trim($_POST['peso']) : null;
    $pe = trim($_POST['pe']) ? trim($_POST['pe']) : null;
    $nacionalidade = trim($_POST['nacionalidade']) ? trim($_POST['nacionalidade']) : null;
    $posicao = isset($_POST['posicao']) ? trim($_POST['posicao']) : null;
    $idClube = trim($_POST['id_clube']) ? trim($_POST['id_clube']) : null;

    $idJogador = $_POST['id'];
    
    //Criar um objeto jogador para persistência
    $jogador = new Jogador();
    $jogador->setNomeJogador($nomeJogador);
    $jogador->setIdade($idade);
    $jogador->setNumero($numero);
    $jogador->setNomeUniforme($nomeUniforme);
    $jogador->setAltura($altura);
    $jogador->setPeso($peso);
    $jogador->setPe($pe);
    $jogador->setNacionalidade($nacionalidade);
    $jogador->setPosicao($posicao);
    $jogador->setClube($idClube);

    //Criar um jogadorController 
    $jogadorCont = new JogadorController();
    $erros = $jogadorCont->atualizar($jogador);

    if(! $erros) { //Caso não tenha erros
        //Redirecionar para o listar
        header("location: listar.php");
        exit;
    } else { //Em caso de erros, exibí-los
        $msgErro = implode("<br>", $erros);
        //print_r($erros);
    }

}else {
    //Usuário apenas entrou na página para alterar
    $idJogador = 0;
    if(isset($_GET['idJogador']))
        $idJogador = $_GET['idJogador'];
    
    $jogador = $jogadorCont->buscarPorId($idJogador);
    if(! $jogador) {
        echo "Jogador não encontrado!<br>";
        echo "<a href='listar.php'>Voltar</a>";
        exit;
    }

}

//Inclui o formulário
include_once(__DIR__ . "/form.php");