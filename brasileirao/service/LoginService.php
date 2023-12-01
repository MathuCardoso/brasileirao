<?php

require_once(__DIR__ . "../../model/Usuario.php");

class LoginService
{

    public function validarDados($usuario, $senha)
    {
        $erros = array();

        if (!$usuario)
            array_push($erros, "Informe o usuário.");

        if (!$senha)
            array_push($erros, "Informe a senha.");

        return $erros;
    }

    public function salvarUsuarioSessao($usuario)
    {
        session_start();

        $_SESSION['USU_ID'] = $usuario->getId();
        $_SESSION['USU_NOME'] = $usuario->getNome();
    }

    public function getNomeUsuarioSessao()
    {
        if (session_status() != PHP_SESSION_ACTIVE)
            session_start();

        if (isset($_SESSION['USU_NOME']))
            return $_SESSION['USU_NOME'];
        return null;
    }

    public function excluirUsuarioSessao()
    {
        session_start();
        session_unset();
        session_destroy();
    }
}
