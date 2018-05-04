var oTableapp_modulo_permiso;
var col_app_modulo_permiso;
var fn_app_modulo_permiso = function () {
    var app_modulo_permisoManager = {
        // Returns the url of the application server of a demo web app.
        base: function () {
            return Routers.url;
        },
        crud: function () {
            return {
                buscarId: function (id) {
                    $.ajax({
                        url: Routers.url + "index.php/modules/app/app_modulo_permiso/get_by_id",
                        cache: false,
                        dataType: "json",
                        data: ({
                            mp_idmope: id
                        }),
                        success: function (data) {
                            app_modulo_permisoManager.pac(data);
                        }
                    });
                },
                guardar: function () {


                    $.ajax({
                        url: app_modulo_permisoManager.base() + "index.php/modules/app/app_modulo_permiso/create",
                        data: (app_modulo_permisoManager.coleccion()),
                        type: "post",
                        dataType: "json",
                        cache: false,
                        async: false,
                        success: function (data) {

                            if (data.result) {
                                app_modulo_permisoManager.listas();
                                app_modulo_permisoManager.destroyDataTable();
                            }



                            $.toast({
                                heading: data.title,
                                hideAfter: 4000,
                                text: [
                                    data.content
                                ],
                                position: 'top-center',
                                loaderBg: '#fd6558',
                                icon: data.type
                            });




                        },
                        complete: function () {
                            //  $(".containerBlock > form").waitMe("hide");                  
                            setInterval(function () {

                            }, 2000);
                        },
                    });

                },
                editar: function () {


                    $.ajax({
                        url: app_modulo_permisoManager.base() + "index.php/modules/app/app_modulo_permiso/update",
                        data: (app_modulo_permisoManager.coleccion()),
                        type: "post",
                        dataType: "json",
                        cache: false,
                        async: false,
                        success: function (data) {

                            if (data.result) {
                                app_modulo_permisoManager.listas();
                                app_modulo_permisoManager.destroyDataTable();
                            }


                            $.toast({
                                heading: data.title,
                                hideAfter: 4000,
                                text: [
                                    data.content
                                ],
                                position: 'top-center',
                                loaderBg: '#fd6558',
                                icon: data.type
                            });



                        },
                        complete: function () {
                            //  $(".containerBlock > form").waitMe("hide");                  
                            setInterval(function () {

                            }, 2000);
                        },
                    });

                },
                eliminar: function (id) {


                    $.ajax({
                        url: Routers.url + "index.php/modules/app/app_modulo_permiso/delete",
                        type: "post",
                        dataType: "json",
                        data: ({
                            "mp_idmope": id
                        }),
                        success: function (data) {

                            if (data.result) {


                                $.toast({
                                    heading: data.title,
                                    hideAfter: 4000,
                                    text: [
                                        data.content
                                    ],
                                    position: 'top-center',
                                    loaderBg: '#fd6558',
                                    icon: data.type
                                });



                                app_modulo_permisoManager.listas();
                                app_modulo_permisoManager.destroyDataTable();
                            }
                        }
                    });

                },
                listar: function (options) {


                }
            }
        },
        pac: function (data) {

            $("#div_lista_app_modulo_permiso").hide();
            $("#form_app_modulo_permiso").show("slow").siblings().hide(1000);

            if (typeof data == "undefined" || data == null) {
                $("#mp_idmope").val("");
                $("#mp_modulo_id").val("");
                $("#mp_permiso_id").val("");
            } else {

                $("#mp_idmope").val(data.mp_idmope);
                $("#mp_modulo_id").val(data.mp_modulo_id);
                $("#mp_permiso_id").val(data.mp_permiso_id);

            }

        },
        // listamos los registros
        listas_refresh: function () {

        },
        listas: function () {


            $("#app_modulo_permiso_adm_anio").show("slow").siblings().hide(1000);
            $("#app_modulo_permiso_adm_anio").hide();


            $.ajax({
                type: "GET",
                url: Routers.url + "index.php/modules/app/app_modulo_permiso/get_all",
                dataType: "json",
                cache: !0,
                success: function (data) {

                    $("#app_modulo_permiso").append("<table class='table table-striped table-bordered table-full-width' id='datatable_app_modulo_permiso'></table>");

                    oTableapp_modulo_permiso = $("#datatable_app_modulo_permiso").dataTable({
                        "bProcessing": true,
                        "bDestroy": true,
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

                            /* append the grade to the default row class name */
                            //alert(aData)
                            $("#datatable_app_modulo_permiso_wrapper .dataTables_filter input").addClass("form-control").attr("placeholder", "Buscar...");
                            // modify table search input

                            // modify table per page dropdown
                            //$("#datatable_app_modulo_permiso .dataTables_length select").selectpicker();

                            $("td:eq(2)", nRow).html('<label class="flat-grey foocheck"><input ' + (aData.ro_estado == 1 ? "checked" : "") + ' type="checkbox" value="" class="grey"></label>');
                            $("td:eq(3)", nRow).html('<label class="flat-grey foocheck"><input ' + (aData.ro_estado == 1 ? "checked" : "") + ' type="checkbox" value="" class="grey"></label>');

                            var app_modulo_permisoIndex = aData.mp_idmope;
                            $("td:eq(3)", nRow).empty();
                            $(".options-app_modulo_permiso").children().clone().appendTo($("td:eq(3)", nRow)).find(".edit-app_modulo_permiso").attr("data-id", app_modulo_permisoIndex).off().on("click", function () {

                                subViewElement = $(this);
                                subViewContent = subViewElement.attr("href");
                                var id = subViewElement.data("id");

                                app_modulo_permisoManager.crud().buscarId(id);

                            }).end().find(".eliminar-app_modulo_permiso").data("id", app_modulo_permisoIndex).off().on("click", function () {
                                var target_row = $(this).closest("tr").get(0);
                                var id = $(this).data("id");
                                bootbox.confirm("Desea eliminar este registro?", function (result) {
                                    if (result) {
                                        app_modulo_permisoManager.crud().eliminar(id);
                                    }
                                });
                            }).end().find(".nuevo-app_modulo_permiso").off().on("click", function () {
                                subViewElement = $(this);
                                subViewContent = subViewElement.attr("href");


                            });

                        },
                        "aaData": data,
                        "aoColumns": [
                            {"mDataProp": "mp_idmope", "sTitle": "ID", "bSortable": false},
                            {"mDataProp": "mp_idmope", "sTitle": "ID", "bSortable": false},
                            {"mDataProp": "mp_modulo_id", "sTitle": "mp_modulo_id", "bSortable": false},
                            {"mDataProp": "mp_permiso_id", "sTitle": "mp_permiso_id", "bSortable": false},
                            {"mDataProp": "mp_idmope", "sTitle": "Options", "sClass": "center"}
                        ],
                        "aoColumnDefs": [{
                                bSortable: false,
                                aTargets: [0, -1]
                            }],
//                    "aaSorting": [
//                        [0, "asc"]
//                    ]
                    });



                    $("#datatable_app_modulo_permiso tbody").on("click", "tr", function () {

                        if ($(this).hasClass("selected")) {
                            $(this).removeClass("selected");
                        }
                        else {
                            oTableapp_modulo_permiso.$("tr.selected").removeClass("selected");
                            $(this).addClass("selected");
                        }
                    });

                },
                async: !0
            });

        },
        buscarIdContextMenu: function (id) {
            $.ajax({
                url: app_modulo_permisoManager.base() + "index.php/modules/app/app_modulo_permiso/get_by_id",
                cache: false,
                dataType: "json",
                data: ({
                    "ro_idroles": id
                }),
                success: function (data) {
                    app_modulo_permisoManager.pac(data);
                }
            });
        },
        buscarId: function (id) {
            //var data = app_modulo_permisoManager.crud().buscarId(id);
            $.ajax({
                url: app_modulo_permisoManager.base() + "index.php/modules/app/app_modulo_permiso/get_by_id",
                cache: false,
                dataType: "json",
                data: ({
                    mp_idmope: id
                }),
                success: function (data) {
                    app_modulo_permisoManager.pac(data);
                }
            });

        },
        pac_coleccion: function (data) {
            return {
                mp_idmope: $("#mp_idmope").val(),
                mp_modulo_id: $("#mp_modulo_id").val(),
                mp_permiso_id: $("#mp_permiso_id").val(),
            };
        },
        coleccion: function () {
            return {
                mp_idmope: $("#mp_idmope").val(),
                mp_modulo_id: $("#mp_modulo_id").val(),
                mp_permiso_id: $("#mp_permiso_id").val(),
            };
        },
        eliminar: function () {
            if (app_modulo_permisoManager.coleccion().mp_idmope != "")
                app_modulo_permisoManager.crud.eliminar(app_modulo_permisoManager.coleccion());
        },
        eliminarContexMenu: function (id) {
            $.ajax({
                url: app_modulo_permisoManager.base() + "index.php/modules/app/app_modulo_permiso/get_by_id",
                cache: false,
                dataType: "json",
                data: ({
                    mp_idmope: id
                }),
                success: function (data) {
                    if (data != null) {
                        app_modulo_permisoManager.crud().eliminar(data);
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

                app_modulo_permisoManager.nuevo();
            });
        },
        destroyDataTable: function ()
        {
            if (oTableapp_modulo_permiso != null)
                oTableapp_modulo_permiso.fnDestroy();
            //Remove all the DOM elements
            $("#datatable_app_modulo_permiso").remove();

        },
        nuevo: function () {


            $("#mp_idmope").focus();


            $("#mp_idmope").val("");
            $("#mp_idmope").val("");
            $("#mp_modulo_id").iCheck("uncheck");
            $("#mp_permiso_id").iCheck("uncheck");

            $("#app_modulo_permiso_guardar").prop("disabled", false);
            $("#app_modulo_permiso_listar").prop("disabled", false);
            $("#app_modulo_permiso_eliminar").prop("disabled", false);

            $("#app_modulo_permiso_table_tbody tbody tr").removeClass("active");
        },
        guardar: function () {
            $("#app_modulo_permiso_guardar").attr("disabled", true).html("<i class='fa fa-refresh fa-spin'></i> Procesando...");
            var requestType = app_modulo_permisoManager.coleccion().ro_idroles == "" ? "create" : "update";
            if (requestType == "create")
                app_modulo_permisoManager.crud().guardar();
            else
                app_modulo_permisoManager.crud().editar();
        },
        runFormValidation: function (el) {

            var formapp_modulo_permiso = $("#form_app_modulo_permiso");
            formapp_modulo_permiso.validate({
                highlight: function (element) {
                            $(element).closest('.form-group').addClass('has-error');
                    },
                    unhighlight: function (element) {
                            $(element).closest('.form-group').removeClass('has-error');
                    },
                    errorElement: 'span',
                    errorClass: 'label label-danger',
                    errorPlacement: function (error, element) {
                            if (element.parent('.input-group').length) {
                                    error.insertAfter(element.parent());
                            } else {
                                    error.insertAfter(element);
                            }
                    },
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

                    var requestType = app_modulo_permisoManager.coleccion().mp_idmope == "" ? "create" : "update";
                    if (requestType == "create")
                        app_modulo_permisoManager.crud().guardar();
                    else
                        app_modulo_permisoManager.crud().editar();

                }
            });

        }

    };

    return {
        init: function () {
            app_modulo_permisoManager.clickSubvistaClose(), app_modulo_permisoManager.runFormValidation(), app_modulo_permisoManager.listas()
        }
    }

}();

$(document).ready(function () {
    fn_app_modulo_permiso.init();
});