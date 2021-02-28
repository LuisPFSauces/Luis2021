<?php

/**
 * Class Usuario
 *
 * Que define la estructura de los usuarios
 * 
 * @author Cristina Nuñez y Javier Nieto
 * @since 1.0
 * @version 0.3
 */
class Usuario {

    /**
     * Codigo del usuario
     * @var string 
     */
    private $codUsuario;
    /**
     * Password del usuario
     * @var string 
     */
    private $password;
    /**
     * Descripcion del usuario
     * @var string 
     */
    private $descUsuario;
    /**
     * Numero de conexiones del usuario
     * @var int 
     */
    private $numConexiones;
    /**
     * Fecha de ultima conexion del usuario en timestamp
     * @var int 
     */
    private $fechaHoraUltimaConexion;
    /**
     * Tipo de perfil del usuario (usuario, administrador) 
     * 
     * @var string
     */
    private $perfil;

    function __construct($codUsuario, $password, $descUsuario, $numConexiones, $fechaHoraUltimaConexion, $perfil, $imagenPerfil) {
        $this->codUsuario = $codUsuario;
        $this->password = $password;
        $this->descUsuario = $descUsuario;
        $this->numConexiones = $numConexiones;
        $this->fechaHoraUltimaConexion = $fechaHoraUltimaConexion;
        $this->perfil = $perfil;
        $this->imagenPerfil = $imagenPerfil;
    }

    function getCodUsuario() {
        return $this->codUsuario;
    }

    function getPassword() {
        return $this->password;
    }

    function getDescUsuario() {
        return $this->descUsuario;
    }

    function getNumConexiones() {
        return $this->numConexiones;
    }

    function getFechaHoraUltimaConexion() {
        return $this->fechaHoraUltimaConexion;
    }

    function getPerfil() {
        return $this->perfil;
    }

    function setCodUsuario($codUsuario) {
        $this->codUsuario = $codUsuario;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function setDescUsuario($descUsuario) {
        $this->descUsuario = $descUsuario;
    }

    function setNumConexiones($numConexiones) {
        $this->numConexiones = $numConexiones;
    }

    function setFechaHoraUltimaConexion($fechaHoraUltimaConexion) {
        $this->fechaHoraUltimaConexion = $fechaHoraUltimaConexion;
    }

    function setPerfil($perfil) {
        $this->perfil = $perfil;
    }

}
