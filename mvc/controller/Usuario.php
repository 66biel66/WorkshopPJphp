<?php

namespace controller;

use service\UsuarioService;
use template\UsuarioTemp;
use template\Itemplate;

class Usuario{
    private Itemplate $template;
    public function __construct(){
        $this-> template = new UsuarioTemp();
    }

    public function listar(){
        $service = new UsuarioService();
        $resultado = $service->listarUsuarios();
        $this->template->layout("\\public\\listar.php", $resultado);
    }

    public function inserir(){
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $senha = $_POST["senha"];
        $service = new UsuarioService();
        $resultado = $service->inserir($nome, $email, $senha);
        header("location: /mvc/usuario/lista?info=1");
    }

    public function formulario(){
        $this->template->layout("\\public\\usuario\\form.php");
    }

    public function alterarForm(){
        $id = $_GET["id"];
        $service = new UsuarioService();
        $resultado = $service->listarId($id);
        $this->template->layout("\\public\\usuario\\form.php", $resultado);}
}