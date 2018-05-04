<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ParGenero_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    
    public function Get_Genero() {
        $this->db->select('*');
        $this->db->from('par_genero');
        $this->db->order_by('ge_nombre', 'DESC');
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
