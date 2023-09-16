<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SQLCountry extends CI_Model{

    function InformacionPais(){
        $Consulta = 'SELECT * FROM convocatorias';
        $Valores = $this->db->query($Consulta);
        return $Valores->result_array();
    }

    

    public function actualizar_estado($IDCountry, $data)
    {
        $this->db->where('IDPais', $IDCountry);
        $this->db->update('Status', $data);
    
        // Verificar si la actualización fue exitosa
        if ($this->db->affected_rows() > 0) {
            echo 'Actualización exitosa'; 
        } else {
            echo 'La actualización no tuvo efecto';
        }
    }
    

    public function actualizar_pais($IDPais, $data)
    {
        $this->db->where('IDPais', $IDPais);
        $this->db->update('convocatorias', $data);
    
        // Verificar si la actualización fue exitosa
        if ($this->db->affected_rows() > 0) {
            echo 'Actualización exitosa'; 
        } else {
            echo 'La actualización no tuvo efecto';
        }
    }
    

    function ConsultaConv($IDCountry) {
        $this->db->select('*');
        $this->db->from('convocatorias');
        $this->db->where('IDPais' , $IDCountry);
        $this->db->where('Status', 1);
        $query = $this->db->get();
        
        if(count($query->result_array()) > 0 ){
            return array(
                'ok' => true,
                'data' => ($query->result_array())
            );
        }else{
            return array(
                'ok' => false,
            );   
        }
    }
    
}

?>