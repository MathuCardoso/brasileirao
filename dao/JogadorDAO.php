<?php
//DAO para Aluno
require_once(__DIR__ . "/../util/Connection.php");
require_once(__DIR__ . "/../model/Jogador.php");
require_once(__DIR__ . "/../model/Clube.php");

class JogadorDAO
{

    private $conn;

    public function __construct()
    {
        $this->conn = Connection::getConnection();
    }

    public function insert(Jogador $jogador)
    {
        $sql = "INSERT INTO jogadores" .
            " (nome_jogador, idade, numero, nome_uniforme, altura, peso, pe, 
               nacionalidade, posicao, id_clube)" .
               " VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            $jogador->getNomeJogador(),
            $jogador->getIdade(),
            $jogador->getNumero(),
            $jogador->getNomeUniforme(),
            $jogador->getAltura(),
            $jogador->getPeso(),
            $jogador->getPe(),
            $jogador->getNacionalidade(),
            $jogador->getPosicao(),
            $jogador->getClube()->getId()
        ]);
    }

    public function update(Jogador $jogador)
    {
        $conn = Connection::getConnection();

        $sql = "UPDATE jogadores SET nome_jogador = ?, idade = ?," .
            " numero = ?, nome_uniforme = ?, altura = ?, peso = ?, pe = ?" .
            " nacionalidade = ?, posicao = ?, id_clube = ?" .
            " WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            $jogador->getNomeJogador(),
            $jogador->getIdade(),
            $jogador->getNumero(),
            $jogador->getNomeUniforme(),
            $jogador->getAltura(),
            $jogador->getPeso(),
            $jogador->getPe(),
            $jogador->getNacionalidade(),
            $jogador->getPosicao(),
            $jogador->getClube()->getNomeClube()
        ]);
    }

    public function deleteById(int $id)
    {
        $conn = Connection::getConnection();

        $sql = "DELETE FROM jogadores WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$id]);
    }

    //fazer essa parte

    public function list()
{
    $sql = "SELECT j.*, c.nome_clube" . // Use "c.nome_clube" em vez de "c.nome"
        " FROM jogadores j" .
        " JOIN clubes c ON (c.id = j.id_clube)" .
        " ORDER BY j.nome_jogador";
    $stm = $this->conn->prepare($sql);
    $stm->execute();
    $result = $stm->fetchAll();
    return $this->mapBancoParaObjeto($result);
}

public function findById(int $id)
{
    $conn = Connection::getConnection();

    $sql = "SELECT a.*, c.nome_clube" . // Use "c.nome_clube" em vez de "c.nome"
        " FROM jogadores a" .
        " JOIN clubes c ON (c.id = a.id_clube)" .
        " WHERE a.id = ?";

    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);
    $result = $stmt->fetchAll();

    // Criar o objeto Jogador
    $jogadores = $this->mapBancoParaObjeto($result);

    if (count($jogadores) == 1)
        return $jogadores[0];
    elseif (count($jogadores) == 0)
        return null;

    die("JogadorDAO.findById - Erro: mais de um jogador" .
        " encontrado para o ID " . $id);
}



    //Converte do formato Banco (array associativo) para Objeto
    private function mapBancoParaObjeto($result)
    {
        $jogadores = array();

        foreach ($result as $reg) {
                $jogador = new Jogador();
                $jogador->setId($reg['id'])
                ->setNomeJogador($reg['nome_jogador'])
                ->setIdade($reg['idade'])
                ->setNumero($reg['numero'])
                ->setNomeUniforme($reg['nome_uniforme'])
                ->setAltura($reg['altura'])
                ->setPeso($reg['peso'])
                ->setPe($reg['pe'])
                ->setNacionalidade($reg['nacionalidade'])
                ->setPosicao($reg['posicao']);

            $clube = new Clube();
            $clube->setId($reg['id_clube']);
            $clube->setNomeClube($reg['nome_clube']);
            $jogador->setClube($clube);

            array_push($jogadores, $jogador);
        }

        return $jogadores;
    }
}
