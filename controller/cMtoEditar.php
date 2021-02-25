<?php

if (isset($_REQUEST['cancelar'])) {
    $_SESSION['paginaEnCurso'] = $controladores['mto_departamentos'];
    header('Location: index.php');
    exit;
}
if (isset($_REQUEST['enviar'])) {
    $errores = array(
        "descripcion" => null,
        "volumen" => null,
    );
    $entradaOK = true;
    define("OBLIGATORIO", 1);
    $errores["descripcion"] = validacionFormularios::comprobarAlfaNumerico($_REQUEST['descripcion'], 255, 5, OBLIGATORIO);
    $errores["volumen"] = validacionFormularios::comprobarFloat($_REQUEST['volumen'], PHP_FLOAT_MAX, 0, OBLIGATORIO);

    foreach ($errores as $clave => $error) {
        if ($error != null) {
            $_REQUEST[$clave] = "";
            $entradaOK = false;
        }
    }

    if ($entradaOK) {
        $resultado = DepartamentoPDO::actualizarDepartamento($_SESSION['MTO_Departamentos_Codigo'], $_REQUEST["descripcion"], $_REQUEST["volumen"]);
        if ($resultado) {
            $_SESSION['paginaEnCurso'] = $controladores['mto_departamentos'];
            header('Location: index.php');
            exit;
        } else {
           echo "Error al actualizar";
        }
    }
}

$oUsuario = DepartamentoPDO::datosDepartamento($_SESSION['MTO_Departamentos_Codigo']);
$vistaEnCurso = $vistas['mto_editar'];
require_once $vistas["layout"];
