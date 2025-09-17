<?php

session_start();

if( !isset($_SESSION ['email']) || $_SESSION ['email'] ==''){
    header("Location :  index.php");
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<style>

</style>

</head>

<body>
     <link rel="stylesheet" href="controller/Principal.css">

<div id="principal">
    <div id="topo" >
        <form action="Sair" method="post">
        <input type="submit" value="sair"></button>
        </form>
    </div>

    <div id="lateral">

    </div>

    <div id="menu">

    </div>
</div>


</body>
</html>
