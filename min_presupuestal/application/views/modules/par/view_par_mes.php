
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


    table th {
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
        height: 26px;
        line-height: 25px;
        font-size: 13px;
        padding: 0 10px 0 12px;
        color: #999999;
        font-weight: normal;
        text-align: left;
        white-space: nowrap;
        overflow: hidden;
        -o-text-overflow: ellipsis;
        text-overflow: ellipsis;
        position: relative;
    }



</style>
<div class="content-app fixed-header">
    <!-- app header -->
    <div class="app-header">
        <div class="pull-right">
            <a class="btn btn-default" id="par_mes_listar" role="button">
                <i class="glyphicon glyphicon-list" ></i>
            </a>
            <a class="btn btn-default" id="par_mes_nuevo" role="button">
                <i class="glyphicon glyphicon-file" ></i>
            </a>
            <a class="btn btn-default" id="par_mes_eliminar" role="button">
                <i class="glyphicon glyphicon-trash" ></i>
            </a>
            <a class="btn btn-default" id="par_mes_guardar" role="button">
                <i class="glyphicon glyphicon-floppy-disk" ></i>
            </a>
        </div>
        <ol class="breadcrumb bg-none pull-left hide-xs">
            <li><a href="#">Procesos maestros</a></li>
            <li><a href="#">Calendarios</a></li>
            <li class="active">Meses</li>
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
                    <form style="display:none;" class="form-horizontal" id="form_par_mes" role="form">
                        <input style="display: none;" type="text" class="tabcontrol form-control" value="" 
                               id="me_idmes" name="me_idmes"/>
                        <fieldset>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="input">Codigo</label>
                                <div class="col-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon bg-peterriver">
                                            <i class="icon ion-ios7-calculator-outline"></i>
                                        </span>
                                        <input type="text" id="me_codigo" name="me_codigo"
                                               class="form-control" >
                                    </div>
                                </div>                                
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="input">Nombre</label>
                                <div class="col-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon bg-peterriver">
                                            <i class="icon ion-ios7-calculator-outline"></i>
                                        </span>
                                        <input type="text" id="me_nombre" name="me_nombre"
                                               class="form-control" >
                                    </div>
                                </div>                                
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="input">Orden</label>
                                <div class="col-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon bg-peterriver">
                                            <i class="icon ion-ios7-calculator-outline"></i>
                                        </span>
                                        <input type="text" id="me_orden" name="me_orden"
                                               class="form-control" >
                                    </div>
                                </div>                                
                            </div>




                        </fieldset>
                    </form>

                    <div id="div_lista_par_mes" class="table-responsive">                                       


                    </div>
                </div>
            </div>

        </div>
    </div>
</div>




<!-- *** SHOW ROLES *** -->
<div class="options-par_mes hide">
    <div class="btn-group">
        <button class="btn dropdown-toggle btn-transparent-grey" data-toggle="dropdown">
            <i class="fa fa-cog"></i>
            <span class="caret"></span>
        </button>
        <ul role="menu" class="dropdown-menu dropdown-light pull-right">
            <li>
                <a  class="show-subviews nuevo-par_mes" href="#newpar_mes" data-startFrom="right" >
                    <i class="fa fa-file-o"></i> Nuevo
                </a>
            </li>

            <li>
                <a href="#newpar_mes" class="show-subviews edit-par_mes">
                    <i class="fa fa-pencil"></i> Editar
                </a>
            </li>
            <li>
                <a href="#" class="eliminar-par_mes">
                    <i class="fa fa-times"></i> Eliminar
                </a>
            </li>
            <li>
                <a href="#" class="auditoria-par_mes">
                    <i class="fa fa-share"></i> Auditoria
                </a>
            </li>
        </ul>
    </div>
</div>


<script src="<?php echo BASE; ?>public/template/ministerio/js/funciones.js" type="text/javascript"></script>
<script src="<?php echo BASE; ?>public/template/ministerio/js/modulos/par/js_par_mes.js" type="text/javascript"></script>
