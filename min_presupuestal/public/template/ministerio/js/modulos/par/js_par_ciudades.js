var oTablepar_ciudades;
    var col_par_ciudades;
    var fn_par_ciudades = function () {
        var  par_ciudadesManager = {
            // Returns the url of the parlication server of a demo web par.
            base: function () {
                return Routers.url;
            },
            crud: function () {
                return {
                    buscarId: function (id) {
                        $.ajax({
                            url: Routers.url + "index.php/modules/par/par_ciudades/get_by_id",
                            cache: false,
                            dataType: "json",
                            data: ({
                                ci_idciudad: id
                            }),
                            success: function (data) {
                                par_ciudadesManager.pac(data);
                            }
                        });
                    },
                    guardar: function () {
                        $.blockUI({
                            message: "<i class='fa fa-spinner fa-spin'></i>Enviendo peticion ..."
                        });
                        $.ajax({
                            url: par_ciudadesManager.base() + "index.php/modules/par/par_ciudades/create",
                            data: (par_ciudadesManager.coleccion()),
                            type: "post",
                            dataType: "json",
                            cache: false,
                            async: false,
                            success: function (data) {
                                $.unblockUI();
                                if (data.result) {
                                    par_ciudadesManager.listas();
                                    par_ciudadesManager.destroyDataTable();
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
                            url: par_ciudadesManager.base() + "index.php/modules/par/par_ciudades/update",
                            data: (par_ciudadesManager.coleccion()),
                            type: "post",
                            dataType: "json",
                            cache: false,
                            async: false,
                            success: function (data) {
                                $.unblockUI();
                                if (data.result) {
                                    par_ciudadesManager.listas();
                                    par_ciudadesManager.destroyDataTable();
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
                            url: Routers.url + "index.php/modules/par/par_ciudades/delete",
                            type: "post",
                            dataType: "json",
                            data: ({
                                "ci_idciudad": id
                            }),
                            success: function (data) {
                                $.unblockUI();
                                if (data.result) {
                                    toastr.success(data.content);
                                    par_ciudadesManager.listas();
                                    par_ciudadesManager.destroyDataTable();
                                }
                            }
                        });

                    },
                    listar: function (options) {


                    }
                }
            },
            pac: function (data) {

                $(".form-par_ciudades .help-block").remove();
                $(".form-par_ciudades .form-group").removeClass("has-error").removeClass("has-success");
                $(".form-par_ciudades input").removeClass("input-llenos");
                if (typeof data == "undefined" || data == null) {
                    $("#ci_departamento").val("");
$("#ci_idciudad").val("");
$("#ci_nombre").val("");
$("#ci_sync").iCheck("uncheck");
                } else {
                    $(".form-par_ciudades input").addClass("input-llenos");
                    $("#ci_departamento").val(data.ci_departamento);
$("#ci_idciudad").val(data.ci_idciudad);
$("#ci_nombre").val(data.ci_nombre);
$("#ci_sync").iCheck((data.ci_sync == 1) ? "check" : "uncheck");

                }

            },
            // listamos los registros
            listas_refresh: function () {

            },
            listas: function () {

                $.ajax({
                    type: "GET",
                    url: Routers.url + "index.php/modules/par/par_ciudades/get_all",
                    dataType: "json",
                    cache: !0,
                    success: function (data) {

                        $("#par_ciudades").append("<table class='table table-striped table-bordered table-full-width' id='datatable_par_ciudades'></table>");
                    
                        oTablepar_ciudades = $("#datatable_par_ciudades").dataTable({
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
                                $("#datatable_par_ciudades_wrapper .dataTables_filter input").addClass("form-control").attr("placeholder", "Buscar...");
                                // modify table search input

                                // modify table per page dropdown
                                //$("#datatable_par_ciudades .dataTables_length select").selectpicker();
								
                                $("td:eq(3)", nRow).html('<label class="flat-grey foocheck"><input ' + (aData.ro_estado == 1 ? "checked" : "") + ' type="checkbox" value="" class="grey"></label>');
								
                                var par_ciudadesIndex = aData.ci_idciudad;
                                $("td:eq(4)", nRow).empty();
                                $(".options-par_ciudades").children().clone().appendTo($("td:eq(4)", nRow)).find(".edit-par_ciudades").attr("data-id", par_ciudadesIndex).off().on("click", function () {

                                    subViewElement = $(this);
                                    subViewContent = subViewElement.attr("href");
                                    var id = subViewElement.data("id");
                                    $.subview({
                                        content: subViewContent,
                                        onShow: function () {

                                        }
                                    });

                                    par_ciudadesManager.crud().buscarId(id);

                                }).end().find(".eliminar-par_ciudades").data("id", par_ciudadesIndex).off().on("click", function () {
                                    var target_row = $(this).closest("tr").get(0);
                                    var id = $(this).data("id");
                                    bootbox.confirm("Desea eliminar este registro?", function (result) {
										if (result){
                                            par_ciudadesManager.crud().eliminar(id);
										}
                                    });
                                }).end().find(".nuevo-par_ciudades").off().on("click", function () {
                                    subViewElement = $(this);
                                    subViewContent = subViewElement.attr("href");
                                    $.subview({
                                        content: subViewContent,
                                        onShow: function () {
                                            $("#ci_idciudad").focus();

                                        }
                                    });
                                });

                            },
                            "aaData": data,
                            "aoColumns": [
                                {"mDataProp": "ci_departamento", "sTitle": "ci_departamento", "bSortable": false},
{"mDataProp": "ci_idciudad", "sTitle": "ID", "bSortable": false},
{"mDataProp": "ci_nombre", "sTitle": "ci_nombre", "bSortable": false},
{"mDataProp": "ci_sync", "sTitle": "ci_sync", "bSortable": false},
{"mDataProp": "ci_idciudad", "sTitle": "Options", "sClass": "center"}
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

                        $("#datatable_par_ciudades tbody").on("click", "tr", function () {

                            if ($(this).hasClass("selected")) {
                                $(this).removeClass("selected");
                            }
                            else {
                                oTablepar_ciudades.$("tr.selected").removeClass("selected");
                                $(this).addClass("selected");
                            }
                        });

                    },
                    async: !0
                });

            },
            buscarIdContextMenu: function (id) {
                $.ajax({
                    url: par_ciudadesManager.base() + "index.php/modules/par/par_ciudades/get_by_id",
                    cache: false,
                    dataType: "json",
                    data: ({
                        "ro_idroles": id
                    }),
                    success: function (data) {
                        par_ciudadesManager.pac(data);
                    }
                });
            },
            buscarId: function (id) {
                //var data = par_ciudadesManager.crud().buscarId(id);
                $.ajax({
                    url: par_ciudadesManager.base() + "index.php/modules/par/par_ciudades/get_by_id",
                    cache: false,
                    dataType: "json",
                    data: ({
                        ci_idciudad: id
                    }),
                    success: function (data) {
                        par_ciudadesManager.pac(data);
                    }
                });

            },
            pac_coleccion: function (data) {
                return {
                    ci_departamento:$("#ci_departamento").val(),
ci_idciudad:$("#ci_idciudad").val(),
ci_nombre:$("#ci_nombre").val(),
ci_sync:$("#ci_sync").is(":checked") ? 1 : 0,

                };
            },
            coleccion: function () {
                return {
                    ci_departamento:$("#ci_departamento").val(),
ci_idciudad:$("#ci_idciudad").val(),
ci_nombre:$("#ci_nombre").val(),
ci_sync:$("#ci_sync").is(":checked") ? 1 : 0,

                };
            },
            eliminar: function () {
                if (par_ciudadesManager.coleccion().ci_idciudad != "")
                    par_ciudadesManager.crud.eliminar(par_ciudadesManager.coleccion());
            },
            eliminarContexMenu: function (id) {
                $.ajax({
                    url: par_ciudadesManager.base() + "index.php/modules/par/par_ciudades/get_by_id",
                    cache: false,
                    dataType: "json",
                    data: ({
                        ci_idciudad: id
                    }),
                    success: function (data) {
                        if (data != null) {
                            par_ciudadesManager.crud().eliminar(data);
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
					
					par_ciudadesManager.nuevo();
                });
            },
            destroyDataTable: function ()
            {
                if (oTablepar_ciudades != null)
                    oTablepar_ciudades.fnDestroy();
                //Remove all the DOM elements
                $("#datatable_par_ciudades").remove();

            },
            nuevo: function () {

			
			    $("#ci_idciudad").focus();
			
			
                $("#ci_departamento").val("");
$("#ci_idciudad").val("");
$("#ci_nombre").val("");
$("#ci_sync").iCheck("uncheck");
				
                $("#par_ciudades_guardar").prop("disabled", false);
                $("#par_ciudades_listar").prop("disabled", false);
                $("#par_ciudades_eliminar").prop("disabled", false);
                $("#window_permisos input,select").removeClass("input-active-form");
				$(".form-par_ciudades input").removeClass("input-llenos");
                $(".form-par_ciudades select").removeClass("input-llenos");
                $("#par_ciudades_table_tbody tbody tr").removeClass("active");
            },
            guardar: function () {
                $("#par_ciudades_guardar").attr("disabled", true).html("<i class='fa fa-refresh fa-spin'></i> Procesando...");
                var requestType = par_ciudadesManager.coleccion().ro_idroles == "" ? "create" : "update";
                if (requestType == "create")
                    par_ciudadesManager.crud().guardar();
                else
                    par_ciudadesManager.crud().editar();
            },
            runFormValidation: function (el) {

                var formpar_ciudades = $(".form-par_ciudades");
                formpar_ciudades.validate({
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

                        var requestType = par_ciudadesManager.coleccion().ci_idciudad == "" ? "create" : "update";
                        if (requestType == "create")
                            par_ciudadesManager.crud().guardar();
                        else
                            par_ciudadesManager.crud().editar();

                    }
                });

            }

        };

        return {
            init: function () {
                par_ciudadesManager.clickSubvistaClose(), par_ciudadesManager.runFormValidation(), par_ciudadesManager.listas()
            }
        }

    }();

    $(document).ready(function () {
        fn_par_ciudades.init();
    });