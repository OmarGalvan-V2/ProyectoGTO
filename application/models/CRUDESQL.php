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
        $Consulta = $this->db->query('SELECT e.ID, e.Nombre, e.Paterno, e.Materno, e.Correo, e.PuestoLaboral, a.AreaLaboral
                                      FROM  empleadojuventudes e
                                      INNER JOIN ar a on a.ID = e.AreaLaboral');
        return $Consulta->result_array();
    }

    public function ConsultaConv($Countryid) {
        $Consulta = $this->db->query('SELECT Pais, Descripcion, Instrucciones
                                      FROM convocatorias
                                      WHERE Pais = ?', array($Countryid));
    
        $result = $Consulta->result_array();
    
        $response = array();
    
        if (empty($result)) {
            $response['success'] = false;
            $response['message'] = 'No se encontraron resultados';
        } else {
            $response['success'] = true;
            $response['data'] = $result;
        }
    
        echo json_encode($response);
    }
}
?>