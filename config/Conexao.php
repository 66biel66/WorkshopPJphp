<?php

    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $dbname = "workshop";


    $conn = new mysqli($servidor, $usuario,$senha,$dbname);

    if ($conn->connect_error){
        die ("falha na conexão". $conn->connect_error);

    }

?>