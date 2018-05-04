<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdmCertificados_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function Get_Certificados() {
        $this->db->select('ce_id_certificado, ce_nombre, ce_precio');
        $this->db->from('adm_sede_certificados, adm_certificados, par_estado, adm_sede, par_resolucion, par_tipo_producto');
        $this->db->where('sc_id_certificado = ce_id_certificado');
        $this->db->where('sc_id_sede = se_id_sede');
        $this->db->where('sc_id_resolucion = re_id_resolucion');
        $this->db->where('ce_id_estado = es_id_estado');
        $this->db->where('se_id_estado = es_id_estado');
        $this->db->where('re_id_estado = es_id_estado');        
        $this->db->where('ce_id_tp = tp_id_tp');
        $this->db->order_by('ce_nombre', 'ASC');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            // $newsList = array();
            // foreach ($query->result() as $news) {
            //     $newsList[] = $news;
            // }
            return($query->result());
        }
    }
    
    public function Get_CertificadosBy($Id) {
        $this->db->select('ce_id_certificado, ce_nombre, se_id_sede, re_id_resolucion, es_id_estado, tp_id_tp, sc_id_sc, sc_intencidad, ce_precio, ce_valor_impresion');
        $this->db->from('adm_sede_certificados, adm_certificados, par_estado, adm_sede, par_resolucion, par_tipo_producto');
        $this->db->where('sc_id_certificado = ce_id_certificado');
        $this->db->where('sc_id_sede = se_id_sede');
        $this->db->where('sc_id_resolucion = re_id_resolucion');
        $this->db->where('ce_id_estado = es_id_estado');
        $this->db->where('se_id_estado = es_id_estado');
        $this->db->where('re_id_estado = es_id_estado');        
        $this->db->where('ce_id_tp = tp_id_tp');
        $this->db->where('ce_id_certificado', $Id);
        $this->db->order_by('ce_nombre', 'ASC');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            // $newsList = array();
            // foreach ($query->result() as $news) {
            //     $newsList[] = $news;
            //     // var_dump($newsList);
            // }
            $x = $query->result();
            return($x[0]);
        }
    }

    public function create($records, $sc_id_certificado){
        $this->db->insert('adm_certificados', $records);
        $sc_id_certificado['sc_id_certificado'] = $this->db->insert_id();
        $this->db->insert('adm_sede_certificados', $sc_id_certificado);
    }

    public function update($records, $records2) {
        $this->db->where('ce_id_certificado', $records['ce_id_certificado']);
        $this->db->update('adm_certificados', $records);

        $this->db->where('sc_id_sc', $records2['sc_id_sc']);
        $this->db->update('adm_sede_certificados', $records2);
    }
}
