<?php
namespace dao;

interface IWorkshopsDAO{
    public function listarWorkshop();
    public function adicionar($titulo, $descricao, $data);
    public function alterar($id, $titulo, $descricao, $data);
    public function excluir($id);
}