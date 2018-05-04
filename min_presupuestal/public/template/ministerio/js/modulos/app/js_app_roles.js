var oTableapp_roles;
var col_app_roles;
var fn_app_roles = function () {
    return app_rolesManager = {
        // Returns the url of the admlication server of a demo web adm.
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


                    $.ajax({
                        url: app_rolesManager.base() + "index.php/modules/app/app_roles/save",
                        data: (app_rolesManager.coleccion()),
                        type: "post",
                        dataType: "json",
                        cache: false,
                        async: false,
                        success: function (data) {
                            if (data.result) {
                                app_rolesManager.listas();
                                app_rolesManager.destroyDataTable();
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
                        url: app_rolesManager.base() + "index.php/modules/app/app_roles/update",
                        data: (app_rolesManager.coleccion()),
                        type: "post",
                        dataType: "json",
                        cache: false,
                        async: false,
                        success: function (data) {

                            if (data.result) {
                                app_rolesManager.listas();
                                app_rolesManager.destroyDataTable();
                            }


                            $.toast({
                                heading: "Mensaje", //data.title,
                                hideAfter: 4000,
                                text: [
                                    data.content
                                ],
                                position: 'top-center',
                                loaderBg: '#fd6558',
                                icon: "info"
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
                        url: Routers.url + "index.php/modules/app/app_roles/delete",
                        type: "post",
                        dataType: "json",
                        data: ({
                            "ro_idroles": id
                        }),
                        success: function (data) {

                            if (data.result) {


                                $.toast({
                                    heading: "Mensaje", //data.title,
                                    hideAfter: 4000,
                                    text: [
                                        data.content
                                    ],
                                    position: 'top-center',
                                    loaderBg: '#fd6558',
                                    icon: "info"
                                });


                                app_rolesManager.listas();
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

            $("#div_lista_app_roles").hide();
            $("#form_app_roles").show("slow").siblings().hide(1000);

            $('#app_roles_guardar').prop('disabled', false);
            $('#app_roles_listar').prop('disabled', false);
            $('#app_roles_eliminar').prop('disabled', false);

            $('#ro_idroles').val(data.ro_idroles);
            $('#ro_nombre').val(data.ro_nombre);
            $('#ro_descripcion').val(data.ro_descripcion);

            $('#ro_estado').prop('checked', (data.ro_estado == "1") ? true : false).iCheck('update');

            $('#ro_nombre').focus();

        },
        // listamos los registros
        listas_refresh: function () {

        },
        listas: function () {

            $("#div_lista_app_roles").show("slow").siblings().hide(1000);
            $("#form_app_roles").hide();


            $.ajax({
                type: "GET",
                url: Routers.url + "index.php/modules/app/app_roles/get_all",
                dataType: "json",
                cache: !0,
                success: function (data) {

                    $("#div_lista_app_roles").empty().append("<table class='table table-striped table-bordered table-full-width' id='datatable_app_roles'></table>");

                    oTableapp_roles = $("#datatable_app_roles").dataTable({
                        "bDestroy": true,
                        "bProcessing": true,
                        "paging": true,
                        "iDisplayLength": 7,
                        "aLengthMenu": [[1, 5, 6, 7, 8, 10, 15, 20, -1], [1, 5, 6, 7, 8, 9, 10, 15, 20, "All"]], // change per page values here
                        "oLanguage": {
                            "sLengthMenu": "Ver _MENU_ registros",
                            "sInfo": "Total _TOTAL_ registros mostrando (_START_ de _END_ filas)",
                            "sSearch": "Buscar",
                            "oPaginate": {
                                "sPrevious": "Anterior",
                                "sNext": "Siguiente"
                            }
                        },
                        "fnRowCallback": function (nRow, aData, iDisplayIndex) {

                            /* admend the grade to the default row class name */
                            //alert(aData)
                            $("#datatable_app_roles_wradmer .dataTables_filter input").addClass("form-control").attr("placeholder", "Buscar...");
                            // modify table search input

                            // modify table per page dropdown
                            //$("#datatable_app_roles .dataTables_length select").selectpicker();

                            $("td:eq(3)", nRow).html('<label class="flat-grey foocheck"><input ' + (aData.ro_estado == 1 ? "checked" : "") + ' type="checkbox" value="" class="grey"></label>');

                            var app_rolesIndex = aData.ro_idroles;
                            $("td:eq(4)", nRow).empty();
                            $(".options-app_roles")
							.children()
							.clone()
							.appendTo($("td:eq(4)", nRow))
							.find(".edit-app_roles").attr("data-id", app_rolesIndex).off().on("click", function () {

                                subViewElement = $(this);
                                subViewContent = subViewElement.attr("href");
                                var id = subViewElement.data("id");

                                app_rolesManager.crud().buscarId(id);

                            }).end().find(".eliminar-app_roles").data("id", app_rolesIndex).off().on("click", function () {

                                var target_row = $(this).closest("tr").get(0);
                                var id = $(this).data("id");
                                bootbox.confirm("Desea eliminar este registro?", function (result) {
                                    if (result) {
                                        app_rolesManager.crud().eliminar(id);
                                    }
                                });

                            }).end().find(".nuevo-app_roles").off().on("click", function () {


                            });

                        },
                        "aaData": data,
                        "aoColumns": [
                            {"mDataProp": "ro_idroles", "sTitle": "#", "bSortable": false},
                            {"mDataProp": "ro_nombre", "sTitle": "Nombre", "bSortable": false},
                            {"mDataProp": "ro_descripcion", "sTitle": "Descripcion", "bSortable": false},
                            {"mDataProp": "ro_estado", "sTitle": "Estado", "bSortable": false},
                            {"mDataProp": "ro_idroles", "sTitle": "Options", "sClass": "center"}
                        ],
                        "aoColumnDefs": [{
                                bSortable: false,
                                aTargets: [0, -1]
                            }],
//                    "aaSorting": [
//                        [0, "asc"]
//                    ]
                    });




                    $("#datatable_app_roles tbody").on("click", "tr", function (e) {

                        if ($(this).hasClass("selected")) {
                            $(this).removeClass("selected");
                        }
                        else {
                            oTableapp_roles.$("tr.selected").removeClass("selected");
                            $(this).addClass("selected");
                        }

                        e.preventDefault();
//                        e.stopPropagation();
//                        e.stopImmediatePropagation();

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
                ro_idroles: data.ro_idroles,
                ro_nombre: data.ro_nombre,
                ro_descripcion: data.ro_descripcion,
                ro_estado: data.ro_estado
            };
        },
        coleccion: function () {
            return {
                ro_idroles: $('#ro_idroles').val(),
                ro_nombre: $('#ro_nombre').val(),
                ro_descripcion: $('#ro_descripcion').val(),
                ro_estado: $("#ro_estado").is(':checked') ? 1 : 0

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

                app_rolesManager.nuevo();
            });
        },
        date_picker: function () {
            $('.date-picker').datepicker({
                autoclose: true
            });
        },
        destroyDataTable: function ()
        {
            if (oTableapp_roles != null)
                oTableapp_roles.fnDestroy();
            //Remove all the DOM elements
            $("#datatable_app_roles").remove();

        },
        nuevo: function () {
            $("#div_lista_app_roles").hide();
            $("#form_app_roles").show("slow").siblings().hide(1000);

            //$('#an_nombre').mask("0000", {placeholder: (new Date()).getFullYear()});

            $("#ro_nombre").focus();
            $("#ro_idroles").val("");
            $("#ro_descripcion").val("");
            $("#ro_estado").iCheck("uncheck");

            $("#app_roles_guardar").prop("disabled", false);
            $("#app_roles_listar").prop("disabled", false);
            $("#app_roles_eliminar").prop("disabled", false);

//            $("#window_permisos input,select").removeClass("input-active-form");
//            $("#form_app_roles input").removeClass("input-llenos");
//            $("#form_app_roles select").removeClass("input-llenos");
//            $("#app_roles_table_tbody tbody tr").removeClass("active");
//        
        },
        guardar: function () {
            //$("#app_roles_guardar").attr("disabled", true).html("<i class='fa fa-refresh fa-spin'></i> Procesando...");

            var requestType = app_rolesManager.coleccion().ro_idroles == "" ? "create" : "update";
            if (requestType == "create")
                app_rolesManager.crud().guardar();
            else
                app_rolesManager.crud().editar();
        },
        runFormValidation: function (el) {

            var formapp_roles = $("#form_app_roles");
            formapp_roles.validate({
                //https://www.treshna.com/jquery-validation-integration-with-bootstrap/
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
                    }
                ,
                rules: {
                    ro_nombre: {
                        required: true,
                        maxlength: 100,
                        digits: false,
                        number: false,
                    },
                },
                messages: {
                    ro_nombre: {
                        required: "El campo es requerido",
                        maxlength: "El maximo de caracteres para el campo es 100 ",
                    }
                },
                submitHandler: function (form) {

                    app_rolesManager.crud().guardar();


                }
            });

        }

    };

//    return {
//        init: function () {
//                    app_rolesManager.clickSubvistaClose(),
//                    app_rolesManager.runFormValidation(),
//                    app_rolesManager.listas(),
//                    app_rolesManager.date_picker()
//        }
//    };

}();

$(document).ready(function () {
    fn_app_roles.listas();
    fn_app_roles.runFormValidation();

    //$('#an_nombre').mask("0000", {placeholder: (new Date()).getFullYear()});

    $(document).on("click", "#app_roles_nuevo", function (e) {
        fn_app_roles.nuevo();
        e.preventDefault();
        e.stopPropagation();
    });

    $(document).on("click", "#app_roles_listar", function (e) {
        fn_app_roles.listas();
        e.preventDefault();
        e.stopPropagation();
    });

    $(document).on("click", "#app_roles_guardar", function (e) {
        $("#form_app_roles").submit();
        e.preventDefault();
        e.stopPropagation();
        e.stopImmediatePropagation();
    });

//    $('#ro_estado').on('click', function () { 
//    alert($(this).val())
//    })


    $('#ro_estado').iCheck({
        checkboxClass: 'icheckbox_square-green',
        radioClass: 'iradio_square-green',
    }).on('ifChanged', function (e) {
        // Get the field name
        var isChecked = e.currentTarget.checked;

        if (isChecked == true) {

        }
    });



//    
//    $("#app_roles_guardar").click(function (e) {
//        $("#form_app_roles").submit();
//        
//        e.preventDefault();
//        e.stopPropagation();
//        
//    });

});