<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ParTipoTercero_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    
    public function Get_TipoTercero() {
        $this->db->select('*');
        $this->db->from('par_tipo_tercero');
        // $this->db->join('par_estado', 'lf_id_estado = es_id_estado');
         $this->db->where('tt_id_tt <> 1');
        $this->db->order_by('tt_id_tt', 'ASC');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $newsList = array();
            foreach ($query->result() as $news) {
                $newsList[] = $news;
            }
            return($newsList);
        }
    }
    
    public function Get_TipoTerceroBy($id) {
        $this->db->select('*');
        $this->db->from('par_tipo_tercero');
        $this->db->where('tt_id_tt', $id);
        $this->db->order_by("tt_id_tt", "ASC");
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
        $this->db->insert('par_tipo_tercero', $records);
    }

    public function update($records) {
        $this->db->where('tt_id_tt', $records['tt_id_tt']);
        return $this->db->update('par_tipo_tercero', $records);
    }
}
