<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdmMovimientoDiario_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    
    public function Get_MMDiario($desde, $hasta){

       
        $query = $this->db->query("SELECT md_id_md, DATE_FORMAT(md_fecha, '%d/%m/%Y') md_fecha, md_detalle,
                                   FORMAT(md_debe, 0) md_debe, FORMAT(md_haber, 0) md_haber,
                                   md_debe as debe
                                   FROM adm_movimiento_diario 
                                   WHERE md_fecha BETWEEN 
                                   DATE_FORMAT($desde,'%Y-%m-%d 00:00:00') AND 
                                   DATE_FORMAT($hasta,'%Y-%m-%d 23:59:59') ");



        if ($query->num_rows() > 0) {
            $newsList = array();
            foreach ($query->result() as $news) {
                $newsList[] = $news;
            }
            return($newsList);
        }
    }
    
    public function Get_MMDiarioSalida($desde, $hasta){

       
        $query = $this->db->query("SELECT md_id_md, DATE_FORMAT(md_fecha, '%d/%m/%Y') md_fecha, md_detalle,
                                   FORMAT(md_debe, 0) md_debe, FORMAT(md_haber, 0) md_haber,
                                   md_haber as haber
                                   FROM adm_movimiento_diario 
                                   WHERE md_fecha BETWEEN 
                                   DATE_FORMAT($desde,'%Y-%m-%d 00:00:00') AND 
                                   DATE_FORMAT($hasta,'%Y-%m-%d 23:59:59') ");



        if ($query->num_rows() > 0) {
            $newsList = array();
            foreach ($query->result() as $news) {
                $newsList[] = $news;
            }
            return($newsList);
        }
    }

    public function create($records) {
        $this->db->insert('adm_egresos', $records);
    }
}
