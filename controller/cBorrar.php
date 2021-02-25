<?php

if (isset($_REQUEST['cancelar'])) {
    $_SESSION['paginaEnCurso'] = $controladores['inicio'];
    header('Location: index.php');
    exit;
}

$oUsuarioActual = $_SESSION['usuarioDAW204LoginLogoffMulticapaPOO'];

if (isset($_REQUEST['aceptar'])) {
    $resultado = UsuarioPDO::validarUsuario($oUsuarioActual->getCodUsuario(), $_REQUEST['password']);
    if (!is_null($resultado)) {
        $resultado = UsuarioPDO::bajaUsuario($oUsuarioActual->getCodUsuario());
        if ($resultado) {
            $_SESSION['paginaEnCurso'] = $controladores['login'];
            header('Location: index.php');
            exit;
        } else {
            echo "Fallo en la base de datos";
        }
    } else {
        $errores = "Error, contraseña incorrecta";
    }
}

$vistaEnCurso = $vistas['borrar'];
require_once $vistas['layout'];
