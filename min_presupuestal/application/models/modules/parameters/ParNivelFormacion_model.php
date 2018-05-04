<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ParNivelFormacion_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    
    public function Get_NivelFormacion() {
        $this->db->select('*');
        $this->db->from('par_nivel_formacion');
        $this->db->order_by('nf_nombre', 'ASC');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $newsList = array();
            foreach ($query->result() as $news) {
                $newsList[] = $news;
            }
            return($newsList);
        }
    }

    public function Get_NivelFormacionBy($id) {
        $this->db->select('*');
        $this->db->from('par_nivel_formacion');
        $this->db->where('nf_id_nf', $id);
        $this->db->order_by("nf_nombre", "ASC");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $newsList = array();
            foreach ($query->result() as $news) {
                $newsList[] = $news;
            }
            return($newsList[0]);
        }
    }
    
    public function create($records) {
        $this->db->insert('par_nivel_formacion', $records);
    }

    public function update($records) {
        $this->db->where('nf_id_nf', $records['nf_id_nf']);
        return $this->db->update('par_nivel_formacion', $records);
    }
}
