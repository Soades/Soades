<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ParCiclos_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    
    public function Get_Ciclos() {
        $this->db->select('ci_id_ciclo, ci_nombre, gr_nombre');
        $this->db->from('par_ciclos, par_grupos, par_estado');
        $this->db->where('ci_id_grupo = gr_id_grupo');
        $this->db->where('gr_id_estado = es_id_estado');
        $this->db->where('es_id_estado <> 2');
        $this->db->order_by('ci_nombre', 'ASC');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $newsList = array();
            foreach ($query->result() as $news) {
                $newsList[] = $news;
            }
            return($newsList);
        }
    }

    public function Get_CiclosBy($id) {
        $this->db->select('ci_id_ciclo, ci_nombre, gr_nombre, gr_id_grupo');
        $this->db->from('par_ciclos, par_grupos, par_estado');
        $this->db->where('ci_id_grupo = gr_id_grupo');
        $this->db->where('gr_id_estado = es_id_estado');
        $this->db->where('es_id_estado <> 2');
        $this->db->where('ci_id_ciclo', $id);
        $this->db->order_by("ci_nombre", "ASC");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $newsList = array();
            foreach ($query->result() as $news) {
                $newsList[] = $news;
            }
            return($newsList[0]);
        }
    }
    
    public function Get_CicloBy($id) {
        $this->db->where('ci_id_grupo', $id);
        $this->db->from('par_ciclos');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $newsList = array();
            foreach ($query->result() as $news) {
                $newsList[] = $news;
            }
            return($newsList);
        }
    }
    
    public function Get_ListCyclesBy($jornada_id, $ciclo_id, $grupo_id){       
        $query = $this->db->query("SELECT CONCAT(te_nombre,' ',te_apellidos)Nombre, ci_nombre
                                   FROM adm_terceros, adm_matricula_bachillerato, par_ciclos, par_grupos, par_jornadas
                                   WHERE mb_id_tercero = te_id_tercero AND mb_id_ciclo = ci_id_ciclo
                                   AND mb_id_jornada = jo_id_jornada AND ci_id_grupo = gr_id_grupo AND mb_id_jornada = $jornada_id AND mb_id_ciclo = $ciclo_id 
                                   AND gr_id_grupo = $grupo_id AND mb_id_em = 3");
        if ($query->num_rows() > 0) {
            $newsList = array();
            foreach ($query->result() as $news) {
                $newsList[] = $news;
            }
            return($newsList);
        }
    }

    public function create($records) {
        $this->db->insert('par_ciclos', $records);
    }

    public function update($records) {
        $this->db->where('ci_id_ciclo', $records['ci_id_ciclo']);
        return $this->db->update('par_ciclos', $records);
    }
}
