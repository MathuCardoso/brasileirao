<?php
//DAO para Aluno
require_once(__DIR__ . "/../util/Connection.php");
require_once(__DIR__ . "/../model/Clube.php");

class ClubeDAO
{

    private $conn;

    public function __construct()
    {
        $this->conn = Connection::getConnection();
    }

    public function insert(Clube $clube)
    {
        $sql = "INSERT INTO clubes" .
            " (nome_clube, iniciais, escudo, tecnico, id_estadio, cor1,
                   cor2, cor3)" . "VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            $clube->getNomeClube(),
            $clube->getIniciais(),
            $clube->getEscudo(),
            $clube->getTecnico(),
            $clube->getEstadio()->getNomeEstadio(),
            $clube->getCor1(),
            $clube->getCor1(),
            $clube->getCor2(),
            $clube->getCor3()
        ]);
    }

    public function update(Clube $clube)
    {
        $conn = Connection::getConnection();

        $sql = "UPDATE alunos SET nome = ?, idade = ?," .
            " estrangeiro = ?, id_curso = ?" .
            " WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            $clube->getNomeClube(),
            $clube->getIniciais(),
            $clube->getEscudo(),
            $clube->getTecnico(),
            $clube->getEstadio()->getNomeEstadio(),
            $clube->getCor1(),
            $clube->getCor1(),
            $clube->getCor2(),
            $clube->getCor3()
        ]);
    }

    public function deleteById(int $id)
    {
        $conn = Connection::getConnection();

        $sql = "DELETE FROM clubes WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$id]);
    }

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
            " c.nome AS nome_curso, c.turno AS turno_curso" .
            " FROM alunos a" .
            " JOIN cursos c ON (c.id = a.id_curso)" .
            " WHERE a.id = ?";

        $stmt = $conn->prepare($sql);
        $stmt->execute([$id]);
        $result = $stmt->fetchAll();

        //Criar o objeto Aluno
        $alunos = $this->mapBancoParaObjeto($result);

        if (count($alunos) == 1)
            return $alunos[0];
        elseif (count($alunos) == 0)
            return null;

        die("AlunoDAO.findById - Erro: mais de um aluno" .
            " encontrado para o ID " . $id);
    }

    //Converte do formato Banco (array associativo) para Objeto
    private function mapBancoParaObjeto($result)
    {
        $alunos = array();

        foreach ($result as $reg) {
            $aluno = new Jogador();
            $aluno->setId($reg['id'])
                ->setNome($reg['nome'])
                ->setEstrangeiro($reg['estrangeiro'])
                ->setIdade($reg['idade']);

            $curso = new Clube();
            $curso->setId($reg['id_curso'])
                ->setNome($reg['nome_curso'])
                ->setTurno($reg['turno_curso']);
            $aluno->setCurso($curso);

            array_push($alunos, $aluno);
        }

        return $alunos;
    }
}
