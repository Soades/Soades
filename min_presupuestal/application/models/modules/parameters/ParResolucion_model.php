<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ParResolucion_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    
    public function Get_Resoluciones() {
        $this->db->select('re_id_resolucion, CONCAT(re_num_resolucion, " de ", ELT(EXTRACT(MONTH FROM re_fecha_resolucion),"Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"), DATE_FORMAT(re_fecha_resolucion, " %e del %Y")) Resolucion, es_nombre');
        $this->db->from('par_resolucion, par_estado');
        $this->db->where('re_id_estado = es_id_estado');
        $this->db->order_by('re_id_resolucion', 'ASC');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $newsList = array();
            foreach ($query->result() as $news) {
                $newsList[] = $news;
            }
            return($newsList);
        }
    }
    
    public function Get_ResolucionesBy($id) {
        $this->db->select('*');
        $this->db->from('par_resolucion');
        $this->db->where('re_id_resolucion', $id);
        $this->db->order_by("re_id_resolucion", "ASC");
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
        $this->db->insert('par_resolucion', $records);
    }

    public function update($records) {
        $this->db->where('re_id_resolucion', $records['re_id_resolucion']);
        return $this->db->update('par_resolucion', $records);
    }
}
