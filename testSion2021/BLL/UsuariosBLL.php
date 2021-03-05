<?php

class UsuariosBLL {

    private $tableName = 'usuarios';

    public function selectAll() {
        $lista = array();
        try {
            $conn = new Connection();
            $res = $conn->query('SELECT * FROM usuarios');
            while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                $obj = $this->rowToDto($row);
                $lista[] = $obj;
            }
        } catch (Exception $e) {
            echo $e;
        } return $lista;
    }

    public function selectByid($id) {
        $obj = null;
        try {
            $objConexion = new Connection();
            $res = $objConexion->queryWithParams('SELECT * FROM usuarios WHERE id = :varId', array(':varId' => $id));
            if ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                $obj = $this->rowToDto($row);
            }
        } catch (Exception $e) {
            echo $e;
        } return $obj;
    }

    public function insert($tNombre, $tCorreoE, $tPass, $tCargo, $iEstado, $dtModificacion, $dtCreacion) {
        try {
            $conn = new Connection();
            $conn->queryWithParams('INSERT INTO usuarios( tNombre,tCorreoE,tPass,tCargo,iEstado,dtModificacion,dtCreacion) VALUES( :vartNombre, :vartCorreoE, :vartPass, :vartCargo, :variEstado, :vardtModificacion, :vardtCreacion)', array(':vartNombre' => $tNombre, ':vartCorreoE' => $tCorreoE, ':vartPass' => $tPass, ':vartCargo' => $tCargo, ':variEstado' => $iEstado, ':vardtModificacion' => $dtModificacion = strftime('%y-%m-%d', time()), ':vardtCreacion' => $dtCreacion = strftime('%y-%m-%d', time()),));
        } catch (Exception $e) {
            echo $e;
        }
    }

    public function update($id, $tNombre, $tCorreoE, $tPass, $tCargo, $iEstado, $dtModificacion, $dtCreacion) {
        try {
            $conn = new Connection();
            $conn->queryWithParams('UPDATE usuarios SET tNombre = :vartNombre, tCorreoE = :vartCorreoE, tPass = :vartPass, tCargo = :vartCargo, iEstado = :variEstado, dtModificacion = :vardtModificacion, dtCreacion = :vardtCreacion WHERE id = :varid ', array(':varid' => $id, ':vartNombre' => $tNombre, ':vartCorreoE' => $tCorreoE, ':vartPass' => $tPass, ':vartCargo' => $tCargo, ':variEstado' => $iEstado, ':vardtModificacion' => $dtModificacion = strftime('%y-%m-%d', time()), ':vardtCreacion' => $dtCreacion = strftime('%y-%m-%d', time())));
        } catch (Exception $e) {
            echo $e;
        }
    }

    public function delete($id) {
        try {
            $conn = new Connection();
            $conn->queryWithParams('DELETE FROM usuarios WHERE  id = :varid ', array(':varid' => $id));
        } catch (Exception $e) {
            echo $e;
        }
    }

    function rowToDto($row) {
        $obj = new Usuarios();
        $obj->setId($row['id']);
        $obj->setTNombre($row['tNombre']);
        $obj->setTCorreoE($row['tCorreoE']);
        $obj->setTPass($row['tPass']);
        $obj->setTCargo($row['tCargo']);
        $obj->setIEstado($row['iEstado']);
        $obj->setDtModificacion($row['dtModificacion']);
        $obj->setDtCreacion($row['dtCreacion']);
        return $obj;
    }

}
