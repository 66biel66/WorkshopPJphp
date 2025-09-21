<?php

namespace dao\mysql;

use dao\IInscricaoDAO;
use generic\MysqlFactory;

class InscricaoDAO extends MysqlFactory implements IInscricaoDAO {
    public function inscrever($usuario_id, $workshop_id){
        $sql = "INSERT INTO inscricoes (usuario_id, workshop_id) VALUES (:usuario_id, :workshop_id)";
        $param = [
            ":usuario_id" => $usuario_id,
            ":workshop_id" => $workshop_id
        ];
        $retorno = $this->banco->executar($sql, $param);
        return $retorno;
    }

    public function sair($usuario_id){
        $sql = "delete from inscricoes where usuario_id = :usuario_id";
        $param = [
            ":usuario_id" => $usuario_id
        ];
        $retorno = $this->banco->executar($sql, $param);
        return $retorno;
    }

    public function jaInscrito($usuario_id, $workshop_id){
    $sql = "SELECT id FROM inscricoes WHERE usuario_id = :usuario_id AND workshop_id = :workshop_id";
    $param = [
        ":usuario_id" => $usuario_id,
        ":workshop_id" => $workshop_id
    ];
    $retorno = $this->banco->executar($sql, $param);
    return $retorno;
    }

    public function sairDoWorkshop($usuario_id, $workshop_id){
    $sql = "DELETE FROM inscricoes WHERE usuario_id = :usuario_id AND workshop_id = :workshop_id";
    $param = [
        ":usuario_id" => $usuario_id,
        ":workshop_id" => $workshop_id
    ];
    $retorno = $this->banco->executar($sql, $param);
    return $retorno;
    }
}