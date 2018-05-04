<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdmSedes_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    
    public function Get_Sedes() {
        $this->db->select('se_id_sede, se_nombre, es_nombre');
        $this->db->from('adm_sede, par_licencias, par_municipios, par_estado, par_tipo_sede');
        $this->db->where('se_id_licencia = li_id_licencia');
        $this->db->where('se_mu_codigo = mu_codigo');
        // $this->db->where('mu_de_codigo = de_codigo');
        $this->db->where('se_id_estado = es_id_estado');
        $this->db->where('li_id_estado = es_id_estado');
        $this->db->where('se_id_ts = ts_id_ts');
        $this->db->order_by('se_nombre', 'ASC');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $newsList = array();
            foreach ($query->result() as $news) {
                $newsList[] = $news;
            }
            return($newsList);
        }
    }
    
    public function Get_SedesBy($id) {
        $this->db->select('*');
        $this->db->from('adm_sede, par_licencias, par_municipios, par_estado, par_tipo_sede');
        $this->db->where('se_id_licencia = li_id_licencia');
        $this->db->where('se_mu_codigo = mu_codigo');
        // $this->db->where('mu_de_codigo = de_codigo');
        $this->db->where('se_id_estado = es_id_estado');
        $this->db->where('li_id_estado = es_id_estado');
        $this->db->where('se_id_ts = ts_id_ts');
        $this->db->where('se_id_sede', $id);
        $this->db->order_by("se_nombre", "ASC");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $newsList = array();
            foreach ($query->result() as $news) {
                $newsList[] = $news;
            }
            return($newsList[0]);
        }
    }
    
    public function Get_SedesCertificadosBy($id) {
        $this->db->select('ce_id_certificado, ce_nombre, ce_valor_impresion, CONCAT(re_num_resolucion, " de ", ELT(EXTRACT(MONTH FROM re_fecha_resolucion),"Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"), DATE_FORMAT(re_fecha_resolucion, " %e del %Y")) Resolucion, sc_intencidad, tp_nombre');
        $this->db->from('adm_certificados, par_estado, par_tipo_producto, adm_sede_certificados, adm_sede, par_resolucion');
        $this->db->where('ce_id_estado = es_id_estado');
        $this->db->where('ce_id_tp = tp_id_tp');
        $this->db->where('sc_id_certificado = ce_id_certificado');
        $this->db->where('se_id_estado = es_id_estado');
        $this->db->where('sc_id_sede = se_id_sede');
        $this->db->where('re_id_estado = es_id_estado');
        $this->db->where('sc_id_resolucion = re_id_resolucion');
        $this->db->where('se_id_sede', $id);
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
        $this->db->insert('adm_sede', $records);
    }

    public function update($records) {
        $this->db->where('se_id_sede', $records['se_id_sede']);
        return $this->db->update('adm_sede', $records);
    }
}
