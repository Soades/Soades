var oTableapp_usuarios;
var col_app_usuarios;
var fn_app_usuarios = function () {
    var app_usuariosManager = {
        // Returns the url of the application server of a demo web app.
        base: function () {
            return Routers.url;
        },
        crud: function () {
            return {
                buscarId: function (id) {
                    $.ajax({
                        url: Routers.url + "index.php/modules/app/app_usuarios/get_by_id",
                        cache: false,
                        dataType: "json",
                        data: ({
                            us_idusuario: id
                        }),
                        success: function (data) {
                            app_usuariosManager.pac(data);
                        }
                    });
                },
                guardar: function () {
                    $.blockUI({
                        message: "<i class='fa fa-spinner fa-spin'></i>Enviendo peticion ..."
                    });
                    $.ajax({
                        url: app_usuariosManager.base() + "index.php/modules/app/app_usuarios/create",
                        data: (app_usuariosManager.coleccion()),
                        type: "post",
                        dataType: "json",
                        cache: false,
                        async: false,
                        success: function (data) {
                            $.unblockUI();
                            if (data.result == "success") {
                                app_usuariosManager.listas();
                                app_usuariosManager.destroyDataTable();
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
                        url: app_usuariosManager.base() + "index.php/modules/app/app_usuarios/update",
                        data: (app_usuariosManager.coleccion()),
                        type: "post",
                        dataType: "json",
                        cache: false,
                        async: false,
                        success: function (data) {
                            $.unblockUI();
                            if (data.result == "success") {
                                app_usuariosManager.listas();
                                app_usuariosManager.destroyDataTable();
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
                        url: Routers.url + "index.php/modules/app/app_usuarios/delete",
                        type: "post",
                        dataType: "json",
                        data: ({
                            "us_idusuario": id
                        }),
                        success: function (data) {
                            $.unblockUI();
                            if (data.result == "success") {
                                toastr.success(data.content);
                                app_usuariosManager.listas();
                                app_usuariosManager.destroyDataTable();
                            }
                        }
                    });

                },
                listar: function (options) {


                }
            }
        },
        pac: function (data) {

            $(".form-app_usuarios .help-block").remove();
            $(".form-app_usuarios .form-group").removeClass("has-error").removeClass("has-success");
            $(".form-app_usuarios input").removeClass("input-llenos");
            if (typeof data == "undefined" || data == null) {
                $("#us_idusuario").val("");
                $("#us_roles").iCheck("uncheck");
                $("#us_usuario").val("");
                $("#us_clave").val("");
                $("#us_active").iCheck("uncheck");
                $("#us_conectado").iCheck("uncheck");
                $("#us_ultimo_acceso").iCheck("uncheck");
                $("#us_tercero").val("");
                $("#us_email").val("");
                $("#remember_code").val("");

            } else {
                $(".form-app_usuarios input").addClass("input-llenos");
                $("#us_idusuario").val(data.us_idusuario);
                $("#us_roles").iCheck((data.us_roles == 1) ? "check" : "uncheck");
                $("#us_usuario").val(data.us_usuario);
                $("#us_clave").val(data.us_clave);
                $("#us_active").iCheck((data.us_active == 1) ? "check" : "uncheck");
                $("#us_conectado").iCheck((data.us_conectado == 1) ? "check" : "uncheck");
                $("#us_ultimo_acceso").iCheck((data.us_ultimo_acceso == 1) ? "check" : "uncheck");
                $("#us_tercero").val(data.us_tercero);
                $("#us_email").val(data.us_email);
                $("#remember_code").val(data.remember_code);


            }

        },
        // listamos los registros
        listas_refresh: function () {

        },
        listas: function () {

            $.ajax({
                type: "GET",
                url: Routers.url + "index.php/modules/app/app_usuarios/get_all",
                dataType: "json",
                cache: !0,
                success: function (data) {

                    $("#app_usuarios").append("<table class='table table-striped table-bordered table-full-width' id='datatable_app_usuarios'></table>");

                    oTableapp_usuarios = $("#datatable_app_usuarios").dataTable({
                        "bProcessing": true,
                        "iDisplayLength": 7,
                        "aLengthMenu": [[1, 5, 6, 7, 8, 10, 15, 20, -1], [1, 5, 6, 7, 8, 9, 10, 15, 20, "All"]], // change per page values here
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
                            $("#datatable_app_usuarios_wrapper .dataTables_filter input").addClass("form-control").attr("placeholder", "Buscar...");
                            // modify table search input

                            // modify table per page dropdown
                            //$("#datatable_app_usuarios .dataTables_length select").selectpicker();



                            var app_usuariosIndex = aData.us_idusuario;
                            $("td:eq(10)", nRow).empty();
                            $(".options-app_usuarios").children().clone().appendTo($("td:eq(4)", nRow)).find(".edit-app_usuarios").attr("data-id", app_usuariosIndex).off().on("click", function () {

                                subViewElement = $(this);
                                subViewContent = subViewElement.attr("href");
                                var id = subViewElement.data("id");
                                $.subview({
                                    content: subViewContent,
                                    onShow: function () {

                                    }
                                });

                                app_usuariosManager.crud().buscarId(id);

                            }).end().find(".eliminar-app_usuarios").data("id", app_usuariosIndex).off().on("click", function () {
                                var target_row = $(this).closest("tr").get(0);
                                var id = $(this).data("id");
                                bootbox.confirm("Desea eliminar este registro?", function (result) {
                                    app_usuariosManager.crud().eliminar(id);
                                });
                            }).end().find(".nuevo-app_usuarios").off().on("click", function () {
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
                            {"mDataProp": "us_idusuario", "sTitle": "ID", "bSortable": false},
                            {"mDataProp": "us_roles", "sTitle": "us_roles", "bSortable": false},
                            {"mDataProp": "us_usuario", "sTitle": "us_usuario", "bSortable": false},
                            {"mDataProp": "us_clave", "sTitle": "us_clave", "bSortable": false},
                            {"mDataProp": "us_active", "sTitle": "us_active", "bSortable": false},
                            {"mDataProp": "us_conectado", "sTitle": "us_conectado", "bSortable": false},
                            {"mDataProp": "us_ultimo_acceso", "sTitle": "us_ultimo_acceso", "bSortable": false},
                            {"mDataProp": "us_tercero", "sTitle": "us_tercero", "bSortable": false},
                            {"mDataProp": "us_email", "sTitle": "us_email", "bSortable": false},
                            {"mDataProp": "remember_code", "sTitle": "remember_code", "bSortable": false},
                            {"mDataProp": "us_idusuario", "sTitle": "Options", "sClass": "center"}
                        ],
                        "aoColumnDefs": [{
                                bSortable: false,
                                aTargets: [0, -1]
                            }],
//                    "aaSorting": [
//                        [0, "asc"]
//                    ]
                    });


                    $("input[type='checkbox'].grey, input[type='radio'].grey").iCheck({
                        checkboxClass: "icheckbox_minimal-grey",
                        radioClass: "iradio_minimal-grey",
                        increaseArea: "10%" // optional
                    });

                    $("#datatable_app_usuarios tbody").on("click", "tr", function () {

                        if ($(this).hasClass("selected")) {
                            $(this).removeClass("selected");
                        }
                        else {
                            oTableapp_usuarios.$("tr.selected").removeClass("selected");
                            $(this).addClass("selected");
                        }
                    });

                },
                async: !0
            });

        },
        buscarIdContextMenu: function (id) {
            $.ajax({
                url: app_usuariosManager.base() + "index.php/modules/app/app_usuarios/get_by_id",
                cache: false,
                dataType: "json",
                data: ({
                    "ro_idroles": id
                }),
                success: function (data) {
                    app_usuariosManager.pac(data);
                }
            });
        },
        buscarId: function (id) {
            //var data = app_usuariosManager.crud().buscarId(id);
            $.ajax({
                url: app_usuariosManager.base() + "index.php/modules/app/app_usuarios/get_by_id",
                cache: false,
                dataType: "json",
                data: ({
                    us_idusuario: id
                }),
                success: function (data) {
                    app_usuariosManager.pac(data);
                }
            });

        },
        pac_coleccion: function (data) {
            return {
                us_idusuario: $("#us_idusuario").val(),
                us_roles: $("#us_roles").is(":checked") ? 1 : 0,
                us_usuario: $("#us_usuario").val(),
                us_clave: $("#us_clave").val(),
                us_active: $("#us_active").is(":checked") ? 1 : 0,
                us_conectado: $("#us_conectado").is(":checked") ? 1 : 0,
                us_ultimo_acceso: $("#us_ultimo_acceso").is(":checked") ? 1 : 0,
                us_tercero: $("#us_tercero").val(),
                us_email: $("#us_email").val(),
                remember_code: $("#remember_code").val(),
            };
        },
        coleccion: function () {
            return {
                us_idusuario: $("#us_idusuario").val(),
                us_roles: $("#us_roles").is(":checked") ? 1 : 0,
                us_usuario: $("#us_usuario").val(),
                us_clave: $("#us_clave").val(),
                us_active: $("#us_active").is(":checked") ? 1 : 0,
                us_conectado: $("#us_conectado").is(":checked") ? 1 : 0,
                us_ultimo_acceso: $("#us_ultimo_acceso").is(":checked") ? 1 : 0,
                us_tercero: $("#us_tercero").val(),
                us_email: $("#us_email").val(),
                remember_code: $("#remember_code").val(),
            };
        },
        eliminar: function () {
            if (app_usuariosManager.coleccion().us_idusuario != "")
                app_usuariosManager.crud.eliminar(app_usuariosManager.coleccion());
        },
        eliminarContexMenu: function (id) {
            $.ajax({
                url: app_usuariosManager.base() + "index.php/modules/app/app_usuarios/get_by_id",
                cache: false,
                dataType: "json",
                data: ({
                    us_idusuario: id
                }),
                success: function (data) {
                    if (data != null) {
                        app_usuariosManager.crud().eliminar(data);
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
            if (oTableapp_usuarios != null)
                oTableapp_usuarios.fnDestroy();
            //Remove all the DOM elements
            $("#datatable_app_usuarios").remove();

        },
        nuevo: function () {

            $("#ro_nombre").focus();
            $("#ro_idroles").val("");
            $("#ro_nombre").val("");
            $("#ro_descripcion").val("");
            $("#ro_estado").val("");
            $("#app_usuarios_guardar").prop("disabled", false);
            $("#app_usuarios_listar").prop("disabled", false);
            $("#app_usuarios_eliminar").prop("disabled", false);
            $("#window_permisos input,select").removeClass("input-active-form");
            $("#app_usuarios_table_tbody tbody tr").removeClass("active");
        },
        guardar: function () {
            $("#app_usuarios_guardar").attr("disabled", true).html("<i class='fa fa-refresh fa-spin'></i> Procesando...");
            var requestType = app_usuariosManager.coleccion().ro_idroles == "" ? "create" : "update";
            if (requestType == "create")
                app_usuariosManager.crud().guardar();
            else
                app_usuariosManager.crud().editar();
        },
        runFormValidation: function (el) {

            var formapp_usuarios = $(".form-app_usuarios");
            formapp_usuarios.validate({
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

                    var requestType = app_usuariosManager.coleccion().us_idusuario == "" ? "create" : "update";
                    if (requestType == "create")
                        app_usuariosManager.crud().guardar();
                    else
                        app_usuariosManager.crud().editar();

                }
            });

        }

    };

    return {
        init: function () {
            app_usuariosManager.clickSubvistaClose(), app_usuariosManager.runFormValidation(), app_usuariosManager.listas()
        }
    }

}();

$(document).ready(function () {
    fn_app_usuarios.init();
});