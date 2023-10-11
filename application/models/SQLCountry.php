<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SQLCountry extends CI_Model {

    // Esta función obtiene información sobre convocatorias en todos los países.
    function InformacionPais() {
        $Consulta = 'SELECT * FROM convocatorias';
        $Valores = $this->db->query($Consulta);
        return $Valores->result_array();
    }

    // Esta función obtiene datos específicos sobre convocatorias en un país dado por su ID.
    function GetDatosCountry($IDPais) {
        $this->db->select('*');
        $this->db->from('convocatorias');
        $this->db->where('IDPais', $IDPais);
        $query = $this->db->get();

        if (count($query->result_array()) > 0) {
            return array(
                'ok' => true,
                'data' => ($query->result_array())
            );
        } else {
            return array(
                'ok' => false,
            );
        }
    }

    // Esta función actualiza los datos de una convocatoria en un país específico por su ID de país.
    function actualizar_pais($IDPais, $data) {
        $this->db->where('IDPais', $IDPais);
        $this->db->update('convocatorias', $data);
    }

    // Esta función actualiza el texto de una convocatoria en un país específico por su ID de país.
    function actualizar_texto($IDPais, $datos) {
        $this->db->where('IDPais', $IDPais);
        $this->db->update('convocatorias', $datos);
        return array(
            'ok' => ($this->db->affected_rows() != 1) ? false : true,
            'Errors' => ($this->db->affected_rows() != 1) ? $this->db->error() : '',
        );
    }

    // Esta función consulta información administrativa sobre convocatorias en un país específico.
    function ConsultaAdministrativa($IDCountry) {
        $this->db->select('*');
        $this->db->from('convocatorias');
        $this->db->where('IDPais', $IDCountry);
        $query = $this->db->get();

        if (count($query->result_array()) > 0) {
            return array(
                'ok' => true,
                'data' => ($query->result_array())
            );
        } else {
            return array(
                'ok' => false,
            );
        }
    }

    // Esta función consulta información de convocatorias activas para usuarios en un país específico.
    function ConsultaUsuario($IDCountry) {
        $this->db->select('*');
        $this->db->from('convocatorias');
        $this->db->where('IDPais', $IDCountry);
        $this->db->where('Status', 1);
        $query = $this->db->get();

        if (count($query->result_array()) > 0) {
            return array(
                'ok' => true,
                'data' => ($query->result_array())
            );
        } else {
            return array(
                'ok' => false,
            );
        }
    }

    // Esta función obtiene la lista de convocatorias activas en todos los países.
    function Countryactive() {
        $Consulta = 'SELECT * FROM convocatorias';
        $Valores = $this->db->query($Consulta);
        return $Valores->result_array();
    }
}
