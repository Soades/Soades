<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ParDecreto_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    
    public function Get_Decreto() {
        $this->db->select('dt_id_decreto, CONCAT(dt_num_decreto, " de ", ELT(EXTRACT(MONTH FROM dt_fecha_decreto),"Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"), DATE_FORMAT(dt_fecha_decreto, " %e del %Y")) Decreto, CONCAT(dt_num_ley_decreto, " de ", ELT(EXTRACT(MONTH FROM dt_fecha_ley_decreto),"Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"), DATE_FORMAT(dt_fecha_ley_decreto, " %e del %Y")) Ley_decreto');
        $this->db->from('par_decreto');
        // $this->db->join('par_estado', 'lf_id_estado = es_id_estado');
        // $this->db->where('es_id_estado <> 2');
        $this->db->order_by('dt_id_decreto', 'ASC');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $newsList = array();
            foreach ($query->result() as $news) {
                $newsList[] = $news;
            }
            return($newsList);
        }
    }

    public function Get_Decretos() {
        $this->db->select('*');
        $this->db->from('par_decreto');
        $this->db->order_by("dt_id_decreto", "ASC");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $newsList = array();
            foreach ($query->result() as $news) {
                $newsList[] = $news;
            }
            return($newsList[0]);
        }
    }

    public function Get_DecretoBy($id) {
        $this->db->select('*');
        $this->db->from('par_decreto');
        $this->db->where('dt_id_decreto', $id);
        $this->db->order_by("dt_id_decreto", "ASC");
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
        $this->db->insert('par_decreto', $records);
    }

    public function update($records) {
        $this->db->where('dt_id_decreto', $records['dt_id_decreto']);
        return $this->db->update('par_decreto', $records);
    }
}
