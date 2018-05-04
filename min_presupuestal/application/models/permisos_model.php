<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Permisos_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function GuardarPermisos($roles_id, $modulo_id, $permisos_id, $estado) {

        if ($estado == 0) {
            $sql = " DELETE FROM app_permiso_roles ";
            $sql .= " WHERE pr_modulo_permiso_id = ";
            $sql .= " (SELECT mp_idmope FROM app_modulo_permiso WHERE mp_modulo_id = " . $modulo_id;
            $sql .= " AND mp_permiso_id = " . $permisos_id . ") ";
            $sql .= " AND pr_rol_id = " . $roles_id;
            $query = $this->db->query($sql);
        }
        if ($estado == 1) {
            //selecciona el id de modulos_permisos 
            $sql = " SELECT mp.mp_idmope ";
            $sql .= " FROM app_modulo_permiso mp ";
            $sql .= " WHERE mp.mp_modulo_id = " . $modulo_id;
            $sql .= " AND mp.mp_permiso_id =  " . $permisos_id;
            $query = $this->db->query($sql);

            foreach ($query->result() as $reg) {
                $mp_id = $reg->mp_idmope;
            }
            //inserta dentro de permisos_roles
            $records = array(
                'pr_rol_id' => $roles_id,
                'pr_modulo_permiso_id' => $mp_id,
                'pr_permitir' => 1
            );
            $this->db->insert("app_permiso_roles", $records);
        }
    }

    public function existe_modulo_permiso_usuario($usuario_id, $modulo_permiso_id) {
        $query = $this->db->query(
                "select * from app_modulo_permiso_usuario where 
			  mpu_usuario_id = " . $usuario_id . " and mpu_modulo_permiso_id = " . $modulo_permiso_id . " ");
        return $query->num_rows() > 0;
    }

    public function return_modulo_permiso($modulo_id, $permisos_id) {
        $sql = " SELECT mp.mp_idmope ";
        $sql .= " FROM app_modulo_permiso mp ";
        $sql .= " WHERE mp.mp_modulo_id = " . $modulo_id;
        $sql .= " AND mp.mp_permiso_id =  " . $permisos_id;
        $query = $this->db->query($sql);
        return $query->row();
    }

    /*

      $this->db->where('user_id',$id);
      $q = $this->db->get('profile');

      if ( $q->num_rows() > 0 )
      {
      $this->db->where('user_id',$id);
      $this->db->update('profile',$data);
      } else {
      $this->db->set('user_id', $id);
      $this->db->insert('profile',$data);
      }

     */

    public function GuardarPermisosUsuarios($roles_id, $usuariosid, $modulo_id, $permisos_id, $estado) {

        $rmp = $this->return_modulo_permiso($modulo_id, $permisos_id);
        $ex = $this->existe_modulo_permiso_usuario($usuariosid, $rmp->mp_idmope);
        $records = array(
            'mpu_usuario_id' => $usuariosid,
            'mpu_modulo_permiso_id' => $rmp->mp_idmope,
            'mpu_permitir' => $estado
        );

        if ($ex) {
            $this->db->where('mpu_usuario_id', $usuariosid);
            $this->db->where('mpu_modulo_permiso_id', $rmp->mp_idmope);
            $this->db->update("app_modulo_permiso_usuario", $records);
        } else {
            $this->db->insert("app_modulo_permiso_usuario", $records);
        }
    }

    public function GetPermisosModulosCheckModulos($modulo_id) {
        /*
          $sql   = "SELECT r.ro_idroles, r.ro_nombre , mp.mp_modulo, m.mo_nombre,  mp.mp_permiso , p.pe_nombre ,p.pe_idpermiso ";
          $sql  .= " FROM app_roles r ";
          $sql  .= " INNER JOIN app_permiso_roles pr ON (r.ro_idroles = pr.pr_roles) ";
          $sql  .= " INNER JOIN app_modulo_permiso mp ON (pr.pr_modulo_permiso = mp.mp_idmodulo_permiso) ";
          $sql  .= " INNER JOIN app_permisos p ON (mp.mp_permiso = p.pe_idpermiso) ";
          $sql  .= " INNER JOIN app_modulos m ON (m.mo_idmodulo = mp.mp_modulo) ";
          $sql  .= " WHERE r.ro_idroles = " . $this->session->userdata('ro_idroles') . " ";
          $sql  .= " AND mp.mp_modulo = " . $modulo_id;
         */

        /*
          $sql = "SELECT  pe_nombre,ro_nombre,mp_nombre,pr_permitir,mpu_permitir permitir_usuario,coalesce(mpu_permitir,pr_permitir) as permitir
          FROM  app_roles r
          INNER JOIN app_permiso_roles pr ON (r.ro_idroles = pr.pr_rol_id)
          INNER JOIN app_modulo_permiso mp ON (pr.pr_modulo_permiso_id = mp.mp_permiso_id)
          INNER JOIN app_modulo_pages mpa ON mpa.mp_idmp = mp.mp_modulo_id
          INNER JOIN app_permisos p ON (mp.mp_permiso_id = p.pe_idpermiso)
          LEFT JOIN  app_modulo_permiso_usuario ON mpu_modulo_permiso_id = p.pe_idpermiso AND mpu_usuario_id = 2
          WHERE r.ro_idroles = 2
          AND   mp.mp_modulo_id = 1
          ORDER BY pe_idpermiso"; */


        $sql = "SELECT  p.pe_nombre,ro_nombre,
            mp_nombre,pr_permitir,
            mpu_permitir permitir_usuario,
            coalesce(mpu_permitir,pr_permitir) as permitir
          FROM  app_roles r
          INNER JOIN app_permiso_roles pr ON (r.ro_idroles = pr.pr_rol_id)
          INNER JOIN app_modulo_permiso mp ON (pr.pr_modulo_permiso_id = mp.mp_idmope)
          INNER JOIN app_modulo_pages mpa ON mpa.mp_idmp = mp.mp_modulo_id
          INNER JOIN app_permisos p ON (mp.mp_permiso_id = p.pe_idpermiso)
          LEFT JOIN  app_modulo_permiso_usuario ON mpu_modulo_permiso_id = mp.mp_idmope AND
          mpu_usuario_id = " . $this->session->userdata('us_idusuario') . " 
          WHERE r.ro_idroles = " . $this->session->userdata('ro_idroles') . " 
          AND   mp.mp_modulo_id = " . $modulo_id . " 
          ORDER BY pe_idpermiso";

        $query = $this->db->query($sql);

        if ($query->num_rows() > 0) {
            $newsList = array();
            foreach ($query->result() as $news) {
                $newsList[] = $news;
            }

            $pr = array();
            if ($newsList != null) {
                foreach ($newsList as $p) {
                    //$data[(int)$p->pe_idpermiso] = (int)$p->pe_idpermiso;
                    $pr[(string) $p->pe_nombre] = (int) $p->permitir;
                }
            }

            return($pr);
        }
    }

    public function GetPermisosModulosCheck($roles_id, $modulo_id) {

        $sql = " SELECT *  ";
        $sql .= " FROM  app_roles r ";
        $sql .= " INNER JOIN app_permiso_roles pr ON (r.ro_idroles = pr.pr_rol_id) ";
        $sql .= " INNER JOIN app_modulo_permiso mp ON (pr.pr_modulo_permiso_id = mp.mp_idmope)  ";
        $sql .= " INNER JOIN app_permisos p ON (mp.mp_permiso_id = p.pe_idpermiso) ";
        $sql .= " WHERE r.ro_idroles = " . $roles_id . " ";
        $sql .= " AND   mp.mp_modulo_id = " . $modulo_id;
        $sql .= " ORDER BY p.pe_idpermiso";

        $query = $this->db->query($sql);
        $d = array();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $reg) {
                // $d[] .= (int) $reg->mp_permiso_id;
                $d[] = $reg;
            }
        } //else { $d[] = array("pr_permitir" => 0);  }
        return $d;
        //echo implode(";", $d);
    }

    public function GetPermisosModulosUsuariosCheck($roles_id, $usuario_id, $modulo_id) {
//COALESCE(mpu_permitir,1)
        $sql = " SELECT mp_permiso_id , pr.pr_permitir,COALESCE(mpu_permitir,1) mpu_permitir  ";
        $sql .= " FROM  app_roles r ";
        $sql .= " INNER JOIN app_permiso_roles pr ON (r.ro_idroles = pr.pr_rol_id) ";
        $sql .= " INNER JOIN app_modulo_permiso mp ON (pr.pr_modulo_permiso_id = mp.mp_idmope)  "; //mp.mp_permiso_id
        $sql .= " INNER JOIN app_permisos p ON (mp.mp_permiso_id = p.pe_idpermiso) ";
        $sql .= " LEFT JOIN  app_modulo_permiso_usuario ON mpu_modulo_permiso_id = mp.mp_idmope AND mpu_usuario_id = " . $usuario_id;
        $sql .= " WHERE r.ro_idroles = " . $roles_id . " ";
        $sql .= " AND   mp.mp_modulo_id = " . $modulo_id;
        $sql .= " ORDER BY pe_idpermiso";

        /*
          Al momento de seleccionar de la lista solo el usuario
          se debe seleccionar esta consulta para que pueda ver los permisos
          permitido de ese usuario.

          SELECT mp_permiso_id , pr.pr_permitir, COALESCE(mpu_permitir,1) permitir_usuario
          FROM  app_roles r
          INNER JOIN app_permiso_roles pr ON (r.ro_idroles = pr.pr_rol_id)
          INNER JOIN app_modulo_permiso mp ON (pr.pr_modulo_permiso_id = mp.mp_permiso_id)
          INNER JOIN app_permisos p ON (mp.mp_permiso_id = p.pe_idpermiso)
          LEFT JOIN  app_modulo_permiso_usuario ON mpu_modulo_permiso_id = p.pe_idpermiso AND mpu_usuario_id = 2
          WHERE r.ro_idroles    = 1
          AND   mp.mp_modulo_id = 1
         */

        $query = $this->db->query($sql);
        $d = array();
        foreach ($query->result() as $reg) {
            $d[] = $reg; //.= (int) $reg->mp_permiso_id;
        }
        return $d;
        //echo implode(";", $d);
    }

    public function GetPermisosModulos($modulo_id) {
        $sql = " SELECT pe_idpermiso, pe_descripcion ";
        $sql .= " FROM app_modulo_pages "; /* app_modulo */
        /*
          $sql .= " INNER JOIN app_modulo_pages mp  ON mp.mp_idmp = m.mo_idmodulo  "; */
        $sql .= " INNER JOIN app_modulo_permiso ON (mp_modulo_id = mp_idmp) ";
        $sql .= " INNER JOIN app_permisos  ON (mp_permiso_id = pe_idpermiso) ";
        $sql .= " WHERE mp_idmp = " . $modulo_id;
        $sql .= " ORDER BY pe_idpermiso";

        $query = $this->db->query($sql);

        $grid = "<table align='center' width='95%' id='tpermisos' border='0' class='table table-bordered table-hover'>";
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
        $this->db->from("app_modulo");
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

    public function GetModulosPages() {
        $this->db->select("*");
        $this->db->from("app_modulo");
        $this->db->join("app_modulo_pages", 'mp_idmodulo = mo_idmodulo', 'left');
        $query = $this->db->get();

        $menu = "<ul  style='font-size:10px;' class=''>";
        $cont = 0;
        $modulo = "";

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                if ($modulo <> $row->mo_nombre) {
                    $modulo = $row->mo_nombre;

                    if ($cont == 1) {
                        $menu .= "</ul></li>";
                        $cont = 0;
                    }
                    if ($cont == 0) {
                        $menu .= "<li >
                            <a href='#'  '>
                            <span class='rolback'>" . "&nbsp;
                            <img width='20' height='20' id='immo" . (int) $row->mo_idmodulo . "'
                            src='" . BASE . "public/template/ministerio/images/treeview/modulos.png' class='modulos_pages'/>&nbsp;" . $modulo . "</a>
                            </span><ul>";
                        $cont = 1;
                    }
                }
                $menu .= "<li class='li_a_img' ><span class='k-sprite users'></span><a onclick='modulos(" . (int) $row->mp_idmp . "," . (int) $row->mo_idmodulo . ");' style='color:#003366;' href='#' > <img class='modulos ' width=18 heigth=18 id='immo_pages" . (int) $row->mp_idmp . "'
                            src='" . BASE . "public/template/ministerio/images/treeview/can.png' /> " .
                        str_replace("", "&nbsp;", "<b>" . $row->mp_nombre . "</b> &nbsp; <span style='font-size:11px; font-style: italic; color:#003366;' > (" . $row->mo_nombre . " ") . ") </span></a></li>";
            }
            $menu .= "</ul></li></ul>";
            echo $menu;
        }
    }

    public function mini_text($text) {
        return trim(substr(strip_tags($text), 0, 55), " \n\r\t\0\x0B.") . '...';
    }

    public function GetRolesUsuarios() {
        $this->db->select("*");
        $this->db->from("app_roles");
        $this->db->join("app_usuarios", 'ro_idroles = us_roles', 'left');
        $this->db->join("adm_terceros", 'us_tercero = te_nit', 'left');
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
                        $menu .= "<li id='" . $row->us_idusuario . "'>
                            <a href='#' onclick='roles(" . $row->ro_idroles . ",\"" . $rol . "\");'>
                            <span class='rolback'>" . "&nbsp;
                            <img width='20' height='20' id='imgr" . (int) $row->ro_idroles . "' 
                            src='" . BASE . "public/template/ministerio/images/treeview/can.png' title='" . $rol . "' class='roles'/>&nbsp;" . $this->mini_text($rol) . "</a>
                            </span><ul>";
                        $cont = 1;
                    }
                }
                $menu .= "<li onclick='usuarios(" . $row->ro_idroles . "," . $row->us_idusuario . ",\"" . $rol . "\");' class='li_a_img' ><span class='k-sprite users'></span><a style='color:#003366;' href='#' data='" . $row->us_idusuario . "' id='data'> <img class='usuarios cl_rol_" . $row->ro_idroles . "  ' width=18 heigth=18 id='imgu" . (int) $row->us_idusuario . "' 
                            src='" . BASE . "public/template/desktop/images/treeview/can.png' /> " .
                        str_replace("", "&nbsp;", "<b>" . $row->us_usuario . "</b> &nbsp; <span style='font-size:11px; font-style: italic; color:#003366;' > (" . $row->te_nombres . " ") . ") </span></a></li>";
            }
            $menu .= "</ul></li></ul>";
            echo $menu;
        }
    }

}

?>