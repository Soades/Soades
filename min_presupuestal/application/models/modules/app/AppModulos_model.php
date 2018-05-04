<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AppModulos_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    
    public function Get_Modulos() {
        $this->db->select('mo_id_modulo, mo_nombre, mo_descripcion, mo_num_modulo, es_id_estado, es_nombre');
        $this->db->from('app_modulos, par_estado');
        $this->db->where('mo_id_estado = es_id_estado');
        $this->db->where('es_id_estado <> 2');
        $this->db->order_by('mo_nombre', 'ASC');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $newsList = array();
            foreach ($query->result() as $news) {
                $newsList[] = $news;
            }
            return($newsList);
        }
    }

    public function Get_ModulosBy($id) {
        $this->db->select('mo_id_modulo, mo_nombre, mo_descripcion, mo_num_modulo, es_id_estado, es_nombre');
        $this->db->from('app_modulos, par_estado');
        $this->db->where('mo_id_estado = es_id_estado');
        $this->db->where('mo_id_modulo', $id);
        $this->db->where('es_id_estado <> 2');
        $this->db->order_by("mo_nombre", "ASC");
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
        $this->db->insert('app_modulos', $records);
    }

    public function update($records) {
        $this->db->where('mo_id_modulo', $records['mo_id_modulo']);
        return $this->db->update('app_modulos', $records);
    }
}
