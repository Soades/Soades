<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ParEstadoCivil_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    
    public function Get_EstadoCivil() {
        $this->db->select("*");
        $this->db->from('par_estado_civil');
        $this->db->order_by('ec_nombre', 'ASC');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $newsList = array();
            foreach ($query->result() as $news) {
                $newsList[] = $news;
            }
            return($newsList);
        }
    }

    public function Get_EstadoCivilBy($id) {
        $this->db->select('*');
        $this->db->from('par_estado_civil');
        $this->db->where('ec_id_ec', $id);
        $this->db->order_by("ec_nombre", "ASC");
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
        $this->db->insert('par_estado_civil', $records);
    }

    public function update($records) {
        $this->db->where('ec_id_ec', $records['ec_id_ec']);
        return $this->db->update('par_estado_civil', $records);
    }
}
