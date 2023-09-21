<?php 
//View para inserir alunos

require_once(__DIR__ . "/../../controller/JogadorController.php");
require_once(__DIR__ . "/../../model/Jogador.php");
require_once(__DIR__ . "/../../model/Clube.php");
require_once(__DIR__ . "../../../dao/ClubeDAO.php");

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
    $idade = $_POST['idade'] ? $_POST['idade'] : null;
    $numero = trim($_POST['numero']) ? trim($_POST['numero']) : null;
    $nomeUniforme = trim($_POST['nome_uniforme']) ? trim($_POST['nome_uniforme']) : null;
    $altura = trim($_POST['altura']) ? trim($_POST['altura']) : null;
    $peso = trim($_POST['peso']) ? trim($_POST['peso']) : null;
    $pe = trim($_POST['pe']) ? trim($_POST['pe']) : null;
    $nacionalidade = trim($_POST['nacionalidade']) ? trim($_POST['nacionalidade']) : null;
    $posicao = isset($_POST['posicao']) ? trim($_POST['posicao']) : null;
    $idClube = trim($_POST['id_clube']) ? trim($_POST['id_clube']) : null;

    // Se $idClube não for nulo, buscar as informações do clube
    if ($idClube) {
        $clubeDAO = new ClubeDAO();
        $clube = $clubeDAO->findById($idClube);
    
        if ($clube) {
            // Criar um objeto Jogador e atribuir o clube a ele
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
            $jogador->setClube($clube); // Aqui atribuímos o objeto Clube ao jogador
    
            // Agora você pode prosseguir com a inserção do jogador
            $jogadorCont = new JogadorController();
            $erros = $jogadorCont->inserir($jogador);
    
            if (!$erros) { //Caso não tenha erros
                //Redirecionar para o listar
                header("location: listar.php");
                exit;
            } else { //Em caso de erros, exibí-los
                $msgErro = implode("<br>", $erros);
            }
        } else {
            $msgErro = "Clube não encontrado com o ID especificado.";
        }
    }
}


//Inclui o formulário
include_once(__DIR__ . "/form.php");

