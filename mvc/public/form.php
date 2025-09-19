<?php
if (!isset($parametro) || !is_array($parametro)) {
    $parametro = [];
}
?>
<form method="POST" action="/Workshop/mvc/usuario/inserir">
        <label>Nome: </label>
        <input type="text" name="nome"
        value="<?= (isset($parametro[0]) && isset($parametro[0]["nome"])) ? $parametro[0]["nome"] : "" ?>">
        <br />
        <label>Email: </label>
        <input type="text" name="email" 
        value="<?= (isset($parametro[0]) && isset($parametro[0]["email"])) ? $parametro[0]["email"] : "" ?>">
        <br />
        <label>Senha: </label>
        <input type="text" name="senha" 
        value="<?= (isset($parametro[0]) && isset($parametro[0]["senha"])) ? $parametro[0]["senha"] : "" ?>">
        <br />
        <?php
        if (isset($parametro) && isset($parametro[0]['id'])) {
        ?>
            <input type="hidden" name="id" value="<?= $parametro[0]['id'] ?>">
        <?php
        }
        ?>
        <input type="submit" value="enviar">
</form>