<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class usuarios_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    
    public function Get_UsuarioBy($username) {
        $this->db->select('*');
        $this->db->from('app_usuarios, app_roles, par_estado, adm_sede, par_municipios, par_departamentos');
        $this->db->where('us_id_rol = ro_id_rol');        
        $this->db->where('us_id_estado = es_id_estado');        
        $this->db->where('se_id_estado = es_id_estado');
        $this->db->where('se_mu_codigo = mu_codigo');
        $this->db->where('mu_de_codigo = de_codigo');
        $this->db->where('us_id_sede = se_id_sede');
        $this->db->where('us_usuario', $username);
        $this->db->order_by('us_usuario', 'ASC');
        $query = $this->db->get();
        
        if ($query->num_rows() > 0) {
            $newsList = array();
            foreach ($query->result() as $news) {
                $newsList = $news;
            }
            return($newsList);
        }
    }
    
    public function create($records) {
        $this->db->insert('app_usuarios', $records);
    }

    public function update($records) {
        $this->db->where('us_id_usuario', $records['us_id_usuario']);
        return $this->db->update('app_usuarios', $records);
    }
}
