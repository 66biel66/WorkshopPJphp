<?php
namespace controller;

use service\UsuarioService;

class Usuario{
    public function __construct(){
        
    }

    public function listar(){
        $service = new UsuarioService();
        $resultado = $service->listarUsuarios();
        return $resultado;
    }

    public function inserir($nome, $email, $senha){
        $service = new UsuarioService();
        $resultado = $service->inserir($nome, $email, $senha);
        return $resultado;
    }

    public function alterar($id, $nome, $email, $senha){
        $service = new UsuarioService();
        $resultado = $service->alterar($id, $nome, $email, $senha);
        return $resultado;
    }

    public function excluir($id){
        $service = new UsuarioService();
        $resultado = $service->excluir($id);
        return $resultado;
    }

    public function autenticar($email, $senha){
        $service = new UsuarioService();
        $resultado = $service->autenticar($email, $senha);
        return $resultado;
    }
}
