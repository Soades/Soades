

			
			
			
			<div class="content-app fixed-header">
    <!-- app header -->
    <div class="app-header">
        <div class="pull-right">
            <a class="btn btn-default" id="adm_resoluciones_listar" role="button">
                <i class="glyphicon glyphicon-list" ></i>
            </a>
            <a class="btn btn-default" id="adm_resoluciones_nuevo" role="button">
                <i class="glyphicon glyphicon-file" ></i>
            </a>
            <a class="btn btn-default" id="adm_resoluciones_eliminar" role="button">
                <i class="glyphicon glyphicon-trash" ></i>
            </a>
            <a class="btn btn-default" id="adm_resoluciones_guardar" role="button">
                <i class="glyphicon glyphicon-floppy-disk" ></i>
            </a>
        </div>
        <ol class="breadcrumb bg-none pull-left hide-xs">
            <li><a href="#">Procesos maestros</a></li>
            <li><a href="#">Calendarios</a></li>
            <li class="active">adm_resoluciones</li>
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
                    <h3 class="panel-title">Gestion de meses</h3>
                </div>
                <div class="panel-body bordered-none">
                    <form style="display:none;" class="form-horizontal" id="form_adm_resoluciones" role="form">
                      
					  
					  <input type="text" style="display:none;" id="re_idre" name="re_idre" /><div class="form-group">
											<label class="col-sm-3 control-label">
												re_numero <span class="symbol required"></span>
											</label>
											<div class="col-sm-3">
												<input tabindex="1" type="text" class="tabcontrol form-control re_numero" id="re_numero" name="re_numero" />
											</div>
										</div><div class="form-group">
											<label class="col-sm-3 control-label">
												re_concepto <span class="symbol required"></span>
											</label>
											<div class="col-sm-3">
												<input tabindex="3" type="text" class="tabcontrol form-control re_concepto" id="re_concepto" name="re_concepto" />
											</div>
										</div>
                            
                            
                        </fieldset>
                    </form>

                    <div id="div_lista_adm_resoluciones" class="table-responsive">                                       
                        
                        
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>




<!-- *** SHOW adm_resoluciones *** -->
<div class="options-adm_resoluciones hide">
    <div class="btn-group">
        <button class="btn dropdown-toggle btn-transparent-grey" data-toggle="dropdown">
            <i class="fa fa-cog"></i>
            <span class="caret"></span>
        </button>
        <ul role="menu" class="dropdown-menu dropdown-light pull-right">
            <li>
                <a  class="show-subviews nuevo-adm_resoluciones" href="#newadm_resoluciones" data-startFrom="right" >
                    <i class="fa fa-file-o"></i>       Nuevo
                </a>
            </li>

            <li>
                <a href="#newadm_resoluciones" class="show-subviews edit-adm_resoluciones">
                    <i class="fa fa-pencil"></i> Editar
                </a>
            </li>
            <li>
                <a href="#" class="eliminar-adm_resoluciones">
                    <i class="fa fa-times"></i> Eliminar
                </a>
            </li>
            <li>
                <a href="#" class="auditoria-adm_resoluciones">
                    <i class="fa fa-share"></i> Auditoria
                </a>
            </li>
        </ul>
    </div>
</div>


<script src="<?php echo BASE; ?>public/template/ministerio/js/funciones.js" type="text/javascript"></script>
<script src="<?php echo BASE; ?>public/template/ministerio/js/modulos/adm/js_adm_resoluciones.js" type="text/javascript"></script>
