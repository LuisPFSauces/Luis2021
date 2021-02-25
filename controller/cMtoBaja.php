<?php

if (isset($_REQUEST['cancelar'])) {
    $_SESSION['paginaEnCurso'] = $controladores['mto_departamentos'];
    header('Location: index.php');
    exit;
}
if (isset($_REQUEST['enviar'])) {
    $resultado = DepartamentoPDO::bajaDepartamento($_SESSION['MTO_Departamentos_Codigo']);
    if ($resultado) {
        $_SESSION['paginaEnCurso'] = $controladores['mto_departamentos'];
        header('Location: index.php');
        exit;
    } else {
        echo "Error al dar de baja el departamento";
    }
}

$oUsuario = DepartamentoPDO::datosDepartamento($_SESSION['MTO_Departamentos_Codigo']);
$vistaEnCurso = $vistas['mto_editar'];
require_once $vistas["layout"];
