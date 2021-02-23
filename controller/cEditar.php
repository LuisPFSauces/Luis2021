<?php

if (isset($_REQUEST['Cancelar'])) {
    $_SESSION['paginaEnCurso'] = $controladores['login'];
    header('Location: index.php');
    exit;
}

if (isset($_REQUEST["aceptar"])) {
    //algo
}

$oUsuarioActual = $_SESSION['usuarioDAW204LoginLogoffMulticapaPOO'];
$oUsuario = UsuarioPDO::buscarPorCodigo($oUsuarioActual->getCodUsuario());
$numConexiones = $oUsuario ->getFechaHoraUltimaConexion();
$vistaEnCurso = $vistas["editar"];
require_once $vistas["layout"];
