<?php

namespace dao\mysql;

use dao\IUsuarioDAO;
use generic\MysqlFactory;

class UsuarioDAO extends MysqlFactory implements IUsuarioDAO{
    public function listar(){
        $sql = "select id,nome,senha,email from usuarios";
        $retorno = $this->banco->executar($sql);
        return $retorno;
    }

    public function listarId($id){
        $sql = "select id,nome,senha,email from usuarios where id =:id";
        $param = [
            ":id" => $id
        ];
        $retorno = $this->banco->executar($sql, $param);
        return $retorno;
    }

    public function inserir($nome, $email, $senha){
        $sql = "insert into usuarios (nome,email,senha) values (:nome, :email, :senha)";
        $param = [
            ":nome" => $nome, 
            ":email" => $email, 
            ":senha" => $senha
        ];
        $retorno = $this->banco->executar($sql, $param);
        return $retorno;
    }

    public function alterar($id, $nome, $email, $senha){
        $sql = "update usuarios set nome = :nome, email = :email, senha = :senha where id = :id";
        $param = [
            ":id" => $id, 
            ":nome" => $nome, 
            ":email" => $email, 
            ":senha" => $senha
        ];
        $retorno = $this->banco->executar($sql, $param);
        return $retorno;
    }

    public function fazerLogin($email,$senha){
        $sql = "select id,nome,senha,email from usuarios where email = :email and senha = :senha";
        $param = [
            ":email" => $email,
            ":senha" => $senha
        ];
        $retorno = $this->banco->executar($sql, $param);
        return $retorno;
    }

    public function excluir($id){
    // Exclui todas as inscrições do usuário
    $sqlInscricoes = "DELETE FROM inscricoes WHERE usuario_id = :id";
    $param = [":id" => $id];
    $this->banco->executar($sqlInscricoes, $param);

    // Agora exclui o usuário
    $sqlUsuario = "DELETE FROM usuarios WHERE id = :id";
    $this->banco->executar($sqlUsuario, $param);

    return true;
    }

    public function getID($email){
    $sql = "select id from usuarios where email = :email";
    $param = [
        ":email" => $email
    ];
    $retorno = $this->banco->executar($sql, $param);
    return $retorno;
    }
}
