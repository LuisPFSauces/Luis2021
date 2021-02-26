<?php

class DepartamentoPDO {

    public static function datosDepartamento($codDepartamento) {
        $oDepartamento = null;

        $sql = "Select * FROM T02_Departamento where T02_CodDepartamento=?";
        $consulta = DBPDO::ejecutaConsulta($sql, [$codDepartamento]); // almacenamos en la variable $resultadoConsulta el departamento obtenidos en la consulta

        if ($consulta->rowCount() > 0) {
            $departamento = $consulta->fetchObject();
            $oDepartamento = new Departamento($departamento->T02_CodDepartamento, $departamento->T02_DescDepartamento, $departamento->T02_FechaCreacionDepartamento, $departamento->T02_VolumenNegocio, $departamento->T02_FechaBajaDepartamento);
        }

        return $oDepartamento;
    }

    public static function buscarDepartamento($descripcion, $estado) {

        $aDepartamentos = [];
        if (!empty($descripcion)) {
            if ($estado == "baja") {
                $sql = "Select * from T02_Departamento where T02_DescDepartamento like '%' ? '%'  and T02_FechaBajaDepartamento is not null";
            } else if ($estado == "alta") {
                $sql = "Select * from T02_Departamento where T02_DescDepartamento like '%' ? '%'  and T02_FechaBajaDepartamento is null";
            } else {
                $sql = "Select * from T02_Departamento where T02_DescDepartamento like '%' ? '%'  ";
            }
            $consulta = DBPDO::ejecutaConsulta($sql, [$descripcion]);
        } else {
            if ($estado == "baja") {
                $sql = "Select * from T02_Departamento where T02_FechaBajaDepartamento  is not null";
            } else if ($estado == "alta") {
                $sql = "Select * from T02_Departamento where T02_FechaBajaDepartamento  is null";
            } else {
                $sql = "Select * from T02_Departamento";
            }
            $consulta = DBPDO::ejecutaConsulta($sql, []);
        }
        while ($departamento = $consulta->fetchObject()) {
            $oDepartamento = new Departamento($departamento->T02_CodDepartamento, $departamento->T02_DescDepartamento, $departamento->T02_FechaCreacionDepartamento, $departamento->T02_VolumenNegocio, $departamento->T02_FechaBajaDepartamento);
            array_push($aDepartamentos, $oDepartamento);
        }
        return $aDepartamentos;
    }

    public static function actualizarDepartamento($codDepartamento, $descDepartamento, $volumenDeNegocio) {

        $sql = "Update T02_Departamento set T02_DescDepartamento=?, T02_VolumenNegocio=? where T02_CodDepartamento=?";
        $resultadoConsulta = DBPDO::ejecutaConsulta($sql, [$descDepartamento, $volumenDeNegocio, $codDepartamento]);

        return $resultadoConsulta;
    }

    public static function validarCodigo($codDepartamento) {
        $codigo = true;
        $sql = "Select T02_CodDepartamento from T02_Departamento where T02_CodDepartamento=?";
        $consulta = DBPDO::ejecutaConsulta($sql, [$codDepartamento]);
        if ($consulta->rowCount() > 0) {
            $codigo = false;
        }
        return $codigo;
    }

    public static function altaDepartamento($codDepartamento, $descDepartamento, $volumenDeNegocio) {
        $sql = "Insert into T02_Departamento (T02_CodDepartamento, T02_DescDepartamento, T02_FechaCreacionDepartamento, T02_VolumenNegocio) values (?,?,?,?)";
        $consulta = DBPDO::ejecutaConsulta($sql, [$codDepartamento, $descDepartamento, time(), $volumenDeNegocio]);
        return $consulta;
    }

    public static function bajaDepartamento($codDepartamento) {
        $sql = "Delete from T02_Departamento where T02_CodDepartamento=?";
        $consulta = DBPDO::ejecutaConsulta($sql, [$codDepartamento]);
        return $consulta;
    }

    public static function modificarFecha($codDepartamento, $fecha) {
        if (!is_null($fecha)) {
            $fechaBaja = (new DateTime($fecha))->getTimestamp();
        } else {
            $fechaBaja = $fecha;
        }

        $sentenciaSQL = "Update T02_Departamento set T02_FechaBajaDepartamento=? WHERE T02_CodDepartamento=?";
        $consulta = DBPDO::ejecutaConsulta($sentenciaSQL, [$fechaBaja, $codDepartamento]);
        return $consulta;
    }

}
