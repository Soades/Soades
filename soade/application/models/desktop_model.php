<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Desktop_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function Get_menu() {

        $menu = '<ul>';
        $menu .= '<li class="active open">
						<a href="#" title="Dashboard">
                                                <i class="fa fa-lg fa-fw fa-home"><em class="yellow" >2</em></i> 
                                                <span class="menu-item-parent">PRINCIPAL</span></a>
						<ul style="display: block;">
							<li>
								<a href="index.html" title="Dashboard">
                                                                  <span class="menu-item-parent">Analisis de procesos</span>
                                                                </a>
							</li>
							<li class="active">
								<a href="dashboard-marketing.html" title="Dashboard">
                                                                 <span class="menu-item-parent">Inicio</span>
                                                                </a>
							</li>
							 
						</ul>	
					</li>';

        $cont = 0;
        $modulo = "";
        $query = $this->db->query("select * , count(mo_idmenuparent) 'level' from app_modulo_menu_parent mm
                                   left join app_modulo m  on mm.mmp_idmmp = m.mo_idmenuparent
                                   group by mm.mmp_nombre order by mmp_idmmp");

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $news) {

                $cont = $cont + 1;
                 
                
           
                
//                              <span title="' . ($news->level > 0 ? $news->level . ' items' : '' ) . '" class="badge">' . ($news->level > 0 ? $news->level : '' ) . '</span>                             

//                $menu .= '<li><a href="#MENU_' . $news->mmp_nombre . '"> <i class="'.$news->mmp_icono.'"></i>                                 
//                               
//                              <span class="menu-item-parent">' . $news->mmp_descripcion . '</span>' . ($news->level > 0 ? '<i class="nav-item-caret"></i>' : '') . '
//
// 
//</a>';
                
                
                $menu .= '<li>
                                <a href="#">
                                <i class="fa fa-lg fa-fw fa-cloud">' . ($news->level > 0 ? '<em>'.$news->level . '</em>' : '' ) . '</i> 
                                    <span class="menu-item-parent">' . $news->mmp_descripcion . '</span>
                                        
                                    ' . ($news->level > 0 ? '<b class="collapse-sign"><em class="fa fa-plus-square-o"></em></b>' : '') . '
                                    
                                    
                                </a>
                                ';
                
                
                
                if ($news->level > 0) {
                    $menu .= $this->GetModulos($news->mmp_idmmp, $news->mmp_nombre, $news->mmp_descripcion);
                }
                $menu .= '</li>';
                
            }
        }
        return $menu;
    }

    public function GetModulos($idmodulo, $padre_nom, $padre) {
        //$query = $this->db->query('select * from app_modulo where mo_idmenuparent = ' . $idmodulo);
        $query = $this->db->query('select * , count(mp_idmodulo) level from  app_modulo m
                left join app_modulo_pages mp on mp.mp_idmodulo = m.mo_idmodulo
                where mo_idmenuparent = ' . $idmodulo . '
                group by m.mo_nombre order by mp_idmp');
        $mt = '';
        if ($query->num_rows() > 0) {
            $mt .= '<ul id="MENU_' . $padre_nom . '" >';

          

            foreach ($query->result() as $news) {
                $icon = $news->mo_icono;
                $router      = ($news->level > 0) ? '#' : $news->mo_router;
                $modulo_name = ($news->level > 0) ? '#' : $news->mo_nombre;
                
                $mt .= '<li class="side-nav-item submodulo2" >';
                $mt .= '<a class="cl_data_router" data-router='.$router.' data-modulo-name='.$modulo_name.' data=' . $news->mo_nombre. ' href="#MENU_HIJO_' . $news->mo_nombre . '">';
                $mt .= '<span title="' . ($news->level > 0 ? $news->level . ' items' : '' ) . '" class="badge">' . ($news->level > 0 ? $news->level : '' ) . '</span> ';
                $mt .= '<i class="nav-item-icon icon ' . $news->mo_icono . '"></i> ' . $news->mo_descripcion . '</a>';
                if ($news->level > 0) {
                    $mt .= $this->GetUlMultilevel($news->mo_idmodulo, $padre, $news->mo_nombre, $news->mo_descripcion);
                }
                $mt .= '</li>';
            }
            $mt .= '</ul>';
        }
        return $mt;
    }

    function GetUlMultilevel($idmodulo, $padre, $hijo_nombre, $hijo) {
        $mt = '';
        $sql = 'select * from app_modulo_pages where mp_idmodulo = ' . $idmodulo . ' order by mp_idmp';
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            
            
            
            $mt = '<ul id="MENU_HIJO_' . $hijo_nombre . '" class="side-nav-child" >';


            foreach ($query->result() as $news) {
                //$router = 'modules/' . $news->mp_router . '/' . $news->mp_nombre;
                $router = 'modules/' . $news->mp_router . '/' . $news->mp_nombre;
                
                $mt .= '<li class="side-nav-item" >';
                $mt .= '<a class="cl_data_router" data-router='.$news->mp_router.' data-modulo-name=' . $news->mp_nombre . ' data=' . $news->mp_descripcion. ' href="#"> ';
                $mt .= '<i class="nav-item-icon icon ion-ios7-help-outline"></i>';
                $mt .= '<i class="' . $news->mp_icono . '" ></i> <span class="menu-text">' . $news->mp_descripcion . '</span>';
                $mt .= '</a>';

                $mt .= '</li>';
            }
            $mt .= '</ul>';
        }
        return $mt;
    }

    public function GetModulosContextMenu() {
        $mt = '';
        $query = $this->db->query('select * from app_modulo ORDER BY mo_descripcion');
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $news) {
                $mt .= '<li  class="dropdown-submenu menu-item">
                        <a class="menu-btn" data="' . $news->mo_nombre . '" data-icono="' . $news->mo_icono . '" href="#"><i class="' . $news->mo_icono . '" ></i>&nbsp;&nbsp;' . $news->mo_descripcion . '</a>                              
                                ' . $this->GetModulosContextSubMenu($news->mo_idmodulo) . '                              
                        </li>';
            }
        }
        return $mt;
    }

    function GetModulosContextSubMenu($idmodulo) {
        $mt = '';
        $sql = ' select * from app_modulo_pages ';
        $sql .= ' inner join app_modulo on mo_idmodulo = mp_idmodulo ';
        $sql .= ' where mp_idmodulo = ' . $idmodulo . ' ORDER BY mp_idmp ';

        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $mt = '<ul id="context-load-sub-menu" class="dropdown-menu context-custom-menu">';
            foreach ($query->result() as $news) {
                $news->mp_icono = ($news->mp_icono == "") ? $news->mo_icono : $news->mp_icono;
                $mt .= '<li class="menu-item" ><a class="menu-btn" data="' . $news->mp_nombre . '" data-icono="' . $news->mp_icono . '" href="#"> <i class="' . $news->mp_icono . '" ></i> <span class="menu-text">' . $news->mp_descripcion . '</span></a></li>';
            }
            $mt .= '</ul>';
        }
        return $mt;
    }

    function menu_toolbar($idmodulo, $modulo) {
        $mt = '';
        $query = $this->db->query('select * from app_modulo_pages where mp_idmodulo = ' . $idmodulo . ' ORDER BY mp_idmp');
        if ($query->num_rows() > 0) {


            $mt .= '  <div class="note-editor">
                <div class="note-toolbar btn-toolbar form_modulo">
                    <div class="note-style btn-group">
                        <button data-toggle="dropdown" type="button" class="btn btn-default btn-sm btn-small note-recent-color">
                            <i class="cus-book-add"></i>
                        </button>
                        <button data-toggle="dropdown" type="button" class="btn btn-default btn-sm btn-small dropdown-toggle"> 
                            <span class="caret"></span>
                        </button>
                        <ul id="menu_modulo_pages" class="dropdown-menu">
                            <li><a data="ventas" href="ventas">ventas</a></li>
                            <li><a data="ventas" href="roles">roles</a></li>
                        </ul>
                    </div>

                    <div class="note-font btn-group form_crud ">
                        <button type="button" id="roles_nuevo" class="btn btn-default btn-sm btn-small nuevo">
                            <i class="cus-page-white-add"></i> Nuevo
                        </button>
                        <button type="button" id="roles_guardar" class="btn btn-default btn-sm btn-small guardar">
                            <i class="cus-disk"></i> Guardar
                        </button>
                        <button style="display:none1;" type="button" class="btn btn-default btn-sm btn-small editar">
                                        <i class="cus-disk"></i> Editar 
                        </button>
                        <button type="button" id="roles_listar" class="btn btn-default btn-sm btn-small listar " title="">
                            <i class="cus-application-view-list"></i> Listar
                        </button>
                        <button type="button" id="roles_eliminar" class="btn btn-default btn-sm btn-small eliminar">
                            <i class="cus-delete"></i> Eliminar
                        </button>
                    </div>

                </div>
            </div>';
        }
        //return ($mt);
    }

}

?>