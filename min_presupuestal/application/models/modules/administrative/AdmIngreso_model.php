<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdmIngreso_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    
    public function Get_Ingresos() {
        $this->db->select('lf_id_lf, lf_num_licencia, CONCAT(lf_num_licencia, " de ", meses(EXTRACT(MONTH  FROM lf_fecha_licencia)), DATE_FORMAT(lf_fecha_licencia, " %e del %Y"))Fecha, es_id_estado, es_nombre');
        $this->db->from('par_licencia_funcionamiento');
        $this->db->join('par_estado', 'lf_id_estado = es_id_estado');
        $this->db->where('es_id_estado <> 2');
        $this->db->order_by('lf_id_lf', 'ASC');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $newsList = array();
            foreach ($query->result() as $news) {
                $newsList[] = $news;
            }
            return($newsList);
        }
    }
    
    public function Get_Licencia() {
        $this->db->select('lf_id_lf, CONCAT(lf_num_licencia, " de ", meses(EXTRACT(MONTH  FROM lf_fecha_licencia)), DATE_FORMAT(lf_fecha_licencia, " %e del %Y"))Fecha');
        $this->db->from('par_licencia_funcionamiento');
        $this->db->join('par_estado', 'lf_id_estado = es_id_estado');
        $this->db->where('es_id_estado <> 2');
        $this->db->order_by('lf_id_lf', 'ASC');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $newsList = array();
            foreach ($query->result() as $news) {
                $newsList[] = $news;
            }
            return($newsList);
        }
    }

    public function Get_LicenciasBy($id) {
        $this->db->select('*');
        $this->db->from('par_licencia_funcionamiento');
        $this->db->where('lf_id_lf', $id);
        $this->db->order_by("lf_id_lf", "ASC");
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
        $this->db->insert('adm_ingresos', $records);
    }

    public function update($records) {
        $this->db->where('in_codigo', $records['in_codigo']);
        return $this->db->update('adm_ingresos', $records);
    }
}
