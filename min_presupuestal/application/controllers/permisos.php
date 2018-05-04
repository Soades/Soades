<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Permisos extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('permisos_model');
        //$this->load->library('audit');
    }

    public function index() {
        //$data['permisos'] = $this->permisos_model->GetPermisosModulosCheckModulos(3);
        $this->load->view('modules/app/permisos', 1);
        //$this->AddAudit("{}",ACCESO);
    }

    public function GetRolesUsuarios() {
        echo $this->permisos_model->GetRolesUsuarios();
    }

    public function GetModulos() {
        echo $this->permisos_model->GetModulos();
    }

    public function GetModulosPages() {
        echo $this->permisos_model->GetModulosPages();
    }

    public function GetPermisosModulos() {
        $modulo_id = (isset($_REQUEST["modulos_id"])) ? $_REQUEST["modulos_id"] : '';
        echo $this->permisos_model->GetPermisosModulos($modulo_id);
    }

    public function GetPermisosModulosCheck() {
        $modulo_id = (isset($_REQUEST["modulos_id"])) ? $_REQUEST["modulos_id"] : '';
        $roles_id = (isset($_REQUEST["roles_id"])) ? $_REQUEST["roles_id"] : '';
        $result = $this->permisos_model->GetPermisosModulosCheck($roles_id, $modulo_id);
        echo json_encode($result);
    }

    public function GetPermisosModulosUsuariosCheck() {
        $modulo_id = (isset($_REQUEST["modulos_id"])) ? $_REQUEST["modulos_id"] : '';
        $roles_id = (isset($_REQUEST["roles_id"])) ? $_REQUEST["roles_id"] : '';
        $usuario_id = (isset($_REQUEST["usuario_id"])) ? $_REQUEST["usuario_id"] : '';
        $result = $this->permisos_model->GetPermisosModulosUsuariosCheck($roles_id, $usuario_id, $modulo_id);
        echo json_encode($result);
    }

    public function GuardarPermisos() {
        $permisos_id = (isset($_REQUEST["permisos_id"])) ? $_REQUEST["permisos_id"] : '';
        $modulo_id = (isset($_REQUEST["modulos_id"])) ? $_REQUEST["modulos_id"] : '';
        $roles_id = (isset($_REQUEST["roles_id"])) ? $_REQUEST["roles_id"] : '';
        $estado = (isset($_REQUEST["estado"])) ? $_REQUEST["estado"] : '';
        echo $this->permisos_model->GuardarPermisos($roles_id, $modulo_id, $permisos_id, $estado);
    }

    public function GuardarPermisosUsuarios() {
        $permisos_id = (isset($_REQUEST["permisos_id"])) ? $_REQUEST["permisos_id"] : '';
        $modulo_id = (isset($_REQUEST["modulos_id"])) ? $_REQUEST["modulos_id"] : '';
        $roles_id = (isset($_REQUEST["roles_id"])) ? $_REQUEST["roles_id"] : '';
        $usuariosid = (isset($_REQUEST["usuariosid"])) ? $_REQUEST["usuariosid"] : '';
        $estado = (isset($_REQUEST["estado"])) ? $_REQUEST["estado"] : '';
        echo $this->permisos_model->GuardarPermisosUsuarios($roles_id, $usuariosid, $modulo_id, $permisos_id, $estado);
    }

    /*
      public function AddAudit($add,$permiso)
      {
      $this->audit->setData($add);
      $this->audit->setModulo(3);
      $this->audit->setItem($add['pe_idpermiso']);
      $this->audit->setPermiso($permiso);
      $this->audit->setResult("");
      }

      function _output($param)
      {
      $this->audit->register();
      echo $param;
      }
     */
}
