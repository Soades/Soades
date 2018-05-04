<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ParSisben_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    
    public function Get_Sisben() {
        $this->db->select("*");
        $this->db->from("par_sisben, par_estado");
        $this->db->where("se_id_estado = es_id_estado");
        $this->db->order_by("si_nombre", "ASC");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $newsList = array();
            foreach ($query->result() as $news) {
                $newsList[] = $news;
            }
            return($newsList);
        }
    }

    public function Get_SisbenBy($id) {
        $this->db->select("*");
        $this->db->from("par_sisben, par_estado");
        $this->db->where("si_id_sisben", $id);
        $this->db->order_by("si_nombre", "ASC");
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
        $this->db->insert('par_sisben', $records);
    }

    public function update($records) {
        $this->db->where('si_id_sisben', $records['si_id_sisben']);
        return $this->db->update('par_sisben', $records);
    }
}
