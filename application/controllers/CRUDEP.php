<?php

class CRUDEP extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        $this->load->model('CRUDESQL');
        $this->load->helper('url', 'form');
    }

    function InserccionEmpleados(){
            $data = array(
                'Nombre' => $this->input->POST('Nombre'),
                'Paterno' => $this->input->POST('Paterno'),
                'Materno' => $this->input->POST('Materno'),
                'PuestoLaboral' => $this->input->POST('PuestoLaboral'),
                'AreaLaboral' => $this->input->POST('AreaLaboral')
            );
            $this->CRUDESQL->InsertarEmpleado($data);
            redirect('Welcome/AdministracionUsuario');
    }
}
?>