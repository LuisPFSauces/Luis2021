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

$aErrores = [
    'CodUsuario' => null,
    'Password' => null
];


if (isset($_REQUEST["IniciarSesion"])) { 
    $aErrores['CodUsuario'] = validacionFormularios::comprobarAlfaNumerico($_REQUEST['CodUsuario'], 15, 3, OBLIGATORIO);

    $aErrores['Password'] = validacionFormularios::validarPassword($_REQUEST['Password'], 8, 1, 1, OBLIGATORIO); 

    $oUsuario = UsuarioPDO::validarUsuario($_REQUEST['CodUsuario'], $_REQUEST['Password']);

    if (!isset($oUsuario)) { // si es null 
        $aErrores['CodUsuario'] = "El codigo de usuario no se encuentra en la base de datos";
    }


    if ($aErrores['CodUsuario'] != null || $aErrores['Password'] != null) { 
        $entradaOK = false;
        unset($_REQUEST);
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