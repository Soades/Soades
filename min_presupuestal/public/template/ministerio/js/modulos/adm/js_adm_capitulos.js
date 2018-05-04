var oTableadm_capitulos;
var col_adm_capitulos;


var adm_capitulosManager = {
    // Returns the url of the admlication server of a demo web adm.
    base: function() {
        return Routers.url;
    },
    crud: function() {
        return {
            buscarId: function(id) {
                $.ajax({
                    url: Routers.url + "index.php/modules/adm/adm_capitulos/get_by_id",
                    cache: false,
                    dataType: "json",
                    data: ({
                        ca_idca: id
                    }),
                    success: function(data) {
                        adm_capitulosManager.pac(data);
                    }
                });
            },
            guardar: function() {


                $.ajax({
                    url: adm_capitulosManager.base() + "index.php/modules/adm/adm_capitulos/create",
                    data: (adm_capitulosManager.coleccion()),
                    type: "post",
                    dataType: "json",
                    cache: false,
                    async: false,
                    success: function(data) {

                        if (data.result) {
                            adm_capitulosManager.listas();
                            adm_capitulosManager.destroyDataTable();
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
                    url: adm_capitulosManager.base() + "index.php/modules/adm/adm_capitulos/update",
                    data: (adm_capitulosManager.coleccion()),
                    type: "post",
                    dataType: "json",
                    cache: false,
                    async: false,
                    success: function(data) {

                        if (data.result) {
                            adm_capitulosManager.listas();
                            adm_capitulosManager.destroyDataTable();
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
                    url: Routers.url + "index.php/modules/adm/adm_capitulos/delete",
                    type: "post",
                    dataType: "json",
                    data: ({
                        "ca_idca": id
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



                            adm_capitulosManager.listas();
                            adm_capitulosManager.destroyDataTable();
                        }
                    }
                });

            },
            listar: function(options) {


            }
        }
    },
    pac: function(data) {

        $("#div_lista_adm_capitulos").hide();
        $("#form_adm_capitulos").show("slow").siblings().hide(1000);


        if (typeof data == "undefined" || data == null) {
            $("#ca_idca").val("");
            $("#ca_nombre").val("");

        } else {
            $("#form_adm_capitulos input").addClass("input-llenos");
            $("#ca_idca").val(data.ca_idca);
            $("#ca_nombre").val(data.ca_nombre);


        }

    },
    // listamos los registros
    listas_refresh: function() {

    },
    listas: function() {


        $("#form_adm_capitulos").hide("slow");
        $("#div_lista_adm_capitulos").show("slow").siblings().hide(1000);


        $.ajax({
            type: "GET",
            url: Routers.url + "index.php/modules/adm/adm_capitulos/get_all",
            dataType: "json",
            cache: !0,
            success: function(data) {

                $("#div_lista_adm_capitulos").html("<table class='table table-striped table-bordered table-full-width' id='datatable_adm_capitulos'></table>");

                oTableadm_capitulos = $("#datatable_adm_capitulos").dataTable({
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
                        $("#datatable_adm_capitulos_wrapper .dataTables_filter input").addClass("form-control").attr("placeholder", "Buscar...");
                        // modify table search input

                        // modify table per page dropdown
                        //$("#datatable_adm_capitulos .dataTables_length select").selectpicker();



                        var adm_capitulosIndex = aData.ca_idca;
                        $("td:eq(2)", nRow).empty();
                        $(".options-adm_capitulos").children().clone().appendTo($("td:eq(2)", nRow)).find(".edit-adm_capitulos").attr("data-id", adm_capitulosIndex).off().on("click", function() {

                            subViewElement = $(this);
                            subViewContent = subViewElement.attr("href");
                            var id = subViewElement.data("id");

                            adm_capitulosManager.crud().buscarId(id);

                        }).end().find(".eliminar-adm_capitulos").data("id", adm_capitulosIndex).off().on("click", function() {
                            var target_row = $(this).closest("tr").get(0);
                            var id = $(this).data("id");
                            bootbox.confirm("Desea eliminar este registro?", function(result) {
                                if (result) {
                                    adm_capitulosManager.crud().eliminar(id);
                                }
                            });
                        }).end().find(".nuevo-adm_capitulos").off().on("click", function() {
                            subViewElement = $(this);
                            subViewContent = subViewElement.attr("href");


                        });

                    },
                    "aaData": data,
                    "aoColumns": [
                        {"mDataProp": "ca_idca", "sTitle": "ID", "bSortable": false},
                        {"mDataProp": "ca_nombre", "sTitle": "Nombre del capitulo", "bSortable": false},
                        {"mDataProp": "ca_idca", "sTitle": "Options", "sClass": "center"}
                    ],
                    "aoColumnDefs": [{
                            bSortable: false,
                            aTargets: [0, -1]
                        }],
//                    "aaSorting": [
//                        [0, "asc"]
//                    ]
                });



                $("#datatable_adm_capitulos tbody").on("click", "tr", function() {

                    if ($(this).hasClass("selected")) {
                        $(this).removeClass("selected");
                    }
                    else {
                        oTableadm_capitulos.$("tr.selected").removeClass("selected");
                        $(this).addClass("selected");
                    }
                });

            },
            async: !0
        });

    },
    buscarIdContextMenu: function(id) {
        $.ajax({
            url: adm_capitulosManager.base() + "index.php/modules/adm/adm_capitulos/get_by_id",
            cache: false,
            dataType: "json",
            data: ({
                "ro_idroles": id
            }),
            success: function(data) {
                adm_capitulosManager.pac(data);
            }
        });
    },
    buscarId: function(id) {
        //var data = adm_capitulosManager.crud().buscarId(id);
        $.ajax({
            url: adm_capitulosManager.base() + "index.php/modules/adm/adm_capitulos/get_by_id",
            cache: false,
            dataType: "json",
            data: ({
                ca_idca: id
            }),
            success: function(data) {
                adm_capitulosManager.pac(data);
            }
        });

    },
    pac_coleccion: function(data) {
        return {
            ca_idca: $("#ca_idca").val(),
            ca_nombre: $("#ca_nombre").val(),
        };
    },
    coleccion: function() {
        return {
            ca_idca: $("#ca_idca").val(),
            ca_nombre: $("#ca_nombre").val(),
        };
    },
    eliminar: function() {
        if (adm_capitulosManager.coleccion().ca_idca != "")
            adm_capitulosManager.crud.eliminar(adm_capitulosManager.coleccion());
    },
    eliminarContexMenu: function(id) {
        $.ajax({
            url: adm_capitulosManager.base() + "index.php/modules/adm/adm_capitulos/get_by_id",
            cache: false,
            dataType: "json",
            data: ({
                ca_idca: id
            }),
            success: function(data) {
                if (data != null) {
                    adm_capitulosManager.crud().eliminar(data);
                }
            }
        });
    },
    destroyDataTable: function()
    {
        if (oTableadm_capitulos != null)
            oTableadm_capitulos.fnDestroy();
        //Remove all the DOM elements
        $("#datatable_adm_capitulos").remove();

    },
    nuevo: function() {


        $("#ca_nombre").focus();



        $("#div_lista_adm_capitulos").hide();
        $("#form_adm_capitulos").show("slow").siblings().hide(1000);


        $("#ca_idca").val("");
        $("#ca_nombre").val("");


        $("#adm_capitulos_guardar").prop("disabled", false);
        $("#adm_capitulos_listar").prop("disabled", false);
        $("#adm_capitulos_eliminar").prop("disabled", false);

        $("#adm_capitulos_table_tbody tbody tr").removeClass("active");
    },
    guardar: function() {
        $("#adm_capitulos_guardar").attr("disabled", true).html("<i class='fa fa-refresh fa-spin'></i> Procesando...");
        var requestType = adm_capitulosManager.coleccion().ca_idca == "" ? "create" : "update";
        if (requestType == "create")
            adm_capitulosManager.crud().guardar();
        else
            adm_capitulosManager.crud().editar();
    },
    runFormValidation: function(el) {

        var formadm_capitulos = $("#form_adm_capitulos");
        formadm_capitulos.validate({
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
                ca_nombre: {
                    required: true,
                    maxlength: 255
                }

            },
            messages: {
                ca_nombre: {
                    required: "El campo es requerido",
                    digits: "El campo acepta solo numeros",
                },
                
            },
            submitHandler: function(form) {

                var requestType = adm_capitulosManager.coleccion().ca_idca == "" ? "create" : "update";
                if (requestType == "create")
                    adm_capitulosManager.crud().guardar();
                else
                    adm_capitulosManager.crud().editar();

            }
        });

    }

};



$(document).ready(function() {


    adm_capitulosManager.runFormValidation();
    adm_capitulosManager.listas();



    $(document).on("click", "#adm_capitulos_nuevo", function(e) {
        adm_capitulosManager.nuevo();
        e.preventDefault();
        e.stopPropagation();
    });

    $(document).on("click", "#adm_capitulos_listar", function(e) {
        adm_capitulosManager.listas();
        e.preventDefault();
        e.stopPropagation();
    });

    $(document).on("click", "#adm_capitulos_guardar", function(e) {
        $("#form_adm_capitulos").submit();
        e.preventDefault();
        e.stopPropagation();
        e.stopImmediatePropagation();
    });




});