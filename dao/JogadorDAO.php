<?php
//DAO para Aluno
require_once(__DIR__ . "/../util/Connection.php");
require_once(__DIR__ . "/../model/Jogador.php");
require_once(__DIR__ . "/../model/Clubes.php");

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
            " (nome_jogador, nascimento, numero, nome_uniforme, altura, peso, pe, nacionalidade, posicao,
                   id_favPosicao, id_clube)" .
            " VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            $jogador->getNomeJogador(),
            $jogador->getNascimento(),
            $jogador->getNumero(),
            $jogador->getNomeUniforme(),
            $jogador->getAltura(),
            $jogador->getPeso(),
            $jogador->getPe(),
            $jogador->getNacionalidade(),
            $jogador->getPosicao(),
            $jogador->getFavPosicao(),
            $jogador->getClube()
        ]);
    }

    public function update(Jogador $jogador)
    {
        $conn = Connection::getConnection();

        $sql = "UPDATE jogadores SET nome_jogador = ?, nascimento = ?," .
            " numero = ?, nome_uniforme = ?, altura = ?, peso = ?, pe = ?" .
            " nacionalidade = ?, posicao = ?, id_favPosicao = ?, id_clube = ?" .
            " WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            $jogador->getNomeJogador(),
            $jogador->getNascimento(),
            $jogador->getNumero(),
            $jogador->getNomeUniforme(),
            $jogador->getAltura(),
            $jogador->getPeso(),
            $jogador->getPe(),
            $jogador->getNacionalidade(),
            $jogador->getPosicao(),
            $jogador->getFavPosicao(),
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
        $sql = "SELECT a.*," .
            " c.nome AS nome_curso, c.turno AS turno_curso" .
            " FROM alunos a" .
            " JOIN cursos c ON (c.id = a.id_curso)" .
            " ORDER BY a.nome";
        $stm = $this->conn->prepare($sql);
        $stm->execute();
        $result = $stm->fetchAll();
        return $this->mapBancoParaObjeto($result);
    }

    public function findById(int $id)
    {
        $conn = Connection::getConnection();

        $sql = "SELECT a.*," .
            " c.nome AS nome_clube" .
            " FROM jogadores a" .
            " JOIN clubes c ON (c.id = a.id_clube)" .
            " WHERE a.id = ?";

        $stmt = $conn->prepare($sql);
        $stmt->execute([$id]);
        $result = $stmt->fetchAll();

        //Criar o objeto Jogador
        $jogador = $this->mapBancoParaObjeto($result);

        if (count($jogador) == 1)
            return $jogador[0];
        elseif (count($jogador) == 0)
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
            $jogador->setId($reg['id']);

            $clube = new Clube();
            $clube->setId($reg['id_clube']);

            array_push($jogadores, $jogador);
        }

        return $jogadores;
    }
}
