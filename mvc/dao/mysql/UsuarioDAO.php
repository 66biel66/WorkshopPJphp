<?php

namespace dao\mysql;

use dao\IUsuarioDAO;
use generic\MysqlFactory;

class UsuarioDAO extends MysqlFactory implements IUsuarioDAO{
    public function listar(){
        $sql = "select id,email,senha from usuarios";
        $retorno = $this->banco->executar($sql);
        return $retorno;
    }

    public function listarId($id){
        $sql = "select id,email,senha from usuarios where id =:id";
        $param = [":id" => $id];
        $retorno = $this->banco->executar($sql, $param);
        return $retorno;
    }

    public function inserir($nome, $email, $senha){
        $sql = "insert into usuarios (nome,email,senha) values (:nome, :email, :senha)";
        $param = [":nome" => $nome, ":email" => $email, ":senha" => $senha];
        $retorno = $this->banco->executar($sql, $param);
        return $retorno;
    }

    public function alterar($id, $nome, $email, $senha){
        $sql = "update usuarios set nome = :nome, email = :email, senha = :senha where id = :id";
        $param = [":id" => $id, ":nome" => $nome, ":email" => $email, ":senha" => $senha];
        $retorno = $this->banco->executar($sql, $param);
        return $retorno;
    }

}
