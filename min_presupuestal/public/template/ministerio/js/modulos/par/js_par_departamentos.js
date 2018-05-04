var oTablepar_departamentos;
    var col_par_departamentos;
    var fn_par_departamentos = function () {
        var  par_departamentosManager = {
            // Returns the url of the parlication server of a demo web par.
            base: function () {
                return Routers.url;
            },
            crud: function () {
                return {
                    buscarId: function (id) {
                        $.ajax({
                            url: Routers.url + "index.php/modules/par/par_departamentos/get_by_id",
                            cache: false,
                            dataType: "json",
                            data: ({
                                de_iddepartamento: id
                            }),
                            success: function (data) {
                                par_departamentosManager.pac(data);
                            }
                        });
                    },
                    guardar: function () {
                        $.blockUI({
                            message: "<i class='fa fa-spinner fa-spin'></i>Enviendo peticion ..."
                        });
                        $.ajax({
                            url: par_departamentosManager.base() + "index.php/modules/par/par_departamentos/create",
                            data: (par_departamentosManager.coleccion()),
                            type: "post",
                            dataType: "json",
                            cache: false,
                            async: false,
                            success: function (data) {
                                $.unblockUI();
                                if (data.result) {
                                    par_departamentosManager.listas();
                                    par_departamentosManager.destroyDataTable();
                                }
                                toastr.success(data.content);

                            },
                            complete: function () {
                                //  $(".containerBlock > form").waitMe("hide");                  
                                setInterval(function () {

                                }, 2000);
                            },
                        });

                    },
                    editar: function () {
                        $.blockUI({
                            message: "<i class='fa fa-spinner fa-spin'></i>Enviendo peticion ..."
                        });

                        $.ajax({
                            url: par_departamentosManager.base() + "index.php/modules/par/par_departamentos/update",
                            data: (par_departamentosManager.coleccion()),
                            type: "post",
                            dataType: "json",
                            cache: false,
                            async: false,
                            success: function (data) {
                                $.unblockUI();
                                if (data.result) {
                                    par_departamentosManager.listas();
                                    par_departamentosManager.destroyDataTable();
                                }
                                toastr.success(data.content);

                            },
                            complete: function () {
                                //  $(".containerBlock > form").waitMe("hide");                  
                                setInterval(function () {

                                }, 2000);
                            },
                        });

                    },
                    eliminar: function (id) {

                        $.blockUI({
                            message: "<i class='fa fa-spinner fa-spin'></i> En ejecucion..."
                        });

                        $.ajax({
                            url: Routers.url + "index.php/modules/par/par_departamentos/delete",
                            type: "post",
                            dataType: "json",
                            data: ({
                                "de_iddepartamento": id
                            }),
                            success: function (data) {
                                $.unblockUI();
                                if (data.result) {
                                    toastr.success(data.content);
                                    par_departamentosManager.listas();
                                    par_departamentosManager.destroyDataTable();
                                }
                            }
                        });

                    },
                    listar: function (options) {


                    }
                }
            },
            pac: function (data) {

                $(".form-par_departamentos .help-block").remove();
                $(".form-par_departamentos .form-group").removeClass("has-error").removeClass("has-success");
                $(".form-par_departamentos input").removeClass("input-llenos");
                if (typeof data == "undefined" || data == null) {
                    $("#de_iddepartamento").val("");
$("#de_nombre").val("");
$("#de_pais").val("");

                } else {
                    $(".form-par_departamentos input").addClass("input-llenos");
                    $("#de_iddepartamento").val(data.de_iddepartamento);
$("#de_nombre").val(data.de_nombre);
$("#de_pais").val(data.de_pais);


                }

            },
            // listamos los registros
            listas_refresh: function () {

            },
            listas: function () {

                $.ajax({
                    type: "GET",
                    url: Routers.url + "index.php/modules/par/par_departamentos/get_all",
                    dataType: "json",
                    cache: !0,
                    success: function (data) {

                        $("#par_departamentos").append("<table class='table table-striped table-bordered table-full-width' id='datatable_par_departamentos'></table>");
                    
                        oTablepar_departamentos = $("#datatable_par_departamentos").dataTable({
                            "bProcessing": true,
                            "iDisplayLength": 7,
                            "aLengthMenu": [[1, 5, 6, 7, 8, 10, 15, 20, -1], [1, 5, 6, 7, 8, 9, 10, 15, 20, "All"]], // change per page values here
                            "oLanguage": {
                                "sLengthMenu": "_MENU_",
                                "sSearch": "",
                                "oPaginate": {
                                    "sPrevious": "",
                                    "sNext": ""
                                }
                            },
                            "fnRowCallback": function (nRow, aData, iDisplayIndex) {

                                /* parend the grade to the default row class name */
                                //alert(aData)
                                $("#datatable_par_departamentos_wrapper .dataTables_filter input").addClass("form-control").attr("placeholder", "Buscar...");
                                // modify table search input

                                // modify table per page dropdown
                                //$("#datatable_par_departamentos .dataTables_length select").selectpicker();
								
                                
								
                                var par_departamentosIndex = aData.de_iddepartamento;
                                $("td:eq(3)", nRow).empty();
                                $(".options-par_departamentos").children().clone().appendTo($("td:eq(3)", nRow)).find(".edit-par_departamentos").attr("data-id", par_departamentosIndex).off().on("click", function () {

                                    subViewElement = $(this);
                                    subViewContent = subViewElement.attr("href");
                                    var id = subViewElement.data("id");
                                    $.subview({
                                        content: subViewContent,
                                        onShow: function () {

                                        }
                                    });

                                    par_departamentosManager.crud().buscarId(id);

                                }).end().find(".eliminar-par_departamentos").data("id", par_departamentosIndex).off().on("click", function () {
                                    var target_row = $(this).closest("tr").get(0);
                                    var id = $(this).data("id");
                                    bootbox.confirm("Desea eliminar este registro?", function (result) {
										if (result){
                                            par_departamentosManager.crud().eliminar(id);
										}
                                    });
                                }).end().find(".nuevo-par_departamentos").off().on("click", function () {
                                    subViewElement = $(this);
                                    subViewContent = subViewElement.attr("href");
                                    $.subview({
                                        content: subViewContent,
                                        onShow: function () {
                                            $("#de_nombre").focus();

                                        }
                                    });
                                });

                            },
                            "aaData": data,
                            "aoColumns": [
                                {"mDataProp": "de_iddepartamento", "sTitle": "ID", "bSortable": false},
{"mDataProp": "de_nombre", "sTitle": "de_nombre", "bSortable": false},
{"mDataProp": "de_pais", "sTitle": "de_pais", "bSortable": false},
{"mDataProp": "de_iddepartamento", "sTitle": "Options", "sClass": "center"}
                            ],
                            "aoColumnDefs": [{
                                    bSortable: false,
                                    aTargets: [0, -1]
                                }],
//                    "aaSorting": [
//                        [0, "asc"]
//                    ]
                        });


                        $("input[type='checkbox'].grey, input[type='radio'].grey").iCheck({
                            checkboxClass: "icheckbox_minimal-grey",
                            radioClass: "iradio_minimal-grey",
                            increaseArea: "10%" // optional
                        });

                        $("#datatable_par_departamentos tbody").on("click", "tr", function () {

                            if ($(this).hasClass("selected")) {
                                $(this).removeClass("selected");
                            }
                            else {
                                oTablepar_departamentos.$("tr.selected").removeClass("selected");
                                $(this).addClass("selected");
                            }
                        });

                    },
                    async: !0
                });

            },
            buscarIdContextMenu: function (id) {
                $.ajax({
                    url: par_departamentosManager.base() + "index.php/modules/par/par_departamentos/get_by_id",
                    cache: false,
                    dataType: "json",
                    data: ({
                        "ro_idroles": id
                    }),
                    success: function (data) {
                        par_departamentosManager.pac(data);
                    }
                });
            },
            buscarId: function (id) {
                //var data = par_departamentosManager.crud().buscarId(id);
                $.ajax({
                    url: par_departamentosManager.base() + "index.php/modules/par/par_departamentos/get_by_id",
                    cache: false,
                    dataType: "json",
                    data: ({
                        de_iddepartamento: id
                    }),
                    success: function (data) {
                        par_departamentosManager.pac(data);
                    }
                });

            },
            pac_coleccion: function (data) {
                return {
                    de_iddepartamento:$("#de_iddepartamento").val(),
de_nombre:$("#de_nombre").val(),
de_pais:$("#de_pais").val(),

                };
            },
            coleccion: function () {
                return {
                    de_iddepartamento:$("#de_iddepartamento").val(),
de_nombre:$("#de_nombre").val(),
de_pais:$("#de_pais").val(),

                };
            },
            eliminar: function () {
                if (par_departamentosManager.coleccion().de_iddepartamento != "")
                    par_departamentosManager.crud.eliminar(par_departamentosManager.coleccion());
            },
            eliminarContexMenu: function (id) {
                $.ajax({
                    url: par_departamentosManager.base() + "index.php/modules/par/par_departamentos/get_by_id",
                    cache: false,
                    dataType: "json",
                    data: ({
                        de_iddepartamento: id
                    }),
                    success: function (data) {
                        if (data != null) {
                            par_departamentosManager.crud().eliminar(data);
                        }
                    }
                });
            },
            clickSubvistaClose: function () {
                $(".show-sv").on("click", function (e) {
                    subViewElement = $(this);
                    var customOptions = new Object;
                    customOptions.content = subViewElement.attr("href");
                    customOptions.startFrom = subViewElement.data("startfrom"),
                            customOptions.onShow = subViewElement.data("onshow"),
                            customOptions.onHide = subViewElement.data("onhide"),
                            customOptions.onClose = subViewElement.data("onclose");
                    $.subview(customOptions);
                    e.preventDefault();
					
					par_departamentosManager.nuevo();
                });
            },
            destroyDataTable: function ()
            {
                if (oTablepar_departamentos != null)
                    oTablepar_departamentos.fnDestroy();
                //Remove all the DOM elements
                $("#datatable_par_departamentos").remove();

            },
            nuevo: function () {

			
			    $("#de_nombre").focus();
			
			
                $("#de_iddepartamento").val("");
$("#de_nombre").val("");
$("#de_pais").val("");

				
                $("#par_departamentos_guardar").prop("disabled", false);
                $("#par_departamentos_listar").prop("disabled", false);
                $("#par_departamentos_eliminar").prop("disabled", false);
                $("#window_permisos input,select").removeClass("input-active-form");
				$(".form-par_departamentos input").removeClass("input-llenos");
                $(".form-par_departamentos select").removeClass("input-llenos");
                $("#par_departamentos_table_tbody tbody tr").removeClass("active");
            },
            guardar: function () {
                $("#par_departamentos_guardar").attr("disabled", true).html("<i class='fa fa-refresh fa-spin'></i> Procesando...");
                var requestType = par_departamentosManager.coleccion().ro_idroles == "" ? "create" : "update";
                if (requestType == "create")
                    par_departamentosManager.crud().guardar();
                else
                    par_departamentosManager.crud().editar();
            },
            runFormValidation: function (el) {

                var formpar_departamentos = $(".form-par_departamentos");
                formpar_departamentos.validate({
                    errorElement: "span", // contain the error msg in a span tag
                    errorClass: "help-block",
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

                        var requestType = par_departamentosManager.coleccion().de_iddepartamento == "" ? "create" : "update";
                        if (requestType == "create")
                            par_departamentosManager.crud().guardar();
                        else
                            par_departamentosManager.crud().editar();

                    }
                });

            }

        };

        return {
            init: function () {
                par_departamentosManager.clickSubvistaClose(), par_departamentosManager.runFormValidation(), par_departamentosManager.listas()
            }
        }

    }();

    $(document).ready(function () {
        fn_par_departamentos.init();
    });