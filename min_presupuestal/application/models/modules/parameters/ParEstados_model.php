<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ParEstados_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    
    public function Get_Estado() {
        $this->db->select('*');
        $this->db->from('par_estado');
        $this->db->order_by('es_nombre', 'ASC');
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