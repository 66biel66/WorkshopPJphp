<?php
session_start();
if (!isset($parametro) || !is_array($parametro)) {
    $parametro = [];
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f6fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .cabecalho {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background-color: #3498db;
            color: white;
            padding: 15px 20px;
            font-size: 20px;
            font-weight: bold;
            text-align: center;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            z-index: 1000;
        }

        .rodape {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            background-color: #3498db;
            color: white;
            padding: 10px 20px;
            font-size: 14px;
            text-align: center;
            box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.1);
            z-index: 1000;
        }

        .container {
            background-color: #ffffff;
            padding: 30px 40px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            box-sizing: border-box;
        }

        .erro {
            background-color: #f8d7da;
            color: #721c24;
            padding: 10px 20px;
            border: 1px solid #f5c6cb;
            border-radius: 5px;
            margin-bottom: 20px;
            text-align: center;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            margin-top: 10px;
            background-color: #3498db;
            color: white;
            border: none;
            padding: 12px;
            width: 100%;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #2980b9;
        }

        .cadastro-link {
            display: block;
            text-align: center;
            margin-top: 15px;
            color: #3498db;
            text-decoration: none;
        }

        .cadastro-link:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="container">

        <?php if (isset($_SESSION["erro"])): ?>
            <div class="erro"><?= $_SESSION["erro"] ?></div>
            <?php session_destroy(); ?>
        <?php endif; ?>

        <form method="POST" action="/Workshop/mvc/usuario/fazerLogin">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" name="email" id="email"
                    value="<?= (isset($parametro[0]["email"])) ? $parametro[0]["email"] : "" ?>">
            </div>

            <div class="form-group">
                <label for="senha">Senha:</label>
                <input type="password" name="senha" id="senha"
                    value="<?= (isset($parametro[0]["senha"])) ? $parametro[0]["senha"] : "" ?>">
            </div>

            <?php if (isset($parametro[0]['id'])): ?>
                <input type="hidden" name="id" value="<?= $parametro[0]['id'] ?>">
            <?php endif; ?>

            <input type="submit" value="Entrar">
        </form>

        <a class="cadastro-link" href="/Workshop/mvc/usuario/formulario">Cadastre-se!</a>
    </div>
</body>

</html>