<?php
namespace service;
use dao\mysql\UsuarioDAO;

class UsuarioService extends UsuarioDAO{
    public function listarUsuarios(){
        return parent::listar();
    }

    public function inserir($nome, $email, $senha){
        return parent::inserir($nome, $email, $senha);
    }

    public function alterar($id, $nome, $email, $senha){;
        return parent::alterar($id, $nome, $email, $senha);
    }

    public function listarId($id){
        return parent::listarId($id);
    }
}