<?php

/**
 * Clase DBPDO, se encarga de ejecutar las consultas a la base de datos
 * @author Cristina Nuñez y Javier Nieto
 * @version v1.0
 *
 */

class DBPDO {
    /**
     * Funcion estatica que ejecuata la consulta en la base de datos
     * @author Cristina Nuñez y Javier Nieto
     * @param string $sentenciaSQL sentencia sql que queremos ejecutar
     * @param array $parametros parametros que necesita la consulta
     * @return null|PDOStatement resultado que devolverá la consulta
     */

    public static function ejecutaConsulta($sentenciaSQL, $parametros) {
        try {
            $miDB = new PDO(DSN, USER, PASSWORD);
            $miDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $consulta = $miDB->prepare($sentenciaSQL); //Preparamos la consulta.
            $consulta->execute($parametros); //Ejecutamos la consulta.
        } catch (PDOException $exception) {
            $consulta = null; //Destruimos la consulta.
            unset($miDB);
        }
        return $consulta;
    }

}
