<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ParFormaPago_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    
    public function Get_FormaPago() {
        $this->db->select('*');
        $this->db->from('par_forma_pago');
        $this->db->order_by('fp_nombre', 'ASC');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $newsList = array();
            foreach ($query->result() as $news) {
                $newsList[] = $news;
            }
            return($newsList);
        }
    }

    public function Get_FormaPagoBy($id) {
        $this->db->select('*');
        $this->db->from('par_forma_pago');
        $this->db->where('fp_id_fp', $id);
        $this->db->order_by("fp_nombre", "ASC");
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
        $this->db->insert('par_forma_pago', $records);
    }

    public function update($records) {
        $this->db->where('fp_id_fp', $records['fp_id_fp']);
        return $this->db->update('par_forma_pago', $records);
    }
}
