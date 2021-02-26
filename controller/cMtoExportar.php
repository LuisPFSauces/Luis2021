<?php

function crearHijo($nombre, $dom, &$nodo, $valor = null) {
    if ($dom instanceof DOMDocument && $nodo instanceof DOMElement) {
        if (is_null($valor)) {
            $elemento = $dom->createElement($nombre);
        } else {
            $elemento = $dom->createElement($nombre, $valor);
        }

        $nodo->appendChild($elemento);
        return $elemento;
    } else {
        return null;
    }
}

$consulta = DepartamentoPDO::buscarDepartamento("", "todos");
if (count($consulta) >= 1) {
    $dom = new DOMDocument("1.0", "UTF-8");
    $dom->preserveWhiteSpace = true;
    $dom->formatOutput = true;


    $root = $dom->createElement("Departamentos");
    $dom->appendChild($root);

    foreach ($consulta as $oDepartamento) {
        $departamento = crearHijo("Departamento", $dom, $root);
        crearHijo('CodDepartamento', $dom, $departamento, $oDepartamento->__get("codDepartamento"));
        crearHijo('DescDepartamento', $dom, $departamento, $oDepartamento->__get("descDepartamento"));
        crearHijo('FechaBaja', $dom, $departamento, $oDepartamento->__get("fechaBajaDepartamento"));
        crearHijo('Volumen', $dom, $departamento, $oDepartamento->__get("volumenDeNegocio"));
    }
    $dom->save("tmp/SQL.xml");
    header('Content-Disposition: attachment;filename="SQL.xml"');
    header('Content-Type: text/xml');
    readfile("tmp/SQL.xml");
    $_SESSION['paginaEnCurso'] = $controladores['mto_departamentos'];
}