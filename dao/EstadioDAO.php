<?php
//DAO para Estadio
require_once(__DIR__ . "/../util/Connection.php");
require_once(__DIR__ . "/../model/Estadio.php");

class EstadioDAO
{
    private $conn;

    public function __construct()
    {
        $this->conn = Connection::getConnection();
    }

    public function list()
    {
        $sql = "SELECT * FROM estadios ORDER BY nome_estadio";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $this->mapBancoParaObjeto($result);
    }

    private function mapBancoParaObjeto($result)
    {
        $estadios = array();

        foreach ($result as $reg) {
            $estadio = new Estadio();
            $estadio->setId($reg['id'])
                ->setNomeEstadio($reg['nome_estadio']);

            array_push($estadios, $estadio);
        }

        return $estadios;
    }

    public function findById(?int $id)
    {
        $sql = "SELECT * FROM estadios WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);
        $result = $stmt->fetchAll();

        $estadios = $this->mapBancoParaObjeto($result);

        if (count($estadios) == 1)
            return $estadios[0];
        elseif (count($estadios) == 0)
            return null;

        die("EstadioDAO.findById - Erro: mais de um estádio encontrado para o ID " . $id);
    }
}
?>
