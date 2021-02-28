<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
    <label for="codigo">Codigo del departamento: </label>
    <input type="text" id="codigo" name="codigo"  readonly value="<?php echo $oUsuario -> __get("codDepartamento") ?>"><br>
    <label for="descripcion">Introduce una descripción del departamento: </label>
    <input type="text" id="descripcion" name="descripcion" readonly value="<?php echo $oUsuario -> __get("descDepartamento") ?>"><br>

    <label for="fecha">Fecha de baja </label>
    <input type="text" id="fecha" name="fecha" readonly value="<?php echo is_null($oUsuario->__get("fechaBajaDepartamento")) ? null : date("Y-m-d", $oUsuario->__get("fechaBajaDepartamento")); ?>"><br>
    <label for="volumen">Introduce el volumen de negocio: </label>
    <input type="text" id="volumen" name="volumen" readonly value="<?php echo $oUsuario -> __get("volumenDeNegocio") ?>"><br>
    <input type="submit" value="Volver" name="cancelar">
</form>