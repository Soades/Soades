 
			
			<div class="content-app fixed-header">
    <!-- app header -->
    <div class="app-header">
        <div class="pull-right">
            <a class="btn btn-default" id="adm_capitulos_listar" role="button">
                <i class="glyphicon glyphicon-list" ></i>
            </a>
            <a class="btn btn-default" id="adm_capitulos_nuevo" role="button">
                <i class="glyphicon glyphicon-file" ></i>
            </a>
            <a class="btn btn-default" id="adm_capitulos_eliminar" role="button">
                <i class="glyphicon glyphicon-trash" ></i>
            </a>
            <a class="btn btn-default" id="adm_capitulos_guardar" role="button">
                <i class="glyphicon glyphicon-floppy-disk" ></i>
            </a>
        </div>
        <ol class="breadcrumb bg-none pull-left hide-xs">
            <li><a href="#">Proyeccion</a></li>
            <li><a href="#">Presupuesto de gastos</a></li>
            <li class="active">Capitulos</li>
        </ol>
        <!-- <h3 class="app-title">Drop App Modules</h3> -->
    </div><!-- /app header -->
			
			

    <!-- app body -->
    <div class="app-body">
        <div class="isotope" >
            <div id="panel-custom2" class="panel panel-default magic-element isotope-item" >
                <div class="panel-heading bg-primary text-inverse bordered-none">
                    <div class="panel-icon"><i class="icon ion-navicon-round"></i></div>
                    <div class="panel-actions">
                        <a role="button" data-refresh="#panel-custom2" title="refresh" class="btn btn-sm btn-icon">
                            <i class="icon ion-refresh text-inverse"></i>
                        </a>
                        <a role="button" data-expand="#panel-custom2" title="expand" class="btn btn-sm btn-icon">
                            <i class="icon ion-arrow-resize text-inverse"></i>
                        </a>
                        <a role="button" data-collapse="#panel-custom2" title="collapse" class="btn btn-sm btn-icon">
                            <i class="icon ion-chevron-down text-inverse"></i>
                        </a>
                        <a role="button" data-close="#panel-custom2" title="close" class="btn btn-sm btn-icon">
                            <i class="icon ion-close-round text-inverse"></i>
                        </a>
                    </div><!-- /panel-actions -->
                    <h3 class="panel-title">Gestion de capitulos</h3>
                </div>
                <div class="panel-body bordered-none">
                    <form style="display:none;" class="form-horizontal" id="form_adm_capitulos" role="form">
                      
					  
					  <input type="text" style="display:none;" id="ca_idca" name="ca_idca" /><div class="form-group">
											<label class="col-sm-3 control-label">
												Nombre <span class="symbol required"></span>
											</label>
											<div class="col-sm-3">
												<input tabindex="1" type="text" class="tabcontrol form-control ca_nombre" id="ca_nombre" name="ca_nombre" />
											</div>
										</div>
                            
                            
                        </fieldset>
                    </form>

                    <div id="div_lista_adm_capitulos" class="table-responsive">                                       
                        
                        
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>




<!-- *** SHOW adm_capitulos *** -->
<div class="options-adm_capitulos hide">
    <div class="btn-group">
        <button class="btn dropdown-toggle btn-transparent-grey" data-toggle="dropdown">
            <i class="fa fa-cog"></i>
            <span class="caret"></span>
        </button>
        <ul role="menu" class="dropdown-menu dropdown-light pull-right">
            <li>
                <a  class="show-subviews nuevo-adm_capitulos" href="#newadm_capitulos" data-startFrom="right" >
                    <i class="fa fa-file-o"></i>       Nuevo
                </a>
            </li>

            <li>
                <a href="#newadm_capitulos" class="show-subviews edit-adm_capitulos">
                    <i class="fa fa-pencil"></i> Editar
                </a>
            </li>
            <li>
                <a href="#" class="eliminar-adm_capitulos">
                    <i class="fa fa-times"></i> Eliminar
                </a>
            </li>
            <li>
                <a href="#" class="auditoria-adm_capitulos">
                    <i class="fa fa-share"></i> Auditoria
                </a>
            </li>
        </ul>
    </div>
</div>


<script src="<?php echo BASE; ?>public/template/ministerio/js/funciones.js" type="text/javascript"></script>
<script src="<?php echo BASE; ?>public/template/ministerio/js/modulos/adm/js_adm_capitulos.js" type="text/javascript"></script>
