<?php

class ClientesBLL {

    private $tableName = 'clientes';

    public function selectAll() {
        $lista = array();
        try {
            $conn = new Connection();
            $res = $conn->query('SELECT * FROM clientes');
            while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                $obj = $this->rowToDto($row);
                $lista[] = $obj;
            }
        } catch (Exception $e) {
            echo $e;
        } return $lista;
    }

    public function selectAllByOrderDESC($elem) {
        $lista = array();
        try {
            $conn = new Connection();
            $res = $conn->query('SELECT * FROM clientes ORDER BY ' . $elem . ' DESC');
            while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                $obj = $this->rowToDto($row);
                $lista[] = $obj;
            }
        } catch (Exception $e) {
            echo $e;
        } return $lista;
    }

    public function selectAllByOrderASC($elem) {
        $lista = array();
        try {
            $conn = new Connection();
            $res = $conn->query('SELECT * FROM clientes ORDER BY ' . $elem . ' ASC');
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
            $res = $objConexion->queryWithParams('SELECT * FROM clientes WHERE id = :varId', array(':varId' => $id));
            if ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                $obj = $this->rowToDto($row);
            }
        } catch (Exception $e) {
            echo $e;
        } return $obj;
    }

    public function insert($tNombres, $tApellidos, $tEdad, $tCedula, $tNacionalidad, $tEstado, $dtCreado, $dtModificado) {
        try {
            $conn = new Connection();
            $conn->queryWithParams('INSERT INTO clientes(tNombres,tApellidos,tEdad,tCedula,tNacionalidad,tEstado,dtCreado,dtModificado) VALUES( :vartNombres, :vartApellidos, :vartEdad, :vartCedula, :vartNacionalidad, :vartEstado, :vardtCreado, :vardtModificado)', array(':vartNombres' => $tNombres, ':vartApellidos' => $tApellidos, ':vartEdad' => $tEdad, ':vartCedula' => $tCedula, ':vartNacionalidad' => $tNacionalidad, ':vartEstado' => $tEstado, ':vardtCreado' => $dtCreado, ':vardtModificado' => $dtModificado));
        } catch (Exception $e) {
            echo $e;
        }
    }

    public function update($id, $tNombres, $tApellidos, $tEdad, $tCedula, $tNacionalidad, $tEstado, $dtCreado, $dtModificado) {
        try {
            $conn = new Connection();
            $conn->queryWithParams('UPDATE clientes SET tNombres = :vartNombres, tApellidos = :vartApellidos, tEdad = :vartEdad, tCedula = :vartCedula, tNacionalidad = :vartNacionalidad, tEstado = :vartEstado, dtCreado = :vardtCreado, dtModificado = :vardtModificado WHERE id = :varid ', array(':varid' => $id, ':vartNombres' => $tNombres, ':vartApellidos' => $tApellidos, ':vartEdad' => $tEdad, ':vartCedula' => $tCedula, ':vartNacionalidad' => $tNacionalidad, ':vartEstado' => $tEstado, ':vardtCreado' => $dtCreado, ':vardtModificado' => $dtModificado));
        } catch (Exception $e) {
            echo $e;
        }
    }

    public function delete($id) {
        try {
            $conn = new Connection();
            $conn->queryWithParams('DELETE FROM clientes WHERE  id = :varid ', array(':varid' => $id));
        } catch (Exception $e) {
            echo $e;
        }
    }

    function rowToDto($row) {
        $obj = new Clientes();
        $obj->setId($row['id']);
        $obj->setTNombres($row['tNombres']);
        $obj->setTApellidos($row['tApellidos']);
        $obj->setTEdad($row['tEdad']);
        $obj->setTCedula($row['tCedula']);
        $obj->setTNacionalidad($row['tNacionalidad']);
        $obj->setTEstado($row['tEstado']);
        $obj->setDtCreado($row['dtCreado']);
        $obj->setDtModificado($row['dtModificado']);
        return $obj;
    }

}
