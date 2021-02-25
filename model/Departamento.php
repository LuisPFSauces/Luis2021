<?php

class Departamento {

    private $codDepartamento;

    private $descDepartamento;

    private $fechaCreacionDepartamento;

    private $volumenDeNegocio;

    private $fechaBajaDepartamento;

    function __construct($codDepartamento, $descDepartamento, $fechaCreacionDepartamento, $volumenDeNegocio, $fechaBajaDepartamento = null) {
        $this->codDepartamento = $codDepartamento;
        $this->descDepartamento = $descDepartamento;
        $this->fechaCreacionDepartamento = $fechaCreacionDepartamento;
        $this->volumenDeNegocio = $volumenDeNegocio;
        $this->fechaBajaDepartamento = $fechaBajaDepartamento;
    }
    
    function __get($atributo) {
        return $this->$atributo;
    }

    function __set($atributo, $nuevoValor) {
        $this->$atributo = $nuevoValor;
    }

}
