<?php 
//Controller para Aluno
require_once(__DIR__ . "/../util/Connection.php");
require_once(__DIR__ . "/../dao/EstadioDAO.php");
require_once(__DIR__ . "/../model/Estadio.php");
require_once(__DIR__ . "/../service/EstadioService.php");

class EstadioController {

    private $estadioDAO;
    private $estadioService;

    public function __construct() {
        $this->estadioDAO = new EstadioDAO();        
        $this->estadioService = new EstadioService();
    }

    public function listar() {
        return $this->estadioDAO->list();        
    }

}