<?php 
//Classe service para aluno

require_once(__DIR__ . "/../model/Jogador.php");

class JogadorService {

    public function validarDados(Jogador $jogador) {
        $erros = array();
        
        //Validar o nome
        if(! $jogador->getNomeJogador()) {
            array_push($erros, "Informe o nome do jogador!");
        }

        //Validar a idade
        if(! $jogador->getIdade()) {
            array_push($erros, "Informe a idade do jogador!");
        }

        //Validar estrangeiro
        if(! $jogador->getNumero()) {
            array_push($erros, "Informe o número do jogador!");
        }

        //Validar curso
        if(! $jogador->getNomeUniforme()) {
            array_push($erros, "Informe o nome no uniforme!");
        }

        if(! $jogador->getAltura()) {
            array_push($erros, "Informe a altura do jogador!");
        }

        if(! $jogador->getPeso()) {
            array_push($erros, "Informe o peso do jogador!");
        }

        if($jogador->getPeso() > 150) {
            array_push($erros, "Um jogador não pode ser tão pesado!");
        }

        if(! $jogador->getPe()) {
            array_push($erros, "Informe se o jogador é destro, canhoto ou ambidestro!");
        }

        if(! $jogador->getPais()) {
            array_push($erros, "Informe o país do jogador!");
        }

        if(! $jogador->getPosicao()) {
            array_push($erros, "Informe a posição do jogador!");
        }

        if(! $jogador->getClube()) {
            array_push($erros, "Informe o clube do jogador!");
        }

        return $erros;
    }

}