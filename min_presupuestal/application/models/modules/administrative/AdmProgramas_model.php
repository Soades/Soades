<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdmProgramas_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    
    public function Get_Programas() {
        $this->db->select('pr_id_programa, pr_nombre, es_nombre');
        $this->db->from('adm_programas');
        $this->db->join('par_estado', 'pr_id_estado = es_id_estado');
        $this->db->join('adm_programas_acuerdo', 'pa_id_programa = pr_id_programa', 'left');
        $this->db->join('adm_sede_programa', 'sp_id_programa = pr_id_programa');
        $this->db->join('adm_sede', 'se_id_estado = es_id_estado');
        $this->db->where('sp_id_sede = se_id_sede');
        $this->db->join('par_resolucion', 're_id_estado = es_id_estado');
        $this->db->where('sp_id_resolucion = re_id_resolucion');
        $this->db->join('par_decreto', 'pr_id_decreto = dt_id_decreto');
        $this->db->join('par_acuerdo', 'ac_id_estado = es_id_estado', 'left');
        $this->db->where('pa_id_acuerdo = ac_id_acuerdo');
        $this->db->where('es_id_estado <> 2');
        $this->db->order_by('pr_nombre', 'ASC');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $newsList = array();
            foreach ($query->result() as $news) {
                $newsList[] = $news;
            }
            return($newsList);
        }
    }

    public function Get_Programa() {
        $this->db->select('pr_id_programa, pr_nombre');
        $this->db->from('adm_programas, par_estado');
        $this->db->where('pr_id_estado = es_id_estado');
        $this->db->where('es_id_estado <> 2');
        $this->db->order_by('pr_nombre', 'ASC');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $newsList = array();
            foreach ($query->result() as $news) {
                $newsList[] = $news;
            }
            return($newsList);
        }
    }
    
    public function Get_ProgramasBy($id) {
        $this->db->select('pr_id_programa, pr_nombre, se_id_sede, se_nombre, dt_id_decreto, CONCAT(dt_num_decreto, " de ", meses(EXTRACT(MONTH  FROM dt_fecha_decreto)), DATE_FORMAT(dt_fecha_decreto, " %e del %Y"))FechaD, re_id_resolucion, CONCAT(re_num_resolucion, " de ", meses(EXTRACT(MONTH  FROM re_fecha_resolucion)), DATE_FORMAT(re_fecha_resolucion, " %e del %Y"))FechaR, ac_id_acuerdo, CONCAT(ac_num_acuerdo, " de ", meses(EXTRACT(MONTH  FROM ac_fecha_acuerdo)), DATE_FORMAT(ac_fecha_acuerdo, " %e del %Y"))FechaA, sp_num_horas, es_id_estado, es_nombre, sp_id_sp, pa_id_pa');
        $this->db->from('adm_programas_acuerdo, adm_programas, adm_sede_programa, adm_sede, par_resolucion, par_decreto, par_estado, par_acuerdo');
        $this->db->where('pa_id_programa = pr_id_programa');
        $this->db->where('sp_id_programa = pr_id_programa');
        $this->db->where('sp_id_sede = se_id_sede');
        $this->db->where('sp_id_resolucion = re_id_resolucion');
        $this->db->where('pr_id_decreto = dt_id_decreto');
        $this->db->where('pr_id_estado = es_id_estado');
        $this->db->where('se_id_estado = es_id_estado');
        $this->db->where('re_id_estado = es_id_estado');
        $this->db->where('ac_id_estado = es_id_estado');
        $this->db->where('pa_id_acuerdo = ac_id_acuerdo');
        $this->db->where('pr_id_programa', $id);
        $this->db->where('es_id_estado <> 2');
        $this->db->order_by("pr_nombre", "ASC");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $newsList = array();
            foreach ($query->result() as $news) {
                $newsList[] = $news;
            }
            return($newsList[0]);
        }
    }

    
    public function Get_ListPrograms($program_id){       
        $query = $this->db->query("SELECT CONCAT(te_nombre,' ',te_apellidos)Nombre
                                   FROM adm_terceros, adm_matricula_tecnicos, adm_programas
                                   WHERE mt_id_tercero = te_id_tercero AND mt_id_programa = pr_id_programa
                                   AND mt_id_programa = $program_id AND mt_id_em = 3");
        if ($query->num_rows() > 0) {
            $newsList = array();
            foreach ($query->result() as $news) {
                $newsList[] = $news;
            }
            return($newsList);
        }
    }
    
    public function ExistePrograma($records, $idSede) {
        $this->db->where("pr_nombre", $records["pr_nombre"]);
        $query = $this->db->get("adm_programas");
        if ($query->num_rows() > 0) {
            $id_programa = $query->result()[0]->pr_id_programa;
            $SedePrograma = $this->db->query('SELECT sp_id_sede FROM adm_sede_programa WHERE sp_id_sede = ' . $idSede . ' AND sp_id_programa =' . $id_programa);
            $SedePrograma = ($SedePrograma->num_rows() > 0) ? true : false;
            return array($id_programa, $SedePrograma);
        } else {
            return false;
        }
    }

    public function create($records, $sp_id_programa, $pa_id_programa) {
        $id_existente = $this->ExistePrograma($records, $sp_id_programa['sp_id_sede']);
        $existe_en_sede = false;
        if ($id_existente[0]) {
            $sp_id_programa['sp_id_programa'] = $id_existente[0];
            $existe_en_sede = $id_existente[1];
        } else {

            $this->db->insert('adm_programas', $records);
            $sp_id_programa['sp_id_programa'] = $this->db->insert_id();
        }

        if (!$existe_en_sede) {
            $this->db->insert('adm_sede_programa', $sp_id_programa);
            if ($pa_id_programa['pa_id_acuerdo'] != 0) {
                $pa_id_programa['pa_id_programa'] = $sp_id_programa['sp_id_programa'];
                $this->db->insert("adm_programas_acuerdo", $pa_id_programa);
            }
            return true;
        } else {
            return false;
        }
    }

    public function update($records, $records2, $records3) {
        $this->db->where('pr_id_programa', $records['pr_id_programa']);
        $this->db->update('adm_programas', $records);

        $this->db->where('sp_id_sp', $records2['sp_id_sp']);
        $this->db->update('adm_sede_programa', $records2);

        $this->db->where('pa_id_pa', $records3['pa_id_pa']);
        $this->db->update('adm_programas_acuerdo', $records3);

    }
}
