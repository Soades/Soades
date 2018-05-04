var oTablepar_tipo_identificacion;
var col_par_tipo_identificacion;


var par_tipo_identificacionManager = {
    // Returns the url of the parlication server of a demo web par.
    base: function () {
        return Routers.url;
    },
    crud: function () {
        return {
            buscarId: function (id) {
                $.ajax({
                    url: Routers.url + "index.php/modules/par/par_tipo_identificacion/get_by_id",
                    cache: false,
                    dataType: "json",
                    data: ({
                        ti_idti: id
                    }),
                    success: function (data) {
                        par_tipo_identificacionManager.pac(data);
                    }
                });
            },
            guardar: function () {


                $.ajax({
                    url: par_tipo_identificacionManager.base() + "index.php/modules/par/par_tipo_identificacion/create",
                    data: (par_tipo_identificacionManager.coleccion()),
                    type: "post",
                    dataType: "json",
                    cache: false,
                    async: false,
                    success: function (data) {

                        if (data.result) {
                            par_tipo_identificacionManager.listas();
                            par_tipo_identificacionManager.destroyDataTable();
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
                    url: par_tipo_identificacionManager.base() + "index.php/modules/par/par_tipo_identificacion/update",
                    data: (par_tipo_identificacionManager.coleccion()),
                    type: "post",
                    dataType: "json",
                    cache: false,
                    async: false,
                    success: function (data) {

                        if (data.result) {
                            par_tipo_identificacionManager.listas();
                            par_tipo_identificacionManager.destroyDataTable();
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
                    url: Routers.url + "index.php/modules/par/par_tipo_identificacion/delete",
                    type: "post",
                    dataType: "json",
                    data: ({
                        "ti_idti": id
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



                            par_tipo_identificacionManager.listas();
                            par_tipo_identificacionManager.destroyDataTable();
                        }
                    }
                });

            },
            listar: function (options) {


            }
        }
    },
    pac: function (data) {

        $("#div_lista_par_tipo_identificacion").hide();
        $("#form_par_tipo_identificacion").show("slow").siblings().hide(1000);


        if (typeof data == "undefined" || data == null) {
            $("#ti_idti").val("");
            $("#ti_nombre").val("");

        } else {
            $("#form_par_tipo_identificacion input").addClass("input-llenos");
            $("#ti_idti").val(data.ti_idti);
            $("#ti_nombre").val(data.ti_nombre);


        }

    },
    // listamos los registros
    listas_refresh: function () {

    },
    listas: function () {


        $("#form_par_tipo_identificacion").hide("slow");
        $("#div_lista_par_tipo_identificacion").show("slow").siblings().hide(1000);


        $.ajax({
            type: "GET",
            url: Routers.url + "index.php/modules/par/par_tipo_identificacion/get_all",
            dataType: "json",
            cache: !0,
            success: function (data) {

                $("#div_lista_par_tipo_identificacion").html("<table class='table table-striped table-bordered table-full-width' id='datatable_par_tipo_identificacion'></table>");

                oTablepar_tipo_identificacion = $("#datatable_par_tipo_identificacion").dataTable({
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

                        /* parend the grade to the default row class name */
                        //alert(aData)
                        $("#datatable_par_tipo_identificacion_wrapper .dataTables_filter input").addClass("form-control").attr("placeholder", "Buscar...");
                        // modify table search input

                        // modify table per page dropdown
                        //$("#datatable_par_tipo_identificacion .dataTables_length select").selectpicker();



                        var par_tipo_identificacionIndex = aData.ti_idti;
                        $("td:eq(2)", nRow).empty();
                        $(".options-par_tipo_identificacion").children().clone().appendTo($("td:eq(2)", nRow)).find(".edit-par_tipo_identificacion").attr("data-id", par_tipo_identificacionIndex).off().on("click", function () {

                            subViewElement = $(this);
                            subViewContent = subViewElement.attr("href");
                            var id = subViewElement.data("id");

                            par_tipo_identificacionManager.crud().buscarId(id);

                        }).end().find(".eliminar-par_tipo_identificacion").data("id", par_tipo_identificacionIndex).off().on("click", function () {
                            var target_row = $(this).closest("tr").get(0);
                            var id = $(this).data("id");
                            bootbox.confirm("Desea eliminar este registro?", function (result) {
                                if (result) {
                                    par_tipo_identificacionManager.crud().eliminar(id);
                                }
                            });
                        }).end().find(".nuevo-par_tipo_identificacion").off().on("click", function () {
                            subViewElement = $(this);
                            subViewContent = subViewElement.attr("href");


                        });

                    },
                    "aaData": data,
                    "aoColumns": [
                        {"mDataProp": "ti_idti", "sTitle": "ID", "bSortable": false},
                        {"mDataProp": "ti_nombre", "sTitle": "ti_nombre", "bSortable": false},
                        {"mDataProp": "ti_idti", "sTitle": "Options", "sClass": "center"}
                    ],
                    "aoColumnDefs": [{
                            bSortable: false,
                            aTargets: [0, -1]
                        }],
//                    "aaSorting": [
//                        [0, "asc"]
//                    ]
                });



                $("#datatable_par_tipo_identificacion tbody").on("click", "tr", function () {

                    if ($(this).hasClass("selected")) {
                        $(this).removeClass("selected");
                    }
                    else {
                        oTablepar_tipo_identificacion.$("tr.selected").removeClass("selected");
                        $(this).addClass("selected");
                    }
                });

            },
            async: !0
        });

    },
    buscarIdContextMenu: function (id) {
        $.ajax({
            url: par_tipo_identificacionManager.base() + "index.php/modules/par/par_tipo_identificacion/get_by_id",
            cache: false,
            dataType: "json",
            data: ({
                "ro_idroles": id
            }),
            success: function (data) {
                par_tipo_identificacionManager.pac(data);
            }
        });
    },
    buscarId: function (id) {
        //var data = par_tipo_identificacionManager.crud().buscarId(id);
        $.ajax({
            url: par_tipo_identificacionManager.base() + "index.php/modules/par/par_tipo_identificacion/get_by_id",
            cache: false,
            dataType: "json",
            data: ({
                ti_idti: id
            }),
            success: function (data) {
                par_tipo_identificacionManager.pac(data);
            }
        });

    },
    pac_coleccion: function (data) {
        return {
            ti_idti: $("#ti_idti").val(),
            ti_nombre: $("#ti_nombre").val(),
        };
    },
    coleccion: function () {
        return {
            ti_idti: $("#ti_idti").val(),
            ti_nombre: $("#ti_nombre").val(),
        };
    },
    eliminar: function () {
        if (par_tipo_identificacionManager.coleccion().ti_idti != "")
            par_tipo_identificacionManager.crud.eliminar(par_tipo_identificacionManager.coleccion());
    },
    eliminarContexMenu: function (id) {
        $.ajax({
            url: par_tipo_identificacionManager.base() + "index.php/modules/par/par_tipo_identificacion/get_by_id",
            cache: false,
            dataType: "json",
            data: ({
                ti_idti: id
            }),
            success: function (data) {
                if (data != null) {
                    par_tipo_identificacionManager.crud().eliminar(data);
                }
            }
        });
    },
    destroyDataTable: function ()
    {
        if (oTablepar_tipo_identificacion != null)
            oTablepar_tipo_identificacion.fnDestroy();
        //Remove all the DOM elements
        $("#datatable_par_tipo_identificacion").remove();

    },
    nuevo: function () {


        $("#ti_nombre").focus();



        $("#div_lista_par_tipo_identificacion").hide();
        $("#form_par_tipo_identificacion").show("slow").siblings().hide(1000);


        $("#ti_idti").val("");
        $("#ti_nombre").val("");


        $("#par_tipo_identificacion_guardar").prop("disabled", false);
        $("#par_tipo_identificacion_listar").prop("disabled", false);
        $("#par_tipo_identificacion_eliminar").prop("disabled", false);

        $("#par_tipo_identificacion_table_tbody tbody tr").removeClass("active");
    },
    guardar: function () {
        $("#par_tipo_identificacion_guardar").attr("disabled", true).html("<i class='fa fa-refresh fa-spin'></i> Procesando...");
        var requestType = par_tipo_identificacionManager.coleccion().ro_idroles == "" ? "create" : "update";
        if (requestType == "create")
            par_tipo_identificacionManager.crud().guardar();
        else
            par_tipo_identificacionManager.crud().editar();
    },
    runFormValidation: function (el) {

        var formpar_tipo_identificacion = $("#form_par_tipo_identificacion");
        formpar_tipo_identificacion.validate({
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

                var requestType = par_tipo_identificacionManager.coleccion().ti_idti == "" ? "create" : "update";
                if (requestType == "create")
                    par_tipo_identificacionManager.crud().guardar();
                else
                    par_tipo_identificacionManager.crud().editar();

            }
        });

    }

};



$(document).ready(function () {


    par_tipo_identificacionManager.runFormValidation();
    par_tipo_identificacionManager.listas();



    $(document).on("click", "#par_tipo_identificacion_nuevo", function (e) {
        par_tipo_identificacionManager.nuevo();
        e.preventDefault();
        e.stopPropagation();
    });

    $(document).on("click", "#par_tipo_identificacion_listar", function (e) {
        par_tipo_identificacionManager.listas();
        e.preventDefault();
        e.stopPropagation();
    });

    $(document).on("click", "#par_tipo_identificacion_guardar", function (e) {
        $("#form_par_tipo_identificacion").submit();
        e.preventDefault();
        e.stopPropagation();
        e.stopImmediatePropagation();
    });

});