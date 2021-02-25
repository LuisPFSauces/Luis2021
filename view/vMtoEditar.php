<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
    <label for="codigo">Codigo del departamento: </label>
    <input type="text" id="codigo" name="codigo"  readonly value="<?php echo $oUsuario -> __get("codDepartamento") ?>"><br>
    <label for="descripcion">Introduce una descripción del departamento: </label>
    <input type="text" id="descripcion" name="descripcion" value="<?php echo $oUsuario -> __get("descDepartamento") ?>"><br>
    <?php
    echo!empty($errores['descripcion']) ? "<p class=\"error\">" . $errores['descripcion'] . "</p>" : "";
    ?>
    <label for="fecha">Fecha de baja </label>
    <input type="text" id="fecha" name="fecha" readonly value="<?php echo $oUsuario -> __get("fechaBajaDepartamento") ?>"><br>
    <label for="volumen">Introduce el volumen de negocio: </label>
    <input type="text" id="volumen" name="volumen" value="<?php echo $oUsuario -> __get("volumenDeNegocio") ?>"><br>
    <?php
    echo!empty($errores['volumen']) ? "<p class=\"error\">" . $errores['volumen'] . "</p>" : "";
    ?>
    <input type="submit" value="Cancelar" name="cancelar">
    <input type="submit" value="Editar" name="enviar">
</form>