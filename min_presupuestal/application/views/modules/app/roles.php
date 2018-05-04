
<script>

    $(function () {

        var t = function () {
            $(".magic-layout").isotope("reLayout")
        };

        $('[data-toggle="tab"], [data-toggle="collapse"]').on("click", function () {
            var e = $(this),
                    n = e.attr("href");
            $(n).bind("transitionend webkitTransitionEnd oTransitionEnd MSTransitionEnd", function () {
                t()
            })
        });

        $(".panel [data-close]").on("click", function (e) {
            e.preventDefault();
            var t = $(this),
                    n = t.attr("data-close");
            $(n).hide(300, function () {
                $(".magic-layout").isotope("remove", $(this))
            })
        });
//    $(".panel-collapsed .panel-body").hide(100, t);
//    $(".panel-collapsed .table").hide(100, t);
//    $(".panel-collapsed .list-group").hide(100, t);
//    
        $(".panel [data-collapse]").on("click", function (e) {
            e.preventDefault();
            var n = $(this),
                    r = n.attr("data-collapse"),
                    i = $(r).children(".panel-body"),
                    s = $(r).children(".table"),
                    o = $(r).children(".list-group");
            $(r).toggleClass("panel-collapsed");
            $(i).slideToggle(200, t);
            $(s).slideToggle(200, t);
            $(o).slideToggle(200, t)
        });
        $('[data-toggle="panel-collapse"]').on("dblclick", function (e) {
            e.preventDefault();
            var n = $(this),
                    r = n.attr("data-panel"),
                    i = $(r).children(".panel-body"),
                    s = $(r).children(".table"),
                    o = $(r).children(".list-group");
            $(r).toggleClass("panel-collapsed");
            $(i).slideToggle(200, t);
            $(s).slideToggle(200, t);
            $(o).slideToggle(200, t)
        });
        $(".panel > .panel-heading > .panel-icon").on("dblclick", function (e) {
            e.preventDefault();
            var n = $(this),
                    r = n.parent().parent(),
                    i = r.children(".panel-body"),
                    s = r.children(".table"),
                    o = r.children(".list-group");
            r.toggleClass("panel-collapsed");
            i.slideToggle(200, t);
            s.slideToggle(200, t);
            o.slideToggle(200, t)
        });
        $(".panel [data-expand]").on("click", function (e) {
            e.preventDefault();
            var n = $(this),
                    r = n.attr("data-expand");
            $(r).toggleClass("expand");
            t();
        });

        $(".panel [data-refresh]").on("click", function (e) {
            e.preventDefault();
            var t = $(this),
                    n = t.attr("data-refresh");
            $(n).append('<div class="panel-progress"><div class="panel-spinner"></div></div>')
        });

        $(".close").on("click", function () {
            t();
        });

    });







</script>


<style>
    .controls > input,
    .controls > select,
    .controls > .row,
    .controls > .input-group,
    .controls > .form-group,
    .controls > .form-group > .input-group{
        margin-bottom: 15px;
    }



/* ---------------------------------------------- */
/* ############### 4.3 DataTables ############### */
/* ---------------------------------------------- */
table.dataTable {
  border: 1px solid #dee2e6;
  margin-bottom: 15px;
}
table.dataTable thead th, table.dataTable thead td {
  padding: 0.75rem;
  border-bottom: 1px solid #dee2e6;
  position: relative;
}
table.dataTable thead th.sorting::after, table.dataTable thead th.sorting_asc::after, table.dataTable thead th.sorting_desc::after, table.dataTable thead td.sorting::after, table.dataTable thead td.sorting_asc::after, table.dataTable thead td.sorting_desc::after {
  content: '';
  border: 4px solid transparent;
  border-top-color: #ced4da;
  position: absolute;
  z-index: 10;
  top: 22px;
  right: 8px;
}
table.dataTable thead th.sorting::before, table.dataTable thead th.sorting_asc::before, table.dataTable thead th.sorting_desc::before, table.dataTable thead td.sorting::before, table.dataTable thead td.sorting_asc::before, table.dataTable thead td.sorting_desc::before {
  content: '';
  border: 4px solid transparent;
  border-bottom-color: #ced4da;
  position: absolute;
  z-index: 10;
  top: 12px;
  right: 8px;
}
table.dataTable thead th.sorting_asc::before, table.dataTable thead td.sorting_asc::before {
  border-bottom-color: #17A2B8;
}
table.dataTable thead th.sorting_desc::after, table.dataTable thead td.sorting_desc::after {
  border-top-color: #17A2B8;
}
table.dataTable tbody th, table.dataTable tbody td {
  padding: 0.75rem;
}
table.dataTable.row-border tbody th, table.dataTable.row-border tbody td, table.dataTable.display tbody th, table.dataTable.display tbody td {
  border-top-color: #dee2e6;
}
table.dataTable.no-footer {
  border-bottom-color: #dee2e6;
}

.dataTables_length {
  padding-bottom: 10px;
}
.dataTables_length .select2-container {
  width: 60px;
  margin-left: 0;
  margin-right: 10px;
}

.dataTables_filter {
  padding-bottom: 10px;
  padding-right: 5px;
}

.dataTables_wrapper .dataTables_paginate .paginate_button {
  padding-top: 0.54rem;
  padding-bottom: 0.54rem;
  background-color: #e9ecef;
  border-color: transparent;
}
.dataTables_wrapper .dataTables_paginate .paginate_button:hover, .dataTables_wrapper .dataTables_paginate .paginate_button:focus {
  background-color: #ced4da;
  background-image: none;
  border-color: transparent;
  color: #343a40 !important;
}
.dataTables_wrapper .dataTables_paginate .paginate_button:active {
  box-shadow: none;
}
.dataTables_wrapper .dataTables_paginate .paginate_button.current, .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover, .dataTables_wrapper .dataTables_paginate .paginate_button.current:focus {
  background-color: #17A2B8;
  background-image: none;
  border-color: transparent;
  color: #fff !important;
}
.dataTables_wrapper .dataTables_paginate .paginate_button.disabled, .dataTables_wrapper .dataTables_paginate .paginate_button.disabled:hover, .dataTables_wrapper .dataTables_paginate .paginate_button.disabled:focus {
  background-color: #e9ecef;
  color: #adb5bd !important;
}

/* ############### RTL SUPPORT ############### */
.rtl table.dataTable thead th.sorting::after, .rtl table.dataTable thead th.sorting_asc::after, .rtl table.dataTable thead th.sorting_desc::after, .rtl table.dataTable thead td.sorting::after, .rtl table.dataTable thead td.sorting_asc::after, .rtl table.dataTable thead td.sorting_desc::after {
  right: auto;
  left: 8px;
}
.rtl table.dataTable thead th.sorting::before, .rtl table.dataTable thead th.sorting_asc::before, .rtl table.dataTable thead th.sorting_desc::before, .rtl table.dataTable thead td.sorting::before, .rtl table.dataTable thead td.sorting_asc::before, .rtl table.dataTable thead td.sorting_desc::before {
  right: auto;
  left: 8px;
}
.rtl .dataTables_length .select2-container {
  margin-right: 0;
  margin-left: 10px;
}
.rtl .dataTables_filter {
  padding-right: 0;
  padding-left: 5px;
}


</style>
<div class="content-app fixed-header">
    <!-- app header -->
    <div class="app-header">
        <div class="pull-right">
            <a class="btn btn-default" id="app_roles_listar" role="button">
                <i class="glyphicon glyphicon-list" ></i>
            </a>
            <a class="btn btn-default" id="app_roles_nuevo" role="button">
                <i class="glyphicon glyphicon-file" ></i>
            </a>
            <a class="btn btn-default" id="app_roles_eliminar" role="button">
                <i class="glyphicon glyphicon-trash" ></i>
            </a>
            <a class="btn btn-default" id="app_roles_guardar" role="button">
                <i class="glyphicon glyphicon-floppy-disk" ></i>
            </a>
        </div>
        <ol class="breadcrumb bg-none pull-left hide-xs">
            <li><a href="#">Procesos maestros</a></li>
            <li><a href="#">Calendarios</a></li>
            <li class="active">Años</li>
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
                    <h3 class="panel-title">Gestion de roles</h3>
                </div>
                <div class="panel-body bordered-none">
                    <form style="display:none;" class="form-horizontal" id="form_app_roles" role="form">
                        <input style="display: none;" type="text" class="tabcontrol form-control" value="" 
                               id="ro_idroles" name="ro_idroles"/>
                        <fieldset>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="input">Nombre</label>
                                <div class="col-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon bg-peterriver">
                                            <i class="icon ion-ios7-calculator-outline"></i>
                                        </span>
                                        <input type="text" id="ro_nombre" name="ro_nombre"
                                               class="form-control" >
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="inputTextarea">Descripcion</label>
                                <div class="col-sm-10">
                                    <textarea rows="3" id="ro_descripcion" name="ro_descripcion" class="form-control" id="inputTextarea"></textarea>
                                </div>
                                
                            </div>
                            
                            <div class="form-group" >
                                
                                <label class="col-sm-2 control-label" for="inputTextarea">Estado</label>
                                <div class="col-sm-10">
                   
                                                <input type="checkbox" name="switcher2" class="switcher-flat-checkbox" 
                                                       id="ro_estado" name="ro_estado" >
                                    
                                
                                    
                                </div>
                                
                                
                                
                                
                                
                            </div>
                            
                        </fieldset>
                    </form>

                    <div id="div_lista_app_roles" class="table-responsive">                                       
                        <!--                        <div id="app_roles" class="highlight">
                        
                                                </div>-->
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
</div><!-- /app body -->
</div>


<!-- *** SHOW ROLES *** -->
<div class="options-app_roles hide">
    <div class="btn-group">
        <button class="btn dropdown-toggle btn-transparent-grey" data-toggle="dropdown">
            <i class="fa fa-cog"></i>
            <span class="caret"></span>
        </button>
        <ul role="menu" class="dropdown-menu dropdown-light pull-right">
            <li>
                <a  class="show-subviews nuevo-app_roles" href="#newapp_roles" data-startFrom="right" >
                    <i class="fa fa-file-o"></i>       Nuevo
                </a>
            </li>

            <li>
                <a href="#newapp_roles" class="show-subviews edit-app_roles">
                    <i class="fa fa-pencil"></i> Editar
                </a>
            </li>
            <li>
                <a href="#" class="eliminar-app_roles">
                    <i class="fa fa-times"></i> Eliminar
                </a>
            </li>
            <li>
                <a href="#" class="auditoria-app_roles">
                    <i class="fa fa-share"></i> Auditoria
                </a>
            </li>
        </ul>
    </div>
</div>


<script src="<?php echo BASE; ?>public/template/ministerio/js/funciones.js" type="text/javascript"></script>
<script src="<?php echo BASE; ?>public/template/ministerio/js/modulos/app/js_app_roles.js" type="text/javascript"></script>
