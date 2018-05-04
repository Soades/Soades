<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ParAreas_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    
    public function Get_Areas() {
        $this->db->select('*');
        $this->db->from('par_areas');
        $this->db->order_by('ar_nombre', 'ASC');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $newsList = array();
            foreach ($query->result() as $news) {
                $newsList[] = $news;
            }
            return($newsList);
        }
    }

    public function Get_AreasBy($id) {
        $this->db->select('*');
        $this->db->from('par_areas');
        $this->db->where('ar_id_area', $id);
        $this->db->order_by("ar_nombre", "ASC");
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
        $this->db->insert('par_areas', $records);
    }

    public function update($records) {
        $this->db->where('ar_id_area', $records['ar_id_area']);
        return $this->db->update('par_areas', $records);
    }
}
