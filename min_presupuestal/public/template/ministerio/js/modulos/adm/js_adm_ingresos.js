var oTableadm_ingresos;
var col_adm_ingresos;


var adm_ingresosManager = {
    // Returns the url of the admlication server of a demo web adm.
    base: function() {
        return Routers.url;
    },
    crud: function() {
        return {
            buscarId: function(id) {
                $.ajax({
                    url: Routers.url + "index.php/modules/adm/adm_ingresos/get_by_id",
                    cache: false,
                    dataType: "json",
                    data: ({
                        in_idin: id
                    }),
                    success: function(data) {
                        adm_ingresosManager.pac(data);
                    }
                });
            },
            guardar: function() {


                $.ajax({
                    url: adm_ingresosManager.base() + "index.php/modules/adm/adm_ingresos/create",
                    data: (adm_ingresosManager.coleccion()),
                    type: "post",
                    dataType: "json",
                    cache: false,
                    async: false,
                    success: function(data) {

                        if (data.result) {
                            adm_ingresosManager.listas();
                            adm_ingresosManager.destroyDataTable();
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
                    url: adm_ingresosManager.base() + "index.php/modules/adm/adm_ingresos/update",
                    data: (adm_ingresosManager.coleccion()),
                    type: "post",
                    dataType: "json",
                    cache: false,
                    async: false,
                    success: function(data) {

                        if (data.result) {
                            adm_ingresosManager.listas();
                            adm_ingresosManager.destroyDataTable();
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
                    url: Routers.url + "index.php/modules/adm/adm_ingresos/delete",
                    type: "post",
                    dataType: "json",
                    data: ({
                        "in_idin": id
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



                            adm_ingresosManager.listas();
                            adm_ingresosManager.destroyDataTable();
                        }
                    }
                });

            },
            listar: function(options) {


            }
        }
    },
    pac: function(data) {

        $("#div_lista_adm_ingresos").hide();
        $("#form_adm_ingresos").show("slow").siblings().hide(1000);


        if (typeof data == "undefined" || data == null) {
            $("#in_idin").val("");
            $("#in_nombre").val("");

        } else {
            $("#form_adm_ingresos input").addClass("input-llenos");
            $("#in_idin").val(data.in_idin);
            $("#in_nombre").val(data.in_nombre);


        }

    },
    // listamos los registros
    listas_refresh: function() {

    },
    listas: function() {


        $("#form_adm_ingresos").hide("slow");
        $("#div_lista_adm_ingresos").show("slow").siblings().hide(1000);


        $.ajax({
            type: "GET",
            url: Routers.url + "index.php/modules/adm/adm_ingresos/get_all",
            dataType: "json",
            cache: !0,
            success: function(data) {

                $("#div_lista_adm_ingresos").html("<table class='table table-striped table-bordered table-full-width' id='datatable_adm_ingresos'></table>");

                oTableadm_ingresos = $("#datatable_adm_ingresos").dataTable({
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
                        $("#datatable_adm_ingresos_wrapper .dataTables_filter input").addClass("form-control").attr("placeholder", "Buscar...");
                        // modify table search input

                        // modify table per page dropdown
                        //$("#datatable_adm_ingresos .dataTables_length select").selectpicker();



                        var adm_ingresosIndex = aData.in_idin;
                        $("td:eq(2)", nRow).empty();
                        $(".options-adm_ingresos").children().clone().appendTo($("td:eq(2)", nRow)).find(".edit-adm_ingresos").attr("data-id", adm_ingresosIndex).off().on("click", function() {

                            subViewElement = $(this);
                            subViewContent = subViewElement.attr("href");
                            var id = subViewElement.data("id");

                            adm_ingresosManager.crud().buscarId(id);

                        }).end().find(".eliminar-adm_ingresos").data("id", adm_ingresosIndex).off().on("click", function() {
                            var target_row = $(this).closest("tr").get(0);
                            var id = $(this).data("id");
                            bootbox.confirm("Desea eliminar este registro?", function(result) {
                                if (result) {
                                    adm_ingresosManager.crud().eliminar(id);
                                }
                            });
                        }).end().find(".nuevo-adm_ingresos").off().on("click", function() {
                            subViewElement = $(this);
                            subViewContent = subViewElement.attr("href");


                        });

                    },
                    "aaData": data,
                    "aoColumns": [
                        {"mDataProp": "in_idin", "sTitle": "ID", "bSortable": false},
                        {"mDataProp": "in_nombre", "sTitle": "Nombre", "bSortable": false},
                        {"mDataProp": "in_idin", "sTitle": "Options", "sClass": "center"}
                    ],
                    "aoColumnDefs": [{
                            bSortable: false,
                            aTargets: [0, -1]
                        }],
//                    "aaSorting": [
//                        [0, "asc"]
//                    ]
                });



                $("#datatable_adm_ingresos tbody").on("click", "tr", function() {

                    if ($(this).hasClass("selected")) {
                        $(this).removeClass("selected");
                    }
                    else {
                        oTableadm_ingresos.$("tr.selected").removeClass("selected");
                        $(this).addClass("selected");
                    }
                });

            },
            async: !0
        });

    },
    buscarIdContextMenu: function(id) {
        $.ajax({
            url: adm_ingresosManager.base() + "index.php/modules/adm/adm_ingresos/get_by_id",
            cache: false,
            dataType: "json",
            data: ({
                "ro_idroles": id
            }),
            success: function(data) {
                adm_ingresosManager.pac(data);
            }
        });
    },
    buscarId: function(id) {
        //var data = adm_ingresosManager.crud().buscarId(id);
        $.ajax({
            url: adm_ingresosManager.base() + "index.php/modules/adm/adm_ingresos/get_by_id",
            cache: false,
            dataType: "json",
            data: ({
                in_idin: id
            }),
            success: function(data) {
                adm_ingresosManager.pac(data);
            }
        });

    },
    pac_coleccion: function(data) {
        return {
            in_idin: $("#in_idin").val(),
            in_nombre: $("#in_nombre").val(),
        };
    },
    coleccion: function() {
        return {
            in_idin: $("#in_idin").val(),
            in_nombre: $("#in_nombre").val(),
        };
    },
    eliminar: function() {
        if (adm_ingresosManager.coleccion().in_idin != "")
            adm_ingresosManager.crud.eliminar(adm_ingresosManager.coleccion());
    },
    eliminarContexMenu: function(id) {
        $.ajax({
            url: adm_ingresosManager.base() + "index.php/modules/adm/adm_ingresos/get_by_id",
            cache: false,
            dataType: "json",
            data: ({
                in_idin: id
            }),
            success: function(data) {
                if (data != null) {
                    adm_ingresosManager.crud().eliminar(data);
                }
            }
        });
    },
    destroyDataTable: function()
    {
        if (oTableadm_ingresos != null)
            oTableadm_ingresos.fnDestroy();
        //Remove all the DOM elements
        $("#datatable_adm_ingresos").remove();

    },
    nuevo: function() {


        $("#in_nombre").focus();



        $("#div_lista_adm_ingresos").hide();
        $("#form_adm_ingresos").show("slow").siblings().hide(1000);


        $("#in_idin").val("");
        $("#in_nombre").val("");


        $("#adm_ingresos_guardar").prop("disabled", false);
        $("#adm_ingresos_listar").prop("disabled", false);
        $("#adm_ingresos_eliminar").prop("disabled", false);

        $("#adm_ingresos_table_tbody tbody tr").removeClass("active");
    },
    guardar: function() {
        $("#adm_ingresos_guardar").attr("disabled", true).html("<i class='fa fa-refresh fa-spin'></i> Procesando...");
        var requestType = adm_ingresosManager.coleccion().in_idin == "" ? "create" : "update";
        if (requestType == "create")
            adm_ingresosManager.crud().guardar();
        else
            adm_ingresosManager.crud().editar();
    },
    runFormValidation: function(el) {

        var formadm_ingresos = $("#form_adm_ingresos");
        formadm_ingresos.validate({
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
                in_nombre: {
                    required: true,
                    maxlength: 255
                }

            },
            messages: {
                
                in_nombre: {
                    required: "El campo es requerido",
                    maxlength: "El maximo de caracteres para el campo es 100 ",
                },
                 
            },
            submitHandler: function(form) {

                var requestType = adm_ingresosManager.coleccion().in_idin == "" ? "create" : "update";
                if (requestType == "create")
                    adm_ingresosManager.crud().guardar();
                else
                    adm_ingresosManager.crud().editar();

            }
        });

    }

};



$(document).ready(function() {


    adm_ingresosManager.runFormValidation();
    adm_ingresosManager.listas();



    $(document).on("click", "#adm_ingresos_nuevo", function(e) {
        adm_ingresosManager.nuevo();
        e.preventDefault();
        e.stopPropagation();
    });

    $(document).on("click", "#adm_ingresos_listar", function(e) {
        adm_ingresosManager.listas();
        e.preventDefault();
        e.stopPropagation();
    });

    $(document).on("click", "#adm_ingresos_guardar", function(e) {
        $("#form_adm_ingresos").submit();
        e.preventDefault();
        e.stopPropagation();
        e.stopImmediatePropagation();
    });




});