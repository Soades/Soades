<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdmTerceros_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    
    public function Get_Empleado() {
        $this->db->select('te_id_tercero, em_id_empleado, te_identificacion, CONCAT(te_nombre," ",te_apellidos)Nombre');
        $this->db->from('adm_terceros, adm_empleados');
        $this->db->where('em_id_tercero = te_id_tercero');
        $this->db->order_by('te_nombre', 'ASC');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $newsList = array();
            foreach ($query->result() as $news) {
                $newsList[] = $news;
            }
            return($newsList);
        }
    }
    
    public function Get_AllEmpleadosBy($tercero_id, $empleado_id){
        $this->db->select('te_id_tercero, em_id_empleado, td_codigo, te_identificacion, te_nombre, te_apellidos, te_direccion, te_movil, te_fijo, te_email, em_sueldo, mu_codigo, em_id_cargo');
        $this->db->from('adm_terceros, adm_empleados, par_municipios, par_cargos, par_tipo_documento');
        $this->db->where('em_id_tercero = te_id_tercero');
        $this->db->where('te_doc_exp = mu_codigo');
        $this->db->where('em_id_cargo = ca_id_cargo');
        $this->db->where('te_id_tercero', $tercero_id);
        $this->db->where('te_id_tercero', $empleado_id);
        $this->db->order_by('te_nombre', 'ASC');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $newsList = array();
            foreach ($query->result() as $news) {
                $newsList[] = $news;
            }
            return($newsList[0]);
        }
    }

    public function Get_AllTerceros(){
        $this->db->select('te_id_tercero, te_identificacion, te_nombre, te_apellidos');
        $this->db->from('adm_tercero, par_tipo_tercero, par_tipo_documento');
        $this->db->where('te_id_tt = tt_id_tt');
        $this->db->where('te_td_codigo = td_codigo');
        $this->db->where('te_id_tt = 1');
        $this->db->order_by('te_nombre', 'ASC');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $newsList = array();
            foreach ($query->result() as $news) {
                $newsList[] = $news;
            }
            return($newsList);
        }
    }

    public function Get_AllTerceros1($id){
        $this->db->select('te_id_tercero, te_identificacion, te_nombre, te_apellidos');
        $this->db->from('adm_tercero, par_tipo_tercero, par_tipo_documento');
        $this->db->where('te_id_tt = tt_id_tt');
        $this->db->where('te_td_codigo = td_codigo');
        $this->db->where('te_id_tercero', $id);
        $this->db->order_by('te_nombre', 'ASC');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $newsList = array();
            foreach ($query->result() as $news) {
                $newsList[] = $news;
            }
            return($newsList);
        }
    }
    
    public function Get_Coordinadores() {
        $this->db->select('te_id_tercero, te_identificacion, CONCAT(te_nombre, te_apellidos)Nombre');
        $this->db->from('adm_terceros, par_tipo_tercero');
        $this->db->where('te_id_tt = tt_id_tt');
        $this->db->where('te_id_tt = 2');
        $this->db->order_by('te_nombre', 'ASC');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $newsList = array();
            foreach ($query->result() as $news) {
                $newsList[] = $news;
            }
            return($newsList);
        }
    }

    public function Get_TerceroBy($id) {
        $this->db->select('te_id_tercero, td_codigo, td_nombre, te_identificacion, te_nombre, te_apellidos, te_lugar_exp_documento, tt_id_tt, tt_tipo');
        $this->db->from('adm_tercero');
        $this->db->join('par_tipo_tercero', 'te_id_tt = tt_id_tt');
        $this->db->join('par_tipo_documento', 'te_td_codigo = td_codigo');
        $this->db->where('te_id_tercero', $id);
        $this->db->order_by("te_id_tercero", "ASC");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $newsList = array();
            foreach ($query->result() as $news) {
                $newsList[] = $news;
            }
            return($newsList[0]);
        }
    }

    public function Get_CoordinadoresBy($id) {
        $this->db->select('te_id_tercero, td_codigo, te_identificacion, te_nombre, te_apellidos, te_movil, te_fijo, te_email');
        $this->db->from('adm_tercero, par_tipo_tercero, par_tipo_documento');
        $this->db->where('te_id_tt = tt_id_tt');
        $this->db->where('te_td_codigo = td_codigo');
        $this->db->where('te_id_tercero', $id);
        $this->db->order_by("te_nombre", "ASC");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $newsList = array();
            foreach ($query->result() as $news) {
                $newsList[] = $news;
            }
            return($newsList[0]);
        }
    }
    
    public function Get_BuscarTercero() {
        $this->db->select('te_id_tercero, te_identificacion, CONCAT(te_nombre," ",te_apellidos)Nombre');
        $this->db->from('adm_terceros');
        $this->db->order_by('te_nombre', 'ASC');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $newsList = array();
            foreach ($query->result() as $news) {
                $newsList[] = $news;
            }
            return($newsList[0]);
        }
    }

    public function Get_BuscarTerceroBy($id) {
        $this->db->select('te_id_tercero, te_identificacion, CONCAT(te_nombre," ",te_apellidos)Nombre');
        $this->db->from('adm_terceros');
        $this->db->where('te_identificacion', $id);
         $this->db->order_by('te_nombre', 'ASC');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            // $newsList = array();
            // foreach ($query->result() as $news) {
            //     $newsList[] = $news;
            // }
            return($query->result());
        }
    }

    public function createStudent($records, $es_id_tercero, $er_id_tercero, $acu_id_tercero, $ip_id_tercero) {
        $this->db->insert('adm_terceros', $records);

        $es_id_tercero['es_id_tercero'] = $this->db->insert_id();
        $this->db->insert('adm_estudiante', $es_id_tercero);

        if ($er_id_tercero['er_colegio'] != '') {
            $er_id_tercero['er_id_tercero'] = $es_id_tercero['es_id_tercero'];
            $this->db->insert('adm_estu_realizados', $er_id_tercero);
        }

        if ($acu_id_tercero['acu_identificacion'] != '') {
            $acu_id_tercero['acu_id_tercero'] = $es_id_tercero['es_id_tercero'];
            $this->db->insert('adm_acudiente', $acu_id_tercero);
        }
        
        if ($ip_id_tercero['ip_nom_padre'] != '') {
            $ip_id_tercero['ip_id_tercero'] = $es_id_tercero['es_id_tercero'];
            $this->db->insert('adm_info_padres', $ip_id_tercero);
        }
    }

    public function createEmployee($records, $em_id_tercero) {
        $this->db->insert('adm_terceros', $records);
        $em_id_tercero['em_id_tercero'] = $this->db->insert_id();
        $this->db->insert('adm_empleados', $em_id_tercero);
    }

    public function update($records, $records2) {
        $this->db->where('te_id_tercero', $records['te_id_tercero']);
        $this->db->update('adm_terceros', $records);

        $this->db->where('em_id_empleado', $records2['em_id_empleado']);
        $this->db->update('adm_empleados', $records2);

    }
}
