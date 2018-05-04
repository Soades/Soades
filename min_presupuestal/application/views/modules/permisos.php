<?php
error_reporting(null);
$data = array();
if ($permisos != null) {
    foreach ($permisos as $p) {
        $data[(int) $p->pe_idpermiso] = (int) $p->pe_idpermiso;
    }
}

if ($data[5] == 5) {
    ?>

    <script>
        $(document).ready(function () {
            cargar_roles();
            cargar_modulos();
        });

        function guardar(id_permiso)
        {

            var est = 0;
            if ($("#check_" + id_permiso).is(':checked')) {
                est = 1;
            }
            $.ajax({
                url: url + "index.php/permisos/GuardarPermisos",
                global: false,
                type: "POST",
                data: ({op: "P",
                    roles_id: $("#roleid").val(),
                    modulos_id: $("#moduloid").val(),
                    permisos_id: id_permiso,
                    estado: est
                }),
                dataType: "html",
                async: false,
                success: function (data) {
                }
            }).responseText;

        }

        function permisos_roles() //permisos asociados al rol o a los usuarios
        {
            $.ajax({
                url: url + "index.php/permisos/GetPermisosModulosCheck",
                global: false,
                type: "POST",
                data: ({
                    roles_id: $("#roleid").val(),
                    modulos_id: $("#moduloid").val()
                }),
                dataType: "html",
                async: false,
                success: function (data)
                {
                    var perm = data.trim().split(";");
                    for (i = 0; i < perm.length; i++)
                    {
                        $("#tpermisos tr").each(function ()
                        {  // alert($(this).find("td").eq(0).html() + "==" +perm[i]);

                            if ($(this).find("td").eq(0).html() == perm[i])
                            {
                                $("#check_" + $(this).find("td").eq(0).html()).attr('checked', true);
                            }
                        });
                    }
                    //debe recorrer la tabla encontrar el id del permisos y si existe chequear el check si no no!
                }
            }).responseText;
        }

        function permisos_modulos(id)
        {
            $.ajax({
                url: url + "index.php/permisos/GetPermsisosModulos",
                global: false,
                type: "POST",
                data: ({op: "PM",
                    modulos_id: id
                }),
                dataType: "html",
                async: false,
                success: function (data) {
                    $("#dvpermisos").html(data);
                }
            }).responseText;
        }

        function cargar_permisos_roles(roleid, moduloid) {
            $.ajax({
                url: url + "index.php/permisos/GetRolesModulosPermisos",
                global: false,
                type: "POST",
                data: ({roleid: roleid, moduloid: moduloid}),
                dataType: "html",
                async: false,
                success: function (data) {
                    $(".arbol_permisos").html(data);
                }
            }).responseText;
        }

        function modulos(id)  //7851249
        {
            if ($("#roleid").val() != "")
            {
                $("#moduloid").val(id);
                $(".modulos").attr("src", "<?php echo BASE; ?>/resources/images/treeview/plus32.png");
                document.images["immo" + id].src = "<?php echo BASE; ?>/resources/images/treeview/ok.png";
                permisos_modulos(id);
                permisos_roles();
                //cargar_permisos_roles($("#roleid").val(), id);
                //$("#menu_permisos").kendoTreeView();
            } else {
                alert("Seleccione un rol");
            }
            //$("#tpermisos").remove();
        }


        function cargar_modulos()
        {
            $.ajax({
                url: url + "index.php/permisos/GetModulos",
                global: false,
                type: "POST",
                cache: false,
                dataType: "html",
                async: false,
                success: function (data) {
                    $("#modulos").html(data);
                    $('#modulos').jstree({
                        "types": {
                            "default": {
                                "icon": "fa fa-file-text"
                            }
                        },
                        "plugins": ["types"]

                    });
                }
            }).responseText;
        }

        function roles(roleid, rol)  //7851249
        {
            $("#roleid").val(roleid);
            $("#moduloid").val("");
            $(".arbol_permisos").html("");
            $(".modulos").attr("src", "<?php echo BASE; ?>/resources/images/treeview/plus32.png");
            $(".roles").attr("src", "<?php echo BASE; ?>/resources/images/treeview/can.png");
            $("#imgr" + roleid).attr("src", "<?php echo BASE; ?>/resources/images/treeview/ok.png")
        }
		
		
	

        function cargar_roles()
        {

            var contenido = $("#roles");
            $.ajax({
                url: url + "index.php/permisos/GetRolesUsuarios",
                global: false,
                type: "GET",
                cache: false,
                beforeSend: function (data) {
                    contenido.html('<h4 class="ajax-loading-animation"><i class="fa fa-cog fa-spin"></i> Loading...</h4>').delay(50).animate({
                        opacity: "1.0"
                    }, 300);
                },
                dataType: "html",
                async: false,
                success: function (data) {
                    contenido.html(data);
                    $('#roles').jstree({
                        "checkbox": {
                            "keep_selected_style": false
                        },
                        "types": {
                            "default": {
                                "icon": "fa fa-user-plus"
                            },
                            "file": {
                                "icon": "fa fa-user"
                            }
                        },
                        "plugins": ["types", "checkbox"]
                    });
                },
                error: function () {
                    contenido.html('<h4 class="ajax-loading-error"><i class="fa fa-warning txt-color-orangeDark"></i> Error 404! Pagina no funciona.</h4>')
                },
                async : !0
            });


        }



        $(function () {

            $('.row .box-body').css({'height': ($(window).height() - 155) + 'px'});

        });




    </script>

    <div class="row">
        <div class="col-md-4">
            <!-- DIRECT CHAT PRIMARY -->
            <div class="box box-primary direct-chat direct-chat-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Roles</h3>

                </div><!-- /.box-header -->
                <div style="height: 420px;" class="box-body">
                    <div class="tree_roles" id="roles" >

                    </div>



                </div><!-- /.box-body -->
                <input style="display:none;" id="roleid" type="text" />
            </div><!--/.direct-chat -->
        </div><!-- /.col -->

        <div class="col-md-4">
            <!-- DIRECT CHAT SUCCESS -->
            <div class="box box-success direct-chat direct-chat-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Modulos</h3>

                </div><!-- /.box-header -->
                <div style="height: 420px;" class="box-body">
                    <div id="modulos" >

                    </div>
                </div><!-- /.box-body -->
                <input style="display:none;" id="moduloid" type="text" />
            </div><!--/.direct-chat -->
        </div><!-- /.col -->

        <div class="col-md-4">
            <!-- DIRECT CHAT WARNING -->
            <div class="box box-warning direct-chat direct-chat-warning">
                <div class="box-header with-border">
                    <h3 class="box-title">Permisos</h3>

                </div><!-- /.box-header -->
                <div style="height: 420px;" class="box-body">

                    <div id="dvpermisos" >

                    </div>
                    <!-- Conversations are loaded here -->

                </div><!-- /.box-body -->

            </div><!--/.direct-chat -->
        </div><!-- /.col -->

    </div>

<?php } else {
    echo '<i style="font-size:20px;" class="fa fa-fw fa-warning"></i> No tiene permiso de acceso';
} ?>