<?php

class Session extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        $this->load->model('SessionSQL');
    }
    
    function ValidandoDatos(){
        $data = $this->input->POST();
        $resp = $this->SessionSQL->Login($data['Usuario'], $data['Password']);
        if(count($resp) > 0){
            session_start();
            $_SESSION['datos'] = $resp; 
        }else{
            echo "";
        }
    }
    function CerrarSesion()
    {
        session_start();
        session_destroy();
        redirect('http://localhost/ProyectoGTO/Welcome/AdministracionSession');
    }
}

?>