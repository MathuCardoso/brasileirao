<?php
//DAO para Clube
require_once(__DIR__ . "/../util/Connection.php");
require_once(__DIR__ . "/../model/Clube.php");
require_once(__DIR__ . "/../model/Estadio.php");

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
            " (nome_clube, iniciais, escudo, tecnico, id_estadio, cor1, cor2, cor3)" .
            " VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            $clube->getNomeClube(),
            $clube->getIniciais(),
            $clube->getEscudo(),
            $clube->getTecnico(),
            $clube->getEstadio()->getId(),
            $clube->getCor1(),
            $clube->getCor2(),
            $clube->getCor3()
        ]);
    }

    public function update(Clube $clube)
    {
        $sql = "UPDATE clubes SET nome_clube = ?, iniciais = ?, escudo = ?, tecnico = ?, id_estadio = ?, cor1 = ?, cor2 = ?, cor3 = ? WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            $clube->getNomeClube(),
            $clube->getIniciais(),
            $clube->getEscudo(),
            $clube->getTecnico(),
            $clube->getEstadio()->getId(),
            $clube->getCor1(),
            $clube->getCor2(),
            $clube->getCor3(),
            $clube->getId()
        ]);
    }

    public function deleteById(int $id)
    {
        $sql = "DELETE FROM clubes WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);
    }

    public function list()
    {
        $sql = "SELECT * FROM clubes ORDER BY nome_clube";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $this->mapBancoParaObjeto($result);
    }

    public function findById(int $id)
    {
        $sql = "SELECT * FROM clubes WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);
        $result = $stmt->fetchAll();

        $clubes = $this->mapBancoParaObjeto($result);

        if (count($clubes) == 1)
            return $clubes[0];
        elseif (count($clubes) == 0)
            return null;

        die("ClubeDAO.findById - Erro: mais de um clube encontrado para o ID " . $id);
    }

    private function mapBancoParaObjeto($result)
    {
        $clubes = array();

        foreach ($result as $reg) {
            $clube = new Clube();
            $clube->setId($reg['id'])
                ->setNomeClube($reg['nome_clube'])
                ->setIniciais($reg['iniciais'])
                ->setEscudo($reg['escudo'])
                ->setTecnico($reg['tecnico'])
                ->setCor1($reg['cor1'])
                ->setCor2($reg['cor2'])
                ->setCor3($reg['cor3']);

            $estadio = new Estadio();
            $estadio->setId($reg['id_estadio']);

            $clube->setEstadio($estadio);

            array_push($clubes, $clube);
        }

        return $clubes;
    }
}
?>
