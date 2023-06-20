<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SessionSQL extends CI_Model
{

    function Login($Usuario, $Password)
    {   
        $Resultado = $this->db->query("select * from loginadministrativo where Usuario = '" . $Usuario . "' and Password = '" . $Password . "'");
        return $Resultado->result_array(); //Convierte el array en una consulta
    }
}

?>