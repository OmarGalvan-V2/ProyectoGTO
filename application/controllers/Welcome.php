<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('SessionSQL');
		$this->load->helper('url','form');
	}



	function index(){
		$this->load->view('header');
		$this->load->view('SessionUsuario');
		$this->load->view('footer');
	}

	function AdministracionSession()
	{
		$this->load->view('LoginAdm');
	}

	function Administracion(){
		session_start();
		if(count($_SESSION)>0){
			$this->load->view('header');
			$this->load->view('Administracion');
			$this->load->view('footer');
		}else{
			redirect('Welcome/AdministracionSession');
		}
	}

	function AdministracionUsuario(){
		session_start();
		if(count($_SESSION)>0){
			$data['EmpleadoJuventudes'] = $this->CRUDESQL->VisualizacionEmpleados();
			$this->load->view('header');
			$this->load->view('Usuario',$data);
			$this->load->view('footer');
		}else{
			redirect('Welcome/AdministracionSession');
		}
	}
}
