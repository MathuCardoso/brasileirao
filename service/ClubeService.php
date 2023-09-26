<?php
//Classe service para aluno

require_once(__DIR__ . "/../model/Clube.php");

class ClubeService
{

    public function validarDados(Clube $clube)
    {
        $erros = array();

        //Validar o nome
        if (!$clube->getNomeClube()) {
            array_push($erros, "Erro");
        }elseif (strlen($clube->getNomeClube()) <= 3) {
            array_push($erros, "Erro");
        }

        //Validar as iniciais
        if (!$clube->getIniciais()) {
            array_push($erros, "Erro");
        }elseif (strlen($clube->getIniciais()) > 3) {
            array_push($erros, "Erro");
        } elseif (strlen($clube->getIniciais()) < 3) {
            array_push($erros, "Erro");
        }

        //Validar sede
        if (!$clube->getSede()) {
            array_push($erros, "Erro");
        }

        //Validar técnico
        if (!$clube->getTecnico()) {
            array_push($erros, "Erro");
        }

        //Validar cor 1
        if (!$clube->getCor1()) {
            array_push($erros, "Erro");
        }

        //Validar cor 2
        if (!$clube->getCor2()) {
            array_push($erros, "Erro");
        }

        //Validar o estádio
        if (!$clube->getEstadio()) {
            array_push($erros, "Erro");
        }


        return $erros;
    }
}
