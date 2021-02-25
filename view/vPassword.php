<header>
    <h2>Cambiar contraseña</h2>
</header>
<main>
    <form>
        <label>Contraseña Actual: </label><br>
        <input type="password" name="password">
        <span>
            <?php echo (isset($errores["password"]) && !is_null($errores["password"])) ? $errores["password"] : null; ?>
        </span>
        <br><label>Nueva contraseña: </label><br>
        <input type="password" name="nPassword">
        <span>
            <?php echo (isset($errores["pass1"]) && !is_null($errores["pass1"])) ? $errores["pass1"] : null; ?>
        </span>
        <br><label>Confirma contraseña: </label><br>
        <input type="password" name="nPassword2">
        <span>
            <?php echo (isset($errores["pass2"]) && !is_null($errores["pass2"])) ? $errores["pass2"] : null; ?>
        </span>
        <br>
        <input type="submit" value="Cancelar" name="cancelar">
        <input type="submit" value="Cambiar" name="aceptar">
    </form>
</main>
