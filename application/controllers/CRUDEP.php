<?php
class CRUDEP extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('CRUDESQL', 'SQLCountry'); // Cargar modelos
        $this->load->helper('url', 'form'); // Cargar el helper de URL
    }

    // Función para insertar empleados en la base de datos
    public function InserccionEmpleados()
    {
        $datas = $this->input->post();
        
        // Validar los datos del formulario
        $Errores = RulesForm($this);

        // Comprobar si hay errores en la validación
        if ($Errores['ok'] == 2) {
            echo json_encode(
                array(
                    'ok' => false,
                    'Errors' => $Errores['Errors']
                ),
            );
            return false;
        } else {
            // Crear un arreglo con los datos del empleado
            $data = array(
                'Nombre' => $this->input->POST('Nombre'),
                'Paterno' => $this->input->POST('Paterno'),
                'Materno' => $this->input->POST('Materno'),
                'Correo' => $this->input->POST('Correo'),
                'PuestoLaboral' => $this->input->POST('PuestoLaboral'),
                'AreaLaboral' => $this->input->POST('AreaLaboral'),
                'Usuario' => $this->input->POST('Usuario'),
                'Password' => $this->input->POST('Password'),
                'Status' => $this->input->POST('Status'),
                'Rol' => $this->input->POST('Rol'),
            );

            // Llamar a la función del modelo para insertar al empleado
            $respuesta = $this->CRUDESQL->InsertarEmpleado($data);
            echo json_encode($respuesta);
        }
    }

    // Función para actualizar la información de un empleado
    function ActualizarEmp()
    {
        // Validar los datos del formulario
        $Errores = RulesForm2($this);

        // Comprobar si hay errores en la validación
        if ($Errores['ok'] == 2) {
            echo json_encode(
                array(
                    'ok' => true,
                    'Errors' => $Errores['Errors']
                ),
            );
            return false;
        } else {
            // Obtener el ID del empleado desde la solicitud
            $id = $this->input->post('ID');
            
            // Crear un arreglo con los datos actualizados del empleado
            $data = array(
                'Nombre' => $this->input->post('Nombre'),
                'Paterno' => $this->input->post('Paterno'),
                'Materno' => $this->input->post('Materno'),
                'Correo' => $this->input->post('Correo'),
                'PuestoLaboral' => $this->input->post('PuestoLaboral'),
                'AreaLaboral' => $this->input->post('AreaLaboral'),
                'Usuario' => $this->input->post('Usuario'),
                'Rol' => $this->input->post('Rol'),
            );

            // Llamar a la función del modelo para actualizar al empleado
            $respuesta = $this->CRUDESQL->ActualizarEmpleado($id, $data);
            echo json_encode($respuesta);
        }
    }

    // Función para actualizar información relacionada con convocatorias en diferentes países
    function ActualizarText()
    {
        $data = $this->input->post();
        $IDPais = $data['IDPais'];
        
        // Crear un arreglo con los datos de texto actualizados
        $datos = array(
            'Academico' => $data['Academico'],
            'Profesional' => $data['Profesional'],
            'Social' => $data['Social']
        );

        // Llamar a la función del modelo para actualizar la información de texto
        $respuesta = $this->SQLCountry->actualizar_texto($IDPais, $datos);
        echo json_encode($respuesta);
    }
}
