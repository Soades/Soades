<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdmCuentasxCobrar_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    
    public function Get_CabeceraCxCby($id){
        $query = $this->db->query("SELECT te_id_tercero, te_identificacion, CONCAT(te_nombre,' ',te_apellidos)Nombre, B.fecha, FORMAT(SUM(cxc_valor - cxc_pagos), 0) Deuda
                                   FROM adm_terceros, adm_factura, adm_cuentasxcobrar,
                                  (SELECT A.nit, MAX(A.fecha) fecha FROM
                                  (SELECT fa_id_tercero nit, DATE_FORMAT(fa_fecha, '%d/%m/%Y')fecha FROM adm_factura
                                   UNION
                                   SELECT in_id_tercero nit, DATE_FORMAT(in_fecha, '%d/%m/%Y')fecha FROM adm_ingresos) A GROUP BY A.nit) B
                                   WHERE te_id_tercero = fa_id_tercero AND B.nit = te_id_tercero AND fa_codigo = SUBSTRING(cxc_fa_codigo ,1,5)
                                   AND te_identificacion = $id
                                   GROUP BY te_id_tercero, te_identificacion, CONCAT(te_nombre,' ',te_apellidos), fecha");
//        echo var_dump($query);
        if ($query->num_rows() > 0) {
            return($query->result());
        }
    }

    public function Get_CxCBy($id){
//         $query = $this->db->query("SELECT cxc_fa_codigo, DATE_FORMAT(cxc_fecha, '%d/%m/%Y')cxc_fecha, FORMAT(SUM(cxc_valor -  COALESCE(cxc_pagos, 0)), 0)Deuda, fa_id_concepto, co_nombre
//                FROM adm_terceros, adm_factura, adm_cuentasxcobrar, par_conceptos
// WHERE te_id_tercero = fa_id_tercero AND fa_id_concepto = co_id_concepto AND fa_codigo = SUBSTRING(cxc_fa_codigo ,1,5) AND te_id_tercero = 7
// GROUP BY cxc_fa_codigo HAVING SUM(cxc_valor - COALESCE(cxc_pagos, 0)) > 0");
        $this->db->select('cxc_fa_codigo, DATE_FORMAT(cxc_fecha, "%d/%m/%Y")cxc_fecha, FORMAT(SUM(cxc_valor -  COALESCE(cxc_pagos, 0)), 0)Deuda, fa_id_concepto, co_nombre');
        $this->db->from('adm_terceros, adm_factura, adm_cuentasxcobrar, par_conceptos');
        $this->db->where('te_id_tercero = fa_id_tercero');
        $this->db->where('fa_id_concepto = co_id_concepto');
        $this->db->where('fa_codigo = SUBSTRING(cxc_fa_codigo ,1, 5)');
        $this->db->where('te_id_tercero', $id);
        $this->db->group_by('cxc_fa_codigo, cxc_fecha, fa_id_concepto, co_nombre HAVING SUM(cxc_valor - COALESCE(cxc_pagos, 0)) > 0');
        $query = $this->db->get();
//        var_dump($query);
        if ($query->num_rows() > 0) {
            $newsList = array();
            foreach ($query->result() as $news) {
                $newsList[] = $news;
            }
            return($newsList);
        }

//        if ($query->num_rows() > 0) {
////            echo var_dump($query->result());
//            $reusul = $query->result();
//            return($reusul[0]);
//        }
    }

    
    public function Get_CabeceraAbonoBy($id){
        $this->db->select('te_id_tercero, te_identificacion, CONCAT(te_nombre," ",te_apellidos)Nombre');
        $this->db->from('adm_terceros');
        $this->db->where('te_identificacion', $id);
        $query = $this->db->get();
//        var_dump($query);
        if ($query->num_rows() > 0) {
            $newsList = array();
            foreach ($query->result() as $news) {
                $newsList[] = $news;
            }
            return($newsList[0]);
        }
    }

    public function Get_DetalleAbonosBy($id) {
        $this->db->select('cxc_id_cxc, cxc_cruce, DATE_FORMAT(cxc_fecha,"%d/%m/%Y")cxc_fecha, co_nombre, FORMAT(COALESCE(cxc_pagos), 0)cxc_pagos');
        $this->db->from('adm_cuentasxcobrar, adm_terceros, adm_ingresos, par_conceptos');
        $this->db->where('in_id_tercero = te_id_tercero');
        $this->db->where('in_codigo = cxc_cruce');
        $this->db->where('in_id_concepto = co_id_concepto');
        $this->db->where('in_id_tercero', $id);
//        $this->db->group_by('DATE_FORMAT(cxc_fecha,"%d/%m/%Y"), FORMAT(COALESCE(cxc_pagos), 0), cxc_cruce');
        $query = $this->db->get();
//        var_dump($query);
        if ($query->num_rows() > 0) {
            $newsList = array();
            foreach ($query->result() as $news) {
                $newsList[] = $news;
            }
            return($newsList);
        }
    }
    
    #
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
    
    public function createCuentasxCobrar($records) {
        $this->db->insert('adm_cuentasxcobrar', $records);
    }

    public function createIngresos($records) {
        $this->db->insert('adm_ingresos', $records);
    }
    
    public function createMdDiario($records){
        $this->db->insert('adm_movimiento_diario', $records);
    }
}
