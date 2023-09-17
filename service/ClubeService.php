<?php 
//Classe service para aluno

require_once(__DIR__ . "/../model/Jogador.php");

class JogadorService {

    public function validarDados(Jogadores $jogador) {
        $erros = array();
        
        //Validar o nome
        if(! $jogador->getNome()) {
            array_push($erros, "Informe o nome!");
        }

        //Validar a idade
        if(! $jogador->getNascimento()) {
            array_push($erros, "Informe a data de nascimento do jogador!");
        }

        //Validar estrangeiro
        if(! $jogador->getEstrangeiro()) {
            array_push($erros, "Informe se o jogador é estrangeiro!");
        }

        //Validar curso
        if(! $jogador->getCurso()) {
            array_push($erros, "Informe o curso!");
        }

        return $erros;
    }

}