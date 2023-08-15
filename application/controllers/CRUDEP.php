<?php

class CRUDEP extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('CRUDESQL');
        $this->load->helper('url', 'form');
    }

    public function InserccionEmpleados()
    {
        $datas = $this->input->post();
        //print_r($data);

        $Errores = RulesForm($this);
        //print_r($Errores);
        if ($Errores['ok'] == 2) {
            echo json_encode(
                array(
                    'ok' => false,
                    'Errors' => $Errores['Errors']
                ),
            );
            return false;
        } else {
            $data = array(
                'Nombre' => $this->input->POST('Nombre'),
                'Paterno' => $this->input->POST('Paterno'),
                'Materno' => $this->input->POST('Materno'),
                'Correo' => $this->input->POST('Correo'),
                'PuestoLaboral' => $this->input->POST('PuestoLaboral'),
                'AreaLaboral' => $this->input->POST('AreaLaboral'),
                'Usuario' => $this->input->POST('Usuario'),
                'Password' => $this->input->POST('Password')
            );
            $respuesta = $this->CRUDESQL->InsertarEmpleado($data);
            echo json_encode($respuesta);
        } 
    }

    function ActualizarEmp()
    {
        $datas = $this->input->post();
        //print_r($data);

        $Errores = RulesForm($this);
        //print_r($Errores);
        if ($Errores['ok'] == 2) {
            echo json_encode(
                array(
                    'ok' => false,
                    'Errors' => $Errores['Errors']
                ),
            );
            return false;
        } else {
            $id = $this->input->get('id');
            $data = array(
                'Nombre' => $this->input->POST('Nombre'),
                'Paterno' => $this->input->POST('Paterno'),
                'Materno' => $this->input->POST('Materno'),
                'Correo' => $this->input->POST('Correo'),
                'PuestoLaboral' => $this->input->POST('PuestoLaboral'),
                'AreaLaboral' => $this->input->POST('AreaLaboral'),
                'Usuario' => $this->input->POST('Usuario'),

            );
            $respuesta = $this->CRUDESQL->ActualizarEmpleado($id,$data);
            echo json_encode($respuesta);
        } 
    }


    

}
