<?php
namespace controller;

use service\InscricaoService;

class Inscricao{
    public function __construct(){
        
    }

    public function listarInscricao(){
        $service = new InscricaoService();
        $resultado = $service->listarInscricao();
        return $resultado;
    }

    public function inscrever($usuario_id, $workshop_id){
        $service = new InscricaoService();
        $resultado = $service->inscrever($usuario_id, $workshop_id);
        return $resultado;
    }

    public function sair($id){
        $service = new InscricaoService();
        $resultado = $service->sair($id);
        return $resultado;
    }
}
