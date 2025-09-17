<?php
require_once '../config/Conexao.php';

$db = Conexao::getInstance();

$email = $_POST ['email'];
$senha = $_POST['senha'];

$sql = $db->executar("select id, nome from usuarios where email='$email' and senha = '$senha'");

if(count($sql) > 0){
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