<?php
include("conexao.php");
$email = $_POST ['email'];
$senha = $_POST['senha'];



$sql = "select id from usuarios where email='$email' and senha = '$senha'";



if ($resultado = $conn->query($sql)){
    $row = $resultado->fetch_assoc ();

    if(isset($row) && $row ['id'] != ''){
    session_start();
    $_SESSION ['id'] = $row['id'];
    $_SESSION ['email'] = $_POST['email'];
    $_SESSION ['senha'] = $_POST['senha'];
    header('Location: principal.php');

    }else{
        echo ("erro no login!");

    }

    
}else{

    echo("erro no banco!");
}


?>