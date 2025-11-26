<?php
namespace controller;

use service\WorkshopsService;

class Workshops{
    public function __construct(){
        
    }

    public function listarWorkshop(){
        $service = new WorkshopsService();
        $resultado = $service->listarWorkshop();
        return $resultado;
    }

    public function adicionar($titulo, $descricao, $data){
        $service = new WorkshopsService();
        $resultado = $service->adicionar($titulo, $descricao, $data);
        return $resultado;
    }

    public function alterar($id, $titulo, $descricao, $data){
        $service = new WorkshopsService();
        $resultado = $service->alterar($id, $titulo, $descricao, $data);
        return $resultado;
    }

    public function excluir($id){
        $service = new WorkshopsService();
        $resultado = $service->excluir($id);
        return $resultado;
    }
}