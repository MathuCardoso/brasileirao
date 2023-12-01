<?php

require_once(__DIR__ . "/../service/LoginService.php");
require_once(__DIR__ . "/../dao/UsuarioDAO.php");

class LoginController
{


    private LoginService $loginService;
    private UsuarioDAO $usuarioDAO;

    public function __construct()
    {
        $this->usuarioDAO = new UsuarioDAO();
        $this->loginService = new LoginService();
    }

    public function logar($usuario, $senha)
    {
        $erros = $this->loginService->validarDados($usuario, $senha);
        if ($erros)
            return $erros;

        $usuario =
            $this->usuarioDAO->findByLoginSenha($usuario, $senha);
        if (!$usuario) {
            array_push($erros, "Usuário ou senha inválidos!");
            return $erros;
        }

        $this->loginService->salvarUsuarioSessao($usuario);

        return array();
    }

    public function deslogar()
    {
        $this->loginService->excluirUsuarioSessao();
    }

    

    public function verificarUsuarioLogado()
    {
        $nomeUsuario = $this->loginService->getNomeUsuarioSessao();
        if ($nomeUsuario)
            return true;

        return false;
    }

    public function getNomeUsuario()
    {
        return $this->loginService->getNomeUsuarioSessao();
    }

}
