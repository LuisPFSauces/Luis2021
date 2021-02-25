<?php

if (isset($_REQUEST['cancelar'])) {
    $_SESSION['paginaEnCurso'] = $controladores['inicio'];
    header('Location: index.php');
    exit;
}

$oUsuarioActual = $_SESSION['usuarioDAW204LoginLogoffMulticapaPOO'];
$oUsuario = UsuarioPDO::buscarPorCodigo($oUsuarioActual->getCodUsuario());

if (isset($_REQUEST["borrar"])) {
    $_SESSION['paginaEnCurso'] = $controladores['borrar'];
    header('Location: index.php');
    exit;
}
if (isset($_REQUEST["cambiar"])) {
    $_SESSION['paginaEnCurso'] = $controladores['password'];
    header('Location: index.php');
    exit;
}

if (isset($_REQUEST["aceptar"])) {
    $entradaOK = true;
    $errores = validacionFormularios::comprobarAlfaNumerico($_REQUEST['descripcion'], 255, 3, 1);
    if (empty($errores)) {

        $resultado = UsuarioPDO::modificarUsuario($_REQUEST['descripcion'], $oUsuario->getCodUsuario());

        if ($resultado) {
            $oUsuarioActual -> setDescUsuario($_REQUEST['descripcion']);
            $_SESSION['usuarioDAW204LoginLogoffMulticapaPOO'] = $oUsuarioActual;
            $_SESSION['paginaEnCurso'] = $controladores['inicio'];
            header('Location: index.php');
            exit;
        } else {
            echo "Fallo en la base de datos";
        }
        
    }
}

$vistaEnCurso = $vistas["editar"];
require_once $vistas["layout"];
