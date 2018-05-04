<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdmEgresos_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    
    public function Get_Egresos() {
        $this->db->select("te_id_tercero, CONCAT(te_nombre,' ',te_apellidos)Nombre");
        $this->db->from("adm_terceros");
        // $this->db->where('es_id_estado <> 2');
        // $this->db->order_by('lf_id_lf', 'ASC');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $newsList = array();
            foreach ($query->result() as $news) {
                $newsList[] = $news;
            }
            return($newsList);
        }
    }

    public function getIngresos($id){
        $this->db->select('CONCAT(te_nombre," ",te_apellidos) Nombre, co_nombre, in_codigo, in_fecha, in_valor, in_valor_letras');
        $this->db->from('adm_ingresos, adm_terceros, par_conceptos');
        $this->db->where('in_id_tercero = te_id_tercero');
        $this->db->where('in_id_concepto = co_id_concepto');
        $this->db->where('in_codigo', $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            // $newsList = array();
            // foreach ($query->result() as $news) {
            //     $newsList[] = $news;
            // }
            return($query->result());
        }
    }

    // public function Get_Ingresos() {
    //     $this->db->select("te_id_tercero, CONCAT(te_nombre,' ',te_apellidos)Nombre");
    //     $this->db->from("adm_terceros");
    //     // $this->db->where('es_id_estado <> 2');
    //     // $this->db->order_by('lf_id_lf', 'ASC');
    //     $query = $this->db->get();
    //     if ($query->num_rows() > 0) {
    //         $newsList = array();
    //         foreach ($query->result() as $news) {
    //             $newsList[] = $news;
    //         }
    //         return($newsList);
    //     }
    // }

    public function createEgresos($records) {
        $this->db->insert('adm_egresos', $records);
    }
    
    public function createMDiario($records){
        $this->db->insert('adm_movimiento_diario', $records);
    }
}
