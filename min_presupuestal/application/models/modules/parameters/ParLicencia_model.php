<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ParLicencia_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    
    public function Get_Licencias() {
        $this->db->select('li_id_licencia, CONCAT(li_num_licencia, " de ", ELT(EXTRACT(MONTH FROM li_fecha_licencia),"Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"), DATE_FORMAT(li_fecha_licencia, " %e del %Y")) Licencia, es_nombre');
        $this->db->from('par_licencias, par_estado');
        $this->db->where('li_id_estado = es_id_estado');
        $this->db->order_by('li_id_licencia', 'ASC');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $newsList = array();
            foreach ($query->result() as $news) {
                $newsList[] = $news;
            }
            return($newsList);
        }
    }

    public function Get_LicenciasBy($id) {
        $this->db->select('*');
        $this->db->from('par_licencias, par_estado');
        $this->db->where('li_id_licencia', $id);
        $this->db->order_by("li_id_licencia", "ASC");
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
        $this->db->insert('par_licencias', $records);
    }

    public function update($records) {
        $this->db->where('li_id_licencia', $records['li_id_licencia']);
        return $this->db->update('par_licencias', $records);
    }
}
