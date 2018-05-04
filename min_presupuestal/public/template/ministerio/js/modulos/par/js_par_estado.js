var oTablepar_estado;
var col_par_estado;
var par_estadoManager = {
    // Returns the url of the parlication server of a demo web par.
    base: function() {
        return Routers.url;
    },
    crud: function() {
        return {
            buscarId: function(id) {
                $.ajax({
                    url: Routers.url + "index.php/modules/par/par_estado/get_by_id",
                    cache: false,
                    dataType: "json",
                    data: ({
                        es_idestado: id
                    }),
                    success: function(data) {
                        par_estadoManager.pac(data);
                    }
                });
            },
            guardar: function() {


                $.ajax({
                    url: par_estadoManager.base() + "index.php/modules/par/par_estado/create",
                    data: (par_estadoManager.coleccion()),
                    type: "post",
                    dataType: "json",
                    cache: false,
                    async: false,
                    success: function(data) {

                        if (data.result) {
                            par_estadoManager.listas();
                            par_estadoManager.destroyDataTable();
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
                    url: par_estadoManager.base() + "index.php/modules/par/par_estado/update",
                    data: (par_estadoManager.coleccion()),
                    type: "post",
                    dataType: "json",
                    cache: false,
                    async: false,
                    success: function(data) {

                        if (data.result) {
                            par_estadoManager.listas();
                            par_estadoManager.destroyDataTable();
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
                    url: Routers.url + "index.php/modules/par/par_estado/delete",
                    type: "post",
                    dataType: "json",
                    data: ({
                        "es_idestado": id
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
                            par_estadoManager.listas();
                            par_estadoManager.destroyDataTable();
                        }
                    }
                });
            },
            listar: function(options) {


            }
        }
    },
    pac: function(data) {

        $("#div_lista_par_estado").hide();
        $("#form_par_estado").show("slow").siblings().hide(1000);
        if (typeof data == "undefined" || data == null) {

        } else {
            $("#form_par_estado input").addClass("input-llenos");
            $("#es_idestado").val(data.es_idestado);
            $("#es_nombre").val(data.es_nombre);
        }

    },
    // listamos los registros
    listas_refresh: function() {

    },
    listas: function() {


        $("#form_par_estado").hide("slow");
        $("#div_lista_par_estado").show("slow").siblings().hide(1000);
        $.ajax({
            type: "GET",
            url: Routers.url + "index.php/modules/par/par_estado/get_all",
            dataType: "json",
            cache: !0,
            success: function(data) {

                $("#div_lista_par_estado").html("<table class='table table-striped table-bordered table-full-width' id='datatable_par_estado'></table>");
                oTablepar_estado = $("#datatable_par_estado").dataTable({
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

                        /* parend the grade to the default row class name */
                        //alert(aData)
                        $("#datatable_par_estado_wrapper .dataTables_filter input").addClass("form-control").attr("placeholder", "Buscar...");
                        // modify table search input

                        // modify table per page dropdown
                        //$("#datatable_par_estado .dataTables_length select").selectpicker();



                        var par_estadoIndex = aData.es_idestado;
                        $("td:eq(2)", nRow).empty();
                        $(".options-par_estado").children().clone().appendTo($("td:eq(2)", nRow)).find(".edit-par_estado").attr("data-id", par_estadoIndex).off().on("click", function() {

                            subViewElement = $(this);
                            subViewContent = subViewElement.attr("href");
                            var id = subViewElement.data("id");
                            par_estadoManager.crud().buscarId(id);
                        }).end().find(".eliminar-par_estado").data("id", par_estadoIndex).off().on("click", function() {
                            var target_row = $(this).closest("tr").get(0);
                            var id = $(this).data("id");
                            bootbox.confirm("Desea eliminar este registro?", function(result) {
                                if (result) {
                                    par_estadoManager.crud().eliminar(id);
                                }
                            });
                        }).end().find(".nuevo-par_estado").off().on("click", function() {
                            subViewElement = $(this);
                            subViewContent = subViewElement.attr("href");
                        });
                    },
                    "aaData": data,
                    "aoColumns": [
                            {"mDataProp": "es_idestado", "sTitle": "#", "bSortable": false},
                            {"mDataProp": "es_nombre", "sTitle": "Nombre", "bSortable": false},
                            {"mDataProp": "es_idestado", "sTitle": "Options", "sClass": "center"}
                     
                        ],
                    "aoColumnDefs": [{
                            bSortable: false,
                            aTargets: [0, -1]
                        }],
//                    "aaSorting": [
//                        [0, "asc"]
//                    ]
                });
                $("#datatable_par_estado tbody").on("click", "tr", function() {

                    if ($(this).hasClass("selected")) {
                        $(this).removeClass("selected");
                    }
                    else {
                        oTablepar_estado.$("tr.selected").removeClass("selected");
                        $(this).addClass("selected");
                    }
                });
            },
            async: !0
        });
    },
    buscarIdContextMenu: function(id) {
        $.ajax({
            url: par_estadoManager.base() + "index.php/modules/par/par_estado/get_by_id",
            cache: false,
            dataType: "json",
            data: ({
                "es_idestado": id
            }),
            success: function(data) {
                par_estadoManager.pac(data);
            }
        });
    },
    buscarId: function(id) {
        //var data = par_estadoManager.crud().buscarId(id);
        $.ajax({
            url: par_estadoManager.base() + "index.php/modules/par/par_estado/get_by_id",
            cache: false,
            dataType: "json",
            data: ({
                es_idestado: id
            }),
            success: function(data) {
                par_estadoManager.pac(data);
            }
        });
    },
    pac_coleccion: function(data) {
        return {
        };
    },
    coleccion: function() {
        return {
            es_idestado: $("#es_idestado").val(),
            es_nombre: $("#es_nombre").val()
        };
    },
    eliminar: function() {
        if (par_estadoManager.coleccion().es_idestado != "")
            par_estadoManager.crud.eliminar(par_estadoManager.coleccion());
    },
    eliminarContexMenu: function(id) {
        $.ajax({
            url: par_estadoManager.base() + "index.php/modules/par/par_estado/get_by_id",
            cache: false,
            dataType: "json",
            data: ({
                es_idestado: id
            }),
            success: function(data) {
                if (data != null) {
                    par_estadoManager.crud().eliminar(data);
                }
            }
        });
    },
    destroyDataTable: function()
    {
        if (oTablepar_estado != null)
            oTablepar_estado.fnDestroy();
        //Remove all the DOM elements
        $("#datatable_par_estado").remove();
    },
    nuevo: function() {





        $("#div_lista_par_estado").hide();
        $("#form_par_estado").show("slow").siblings().hide(1000);
        $("#es_nombre").val("");
        $("#es_idestado").val("");
        $("#par_estado_guardar").prop("disabled", false);
        $("#par_estado_listar").prop("disabled", false);
        $("#par_estado_eliminar").prop("disabled", false);
        $("#par_estado_table_tbody tbody tr").removeClass("active");
    },
    guardar: function() {
        $("#par_estado_guardar").attr("disabled", true).html("<i class='fa fa-refresh fa-spin'></i> Procesando...");
        var requestType = par_estadoManager.coleccion().es_idestado == "" ? "create" : "update";
        if (requestType == "create")
            par_estadoManager.crud().guardar();
        else
            par_estadoManager.crud().editar();
    },
    runFormValidation: function(el) {

        var formpar_estado = $("#form_par_estado");
        formpar_estado.validate({
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
                es_nombre: {
                    required: true,
                    
                },
            },
            messages: {
                es_nombre: {
                    required: "El campo es requerido"
                },
               
            },
            submitHandler: function(form) {

                var requestType = par_estadoManager.coleccion().es_idestado == "" ? "create" : "update";
                if (requestType == "create")
                    par_estadoManager.crud().guardar();
                else
                    par_estadoManager.crud().editar();
            }
        });
    }

};
$(document).ready(function() {


    par_estadoManager.runFormValidation();
    par_estadoManager.listas();
    $(document).on("click", "#par_estado_nuevo", function(e) {
        par_estadoManager.nuevo();
        e.preventDefault();
        e.stopPropagation();
    });
    $(document).on("click", "#par_estado_listar", function(e) {
        par_estadoManager.listas();
        e.preventDefault();
        e.stopPropagation();
    });
    $(document).on("click", "#par_estado_guardar", function(e) {
        $("#form_par_estado").submit();
        e.preventDefault();
        e.stopPropagation();
        e.stopImmediatePropagation();
    });
});