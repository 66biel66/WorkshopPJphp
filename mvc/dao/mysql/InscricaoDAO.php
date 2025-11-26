<?php

namespace dao\mysql;

use dao\IInscricaoDAO;
use generic\MysqlFactory;

class InscricaoDAO extends MysqlFactory implements IInscricaoDAO {

    public function listarInscricao(){
        $sql = "SELECT id,usuario_id,workshop_id FROM inscricoes";
        $retorno = $this->banco->executar($sql);
        return $retorno;
    }

    public function inscrever($usuario_id, $workshop_id){
        $sqlVerificaU = "SELECT id from usuarios where :usuario_id = id";
        $paramVerificaU = [":usuario_id" => $usuario_id];
        $usuarioExisteU = $this->banco->executar($sqlVerificaU, $paramVerificaU);
        if (count($usuarioExisteU) == 0) {
            $msg = array('erro' => "Usuario não existe");
            $jmsg = json_encode($msg);
            http_response_code(400);
            header("Content-Type: application/json");
            echo $jmsg;
            exit;
        }

        $sqlVerificaW = "SELECT id from workshops where :workshop_id = id";
        $paramVerificaW = [":workshop_id" => $workshop_id];
        $usuarioExisteW = $this->banco->executar($sqlVerificaW, $paramVerificaW);
        if (count($usuarioExisteW) == 0) {
            $msg = array('erro' => "Workshop não existe");
            $jmsg = json_encode($msg);
            http_response_code(400);
            header("Content-Type: application/json");
            echo $jmsg;
            exit;
        }

	$sqlVerifica = "SELECT id,usuario_id,workshop_id FROM inscricoes WHERE :workshop_id = workshop_id AND :usuario_id = usuario_id";
        $paramVerifica = [":usuario_id" => $usuario_id, ":workshop_id" => $workshop_id];
        $usuarioExiste = $this->banco->executar($sqlVerifica, $paramVerifica);
        if (count($usuarioExiste) > 0) {
            $msg = array('erro' => "Já está isncrito!");
            $jmsg = json_encode($msg);
            http_response_code(400);
            header("Content-Type: application/json");
            echo $jmsg;
            exit;
        }

        $sql = "INSERT INTO inscricoes (usuario_id, workshop_id) VALUES (:usuario_id, :workshop_id)";
        $param = [
            ":usuario_id" => $usuario_id,
            ":workshop_id" => $workshop_id
        ];
        $this->banco->executar($sql, $param);
        return $param;
    }

    public function sair($id){
        $sqlVerifica = "SELECT id FROM inscricoes WHERE id = :id";
        $paramVerifica = [":id" => $id];
        $usuarioExiste = $this->banco->executar($sqlVerifica, $paramVerifica);
        if (count($usuarioExiste) == 0) {
            $msg = array('erro' => "Inscricao não existe!");
            $jmsg = json_encode($msg);
            http_response_code(400);
            header("Content-Type: application/json");
            echo $jmsg;
            exit;
        }

        $sql = "delete from inscricoes where id = :id";
        $param = [
            "id" => $id
        ];
        $retorno = $this->banco->executar($sql, $param);
        return $param;
    }
}