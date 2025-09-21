<?php

namespace dao\mysql;

use dao\IWorkshopsDAO;
use generic\MysqlFactory;

class WorkshopsDAO extends MysqlFactory implements IWorkshopsDAO{
    public function listarWorkshop($id)
{
    $sql = "SELECT titulo, descricao, data FROM workshops WHERE id = :id";
    $param = [":id" => $id];
    return $this->banco->executar($sql, $param);
}

    public function listarUsuarios($workshop_id)
    {
    $sql = "SELECT u.nome 
            FROM usuarios u
            JOIN inscricoes i ON u.id = i.usuario_id
            WHERE i.workshop_id = :workshop_id";
    $param = [
        ":workshop_id" => $workshop_id
    ];
    return $this->banco->executar($sql, $param);
    }
}
