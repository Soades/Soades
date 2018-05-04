<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ParJornadas_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    
    public function Get_Jornadas() {
        $this->db->select('*');
        $this->db->from('par_jornadas');
        $this->db->order_by('jo_id_jornada', 'ASC');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $newsList = array();
            foreach ($query->result() as $news) {
                $newsList[] = $news;
            }
            return($newsList);
        }
    }
    
    public function Get_JornadasBy($id) {
        $this->db->select('*');
        $this->db->from('par_jornadas');
        $this->db->where('jo_id_jornada', $id);
        $this->db->order_by("jo_id_jornada", "ASC");
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
        $this->db->insert('par_jornadas', $records);
    }

    public function update($records) {
        $this->db->where('jo_id_jornada', $records['jo_id_jornada']);
        return $this->db->update('par_jornadas', $records);
    }
}
