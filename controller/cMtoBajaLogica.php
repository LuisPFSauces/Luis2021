<?php

if (isset($_REQUEST['cancelar'])) {
    $_SESSION['paginaEnCurso'] = $controladores['mto_departamentos'];
    header('Location: index.php');
    exit;
}

if (isset($_REQUEST['enviar'])) {
    if (empty($_REQUEST["fecha"])) {
        $errores = "Introduce una fecha";
    } else {
        $resultado = DepartamentoPDO::modificarFecha($_SESSION['MTO_Departamentos_Codigo'], $_REQUEST["fecha"]);
        if ($resultado) {
            $_SESSION['paginaEnCurso'] = $controladores['mto_departamentos'];
            header('Location: index.php');
            exit;
        } else {
            echo "Error al dar de baja el departamento";
        }
    }
}

$oUsuario = DepartamentoPDO::datosDepartamento($_SESSION['MTO_Departamentos_Codigo']);
$vistaEnCurso = $vistas["mto_bajaLogica"];
require_once $vistas["layout"];
