<?php
require_once '../config/Conexao.php';

$db = Conexao::getInstance();

$email = $_POST ['email'];
$senha = $_POST['senha'];

$sql = $db->executar("select id, nome from usuarios where email='$email' and senha = '$senha'");

if(executar($sql) > 0){
    session_start();
    $_SESSION['id'] = $sql[0]['id'];
    $_SESSION['nome'] = $sql[0]['nome'];
    $_SESSION ['email'] = $_POST['email'];
    $_SESSION ['senha'] = $_POST['senha'];
    header('Location: Menu');
} else {
    session_start();
    $_SESSION["errologin"] = "Usuário ou senha inválido";
    header ('Location: Login');
}

?>

<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de Login</title>
    <link rel="stylesheet" href="tamplate/Principal.css">
<style>

</style>

</head>

<body>
     <link rel="stylesheet" href="tamplate/Principal.css">

<div id="Topo">
        <form action="Login" method="post">
            <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" placeholder="Digitel seu email"><br>

        <label for="senha">Senha</label><br>
        <input type="password" id="senha" name="senha" placeholder="Digite sua senha"><br>

        <input type="submit" value="Entrar">

        </form>

        <form action="Sair" method="post">
        <input type="submit" value="Sair">

    </div>

    <div id="lateral">

    </div>
      
    <div id="menu">
       
    </div>
</div>