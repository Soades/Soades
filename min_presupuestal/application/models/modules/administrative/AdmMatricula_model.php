<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdmMatricula_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function createTecnico($records, $records2, $records3, $records4) {
        $this->db->insert('adm_matricula_tecnicos', $records);
        $this->db->insert('adm_ingresos', $records2);
        if ($records3['fa_codigo'] != '') {
            $this->db->insert('adm_factura', $records3);
        }
        if ($records4['fi_plazo'] != '') {
            $this->db->insert('adm_financiacion', $records4);
        }
    }

    public function createBachillerato($records, $records2, $records3, $records4) {
        $this->db->insert('adm_matricula_bachillerato', $records);
        $this->db->insert('adm_ingresos', $records2);
        if ($records3['fa_codigo'] != '') {
            $this->db->insert('adm_factura', $records3);
        }
        if ($records4['fi_plazo'] != '') {
            $this->db->insert('adm_financiacion', $records4);
        }
    }
    
    public function createFinanciacion($records){
        $this->db->insert('adm_financiacion', $records);
    }

    public function createMdDiario($records){
        $this->db->insert('adm_movimiento_diario', $records);
    }

    public function update($records) {
        $this->db->where('te_id_tercero', $records['te_id_tercero']);
        return $this->db->update('adm_tercero', $records);
    }
}
