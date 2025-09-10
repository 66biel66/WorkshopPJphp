<?php
include("conexao.php");
$nome = $_POST ['nome'];
$email = $_POST['email'];



$sql = "select id from usuarios where nome='$nome' and email = '$email'";



if ($resultado = $conn->query($sql)){
    $row = $resultado->fetch_assoc ();

    if(isset($row) && $row ['id'] != ''){
    session_start();
    $_SESSION ['id'] = $row['id'];
    $_SESSION ['nome'] = $_POST['nome'];
    $_SESSION ['email'] = $_POST['email'];
    header('Location: principal.php');

    }else{
        echo ("erro no login!");

    }

    
}else{

    echo("erro no banco!");
}


?>