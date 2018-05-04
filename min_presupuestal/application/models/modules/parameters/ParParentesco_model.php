<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ParParentesco_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function Get_Parentesco() {
        $this->db->select('*');
        $this->db->from('par_parentesco');
        $this->db->order_by('pa_id_parentesco', 'ASC');
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
