<header>
    <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate text-center">Cambiar contraseña</h2>
</header>
<main>
    <form>
        <label class="font-bold p-2">Contraseña Actual: </label><br>
        <input class="ring-2 mb-2  ring-gray-400 focus:ring-gray-800 focus:outline-none" type="password" name="password">
        <span>
            <?php echo (isset($errores["password"]) && !is_null($errores["password"])) ? $errores["password"] : null; ?>
        </span>
        <br><label class="font-bold p-2">Nueva contraseña: </label><br>
        <input class="ring-2 mb-2 ring-gray-400 focus:ring-gray-800 focus:outline-none" type="password" name="nPassword">
        <span>
            <?php echo (isset($errores["pass1"]) && !is_null($errores["pass1"])) ? $errores["pass1"] : null; ?>
        </span>
        <br><label class="font-bold p-2">Confirma contraseña: </label><br>
        <input class="ring-2 mb-2 ring-gray-400 focus:ring-gray-800 focus:outline-none" type="password" name="nPassword2">
        <span>
            <?php echo (isset($errores["pass2"]) && !is_null($errores["pass2"])) ? $errores["pass2"] : null; ?>
        </span>
        <br>
        <input class="p-1 bg-red-900 text-white" type="submit" value="Cancelar" name="cancelar">
        <input class="p-1 bg-indigo-900 text-white" type="submit" value="Cambiar" name="aceptar">
    </form>
</main>
