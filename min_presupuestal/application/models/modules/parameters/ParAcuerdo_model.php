<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ParAcuerdo_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    
    public function Get_Acuerdo() {
        $this->db->select('ac_id_acuerdo, CONCAT(ac_num_acuerdo, " de ", ELT(EXTRACT(MONTH FROM ac_fecha_acuerdo),"Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"), DATE_FORMAT(ac_fecha_acuerdo, " %e del %Y")) Acuerdo, es_nombre');
        $this->db->from('par_acuerdo, par_estado');
        $this->db->where('ac_id_estado = es_id_estado');
        $this->db->order_by('ac_id_acuerdo', 'ASC');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $newsList = array();
            foreach ($query->result() as $news) {
                $newsList[] = $news;
            }
            return($newsList);
        }
    }

    public function Get_Acuerdos() {
        $this->db->select('ac_id_acuerdo, ac_num_acuerdo, es_id_estado, es_nombre');
        $this->db->from('par_acuerdo');
        $this->db->join('par_estado', 'ac_id_estado = es_id_estado');
        $this->db->where('es_id_estado <> 2');
        $this->db->order_by('ac_id_acuerdo', 'ASC');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $newsList = array();
            foreach ($query->result() as $news) {
                $newsList[] = $news;
            }
            return($newsList);
        }
    }

    public function Get_AcuerdoBy($id) {
        $this->db->select('*');
        $this->db->from('par_acuerdo');
        $this->db->where('ac_id_acuerdo', $id);
        $this->db->order_by("ac_id_acuerdo", "ASC");
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
        $this->db->insert('par_acuerdo', $records);
    }

    public function update($records) {
        $this->db->where('ac_id_acuerdo', $records['ac_id_acuerdo']);
        return $this->db->update('par_acuerdo', $records);
    }
}
