<?php

if (isset($_REQUEST['cancelar'])) {
    $_SESSION['paginaEnCurso'] = $controladores['mto_departamentos'];
    header('Location: index.php');
    exit;
}

if (isset($_REQUEST['enviar'])) {

    $resultado = DepartamentoPDO::modificarFecha($_SESSION['MTO_Departamentos_Codigo'], null);
    if ($resultado) {
        $_SESSION['paginaEnCurso'] = $controladores['mto_departamentos'];
        header('Location: index.php');
        exit;
    } else {
        echo "Error al rehabilitar el departamento";
    }
}

$oUsuario = DepartamentoPDO::datosDepartamento($_SESSION['MTO_Departamentos_Codigo']);
$vistaEnCurso = $vistas["mto_rehabilitar"];
require_once $vistas["layout"];
