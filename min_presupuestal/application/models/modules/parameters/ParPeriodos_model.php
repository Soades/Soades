<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ParPeriodos_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    
    public function Get_Periodos() {
        $this->db->select('pe_id_periodo, pe_nombre, DATE_FORMAT(pe_fecha_inicio,"%d/%m/%Y")pe_fecha_inicio, DATE_FORMAT(pe_fecha_fina,"%d/%m/%Y")pe_fecha_fina, es_nombre, ti_id_tipo');
        $this->db->from('par_periodos, par_tipo, par_estado');
        $this->db->where('pe_id_tipo = ti_id_tipo');
        $this->db->where('pe_id_estado = es_id_estado');
//        $this->db->order_by('lf_id_lf', 'ASC');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $newsList = array();
            foreach ($query->result() as $news) {
                $newsList[] = $news;
            }
            return($newsList);
        }
    }

    public function Get_PeriodosBy($id) {
        $this->db->select('pe_id_periodo, pe_nombre, DATE_FORMAT(pe_fecha_inicio,"%Y-%m-%d")pe_fecha_inicio, DATE_FORMAT(pe_fecha_fina,"%Y-%m-%d")pe_fecha_fina, es_nombre, ti_id_tipo');
        $this->db->from('par_periodos, par_tipo, par_estado');
        $this->db->where('pe_id_tipo = ti_id_tipo');
        $this->db->where('pe_id_estado = es_id_estado');
        $this->db->where('pe_id_periodo', $id);
//        $this->db->order_by("lf_id_lf", "ASC");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $newsList = array();
            foreach ($query->result() as $news) {
                $newsList[] = $news;
            }
            return($newsList[0]);
        }
    }
    
    public function Get_MatriculaPeriodos($id) {
        $this->db->where('pe_id_periodo', $id);
        $this->db->from('par_periodos, par_tipo');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $newsList = array();
            foreach ($query->result() as $news) {
                $newsList[] = $news;
            }
            return($newsList);
        }
    }
    
//    public function Get_MatriculaPeriodos($id){
//        $this->db->select('pe_id_periodo, pe_nombre');
//        $this->db->from('par_periodos, par_tipo_matricula, par_estado');
//        $this->db->where('pe_id_tm = tm_id_tm');
//        $this->db->where('pe_id_estado = es_id_estado');
//        $this->db->where('tm_id_tm', $id);
//        $this->db->where('es_id_estado <> 2');
//        $query = $this->db->get();
//        if ($query->num_rows() > 0) {
//            $newsList = array();
//            foreach ($query->result() as $news) {
//                $newsList[] = $news;
//            }
//            return($newsList[0]);
//        }
//    }

        public function create($records) {
        $this->db->insert('par_periodos', $records);
    }

    public function update($records) {
        $this->db->where('pe_id_periodo', $records['pe_id_periodo']);
        return $this->db->update('par_periodos', $records);
    }
}
