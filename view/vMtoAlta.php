<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
    <label for="codigo">Introduce el codigo del departamento: </label>
    <input type="text" id="codigo" name="codigo" onblur="elementoAMayusculas(this)" value="<?php if (isset($_REQUEST["codigo"])) echo $_REQUEST["codigo"]; ?>">
    <?php
    echo!empty($errores['codigo']) ? "<span class=\"error\">" . $errores['codigo'] . "</span>" : "";
    ?><br>
    <label for="descripcion">Introduce una descripción del departamento: </label>
    <input type="text" id="descripcion" name="descripcion" value="<?php if (isset($_REQUEST["descripcion"])) echo $_REQUEST["descripcion"]; ?>">
    <?php
    echo!empty($errores['descripcion']) ? "<span class=\"error\">" . $errores['descripcion'] . "</span>" : "";
    ?><br>
    <label for="volumen">Introduce el volumen de negocio: </label>
    <input type="text" id="volumen" name="volumen" value="<?php if (isset($_REQUEST["volumen"])) echo $_REQUEST["volumen"]; ?>">
    <?php
    echo!empty($errores['volumen']) ? "<span class=\"error\">" . $errores['volumen'] . "</span>" : "";
    ?><br>
    <input type="submit" value="Cancelar" name="cancelar">
    <input type="submit" value="Crear" name="enviar">
</form>