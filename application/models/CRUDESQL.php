<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CRUDESQL extends CI_Model{

    function VisualizacionEmpleados(){
        $Consulta = $this->db->query("SELECT * FROM empleadojuventudes");
        return $Consulta->result_array();
    }

    function InsertarEmpleado($data){
        $this->db->insert('empleadojuventudes', $data);
    }

    function ActualizarEmpleado($ID, $data){
        $this->db->where($ID, 'id');
        $this->db->update('empleadojuventudes', $data);

    }

    function EliminarEmpleado($ID){
        $this->db->query("delete from directivodept where ID =".$ID);
    }
}

?>