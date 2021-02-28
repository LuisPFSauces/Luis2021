<header>
    <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate text-center">Borrar</h2>
</header>
<main >
    <form class="mt-4">
        <label class="font-bold p-2">Introduce la contraseña para confirmar: </label><br>
        <input class="ml-16 p-1 ring-2 mb-4 ring-gray-400 focus:ring-gray-800 focus:outline-none" type="password" name="password">
        <span>
            <?php echo (isset($errores) && !is_null($errores)) ? $errores : null; ?>
        </span>
        <br>
        <input class="ml-24 p-1 bg-red-900 text-white" type="submit" value="Cancelar" name="cancelar">
        <input class="p-1 bg-indigo-900 text-white" type="submit" value="Borrar" name="aceptar">
    </form>
</main>
