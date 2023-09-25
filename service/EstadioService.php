<?php 
//Classe service para estadio

require_once(__DIR__ . "/../model/Estadio.php");

class EstadioService {

    public function validarDados(Estadio $estadio) {
        $erros = array();
        
        //Validar o nome
        if(! $estadio->getNomeEstadio()) {
            array_push($erros, "Erro");
        }

        return $erros;
    }

}