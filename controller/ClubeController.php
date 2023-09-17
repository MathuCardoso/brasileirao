<?php 
//Controller para Aluno

require_once(__DIR__ . "/../dao/ClubeDAO.php");
require_once(__DIR__ . "/../model/Clube.php");
require_once(__DIR__ . "/../service/ClubeService.php");

class ClubeController {

    private $clubeDAO;
    private $clubeService;

    public function __construct() {
        $this->clubeDAO = new ClubeDAO();        
        $this->clubeService = new ClubeService();
    }

    public function listar() {
        return $this->ClubeDAO->list();        
    }

    public function buscarPorId(int $id) {
        return $this->ClubeDAO->findById($id);
    }

    public function inserir(Clube $clube) {
        //Valida e retorna os erros caso existam
        $erros = $this->clubeService->validarDados($clube);
        if($erros) 
            return $erros;

        //Persiste o objeto e retorna um array vazio
        $this->clubeDAO->insert($clube);
        return array();
    }

    public function atualizar(Clube $clube) {
        $erros = $this->clubeService->validarDados($clube);
        if($erros) 
            return $erros;
        
        //Persiste o objeto e retorna um array vazio
        $this->clubeDAO->update($clube);
        return array();
    }

    public function excluirPorId(int $id) {
        $this->clubeDAO->deleteById($id);
    }

}