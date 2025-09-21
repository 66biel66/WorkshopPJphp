<?php

namespace service;

use dao\mysql\UsuarioDAO;

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

    public function listarId($id)
    {
        return parent::listarId($id);
    }

    public function fazerLogin($email, $senha)
    {
        return parent::fazerLogin($email, $senha);
    }

    public function excluir($id)
    {
        return parent::excluir($id);
    }

    public function getID($email)
    {
        return parent::getID($email);
    }
}
