<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ParAsignaturas_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    
    public function Get_Asignaturas() {
        $this->db->select('*');
        $this->db->from('par_asignaturas, par_areas');
        $this->db->where('as_id_area = ar_id_area');
        $this->db->order_by('as_nombre', 'ASC');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $newsList = array();
            foreach ($query->result() as $news) {
                $newsList[] = $news;
            }
            return($newsList);
        }
    }

    public function Get_AsignaturasBy($id) {
        $this->db->select('*');
        $this->db->from('par_asignaturas, par_areas');
        $this->db->where('as_id_area = ar_id_area');
        $this->db->where('as_id_asignatura', $id);
        $this->db->order_by("as_nombre", "ASC");
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
        $this->db->insert('par_asignaturas', $records);
    }

    public function update($records) {
        $this->db->where('as_id_asignatura', $records['as_id_asignatura']);
        return $this->db->update('par_asignaturas', $records);
    }
}
