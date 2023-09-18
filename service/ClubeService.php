<?php 
//Classe service para aluno

require_once(__DIR__ . "/../model/clube.php");

class ClubeService {

    public function validarDados(Clube $clube) {
        $erros = array();
        
        //Validar o nome
        if(! $clube->getNomeClube()) {
            array_push($erros, "Informe o nome!");
        }

        //Validar a idade
        if(! $clube->getIniciais()) {
            array_push($erros, "Informe a data de nascimento do clube$clube!");
        }

        //Validar estrangeiro
        if(! $clube->getEscudo()) {
            array_push($erros, "Informe se o clube$clube é estrangeiro!");
        }

        //Validar curso
        if(! $clube->getEstadio()) {
            array_push($erros, "Informe o curso!");
        }

        if(! $clube->getCor1()) {
            array_push($erros, "Informe o curso!");
        }

        if(! $clube->getCor2()) {
            array_push($erros, "Informe o curso!");
        }

        if(! $clube->getCor3()) {
            array_push($erros, "Informe o curso!");
        }

        return $erros;
    }

}