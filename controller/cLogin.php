<?php

if (!isset($_COOKIE['idioma'])) {
    setcookie('idioma', 'es', time() + 2592000); 
    header('Location: index.php');
    exit;
}

if (isset($_REQUEST['idiomaElegido'])) { 
    setcookie('idioma', $_REQUEST['idiomaElegido'], time() + 2592000);
    header('Location: index.php');
    exit;
}

if (isset($_REQUEST["registro"])) {
    $_SESSION["paginaEnCurso"] = $controladores['registro'];
    header('Location: index.php');
    exit();
}


define("OBLIGATORIO", 1);

$entradaOK = true;


if (isset($_REQUEST["IniciarSesion"])) { 

    $oUsuario = UsuarioPDO::validarUsuario($_REQUEST['CodUsuario'], $_REQUEST['Password']);
    if (is_null($oUsuario)) { // si es null 
        $aErrores= "El usuario no se encuentra en la base de datos";
        $entradaOK = false;
    }

} else {
    $entradaOK = false;
}

if ($entradaOK) { 
    $_SESSION['usuarioDAW204LoginLogoffMulticapaPOO'] = $oUsuario;
    $_SESSION['paginaEnCurso'] = $controladores['inicio'];
    header('Location: index.php');
    exit;
}

$vistaEnCurso = $vistas['login']; 
require_once $vistas['layout'];
?> 