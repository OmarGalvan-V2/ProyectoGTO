<?php

class Session extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        $this->load->model('SessionSQL', 'CRUDESQL');
    }
    
 
    function ValidandoDatos(){
        $data = $this->input->post();
        $resp = $this->SessionSQL->Login($data['Usuario'], $data['Password']);
        if(count($resp) > 0){
            session_start();
            $_SESSION['datos'] = $resp; 
        } else {
            echo "No se encontraron datos válidos.";
        }
    }
    
    function CambiandoEstadoPersonal() {
        $id = $this->input->post('ID');
        $estado = $this->input->post('Status'); 
        print_r($estado);
        $data = array(
            'Status' => $estado
        );
        $this->CRUDESQL->actualizar_estado($id, $data);
    }

    function CambiandoEstadoPais() {
        $id = $this->input->post('IDPais');
        $estado = $this->input->post('Status'); 
        $data = array(
            'Status' => $estado
        );
        $this->CRUDESQL->actualizar_pais($id, $data);
    }
    
    
    
    function CerrarSesion()
    {
        session_start();
        session_destroy();
        redirect('http://localhost/ProyectoGTO/Welcome/AdministracionSession');
    }
}