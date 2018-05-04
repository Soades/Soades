<?php
header('Content-Type: text/html; charset=UTF-8');
?>
<!DOCTYPE PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//ES" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="es" id="extr-page">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

        <title> SmartAdmin</title>

        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

        <!-- #CSS Links -->
        <!-- Basic Styles -->
        <link rel="stylesheet" type="text/css" media="screen" href="<?= base_url(); ?>public/template/smart/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" media="screen" href="<?= base_url(); ?>public/template/smart/css/font-awesome.min.css">

        <!-- SmartAdmin Styles : Caution! DO NOT change the order -->
        <link rel="stylesheet" type="text/css" media="screen" href="<?= base_url(); ?>public/template/smart/css/smartadmin-production-plugins.min.css">
        <link rel="stylesheet" type="text/css" media="screen" href="<?= base_url(); ?>public/template/smart/css/smartadmin-production.min.css">
        <link rel="stylesheet" type="text/css" media="screen" href="<?= base_url(); ?>public/template/smart/css/smartadmin-skins.min.css">

        <!-- SmartAdmin RTL Support -->
        <link rel="stylesheet" type="text/css" media="screen" href="<?= base_url(); ?>public/template/smart/css/smartadmin-rtl.min.css"> 

        <!-- We recommend you use "your_style.css" to override SmartAdmin
             specific styles this will also ensure you retrain your customization with each SmartAdmin update.
        <link rel="stylesheet" type="text/css" media="screen" href="css/your_style.css"> -->
        <link rel="stylesheet" type="text/css" media="screen" href="<?= base_url(); ?>public/template/ministerio/css/login/base.css">
        <link rel="stylesheet" type="text/css" media="screen" href="<?= base_url(); ?>public/template/ministerio/css/login/style.css">

        <!-- Demo purpose only: goes with demo.js, you can delete this css when designing your own WebApp -->
        <link rel="stylesheet" type="text/css" media="screen" href="<?= base_url(); ?>public/template/smart/css/demo.min.css">
        <link href="<?= base_url(); ?>public/template/ministerio/js/bootstrap-toastr/toastr.min.css" rel="stylesheet" type="text/css"/>
        <!-- #FAVICONS -->
        <link rel="shortcut icon" href="<?= base_url(); ?>public/template/smart/img/favicon/favicon.ico" type="image/x-icon">
        <link rel="icon" href="<?= base_url(); ?>public/template/smart/img/favicon/favicon.ico" type="image/x-icon">

        <!-- #GOOGLE FONT -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,300,400,700">


    </head>

    <body class="animated fadeInDown">

        <header id="header">


            <div id="logo-group">
                <span id="logo"> <img src="<?= base_url(); ?>public/template/ministerio/img/login/soade.fw.png" alt="SmartAdmin"> </span>

            </div>

        </header>

        <div id="main" role="main">

            <!-- MAIN CONTENT -->
            <div id="content" class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7 hidden-xs hidden-sm">
                        <h1 style="font-size: 30px; font-weight: bold;" class="txt-color-red login-header-big">SOADE</h1>
                        <div class="hero">
                            <p>&nbsp;</p>
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-12">
                                <h4 style="color: #FFBF00;" >
                                    SOFTWARE INTERACTIVO, ADMINISTRATIVO Y  FINANCIERO 
                                    PARA INSTITUCIONES EDUCATIVAS PÚBLICAS.
                                </h4>
                                <p>&nbsp;</p>
                                <p>&nbsp;</p>
                                <p><strong>El software sdministrativo y
                                        financiero para instituciones educativas 
                                        del sector publico. </strong>                           
                                    Es una herramienta de control Administrativo y de 
                                    la Ejecución del presupuesto, conformado por dos (2) modulos soportados en
                                    las normas de presupuesto, Ley de Educación 115 de 1994,  Ley 715 de 2.001, 
                                    Sistema general de participación y en especial el Decreto 4791 de Diciembre 19 
                                    de 2008 que reglamenta los Fondos de Servicios Educativos.

                                </p>
                            </div>
                        </div>
                        <!--<div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                        <h5 class="about-heading">About SmartAdmin - Are you up to date?</h5>
                                        <p>
                                        Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium
                                        doloremque laudantium, totam rem aperiam, eaque ipsa.
                                        </p>
                                        </div>
                                
                        </div>-->
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
                        <div class="well no-padding">
                            <form  id="form_login_principal" class="smart-form login-form">
                                <header>
                                    Entrar
                                </header>

                                <fieldset>
                                    <section style="display: none;" id="tmensaje" >
                                        <span style="color: #b94a48;" class="help-block">
                                            <i class="fa fa-warning"></i> <span id="tmsn" > </span> </span>                        
                                    </section>

                                    <section>
                                        <label class="input"> <i class="icon-append fa fa-calendar"></i>
                                            <input value="<?php echo date("Y"); ?>" onkeydown="return processKeyAnio(event);" tabindex="1" type="text" name="anio" id="anio" placeholder="a�o">
                                            <b class="tooltip tooltip-bottom-right">Es necesario el año de trabajo</b> </label>
                                    </section>
                                    <section>
                                        <label class="input"> <i class="icon-append fa fa-sign-out"></i>
                                            <input type="text" id="codigo" onkeydown="return processKeyCodigo(event);"tabindex="1" placeholder="Nit o codigo del dane">
                                            <b class="tooltip tooltip-bottom-right">Es necesario el nit o el codigo del dane</b> </label>
                                    </section>
                                    <section>
                                        <label class="input"><i class="icon-append fa fa-user"></i>
                                            <input type="text" id="username" onkeydown="return processKeyUser(event);" tabindex="2"  placeholder="Nombre de Usuario">
                                            <b class="tooltip tooltip-bottom-right">Es necesario el nombre de usuario</b> </label>
                                    </section>
                                    <section>
                                        <label class="input"> <i class="icon-append fa fa-lock"></i>
                                            <input type="password" id="password" onkeydown="return processKeyPass(event);" tabindex="3" placeholder="Contrase�a" >
                                            <b class="tooltip tooltip-bottom-right">Es necesario la contraseña</b> </label>
                                    </section>

                                </fieldset>
                                <fieldset>
                                    <section>
                                        <label class="checkbox">
                                            <input type="checkbox" name="subscription" id="subscription">
                                            <i></i>Recordar contraseña!
                                        </label>
                                    </section>
                                </fieldset>
                                <footer>
                                    <button id="btnlogin" type="button" class="btn btn-primary">
                                        Aceptar
                                    </button>
                                </footer>
                            </form>
                        </div>


                        <p class="note text-center">*redes sociales</p>
                        <h5 class="text-center">- mas vistas -</h5>
                        <ul class="list-inline text-center">
                            <li>
                                <a href="javascript:void(0);" class="btn btn-primary btn-circle"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="btn btn-info btn-circle"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="btn btn-warning btn-circle"><i class="fa fa-linkedin"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>


        <!--================================================== -->	
        <script>
            var url = '<?= base_url(); ?>';
        </script>
        <!-- PACE LOADER - turn this on if you want ajax loading to show (caution: uses lots of memory on iDevices)-->
        <script src="<?= base_url(); ?>public/template/smart/js/plugin/pace/pace.min.js"></script>

        <!-- Link to Google CDN's jQuery + jQueryUI; fall back to local -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script> if (!window.jQuery) {
                document.write('<script src="<?= base_url(); ?>public/template/smart/js/libs/jquery-3.2.1.min.js"><\/script>');
            }</script>

        <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
        <script> if (!window.jQuery.ui) {
                document.write('<script src="<?= base_url(); ?>public/template/smart/js/libs/jquery-ui.min.js"><\/script>');
            }</script>

        <!-- IMPORTANT: APP CONFIG -->
        <script src="<?= base_url(); ?>public/template/smart/js/app.config.js"></script>

        <!-- JS TOUCH : include this plugin for mobile drag / drop touch events 		
        <script src="js/plugin/jquery-touch/jquery.ui.touch-punch.min.js"></script> -->

        <!-- BOOTSTRAP JS -->		
        <script src="<?= base_url(); ?>public/template/smart/js/bootstrap/bootstrap.min.js"></script>

        <!-- JQUERY VALIDATE -->
        <script src="<?= base_url(); ?>public/template/smart/js/plugin/jquery-validate/jquery.validate.min.js"></script>

        <!-- JQUERY MASKED INPUT -->
        <script src="<?= base_url(); ?>public/template/smart/js/plugin/masked-input/jquery.maskedinput.min.js"></script>

        <!--[if IE 8]>
                
                <h1>Your browser is out of date, please update your browser by going to www.microsoft.com/download</h1>
                
        <![endif]-->
        <script src="<?= base_url(); ?>public/template/ministerio/js/bootstrap-toastr/toastr.min.js" type="text/javascript"></script>
        <!-- MAIN APP JS FILE -->
        <script src="<?= base_url(); ?>public/template/smart/js/app.min.js"></script>
        <script src="<?= base_url(); ?>public/template/ministerio/js/modules/login-5.min.js" type="text/javascript"></script>

    </body>
</html>