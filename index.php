<?php 
session_start();
if (isset($_SESSION['errologin'])){
echo ($_SESSION['errologin']);
session_destroy();
}
?>


<html lang="en">
<head>
    
    <title>login</title>
</head>
<body>
    <form action = "Conectando" method="post">
    email = <input type = "text" name = "email"/><br/>
    senha = <input type = "password" name = "senha"/>
    <input type="submit" value = "enviar"/>
</form>

</body>
</html>
