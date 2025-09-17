<?php
<<<<<<< HEAD:mvc/generic/Autoload.php
namespace generic;

spl_autoload_register(function($class){
    $file = __DIR__ . '/../' . str_replace('\\', '/', $class) . '.php';
    if (file_exists($file)) {
        include $file;
    }
});
=======

spl_autoload_register(function($class){

    include $class . ".php";

});




>>>>>>> e1b4b65d7ea24e527d6e37665b7c02fee7eee253:generic/Autoload.php
?>