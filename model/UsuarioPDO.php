<?php

/**
 * Clase usuario PDO
 * Dispone de metodos para trabajar sobre la base de datos T01_Usuario
 * @author Cristina Nuñez, Javier Nieto y Luis Puente
 */
class UsuarioPDO {

    /**
     * Metodo validarUsuario()
     * 
     * Metodo que valida si existe un determinado usuario y password en la base de datos.
     * Si existe el usuario actualiza la ultima conexion y el numero de conexiones de ese usuario y lo devuelve.
     * Si no existe el usuario devuelve null.
     * @author Cristina Nuñez y Javier Nieto
     * 
     * @param string $codUsuario codigo del usuario
     * @param string $password password del usuario
     * @return mixed[] Si existe, un array con un objeto de tipo Usuario con los datos de la base de datos y la fechaHoraUltimaConexionAnterior. Si no existe null.
     */
    public static function validarUsuario($codUsuario, $password) {
        $oUsuario = null;

        $consulta = "Select * from T01_Usuario where T01_CodUsuario=? and T01_Password=?";
        $passwordEncriptado = hash("sha256", ($codUsuario . $password));
        $resultado = DBPDO::ejecutaConsulta($consulta, [$codUsuario, $passwordEncriptado]);

        if ($resultado->rowCount() > 0) {
            $oUsuarioConsulta = $resultado->fetchObject();
            $oUsuario = new Usuario($oUsuarioConsulta->T01_CodUsuario, $oUsuarioConsulta->T01_Password, $oUsuarioConsulta->T01_DescUsuario, $oUsuarioConsulta->T01_NumConexiones, $oUsuarioConsulta->T01_FechaHoraUltimaConexion, $oUsuarioConsulta->T01_Perfil, $oUsuarioConsulta->T01_ImagenUsuario);

            $consulta = "Update T01_Usuario set T01_NumConexiones = T01_NumConexiones+1, T01_FechaHoraUltimaConexion=? where T01_CodUsuario=?";
            $resultado = DBPDO::ejecutaConsulta($consulta, [time(), $codUsuario]);
        }
        return $oUsuario;
    }

    /**
     * Metodo altaUsuario()
     * 
     * Metodo que da de alta en la base de datos a un nuevo usuario
     * 
     * @author Cristina Nuñez y Javier Nieto
     * 
     * @param string $codUsuario codigo del usuario
     * @param string $password password del usuario
     * @param string $descUsuario descripcion del usuario
     * @return null|\Usuario devuelve un objeto de tipo Usuario con los datos guardados en la base de datos y null si no se ha podido dar de alta
     */
    public static function validarCodNoExiste($codUsuario) {
        $usuarioNoExiste = true;

        $consulta = "Select * from T01_Usuario where T01_CodUsuario=?";
        $resultado = DBPDO::ejecutaConsulta($consulta, [$codUsuario]);

        if ($resultado->rowCount() > 0) {
            $usuarioNoExiste = false;
        }

        return $usuarioNoExiste;
    }

    /**
     * Metodo altaUsuario()
     * 
     * Metodo que da de alta en la base de datos a un nuevo usuario
     * 
     * @author Cristina Nuñez y Javier Nieto
     * 
     * @param string $codUsuario codigo del usuario
     * @param string $password password del usuario
     * @param string $descripcion descripcion del usuario
     * @return null|\Usuario devuelve un objeto de tipo Usuario con los datos guardados en la base de datos y null si no se ha podido dar de alta
     */
    public static function altaUsuario($codUsuario, $password, $descripcion) {
        $oUsuario = null;

        $consulta = "Insert into T01_Usuario (T01_CodUsuario, T01_DescUsuario, T01_Password , T01_NumConexiones, T01_FechaHoraUltimaConexion) values (?,?,?,1,?)";
        $passwordEncriptado = hash("sha256", ($codUsuario . $password));
        $resultado = DBPDO::ejecutaConsulta($consulta, [$codUsuario, $descripcion, $passwordEncriptado, time()]);


        $consultaDatosUsuario = "Select * from T01_Usuario where T01_CodUsuario=?";
        $resultadoDatosUsuario = DBPDO::ejecutaConsulta($consultaDatosUsuario, [$codUsuario]);

        if ($resultadoDatosUsuario->rowCount() > 0) {
            $oUsuarioConsulta = $resultadoDatosUsuario->fetchObject();
            $oUsuario = new Usuario($oUsuarioConsulta->T01_CodUsuario, $oUsuarioConsulta->T01_Password, $oUsuarioConsulta->T01_DescUsuario, $oUsuarioConsulta->T01_NumConexiones, $oUsuarioConsulta->T01_FechaHoraUltimaConexion, $oUsuarioConsulta->T01_Perfil, $oUsuarioConsulta->T01_ImagenUsuario);
        }

        return $oUsuario;
    }

    /**
     * bajaUsuario
     * 
     * Borra el usuario de la base de datos
     * 
     * @author Luis Puente Fernandez
     * 
     * @param string $codUsuario codigo del usuario
     * @param string $codUsuario codigo del usuario
     * @return PDOStatement o null, el resultado obtenido al ejecutarConsulta
     */
    public static function bajaUsuario($codUsuario) {
        $consulta = "Delete from T01_Usuario where T01_CodUsuario=? ";
        $resultado = DBPDO::ejecutaConsulta($consulta, [$codUsuario]);

        return $resultado;
    }

    /**
     * buscarPorCodigo
     * 
     * Obtiene los datos del usuario
     * 
     * @author Luis Puente Fernandez
     * 
     * @param string $codUsuario codigo del usuario 
     * @return null o Usuario, dependiendo de si el usuario existe o no 
     */
    public static function buscarPorCodigo($codUsuario) {
        $oUsuario = null;
        $consulta = "Select * from T01_Usuario where T01_CodUsuario=?";
        $resultado = DBPDO::ejecutaConsulta($consulta, [$codUsuario]);
        if ($resultado->rowCount() > 0) {
            $oUsuarioConsulta = $resultado->fetchObject();
            $oUsuario = new Usuario($oUsuarioConsulta->T01_CodUsuario, $oUsuarioConsulta->T01_Password, $oUsuarioConsulta->T01_DescUsuario, $oUsuarioConsulta->T01_NumConexiones, $oUsuarioConsulta->T01_FechaHoraUltimaConexion, $oUsuarioConsulta->T01_Perfil, $oUsuarioConsulta->T01_ImagenUsuario);
        }
        return $oUsuario;
    }

    /**
     * modificarUsuario
     * 
     * Modifica la descripcion del usuario
     * 
     * @author Luis Puente Fernandez
     * 
     * @param string $desUsuario nueva descripcion del usuario
     * @param string $codUsuario codigo del usuario 
     * @return PDOStatement o null, el resultado obtenido al ejecutarConsulta
     */
    public static function modificarUsuario($desUsuario, $codUsuario) {
        $consulta = "Update T01_Usuario set T01_DescUsuario=? where T01_CodUsuario=?";
        $resultado = DBPDO::ejecutaConsulta($consulta, [$desUsuario, $codUsuario]);
        return $resultado;
    }

    /**
     * modificarPassword
     * 
     * Cambia la contraseña del usuario
     * 
     * @author Luis Puente Fernandez
     * 
     * @param string $codUsuario codigo del usuario
     * @param string $password nueva contraseña
     * @return PDOStatement o null, el resultado obtenido al ejecutarConsulta 
     */
    public static function modificarPassword($codUsuario, $password) {
        $passwordEncriptado = hash("sha256", ($codUsuario . $password));
        $consulta = "Update T01_Usuario set T01_Password=? where T01_CodUsuario=?";
        $resultado = DBPDO::ejecutaConsulta($consulta, [$passwordEncriptado, $codUsuario]);
        return $resultado;
    }

}
