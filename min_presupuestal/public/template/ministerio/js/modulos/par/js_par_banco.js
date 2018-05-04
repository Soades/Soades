var oTablepar_banco;
var col_par_banco;


var par_bancoManager = {
    // Returns the url of the parlication server of a demo web par.
    base: function() {
        return Routers.url;
    },
    crud: function() {
        return {
            buscarId: function(id) {
                $.ajax({
                    url: Routers.url + "index.php/modules/par/par_banco/get_by_id",
                    cache: false,
                    dataType: "json",
                    data: ({
                        ba_idbanco: id
                    }),
                    success: function(data) {
                        par_bancoManager.pac(data);
                    }
                });
            },
            guardar: function() {


                $.ajax({
                    url: par_bancoManager.base() + "index.php/modules/par/par_banco/create",
                    data: (par_bancoManager.coleccion()),
                    type: "post",
                    dataType: "json",
                    cache: false,
                    async: false,
                    success: function(data) {

                        if (data.result) {
                            par_bancoManager.listas();
                            par_bancoManager.destroyDataTable();
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
                    url: par_bancoManager.base() + "index.php/modules/par/par_banco/update",
                    data: (par_bancoManager.coleccion()),
                    type: "post",
                    dataType: "json",
                    cache: false,
                    async: false,
                    success: function(data) {

                        if (data.result) {
                            par_bancoManager.listas();
                            par_bancoManager.destroyDataTable();
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
                    url: Routers.url + "index.php/modules/par/par_banco/delete",
                    type: "post",
                    dataType: "json",
                    data: ({
                        "ba_idbanco": id
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



                            par_bancoManager.listas();
                            par_bancoManager.destroyDataTable();
                        }
                    }
                });

            },
            listar: function(options) {


            }
        }
    },
    pac: function(data) {

        $("#div_lista_par_banco").hide();
        $("#form_par_banco").show("slow").siblings().hide(1000);


        if (typeof data == "undefined" || data == null) {
            $("#ba_idbanco").val("");
            $("#ba_codigo").val("");
            $("#ba_nombre").val("");

        } else {
            $("#form_par_banco input").addClass("input-llenos");
            $("#ba_idbanco").val(data.ba_idbanco);
            $("#ba_codigo").val(data.ba_codigo);
            $("#ba_nombre").val(data.ba_nombre);


        }

    },
    // listamos los registros
    listas_refresh: function() {

    },
    listas: function() {


        $("#form_par_banco").hide("slow");
        $("#div_lista_par_banco").show("slow").siblings().hide(1000);


        $.ajax({
            type: "GET",
            url: Routers.url + "index.php/modules/par/par_banco/get_all",
            dataType: "json",
            cache: !0,
            success: function(data) {

                $("#div_lista_par_banco").html("<table class='table table-striped table-bordered table-full-width' id='datatable_par_banco'></table>");

                oTablepar_banco = $("#datatable_par_banco").dataTable({
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
                        $("#datatable_par_banco_wrapper .dataTables_filter input").addClass("form-control").attr("placeholder", "Buscar...");
                        // modify table search input

                        // modify table per page dropdown
                        //$("#datatable_par_banco .dataTables_length select").selectpicker();



                        var par_bancoIndex = aData.ba_idbanco;
                        $("td:eq(3)", nRow).empty();
                        $(".options-par_banco").children().clone().appendTo($("td:eq(3)", nRow)).find(".edit-par_banco").attr("data-id", par_bancoIndex).off().on("click", function() {

                            subViewElement = $(this);
                            subViewContent = subViewElement.attr("href");
                            var id = subViewElement.data("id");

                            par_bancoManager.crud().buscarId(id);

                        }).end().find(".eliminar-par_banco").data("id", par_bancoIndex).off().on("click", function() {
                            var target_row = $(this).closest("tr").get(0);
                            var id = $(this).data("id");
                            bootbox.confirm("Desea eliminar este registro?", function(result) {
                                if (result) {
                                    par_bancoManager.crud().eliminar(id);
                                }
                            });
                        }).end().find(".nuevo-par_banco").off().on("click", function() {
                            subViewElement = $(this);
                            subViewContent = subViewElement.attr("href");


                        });

                    },
                    "aaData": data,
                    "aoColumns": [
                        {"mDataProp": "ba_idbanco", "sTitle": "#", "bSortable": false},
                        {"mDataProp": "ba_codigo", "sTitle": "Codigo", "bSortable": false},
                        {"mDataProp": "ba_nombre", "sTitle": "Nombre", "bSortable": false},
                        {"mDataProp": "ba_idbanco", "sTitle": "Options", "sClass": "center"}
                    ],
                    "aoColumnDefs": [{
                            bSortable: false,
                            aTargets: [0, -1]
                        }],
//                    "aaSorting": [
//                        [0, "asc"]
//                    ]
                });



                $("#datatable_par_banco tbody").on("click", "tr", function() {

                    if ($(this).hasClass("selected")) {
                        $(this).removeClass("selected");
                    }
                    else {
                        oTablepar_banco.$("tr.selected").removeClass("selected");
                        $(this).addClass("selected");
                    }
                });

            },
            async: !0
        });

    },
    buscarIdContextMenu: function(id) {
        $.ajax({
            url: par_bancoManager.base() + "index.php/modules/par/par_banco/get_by_id",
            cache: false,
            dataType: "json",
            data: ({
                "ro_idroles": id
            }),
            success: function(data) {
                par_bancoManager.pac(data);
            }
        });
    },
    buscarId: function(id) {
        //var data = par_bancoManager.crud().buscarId(id);
        $.ajax({
            url: par_bancoManager.base() + "index.php/modules/par/par_banco/get_by_id",
            cache: false,
            dataType: "json",
            data: ({
                ba_idbanco: id
            }),
            success: function(data) {
                par_bancoManager.pac(data);
            }
        });

    },
    pac_coleccion: function(data) {
        return {
            ba_idbanco: $("#ba_idbanco").val(),
            ba_codigo: $("#ba_codigo").val(),
            ba_nombre: $("#ba_nombre").val(),
        };
    },
    coleccion: function() {
        return {
            ba_idbanco: $("#ba_idbanco").val(),
            ba_codigo: $("#ba_codigo").val(),
            ba_nombre: $("#ba_nombre").val(),
        };
    },
    eliminar: function() {
        if (par_bancoManager.coleccion().ba_idbanco != "")
            par_bancoManager.crud.eliminar(par_bancoManager.coleccion());
    },
    eliminarContexMenu: function(id) {
        $.ajax({
            url: par_bancoManager.base() + "index.php/modules/par/par_banco/get_by_id",
            cache: false,
            dataType: "json",
            data: ({
                ba_idbanco: id
            }),
            success: function(data) {
                if (data != null) {
                    par_bancoManager.crud().eliminar(data);
                }
            }
        });
    },
    destroyDataTable: function()
    {
        if (oTablepar_banco != null)
            oTablepar_banco.fnDestroy();
        //Remove all the DOM elements
        $("#datatable_par_banco").remove();

    },
    nuevo: function() {


        $("#ba_codigo").focus();



        $("#div_lista_par_banco").hide();
        $("#form_par_banco").show("slow").siblings().hide(1000);


        $("#ba_idbanco").val("");
        $("#ba_codigo").val("");
        $("#ba_nombre").val("");


        $("#par_banco_guardar").prop("disabled", false);
        $("#par_banco_listar").prop("disabled", false);
        $("#par_banco_eliminar").prop("disabled", false);

        $("#par_banco_table_tbody tbody tr").removeClass("active");
    },
    guardar: function() {
        $("#par_banco_guardar").attr("disabled", true).html("<i class='fa fa-refresh fa-spin'></i> Procesando...");
        var requestType = par_bancoManager.coleccion().ba_idbanco == "" ? "create" : "update";
        if (requestType == "create")
            par_bancoManager.crud().guardar();
        else
            par_bancoManager.crud().editar();
    },
    runFormValidation: function(el) {

        var formpar_banco = $("#form_par_banco");
        formpar_banco.validate({
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
            submitHandler: function(form) {

                var requestType = par_bancoManager.coleccion().ba_idbanco == "" ? "create" : "update";
                if (requestType == "create")
                    par_bancoManager.crud().guardar();
                else
                    par_bancoManager.crud().editar();

            }
        });

    }

};



$(document).ready(function() {


    par_bancoManager.runFormValidation();
    par_bancoManager.listas();



    $(document).on("click", "#par_banco_nuevo", function(e) {
        par_bancoManager.nuevo();
        e.preventDefault();
        e.stopPropagation();
    });

    $(document).on("click", "#par_banco_listar", function(e) {
        par_bancoManager.listas();
        e.preventDefault();
        e.stopPropagation();
    });

    $(document).on("click", "#par_banco_guardar", function(e) {
        $("#form_par_banco").submit();
        e.preventDefault();
        e.stopPropagation();
        e.stopImmediatePropagation();
    });




});