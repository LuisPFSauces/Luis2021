<?php

if(!isset($_SESSION['usuarioDAW204LoginLogoffMulticapaPOO'])){ 
    header('Location: index.php'); 
    exit;
}

if (isset($_REQUEST['cerrarSesion'])) { 
    session_destroy(); 
    header("Location: index.php");
    exit;
}

if (isset($_REQUEST['editar'])){
    $_SESSION['paginaEnCurso'] = $controladores['editar']; // almacenamos en la variable de sesion 'pagina' la ruta del controlador del BorrarCuenta
    header('Location: index.php');
    exit;
}

if (isset($_REQUEST['departamentos'])){
    $_SESSION['paginaEnCurso'] = $controladores['mto_departamentos']; // almacenamos en la variable de sesion 'pagina' la ruta del controlador del BorrarCuenta
    header('Location: index.php');
    exit;
}

$oUsuarioActual = $_SESSION['usuarioDAW204LoginLogoffMulticapaPOO'];

$numConexiones = $oUsuarioActual->getNumConexiones(); 
$descUsuario = $oUsuarioActual->getDescUsuario(); 
$ultimaConexion = $oUsuarioActual->getFechaHoraUltimaConexion(); 

$vistaEnCurso = $vistas['inicio']; 
require_once $vistas['layout'];
