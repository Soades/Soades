<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ParGrupos_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    
    public function Get_Grupos() {
        $this->db->select('gr_id_grupo, gr_nombre, gr_tope, jo_nombre, pe_nombre, es_nombre');
        $this->db->from('par_grupos, par_jornadas, par_periodos, par_estado');
        $this->db->where('gr_id_jornada = jo_id_jornada');
        $this->db->where('gr_id_periodo = pe_id_periodo');
        $this->db->where('gr_id_estado = es_id_estado');
        $this->db->where('pe_id_estado = es_id_estado');
        $this->db->order_by('gr_nombre', 'ASC');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $newsList = array();
            foreach ($query->result() as $news) {
                $newsList[] = $news;
            }
            return($newsList);
        }
    }

    public function Get_GruposBy($id) {
        $this->db->select('gr_id_grupo, gr_nombre, gr_tope, gr_id_jornada, gr_id_periodo, gr_id_estado');
        $this->db->from('par_grupos, par_jornadas, par_periodos, par_estado');
        $this->db->where('gr_id_jornada = jo_id_jornada');
        $this->db->where('gr_id_periodo = pe_id_periodo');
        $this->db->where('gr_id_estado = es_id_estado');
        $this->db->where('pe_id_estado = es_id_estado');
        $this->db->where('gr_id_grupo', $id);
        $this->db->order_by("gr_nombre", "ASC");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $newsList = array();
            foreach ($query->result() as $news) {
                $newsList[] = $news;
            }
            return($newsList[0]);
        }
    }
    
    public function Get_GruposJornadasBy($id) {
        $this->db->select('gr_id_grupo, gr_nombre');
        $this->db->from('par_grupos, par_jornadas');
        $this->db->where('gr_id_jornada = jo_id_jornada');
        $this->db->where('gr_id_jornada', $id);
        $this->db->order_by("gr_nombre", "ASC");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $newsList = array();
            foreach ($query->result() as $news) {
                $newsList[] = $news;
            }
            return($newsList);
        }
    }

    public function create($records) {
        $this->db->insert('par_grupos', $records);
    }

    public function update($records) {
        $this->db->where('gr_id_grupo', $records['gr_id_grupo']);
        return $this->db->update('par_grupos', $records);
    }
}
