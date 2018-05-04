<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ParConsecutivos_model extends CI_Model {
    public function __construct() {
        parent::__construct();
    }

    public function Get_Consecutivos($campo) {
        $this->db->select('LPAD('.$campo.', 5, 0) con');
        $this->db->from('par_consecutivo');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $newsList = array();
            foreach ($query->result() as $news) {
                $newsList[] = $news;
            }
            return($newsList);
        }
    }

    public function update($campo) {
        $query = $this->db->query("UPDATE par_consecutivo SET " . $campo . "=" . $campo . " + 1");
    }
}