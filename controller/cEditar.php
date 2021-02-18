<?php

if (isset($_REQUEST['Cancelar'])) {
    $_SESSION['paginaEnCurso'] = $controladores['login'];
    header('Location: index.php');
    exit;
}

if (isset($_REQUEST["aceptar"])){
    //algo
}

$oUsuarioActual = $_SESSION['usuarioDAW204LoginLogoffMulticapaPOO'];

$vistaEnCurso = $vistas["editar"];
require_once $vistas["layout"];