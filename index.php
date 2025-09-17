<<<<<<< HEAD
<?php
include "mvc/generic/Autoload.php";
use generic\Controller;
=======
<?php 
include "generic/autoload.php";
use generic\Controller;
if (isset($_GET['param'])){
    $controller = new Controller();
    $controller->verificarchamada($_GET['param']);  
}
session_start();
if (isset($_SESSION['errologin'])){
echo ($_SESSION['errologin']);
session_destroy();
}

?>
>>>>>>> e1b4b65d7ea24e527d6e37665b7c02fee7eee253

if (isset($_GET["param"])){
    $controller = new Controller();
    $controller->verificarChamadas($_GET["param"]);
}