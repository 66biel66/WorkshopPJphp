<?php

session_start();

if( !isset($_SESSION ['nome']) || $_SESSION ['nome'] ==''){
    header("Location :  index.php");

}
echo ("ola".$_SESSION['nome']);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<style>

    .CONTAINER{

        display: flex;

    };
</style>

</head>

<body>
    

<div style="width: 1000px;  margin: 0 auto;">
    <div style="max-width: 100%;min-height: 100px; background-color: dimgray;">
        <button type="button">sair</button>
    </div>

    <div style="width: 200px; min-height: 500px; background-color: gray;float: left;">

    </div>

    <div style="width: 800px; min-height: 500px; background-color: bisque; float: left;" >

    </div>
</div>


</body>
</html>
