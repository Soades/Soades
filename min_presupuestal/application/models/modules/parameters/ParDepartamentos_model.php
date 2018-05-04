<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
  * Autor: LUIS LOPEZ LOPEZ
  * Fecha: 09/11/2015
  * Hora: 10:20 PM
*/

class ParDepartamentos_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function Get_Departamentos() {
        $this->db->select('*');
        $this->db->from('par_departamentos');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $newsList = array();
            foreach ($query->result() as $news) {
                $newsList[] = $news;
            }
            return($newsList);
        }
    }
}
