<?php
    /*
				error_reporting(null);
				$data = array();
				if ($permisos != null){
				  foreach ($permisos as $p){      
					 $data[(int)$p->pe_idpermiso] = (int)$p->pe_idpermiso;
				  }
				 }

				if ($data[ACCESO] == ACCESO) {
				 */
				?>



	<link rel="stylesheet" type="text/css" media="screen" href="http://192.241.236.31/themes/preview/smartadmin/1.7.x/ajaxversion/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" media="screen" href="http://192.241.236.31/themes/preview/smartadmin/1.7.x/ajaxversion/css/font-awesome.min.css">

		<!-- SmartAdmin Styles : Caution! DO NOT change the order -->
		<link rel="stylesheet" type="text/css" media="screen" href="http://192.241.236.31/themes/preview/smartadmin/1.7.x/ajaxversion/css/smartadmin-production-plugins.min.css">
		<link rel="stylesheet" type="text/css" media="screen" href="http://192.241.236.31/themes/preview/smartadmin/1.7.x/ajaxversion/css/smartadmin-production.min.css">
		<link rel="stylesheet" type="text/css" media="screen" href="http://192.241.236.31/themes/preview/smartadmin/1.7.x/ajaxversion/css/smartadmin-skins.min.css">

		<!-- SmartAdmin RTL Support -->
		<link rel="stylesheet" type="text/css" media="screen" href="http://192.241.236.31/themes/preview/smartadmin/1.7.x/ajaxversion/css/smartadmin-rtl.min.css"> 

		<!-- We recommend you use "your_style.css" to override SmartAdmin
		     specific styles this will also ensure you retrain your customization with each SmartAdmin update.
		<link rel="stylesheet" type="text/css" media="screen" href="http://192.241.236.31/themes/preview/smartadmin/1.7.x/ajaxversion/css/your_style.css"> -->

		<!-- Demo purpose only: goes with demo.js, you can delete this css when designing your own WebApp -->
		<link rel="stylesheet" type="text/css" media="screen" href="http://192.241.236.31/themes/preview/smartadmin/1.7.x/ajaxversion/css/demo.min.css">



<div class='note-editor'>
		<div class='note-toolbar btn-toolbar form_modulo'>

<div class='note-style btn-group'>
            <button data-toggle='dropdown' type='button' class='btn btn-default btn-sm btn-small note-recent-color'>
                <i class='cus-cog'></i>
            </button>
            <button data-toggle='dropdown' type='button' class='btn btn-default btn-sm btn-small dropdown-toggle'> 
                <span class='caret'></span>
            </button>
            <ul id='menu_modulo_pages' class='dropdown-menu'>
                <li><a data='' href='#'>Ver &nbsp;<i class='fa fa-eye' ></i> </a></li>
                <li class='divider' ><a data='' href='#'></a></li>
                <li><a data='auditoria' href='roles'>Auditoria</a></li>
            </ul>
        </div>			<div class='note-font btn-group form_crud '>
				<button type='button' id='adm_terceros_nuevo' class='btn btn-default btn-sm btn-small nuevo'>
                <i class='cus-page-white-add'></i> Nuevo
            </button>
				<button type='button' id='adm_terceros_guardar' class='btn btn-default btn-sm btn-small guardar'>
                <i class='cus-disk'></i> Guardar
            </button>
				<button type='button' id='adm_terceros_listar' class='btn btn-default btn-sm btn-small listar ' title=''>
                <i class='cus-application-view-list'></i> Listar
            </button>
				<button type='button' id='adm_terceros_eliminar' class='btn btn-default btn-sm btn-small eliminar'>
                <i class='cus-delete'></i> Eliminar
            </button>
			</div>
		</div>
	</div>

<div style='min-height: 37%; ' class='abs window_body_form' >
	<div class='jarviswidget jarviswidget-sortable' id='wid-id-0' data-widget-togglebutton='false' data-widget-editbutton='false' data-widget-fullscreenbutton='false' data-widget-colorbutton='false' data-widget-deletebutton='false' role='widget'>
			<header role='heading'>
				<span class='widget-icon'> <i class='glyphicon glyphicon-stats txt-color-darken'></i> </span>
						<h2>GESTION DE TERCEROS</h2>
					<ul class='nav nav-tabs pull-right in' id='myTab'>
						<li class='active'>
						<a data-toggle='tab' href='#s1' aria-expanded='true'>
						<i class='fa fa-user'></i>
						<span class='hidden-mobile hidden-tablet'>General</span>
						</a>
						</li>
					</ul>
				<span class='jarviswidget-loader'><i class='fa fa-refresh fa-spin'></i></span>
			</header>
		<div class='no-padding' role='content'>
			<div class='jarviswidget-editbox'>
			</div>
			<div class='widget-body'>
				<div id='myTabContent' class='tab-content'>
				<div class='tab-pane fade active in' id='s1'>
				<div class='widget-body-toolbar bg-color-white'>
						<form method='post' id='adm_terceros-form' class='smart-form' >

							<fieldset>
							<div class='row' >
								 <input style="display: none;" type="text" name="te_idterceros" id="te_idterceros"  >
								    <section class='col col-4'>
								        <label class='label'>P/N N | empresa J</label>
								        <label class='input'> <i class='icon-append fa fa-file-text-o'></i>
								            <input type='text' name='te_empresa'  id='te_empresa'>
								        </label>
								    </section>
								    <section class='col col-4'>
								        <label class='label'>Tipo_tercero</label>
								        <label class='input'> <i class='icon-append fa fa-file-text-o'></i>
								            <input type='text' name='te_tipo_tercero'  id='te_tipo_tercero'>
								        </label>
								    </section>
								    <section class='col col-4'>
								        <label class='label'>Nit</label>
								        <label class='input'> <i class='icon-append fa fa-file-text-o'></i>
								            <input type='text' name='te_nit'  id='te_nit'>
								        </label>
								    </section>
								    <section class='col col-4'>
								        <label class='label'>Nombres</label>
								        <label class='input'> <i class='icon-append fa fa-file-text-o'></i>
								            <input type='text' name='te_nombres'  id='te_nombres'>
								        </label>
								    </section>
								    <section class='col col-4'>
								        <label class='label'>Nombres2</label>
								        <label class='input'> <i class='icon-append fa fa-file-text-o'></i>
								            <input type='text' name='te_nombres2'  id='te_nombres2'>
								        </label>
								    </section>
								    <section class='col col-4'>
								        <label class='label'>Apellidos</label>
								        <label class='input'> <i class='icon-append fa fa-file-text-o'></i>
								            <input type='text' name='te_apellidos'  id='te_apellidos'>
								        </label>
								    </section>
								    <section class='col col-4'>
								        <label class='label'>Apellidos2</label>
								        <label class='input'> <i class='icon-append fa fa-file-text-o'></i>
								            <input type='text' name='te_apellidos2'  id='te_apellidos2'>
								        </label>
								    </section>
								    <section class='col col-4'>
								        <label class='label'>Genero</label>
								        <label class='input'> <i class='icon-append fa fa-file-text-o'></i>
								            <input type='text' name='te_genero'  id='te_genero'>
								        </label>
								    </section>
								    <section class='col col-4'>
								        <label class='label'>Negocio</label>
								        <label class='input'> <i class='icon-append fa fa-file-text-o'></i>
								            <input type='text' name='te_negocio'  id='te_negocio'>
								        </label>
								    </section>
								    <section class='col col-4'>
								        <label class='label'>Es_cliente</label>
								        <label class='input'> <i class='icon-append fa fa-file-text-o'></i>
								            <input type='text' name='te_es_cliente'  id='te_es_cliente'>
								        </label>
								    </section>
								    <section class='col col-4'>
								        <label class='label'>Es_vendedor</label>
								        <label class='input'> <i class='icon-append fa fa-file-text-o'></i>
								            <input type='text' name='te_es_vendedor'  id='te_es_vendedor'>
								        </label>
								    </section>
								    <section class='col col-4'>
								        <label class='label'>Es_proveedor</label>
								        <label class='input'> <i class='icon-append fa fa-file-text-o'></i>
								            <input type='text' name='te_es_proveedor'  id='te_es_proveedor'>
								        </label>
								    </section>
								    <section class='col col-4'>
								        <label class='label'>Condiciones_pago</label>
								        <label class='input'> <i class='icon-append fa fa-file-text-o'></i>
								            <input type='text' name='te_condiciones_pago'  id='te_condiciones_pago'>
								        </label>
								    </section>
								    <section class='col col-4'>
								        <label class='label'>Vendedor</label>
								        <label class='input'> <i class='icon-append fa fa-file-text-o'></i>
								            <input type='text' name='te_vendedor'  id='te_vendedor'>
								        </label>
								    </section>
								    <section class='col col-4'>
								        <label class='label'>Lista_precios</label>
								        <label class='input'> <i class='icon-append fa fa-file-text-o'></i>
								            <input type='text' name='te_lista_precios'  id='te_lista_precios'>
								        </label>
								    </section>
								    <section class='col col-4'>
								        <label class='label'>Fecha_nacimiento</label>
								        <label class='input'> <i class='icon-append fa fa-file-text-o'></i>
								            <input type='text' name='te_fecha_nacimiento'  id='te_fecha_nacimiento'>
								        </label>
								    </section>
								    <section class='col col-4'>
								        <label class='label'>Estado</label>
								        <label class='input'> <i class='icon-append fa fa-file-text-o'></i>
								            <input type='text' name='te_estado'  id='te_estado'>
								        </label>
								    </section>
								    <section class='col col-4'>
								        <label class='label'>Direccion</label>
								        <label class='input'> <i class='icon-append fa fa-file-text-o'></i>
								            <input type='text' name='te_direccion'  id='te_direccion'>
								        </label>
								    </section>
								    <section class='col col-4'>
								        <label class='label'>Ciudad</label>
								        <label class='input'> <i class='icon-append fa fa-file-text-o'></i>
								            <input type='text' name='te_ciudad'  id='te_ciudad'>
								        </label>
								    </section>
								    <section class='col col-4'>
								        <label class='label'>Telefono</label>
								        <label class='input'> <i class='icon-append fa fa-file-text-o'></i>
								            <input type='text' name='te_telefono'  id='te_telefono'>
								        </label>
								    </section>
								    <section class='col col-4'>
								        <label class='label'>Telefono2</label>
								        <label class='input'> <i class='icon-append fa fa-file-text-o'></i>
								            <input type='text' name='te_telefono2'  id='te_telefono2'>
								        </label>
								    </section>
								    <section class='col col-4'>
								        <label class='label'>Fax</label>
								        <label class='input'> <i class='icon-append fa fa-file-text-o'></i>
								            <input type='text' name='te_fax'  id='te_fax'>
								        </label>
								    </section>
								    <section class='col col-4'>
								        <label class='label'>Ext</label>
								        <label class='input'> <i class='icon-append fa fa-file-text-o'></i>
								            <input type='text' name='te_ext'  id='te_ext'>
								        </label>
								    </section>
								    <section class='col col-4'>
								        <label class='label'>Contacto1</label>
								        <label class='input'> <i class='icon-append fa fa-file-text-o'></i>
								            <input type='text' name='te_contacto1'  id='te_contacto1'>
								        </label>
								    </section>
								    <section class='col col-4'>
								        <label class='label'>Contacto2</label>
								        <label class='input'> <i class='icon-append fa fa-file-text-o'></i>
								            <input type='text' name='te_contacto2'  id='te_contacto2'>
								        </label>
								    </section>
								    <section class='col col-4'>
								        <label class='label'>Apartado_aereo</label>
								        <label class='input'> <i class='icon-append fa fa-file-text-o'></i>
								            <input type='text' name='te_apartado_aereo'  id='te_apartado_aereo'>
								        </label>
								    </section>
								    <section class='col col-4'>
								        <label class='label'>Tipo_identificacion</label>
								        <label class='input'> <i class='icon-append fa fa-file-text-o'></i>
								            <input type='text' name='te_tipo_identificacion'  id='te_tipo_identificacion'>
								        </label>
								    </section>
								    <section class='col col-4'>
								        <label class='label'>Tipo_tributario</label>
								        <label class='input'> <i class='icon-append fa fa-file-text-o'></i>
								            <input type='text' name='te_tipo_tributario'  id='te_tipo_tributario'>
								        </label>
								    </section>
								    <section class='col col-4'>
								        <label class='label'>Pais</label>
								        <label class='input'> <i class='icon-append fa fa-file-text-o'></i>
								            <input type='text' name='te_pais'  id='te_pais'>
								        </label>
								    </section>
								    <section class='col col-4'>
								        <label class='label'>Barrio</label>
								        <label class='input'> <i class='icon-append fa fa-file-text-o'></i>
								            <input type='text' name='te_barrio'  id='te_barrio'>
								        </label>
								    </section>
								    <section class='col col-4'>
								        <label class='label'>Gran_contribuyente</label>
								        <label class='input'> <i class='icon-append fa fa-file-text-o'></i>
								            <input type='text' name='te_gran_contribuyente'  id='te_gran_contribuyente'>
								        </label>
								    </section>
								    <section class='col col-4'>
								        <label class='label'>Auto_retenedor</label>
								        <label class='input'> <i class='icon-append fa fa-file-text-o'></i>
								            <input type='text' name='te_auto_retenedor'  id='te_auto_retenedor'>
								        </label>
								    </section>
								    <section class='col col-4'>
								        <label class='label'>Es_excento_iva</label>
								        <label class='input'> <i class='icon-append fa fa-file-text-o'></i>
								            <input type='text' name='te_es_excento_iva'  id='te_es_excento_iva'>
								        </label>
								    </section>
								    <section class='col col-4'>
								        <label class='label'>Notas</label>
								        <label class='input'> <i class='icon-append fa fa-file-text-o'></i>
								            <input type='text' name='te_notas'  id='te_notas'>
								        </label>
								    </section>
								    <section class='col col-4'>
								        <label class='label'>Correo</label>
								        <label class='input'> <i class='icon-append fa fa-file-text-o'></i>
								            <input type='text' name='te_correo'  id='te_correo'>
								        </label>
								    </section>
								    <section class='col col-4'>
								        <label class='label'>Movil</label>
								        <label class='input'> <i class='icon-append fa fa-file-text-o'></i>
								            <input type='text' name='te_movil'  id='te_movil'>
								        </label>
								    </section>
								    <section class='col col-4'>
								        <label class='label'>comun C , simpli S , pnatural N</label>
								        <label class='input'> <i class='icon-append fa fa-file-text-o'></i>
								            <input type='text' name='te_regimen'  id='te_regimen'>
								        </label>
								    </section>
								    <section class='col col-4'>
								        <label class='label'>Si es un vendedor si le asigna una base para la venta</label>
								        <label class='input'> <i class='icon-append fa fa-file-text-o'></i>
								            <input type='text' name='te_base_ventas'  id='te_base_ventas'>
								        </label>
								    </section>
								    <section class='col col-4'>
								        <label class='label'>Cupo_credito</label>
								        <label class='input'> <i class='icon-append fa fa-file-text-o'></i>
								            <input type='text' name='te_cupo_credito'  id='te_cupo_credito'>
								        </label>
								    </section>
								    <section class='col col-4'>
								        <label class='label'>Descuento</label>
								        <label class='input'> <i class='icon-append fa fa-file-text-o'></i>
								            <input type='text' name='te_descuento'  id='te_descuento'>
								        </label>
								    </section>
								    <section class='col col-4'>
								        <label class='label'>Nit_real</label>
								        <label class='input'> <i class='icon-append fa fa-file-text-o'></i>
								            <input type='text' name='te_nit_real'  id='te_nit_real'>
								        </label>
								    </section>
								    <section class='col col-4'>
								        <label class='label'>Razon_social</label>
								        <label class='input'> <i class='icon-append fa fa-file-text-o'></i>
								            <input type='text' name='te_razon_social'  id='te_razon_social'>
								        </label>
								    </section>
								    <section class='col col-4'>
								        <label class='label'>Representante legal</label>
								        <label class='input'> <i class='icon-append fa fa-file-text-o'></i>
								            <input type='text' name='te_representante'  id='te_representante'>
								        </label>
								    </section>
								    <section class='col col-4'>
								        <label class='label'>Codigo_alterno</label>
								        <label class='input'> <i class='icon-append fa fa-file-text-o'></i>
								            <input type='text' name='te_codigo_alterno'  id='te_codigo_alterno'>
								        </label>
								    </section>
								    <section class='col col-4'>
								        <label class='label'>Tarjeta</label>
								        <label class='input'> <i class='icon-append fa fa-file-text-o'></i>
								            <input type='text' name='te_tarjeta'  id='te_tarjeta'>
								        </label>
								    </section>
								    <section class='col col-4'>
								        <label class='label'>1 acumula puntos</label>
								        <label class='input'> <i class='icon-append fa fa-file-text-o'></i>
								            <input type='text' name='te_fidelizacion'  id='te_fidelizacion'>
								        </label>
								    </section>
								    <section class='col col-4'>
								        <label class='label'>Imagen</label>
								        <label class='input'> <i class='icon-append fa fa-key'></i>
								            <input type='password' name='te_imagen'  id='te_imagen'>
								        </label>
								    </section>
								    <section class='col col-4'>
								        <label class='label'>Fecha_creacion</label>
								        <label class='input'> <i class='icon-append fa fa-file-text-o'></i>
								            <input type='text' name='te_fecha_creacion'  id='te_fecha_creacion'>
								        </label>
								    </section>
								    <section class='col col-4'>
								        <label class='label'>Sync</label>
								        <label class='input'> <i class='icon-append fa fa-file-text-o'></i>
								            <input type='text' name='te_sync'  id='te_sync'>
								        </label>
								    </section>
							</div>
							</fieldset>
						</form>
				</div>
				</div>
				</div>
			</div>
		</div>
	</div>
</div>

 
               <!-- 

              TABLA

                * .table_panel_nav : Para la navegacion de los registros de la tabla.
                * .header_table    : Para el header de la tabla para que quede fijo y no se
                                     pierda sus cabeceras.
                * .body_table      : Para llenar la tabla con los registros que vienen de la 
                                     base de datos.
               -->

            
<div  style='max-height:60%;' class='abs window_body_table' >
		   <div class='table_panel_nav custom-scroll' >
               
        <div class='btn-group pull-right inbox-paging'>
            <button  class='btn btn-default btn-sm table_anterior previous'>
                <strong><i class='fa fa-chevron-left'></i></strong>
            </button>
            <button   class='btn btn-default btn-sm table_siguiente next'>
                <strong><i class='fa fa-chevron-right'></i></strong>
            </button>
        </div>        
        <span style='line-height: 30px;padding-left: 0px; padding-right: 0px;' class='pull-right'>
            <lable class='pagination_builsoft' >
                Pag&nbsp; 
                <lable class='page_number'></lable>&nbsp; de&nbsp;               
                <lable  class='page_total'></lable>

                <span style=' margin-right:  2px;  border-right: 1px solid #ccc;'  ></span>

                &nbsp;Reg&nbsp;                
                <lable class='total_page_rows'></lable>
                &nbsp; de &nbsp;( <lable class='total_all'></lable>)</lable>
        </span>


        <div class='btn-group pull-left inbox-paging'>
            <select style='width: 70px; font-size: 12px; padding-left: 3px;'  class='form-control item_por_page ' >
                <option value='1' >1</option>
                <option value='2' >2</option>
                <option value='3'>3</option>
                <option value='4' >4</option>
                <option value='5' >5</option>
                <option value='10' >10</option>
                <option value='15' >15</option>
                <option value='20' selected >20</option>
                <option value='25' >25</option>
                <option value='30' >30</option>
                <option value='35' >35</option>
                <option value='40' >40</option>
                <option value='45' >45</option>
                <option value='50' >50</option>
                <option value='60' >60</option>
                <option value='70' >70</option>
                <option value='80' >80</option>
                <option value='90' >90</option>
                <option value='100' >100</option>
                <option value='150' >150</option>
                <option value='200' >200</option>
                <option value='300' >300</option>
                <option value='400' >400</option>
                <option value='500' >500</option>
                <option value='900' >1000</option>
            </select> 
        </div>

        <div class='btn-group pull-left inbox-paging'>

            <div style='line-height: 30px; padding-left: 0px; padding-right: 0px;'   class='col-md-12'>

                <div class='icon-addon addon-md'>
                    <input type='text'  placeholder='Filtrar' class='form-control search_column '>
                    <label  class='glyphicon glyphicon-search' rel='tooltip' title='' 
                            data-original-title='email'></label>
                </div>
            </div>
        </div>
    </div>

		<div class='custom-scroll header_table' style=' width: 100%; position: absolute;  margin-top:51px; '>
			<table cellpadding='0' cellspacing='0'  class='table table-bordered'>
				<thead>
					<tr>
						<th><a class='k-link' href='#'>#</a></th>
						<th><a class='k-link' href='#'>Idterceros</a></th>
						<th><a class='k-link' href='#'>P/N N | empresa J</a></th>
						<th><a class='k-link' href='#'>Tipo_tercero</a></th>
						<th><a class='k-link' href='#'>Nit</a></th>
						<th><a class='k-link' href='#'>Nombres</a></th>
						<th><a class='k-link' href='#'>Nombres2</a></th>
						<th><a class='k-link' href='#'>Apellidos</a></th>
						<th><a class='k-link' href='#'>Apellidos2</a></th>
						<th><a class='k-link' href='#'>Genero</a></th>
						<th><a class='k-link' href='#'>Negocio</a></th>
						<th><a class='k-link' href='#'>Es_cliente</a></th>
						<th><a class='k-link' href='#'>Es_vendedor</a></th>
						<th><a class='k-link' href='#'>Es_proveedor</a></th>
						<th><a class='k-link' href='#'>Condiciones_pago</a></th>
						<th><a class='k-link' href='#'>Vendedor</a></th>
						<th><a class='k-link' href='#'>Lista_precios</a></th>
						<th><a class='k-link' href='#'>Fecha_nacimiento</a></th>
						<th><a class='k-link' href='#'>Estado</a></th>
						<th><a class='k-link' href='#'>Direccion</a></th>
						<th><a class='k-link' href='#'>Ciudad</a></th>
						<th><a class='k-link' href='#'>Telefono</a></th>
						<th><a class='k-link' href='#'>Telefono2</a></th>
						<th><a class='k-link' href='#'>Fax</a></th>
						<th><a class='k-link' href='#'>Ext</a></th>
						<th><a class='k-link' href='#'>Contacto1</a></th>
						<th><a class='k-link' href='#'>Contacto2</a></th>
						<th><a class='k-link' href='#'>Apartado_aereo</a></th>
						<th><a class='k-link' href='#'>Tipo_identificacion</a></th>
						<th><a class='k-link' href='#'>Tipo_tributario</a></th>
						<th><a class='k-link' href='#'>Pais</a></th>
						<th><a class='k-link' href='#'>Barrio</a></th>
						<th><a class='k-link' href='#'>Gran_contribuyente</a></th>
						<th><a class='k-link' href='#'>Auto_retenedor</a></th>
						<th><a class='k-link' href='#'>Es_excento_iva</a></th>
						<th><a class='k-link' href='#'>Notas</a></th>
						<th><a class='k-link' href='#'>Correo</a></th>
						<th><a class='k-link' href='#'>Movil</a></th>
						<th><a class='k-link' href='#'>comun C , simpli S , pnatural N</a></th>
						<th><a class='k-link' href='#'>Si es un vendedor si le asigna una base para la venta</a></th>
						<th><a class='k-link' href='#'>Cupo_credito</a></th>
						<th><a class='k-link' href='#'>Descuento</a></th>
						<th><a class='k-link' href='#'>Nit_real</a></th>
						<th><a class='k-link' href='#'>Razon_social</a></th>
						<th><a class='k-link' href='#'>Representante legal</a></th>
						<th><a class='k-link' href='#'>Codigo_alterno</a></th>
						<th><a class='k-link' href='#'>Tarjeta</a></th>
						<th><a class='k-link' href='#'>1 acumula puntos</a></th>
						<th><a class='k-link' href='#'>Imagen</a></th>
						<th><a class='k-link' href='#'>Fecha_creacion</a></th>
						<th><a class='k-link' href='#'>Sync</a></th>
					</tr>
				</thead>
			</table>
		</div>

		<div class='custom-scroll body_table' style='width: 100%; position: absolute; top :80px; bottom: 20px; overflow-y: scroll;'>
			<table id='adm_terceros_table_tbody' cellpadding='0' cellspacing='0'  class='table table-bordered kgrid'>
				<tbody>
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					<tr>
				</tbody>
			</table>
		</div>

</div>

<?php/*
} else {*/
?>
<?php/*
}*/
?>