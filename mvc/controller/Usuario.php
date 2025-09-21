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
        $this->template->layout("listar.php", $resultado);
    }

    public function inserir(){
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $senha = $_POST["senha"];
        $service = new UsuarioService();
        if (isset($_POST["id"]) && $_POST["id"] != "") {
            // Alterar cliente existente
            $id = $_POST["id"];
            $service->alterar($id, $nome, $email, $senha);
            session_start();
            $_SESSION["nome"] = $nome;
        } else {
            // Inserir novo cliente
            $service->inserir($nome, $email, $senha);
            session_start();
            $resultado = $service->getID($email);
            if(count($resultado) > 0){
            $_SESSION["id"] = $resultado[0]["id"];
            }
            $_SESSION["nome"] = $nome;
        }
        header("location: /Workshop/mvc/usuario/principal?info=1");
    }

    public function formulario(){
        $this->template->layout("form.php");
    }

    public function alterarForm(){
        $id = $_GET["id"];
        $service = new UsuarioService();
        $resultado = $service->listarId($id);
        $this->template->layout("form.php", $resultado);}

    public function login(){
        $this->template->layout("login.php");
    }

    public function fazerLogin(){
        $email = $_POST["email"];
        $senha = $_POST["senha"];
        $service = new UsuarioService();
        $resultado = $service->fazerLogin($email, $senha);
        if(count($resultado) > 0){
            // Login bem-sucedido
            session_start();
            $_SESSION["usuario"] = $resultado[0];
            $_SESSION["nome"] = $resultado[0]["nome"];
            $_SESSION["id"] = $resultado[0]["id"];
            header("location: /Workshop/mvc/usuario/principal");
        } else {
            session_start();
            $_SESSION["erro"] = "Email ou senha inválidos.";
            header("location: /Workshop/mvc/usuario/login");
        }
    }

    public function principal(){
        $this->template->layout("principal.php");
    }

    public function excluir(){
    if (isset($_POST["id"])) {
        $id = $_POST["id"];
        $service = new UsuarioService();
        $service->excluir($id);
        header("location: /Workshop/mvc/usuario/login");
    } else {
        echo "ID não informado!";
    }
    }
}