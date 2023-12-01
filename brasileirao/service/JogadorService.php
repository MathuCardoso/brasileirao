<?php
//Classe service para aluno

require_once(__DIR__ . "/../model/Jogador.php");
require_once(__DIR__ . "/../dao/JogadorDAO.php");

class JogadorService
{

    public function validarDados(Jogador $jogador)
    {
        $erros = array();

        //Nome
        if (!$jogador->getNomeJogador()) {
            $erros['nomeJogador'] = "Nome do jogador:";
        } elseif (strlen($jogador->getNomeJogador()) <= 2) {
            $erros['nomeJogador'] = "Isso é realmente um nome?";
        }

        //Idade
        if (!$jogador->getIdade()) {
            array_push($erros, "Erro");
        } else if ($jogador->getIdade() < 15) {
            array_push($erros, "Erro");
        } else if ($jogador->getIdade() > 50) {
            array_push($erros, "Erro");
        }
            
        //Número
        if (!$jogador->getNumero()) {
            $erros['numero'] = "Número:";
        } elseif ($jogador->getNumero() < 1 || $jogador->getNumero() > 99) {
            $erros['numero'] = "Número entre 1 e 99:";
        } elseif ($jogador->getClube()) {
            $jogDao = new JogadorDAO();
            $jogMesmoNumero = $jogDao->findByNumeroClube($jogador->getNumero(), 
                                                         $jogador->getClube()->getId(),
                                                         $jogador->getId());
            if(count($jogMesmoNumero) > 0)
                $erros['numero'] = "Escolha outro número!";
        }

        //Nome no uniforme
        if (!$jogador->getNomeUniforme()) {
            $erros['nome_uniforme'] = "Nome no uniforme:";
        }

        //Altura
        if (!$jogador->getAltura()) {
            $erros['altura'] = "Altura:";
        } elseif ($jogador->getAltura() < 140) {
            $erros['altura'] = "Jogador baixo de mais.";
        } elseif ($jogador->getAltura() > 220) {
            $erros['altura'] = "Jogador alto de mais.";
        }

        //Peso
        if (!$jogador->getPeso()) {
            $erros['peso'] = "Peso:";
        } elseif ($jogador->getPeso() < 50) {
            $erros['pwso'] = "Jogador leve de mais.";
        } elseif ($jogador->getPeso() > 190) {
            $erros['peso'] = "Jogador pesado de mais.";
        }

        //Pé
        if (!$jogador->getPe()) {
            array_push($erros, "Erro");
        }

        //País
        if (!$jogador->getPais()) {
            array_push($erros, "Erro");
        }

        //Posição
        if (!$jogador->getPosicao()) {
            array_push($erros, "Erro");
        }

        //Clube
        if (!$jogador->getClube()) {
            array_push($erros, "Erro");
        }

        return $erros;
    }
}
