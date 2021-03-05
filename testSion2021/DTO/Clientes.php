<?php

class Clientes {

    public $Id, $TNombres, $TApellidos, $TEdad, $TCedula, $TNacionalidad, $TEstado, $DtCreado, $DtModificado;

    function getId() {
        return $this->id;
    }

    function setId($id) {
        $this->id = $id;
    }

    function getTNombres() {
        return $this->tNombres;
    }

    function setTNombres($tNombres) {
        $this->tNombres = $tNombres;
    }

    function getTApellidos() {
        return $this->tApellidos;
    }

    function setTApellidos($tApellidos) {
        $this->tApellidos = $tApellidos;
    }

    function getTEdad() {
        return $this->tEdad;
    }

    function setTEdad($tEdad) {
        $this->tEdad = $tEdad;
    }

    function getTCedula() {
        return $this->tCedula;
    }

    function setTCedula($tCedula) {
        $this->tCedula = $tCedula;
    }

    function getTNacionalidad() {
        return $this->tNacionalidad;
    }

    function setTNacionalidad($tNacionalidad) {
        $this->tNacionalidad = $tNacionalidad;
    }

    function getTEstado() {
        return $this->tEstado;
    }

    function setTEstado($tEstado) {
        $this->tEstado = $tEstado;
    }

    function getDtCreado() {
        return $this->dtCreado;
    }

    function setDtCreado($dtCreado) {
        $this->dtCreado = $dtCreado;
    }

    function getDtModificado() {
        return $this->dtModificado;
    }

    function setDtModificado($dtModificado) {
        $this->dtModificado = $dtModificado;
    }

}
