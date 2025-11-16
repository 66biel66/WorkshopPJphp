<?php
if (!isset($parametro) || !is_array($parametro)) {
    $parametro = [];
}
?>
<a href="/mvc/cliente/formulario">Cadastrar</a>
<table>
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Endereço</th>
        <th>Ações</th>
    </tr>
    <?php foreach ($parametro as $p){
        ?>
        <tr>
            <td><?= $p["id"]?></td>
            <td><?= $p["nome"]?></td>
            <td><?= $p["endereco"]?></td>
            <td><a href="/mvc/cliente/formularioalterar?id=<?= $p["id"] ?>">Alterar</a></td>
        </tr>
        <?php
    }
?>
</table>