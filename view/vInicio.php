<header>
    <h1 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate text-center">Inicio</h1>
    <div class="buttons-header-inicio">
        <?php echo ($imagenUsuario != null) ? '<img id="fotoPerfil" src = "data:image/png;base64,' . base64_encode($imagenUsuario) . '" alt="Foto de perfil"/>' : "<img id='fotoPerfil' src='webroot/media/imagen_perfil.png' class='m-auto' alt='imagen_perfil' width='120' height='120' />" ; ?>
        <form name="logout" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <button class="bg-gray-700 text-white rounded-lg p-2" type="submit" name='departamentos'>MTODepartamento</button>
            <button class="bg-gray-700 text-white rounded-lg p-2" type="submit" name='editar'>Editar</button>
            <button class="bg-gray-700 text-white rounded-lg p-2" type="submit" name='cerrarSesion'><?php echo $aLang[$_COOKIE['idioma']]['logoff']; ?></button>
        </form>
    </div>

</header>
<main class="mt-8">
    <article>
        <h2 class="font-bold"><?php echo $aLang[$_COOKIE['idioma']]['welcome'] ?> </h2>
        <p><?php echo ($numConexiones > 1) ? $aLang[$_COOKIE['idioma']]['numConnections'] : $aLang[$_COOKIE['idioma']]['numConnectionsWelcome']; ?></p>
        <p><?php echo "Ultima conexion:". $ultimaConexion ?></p>
        <?php echo ($ultimaConexion != null) ? "<p>" . $aLang[$_COOKIE['idioma']]['lastConnection'] . "</p>" : null; ?>
    </article>
</main>