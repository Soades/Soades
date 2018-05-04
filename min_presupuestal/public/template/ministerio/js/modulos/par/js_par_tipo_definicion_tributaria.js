var oTablepar_tipo_definicion_tributaria;
    var col_par_tipo_definicion_tributaria;
    
	
        var  par_tipo_definicion_tributariaManager = {
            // Returns the url of the parlication server of a demo web par.
            base: function () {
                return Routers.url;
            },
            crud: function () {
                return {
                    buscarId: function (id) {
                        $.ajax({
                            url: Routers.url + "index.php/modules/par/par_tipo_definicion_tributaria/get_by_id",
                            cache: false,
                            dataType: "json",
                            data: ({
                                tdt_idtdt: id
                            }),
                            success: function (data) {
                                par_tipo_definicion_tributariaManager.pac(data);
                            }
                        });
                    },
                    guardar: function () {
                        
						
                        $.ajax({
                            url: par_tipo_definicion_tributariaManager.base() + "index.php/modules/par/par_tipo_definicion_tributaria/create",
                            data: (par_tipo_definicion_tributariaManager.coleccion()),
                            type: "post",
                            dataType: "json",
                            cache: false,
                            async: false,
                            success: function (data) {
                               
                                if (data.result) {
                                    par_tipo_definicion_tributariaManager.listas();
                                    par_tipo_definicion_tributariaManager.destroyDataTable();
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
                            url: par_tipo_definicion_tributariaManager.base() + "index.php/modules/par/par_tipo_definicion_tributaria/update",
                            data: (par_tipo_definicion_tributariaManager.coleccion()),
                            type: "post",
                            dataType: "json",
                            cache: false,
                            async: false,
                            success: function (data) {
                                
                                if (data.result) {
                                    par_tipo_definicion_tributariaManager.listas();
                                    par_tipo_definicion_tributariaManager.destroyDataTable();
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
                            url: Routers.url + "index.php/modules/par/par_tipo_definicion_tributaria/delete",
                            type: "post",
                            dataType: "json",
                            data: ({
                                "tdt_idtdt": id
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
						                            
									
									
                                    par_tipo_definicion_tributariaManager.listas();
                                    par_tipo_definicion_tributariaManager.destroyDataTable();
                                }
                            }
                        });

                    },
                    listar: function (options) {


                    }
                }
            },
            pac: function (data) {

                $("#div_lista_par_tipo_definicion_tributaria").hide();
                $("#form_par_tipo_definicion_tributaria").show("slow").siblings().hide(1000);
            
				
                if (typeof data == "undefined" || data == null) {
                    $("#tdt_idtdt").val("");
$("#tdt_descripcion").val("");
$("#tdt_anulado").iCheck("uncheck");

                } else {
                    $("#form_par_tipo_definicion_tributaria input").addClass("input-llenos");
                    $("#tdt_idtdt").val(data.tdt_idtdt);
$("#tdt_descripcion").val(data.tdt_descripcion);
$("#tdt_anulado").iCheck((data.tdt_anulado == 1) ? "check" : "uncheck");


                }

            },
            // listamos los registros
            listas_refresh: function () {

            },
            listas: function () {
				
				
				$("#form_par_tipo_definicion_tributaria").hide("slow");
                $("#div_lista_par_tipo_definicion_tributaria").show("slow").siblings().hide(1000);
            

                $.ajax({
                    type: "GET",
                    url: Routers.url + "index.php/modules/par/par_tipo_definicion_tributaria/get_all",
                    dataType: "json",
                    cache: !0,
                    success: function (data) {

                        $("#div_lista_par_tipo_definicion_tributaria").html("<table class='table table-striped table-bordered table-full-width' id='datatable_par_tipo_definicion_tributaria'></table>");
                    
                        oTablepar_tipo_definicion_tributaria = $("#datatable_par_tipo_definicion_tributaria").dataTable({                            
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
                                $("#datatable_par_tipo_definicion_tributaria_wrapper .dataTables_filter input").addClass("form-control").attr("placeholder", "Buscar...");
                                // modify table search input

                                // modify table per page dropdown
                                //$("#datatable_par_tipo_definicion_tributaria .dataTables_length select").selectpicker();
								
                                $("td:eq(3)", nRow).html('<label class="flat-grey foocheck"><input ' + (aData.ro_estado == 1 ? "checked" : "") + ' type="checkbox" value="" class="grey"></label>');
								
                                var par_tipo_definicion_tributariaIndex = aData.tdt_idtdt;
                                $("td:eq(4)", nRow).empty();
                                $(".options-par_tipo_definicion_tributaria").children().clone().appendTo($("td:eq(4)", nRow)).find(".edit-par_tipo_definicion_tributaria").attr("data-id", par_tipo_definicion_tributariaIndex).off().on("click", function () {

                                    subViewElement = $(this);
                                    subViewContent = subViewElement.attr("href");
                                    var id = subViewElement.data("id");
                                    
                                    par_tipo_definicion_tributariaManager.crud().buscarId(id);

                                }).end().find(".eliminar-par_tipo_definicion_tributaria").data("id", par_tipo_definicion_tributariaIndex).off().on("click", function () {
                                    var target_row = $(this).closest("tr").get(0);
                                    var id = $(this).data("id");
                                    bootbox.confirm("Desea eliminar este registro?", function (result) {
										if (result){
                                            par_tipo_definicion_tributariaManager.crud().eliminar(id);
										}
                                    });
                                }).end().find(".nuevo-par_tipo_definicion_tributaria").off().on("click", function () {
                                    subViewElement = $(this);
                                    subViewContent = subViewElement.attr("href");
									
                                    
                                });

                            },
                            "aaData": data,
                            "aoColumns": [
                                {"mDataProp": "tdt_idtdt", "sTitle": "ID", "bSortable": false},
{"mDataProp": "tdt_sufijo", "sTitle": "tdt_sufijo", "bSortable": false},
{"mDataProp": "tdt_descripcion", "sTitle": "tdt_descripcion", "bSortable": false},
{"mDataProp": "tdt_anulado", "sTitle": "tdt_anulado", "bSortable": false},
{"mDataProp": "tdt_idtdt", "sTitle": "Options", "sClass": "center"}
                            ],
                            "aoColumnDefs": [{
                                    bSortable: false,
                                    aTargets: [0, -1]
                                }],
//                    "aaSorting": [
//                        [0, "asc"]
//                    ]
                        });

						

                        $("#datatable_par_tipo_definicion_tributaria tbody").on("click", "tr", function () {

                            if ($(this).hasClass("selected")) {
                                $(this).removeClass("selected");
                            }
                            else {
                                oTablepar_tipo_definicion_tributaria.$("tr.selected").removeClass("selected");
                                $(this).addClass("selected");
                            }
                        });

                    },
                    async: !0
                });

            },
            buscarIdContextMenu: function (id) {
                $.ajax({
                    url: par_tipo_definicion_tributariaManager.base() + "index.php/modules/par/par_tipo_definicion_tributaria/get_by_id",
                    cache: false,
                    dataType: "json",
                    data: ({
                        "ro_idroles": id
                    }),
                    success: function (data) {
                        par_tipo_definicion_tributariaManager.pac(data);
                    }
                });
            },
            buscarId: function (id) {
                //var data = par_tipo_definicion_tributariaManager.crud().buscarId(id);
                $.ajax({
                    url: par_tipo_definicion_tributariaManager.base() + "index.php/modules/par/par_tipo_definicion_tributaria/get_by_id",
                    cache: false,
                    dataType: "json",
                    data: ({
                        tdt_idtdt: id
                    }),
                    success: function (data) {
                        par_tipo_definicion_tributariaManager.pac(data);
                    }
                });

            },
            pac_coleccion: function (data) {
                return {
                    tdt_idtdt:$("#tdt_idtdt").val(),
tdt_descripcion:$("#tdt_descripcion").val(),
tdt_anulado:$("#tdt_anulado").is(":checked") ? 1 : 0,

                };
            },
            coleccion: function () {
                return {
                    tdt_idtdt:$("#tdt_idtdt").val(),
tdt_descripcion:$("#tdt_descripcion").val(),
tdt_anulado:$("#tdt_anulado").is(":checked") ? 1 : 0,

                };
            },
            eliminar: function () {
                if (par_tipo_definicion_tributariaManager.coleccion().tdt_idtdt != "")
                    par_tipo_definicion_tributariaManager.crud.eliminar(par_tipo_definicion_tributariaManager.coleccion());
            },
            eliminarContexMenu: function (id) {
                $.ajax({
                    url: par_tipo_definicion_tributariaManager.base() + "index.php/modules/par/par_tipo_definicion_tributaria/get_by_id",
                    cache: false,
                    dataType: "json",
                    data: ({
                        tdt_idtdt: id
                    }),
                    success: function (data) {
                        if (data != null) {
                            par_tipo_definicion_tributariaManager.crud().eliminar(data);
                        }
                    }
                });
            },
            
            destroyDataTable: function ()
            {
                if (oTablepar_tipo_definicion_tributaria != null)
                    oTablepar_tipo_definicion_tributaria.fnDestroy();
                //Remove all the DOM elements
                $("#datatable_par_tipo_definicion_tributaria").remove();

            },
            nuevo: function () {

			
			    $("#tdt_sufijo").focus();



	            $("#div_lista_par_tipo_definicion_tributaria").hide();
                $("#form_par_tipo_definicion_tributaria").show("slow").siblings().hide(1000);

			
                $("#tdt_idtdt").val("");
$("#tdt_descripcion").val("");
$("#tdt_anulado").iCheck("uncheck");

				
                $("#par_tipo_definicion_tributaria_guardar").prop("disabled", false);
                $("#par_tipo_definicion_tributaria_listar").prop("disabled", false);
                $("#par_tipo_definicion_tributaria_eliminar").prop("disabled", false);
                
                $("#par_tipo_definicion_tributaria_table_tbody tbody tr").removeClass("active");
            },
            guardar: function () {
                $("#par_tipo_definicion_tributaria_guardar").attr("disabled", true).html("<i class='fa fa-refresh fa-spin'></i> Procesando...");
                var requestType = par_tipo_definicion_tributariaManager.coleccion().ro_idroles == "" ? "create" : "update";
                if (requestType == "create")
                    par_tipo_definicion_tributariaManager.crud().guardar();
                else
                    par_tipo_definicion_tributariaManager.crud().editar();
            },
            runFormValidation: function (el) {

                var formpar_tipo_definicion_tributaria = $("#form_par_tipo_definicion_tributaria");
                formpar_tipo_definicion_tributaria.validate({
                    
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

                        var requestType = par_tipo_definicion_tributariaManager.coleccion().tdt_idtdt == "" ? "create" : "update";
                        if (requestType == "create")
                            par_tipo_definicion_tributariaManager.crud().guardar();
                        else
                            par_tipo_definicion_tributariaManager.crud().editar();

                    }
                });

            }

        };

		

    $(document).ready(function () {

	
		par_tipo_definicion_tributariaManager.runFormValidation();
		par_tipo_definicion_tributariaManager.listas();
		
		
		
		$(document).on("click", "#par_tipo_definicion_tributaria_nuevo", function (e) {
			par_tipo_definicion_tributariaManager.nuevo();
			e.preventDefault();
			e.stopPropagation();
		});

		$(document).on("click", "#par_tipo_definicion_tributaria_listar", function (e) {
			par_tipo_definicion_tributariaManager.listas();
			e.preventDefault();
			e.stopPropagation();
		});

		$(document).on("click", "#par_tipo_definicion_tributaria_guardar", function (e) {
			$("#form_par_tipo_definicion_tributaria").submit();
			e.preventDefault();
			e.stopPropagation();
			e.stopImmediatePropagation();
		});
		
		
		
		
    });