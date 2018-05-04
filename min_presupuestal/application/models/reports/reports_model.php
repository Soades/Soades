<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reports_model extends CI_Model {

    public function __construct() {
        parent::__construct();
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
    
    public function prueba(){
        echo 'hola';
    }
}