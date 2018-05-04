<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ParDiscapacidades_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    
    public function Get_Discapadidad() {
        $this->db->select('*');
        $this->db->from('par_discapacidades');
        $this->db->order_by('di_nombre', 'ASC');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $newsList = array();
            foreach ($query->result() as $news) {
                $newsList[] = $news;
            }
            return($newsList);
        }
    }

    public function Get_DiscapacidadBy($id) {
        $this->db->select('*');
        $this->db->from('par_discapacidades');
        $this->db->where('di_id_discapacidad', $id);
        $this->db->order_by("di_nombre", "ASC");
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
        $this->db->insert('par_discapacidades', $records);
    }

    public function update($records) {
        $this->db->where('di_id_discapacidad', $records['di_id_discapacidad']);
        return $this->db->update('par_discapacidades', $records);
    }
}
