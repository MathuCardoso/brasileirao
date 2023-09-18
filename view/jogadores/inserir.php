<?php 
//View para inserir alunos

require_once(__DIR__ . "/../../controller/JogadorController.php");
require_once(__DIR__ . "/../../model/Jogador.php");
require_once(__DIR__ . "/../../model/Clube.php");

$msgErro = '';
$jogador = null;
$posicao = null;

$sql = 'SELECT nome_clube FROM clubes';
$stmt = Connection::getConnection()->prepare($sql);
$stmt->execute();
$clubes = $stmt->fetchAll();

if(isset($_POST['submetido'])) {
    //echo "clicou no gravar";
    //Captura os campo do formulário
    $nomeJogador = trim($_POST['nomeJogador']) ? trim($_POST['nomeJogador']) : null;
    $nascimento = $_POST['nascimento'] ? $_POST['nascimento'] : null;
    $numero = trim($_POST['numero']) ? trim($_POST['numero']) : null;
    $nomeUniforme = trim($_POST['nome_uniforme']) ? trim($_POST['nome_uniforme']) : null;
    $altura = trim($_POST['altura']) ? trim($_POST['altura']) : null;
    $peso = trim($_POST['peso']) ? trim($_POST['peso']) : null;
    $pe = trim($_POST['pe']) ? trim($_POST['pe']) : null;
    $nacionalidade = trim($_POST['nacionalidade']) ? trim($_POST['nacionalidade']) : null;
    $posicao = isset($_POST['posicao']) ? trim($_POST['posicao']) : null;
    $idClube = trim($_POST['id_clube']) ? trim($_POST['id_clube']) : null;



    //Criar um objeto Jogador para persistência
    $jogador = new Jogador();
    $jogador->setNomeJogador($nomeJogador);
    $jogador->setNascimento($nascimento);
    $jogador->setNumero($numero);
    $jogador->setNomeUniforme($nomeUniforme);
    $jogador->setAltura($altura);
    $jogador->setPeso($peso);
    $jogador->setPe($pe);
    $jogador->setNacionalidade($nacionalidade);
    $jogador->setPosicao($posicao);

    if($idClube) {
        $clube = new Clube();
        $clube->setId($idClube);
        $jogador->setClube($clube);
    }

    //Criar um alunoController
    $jogadorCont = new JogadorController();
    $erros = $jogadorCont->inserir($jogador);

    if(! $erros) { //Caso não tenha erros
        //Redirecionar para o listar
        header("location: listar.php");
        exit;
    } else { //Em caso de erros, exibí-los
        $msgErro = implode("<br>", $erros);
        //print_r($erros);
    }
}


//Inclui o formulário
include_once(__DIR__ . "/form.php");

