<?php
require_once "core/libreriaValidacion.php";

require_once "model/Usuario.php";
require_once "model/UsuarioPDO.php";
require_once "model/DBPDO.php";
require_once "model/Departamento.php";
require_once "model/DepartamentoPDO.php";

$controladores = [
    "login" => "controller/cLogin.php",
    "inicio" => "controller/cInicio.php",
    "registro" => "controller/cRegistro.php",
    "editar" => "controller/cEditar.php",
    "borrar" => "controller/cBorrar.php",
    "password" => "controller/cPassword.php",
    "rest" => "controller/cRest.php",
    "mto_departamentos" => "controller/cMtoDepartamentos.php",
    "mto_editar" => "controller/cMtoEditar.php",
    "mto_alta" => "controller/cMtoAlta.php",
    "mto_baja" => "controller/cMtoBaja.php",
    "mto_mostrar" => "controller/cMtoMostrar.php",
];

$vistas = [
    "layout" => "view/layout.php",
    "login" => "view/vLogin.php",
    "inicio" => "view/vInicio.php",
    "registro" => "view/vRegistro.php",
    "editar" => "view/vEditar.php",
    "borrar" => "view/vBorrar.php",
    "password" => "view/vPassword.php",
    "rest" => "view/vRest.php",
    "mto_departamentos" => "view/vMtoDepartamentos.php",
    "mto_editar" => "view/vMtoEditar.php",
    "mto_alta" => "view/vMtoAlta.php",
    "mto_baja" => "view/vMtoBaja.php",
    "mto_mostrar" => "view/vMtoMostrar.php"
];
