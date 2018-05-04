<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
  * Autor: LUIS LOPEZ LOPEZ
  * Fecha: 09/11/2015
  * Hora: 10:27 PM
*/

class ParMunicipios_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function Get_MunicipiosBy($dep) {
        $this->db->where('mu_de_codigo', $dep);
        $this->db->from('par_municipios');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $newsList = array();
            foreach ($query->result() as $news) {
                $newsList[] = $news;
            }
            return($newsList);
        }
    }
    
    public function Get_Municipios() {
        $this->db->select('*');
        $this->db->from('par_municipios, par_departamentos');
        $this->db->where('mu_de_codigo = de_codigo');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
//            $newsList = array();
//            foreach ($query->result() as $news) {
//                $newsList[] = $news;
//            }
            return($query->result());
        }
    }
}