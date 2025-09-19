<?php
include "mvc/generic/Autoload.php";

use generic\Controller;

if(isset($_GET["param"])){
    $controller = new Controller();
    $controller->verificarChamadas($_GET["param"]);
}

/*
session_start();
if (isset($_SESSION['errologin'])){
echo ($_SESSION['errologin']);
session_destroy();
}
  $acao = $_GET['param'] ?? 'mvc/public/home.php';
        $controller = new Controller();
        $controller->verificarChamadas ($_GET['param']);  

if (isset($_GET["param"])){
    $controller = new Controller();
    $controller->verificarChamadas($_GET["param"]);
}
*/

?>
