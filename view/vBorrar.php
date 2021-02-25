<header>
    <h2>Borrar</h2>
</header>
<main>
    <form>
        <label>Introduce la contraseña para confirmar: </label><br>
        <input type="password" name="password">
        <span>
            <?php echo (isset($errores) && !is_null($errores)) ? $errores : null; ?>
        </span>
        <br>
        <input type="submit" value="Cancelar" name="cancelar">
        <input type="submit" value="Borrar" name="aceptar">
    </form>
</main>
