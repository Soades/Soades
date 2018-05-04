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
				<button type='button' id='adm_anio_nuevo' class='btn btn-default btn-sm btn-small nuevo'>
                <i class='cus-page-white-add'></i> Nuevo
            </button>
				<button type='button' id='adm_anio_guardar' class='btn btn-default btn-sm btn-small guardar'>
                <i class='cus-disk'></i> Guardar
            </button>
				<button type='button' id='adm_anio_listar' class='btn btn-default btn-sm btn-small listar ' title=''>
                <i class='cus-application-view-list'></i> Listar
            </button>
				<button type='button' id='adm_anio_eliminar' class='btn btn-default btn-sm btn-small eliminar'>
                <i class='cus-delete'></i> Eliminar
            </button>
			</div>
		</div>
	</div>

<div style='min-height: 37%; ' class='abs window_body_form' >
	<div class='jarviswidget jarviswidget-sortable' id='wid-id-0' data-widget-togglebutton='false' data-widget-editbutton='false' data-widget-fullscreenbutton='false' data-widget-colorbutton='false' data-widget-deletebutton='false' role='widget'>
			<header role='heading'>
				<span class='widget-icon'> <i class='glyphicon glyphicon-stats txt-color-darken'></i> </span>
						<h2>GESTION DE ANIO</h2>
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
						<form method='post' id='adm_anio-form' class='smart-form' >

							<fieldset>
							<div class='row' >
								 <input style="display: none;" type="text" name="an_idanio" id="an_idanio"  >
								    <section class='col col-4'>
								        <label class='label'>Nombre</label>
								        <label class='input'> <i class='icon-append fa fa-file-text-o'></i>
								            <input type='text' name='an_nombre'  id='an_nombre'>
								        </label>
								    </section>
								    <section class='col col-4'>
								        <label class='label'>Descripcion</label>
								        <label class='input'> <i class='icon-append fa fa-file-text-o'></i>
								            <input type='text' name='an_descripcion'  id='an_descripcion'>
								        </label>
								    </section>
								    <section class='col col-4'>
								        <label class='label'>Fecha_creacion</label>
								        <label class='input'> <i class='icon-append fa fa-file-text-o'></i>
								            <input type='text' name='an_fecha_creacion'  id='an_fecha_creacion'>
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
						<th><a class='k-link' href='#'>Idanio</a></th>
						<th><a class='k-link' href='#'>Nombre</a></th>
						<th><a class='k-link' href='#'>Descripcion</a></th>
						<th><a class='k-link' href='#'>Fecha_creacion</a></th>
					</tr>
				</thead>
			</table>
		</div>

		<div class='custom-scroll body_table' style='width: 100%; position: absolute; top :80px; bottom: 20px; overflow-y: scroll;'>
			<table id='adm_anio_table_tbody' cellpadding='0' cellspacing='0'  class='table table-bordered kgrid'>
				<tbody>
					<tr>
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