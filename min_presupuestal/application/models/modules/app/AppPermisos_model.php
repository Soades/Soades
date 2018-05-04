<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class AppPermisos_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function Get_Permisos() {
        $this->db->select('*');
        $this->db->from('app_permisos');
        $this->db->order_by('pe_nombre', 'ASC');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $newsList = array();
            foreach ($query->result() as $news) {
                $newsList[] = $news;
            }
            return($newsList);
        }
    }
    
    public function Get_PermisosBy($id) {
        $this->db->select('*');
        $this->db->from('app_permisos');
        $this->db->where('pe_id_permiso', $id);
        $this->db->order_by("pe_nombre", "ASC");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $newsList = array();
            foreach ($query->result() as $news) {
                $newsList[] = $news;
            }
            return($newsList[0]);
        }
    }

    public function GuardarPermisos($roles_id, $modulo_id, $permisos_id, $estado) {
        if ($estado == 0) {
            $sql = " DELETE FROM app_permiso_roles ";
            $sql .= " WHERE pr_modulo_permiso = ";
            $sql .= " (SELECT mp_idmodulo_permiso FROM app_modulo_permiso WHERE mp_modulo = " . $modulo_id;
            $sql .= " AND mp_permiso = " . $permisos_id . ") ";
            $sql .= " AND pr_roles = " . $roles_id;

            $query = $this->db->query($sql);
        }
        if ($estado == 1) {
            //selecciona el id de modulos_permisos 
            $sql = " SELECT mp.mp_idmodulo_permiso ";
            $sql .= " FROM app_modulo_permiso mp ";
            $sql .= " WHERE mp.mp_modulo = " . $modulo_id;
            $sql .= " AND mp.mp_permiso =  " . $permisos_id;

            $query = $this->db->query($sql);

            foreach ($query->result() as $reg) {
                $mp_id = $reg->mp_idmodulo_permiso;
            }
            //inserta dentro de permisos_roles
            $records = array(
                'pr_roles' => $roles_id,
                'pr_modulo_permiso' => $mp_id
            );
            $this->db->insert("app_permiso_roles", $records);
        }
    }

    public function GetPermisosModulosCheckModulos($modulo_id) {

//        $sql = "SELECT r.ro_idroles, r.ro_nombre , mp.mp_modulo, m.mo_nombre,  mp.mp_permiso , p.pe_nombre ,p.pe_idpermiso ";
//        $sql .= " FROM app_roles r ";
//        $sql .= " INNER JOIN app_permiso_roles pr ON (r.ro_idroles = pr.pr_roles) ";
//        $sql .= " INNER JOIN app_modulo_permiso mp ON (pr.pr_modulo_permiso = mp.mp_idmodulo_permiso) ";
//        $sql .= " INNER JOIN app_permisos p ON (mp.mp_permiso = p.pe_idpermiso) ";
//        $sql .= " INNER JOIN app_modulos m ON (m.mo_idmodulo = mp.mp_modulo) ";
//        $sql .= " WHERE r.ro_idroles = " . $this->session->userdata('ro_idroles') . " ";
//        $sql .= " AND mp.mp_modulo = " . $modulo_id;
        
        $sql = "SELECT ro_id_rol, ro_nombre, pm_id_modulo, pm_id_permiso, mo_id_modulo, mo_nombre, pe_id_permiso, pe_nombre
FROM par_permiso_roles
INNER JOIN par_roles ON prs_id_rol = ro_id_rol
INNER JOIN par_permiso_modulo ON prs_id_pm = pm_id_pm
INNER JOIN app_permisos ON pm_id_permiso = pe_id_permiso
INNER JOIN par_modulos ON pm_id_modulo = mo_id_modulo
WHERE ro_id_rol = 1 AND pm_id_modulo = 1";
        
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $newsList = array();
            foreach ($query->result() as $news) {
                $newsList[] = $news;
            }
            return($newsList);
        }
    }

    public function GetPermisosModulosCheck($roles_id, $modulo_id) {

        $sql = "SELECT mp.mp_permiso ";
        $sql .= " FROM app_roles r ";
        $sql .= " INNER JOIN app_permiso_roles pr ON (r.ro_idroles = pr.pr_roles) ";
        $sql .= " INNER JOIN app_modulo_permiso mp ON (pr.pr_modulo_permiso = mp.mp_idmodulo_permiso) ";
        $sql .= " INNER JOIN app_permisos p ON (mp.mp_permiso = p.pe_idpermiso) ";
        $sql .= " WHERE r.ro_idroles = " . $roles_id . " ";
        $sql .= " AND mp.mp_modulo = " . $modulo_id;

        $query = $this->db->query($sql);

        $d = array();
        foreach ($query->result() as $reg) {
            $d[] .= (int) $reg->mp_permiso;
        }
        echo implode(";", $d);
    }

    public function GetPermsisosModulos($modulo_id) {
        $sql = "SELECT p.pe_idpermiso, p.pe_descripcion ";
        $sql .= " FROM app_modulos m ";
        $sql .= " INNER JOIN app_modulo_permiso mp ON (m.mo_idmodulo = mp.mp_modulo) ";
        $sql .= " INNER JOIN app_permisos p ON (mp.mp_permiso = p.pe_idpermiso) ";
        $sql .= " WHERE m.mo_idmodulo = " . $modulo_id;
        $sql .= " ORDER BY p.pe_idpermiso";

        $query = $this->db->query($sql);



        $grid = "<table align='center' width='95%' id='tpermisos' border='0' class='table'>";
        $grid .= "<thead><tr  class='legends'><th style='display:none'></th><th width='5%'>Estado</th><th width='95%' align='center'>Permisos</th></tr></thead>";
        $grid .= "<tbody>";

        foreach ($query->result() as $reg) {
            $grid .= "<tr class='controls'>";
            $grid .= "<td style='display:none'>" . (int) $reg->pe_idpermiso . "</td>";
            $grid .= "<td><div align='center'><input type='checkbox' id='check_" . (int) $reg->pe_idpermiso . "' onclick='guardar(" . (int) $reg->pe_idpermiso . ");'></div></td>";
            $grid .= "<td>" . $reg->pe_descripcion . "</td>";
            $grid .= "</tr>";
        }
        $grid .= "</tbody>";
        $grid .= "</table>";

        echo $grid;
    }

    public function GetModulos() {

        $this->db->select("*");
        $this->db->from("app_modulos");
        $query = $this->db->get();
        $menu = "";

        if ($query->num_rows() > 0) {
            $menu .= "<ul>";
            foreach ($query->result() as $row) {

                $menu .= " <li>";
                $menu .= "<a style='font-size:10px; font-weight:bold;' href='#' id='data' onclick='modulos(" . (int) $row->mo_idmodulo . ");'>";
                $menu .= "<span>";
                $menu .= "<img class='modulos' width='22' height='22' id='immo" . (int) $row->mo_idmodulo . "' src='" . BASE . "/resources/images/treeview/plus32.png'/>";
                $menu .= "</span>";
                $menu .= " <span style='color:#6b8f1a;' > &nbsp; (" . (int) $row->mo_idmodulo . ") </span> <span> " . $row->mo_nombre . "</span></a></li>";
            }
            $menu .="</ul>";
        }

        echo $menu;
    }

    public function GetRolesUsuarios() {
        $this->db->select('us_id_usuario, us_usuario, us_password, us_email, us_ruta_foto, ro_id_rol, ro_nombre, te_identificacion, te_nombre, te_apellidos');
        $this->db->from('par_usuarios, par_roles , adm_tercero');
        $this->db->where('us_id_rol = ro_id_rol');
        $this->db->where('us_id_tercero = te_id_tercero');
        $query = $this->db->get();
        $menu = "<ul  style='font-size:10px;' class=''>";

        $cont = 0;
        $rol = "";

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                if ($rol <> $row->ro_nombre) {
                    $rol = $row->ro_nombre;

                    if ($cont == 1) {
                        $menu .= "</ul></li>";
                        $cont = 0;
                    }
                    if ($cont == 0) {
                        $menu .= "<li id='" . $row->us_id_usuario . "'>
                            <a href='#' onclick='roles(" . $row->ro_id_rol . ",\"" . $rol . "\");'>
                            <span class='rolback'>" . "&nbsp;
                            <img width='20' height='20' id='imgr" . (int) $row->ro_id_rol . "' 
                            src='" . BASE . "/resources/images/treeview/can.png' class='roles'/>&nbsp;" . $rol . "</a>
                            </span><ul>";
                        $cont = 1;
                    }
                }
                $menu .= "<li class='li_a_img' ><span class='k-sprite users'></span><a style='color:#003366;' href='#' data='" . $row->us_id_usuario . "' id='data'> <img class='img-circle' width=25 heigth=25 src='" . BASE . "resources/archivos/images/" . $row->us_ruta_foto . "' /> " .
                        str_replace("", "&nbsp;", "<b>" . $row->us_usuario . "</b> &nbsp; <span style='font-size:11px; font-style: italic; color:#003366;' > (" . $row->te_nombre . " ") . ") </span></a></li>";
            }
            $menu .= "</ul></li></ul>";
            echo $menu;
        }
    }

}