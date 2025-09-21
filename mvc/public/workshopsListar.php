<?php
if (!isset($parametro) || !is_array($parametro)) {
    $parametro = [];
}
$workshop = $parametro['workshop'] ?? [];
$usuarios = $parametro['usuarios'] ?? [];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Detalhes do Workshop</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f6fa;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
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
            margin-top: 100px;
            margin-bottom: 80px;
            width: 100%;
            max-width: 800px;
            background-color: #ffffff;
            padding: 30px 40px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            box-sizing: border-box;
        }

        h2 {
            margin-top: 0;
            color: #2c3e50;
        }

        p {
            margin: 10px 0;
            color: #34495e;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table th,
        table td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        table th {
            background-color: #3498db;
            color: white;
        }

        table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        input[type="submit"] {
            background-color: #3498db;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 14px;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #2980b9;
        }

        form {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

    <div class="cabecalho">
        Detalhes do Workshop
    </div>

    <div class="container">

        <form method="POST" action="/Workshop/mvc/usuario/principal">
            <input type="submit" value="Voltar">
        </form>

        <?php if ($workshop): ?>
            <h2><?= htmlspecialchars($workshop['titulo'] ?? $workshop['nome'] ?? '') ?></h2>
            <p><?= htmlspecialchars($workshop['descricao'] ?? '') ?></p>
            <p><strong>Data:</strong> <?= htmlspecialchars($workshop['data'] ?? '') ?></p>
        <?php endif; ?>

        <table>
            <tr>
                <th>Inscritos</th>
            </tr>
            <?php foreach($usuarios as $p): ?>
                <tr>
                    <td><?= htmlspecialchars($p['nome']) ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>

    <div class="rodape">
        &copy; <?= date("Y") ?> - Todos os direitos reservados.
    </div>

</body>
</html>
