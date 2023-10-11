<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('SessionSQL', 'SQLCountry');
		$this->load->helper('url', 'form');
	}


	function index()
	{
		$data['Convocatorias'] = $this->SQLCountry->InformacionPais();
		$this->load->view('header');
		$this->load->view('Map/MapMundiUser',$data);
		$this->load->view('footer');
	}

	function AdministracionSession()
	{
		$this->load->view('UserLogin/LoginAdm');
	}

	function Administracion()
	{
		session_start();
		if (isset($_SESSION) > 0) {
			if ($_SESSION['datos'][0]['Status'] >= '1' && $_SESSION['datos'][0]['Rol'] >='1') {
				$this->load->view('header');
				$this->load->view('Administracion');
				$this->load->view('footer');
			} else {
				echo 'Acceso no autorizado';
			}
		} else {
			redirect('Welcome/index');
		}
	}

	function AdministracionUsuario()
	{
		session_start();
		if (count($_SESSION) > 0) {
			if ($_SESSION['datos'][0]['Status'] == '1' && $_SESSION['datos'][0]['Rol'] == '1') {
				$data['EmpleadoJuventudes'] = $this->CRUDESQL->Informacion();
				$this->load->view('header');
				$this->load->view('Users/Usuario', $data);
				$this->load->view('footer');
			} else {
				echo 'No tienes acceso a esta pagina :(';
			}
		} else {
			redirect('Welcome/index');
		}
	}

	function AdministracionMapi()
	{
		session_start();
		if (count($_SESSION) > 0) {
			if ($_SESSION['datos'][0]['Rol'] >= '1' && $_SESSION['datos'][0]['Status'] == '1') {
				$data['Convocatorias'] = $this->SQLCountry->Countryactive();
				$this->load->view('header');
				$this->load->view('Map/MapaMundi', $data);
				$this->load->view('footer');
			} else {
				echo 'No tienes acceso a esta pagina :(';
			}
		} else {
			redirect('Welcome/index');
		}
	}


	public function AdministracionForm()
	{
		session_start();

		if (isset($_SESSION['datos'])) {
			$datosUsuario = $_SESSION['datos'][0];

			if ($datosUsuario['Status'] == '1' && $datosUsuario['Rol'] == '1') {
				$Lab['Areas'] = $this->CRUDESQL->Laboral();
				$Rol['RolesAsg'] = $this->CRUDESQL->Asignamiento_Rol();
				$Emp['EmpleadoJuventudes'] = $this->CRUDESQL->Informacion();
				$data = array(
					'Areas' => $Lab,
					'RolesAsg' => $Rol,
					'EmpleadoJuventudes' => $Emp
				);	
				$this->load->view('header');
				$this->load->view('UserRegister/RegistroEmpleado', $data);
				$this->load->view('footer');
			} else {
				echo "Acceso no autorizado";
			}
		} else {
			redirect('Welcome/index');
		}
	}

	function EditarUsuario()
	{
		session_start();

		if (isset($_SESSION['datos'])) {
			$datosUsuario = $_SESSION['datos'][0];
			if ($datosUsuario['Status'] == '1' && $datosUsuario['Rol'] == '1') {
				$ID = $this->input->get('id');
				$datos = $this->CRUDESQL->GetDatos($ID);
				$AreaL['Lab'] = $this->CRUDESQL->Laboral();
				$Rol['RolesAsg'] = $this->CRUDESQL->Asignamiento_Rol();
				$Arr = [
					'Lab' => $AreaL,
					'Empleado' => $datos,
					'RolesAsg' => $Rol
				];

				$this->load->view('header');
				$this->load->view('UserEdit/EditarUsuario', $Arr);
				$this->load->view('footer');
			} else {
				echo 'Acceso no autorizado';
			}
		} else {
			redirect('Welcome/index');
		}
	}

	function EditarMapText()
	{
		session_start();
		if (isset($_SESSION['datos'])) {
			$datosUsuario = $_SESSION['datos'][0];
			if ($datosUsuario['Status'] == '1' && $datosUsuario['Rol'] >= '1') {
				$IDPais = $this->input->get('IDPais');
				$Datos = $this->SQLCountry->GetDatosCountry($IDPais);
				$Arr = [
					'IDPais' => $IDPais, // Pasa el ID del país a la vista
					'Convcountry' => $Datos,
				];
				$this->load->view('header');
				$this->load->view('CountryTextEdit/EditTextCountry', $Arr);
				$this->load->view('footer');
			} else {
				echo 'Acceso no autorizado';
			}
		} else {
			redirect('Welcome/index');
		}
	}

	public function ConsultaMapi()
	{
		session_start();
		$IDCountry = $this->input->POST('Countryid');
		$response = $this->SQLCountry->ConsultaAdministrativa($IDCountry);
		echo json_encode($response);
	}

	public function ConsultaUserMap()
	{
		$IDCountry = $this->input->POST('Countryid');
		$response = $this->SQLCountry->ConsultaUsuario($IDCountry);
		echo json_encode($response);
	}



	public function ConsultaEstado()
	{
		$data['Convocatorias'] = $this->SQLCountry->InformacionPais();
		$this->load->view('SearchCountry_js', $data);
	}

}