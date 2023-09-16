<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CRUDESQL extends CI_Model{

    function VisualizacionEmpleados(){
        $Consulta = $this->db->query("SELECT * FROM empleadojuventudes");
        return $Consulta->result_array();
    }

    function GetDatos($id){
        $query = 'select * from empleadojuventudes where ID = '.$id;
        $resultado = $this->db->query($query);
        return $resultado->result_array();
    }

    function InsertarEmpleado($data){
        $this->db->insert('empleadojuventudes', $data);
        return array(
            'ok' => ($this->db->affected_rows() != 1) ? false : true,
            'Errors' => ($this->db->affected_rows() != 1) ? $this->db->error() : '',
        );
    }

    function ActualizarEmpleado($id, $data){
        $this->db->where($id, 'id');
        $this->db->update('empleadojuventudes', $data);
    }
    
    function Laboral(){
        $Consulta = 'SELECT * FROM ar';
        $Valores = $this->db->query($Consulta);
        return $Valores->result_array();
    }

    function Informacion(){
        $Consulta = $this->db->query('SELECT e.ID, e.Nombre, e.Paterno, e.Materno, e.Correo, e.PuestoLaboral, a.AreaLaboral, e.Status
                                      FROM  empleadojuventudes e
                                      INNER JOIN ar a on a.ID = e.AreaLaboral');
        return $Consulta->result_array();
    }


    public function actualizar_estado($ID, $data)
    {
        print_r($data);
        $this->db->where('ID', $ID);
        $this->db->update('empleadojuventudes', $data);
    
        // Verificar si la actualización fue exitosa
        if ($this->db->affected_rows() > 0) {
            echo 'Actualización exitosa'; 
        } else {
            echo 'La actualización no tuvo efecto';
        }
    }
    
}
?>