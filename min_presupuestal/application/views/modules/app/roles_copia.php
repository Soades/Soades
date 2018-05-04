
<!--
<div class="subviews" >
    <div class="subviews-container">-->
<!--        <div id="new-roles"  >
            <div class="col-md-10">
                                <h3>Text in Subview</h3>
                                <p>
                                    Duis mollis, est non commodo luctus, nisi erat porttitor ligula.
                                </p>-->
<div id="newRoles" style="display: none"  >
    <div class="noteWrap col-md-8 col-md-offset-2">
        <form class="form-roles form-horizontal">
            <div class="row">
                <h2><i class="fa fa-pencil-square"></i> REGISTRO</h2>
                <p>
                    Gestion y creacion de roles
                </p>
                <input id="ro_idroles" name="ro_idroles" class="ro_idroles hide" type="text"/>
                <div class="form-group">
                    <label class="col-sm-3 control-label">
                        Nombre <span class="symbol required"></span>
                    </label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control ro_nombre" id="ro_nombre" name="ro_nombre" placeholder="Nombre del rol"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">
                        Descripcion <span class="symbol required"></span>
                    </label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="ro_descripcion" name="ro_descripcion" placeholder="Descripcion del rol"/>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">
                        Estado <span class="symbol required"></span>
                    </label>
                    <div class="col-sm-7">

                        <div class="checkbox">
                            <label>
                                <input type="checkbox" class="grey" value="" name="ro_estado"  id="ro_estado"/>

                            </label>
                        </div>
                    </div>
                </div>


            </div>
            <div class="pull-right">
                <div class="btn-group">
                    <a href="javascript:onclick=ej()" class="btn btn-light-grey back-step btn-block close-subview-button">
                        <i class="fa fa-times fa fa-white"></i>   Cerrar
                    </a>
                </div>
                <div class="btn-group">
                    <button class="btn btn-primary back-step btn-block save-rol" type="submit">
                        <i class="glyphicon glyphicon-floppy-save"></i>   Guardar
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
<!--            </div>
        </div>-->
<!--</div>
</div>-->
<style>


</style>
<script>
    var oTableapp_roles;
            var col_app_roles;
            var fn_app_roles = function () {
            var app_rolesManager = {
            // Returns the url of the application server of a demo web app.
            base: function () {
            return Routers.url;
            },
                    crud: function () {
                    return {
                    buscarId: function (id) {
                    $.ajax({
                    url: Routers.url + "index.php/modules/app/app_roles/get_by_id",
                            cache: false,
                            dataType: "json",
                            data: ({
                            ro_idroles: id
                            }),
                            success: function (data) {
                            app_rolesManager.pac(data);
                            }
                    });
                    },
                            guardar: function () {
                            $.blockUI({
                            message: "<i class='fa fa-spinner fa-spin'></i>Enviendo peticion ..."
                            });
                                    $.ajax({
                                    url: app_rolesManager.base() + "index.php/modules/app/app_roles/create",
                                            data: (app_rolesManager.coleccion()),
                                            type: "post",
                                            dataType: "json",
                                            cache: false,
                                            async: false,
                                            success: function (data) {
                                            $.unblockUI();
                                                    if (data.result == "success") {
                                            showapp_roles();
                                                    app_rolesManager.destroyDataTable();
                                            }
                                            toastr.success(data.content);
                                            },
                                            complete: function () {
                                            //  $(".containerBlock > form").waitMe("hide");                  
                                            setInterval(function () {

                                            }, 2000);
                                            },
                                    });
                            },
                            editar: function () {
                            $.blockUI({
                            message: "<i class='fa fa-spinner fa-spin'></i>Enviendo peticion ..."
                            });
                                    $.ajax({
                                    url: app_rolesManager.base() + "index.php/modules/app/app_roles/update",
                                            data: (app_rolesManager.coleccion()),
                                            type: "post",
                                            dataType: "json",
                                            cache: false,
                                            async: false,
                                            success: function (data) {
                                            $.unblockUI();
                                                    if (data.result == "success") {
                                            showapp_roles();
                                                    app_rolesManager.destroyDataTable();
                                            }
                                            toastr.success(data.content);
                                            },
                                            complete: function () {
                                            //  $(".containerBlock > form").waitMe("hide");                  
                                            setInterval(function () {

                                            }, 2000);
                                            },
                                    });
                            },
                            eliminar: function (id) {

                            $.blockUI({
                            message: "<i class='fa fa-spinner fa-spin'></i> En ejecucion..."
                            });
                                    $.ajax({
                                    url: Routers.url + "index.php/modules/app/app_roles/delete",
                                            type: "post",
                                            dataType: "json",
                                            data: ({
                                            "ro_idroles": id
                                            }),
                                            success: function (data) {
                                            $.unblockUI();
                                                    if (data.result == "success") {
                                            toastr.success(data.content);
                                                    showapp_roles();
                                                    app_rolesManager.destroyDataTable();
                                            }
                                            }
                                    });
                            },
                            listar: function (options) {


                            }
                    }
                    },
                    pac: function (data) {

                    $(".form-app_roles .help-block").remove();
                            $(".form-app_roles .form-group").removeClass("has-error").removeClass("has-success");
                            $(".form-app_roles input").removeClass("input-llenos");
                            if (typeof data == "undefined" || data == null) {
                    $("#ro_idroles").val("");
                            $("#ro_nombre").val("");
                            $("#ro_descripcion").val("");
                            $("#ro_estado").iCheck("uncheck");
                    } else {
                    $(".form-app_roles input").addClass("input-llenos");
                            $("#ro_idroles").val(data.ro_idroles);
                            $("#ro_nombre").val(data.ro_nombre);
                            $("#ro_descripcion").val(data.ro_descripcion);
                            $("#ro_estado").iCheck((data.ro_estado == 1) ? "check" : "uncheck");
                    }

                    },
                    // listamos los registros
                    listas_refresh: function () {

                    },
                    listas: function () {

                    $.ajax({
                    type: "GET",
                            url: Routers.url + "index.php/modules/app/app_roles/get_all",
                            dataType: "json",
                            cache: !0,
                            success: function (data) {

                            $("#app_roles").append("<table class="table table - striped table - bordered table - full - width" id="datatable_app_roles"></table>");
                                    //        $("#app_roles").append("<table class="table table-striped" id="example"></table>");
                                    oTableapp_roles = $("#datatable_app_roles").dataTable({
                            "bProcessing": true,
                                    "iDisplayLength": 7,
                                    "aLengthMenu": [[1, 5, 6, 7, 8, 10, 15, 20, - 1], [1, 5, 6, 7, 8, 9, 10, 15, 20, "All"]], // change per page values here
                                    "oLanguage": {
                                    "sLengthMenu": "_MENU_",
                                            "sSearch": "",
                                            "oPaginate": {
                                            "sPrevious": "",
                                                    "sNext": ""
                                            }
                                    },
                                    "fnRowCallback": function (nRow, aData, iDisplayIndex) {

                                    /* Append the grade to the default row class name */
                                    //alert(aData)
                                    $("#datatable_app_roles_wrapper .dataTables_filter input").addClass("form-control").attr("placeholder", "Buscar...");
                                            // modify table search input

                                            // modify table per page dropdown
                                            //$("#datatable_app_roles .dataTables_length select").selectpicker();
                                            $("td:eq(3)", nRow).html("<label class="flat - grey foocheck"><input " + (aData.ro_estado == 1 ? "checked" : "") + " type="checkbox" value="" class="grey"></label>");
                                            var rolesIndex = aData.ro_idroles;
                                            $("td:eq(4)", nRow).empty();
                                            $(".options-app_roles").children().clone().appendTo($("td:eq(4)", nRow)).find(".edit-app_roles").attr("data-id", app_rolesIndex).off().on("click", function () {

                                    subViewElement = $(this);
                                            subViewContent = subViewElement.attr("href");
                                            var id = subViewElement.data("id");
                                            $.subview({
                                            content: subViewContent,
                                                    onShow: function () {

                                                    }
                                            });
                                            app_rolesManager.crud().buscarId(id);
                                    }).end().find(".eliminar-app_roles").data("id", rolesIndex).off().on("click", function () {
                                    var target_row = $(this).closest("tr").get(0);
                                            var id = $(this).data("id");
                                            bootbox.confirm("Desea eliminar este registro?", function (result) {
                                            app_rolesManager.crud().eliminar(id);
                                            });
                                    }).end().find(".nuevo-app_roles").off().on("click", function () {
                                    subViewElement = $(this);
                                            subViewContent = subViewElement.attr("href");
                                            $.subview({
                                            content: subViewContent,
                                                    onShow: function () {
                                                    $("#ro_nombre").focus();
                                                    }
                                            });
                                    });
                                    },
                                    "aaData": data,
                                    "aoColumns": [
                                    {"mDataProp": "ro_idroles", "sTitle": "ID", "bSortable": false}, 
                                    {"mDataProp": "ro_idroles", "sTitle": "ro_idroles", "bSortable": false},
                                    {"mDataProp": "ro_nombre", "sTitle": "ro_nombre", "bSortable": false}, 
                                    {"mDataProp": "ro_descripcion", "sTitle": "ro_descripcion", "bSortable": false}, 
                                    {"mDataProp": "ro_estado", "sTitle": "ro_estado", "bSortable": false},
                                    ],
                                    "aoColumnDefs": [{
                                    bSortable: false,
                                            aTargets: [0, - 1]
                                    }],
//                    "aaSorting": [
//                        [0, "asc"]
//                    ]
                            });
                                    $("input[type="checkbox"].grey, input[type="radio"].grey").iCheck({
                            checkboxClass: "icheckbox_minimal-grey",
                                    radioClass: "iradio_minimal-grey",
                                    increaseArea: "10%" // optional
                            });
                                    $("#datatable_app_roles tbody").on("click", "tr", function () {

                            if ($(this).hasClass("selected")) {
                            $(this).removeClass("selected");
                            }
                            else {
                            oTable.$("tr.selected").removeClass("selected");
                                    $(this).addClass("selected");
                            }
                            });
                            },
                            async: !0
                    });
                    },
                    buscarIdContextMenu: function (id) {
                    $.ajax({
                    url: app_rolesManager.base() + "index.php/modules/app/app_roles/get_by_id",
                            cache: false,
                            dataType: "json",
                            data: ({
                            "ro_idroles": id
                            }),
                            success: function (data) {
                            app_rolesManager.pac(data);
                            }
                    });
                    },
                    buscarId: function (id) {
                    //var data = app_rolesManager.crud().buscarId(id);
                    $.ajax({
                    url: app_rolesManager.base() + "index.php/modules/app/app_roles/get_by_id",
                            cache: false,
                            dataType: "json",
                            data: ({
                            ro_idroles: id
                            }),
                            success: function (data) {
                            app_rolesManager.pac(data);
                            }
                    });
                    },
                    pac_coleccion: function (data) {
                    return {
                    ro_idroles:$("#ro_idroles").val(),
                            ro_nombre:$("#ro_nombre").val(),
                            ro_descripcion:$("#ro_descripcion").val(),
                            ro_estado:$("#ro_estado").is(":checked") ? 1 : 0,
                    };
                    },
                    coleccion: function () {
                    return {
                    ro_idroles:$("#ro_idroles").val(),
                            ro_nombre:$("#ro_nombre").val(),
                            ro_descripcion:$("#ro_descripcion").val(),
                            ro_estado:$("#ro_estado").is(":checked") ? 1 : 0,
                    };
                    },
                    eliminar: function () {
                    if (app_rolesManager.coleccion().ro_idroles != "")
                            app_rolesManager.crud.eliminar(app_rolesManager.coleccion());
                    },
                    eliminarContexMenu: function (id) {
                    $.ajax({
                    url: app_rolesManager.base() + "index.php/modules/app/app_roles/get_by_id",
                            cache: false,
                            dataType: "json",
                            data: ({
                            ro_idroles: id
                            }),
                            success: function (data) {
                            if (data != null) {
                            app_rolesManager.crud().eliminar(data);
                            }
                            }
                    });
                    },
                    clickSubvistaClose: function () {
                    $(".show-sv").on("click", function (e) {
                    subViewElement = $(this);
                            var customOptions = new Object;
                            customOptions.content = subViewElement.attr("href");
                            customOptions.startFrom = subViewElement.data("startfrom"),
                            customOptions.onShow = subViewElement.data("onshow"),
                            customOptions.onHide = subViewElement.data("onhide"),
                            customOptions.onClose = subViewElement.data("onclose");
                            $.subview(customOptions);
                            e.preventDefault();
                    });
                    },
                    destroyDataTable: function ()
                    {
                    if (oTable != null)
                            oTable.fnDestroy();
                            //Remove all the DOM elements
                            $("#datatable_app_roles").remove();
                    },
                    nuevo: function () {

                    $("#ro_nombre").focus();
                            $("#ro_idroles").val("");
                            $("#ro_nombre").val("");
                            $("#ro_descripcion").val("");
                            $("#ro_estado").val("");
                            $("#app_roles_guardar").prop("disabled", false);
                            $("#app_roles_listar").prop("disabled", false);
                            $("#app_roles_eliminar").prop("disabled", false);
                            $("#window_permisos input,select").removeClass("input-active-form");
                            $("#app_roles_table_tbody tbody tr").removeClass("active");
                    },
                    guardar: function () {
                    $("#app_roles_guardar").attr("disabled", true).html("<i class="fa fa - refresh fa - spin"></i> Procesando...");
                            var requestType = app_rolesManager.coleccion().ro_idroles == "" ? "create" : "update";
                            if (requestType == "create")
                            app_rolesManager.crud().guardar();
                            else
                            app_rolesManager.crud().editar();
                    },
                    runFormValidation: function (el) {

                    var formapp_roles = $(".form-app_roles");
                            formRoles.validate({
                            errorElement: "span", // contain the error msg in a span tag
                                    errorClass: "help-block",
                                    rules: {
                                    ro_nombre: {
                                    required: true,
                                            maxlength: 100,
                                            digits: false,
                                            number: false,
                                    },
                                    },
                                    messages: {
                                    ro_idroles: {
                                    required: "El campo es requerido",
                                            digits: "El campo acepta solo numeros",
                                    },
                                            ro_idroles: {
                                            required: "El campo es requerido",
                                                    digits: "El campo acepta solo numeros",
                                            },
                                            ro_nombre: {
                                            required: "El campo es requerido",
                                                    maxlength: "El maximo de caracteres para el campo es 100 ",
                                            },
                                            ro_descripcion: {
                                            required: "El campo es requerido",
                                                    maxlength: "El maximo de caracteres para el campo es 255 ",
                                            },
                                            ro_estado: {
                                            required: "El campo es requerido",
                                                    digits: "El campo acepta solo numeros",
                                            },
                                    },
                                    submitHandler: function (form) {

                                    var requestType = App_rolesManager.coleccion().ro_idroles == "" ? "create" : "update";
                                            if (requestType == "create")
                                            app_rolesManager.crud().guardar();
                                            else
                                            app_rolesManager.crud().editar();
                                    }
                            });
                    }

            };
                    return {
                    init: function () {
                    app_rolesManager.clickSubvistaClose(), app_rolesManager.runFormValidation(), app_rolesManager.listas()
                    }
                    }

            }();
            $(document).ready(function () {
    fn_app_roles.init();
    });

</script>



<!-- *** SHOW ROLES *** -->
<div class="options-roles hide">
    <div class="btn-group">
        <button class="btn dropdown-toggle btn-transparent-grey" data-toggle="dropdown">
            <i class="fa fa-cog"></i>
            <span class="caret"></span>
        </button>
        <ul role="menu" class="dropdown-menu dropdown-light pull-right">
            <li>
                <a  class="show-subviews nuevo-roles" href="#newRoles" data-startFrom="right" >
                    <i class="fa fa-file-o"></i>       Nuevo
                </a>
            </li>

            <li>
                <a href="#newRoles" class="show-subviews edit-roles">
                    <i class="fa fa-pencil"></i> Editar
                </a>
            </li>
            <li>
                <a href="#" class="eliminar-roles">
                    <i class="fa fa-times"></i> Eliminar
                </a>
            </li>
            <li>
                <a href="#" class="auditoria-roles">
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
                                <a  class="show-sv" href="#newRoles" data-startFrom="right" >
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
                    <div id="roles" class="highlight">

                    </div>
                </div>
            </div>
        </div>


    </div>
</div>
</div>
