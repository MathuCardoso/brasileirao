<?php 
//Controller para Jogador

require_once(__DIR__ . "/../util/Connection.php");
require_once(__DIR__ . "/../dao/JogadorDAO.php");
require_once(__DIR__ . "/../model/Jogador.php");
require_once(__DIR__ . "/../service/JogadorService.php");

class JogadorController {

    private $jogadorDAO;
    private $jogadorService;

    public function __construct() {
        $this->jogadorDAO = new JogadorDAO();        
        $this->jogadorService = new JogadorService();
    }

    public function listar() {
        return $this->jogadorDAO->list();        
    }

    public function buscarPorId(int $id) {
        return $this->jogadorDAO->findById($id);
    }

    public function inserir(Jogador $jogador) {
        //Valida e retorna os erros caso existam
        $erros = $this->jogadorService->validarDados($jogador);
        if($erros) 
            return $erros;

        //return array("fdsafs" => '1');

        //Persiste o objeto e retorna um array vazio
        $this->jogadorDAO->insert($jogador);
        return array();
    }

    public function atualizar(Jogador $jogador) {
        $erros = $this->jogadorService->validarDados($jogador);
        if($erros) 
            return $erros;
        
        //Persiste o objeto e retorna um array vazio
        $this->jogadorDAO->update($jogador);
        return array();
    }

    public function excluirPorId(int $id) {
        $this->jogadorDAO->deleteById($id);
    }

}