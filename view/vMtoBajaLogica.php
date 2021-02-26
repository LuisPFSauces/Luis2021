<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
    <label for="codigo">Codigo del departamento: </label>
    <input type="text" id="codigo" name="codigo"  readonly value="<?php echo $oUsuario->__get("codDepartamento") ?>"><br>
    <label for="descripcion">Introduce una descripción del departamento: </label>
    <input type="text" id="descripcion" name="descripcion" readonly value="<?php echo $oUsuario->__get("descDepartamento") ?>"><br>

    <label for="fecha">Fecha de baja </label>
    <input type="date" id="fecha" name="fecha" >
    <span><?php echo empty($errores) ? null : $errores; ?></span><br>
    <label for="volumen">Introduce el volumen de negocio: </label>
    <input type="text" id="volumen" name="volumen" readonly value="<?php echo $oUsuario->__get("volumenDeNegocio") ?>"><br>
    <input type="submit" value="Cancelar" name="cancelar">
    <input type="submit" value="Baja" name="enviar">
</form>