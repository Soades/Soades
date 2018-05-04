var oTableadm_resoluciones;
var col_adm_resoluciones;


var adm_resolucionesManager = {
    // Returns the url of the admlication server of a demo web adm.
    base: function() {
        return Routers.url;
    },
    crud: function() {
        return {
            buscarId: function(id) {
                $.ajax({
                    url: Routers.url + "index.php/modules/adm/adm_resoluciones/get_by_id",
                    cache: false,
                    dataType: "json",
                    data: ({
                        re_idre: id
                    }),
                    success: function(data) {
                        adm_resolucionesManager.pac(data);
                    }
                });
            },
            guardar: function() {


                $.ajax({
                    url: adm_resolucionesManager.base() + "index.php/modules/adm/adm_resoluciones/create",
                    data: (adm_resolucionesManager.coleccion()),
                    type: "post",
                    dataType: "json",
                    cache: false,
                    async: false,
                    success: function(data) {

                        if (data.result) {
                            adm_resolucionesManager.listas();
                            adm_resolucionesManager.destroyDataTable();
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
                    complete: function() {
                        //  $(".containerBlock > form").waitMe("hide");                  
                        setInterval(function() {

                        }, 2000);
                    },
                });

            },
            editar: function() {


                $.ajax({
                    url: adm_resolucionesManager.base() + "index.php/modules/adm/adm_resoluciones/update",
                    data: (adm_resolucionesManager.coleccion()),
                    type: "post",
                    dataType: "json",
                    cache: false,
                    async: false,
                    success: function(data) {

                        if (data.result) {
                            adm_resolucionesManager.listas();
                            adm_resolucionesManager.destroyDataTable();
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
                    complete: function() {
                        //  $(".containerBlock > form").waitMe("hide");                  
                        setInterval(function() {

                        }, 2000);
                    },
                });

            },
            eliminar: function(id) {


                $.ajax({
                    url: Routers.url + "index.php/modules/adm/adm_resoluciones/delete",
                    type: "post",
                    dataType: "json",
                    data: ({
                        "re_idre": id
                    }),
                    success: function(data) {

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



                            adm_resolucionesManager.listas();
                            adm_resolucionesManager.destroyDataTable();
                        }
                    }
                });

            },
            listar: function(options) {


            }
        }
    },
    pac: function(data) {

        $("#div_lista_adm_resoluciones").hide();
        $("#form_adm_resoluciones").show("slow").siblings().hide(1000);


        if (typeof data == "undefined" || data == null) {
            $("#re_idre").val("");
            $("#re_numero").val("");
            $("#re_concepto").val("");

        } else {
            $("#form_adm_resoluciones input").addClass("input-llenos");
            $("#re_idre").val(data.re_idre);
            $("#re_numero").val(data.re_numero);
            $("#re_concepto").val(data.re_concepto);


        }

    },
    // listamos los registros
    listas_refresh: function() {

    },
    listas: function() {


        $("#form_adm_resoluciones").hide("slow");
        $("#div_lista_adm_resoluciones").show("slow").siblings().hide(1000);


        $.ajax({
            type: "GET",
            url: Routers.url + "index.php/modules/adm/adm_resoluciones/get_all",
            dataType: "json",
            cache: !0,
            success: function(data) {

                $("#div_lista_adm_resoluciones").html("<table class='table table-striped table-bordered table-full-width' id='datatable_adm_resoluciones'></table>");

                oTableadm_resoluciones = $("#datatable_adm_resoluciones").dataTable({
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
                    "fnRowCallback": function(nRow, aData, iDisplayIndex) {

                        /* admend the grade to the default row class name */
                        //alert(aData)
                        $("#datatable_adm_resoluciones_wrapper .dataTables_filter input").addClass("form-control").attr("placeholder", "Buscar...");
                        // modify table search input

                        // modify table per page dropdown
                        //$("#datatable_adm_resoluciones .dataTables_length select").selectpicker();



                        var adm_resolucionesIndex = aData.re_idre;
                        $("td:eq(4)", nRow).empty();
                        $(".options-adm_resoluciones").children().clone().appendTo($("td:eq(4)", nRow)).find(".edit-adm_resoluciones").attr("data-id", adm_resolucionesIndex).off().on("click", function() {

                            subViewElement = $(this);
                            subViewContent = subViewElement.attr("href");
                            var id = subViewElement.data("id");

                            adm_resolucionesManager.crud().buscarId(id);

                        }).end().find(".eliminar-adm_resoluciones").data("id", adm_resolucionesIndex).off().on("click", function() {
                            var target_row = $(this).closest("tr").get(0);
                            var id = $(this).data("id");
                            bootbox.confirm("Desea eliminar este registro?", function(result) {
                                if (result) {
                                    adm_resolucionesManager.crud().eliminar(id);
                                }
                            });
                        }).end().find(".nuevo-adm_resoluciones").off().on("click", function() {
                            subViewElement = $(this);
                            subViewContent = subViewElement.attr("href");


                        });

                    },
                    "aaData": data,
                    "aoColumns": [
                        {"mDataProp": "re_idre", "sTitle": "ID", "bSortable": false},
                        {"mDataProp": "re_numero", "sTitle": "re_numero", "bSortable": false},
                        {"mDataProp": "re_fecha", "sTitle": "re_fecha", "bSortable": false},
                        {"mDataProp": "re_concepto", "sTitle": "re_concepto", "bSortable": false},
                        {"mDataProp": "re_idre", "sTitle": "Options", "sClass": "center"}
                    ],
                    "aoColumnDefs": [{
                            bSortable: false,
                            aTargets: [0, -1]
                        }],
//                    "aaSorting": [
//                        [0, "asc"]
//                    ]
                });



                $("#datatable_adm_resoluciones tbody").on("click", "tr", function() {

                    if ($(this).hasClass("selected")) {
                        $(this).removeClass("selected");
                    }
                    else {
                        oTableadm_resoluciones.$("tr.selected").removeClass("selected");
                        $(this).addClass("selected");
                    }
                });

            },
            async: !0
        });

    },
    buscarIdContextMenu: function(id) {
        $.ajax({
            url: adm_resolucionesManager.base() + "index.php/modules/adm/adm_resoluciones/get_by_id",
            cache: false,
            dataType: "json",
            data: ({
                "ro_idroles": id
            }),
            success: function(data) {
                adm_resolucionesManager.pac(data);
            }
        });
    },
    buscarId: function(id) {
        //var data = adm_resolucionesManager.crud().buscarId(id);
        $.ajax({
            url: adm_resolucionesManager.base() + "index.php/modules/adm/adm_resoluciones/get_by_id",
            cache: false,
            dataType: "json",
            data: ({
                re_idre: id
            }),
            success: function(data) {
                adm_resolucionesManager.pac(data);
            }
        });

    },
    pac_coleccion: function(data) {
        return {
            re_idre: $("#re_idre").val(),
            re_numero: $("#re_numero").val(),
            re_concepto: $("#re_concepto").val(),
        };
    },
    coleccion: function() {
        return {
            re_idre: $("#re_idre").val(),
            re_numero: $("#re_numero").val(),
            re_concepto: $("#re_concepto").val(),
        };
    },
    eliminar: function() {
        if (adm_resolucionesManager.coleccion().re_idre != "")
            adm_resolucionesManager.crud.eliminar(adm_resolucionesManager.coleccion());
    },
    eliminarContexMenu: function(id) {
        $.ajax({
            url: adm_resolucionesManager.base() + "index.php/modules/adm/adm_resoluciones/get_by_id",
            cache: false,
            dataType: "json",
            data: ({
                re_idre: id
            }),
            success: function(data) {
                if (data != null) {
                    adm_resolucionesManager.crud().eliminar(data);
                }
            }
        });
    },
    destroyDataTable: function()
    {
        if (oTableadm_resoluciones != null)
            oTableadm_resoluciones.fnDestroy();
        //Remove all the DOM elements
        $("#datatable_adm_resoluciones").remove();

    },
    nuevo: function() {


        $("#re_numero").focus();



        $("#div_lista_adm_resoluciones").hide();
        $("#form_adm_resoluciones").show("slow").siblings().hide(1000);


        $("#re_idre").val("");
        $("#re_numero").val("");
        $("#re_concepto").val("");


        $("#adm_resoluciones_guardar").prop("disabled", false);
        $("#adm_resoluciones_listar").prop("disabled", false);
        $("#adm_resoluciones_eliminar").prop("disabled", false);

        $("#adm_resoluciones_table_tbody tbody tr").removeClass("active");
    },
    guardar: function() {
        $("#adm_resoluciones_guardar").attr("disabled", true).html("<i class='fa fa-refresh fa-spin'></i> Procesando...");
        var requestType = adm_resolucionesManager.coleccion().re_idre == "" ? "create" : "update";
        if (requestType == "create")
            adm_resolucionesManager.crud().guardar();
        else
            adm_resolucionesManager.crud().editar();
    },
    runFormValidation: function(el) {

        var formadm_resoluciones = $("#form_adm_resoluciones");
        formadm_resoluciones.validate({
            highlight: function(element) {
                        $(element).closest('.form-group').addClass('has-error');
                },
                unhighlight: function(element) {
                        $(element).closest('.form-group').removeClass('has-error');
                },
                errorElement: 'span',
                errorClass: 'label label-danger',
                errorPlacement: function(error, element) {
                        if (element.parent('.input-group').length) {
                                error.insertAfter(element.parent());
                        } else {
                                error.insertAfter(element);
                        }
                },
            rules: {
                re_numero: {
                    required: true,
                    maxlength: 255
                },
                re_concepto: {
                    required: true,
                    maxlength: 255
                }

            },
            messages: {
                re_numero: {
                    required: "El campo es requerido",
                    digits: "El campo acepta solo numeros",
                },
                re_concepto: {
                    required: "El campo es requerido",
                    digits: "El campo acepta solo numeros",
                },
            },
            submitHandler: function(form) {

                var requestType = adm_resolucionesManager.coleccion().re_idre == "" ? "create" : "update";
                if (requestType == "create")
                    adm_resolucionesManager.crud().guardar();
                else
                    adm_resolucionesManager.crud().editar();

            }
        });

    }

};



$(document).ready(function() {


    adm_resolucionesManager.runFormValidation();
    adm_resolucionesManager.listas();



    $(document).on("click", "#adm_resoluciones_nuevo", function(e) {
        adm_resolucionesManager.nuevo();
        e.preventDefault();
        e.stopPropagation();
    });

    $(document).on("click", "#adm_resoluciones_listar", function(e) {
        adm_resolucionesManager.listas();
        e.preventDefault();
        e.stopPropagation();
    });

    $(document).on("click", "#adm_resoluciones_guardar", function(e) {
        $("#form_adm_resoluciones").submit();
        e.preventDefault();
        e.stopPropagation();
        e.stopImmediatePropagation();
    });




});