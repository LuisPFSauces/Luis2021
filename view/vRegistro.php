<header>
    <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate text-center">Registro</h2>
</header>
<main class="flex-container-align-item-center">
    
    <form name="singup" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

        <div class="p-2">
            <label for="CodUsuario" class="font-bold">Codigo Usuario</label>
            <input class="p-1 ring-2 ring-gray-400 focus:ring-gray-800 focus:outline-none" type="text" id="CodUsuario" name="CodUsuario" value="<?php
                echo (isset($_REQUEST['CodUsuario'])) ? $_REQUEST['CodUsuario'] : null; 
                ?>">
            
        </div>
        <?php
            echo ($aErrores['CodUsuario']!=null) ? "<span style='color:#FF0000'>".$aErrores['CodUsuario']."</span>" : null;
        ?>
        <div class="p-2">
            <label for="DescUsuario" class="font-bold">Descripcion</label>
            <input class="p-1 ring-2 ring-gray-400 focus:ring-gray-800 focus:outline-none"type="text" id="DescUsuario" name="DescUsuario" value="<?php
                echo (isset($_REQUEST['DescUsuario'])) ? $_REQUEST['DescUsuario'] : null; 
                ?>">
            
        </div>
        <?php
            echo ($aErrores['DescUsuario']!=null) ? "<span style='color:#FF0000'>".$aErrores['DescUsuario']."</span>" : null;
        ?>
        <div class="p-2">
            <label for="Password" class="font-bold">Contraseña</label>
            <input class="p-1 ring-2 ring-gray-400 focus:ring-gray-800 focus:outline-none" type="password" id="Password" name="Password" value="<?php
                echo (isset($_REQUEST['Password'])) ? $_REQUEST['Password'] : null; 
                ?>">
            
        </div>          
        <?php
            echo ($aErrores['Password'] != null) ? "<span style='color:#FF0000'>" . $aErrores['Password'] . "</span>" : null; 
        ?>
        <div class="p-2" >
            <label for="PasswordConfirmacion" class="font-bold">Confirma Contraseña</label>
            <input class="p-1 ring-2 ring-gray-400 focus:ring-gray-800 focus:outline-none" type="password" id="PasswordConfirmacion" name="PasswordConfirmacion" value="<?php
                echo (isset($_REQUEST['PasswordConfirmacion'])) ? $_REQUEST['PasswordConfirmacion'] : null; 
                ?>" >
            
        </div>          
        <?php
            echo ($aErrores['PasswordConfirmacion'] != null) ? "<span style='color:#FF0000'>" . $aErrores['PasswordConfirmacion'] . "</span>" : null;
        ?>
        <div class="p-2">
            <button class="ml-24 p-1 bg-indigo-900 text-white" type="submit" name="Registrarse">Registrase</button>
            <button class=" p-1 bg-red-900 text-white"" name="Cancelar">Cancelar</button>
        </div>

    </form>
</main>