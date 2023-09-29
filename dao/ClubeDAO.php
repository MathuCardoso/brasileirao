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
            " (nome_clube, iniciais, sede, tecnico, escudo, presidente, divisao, cor1, cor2, id_estadio)" .
            " VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            $clube->getNomeClube(),
            $clube->getIniciais(),
            $clube->getSede(),
            $clube->getTecnico(),
            $clube->getEscudo(),
            $clube->getPresidente(),
            $clube->getDivisao(),
            $clube->getCor1(),
            $clube->getCor2(),
            $clube->getEstadio()->getId()
        ]);
    }

    public function update(Clube $clube)
    {
        $sql = "UPDATE clubes SET 
        nome_clube = ?, 
        iniciais = ?, 
        escudo = ?, 
        tecnico = ?, 
        presidente = ?,
        divisao = ?,
        sede = ?, 
        id_estadio = ?, 
        cor1 = ?, 
        cor2 = ?
        WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            $clube->getNomeClube(),
            $clube->getIniciais(),
            $clube->getEscudo(),
            $clube->getTecnico(),
            $clube->getPresidente(),
            $clube->getDivisao(),
            $clube->getEstadio(),
            $clube->getEstadio()->getId(),
            $clube->getCor1(),
            $clube->getCor2(),
            $clube->getId()
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
        $sql = "SELECT c.*, e.nome_estadio " . 
            " FROM clubes c" . 
            " JOIN estadios e ON(e.id = c.id_estadio)" .
            " ORDER BY nome_clube";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $this->mapBancoParaObjeto($result);
    }

    public function findById(int $id)
{
    $conn = Connection::getConnection();

    $sql = "SELECT c.*, e.nome_estadio" .
    " FROM clubes c" .
    " JOIN estadios e ON (e.id = c.id_estadio)" .
    " WHERE c.id = ?";

    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);
    $result = $stmt->fetchAll();

    // Criar o objeto Jogador
    $clubes = $this->mapBancoParaObjeto($result);

    if (count($clubes) == 1)
        return $clubes[0];
    elseif (count($clubes) == 0)
        return null;

    die("JogadorDAO.findById - Erro: mais de um clube" .
        " encontrado para o ID " . $id);
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
                ->setPresidente($reg['presidente'])
                ->setDivisao($reg['divisao'])
                ->setSede($reg['sede'])
                ->setCor1($reg['cor1'])
                ->setCor2($reg['cor2']);

            $estadio = new Estadio();
            $estadio->setId($reg['id_estadio']);
            $estadio->setNomeEstadio($reg['nome_estadio']);

            $clube->setEstadio($estadio);

            array_push($clubes, $clube);
        }

        return $clubes;
    }
}
?>
