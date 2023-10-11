<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CRUDESQL extends CI_Model {

    // Esta función obtiene la lista de todos los empleados en la base de datos.
    function VisualizacionEmpleados() {
        $Consulta = $this->db->query("SELECT * FROM empleadojuventudes");
        return $Consulta->result_array();
    }

    // Esta función obtiene los datos de un empleado específico por su ID.
    function GetDatos($id) {
        $query = 'SELECT * FROM empleadojuventudes WHERE ID = ' . $id;
        $resultado = $this->db->query($query);
        return $resultado->result_array();
    }

    // Esta función inserta un nuevo empleado en la base de datos.
    function InsertarEmpleado($data) {
        $this->db->insert('empleadojuventudes', $data);
        return array(
            'ok' => ($this->db->affected_rows() != 1) ? false : true,
            'Errors' => ($this->db->affected_rows() != 1) ? $this->db->error() : '',
        );
    }

    // Esta función actualiza los datos de un empleado existente en la base de datos.
    function ActualizarEmpleado($id, $data) {
        $this->db->where('ID', $id);
        $this->db->update('empleadojuventudes', $data);
        return array(
            'ok' => ($this->db->affected_rows() != 1) ? true : false ,
            'Errors' => ($this->db->affected_rows() != 1) ? $this->db->error() : '',
        );
    }

    // Esta función obtiene la lista de áreas laborales.
    function Laboral() {
        $Consulta = 'SELECT * FROM ar';
        $Valores = $this->db->query($Consulta);
        return $Valores->result_array();
    }

    // Esta función obtiene información sobre empleados, incluyendo detalles sobre el área laboral y roles.
    function Informacion() {
        $Consulta = $this->db->query('SELECT e.ID, e.Nombre, e.Paterno, e.Materno, e.Correo, e.PuestoLaboral, a.AreaLaboral, e.Status, v.Roles
                                      FROM  empleadojuventudes e
                                      INNER JOIN ar a ON a.ID = e.AreaLaboral
                                      INNER JOIN valuesrol v ON v.ID = e.Rol');
        return $Consulta->result_array();
    }

    // Esta función obtiene la lista de roles asignados a empleados.
    function Asignamiento_Rol() {
        $Consulta = $this->db->query("SELECT * FROM valuesrol");
        return $Consulta->result_array();
    }

    // Esta función actualiza el estado de un empleado por su ID.
    public function actualizar_estado($ID, $data) {
        $this->db->where('ID', $ID);
        $this->db->update('empleadojuventudes', $data);

        // Verificar si la actualización fue exitosa
        if ($this->db->affected_rows() > 0) {
            echo 'Actualización exitosa';
        } else {
            echo 'La actualización no tuvo efecto';
        }
    }
}
