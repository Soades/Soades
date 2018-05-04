<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ParTipoDocumento_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    
    public function Get_TipoDocumento() {
        $this->db->select('*');
        $this->db->from('par_tipo_documento');
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