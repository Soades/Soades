<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ParCargos_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    
    public function Get_Cargos() {
        $this->db->select('*');
        $this->db->from('par_cargos');
        $this->db->order_by('ca_nombre', 'ASC');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $newsList = array();
            foreach ($query->result() as $news) {
                $newsList[] = $news;
            }
            return($newsList);
        }
    }

    public function Get_CargosBy($id) {
        $this->db->select('*');
        $this->db->from('par_cargos');
        $this->db->where('ca_id_cargo', $id);
        $this->db->order_by("ca_nombre", "ASC");
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
        $this->db->insert('par_cargos', $records);
    }

    public function update($records) {
        $this->db->where('ca_id_cargo', $records['ca_id_cargo']);
        return $this->db->update('par_cargos', $records);
    }
}
