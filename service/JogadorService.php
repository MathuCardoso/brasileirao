<?php
//Classe service para aluno

require_once(__DIR__ . "/../model/Jogador.php");

class JogadorService
{

    public function validarDados(Jogador $jogador)
    {
        $erros = array();

        //Nome
        if (!$jogador->getNomeJogador()) {
            array_push($erros, "Erro");
        } elseif (strlen($jogador->getNomeJogador()) <= 2) {
            array_push($erros, "Erro");
        }

        //Idade
        if (!$jogador->getIdade()) {
            array_push($erros, "Erro");
        } else if ($jogador->getIdade() < 15) {
            array_push($erros, "Erro");
        } else if ($jogador->getIdade() > 50) {
            array_push($erros, "Erro");
        }

        $numero = trim($_POST['numero']) ? trim($_POST['numero']) : null;
        $idClube = trim($_POST['id_clube']) ? trim($_POST['id_clube']) : null;

        $sql = 'SELECT j.*
        FROM jogadores j
        WHERE j.numero = :numero
        AND j.id_clube = :id_clube;';
        $stmt = Connection::getConnection()->prepare($sql);
        $stmt->bindParam(':numero', $numero, PDO::PARAM_INT);
        $stmt->bindParam(':id_clube', $idClube, PDO::PARAM_INT);
        $stmt->execute();
        $camisaIgual = $stmt->fetchAll();

        //Número
        if (!$jogador->getNumero()) {
            array_push($erros, "Erro");
        } elseif ($jogador->getNumero() < 1 || $jogador->getNumero() > 99) {
            array_push($erros, "Erro");
        } elseif (count($camisaIgual) > 0) {
            array_push($erros, "Erro");
        }

        //Nome no uniforme
        if (!$jogador->getNomeUniforme()) {
            array_push($erros, "Erro");
        }

        //Altura
        if (!$jogador->getAltura()) {
            array_push($erros, "Erro");
        } elseif ($jogador->getAltura() < 140) {
            array_push($erros, "Erro");
        } elseif ($jogador->getAltura() > 220) {
            array_push($erros, "Erro");
        }

        //Peso
        if (!$jogador->getPeso()) {
            array_push($erros, "Erro");
        } elseif ($jogador->getPeso() < 50) {
            array_push($erros, "Erro");
        } elseif ($jogador->getPeso() > 190) {
            array_push($erros, "Erro");
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

        if (!$jogador->getClube()) {
            array_push($erros, "Erro");
        }

        return $erros;
    }
}
