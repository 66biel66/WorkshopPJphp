<?php
if (!isset($parametro) || !is_array($parametro)) {
    $parametro = [];
}
?>
<a href="/Workshop/mvc/usuario/formulario">Novo Usuário</a>
<table>
     <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Endereço</th>
        <th>Ações</th>
    </tr>
    <?php foreach($parametro as $p){
        ?>
        <tr>
            <td><?= $p['id'] ?></td>
            <td><?= $p['nome'] ?></td>
            <td><?= $p['email'] ?></td>
            <td><a href="/Workshop/mvc/usuario/formularioalterar?id=<?= $p['id'] ?>">Alterar</a></td>
        </tr>
        <?php
    }
?>
</table>
    
