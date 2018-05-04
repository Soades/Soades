var oTablepar_mes;
var col_par_mes;


var par_mesManager = {
    // Returns the url of the parlication server of a demo web par.
    base: function () {
        return Routers.url;
    },
    crud: function () {
        return {
            buscarId: function (id) {
                $.ajax({
                    url: Routers.url + "index.php/modules/par/par_mes/get_by_id",
                    cache: false,
                    dataType: "json",
                    data: ({
                        me_idmes: id
                    }),
                    success: function (data) {
                        par_mesManager.pac(data);
                    }
                });
            },
            guardar: function () {


                $.ajax({
                    url: par_mesManager.base() + "index.php/modules/par/par_mes/create",
                    data: (par_mesManager.coleccion()),
                    type: "post",
                    dataType: "json",
                    cache: false,
                    async: false,
                    success: function (data) {

                        if (data.result) {
                            par_mesManager.listas();
                            par_mesManager.destroyDataTable();
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
                    url: par_mesManager.base() + "index.php/modules/par/par_mes/update",
                    data: (par_mesManager.coleccion()),
                    type: "post",
                    dataType: "json",
                    cache: false,
                    async: false,
                    success: function (data) {

                        if (data.result) {
                            par_mesManager.listas();
                            par_mesManager.destroyDataTable();
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
                    url: Routers.url + "index.php/modules/par/par_mes/delete",
                    type: "post",
                    dataType: "json",
                    data: ({
                        "me_idmes": id
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



                            par_mesManager.listas();
                            par_mesManager.destroyDataTable();
                        }
                    }
                });

            },
            listar: function (options) {


            }
        }
    },
    pac: function (data) {

        $("#div_lista_par_mes").hide();
        $("#form_par_mes").show("slow").siblings().hide(1000);


        if (typeof data == "undefined" || data == null) {
            $("#me_idmes").val("");
            $("#me_codigo").val("");
            $("#me_nombre").val("");
            $("#me_orden").val("");

        } else {
            $("#form_par_mes input").addClass("input-llenos");
            $("#me_idmes").val(data.me_idmes);
            $("#me_codigo").val(data.me_codigo);
            $("#me_nombre").val(data.me_nombre);
            $("#me_orden").val(data.me_orden);


        }

    },
    // listamos los registros
    listas_refresh: function () {

    },
    listas: function () {


        $("#form_par_mes").hide("slow");
        $("#div_lista_par_mes").show("slow").siblings().hide(1000);


        $.ajax({
            type: "GET",
            url: Routers.url + "index.php/modules/par/par_mes/get_all",
            dataType: "json",
            cache: !0,
            success: function (data) {

                $("#div_lista_par_mes").html("<table class='table table-striped table-bordered table-full-width' id='datatable_par_mes'></table>");

                oTablepar_mes = $("#datatable_par_mes").dataTable({
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
                        $("#datatable_par_mes_wrapper .dataTables_filter input").addClass("form-control").attr("placeholder", "Buscar...");
                        // modify table search input

                        // modify table per page dropdown
                        //$("#datatable_par_mes .dataTables_length select").selectpicker();



                        var par_mesIndex = aData.me_idmes;
                        $("td:eq(4)", nRow).empty();
                        $(".options-par_mes").children().clone().appendTo($("td:eq(4)", nRow)).find(".edit-par_mes").attr("data-id", par_mesIndex).off().on("click", function () {

                            subViewElement = $(this);
                            subViewContent = subViewElement.attr("href");
                            var id = subViewElement.data("id");

                            par_mesManager.crud().buscarId(id);

                        }).end().find(".eliminar-par_mes").data("id", par_mesIndex).off().on("click", function () {
                            var target_row = $(this).closest("tr").get(0);
                            var id = $(this).data("id");
                            bootbox.confirm("Desea eliminar este registro?", function (result) {
                                if (result) {
                                    par_mesManager.crud().eliminar(id);
                                }
                            });
                        }).end().find(".nuevo-par_mes").off().on("click", function () {
                            subViewElement = $(this);
                            subViewContent = subViewElement.attr("href");


                        });

                    },
                    "aaData": data,
                    "aoColumns": [
                        {"mDataProp": "me_idmes", "sTitle": "ID", "bSortable": false},
                        {"mDataProp": "me_codigo", "sTitle": "me_codigo", "bSortable": false},
                        {"mDataProp": "me_nombre", "sTitle": "me_nombre", "bSortable": false},
                        {"mDataProp": "me_orden", "sTitle": "me_orden", "bSortable": false},
                        {"mDataProp": "me_idmes", "sTitle": "Options", "sClass": "center"}
                    ],
                    "aoColumnDefs": [{
                            bSortable: false,
                            aTargets: [0, -1]
                        }],
//                    "aaSorting": [
//                        [0, "asc"]
//                    ]
                });



                $("#datatable_par_mes tbody").on("click", "tr", function () {

                    if ($(this).hasClass("selected")) {
                        $(this).removeClass("selected");
                    }
                    else {
                        oTablepar_mes.$("tr.selected").removeClass("selected");
                        $(this).addClass("selected");
                    }
                });

            },
            async: !0
        });

    },
    buscarIdContextMenu: function (id) {
        $.ajax({
            url: par_mesManager.base() + "index.php/modules/par/par_mes/get_by_id",
            cache: false,
            dataType: "json",
            data: ({
                "ro_idroles": id
            }),
            success: function (data) {
                par_mesManager.pac(data);
            }
        });
    },
    buscarId: function (id) {
        //var data = par_mesManager.crud().buscarId(id);
        $.ajax({
            url: par_mesManager.base() + "index.php/modules/par/par_mes/get_by_id",
            cache: false,
            dataType: "json",
            data: ({
                me_idmes: id
            }),
            success: function (data) {
                par_mesManager.pac(data);
            }
        });

    },
    pac_coleccion: function (data) {
        return {
            me_idmes: $("#me_idmes").val(),
            me_codigo: $("#me_codigo").val(),
            me_nombre: $("#me_nombre").val(),
            me_orden: $("#me_orden").val(),
        };
    },
    coleccion: function () {
        return {
            me_idmes: $("#me_idmes").val(),
            me_codigo: $("#me_codigo").val(),
            me_nombre: $("#me_nombre").val(),
            me_orden: $("#me_orden").val(),
        };
    },
    eliminar: function () {
        if (par_mesManager.coleccion().me_idmes != "")
            par_mesManager.crud.eliminar(par_mesManager.coleccion());
    },
    eliminarContexMenu: function (id) {
        $.ajax({
            url: par_mesManager.base() + "index.php/modules/par/par_mes/get_by_id",
            cache: false,
            dataType: "json",
            data: ({
                me_idmes: id
            }),
            success: function (data) {
                if (data != null) {
                    par_mesManager.crud().eliminar(data);
                }
            }
        });
    },
    destroyDataTable: function ()
    {
        if (oTablepar_mes != null)
            oTablepar_mes.fnDestroy();
        //Remove all the DOM elements
        $("#datatable_par_mes").remove();

    },
    nuevo: function () {


        $("#me_codigo").focus();



        $("#div_lista_par_mes").hide();
        $("#form_par_mes").show("slow").siblings().hide(1000);


        $("#me_idmes").val("");
        $("#me_codigo").val("");
        $("#me_nombre").val("");
        $("#me_orden").val("");


        $("#par_mes_guardar").prop("disabled", false);
        $("#par_mes_listar").prop("disabled", false);
        $("#par_mes_eliminar").prop("disabled", false);

        $("#par_mes_table_tbody tbody tr").removeClass("active");
    },
    guardar: function () {
        $("#par_mes_guardar").attr("disabled", true).html("<i class='fa fa-refresh fa-spin'></i> Procesando...");
        var requestType = par_mesManager.coleccion().ro_idroles == "" ? "create" : "update";
        if (requestType == "create")
            par_mesManager.crud().guardar();
        else
            par_mesManager.crud().editar();
    },
    runFormValidation: function (el) {

        var formpar_mes = $("#form_par_mes");
        formpar_mes.validate({
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

                var requestType = par_mesManager.coleccion().me_idmes == "" ? "create" : "update";
                if (requestType == "create")
                    par_mesManager.crud().guardar();
                else
                    par_mesManager.crud().editar();

            }
        });

    }

};



$(document).ready(function () {


    par_mesManager.runFormValidation();
    par_mesManager.listas();



    $(document).on("click", "#par_mes_nuevo", function (e) {
        par_mesManager.nuevo();
        e.preventDefault();
        e.stopPropagation();
    });

    $(document).on("click", "#par_mes_listar", function (e) {
        par_mesManager.listas();
        e.preventDefault();
        e.stopPropagation();
    });

    $(document).on("click", "#par_mes_guardar", function (e) {
        $("#form_par_mes").submit();
        e.preventDefault();
        e.stopPropagation();
        e.stopImmediatePropagation();
    });




});