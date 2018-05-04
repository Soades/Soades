<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ParConceptos_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    
    public function Get_Conceptos() {
        $this->db->select('*');
        $this->db->from('par_conceptos');
        $this->db->order_by('co_nombre', 'ASC');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $newsList = array();
            foreach ($query->result() as $news) {
                $newsList[] = $news;
            }
            return($newsList);
        }
    }

    public function Get_ConceptosBy($id) {
        $this->db->select('*');
        $this->db->from('par_conceptos');
        $this->db->where('co_id_concepto', $id);
        $this->db->order_by("co_nombre", "ASC");
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
        $this->db->insert('par_conceptos', $records);
    }

    public function update($records) {
        $this->db->where('co_id_concepto', $records['co_id_concepto']);
        return $this->db->update('par_conceptos', $records);
    }
}
