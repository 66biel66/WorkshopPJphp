<?php

namespace service;

use dao\mysql\UsuarioDAO;
use generic\JWTAuth;
use stdClass;

class UsuarioService extends UsuarioDAO
{  
    public function listarUsuarios()
    {
        return parent::listar();
    }

    public function inserir($nome, $email, $senha)
    {
        return parent::inserir($nome, $email, $senha);
    }

    public function alterar($id, $nome, $email, $senha)
    {
        return parent::alterar($id, $nome, $email, $senha);
    }

    public function excluir($id)
    {
        return parent::excluir($id);
    }

    public function autenticar($email, $senha){
        $rows = parent::autenticar($email, $senha);
        if($rows){
            $jwt = new JWTAuth();
            $objeto = new stdClass();
            $objeto->email=$rows[0]["email"];
            $objeto->senha=$rows[0]["senha"];

            return $jwt->criarChave(json_encode($objeto));
        }
    }

    /*public function listarId($id)
    {
        return parent::listarId($id);
    }

    public function fazerLogin($email, $senha)
    {
        return parent::fazerLogin($email, $senha);
    }

    

    public function getID($email)
    {
        return parent::getID($email);
    }

    public function login()
    {
        return parent::login();
    }
    /*public function autenticar($email, $senha)
    {
        $rows = parent::verificaLogin($email, $senha);
        if ($rows) {
            $jwt = new JWTAuth();
            $objeto = new stdClass();
            $objeto->email=$rows[0]["email"];
            $objeto->senha=$rows[0]["senha"];

            return $jwt->criarChave(json_encode($objeto));
        }
        http_response_code(401);
    }*/
}
