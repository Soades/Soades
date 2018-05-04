var oTableadm_tipo_matriculas;
var col_adm_tipo_matriculas;


var adm_tipo_matriculasManager = {
    // Returns the url of the admlication server of a demo web adm.
    base: function() {
        return Routers.url;
    },
    crud: function() {
        return {
            buscarId: function(id) {
                $.ajax({
                    url: Routers.url + "index.php/modules/adm/adm_tipo_matriculas/get_by_id",
                    cache: false,
                    dataType: "json",
                    data: ({
                        tm_idtm: id
                    }),
                    success: function(data) {
                        adm_tipo_matriculasManager.pac(data);
                    }
                });
            },
            guardar: function() {


                $.ajax({
                    url: adm_tipo_matriculasManager.base() + "index.php/modules/adm/adm_tipo_matriculas/create",
                    data: (adm_tipo_matriculasManager.coleccion()),
                    type: "post",
                    dataType: "json",
                    cache: false,
                    async: false,
                    success: function(data) {

                        if (data.result) {
                            adm_tipo_matriculasManager.listas();
                            adm_tipo_matriculasManager.destroyDataTable();
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
                    url: adm_tipo_matriculasManager.base() + "index.php/modules/adm/adm_tipo_matriculas/update",
                    data: (adm_tipo_matriculasManager.coleccion()),
                    type: "post",
                    dataType: "json",
                    cache: false,
                    async: false,
                    success: function(data) {

                        if (data.result) {
                            adm_tipo_matriculasManager.listas();
                            adm_tipo_matriculasManager.destroyDataTable();
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
                    url: Routers.url + "index.php/modules/adm/adm_tipo_matriculas/delete",
                    type: "post",
                    dataType: "json",
                    data: ({
                        "tm_idtm": id
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



                            adm_tipo_matriculasManager.listas();
                            adm_tipo_matriculasManager.destroyDataTable();
                        }
                    }
                });

            },
            listar: function(options) {


            }
        }
    },
    pac: function(data) {

        $("#div_lista_adm_tipo_matriculas").hide();
        $("#form_adm_tipo_matriculas").show("slow").siblings().hide(1000);


        if (typeof data == "undefined" || data == null) {
            $("#tm_idtm").val("");
            $("#tm_nombre").val("");
            $("#tm_orden").val("");

        } else {
            $("#form_adm_tipo_matriculas input").addClass("input-llenos");
            $("#tm_idtm").val(data.tm_idtm);
            $("#tm_nombre").val(data.tm_nombre);
            $("#tm_orden").val(data.tm_orden);


        }

    },
    // listamos los registros
    listas_refresh: function() {

    },
    listas: function() {


        $("#form_adm_tipo_matriculas").hide("slow");
        $("#div_lista_adm_tipo_matriculas").show("slow").siblings().hide(1000);


        $.ajax({
            type: "GET",
            url: Routers.url + "index.php/modules/adm/adm_tipo_matriculas/get_all",
            dataType: "json",
            cache: !0,
            success: function(data) {

                $("#div_lista_adm_tipo_matriculas").html("<table class='table table-striped table-bordered table-full-width' id='datatable_adm_tipo_matriculas'></table>");

                oTableadm_tipo_matriculas = $("#datatable_adm_tipo_matriculas").dataTable({
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
                        $("#datatable_adm_tipo_matriculas_wrapper .dataTables_filter input").addClass("form-control").attr("placeholder", "Buscar...");
                        // modify table search input

                        // modify table per page dropdown
                        //$("#datatable_adm_tipo_matriculas .dataTables_length select").selectpicker();



                        var adm_tipo_matriculasIndex = aData.tm_idtm;
                        $("td:eq(3)", nRow).empty();
                        $(".options-adm_tipo_matriculas").children().clone().appendTo($("td:eq(3)", nRow)).find(".edit-adm_tipo_matriculas").attr("data-id", adm_tipo_matriculasIndex).off().on("click", function() {

                            subViewElement = $(this);
                            subViewContent = subViewElement.attr("href");
                            var id = subViewElement.data("id");

                            adm_tipo_matriculasManager.crud().buscarId(id);

                        }).end().find(".eliminar-adm_tipo_matriculas").data("id", adm_tipo_matriculasIndex).off().on("click", function() {
                            var target_row = $(this).closest("tr").get(0);
                            var id = $(this).data("id");
                            bootbox.confirm("Desea eliminar este registro?", function(result) {
                                if (result) {
                                    adm_tipo_matriculasManager.crud().eliminar(id);
                                }
                            });
                        }).end().find(".nuevo-adm_tipo_matriculas").off().on("click", function() {
                            subViewElement = $(this);
                            subViewContent = subViewElement.attr("href");


                        });

                    },
                    "aaData": data,
                    "aoColumns": [
                        {"mDataProp": "tm_idtm", "sTitle": "ID", "bSortable": false},
                        {"mDataProp": "tm_nombre", "sTitle": "Nombre", "bSortable": false},
                        {"mDataProp": "tm_orden", "sTitle": "Orden", "bSortable": false},
                        {"mDataProp": "tm_idtm", "sTitle": "Options", "sClass": "center"}
                    ],
                    "aoColumnDefs": [{
                            bSortable: false,
                            aTargets: [0, -1]
                        }],
//                    "aaSorting": [
//                        [0, "asc"]
//                    ]
                });



                $("#datatable_adm_tipo_matriculas tbody").on("click", "tr", function() {

                    if ($(this).hasClass("selected")) {
                        $(this).removeClass("selected");
                    }
                    else {
                        oTableadm_tipo_matriculas.$("tr.selected").removeClass("selected");
                        $(this).addClass("selected");
                    }
                });

            },
            async: !0
        });

    },
    buscarIdContextMenu: function(id) {
        $.ajax({
            url: adm_tipo_matriculasManager.base() + "index.php/modules/adm/adm_tipo_matriculas/get_by_id",
            cache: false,
            dataType: "json",
            data: ({
                "ro_idroles": id
            }),
            success: function(data) {
                adm_tipo_matriculasManager.pac(data);
            }
        });
    },
    buscarId: function(id) {
        //var data = adm_tipo_matriculasManager.crud().buscarId(id);
        $.ajax({
            url: adm_tipo_matriculasManager.base() + "index.php/modules/adm/adm_tipo_matriculas/get_by_id",
            cache: false,
            dataType: "json",
            data: ({
                tm_idtm: id
            }),
            success: function(data) {
                adm_tipo_matriculasManager.pac(data);
            }
        });

    },
    pac_coleccion: function(data) {
        return {
            tm_idtm: $("#tm_idtm").val(),
            tm_nombre: $("#tm_nombre").val(),
            tm_orden: $("#tm_orden").val(),
        };
    },
    coleccion: function() {
        return {
            tm_idtm: $("#tm_idtm").val(),
            tm_nombre: $("#tm_nombre").val(),
            tm_orden: $("#tm_orden").val(),
        };
    },
    eliminar: function() {
        if (adm_tipo_matriculasManager.coleccion().tm_idtm != "")
            adm_tipo_matriculasManager.crud.eliminar(adm_tipo_matriculasManager.coleccion());
    },
    eliminarContexMenu: function(id) {
        $.ajax({
            url: adm_tipo_matriculasManager.base() + "index.php/modules/adm/adm_tipo_matriculas/get_by_id",
            cache: false,
            dataType: "json",
            data: ({
                tm_idtm: id
            }),
            success: function(data) {
                if (data != null) {
                    adm_tipo_matriculasManager.crud().eliminar(data);
                }
            }
        });
    },
    destroyDataTable: function()
    {
        if (oTableadm_tipo_matriculas != null)
            oTableadm_tipo_matriculas.fnDestroy();
        //Remove all the DOM elements
        $("#datatable_adm_tipo_matriculas").remove();

    },
    nuevo: function() {


        $("#tm_nombre").focus();



        $("#div_lista_adm_tipo_matriculas").hide();
        $("#form_adm_tipo_matriculas").show("slow").siblings().hide(1000);


        $("#tm_idtm").val("");
        $("#tm_nombre").val("");
        $("#tm_orden").val("");


        $("#adm_tipo_matriculas_guardar").prop("disabled", false);
        $("#adm_tipo_matriculas_listar").prop("disabled", false);
        $("#adm_tipo_matriculas_eliminar").prop("disabled", false);

        $("#adm_tipo_matriculas_table_tbody tbody tr").removeClass("active");
    },
    guardar: function() {
        $("#adm_tipo_matriculas_guardar").attr("disabled", true).html("<i class='fa fa-refresh fa-spin'></i> Procesando...");
        var requestType = adm_tipo_matriculasManager.coleccion().tm_idtm == "" ? "create" : "update";
        if (requestType == "create")
            adm_tipo_matriculasManager.crud().guardar();
        else
            adm_tipo_matriculasManager.crud().editar();
    },
    runFormValidation: function(el) {

        var formadm_tipo_matriculas = $("#form_adm_tipo_matriculas");
        formadm_tipo_matriculas.validate({
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
                tm_nombre: {
                    required: true,
                    maxlength: 255
                }

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

                var requestType = adm_tipo_matriculasManager.coleccion().tm_idtm == "" ? "create" : "update";
                if (requestType == "create")
                    adm_tipo_matriculasManager.crud().guardar();
                else
                    adm_tipo_matriculasManager.crud().editar();

            }
        });

    }

};



$(document).ready(function() {


    adm_tipo_matriculasManager.runFormValidation();
    adm_tipo_matriculasManager.listas();



    $(document).on("click", "#adm_tipo_matriculas_nuevo", function(e) {
        adm_tipo_matriculasManager.nuevo();
        e.preventDefault();
        e.stopPropagation();
    });

    $(document).on("click", "#adm_tipo_matriculas_listar", function(e) {
        adm_tipo_matriculasManager.listas();
        e.preventDefault();
        e.stopPropagation();
    });

    $(document).on("click", "#adm_tipo_matriculas_guardar", function(e) {
        $("#form_adm_tipo_matriculas").submit();
        e.preventDefault();
        e.stopPropagation();
        e.stopImmediatePropagation();
    });




});