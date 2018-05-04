<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ParTipo_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    
    public function Get_Tipo() {
        $this->db->select('*');
        $this->db->from('par_tipo');
        $this->db->order_by('ti_nombre', 'DESC');
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
