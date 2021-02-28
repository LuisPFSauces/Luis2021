<header>
    <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate text-center">Editar</h2>
</header>
<main>
    <form>
        <label class="font-bold p-2">Codigo Usuario</label>
        <input type="text" disabled name="codigo" class="p-1 mb-4 text-white bg-gray-400" value="<?php echo $oUsuario->getCodUsuario() ?>">
        <br>
        <label class="font-bold p-2">Descripcion: </label>
        <input type="text" name="descripcion" class="p-1 ring-2 mb-4 ring-gray-400 focus:ring-gray-800 focus:outline-none" value="<?php echo $oUsuario->getDescUsuario() ?>">
        <span> <?php echo (isset($errores) && !is_null($errores)) ? $errores : null; ?> </span>
        <br>
        <label class="font-bold p-2" >Numero Conexiones: </label>
        <input type="text" disabled name="numconexion" class="p-1 mb-4 text-white bg-gray-400" value="<?php echo $oUsuario->getNumConexiones() ?>">
        <br>
        <label class="font-bold p-2">Fecha Ultima Conexión: </label>
        <input type="text" disabled name="fecha" class="p-1 text-white bg-gray-400" value="<?php echo is_null($oUsuario->getFechaHoraUltimaConexion()) ? null : date('d/m/Y H:i:s', $oUsuario->getFechaHoraUltimaConexion()); ?>">
        <br>
        <input class="p-1 mt-4 bg-green-800 text-white" type="submit" value="Borrar Cuenta" name="borrar">
        <br>
        <input class="p-1 mt-4 mb-4 bg-green-800 text-white"type="submit" value="Cambiar Contraseña" name="cambiar">
        <br>
        <input class="p-1 bg-red-900 text-white" type="submit" value="Cancelar" name="cancelar">
        <input class="p-1 bg-indigo-900 text-white" text-white" type="submit" value="Editar" name="aceptar">
    </form>
</main>


