<header>
    <h1 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate text-center">Login</h1>
</header>
<main class="border-4 border-gray-400 rounded-lg mt-8 p-10">
    <form name="formularioIdioma" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <button <?php echo ($_COOKIE['idioma'] == "es") ? 'class="bg-white border border-gray-800 text-black p-1"' : 'class=" bg-gray-800 text-white p-1"' ?> type="submit" name="idiomaElegido" value="es"> Castellano</button>
        <button <?php echo ($_COOKIE['idioma'] == "en") ? 'class="bg-white border border-gray-800 text-black p-1"' : 'class=" bg-gray-800 text-white p-1"' ?> type="submit" name="idiomaElegido" value="en"> English</button>
    </form>
    <form name="login" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

        <div class="p-2">
            <label for="CodUsuario" class="font-bold"><?php echo $aLang[$_COOKIE['idioma']]['user']; ?></label>
            <input class="ring-2 ring-gray-400 focus:ring-gray-800 focus:outline-none" type="text" id="CodUsuario" name="CodUsuario" placeholder="<?php echo $aLang[$_COOKIE['idioma']]['user']; ?>" value="<?php
            echo (isset($_REQUEST['CodUsuario'])) ? $_REQUEST['CodUsuario'] : null;
            ?>">
        </div>
        <div class="p-2">
            <label for="Password" class="font-bold"><?php echo $aLang[$_COOKIE['idioma']]['password']; ?></label>
            <input class="ring-2 ring-gray-400 focus:ring-gray-800 focus:outline-none" type="password" id="Password" name="Password" value="<?php
            echo (isset($_REQUEST['Password'])) ? $_REQUEST['Password'] : null;
            ?>" placeholder="<?php echo $aLang[$_COOKIE['idioma']]['password']; ?>">
        </div>

        <div>
            <button class="p-1 bg-indigo-900 text-white" type="submit" name="IniciarSesion"><?php echo $aLang[$_COOKIE['idioma']]['login']; ?></button>
            <button class="p-1 bg-transparent border-2 border-indigo-900 text-black" type="submit" name="registro">Registrarse</button>
        </div>

    </form>
</main>