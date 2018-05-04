<?php
//        $pr = array();
//        if ($permisos != null) {
//            foreach ($permisos as $p) {
//                //$data[(int)$p->pe_idpermiso] = (int)$p->pe_idpermiso;
//                $pr[(string) $p->pe_nombre] = (int) $p->permitir;
//            }
//        }
//
//        if ($pr["ABRIR"]) {
				?>




<div id="newpar_ciudades" style="display: none"  >
    <div class="noteWrap col-md-8 col-md-offset-2">
        <form class="form-par_ciudades form-horizontal">
            <div class="row">
                <h2><i class="fa fa-pencil-square"></i> REGISTRO</h2>
                <p>
                    Gestion y creacion de par_ciudades
                </p><div class="form-group">
											<label class="col-sm-3 control-label">
												ci_departamento <span class="symbol required"></span>
											</label>
											<div class="col-sm-3">
												<input tabindex="1" type="text" class="tabcontrol form-control ci_departamento" id="ci_departamento" name="ci_departamento" />
											</div>
										</div><input type="text" style="display:none;" id="ci_idciudad" name="ci_idciudad" /><div class="form-group">
											<label class="col-sm-3 control-label">
												ci_nombre <span class="symbol required"></span>
											</label>
											<div class="col-sm-3">
												<input tabindex="2" type="text" class="tabcontrol form-control ci_nombre" id="ci_nombre" name="ci_nombre" />
											</div>
										</div>
            <div class="pull-right">
                <div class="btn-group">
                    <a href="javascript:onclick=ej()" class="btn btn-light-grey back-step btn-block close-subview-button">
                        <i class="fa fa-times fa fa-white"></i>   Cerrar
                    </a>
                </div>
                <div class="btn-group">
                    <button class="btn btn-primary back-step btn-block save-par_ciudades" type="submit">
                        <i class="glyphicon glyphicon-floppy-save"></i>   Guardar
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
</div>
<!--            </div>
        </div>-->
<!--</div>
</div>-->




<!-- *** SHOW ROLES *** -->
<div class="options-par_ciudades hide">
    <div class="btn-group">
        <button class="btn dropdown-toggle btn-transparent-grey" data-toggle="dropdown">
            <i class="fa fa-cog"></i>
            <span class="caret"></span>
        </button>
        <ul role="menu" class="dropdown-menu dropdown-light pull-right">
            <li>
                <a  class="show-subviews nuevo-par_ciudades" href="#newpar_ciudades" data-startFrom="right" >
                    <i class="fa fa-file-o"></i>       Nuevo
                </a>
            </li>

            <li>
                <a href="#newpar_ciudades" class="show-subviews edit-par_ciudades">
                    <i class="fa fa-pencil"></i> Editar
                </a>
            </li>
            <li>
                <a href="#" class="eliminar-par_ciudades">
                    <i class="fa fa-times"></i> Eliminar
                </a>
            </li>
            <li>
                <a href="#" class="auditoria-par_ciudades">
                    <i class="fa fa-share"></i> Auditoria
                </a>
            </li>
        </ul>
    </div>
</div>

<div class="panel panel-white">
    <div class="panel-heading border-light">
        <h4 class="panel-title">Fecha <span class="text-bold panel-time"><?php echo date("Y-m-d H:i:s"); ?></span></h4>
        <ul class="panel-heading-tabs border-light">
            <li>
                <div class="pull-right">
                    <div class="btn-group">
                        <a class="btn btn-green dropdown-toggle" data-toggle="dropdown" href="#">
                            <span class="fa fa-cogs"></span> <span class="caret"></span>
                        </a>
                        <ul role="menu" class="dropdown-menu">
                            <li class="dropdown-header" role="presentation">
                                Nuevo
                            </li>
                            <li>
                                <a  class="show-sv nuevo-par_ciudades" href="#newpar_ciudades" data-startFrom="right" >
                                    Nuevo rol
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Another action
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Something else here
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li class="dropdown-header" role="presentation">
                                Dropdown header
                            </li>
                            <li>
                                <a href="#">
                                    Separated link
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </li>
            <li>
                <div class="rate">
                    <i class="fa fa-caret-up text-green"></i><span class="value">1</span><span class="percentage">Mo</span>
                </div>
            </li>
            <li class="panel-tools">
                <div class="dropdown">
                    <a data-toggle="dropdown" class="btn btn-xs dropdown-toggle btn-transparent-grey">
                        <i class="fa fa-cog"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-light pull-right" role="menu">
                        <li>
                            <a class="panel-collapse collapses" href="#"><i class="fa fa-angle-up"></i> <span>Collapse</span> </a>
                        </li>
                        <li>
                            <a class="panel-refresh" href="#">
                                <i class="fa fa-refresh"></i> <span>Refresh</span>
                            </a>
                        </li>
                        <li>
                            <a class="panel-config" href="#panel-config" data-toggle="modal">
                                <i class="fa fa-wrench"></i> <span>Configurations</span>
                            </a>
                        </li>
                        <li>
                            <a class="panel-expand" href="#">
                                <i class="fa fa-expand"></i> <span>Fullscreen</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <a class="btn btn-xs btn-link panel-close" href="#">
                    <i class="fa fa-times"></i>
                </a>
            </li>
        </ul>
    </div>
    <div class="panel-body ">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12">                 
                    <div id="par_ciudades" class="highlight">

                    </div>
                </div>
            </div>
        </div>


    </div>
</div>
</div>


<script src="<?php echo BASE; ?>public/template/ministerio/js/funciones.js" type="text/javascript"></script>
<script src="<?php echo BASE; ?>public/template/ministerio/js/modulos/par/js_par_ciudades.js" type="text/javascript"></script>
