<main class="flex-container-align-item-center">
    
    <form name="singup" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

        <div>
            <label for="CodUsuario">Codigo Usuario</label>
            <input class="required" type="text" id="CodUsuario" name="CodUsuario" value="<?php
                echo (isset($_REQUEST['CodUsuario'])) ? $_REQUEST['CodUsuario'] : null; 
                ?>">
            
        </div>
        <?php
            echo ($aErrores['CodUsuario']!=null) ? "<span style='color:#FF0000'>".$aErrores['CodUsuario']."</span>" : null;
        ?>
        <div>
            <label for="DescUsuario">Descripcion</label>
            <input class="required" type="text" id="DescUsuario" name="DescUsuario" value="<?php
                echo (isset($_REQUEST['DescUsuario'])) ? $_REQUEST['DescUsuario'] : null; 
                ?>">
            
        </div>
        <?php
            echo ($aErrores['DescUsuario']!=null) ? "<span style='color:#FF0000'>".$aErrores['DescUsuario']."</span>" : null;
        ?>
        <div>
            <label for="Password">Contraseña</label>
            <input class="required" type="password" id="Password" name="Password" value="<?php
                echo (isset($_REQUEST['Password'])) ? $_REQUEST['Password'] : null; 
                ?>">
            
        </div>          
        <?php
            echo ($aErrores['Password'] != null) ? "<span style='color:#FF0000'>" . $aErrores['Password'] . "</span>" : null; 
        ?>
        <div>
            <label for="PasswordConfirmacion">Confirma Contraseña</label>
            <input style="width: 250px;" class="required" type="password" id="PasswordConfirmacion" name="PasswordConfirmacion" value="<?php
                echo (isset($_REQUEST['PasswordConfirmacion'])) ? $_REQUEST['PasswordConfirmacion'] : null; 
                ?>" >
            
        </div>          
        <?php
            echo ($aErrores['PasswordConfirmacion'] != null) ? "<span style='color:#FF0000'>" . $aErrores['PasswordConfirmacion'] . "</span>" : null;
        ?>
        <div >
            <button class="button" type="submit" name="Registrarse">Registrase</button>
            <button class="button" name="Cancelar">Cancelar</button>
        </div>

    </form>
</main>