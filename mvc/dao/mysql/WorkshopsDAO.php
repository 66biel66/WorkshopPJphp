<?php

namespace dao\mysql;

use dao\IWorkshopsDAO;
use generic\MysqlFactory;

class WorkshopsDAO extends MysqlFactory implements IWorkshopsDAO{
    public function listarWorkshop(){
    $sql = "SELECT titulo, descricao, data FROM workshops";
    $retorno = $this->banco->executar($sql);
    return $retorno;
    }

    public function adicionar($titulo, $descricao, $data){
        $sql = "insert into workshops (titulo,descricao,data) values (:titulo, :descricao, :data)";
        $param = [
            ":titulo" => $titulo, 
            ":descricao" => $descricao, 
            ":data" => $data
        ];
        $this->banco->executar($sql, $param);
        return $param;
    }

    public function alterar($id, $titulo, $descricao, $data){
        $sqlVerifica = "SELECT id FROM workshops WHERE id = :id";
        $paramVerifica = [":id" => $id];
        $usuarioExiste = $this->banco->executar($sqlVerifica, $paramVerifica);
        if (count($usuarioExiste) == 0) {
            $msg = array('erro' => "Workshop não existe!");
            $jmsg = json_encode($msg);
            http_response_code(400);
            header("Content-Type: application/json");
            echo $jmsg;
            exit;
        }

        $sql = "update workshops set titulo = :titulo, descricao = :descricao, data = :data where id = :id";
        $param = [
            ":id" => $id, 
            ":titulo" => $titulo, 
            ":descricao" => $descricao, 
            ":data" => $data
        ];
        $this->banco->executar($sql, $param);
        return $param;
    }

    public function excluir($id){
        $sqlVerifica = "SELECT id FROM workshops WHERE id = :id";
        $paramVerifica = [":id" => $id];
        $usuarioExiste = $this->banco->executar($sqlVerifica, $paramVerifica);
        if (count($usuarioExiste) == 0) {
            $msg = array('erro' => "Workshop não existe!");
            $jmsg = json_encode($msg);
            http_response_code(400);
            header("Content-Type: application/json");
            echo $jmsg;
            exit;
        }

        // Exclui todas as inscrições do workshop
        $sqlInscricoes = "DELETE FROM inscricoes WHERE workshop_id = :id";
        $param = [":id" => $id];
        $this->banco->executar($sqlInscricoes, $param);
        // Agora exclui o workshop
        $sqlWorkshop = "DELETE FROM workshops WHERE id = :id";
        $this->banco->executar($sqlWorkshop, $param);
        return $param;
    }
}
