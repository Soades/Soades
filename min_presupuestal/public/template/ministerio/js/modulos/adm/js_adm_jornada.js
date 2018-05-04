var oTableadm_jornada;
var col_adm_jornada;


var adm_jornadaManager = {
    // Returns the url of the admlication server of a demo web adm.
    base: function() {
        return Routers.url;
    },
    crud: function() {
        return {
            buscarId: function(id) {
                $.ajax({
                    url: Routers.url + "index.php/modules/adm/adm_jornada/get_by_id",
                    cache: false,
                    dataType: "json",
                    data: ({
                        jo_idjornada: id
                    }),
                    success: function(data) {
                        adm_jornadaManager.pac(data);
                    }
                });
            },
            guardar: function() {


                $.ajax({
                    url: adm_jornadaManager.base() + "index.php/modules/adm/adm_jornada/create",
                    data: (adm_jornadaManager.coleccion()),
                    type: "post",
                    dataType: "json",
                    cache: false,
                    async: false,
                    success: function(data) {

                        if (data.result) {
                            adm_jornadaManager.listas();
                            adm_jornadaManager.destroyDataTable();
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
                    url: adm_jornadaManager.base() + "index.php/modules/adm/adm_jornada/update",
                    data: (adm_jornadaManager.coleccion()),
                    type: "post",
                    dataType: "json",
                    cache: false,
                    async: false,
                    success: function(data) {

                        if (data.result) {
                            adm_jornadaManager.listas();
                            adm_jornadaManager.destroyDataTable();
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
                    url: Routers.url + "index.php/modules/adm/adm_jornada/delete",
                    type: "post",
                    dataType: "json",
                    data: ({
                        "jo_idjornada": id
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



                            adm_jornadaManager.listas();
                            adm_jornadaManager.destroyDataTable();
                        }
                    }
                });

            },
            listar: function(options) {


            }
        }
    },
    pac: function(data) {

        $("#div_lista_adm_jornada").hide();
        $("#form_adm_jornada").show("slow").siblings().hide(1000);


        if (typeof data == "undefined" || data == null) {
            $("#jo_idjornada").val("");
            $("#jo_nombre").val("");
            $("#jo_orden").val("");

        } else {
            $("#form_adm_jornada input").addClass("input-llenos");
            $("#jo_idjornada").val(data.jo_idjornada);
            $("#jo_nombre").val(data.jo_nombre);
            $("#jo_orden").val(data.jo_orden);


        }

    },
    // listamos los registros
    listas_refresh: function() {

    },
    listas: function() {


        $("#form_adm_jornada").hide("slow");
        $("#div_lista_adm_jornada").show("slow").siblings().hide(1000);


        $.ajax({
            type: "GET",
            url: Routers.url + "index.php/modules/adm/adm_jornada/get_all",
            dataType: "json",
            cache: !0,
            success: function(data) {

                $("#div_lista_adm_jornada").html("<table class='table table-striped table-bordered table-full-width' id='datatable_adm_jornada'></table>");

                oTableadm_jornada = $("#datatable_adm_jornada").dataTable({
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
                        $("#datatable_adm_jornada_wrapper .dataTables_filter input").addClass("form-control").attr("placeholder", "Buscar...");
                        // modify table search input

                        // modify table per page dropdown
                        //$("#datatable_adm_jornada .dataTables_length select").selectpicker();



                        var adm_jornadaIndex = aData.jo_idjornada;
                        $("td:eq(3)", nRow).empty();
                        $(".options-adm_jornada").children().clone().appendTo($("td:eq(3)", nRow)).find(".edit-adm_jornada").attr("data-id", adm_jornadaIndex).off().on("click", function() {

                            subViewElement = $(this);
                            subViewContent = subViewElement.attr("href");
                            var id = subViewElement.data("id");

                            adm_jornadaManager.crud().buscarId(id);

                        }).end().find(".eliminar-adm_jornada").data("id", adm_jornadaIndex).off().on("click", function() {
                            var target_row = $(this).closest("tr").get(0);
                            var id = $(this).data("id");
                            bootbox.confirm("Desea eliminar este registro?", function(result) {
                                if (result) {
                                    adm_jornadaManager.crud().eliminar(id);
                                }
                            });
                        }).end().find(".nuevo-adm_jornada").off().on("click", function() {
                            subViewElement = $(this);
                            subViewContent = subViewElement.attr("href");


                        });

                    },
                    "aaData": data,
                    "aoColumns": [
                        {"mDataProp": "jo_idjornada", "sTitle": "ID", "bSortable": false},
                        {"mDataProp": "jo_nombre", "sTitle": "Nombre de la jornada", "bSortable": false},
                        {"mDataProp": "jo_orden", "sTitle": "Orden", "bSortable": false},
                        {"mDataProp": "jo_idjornada", "sTitle": "Options", "sClass": "center"}
                    ],
                    "aoColumnDefs": [{
                            bSortable: false,
                            aTargets: [0, -1]
                        }],
//                    "aaSorting": [
//                        [0, "asc"]
//                    ]
                });



                $("#datatable_adm_jornada tbody").on("click", "tr", function() {

                    if ($(this).hasClass("selected")) {
                        $(this).removeClass("selected");
                    }
                    else {
                        oTableadm_jornada.$("tr.selected").removeClass("selected");
                        $(this).addClass("selected");
                    }
                });

            },
            async: !0
        });

    },
    buscarIdContextMenu: function(id) {
        $.ajax({
            url: adm_jornadaManager.base() + "index.php/modules/adm/adm_jornada/get_by_id",
            cache: false,
            dataType: "json",
            data: ({
                "ro_idroles": id
            }),
            success: function(data) {
                adm_jornadaManager.pac(data);
            }
        });
    },
    buscarId: function(id) {
        //var data = adm_jornadaManager.crud().buscarId(id);
        $.ajax({
            url: adm_jornadaManager.base() + "index.php/modules/adm/adm_jornada/get_by_id",
            cache: false,
            dataType: "json",
            data: ({
                jo_idjornada: id
            }),
            success: function(data) {
                adm_jornadaManager.pac(data);
            }
        });

    },
    pac_coleccion: function(data) {
        return {
            jo_idjornada: $("#jo_idjornada").val(),
            jo_nombre: $("#jo_nombre").val(),
            jo_orden: $("#jo_orden").val(),
        };
    },
    coleccion: function() {
        return {
            jo_idjornada: $("#jo_idjornada").val(),
            jo_nombre: $("#jo_nombre").val(),
            jo_orden: $("#jo_orden").val(),
        };
    },
    eliminar: function() {
        if (adm_jornadaManager.coleccion().jo_idjornada != "")
            adm_jornadaManager.crud.eliminar(adm_jornadaManager.coleccion());
    },
    eliminarContexMenu: function(id) {
        $.ajax({
            url: adm_jornadaManager.base() + "index.php/modules/adm/adm_jornada/get_by_id",
            cache: false,
            dataType: "json",
            data: ({
                jo_idjornada: id
            }),
            success: function(data) {
                if (data != null) {
                    adm_jornadaManager.crud().eliminar(data);
                }
            }
        });
    },
    destroyDataTable: function()
    {
        if (oTableadm_jornada != null)
            oTableadm_jornada.fnDestroy();
        //Remove all the DOM elements
        $("#datatable_adm_jornada").remove();

    },
    nuevo: function() {


        $("#jo_nombre").focus();



        $("#div_lista_adm_jornada").hide();
        $("#form_adm_jornada").show("slow").siblings().hide(1000);


        $("#jo_idjornada").val("");
        $("#jo_nombre").val("");
        $("#jo_orden").val("");


        $("#adm_jornada_guardar").prop("disabled", false);
        $("#adm_jornada_listar").prop("disabled", false);
        $("#adm_jornada_eliminar").prop("disabled", false);

        $("#adm_jornada_table_tbody tbody tr").removeClass("active");
    },
    guardar: function() {
        $("#adm_jornada_guardar").attr("disabled", true).html("<i class='fa fa-refresh fa-spin'></i> Procesando...");
        var requestType = adm_jornadaManager.coleccion().jo_idjornada == "" ? "create" : "update";
        if (requestType == "create")
            adm_jornadaManager.crud().guardar();
        else
            adm_jornadaManager.crud().editar();
    },
    runFormValidation: function(el) {

        var formadm_jornada = $("#form_adm_jornada");
        formadm_jornada.validate({
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
                jo_nombre: {
                    required: true,
                    maxlength: 200
                }

            },
            messages: {
                jo_nombre: {
                    required: "El campo es requerido",
                    maxlength: "El maximo de caracteres para el campo es 200",
                }

            },
            submitHandler: function(form) {

                var requestType = adm_jornadaManager.coleccion().jo_idjornada == "" ? "create" : "update";
                if (requestType == "create")
                    adm_jornadaManager.crud().guardar();
                else
                    adm_jornadaManager.crud().editar();

            }
        });

    }

};



$(document).ready(function() {


    adm_jornadaManager.runFormValidation();
    adm_jornadaManager.listas();



    $(document).on("click", "#adm_jornada_nuevo", function(e) {
        adm_jornadaManager.nuevo();
        e.preventDefault();
        e.stopPropagation();
    });

    $(document).on("click", "#adm_jornada_listar", function(e) {
        adm_jornadaManager.listas();
        e.preventDefault();
        e.stopPropagation();
    });

    $(document).on("click", "#adm_jornada_guardar", function(e) {
        $("#form_adm_jornada").submit();
        e.preventDefault();
        e.stopPropagation();
        e.stopImmediatePropagation();
    });




});