<?php

if (isset($_REQUEST['cancelar'])) {
    $_SESSION['paginaEnCurso'] = $controladores['mto_departamentos'];
    header('Location: index.php');
    exit;
}

$oUsuario = DepartamentoPDO::datosDepartamento($_SESSION['MTO_Departamentos_Codigo']);
$vistaEnCurso = $vistas['mto_mostrar'];
require_once $vistas["layout"];