var oTableadm_anio;
var col_adm_anio;
var fn_adm_anio = function () {
    return adm_anioManager = {
        // Returns the url of the admlication server of a demo web adm.
        base: function () {
            return Routers.url;
        },
        crud: function () {
            return {
                buscarId: function (id) {
                    $.ajax({
                        url: Routers.url + "index.php/modules/adm/adm_anio/get_by_id",
                        cache: false,
                        dataType: "json",
                        data: ({
                            an_idanio: id
                        }),
                        success: function (data) {
                            adm_anioManager.pac(data);
                        }
                    });
                },
                guardar: function () {


                    $.ajax({
                        url: adm_anioManager.base() + "index.php/modules/adm/adm_anio/save",
                        data: (adm_anioManager.coleccion()),
                        type: "post",
                        dataType: "json",
                        cache: false,
                        async: false,
                        success: function (data) {
                            if (data.result) {
                                adm_anioManager.listas();
                                adm_anioManager.destroyDataTable();
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
                        url: adm_anioManager.base() + "index.php/modules/adm/adm_anio/update",
                        data: (adm_anioManager.coleccion()),
                        type: "post",
                        dataType: "json",
                        cache: false,
                        async: false,
                        success: function (data) {

                            if (data.result) {
                                adm_anioManager.listas();
                                adm_anioManager.destroyDataTable();
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
                        url: Routers.url + "index.php/modules/adm/adm_anio/delete",
                        type: "post",
                        dataType: "json",
                        data: ({
                            "an_idanio": id
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


                                adm_anioManager.listas();
                                adm_anioManager.destroyDataTable();
                            }
                        }
                    });

                },
                listar: function (options) {


                }
            }
        },
        pac: function (data) {



            $("#div_lista_adm_anio").hide();
            $("#form_adm_anio").show("slow").siblings().hide(1000);


            // $("#form_adm_anio").show('slide', {direction: 'right'}, 1000);
//             $(".app-body").animate({
//                    scrollTop: e.offset().top
//                }, 1e3);


            $("#form_adm_anio .help-block").remove();
            $("#form_adm_anio .form-group").removeClass("has-error").removeClass("has-success");
            $("#form_adm_anio input").removeClass("input-llenos");

            if (typeof data == "undefined" || data == null) {
                $("#an_idanio").val("");
                $("#an_nombre").val("");
                $("#an_descripcion").val("");
                //$("#an_fecha_creacion").iCheck("uncheck");
            } else {
                $("#form_adm_anio input").addClass("input-llenos");
                $("#an_idanio").val(data.an_idanio);
                $("#an_nombre").val(data.an_nombre);
                $("#an_descripcion").val(data.an_descripcion);
                // $("#an_fecha_creacion").iCheck((data.an_fecha_creacion == 1) ? "check" : "uncheck");

            }

        },
        // listamos los registros
        listas_refresh: function () {

        },
        listas: function () {

            $("#div_lista_adm_anio").show("slow").siblings().hide(1000);
            $("#form_adm_anio").hide();


            $.ajax({
                type: "GET",
                url: Routers.url + "index.php/modules/adm/adm_anio/get_all",
                dataType: "json",
                cache: !0,
                success: function (data) {

                    $("#div_lista_adm_anio").empty().append("<table class='table table-striped table-bordered table-full-width' id='datatable_adm_anio'></table>");

                    oTableadm_anio = $("#datatable_adm_anio").dataTable({
                        
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
                            $("#datatable_adm_anio_wradmer .dataTables_filter input").addClass("form-control").attr("placeholder", "Buscar...");
                            // modify table search input

                            // modify table per page dropdown
                            //$("#datatable_adm_anio .dataTables_length select").selectpicker();

                            // $("td:eq(3)", nRow).html('<label class="flat-grey foocheck"><input ' + (aData.ro_estado == 1 ? "checked" : "") + ' type="checkbox" value="" class="grey"></label>');

                            var adm_anioIndex = aData.an_idanio;
                            $("td:eq(4)", nRow).empty();
                            $(".options-adm_anio").children().clone().appendTo($("td:eq(4)", nRow)).find(".edit-adm_anio").attr("data-id", adm_anioIndex).off().on("click", function () {

                                subViewElement = $(this);
                                subViewContent = subViewElement.attr("href");
                                var id = subViewElement.data("id");

                                adm_anioManager.crud().buscarId(id);

                            }).end().find(".eliminar-adm_anio").data("id", adm_anioIndex).off().on("click", function () {

                                var target_row = $(this).closest("tr").get(0);
                                var id = $(this).data("id");
                                bootbox.confirm("Desea eliminar este registro?", function (result) {
                                    if (result) {
                                        adm_anioManager.crud().eliminar(id);
                                    }
                                });

                            }).end().find(".nuevo-adm_anio").off().on("click", function () {


                            });

                        },
                        "aaData": data,
                        "aoColumns": [
                            {"mDataProp": "an_idanio", "sTitle": "#", "bSortable": false},
                            {"mDataProp": "an_nombre", "sTitle": "Nombre", "bSortable": false},
                            {"mDataProp": "an_descripcion", "sTitle": "Descripcion", "bSortable": false},
                            {"mDataProp": "an_fecha_creacion", "sTitle": "Fecha creacion", "bSortable": false},
                            {"mDataProp": "an_idanio", "sTitle": "Options", "sClass": "center"}
                        ],
                        "aoColumnDefs": [{
                                bSortable: false,
                                aTargets: [0, -1]
                            }],
//                    "aaSorting": [
//                        [0, "asc"]
//                    ]
                    });




                    $("#datatable_adm_anio tbody").on("click", "tr", function (e) {

                        if ($(this).hasClass("selected")) {
                            $(this).removeClass("selected");
                        }
                        else {
                            oTableadm_anio.$("tr.selected").removeClass("selected");
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
                url: adm_anioManager.base() + "index.php/modules/adm/adm_anio/get_by_id",
                cache: false,
                dataType: "json",
                data: ({
                    "ro_idroles": id
                }),
                success: function (data) {
                    adm_anioManager.pac(data);
                }
            });
        },
        buscarId: function (id) {
            //var data = adm_anioManager.crud().buscarId(id);
            $.ajax({
                url: adm_anioManager.base() + "index.php/modules/adm/adm_anio/get_by_id",
                cache: false,
                dataType: "json",
                data: ({
                    an_idanio: id
                }),
                success: function (data) {
                    adm_anioManager.pac(data);
                }
            });

        },
        pac_coleccion: function (data) {
            return {
                an_idanio: $("#an_idanio").val(),
                an_nombre: $("#an_nombre").val(),
                an_descripcion: $("#an_descripcion").val(),
            };
        },
        coleccion: function () {
            return {
                an_idanio: $("#an_idanio").val(),
                an_nombre: $("#an_nombre").val(),
                an_descripcion: $("#an_descripcion").val()

            };
        },
        eliminar: function () {
            if (adm_anioManager.coleccion().an_idanio != "")
                adm_anioManager.crud.eliminar(adm_anioManager.coleccion());
        },
        eliminarContexMenu: function (id) {
            $.ajax({
                url: adm_anioManager.base() + "index.php/modules/adm/adm_anio/get_by_id",
                cache: false,
                dataType: "json",
                data: ({
                    an_idanio: id
                }),
                success: function (data) {
                    if (data != null) {
                        adm_anioManager.crud().eliminar(data);
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

                adm_anioManager.nuevo();
            });
        },
        date_picker: function () {
            $('.date-picker').datepicker({
                autoclose: true
            });
        },
        destroyDataTable: function ()
        {
            if (oTableadm_anio != null)
                oTableadm_anio.fnDestroy();
            //Remove all the DOM elements
            $("#datatable_adm_anio").remove();

        },
        nuevo: function () {
            $("#div_lista_adm_anio").hide();
            $("#form_adm_anio").show("slow").siblings().hide(1000);

            $('#an_nombre').mask("0000", {placeholder: (new Date()).getFullYear()});

            $("#an_nombre").focus();
            $("#an_idanio").val("");
            $("#an_nombre").val("");
            $("#an_descripcion").val("");
            //$("#an_fecha_creacion").iCheck("uncheck");
            $("#adm_anio_guardar").prop("disabled", false);
            $("#adm_anio_listar").prop("disabled", false);
            $("#adm_anio_eliminar").prop("disabled", false);

//            $("#window_permisos input,select").removeClass("input-active-form");
//            $("#form_adm_anio input").removeClass("input-llenos");
//            $("#form_adm_anio select").removeClass("input-llenos");
//            $("#adm_anio_table_tbody tbody tr").removeClass("active");
//        
        },
        guardar: function () {
            //$("#adm_anio_guardar").attr("disabled", true).html("<i class='fa fa-refresh fa-spin'></i> Procesando...");

            var requestType = adm_anioManager.coleccion().ro_idroles == "" ? "create" : "update";
            if (requestType == "create")
                adm_anioManager.crud().guardar();
            else
                adm_anioManager.crud().editar();
        },
        runFormValidation: function (el) {

            var formadm_anio = $("#form_adm_anio");
            formadm_anio.validate({
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
                    an_nombre: {
                        required: true,
                        maxlength: 100,
                        digits: false,
                        number: false,
                    },
                },
                messages: {
                    an_nombre: {
                        required: "El campo es requerido",
                        maxlength: "El maximo de caracteres para el campo es 100 ",
                    },
                    an_descripcion: {
                        required: "El campo es requerido",
                        maxlength: "El maximo de caracteres para el campo es 255 ",
                    }
                },
                submitHandler: function (form) {

                    adm_anioManager.crud().guardar();


                }
            });

        }

    };

//    return {
//        init: function () {
//                    adm_anioManager.clickSubvistaClose(),
//                    adm_anioManager.runFormValidation(),
//                    adm_anioManager.listas(),
//                    adm_anioManager.date_picker()
//        }
//    };

}();

$(document).ready(function () {
    fn_adm_anio.listas();
    fn_adm_anio.runFormValidation();

    $('#an_nombre').mask("0000", {placeholder: (new Date()).getFullYear()});

    $(document).on("click", "#adm_anio_nuevo", function (e) {
        fn_adm_anio.nuevo();
        e.preventDefault();
        e.stopPropagation();
    });

    $(document).on("click", "#adm_anio_listar", function (e) {
        fn_adm_anio.listas();
        e.preventDefault();
        e.stopPropagation();
    });

    $(document).on("click", "#adm_anio_guardar", function (e) {
        $("#form_adm_anio").submit();
        e.preventDefault();
        e.stopPropagation();
        e.stopImmediatePropagation();
    });

//    
//    $("#adm_anio_guardar").click(function (e) {
//        $("#form_adm_anio").submit();
//        
//        e.preventDefault();
//        e.stopPropagation();
//        
//    });

});