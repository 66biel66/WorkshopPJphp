<?php
namespace service;

use dao\mysql\WorkshopsDAO;

class WorkshopsService extends WorkshopsDAO
{
    public function listarWorkshop()
    {
        return parent::listarWorkshop();
    }
    public function adicionar($titulo, $descricao, $data)
    {
        return parent::adicionar($titulo, $descricao, $data);
    }
    public function alterar($id, $titulo, $descricao, $data)
    {
        return parent::alterar($id, $titulo, $descricao, $data);
    }
    public function excluir($id)
    {
        return parent::excluir($id);
    }
}
