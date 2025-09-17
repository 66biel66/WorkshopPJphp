<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="/mvc/usuario/formulario">Novo Usuário</a>
    <table>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Endereço</th>
            <th>Ações</th>
        </tr>
        <?php
        $parametro = $GLOBALS['parametro'] ?? [];
        foreach($parametro as $p){
        ?>
        <tr>
            <td><?= $p['id'] ?></td>
            <td><?= $p['nome'] ?? '' ?></td>
            <td><?= $p['email'] ?></td>
            <td><?= $p['senha'] ?></td>
            <td><a href="/mvc/usuario/alterarForm?id=<?= $p['id'] ?>">Alterar</a></td>
        </tr>
        <?php
        }
        ?>
    </table>
    
</body>
</html>