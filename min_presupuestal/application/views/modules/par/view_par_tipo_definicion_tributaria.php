 




			<div class="content-app fixed-header">
    <!-- app header -->
    <div class="app-header">
        <div class="pull-right">
            <a class="btn btn-default" id="par_tipo_definicion_tributaria_listar" role="button">
                <i class="glyphicon glyphicon-list" ></i>
            </a>
            <a class="btn btn-default" id="par_tipo_definicion_tributaria_nuevo" role="button">
                <i class="glyphicon glyphicon-file" ></i>
            </a>
            <a class="btn btn-default" id="par_tipo_definicion_tributaria_eliminar" role="button">
                <i class="glyphicon glyphicon-trash" ></i>
            </a>
            <a class="btn btn-default" id="par_tipo_definicion_tributaria_guardar" role="button">
                <i class="glyphicon glyphicon-floppy-disk" ></i>
            </a>
        </div>
        <ol class="breadcrumb bg-none pull-left hide-xs">
            <li><a href="#">Procesos maestros</a></li>
            <li><a href="#">Calendarios</a></li>
            <li class="active">par_tipo_definicion_tributaria</li>
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
                    <form style="display:none;" class="form-horizontal" id="form_par_tipo_definicion_tributaria" role="form">
                      
					  
					  <input type="text" style="display:none;" id="tdt_idtdt" name="tdt_idtdt" /><div class="form-group">
											<label class="col-sm-3 control-label">
												tdt_descripcion <span class="symbol required"></span>
											</label>
											<div class="col-sm-3">
												<input tabindex="2" type="text" class="tabcontrol form-control tdt_descripcion" id="tdt_descripcion" name="tdt_descripcion" />
											</div>
										</div><div class="form-group">
											<label class="col-sm-3 control-label">
												Estado <span class="symbol required"></span>
											</label>
											<div class="col-sm-7">

												<div class="checkbox">
													<label>
														<input tabindex="3" type="checkbox" class="tabcontrol grey" value="" id="tdt_anulado" name="tdt_anulado"/>

													</label>
												</div>
											</div>
										</div>
                            
                            
                        </fieldset>
                    </form>

                    <div id="div_lista_par_tipo_definicion_tributaria" class="table-responsive">                                       
                        
                        
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>




<!-- *** SHOW par_tipo_definicion_tributaria *** -->
<div class="options-par_tipo_definicion_tributaria hide">
    <div class="btn-group">
        <button class="btn dropdown-toggle btn-transparent-grey" data-toggle="dropdown">
            <i class="fa fa-cog"></i>
            <span class="caret"></span>
        </button>
        <ul role="menu" class="dropdown-menu dropdown-light pull-right">
            <li>
                <a  class="show-subviews nuevo-par_tipo_definicion_tributaria" href="#newpar_tipo_definicion_tributaria" data-startFrom="right" >
                    <i class="fa fa-file-o"></i>       Nuevo
                </a>
            </li>

            <li>
                <a href="#newpar_tipo_definicion_tributaria" class="show-subviews edit-par_tipo_definicion_tributaria">
                    <i class="fa fa-pencil"></i> Editar
                </a>
            </li>
            <li>
                <a href="#" class="eliminar-par_tipo_definicion_tributaria">
                    <i class="fa fa-times"></i> Eliminar
                </a>
            </li>
            <li>
                <a href="#" class="auditoria-par_tipo_definicion_tributaria">
                    <i class="fa fa-share"></i> Auditoria
                </a>
            </li>
        </ul>
    </div>
</div>


<script src="<?php echo BASE; ?>public/template/ministerio/js/funciones.js" type="text/javascript"></script>
<script src="<?php echo BASE; ?>public/template/ministerio/js/modulos/par/js_par_tipo_definicion_tributaria.js" type="text/javascript"></script>
