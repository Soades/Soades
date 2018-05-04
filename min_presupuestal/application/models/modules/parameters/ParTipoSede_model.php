<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ParTipoSede_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    
    public function Get_TipoSede() {
        $this->db->select('*');
        $this->db->from('par_tipo_sede');
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