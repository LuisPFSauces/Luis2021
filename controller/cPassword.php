<?php

if (isset($_REQUEST['cancelar'])) {
    $_SESSION['paginaEnCurso'] = $controladores['inicio'];
    header('Location: index.php');
    exit;
}

$oUsuarioActual = $_SESSION['usuarioDAW204LoginLogoffMulticapaPOO'];
if (isset($_REQUEST["aceptar"])) {
    $resultado = UsuarioPDO::validarUsuario($oUsuarioActual->getCodUsuario(), $_REQUEST['password']);
    if (is_null($resultado)) {
        $errores["password"] = "Contraseña incorrecta";
    }

    $errores["pass1"] = validacionFormularios::validarPassword($_REQUEST["nPassword"]);
    if ($_REQUEST["nPassword"] != $_REQUEST["nPassword2"]) {
        $errores["pass2"] = "Las contraseñas no coinciden";
    }
    $entradaOK = true;
    foreach ($errores as $error) {
        if (!empty($error)) {
            $entradaOK = false;
        }
    }
    if ($entradaOK) {
        $resultado = UsuarioPDO::modificarPassword($oUsuarioActual->getCodUsuario(), $_REQUEST["nPassword"]);
        if ($resultado){
            $_SESSION['paginaEnCurso'] = $controladores['inicio'];
            header('Location: index.php');
            exit;
        } else {
            echo 'Error, al actualizar la contraseña';
        }
    }
}
$vistaEnCurso = $vistas["password"];
require_once $vistas["layout"];
