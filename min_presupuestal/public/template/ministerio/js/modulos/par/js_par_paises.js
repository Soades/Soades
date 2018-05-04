var oTablepar_paises;
var col_par_paises;


var par_paisesManager = {
    // Returns the url of the parlication server of a demo web par.
    base: function() {
        return Routers.url;
    },
    crud: function() {
        return {
            buscarId: function(id) {
                $.ajax({
                    url: Routers.url + "index.php/modules/par/par_paises/get_by_id",
                    cache: false,
                    dataType: "json",
                    data: ({
                        pa_idpais: id
                    }),
                    success: function(data) {
                        par_paisesManager.pac(data);
                    }
                });
            },
            guardar: function() {


                $.ajax({
                    url: par_paisesManager.base() + "index.php/modules/par/par_paises/save",
                    data: (par_paisesManager.coleccion()),
                    type: "post",
                    dataType: "json",
                    cache: false,
                    async: false,
                    success: function(data) {

                        if (data.result) {
                            par_paisesManager.listas();
                            par_paisesManager.destroyDataTable();
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
                    url: par_paisesManager.base() + "index.php/modules/par/par_paises/update",
                    data: (par_paisesManager.coleccion()),
                    type: "post",
                    dataType: "json",
                    cache: false,
                    async: false,
                    success: function(data) {

                        if (data.result) {
                            par_paisesManager.listas();
                            par_paisesManager.destroyDataTable();
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
                    url: Routers.url + "index.php/modules/par/par_paises/delete",
                    type: "post",
                    dataType: "json",
                    data: ({
                        "pa_idpais": id
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



                            par_paisesManager.listas();
                            par_paisesManager.destroyDataTable();
                        }
                    }
                });

            },
            listar: function(options) {


            }
        }
    },
    pac: function(data) {

        $("#div_lista_par_paises").hide();
        $("#form_par_paises").show("slow").siblings().hide(1000);


        if (typeof data == "undefined" || data == null) {
            $("#pa_idpais").val("");
            $("#pa_nombre").val("");

        } else {
            $("#form_par_paises input").addClass("input-llenos");
            $("#pa_idpais").attr("disabled",true);
            $("#pa_idpais").val(data.pa_idpais);
            $("#pa_nombre").val(data.pa_nombre);


        }

    },
    // listamos los registros
    listas_refresh: function() {

    },
    listas: function() {


        $("#form_par_paises").hide("slow");
        $("#div_lista_par_paises").show("slow").siblings().hide(1000);


        $.ajax({
            type: "GET",
            url: Routers.url + "index.php/modules/par/par_paises/get_all",
            dataType: "json",
            cache: !0,
            success: function(data) {

                $("#div_lista_par_paises").html("<table class='table table-striped table-bordered table-full-width' id='datatable_par_paises'></table>");

                oTablepar_paises = $("#datatable_par_paises").dataTable({
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
                        $("#datatable_par_paises_wrapper .dataTables_filter input").addClass("form-control").attr("placeholder", "Buscar...");
                        // modify table search input

                        // modify table per page dropdown
                        //$("#datatable_par_paises .dataTables_length select").selectpicker();



                        var par_paisesIndex = aData.pa_idpais;
                        $("td:eq(2)", nRow).empty();
                        $(".options-par_paises").children().clone().appendTo($("td:eq(2)", nRow)).find(".edit-par_paises").attr("data-id", par_paisesIndex).off().on("click", function() {

                            subViewElement = $(this);
                            subViewContent = subViewElement.attr("href");
                            var id = subViewElement.data("id");

                            par_paisesManager.crud().buscarId(id);

                        }).end().find(".eliminar-par_paises").data("id", par_paisesIndex).off().on("click", function() {
                            var target_row = $(this).closest("tr").get(0);
                            var id = $(this).data("id");
                            bootbox.confirm("Desea eliminar este registro?", function(result) {
                                if (result) {
                                    par_paisesManager.crud().eliminar(id);
                                }
                            });
                        }).end().find(".nuevo-par_paises").off().on("click", function() {
                            subViewElement = $(this);
                            subViewContent = subViewElement.attr("href");


                        });

                    },
                    "aaData": data,
                    "aoColumns": [
                        {"mDataProp": "pa_idpais", "sTitle": "ID", "bSortable": false},
                        {"mDataProp": "pa_nombre", "sTitle": "pa_nombre", "bSortable": false},
                        {"mDataProp": "pa_idpais", "sTitle": "Options", "sClass": "center"}
                    ],
                    "aoColumnDefs": [{
                            bSortable: false,
                            aTargets: [0, -1]
                        }],
//                    "aaSorting": [
//                        [0, "asc"]
//                    ]
                });



                $("#datatable_par_paises tbody").on("click", "tr", function() {

                    if ($(this).hasClass("selected")) {
                        $(this).removeClass("selected");
                    }
                    else {
                        oTablepar_paises.$("tr.selected").removeClass("selected");
                        $(this).addClass("selected");
                    }
                });

            },
            async: !0
        });

    },
    buscarIdContextMenu: function(id) {
        $.ajax({
            url: par_paisesManager.base() + "index.php/modules/par/par_paises/get_by_id",
            cache: false,
            dataType: "json",
            data: ({
                "ro_idroles": id
            }),
            success: function(data) {
                par_paisesManager.pac(data);
            }
        });
    },
    buscarId: function(id) {
        //var data = par_paisesManager.crud().buscarId(id);
        $.ajax({
            url: par_paisesManager.base() + "index.php/modules/par/par_paises/get_by_id",
            cache: false,
            dataType: "json",
            data: ({
                pa_idpais: id
            }),
            success: function(data) {
                par_paisesManager.pac(data);
            }
        });

    },
    pac_coleccion: function(data) {
        return {
            pa_idpais: $("#pa_idpais").val(),
            pa_nombre: $("#pa_nombre").val(),
        };
    },
    coleccion: function() {
        return {
            pa_idpais: $("#pa_idpais").val(),
            pa_nombre: $("#pa_nombre").val(),
        };
    },
    eliminar: function() {
        if (par_paisesManager.coleccion().pa_idpais != "")
            par_paisesManager.crud.eliminar(par_paisesManager.coleccion());
    },
    eliminarContexMenu: function(id) {
        $.ajax({
            url: par_paisesManager.base() + "index.php/modules/par/par_paises/get_by_id",
            cache: false,
            dataType: "json",
            data: ({
                pa_idpais: id
            }),
            success: function(data) {
                if (data != null) {
                    par_paisesManager.crud().eliminar(data);
                }
            }
        });
    },
    destroyDataTable: function()
    {
        if (oTablepar_paises != null)
            oTablepar_paises.fnDestroy();
        //Remove all the DOM elements
        $("#datatable_par_paises").remove();

    },
    nuevo: function() {


        $("#pa_nombre").focus();



        $("#div_lista_par_paises").hide();
        $("#form_par_paises").show("slow").siblings().hide(1000);

        $("#pa_idpais").attr("disabled",false);
        $("#pa_idpais").val("");
        $("#pa_nombre").val("");


        $("#par_paises_guardar").prop("disabled", false);
        $("#par_paises_listar").prop("disabled", false);
        $("#par_paises_eliminar").prop("disabled", false);

        $("#par_paises_table_tbody tbody tr").removeClass("active");
    },
    guardar: function() {
        
            par_paisesManager.crud().guardar();
     
    },
    runFormValidation: function(el) {

        var formpar_paises = $("#form_par_paises");
        formpar_paises.validate({
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
                pa_idpais: {
                    required: true,       
                    digits: true,
                },
                
                pa_nombre: {
                    required: true,                    
                },
                
            },
            messages: {
                pa_idpais: {
                    required: "El campo es requerido",
                    digits: "El campo acepta solo numeros",
                },
                pa_nombre: {
                    required: "El campo es requerido",
                },
                
                
            },
            submitHandler: function(form) {
 
                    par_paisesManager.crud().guardar();
                    

            }
        });

    }

};



$(document).ready(function() {


    par_paisesManager.runFormValidation();
    par_paisesManager.listas();



    $(document).on("click", "#par_paises_nuevo", function(e) {
        par_paisesManager.nuevo();
        e.preventDefault();
        e.stopPropagation();
    });

    $(document).on("click", "#par_paises_listar", function(e) {
        par_paisesManager.listas();
        e.preventDefault();
        e.stopPropagation();
    });

    $(document).on("click", "#par_paises_guardar", function(e) {
        $("#form_par_paises").submit();
        e.preventDefault();
        e.stopPropagation();
        e.stopImmediatePropagation();
    });




});