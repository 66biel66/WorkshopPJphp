<form method="POST" action="/Workshop/usuario/inserir">
        <label>Nome: </label>
        <input type="text" name="nome" value="<?= ($parametro != null) ? $parametro[0]['nome'] : "" ?>"><br />
        <label>Email: </label>
        <input type="text" name="email" value="<?= ($parametro != null) ? $parametro[0]['email'] : "" ?>"><br />
        <label>Senha: </label>
        <input type="password" name="senha" value="<?= ($parametro != null) ? $parametro[0]['senha'] : "" ?>"><br />
        <?php
        if($parametro != null){
            ?>
            <input type="hidden" name="id" value="<?= $parametro[0]['id'] ?>">
            <?php
        }
        ?>
        <input type="submit" value="enviar">
    </form>