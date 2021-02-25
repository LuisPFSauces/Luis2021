<?php

if (isset($_REQUEST['cancelar'])) {
    $_SESSION['paginaEnCurso'] = $controladores['mto_departamentos'];
    header('Location: index.php');
    exit;
}

if (isset($_REQUEST['enviar'])) {
    $errores = array(
        "codigo" => null,
        "descripcion" => null,
        "volumen" => null,
        "conexion" => null
    );
    $entradaOK = true;
    define("OBLIGATORIO", 1);
    $errores["codigo"] = validacionFormularios::comprobarAlfaNumerico($_REQUEST['codigo'], 3, 3, OBLIGATORIO);
    $errores["codigo"] .= DepartamentoPDO::validarCodigo($_REQUEST['codigo']) ? "" : "El codigo instroducido ya existe";
    $errores["descripcion"] = validacionFormularios::comprobarAlfaNumerico($_REQUEST['descripcion'], 255, 5, OBLIGATORIO);
    $errores["volumen"] = validacionFormularios::comprobarFloat($_REQUEST['volumen'], PHP_FLOAT_MAX, 0, OBLIGATORIO);
    foreach ($errores as $clave => $error) {
        if ($error != null) {
            $_REQUEST[$clave] = "";
            $entradaOK = false;
        }
    }
    if ($entradaOK) {
        $resultado = DepartamentoPDO::altaDepartamento($_REQUEST['codigo'], $_REQUEST['descripcion'], $_REQUEST['volumen']);
        if ($resultado) {
            $_SESSION['paginaEnCurso'] = $controladores['mto_departamentos'];
            header('Location: index.php');
            exit;
        } else {
            echo "Error al insertar el departamento en la base de datos";
        }
    }
}

$vistaEnCurso = $vistas["mto_alta"];
require_once $vistas["layout"];


