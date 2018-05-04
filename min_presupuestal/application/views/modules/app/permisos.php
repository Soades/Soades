<link href="<?php echo BASE; ?>public/template/metro/assets/global/plugins/jstree/dist/themes/default/style.min.css" rel="stylesheet" type="text/css" />
<script src="<?php echo BASE; ?>public/template/metro/assets/global/plugins/jstree/dist/jstree.min.js" type="text/javascript"></script>
<!--<script src="<?php echo BASE; ?>public/template/metro/assets/pages/scripts/ui-tree.min.js" type="text/javascript"></script>-->



<script>


    var images_resources = url + "public/template/ministerio/images/treeview/";



    
    
    
    
    
    
    
    $(document).ready(function () {
        cargar_roles();
        cargar_modulos();

    });
//public/template/desktop/images/treeview/

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
                $('#roles').jstree();
            },
            error: function () {
                contenido.html('<h4 class="ajax-loading-error"><i class="fa fa-warning txt-color-orangeDark"></i> Error 404! Pagina no funciona.</h4>')
            },
            async : !0
        });
    }


    function cargar_modulos()
    {

        var contenido = $("#modulos");
        $.ajax({
            url: url + "index.php/permisos/GetModulosPages",
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
                contenido.jstree();
            },
            error: function () {
                contenido.html('<h4 class="ajax-loading-error"><i class="fa fa-warning txt-color-orangeDark"></i> Error 404! Pagina no funciona.</h4>')
            },
            async : !0
        });
    }


    $("#app_nuevo_permisos").click(function () {
        nuevo();
    });

    function nuevo()
    {
        $("#modalidad_permisos").val("");
        $("#roleid").val("");
        $("#usuariosid").val("");
        $("#moduloid").val("");
        $(".roles").attr("src", images_resources + "can.png");
        $(".usuarios").attr("src", images_resources + "can.png");
        //cargar_roles();
    }

    function roles(roleid, rol)  //7851249
    {
        $("#modalidad_permisos").val("roles");
        $("#roleid").val(roleid);
        $("#moduloid").val("");
        $(".arbol_permisos").html("");
        $(".modulos").attr("src", images_resources + "can.png");
        $(".modulos_pages").attr("src", images_resources + "modulos.png");
        $(".roles").attr("src", images_resources + "can.png");
        $("#imgr" + roleid).attr("src", images_resources + "ok.png");
        $(".cl_rol_" + roleid).attr("src", images_resources + "ok.png");
    }

    function usuarios(roleid, usuariosid, rol)  //7851249
    {
        $("#modalidad_permisos").val("usuarios");
        $("#roleid").val(roleid);
        $("#usuariosid").val(usuariosid);
        $("#moduloid").val("");
        $(".arbol_permisos").html("");
        $(".modulos").attr("src", images_resources + "modulos.png");
        $(".modulos_pages").attr("src", images_resources + "modulos.png");
        $(".roles").attr("src", images_resources + "can.png");
        $(".usuarios").attr("src", images_resources + "can.png");
        $("#imgu" + usuariosid).attr("src", images_resources + "ok.png");
    }

    function modulos(id, moduloid)  //7851249
    {
        if ($("#roleid").val() != "")
        {
            $("#moduloid").val(id);
            $(".modulos").attr("src", images_resources + "can.png");
            $(".modulos_pages").attr("src", images_resources + "modulos.png");
            // document.images["immo_pages" + id].src = url+"public/template/desktop/images/treeview/ok.png";
            $("#immo" + moduloid).attr("src", images_resources + "modulos_ok.png");
            $("#immo_pages" + id).attr("src", images_resources + "ok.png");
            permisos_modulos(id);
            if ($("#modalidad_permisos").val() == "roles") {
                permisos_roles();
            } else if ($("#modalidad_permisos").val() == "usuarios") {
                permisos_usuarios();
            } else {
                permisos_roles();
            }

            //cargar_permisos_roles($("#roleid").val(), id);
            //$("#menu_permisos").kendoTreeView();
        } else {
            alert("Seleccione un rol");
        }
        //$("#tpermisos").remove();
    }


    function permisos_modulos(id)
    {
        $.ajax({
            url: url + "index.php/permisos/GetPermisosModulos",
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
            dataType: "json",
            async: false,
            success: function (data)
            {
                var estado = true;
                $.each(data, function (index, pac) {
                    $("#tpermisos tr").each(function ()
                    {
                        if ($(this).find("td").eq(0).html() == pac.mp_permiso_id)
                        {
                            estado = pac.pr_permitir == 1 ? true : false;
                            $("#check_" + pac.mp_permiso_id).attr('checked', estado);
                        }
                    });
                });
            }
        })
    }


    function permisos_usuarios() //permisos asociados al usuario
    {
        $.ajax({
            url: url + "index.php/permisos/GetPermisosModulosUsuariosCheck",
            global: false,
            type: "POST",
            data: ({
                roles_id: $("#roleid").val(),
                modulos_id: $("#moduloid").val(),
                usuario_id: $("#usuariosid").val()
            }),
            dataType: "json",
            async: false,
            success: function (data)
            {
                var estado = true;
                $.each(data, function (index, pac) {
                    $("#tpermisos tr").each(function ()
                    {
                        if ($(this).find("td").eq(0).html() == pac.mp_permiso_id)
                        {
                            estado = pac.mpu_permitir == 1 ? true : false;
                            $("#check_" + pac.mp_permiso_id).attr('checked', estado);
                        }
                    });
                });
            }
        })
    }




    function guardar_permisos_usuarios(id_permiso) //permisos asociados al usuario
    {
        var est = 0;
        if ($("#check_" + id_permiso).is(':checked')) {
            est = 1;
        }
        $.ajax({
            url: url + "index.php/permisos/GuardarPermisosUsuarios",
            global: false,
            type: "POST",
            data: ({
                roles_id: $("#roleid").val(),
                modulos_id: $("#moduloid").val(),
                usuariosid: $("#usuariosid").val(),
                permisos_id: id_permiso,
                estado: est
            }),
            dataType: "html",
            async: false,
            success: function (data) {
            }
        }).responseText;

    }


    function guardar(id_permiso) {

        if ($("#modalidad_permisos").val() == "roles")
        {
            guardar_permisos_roles(id_permiso)

        } else if ($("#modalidad_permisos").val() == "usuarios")
        {
            guardar_permisos_usuarios(id_permiso);
        }

    }


    function guardar_permisos_roles(id_permiso)
    {
        var est = 0;
        if ($("#check_" + id_permiso).is(':checked')) {
            est = 1;
        }
        $.ajax({
            url: url + "index.php/permisos/GuardarPermisos",
            global: false,
            type: "POST",
            data: ({
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



   
    



</script>










<style>

</style>

<input style="display:none;" id="usuariosid" type="text" />
<input style="display:none;" id="moduloid" type="text" />
<input style="display:none;" id="roleid" type="text" />
<input style="display:none;" id="modalidad_permisos" type="text" />
    
<div class="content-app fixed-header">
    <!-- app header -->
    <div class="app-header">
<!--        <div class="pull-right">
            <a class="btn btn-default" role="button">Left</a>
            <a class="btn btn-default" role="button">Midle</a>
            <a class="btn btn-default" role="button">Right</a>
        </div>
        -->
        <ol class="breadcrumb bg-none pull-left hide-xs">
            <li><a href="#">Seguridad</a></li>
            <li><a href="#">Creacion de permisos</a></li>
            <li class="active">Permisos</li>
        </ol>
        <!-- <h3 class="app-title">Drop App Modules</h3> -->
    </div><!-- /app header -->

    <!-- app body -->
    <div class="app-body">

        <!-- app content here -->
        <div class="magic-layout isotope" style="position: relative; overflow: hidden; height: 1223px;">

            <div class="col-md-5" >

                <div id="panel1" class="panel panel-default magic-element isotope-item" >
                    <div class="panel-heading">
                        <div class="panel-icon"><i class="icon ion-navicon-round"></i></div>
                        <div class="panel-actions">
                            <a role="button" data-refresh="#panel1" title="refresh" class="btn btn-sm btn-icon">
                                <i class="icon ion-refresh"></i>
                            </a>
                            <a role="button" data-expand="#panel1" title="expand" class="btn btn-sm btn-icon">
                                <i class="icon ion-arrow-resize"></i>
                            </a>
                            <a role="button" data-collapse="#panel1" title="collapse" class="btn btn-sm btn-icon">
                                <i class="icon ion-chevron-down"></i>
                            </a>
                            <a role="button" data-close="#panel1" title="close" class="btn btn-sm btn-icon">
                                <i class="icon ion-close-round"></i>
                            </a>
                        </div><!-- /panel-actions -->
                        <h3 class="panel-title">Roles</h3>
                    </div><!-- /panel-heading -->
                    <div style="    overflow-x: auto;
                         overflow-y: auto; width: 100%" class="panel-body">
                        <div class="tree_roles " id="roles" >	   


                        </div>
                     
                    </div><!-- /panel-body -->
                </div><!-- /panel-default -->


            </div>

            <div class="col-md-4" >


                <div id="panel1" class="panel panel-default magic-element isotope-item" style="position: absolute; left: 0px; top: 0px; transform: translate3d(0px, 0px, 0px);">
                    <div class="panel-heading">
                        <div class="panel-icon"><i class="icon ion-navicon-round"></i></div>
                        <div class="panel-actions">
                            <a role="button" data-refresh="#panel1" title="refresh" class="btn btn-sm btn-icon">
                                <i class="icon ion-refresh"></i>
                            </a>
                            <a role="button" data-expand="#panel1" title="expand" class="btn btn-sm btn-icon">
                                <i class="icon ion-arrow-resize"></i>
                            </a>
                            <a role="button" data-collapse="#panel1" title="collapse" class="btn btn-sm btn-icon">
                                <i class="icon ion-chevron-down"></i>
                            </a>
                            <a role="button" data-close="#panel1" title="close" class="btn btn-sm btn-icon">
                                <i class="icon ion-close-round"></i>
                            </a>
                        </div><!-- /panel-actions -->
                        <h3 class="panel-title">Modulos</h3>
                    </div><!-- /panel-heading -->
                    <div style="    overflow-x: auto;
                         overflow-y: auto; width: 100%" class="panel-body">

                        <div class="tree_roles" id="modulos" >
                        </div>
                 
                    </div><!-- /panel-body -->
                </div><!-- /panel-default -->


            </div>

            <div class="col-md-3" >

                <div id="panel1" class="panel panel-default magic-element isotope-item" style="position: absolute; left: 0px; top: 0px; transform: translate3d(0px, 0px, 0px);">
                    <div class="panel-heading">
                        <div class="panel-icon"><i class="icon ion-navicon-round"></i></div>
                        <div class="panel-actions">
                            <a role="button" data-refresh="#panel1" title="refresh" class="btn btn-sm btn-icon">
                                <i class="icon ion-refresh"></i>
                            </a>
                            <a role="button" data-expand="#panel1" title="expand" class="btn btn-sm btn-icon">
                                <i class="icon ion-arrow-resize"></i>
                            </a>
                            <a role="button" data-collapse="#panel1" title="collapse" class="btn btn-sm btn-icon">
                                <i class="icon ion-chevron-down"></i>
                            </a>
                            <a role="button" data-close="#panel1" title="close" class="btn btn-sm btn-icon">
                                <i class="icon ion-close-round"></i>
                            </a>
                        </div><!-- /panel-actions -->
                        <h3 class="panel-title">Permisos</h3>
                    </div><!-- /panel-heading -->
                    <div  style="    overflow-x: auto;
                          overflow-y: auto; width: 100%" class="panel-body">

                        <div id="dvpermisos" ></div>


                    </div><!-- /panel-body -->
                </div><!-- /panel-default -->

            </div>





        </div><!-- /magic-layout -->

    </div><!-- /app body -->
</div>