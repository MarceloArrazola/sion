<?php

class Usuarios {

    public $Id, $TNombre, $TCorreoE, $TPass, $TCargo, $IEstado, $DtModificacion, $DtCreacion;

    function getId() {
        return $this->id;
    }

    function setId($id) {
        $this->id = $id;
    }

    function getTNombre() {
        return $this->tNombre;
    }

    function setTNombre($tNombre) {
        $this->tNombre = $tNombre;
    }

    function getTCorreoE() {
        return $this->tCorreoE;
    }

    function setTCorreoE($tCorreoE) {
        $this->tCorreoE = $tCorreoE;
    }

    function getTPass() {
        return $this->tPass;
    }

    function setTPass($tPass) {
        $this->tPass = $tPass;
    }

    function getTCargo() {
        return $this->tCargo;
    }

    function setTCargo($tCargo) {
        $this->tCargo = $tCargo;
    }

    function getIEstado() {
        return $this->iEstado;
    }

    function setIEstado($iEstado) {
        $this->iEstado = $iEstado;
    }

    function getDtModificacion() {
        return $this->dtModificacion;
    }

    function setDtModificacion($dtModificacion) {
        $this->dtModificacion = $dtModificacion;
    }

    function getDtCreacion() {
        return $this->dtCreacion;
    }

    function setDtCreacion($dtCreacion) {
        $this->dtCreacion = $dtCreacion;
    }

}
