<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AppRoles_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    
    public function Get_Roles() {
        $this->db->select('*');
        $this->db->from('app_roles');
        $this->db->order_by('ro_nombre', 'ASC');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $newsList = array();
            foreach ($query->result() as $news) {
                $newsList[] = $news;
            }
            return($newsList);
        }
    }

    public function Get_RolesBy($id) {
        $this->db->select('*');
        $this->db->from('app_roles');
        $this->db->where('ro_id_rol', $id);
        $this->db->order_by("ro_nombre", "ASC");
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
        $this->db->insert('app_roles', $records);
    }

    public function update($records) {
        $this->db->where('ro_id_rol', $records['ro_id_rol']);
        return $this->db->update('app_roles', $records);
    }
}
