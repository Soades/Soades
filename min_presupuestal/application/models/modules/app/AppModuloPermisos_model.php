<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AppModuloPermisos_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    
    public function Get_PermisoModulo() {
        $this->db->select('mp_id_mp, mo_id_modulo, mo_nombre, pe_id_permiso, pe_nombre');
        $this->db->from('app_modulo_permisos, app_modulos, app_permisos, par_estado');
        $this->db->where('mp_id_modulo = mo_id_modulo');
        $this->db->where('mp_id_permiso = pe_id_permiso');
        $this->db->where('mo_id_estado = es_id_estado');
        $this->db->where('es_id_estado <> 2');
        $this->db->order_by('mp_id_mp', 'ASC');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $newsList = array();
            foreach ($query->result() as $news) {
                $newsList[] = $news;
            }
            return($newsList);
        }
    }

    public function Get_PermisoModuloBy($id) {
        $this->db->select('mp_id_mp, mo_id_modulo, mo_nombre, pe_id_permiso, pe_nombre');
        $this->db->from('app_modulo_permisos, app_modulos, app_permisos, par_estado');
        $this->db->where('mp_id_modulo = mo_id_modulo');
        $this->db->where('mp_id_permiso = pe_id_permiso');
        $this->db->where('mo_id_estado = es_id_estado');
        $this->db->where('es_id_estado <> 2');
        $this->db->where('mp_id_mp', $id);
        $this->db->order_by("mp_id_mp", "ASC");
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
        $this->db->insert('app_modulo_permisos', $records);
    }

    public function update($records) {
        $this->db->where('mp_id_mp', $records['mp_id_mp']);
        return $this->db->update('app_modulo_permisos', $records);
    }
}
