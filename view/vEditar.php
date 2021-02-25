<header>
    <h2>Editar</h2>
</header>
<main>
    <form>
        <label>Codigo Usuario</label>
        <input type="text" disabled name="codigo" value="<?php echo $oUsuario->getCodUsuario() ?>">
        <br>
        <label>Descripcion: </label>
        <input type="text" name="descripcion" value="<?php echo $oUsuario->getDescUsuario() ?>">
        <span> <?php echo (isset($errores) && !is_null($errores)) ? $errores : null; ?> </span>
        <br>
        <label>Numero Conexiones: </label>
        <input type="text" disabled name="numconexion" value="<?php echo $oUsuario->getNumConexiones() ?>">
        <br>
        <label>Fecha Ultima Conexión: </label>
        <input type="text" disabled name="fecha" value="<?php echo is_null($oUsuario->getFechaHoraUltimaConexion()) ? null : date('d/m/Y H:i:s', $oUsuario->getFechaHoraUltimaConexion()); ?>">
        <br>
        <input type="submit" value="Borrar Cuenta" name="borrar">
        <br>
        <input type="submit" value="Cambiar Contraseña" name="cambiar">
        <br>
        <input type="submit" value="Cancelar" name="cancelar">
        <input type="submit" value="Editar" name="aceptar">
    </form>
</main>


