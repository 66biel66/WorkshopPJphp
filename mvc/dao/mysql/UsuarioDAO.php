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
 
    public function inserir($nome, $email, $senha){
        $sql = "insert into usuarios (nome,email,senha) values (:nome, :email, :senha)";
        $param = [
            ":nome" => $nome, 
            ":email" => $email, 
            ":senha" => $senha
        ];
        $this->banco->executar($sql, $param);
        return $param;
    }

    public function alterar($id, $nome, $email, $senha){
        $sqlVerifica = "SELECT id FROM usuarios WHERE id = :id";
        $paramVerifica = [":id" => $id];
        $usuarioExiste = $this->banco->executar($sqlVerifica, $paramVerifica);
        if (count($usuarioExiste) == 0) {
            $msg = array('erro' => "Usuario não existe!");
            $jmsg = json_encode($msg);
            http_response_code(400);
            header("Content-Type: application/json");
            echo $jmsg;
            exit;
        }

        $sql = "update usuarios set nome = :nome, email = :email, senha = :senha where id = :id";
        $param = [
            ":id" => $id, 
            ":nome" => $nome, 
            ":email" => $email, 
            ":senha" => $senha
        ];
        $this->banco->executar($sql, $param);
        return $param;
    }

    public function excluir($id){
        $sqlVerifica = "SELECT id FROM usuarios WHERE id = :id";
        $paramVerifica = [":id" => $id];
        $usuarioExiste = $this->banco->executar($sqlVerifica, $paramVerifica);
        if (count($usuarioExiste) == 0) {
            $msg = array('erro' => "Usuario não existe!");
            $jmsg = json_encode($msg);
            http_response_code(400);
            header("Content-Type: application/json");
            echo $jmsg;
            exit;
        }

        // Exclui todas as inscrições do usuário
        $sqlInscricoes = "DELETE FROM inscricoes WHERE usuario_id = :id";
        $param = [":id" => $id];
        $this->banco->executar($sqlInscricoes, $param);
        // Agora exclui o usuário
        $sqlUsuario = "DELETE FROM usuarios WHERE id = :id";
        $this->banco->executar($sqlUsuario, $param);
        return $param;
    }

    public function autenticar($email, $senha){
        $sqlVerifica = "SELECT email,senha FROM usuarios WHERE email = :email AND senha = :senha";
        $paramVerifica = [":email" => $email, ":senha" => $senha];
        $usuarioExiste = $this->banco->executar($sqlVerifica, $paramVerifica);
        if (count($usuarioExiste) == 0) {
            $msg = array('erro' => "Email ou senha incorretos!");
            $jmsg = json_encode($msg);
            http_response_code(400);
            header("Content-Type: application/json");
            echo $jmsg;
            exit;
        }

        $sql = "select id, nome, senha, email from usuarios where email = :email and senha = :senha";
        $param = [
            ":email" => $email,
            ":senha" => $senha
        ];
        $retorno = $this->banco->executar($sql, $param);
        return $retorno;
    }
}
