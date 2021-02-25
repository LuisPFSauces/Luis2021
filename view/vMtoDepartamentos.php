<main>
    <h1>Luis Puente Fernandez</h1>
    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST" class="buscador">
        <div class="busqueda">
            <label for="busqueda">Introduce el codigo departamento</label>
            <input type="text" id="busqueda" name="busqueda">
            <input type="submit" value="buscar" name="buscar">
        </div>
        <div class="estado">
            <p>Estado del Departamento: </p>
            <label for="todos">Todos: </label>
            <input type="radio" id="todos" name="fecha" value="todos" checked>
            <label for="alta">Alta: </label>
            <input type="radio" id="alta" name="fecha" value="alta" >
            <label for="baja">Baja: </label>
            <input type="radio" id="baja" name="fecha" value="baja" >
        </div>
    </form>
    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
        <?php echo $departamentos ?>
    </form>
    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST" class="opciones">
        <div class="botones">
            <input type="submit" value="importar" name="importar">
            <input type="submit" value="exportar" name="exportar">
            <input type="submit" value="Añadir" name="alta">
        </div>
        <div class="paginas">
            
        </div>

        <div class="opciones2">
            <input type="submit" value="Volver" name="volver">
            <input type="submit" value="Mostrar Codigo" name="codigo">
        </div>
    </form>
    <div class="info">
       
    </div>
</main>

