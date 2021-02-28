<?php

if (isset($_REQUEST["volver"])) {
    $_SESSION['paginaEnCurso'] = $controladores['inicio'];
    header('Location: index.php');
    exit;
}

function crearTablaDepartamentos($departamentos) {
    if (is_array($departamentos)) {
        $tabla = "
           <table>
                <thead>
                    <tr>
                        <th>Codigo</th>
                        <th>Descripcion</th>
                        <th>Fecha de Baja</th>
                        <th>Volumen Negocio</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
        ";
        foreach ($departamentos as $departamento) {
            is_null($departamento->__get("fechaBajaDepartamento")) ? $clase = "alta" : $clase = "baja";
            $tabla .= "<tr>\n\t<th class=\"$clase\">" . $departamento->__get("codDepartamento") . "</th>";
            $tabla .= "\t<td class=\"$clase\">" . $departamento->__get("descDepartamento") . "</td>";
            $tabla .= "\t<td class=\"$clase\">" . (is_null($departamento->__get("fechaBajaDepartamento")) ? null : date("Y-m-d", $departamento->__get("fechaBajaDepartamento"))) . "</td>";
            $tabla .= "\t<td class=\"$clase\">" . $departamento->__get("volumenDeNegocio") . "</td>";
            $tabla .= "<td><button type='submit' name='editar' value=\"" . $departamento->__get("codDepartamento") . "\">&#9999;&#65039;</button><button type='submit' name='baja' value=\"" . $departamento->__get("codDepartamento") . "\">&#128465;&#65039;</button><button type='submit' name='mostrar' value=\"" . $departamento->__get("codDepartamento") . "\">&#128270;</button>";
            if (is_null($departamento->__get("fechaBajaDepartamento"))) {
                $tabla .= "<button type='submit' name='bajaLogica' value=\"" . $departamento->__get("codDepartamento") . "\">&#128234;</button></td>\n</tr>";
            } else {
                $tabla .= "<button type='submit' name='rehabilitar' value=\"" . $departamento->__get("codDepartamento") . "\">&#128235;</button></td>\n</tr>";
            }
        }
        $tabla .= "</tbody></table>";
        return $tabla;
    }
}

if (isset($_REQUEST["buscar"])) {
    $departamentos = crearTablaDepartamentos(DepartamentoPDO::buscarDepartamento($_REQUEST["busqueda"], $_REQUEST["fecha"]));
}

if (isset($_REQUEST["editar"])) {
    $_SESSION["MTO_Departamentos_Codigo"] = $_REQUEST["editar"];
    $_SESSION['paginaEnCurso'] = $controladores['mto_editar'];
    header('Location: index.php');
    exit;
}

if (isset($_REQUEST["alta"])) {
    $_SESSION['paginaEnCurso'] = $controladores['mto_alta'];
    header('Location: index.php');
    exit;
}

if (isset($_REQUEST["baja"])) {
    $_SESSION["MTO_Departamentos_Codigo"] = $_REQUEST["baja"];
    $_SESSION['paginaEnCurso'] = $controladores['mto_baja'];
    header('Location: index.php');
    exit;
}
if (isset($_REQUEST["mostrar"])) {
    $_SESSION["MTO_Departamentos_Codigo"] = $_REQUEST["mostrar"];
    $_SESSION['paginaEnCurso'] = $controladores['mto_mostrar'];
    header('Location: index.php');
    exit;
}
if (isset($_REQUEST["bajaLogica"])) {
    $_SESSION["MTO_Departamentos_Codigo"] = $_REQUEST["bajaLogica"];
    $_SESSION["paginaEnCurso"] = $controladores["mto_bajaLogica"];
    header('Location: index.php');
    exit;
}
if (isset($_REQUEST["rehabilitar"])) {
    $_SESSION["MTO_Departamentos_Codigo"] = $_REQUEST["rehabilitar"];
    $_SESSION["paginaEnCurso"] = $controladores["mto_rehabilitar"];
    header('Location: index.php');
    exit;
}
if (isset($_REQUEST["exportar"])) {
    $_SESSION["paginaEnCurso"] = $controladores["mto_exportar"];
    header('Location: index.php');
    exit;
}

if (!isset($departamentos)) {
    $departamentos = crearTablaDepartamentos(DepartamentoPDO::buscarDepartamento("", "todos"));
}

$vistaEnCurso = $vistas["mto_departamentos"];
require $vistas["layout"];
