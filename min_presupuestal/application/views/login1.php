<?php 
$logo = "logo.png";
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
        <meta name="viewport" content="initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,width=device-width,height=device-height,target-densitydpi=device-dpi,user-scalable=yes" />
        <title>Syrena Admin Template</title>

        <!-- fav and touch icons -->
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo BASE; ?>public/template/syre/assets/app/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo BASE; ?>public/template/syre/assets/app/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo BASE; ?>public/template/syre/assets/app/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="<?php echo BASE; ?>public/template/syre/assets/app/ico/apple-touch-icon-57-precomposed.png">
        <link rel="shortcut icon" href="assets/app/ico/favico.png">
        <link rel="shortcut icon" href="assets/app/ico/favico.ico">

        <!-- theme fonts -->
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300italic,300,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

        <!-- theme bootstrap stylesheets -->
        <link href="<?php echo BASE; ?>public/template/syre/assets/bootstrap/css/bootstrap.css" rel="stylesheet" />

        <!-- theme dependencies stylesheets -->
        <link href="<?php echo BASE; ?>public/template/syre/assets/app/css/dependencies.css" rel="stylesheet" />

        <!-- theme app main.css (this import of all custom css, you can use requirejs for optimizeCss or grunt to optimize them all) -->
        <link href="<?php echo BASE; ?>public/template/syre/assets/app/css/syrena-admin.css" rel="stylesheet" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
        <style>
            body{
                overflow: hidden; /* just for Sign page */
                background-color: #000;
            }
        </style>
    </head>

    <body>
        <!-- content wrapper to define fullpage or container -->
        <!-- (recomended: dont change the id value) -->
        <section id="wrapper" class="container">
            <section id="signin" class="sign-wrapper signin transition-layout">
                <div class="row">
                    <div class="col-md-offset-4 col-sm-offset-0 col-xs-offset-0 col-md-4 col-sm-12 col-xs-12">
                        <div class="sign-brand">
                            <div class="sign-brand-logo">
                                <img src="<?php echo BASE; ?>public/recursos/images/logo/<?= $logo; ?>" alt="Brand"/>
                            </div>
                            <h1 class="sign-brand-name">Globalnet</h1>
                        </div><!-- /sign-brand -->
                        <div class="sign-container">
                            <form role="form" action="#"  class="login-form" id="form_login_principal" novalidate="novalidate">
                                <div class="form-group">                              
                                    <input onkeydown="return processKeyAnio(event);" 
                                           type="text" class="form-control" name="anio" id="anio" placeholder="Año">
                                    <small class="help-block text-inverse">
                                        Digite el año de trabajo
                                    </small>

                                </div><!-- /form-group -->
                                <div class="form-group">                                
                                    <input onkeydown="return processKeyCodigo(event);" type="text" class="form-control" name="codigo" id="codigo" placeholder="Nit o codigo del dane">
                                    <small class="help-block text-inverse">
                                        Nit
                                    </small>
                                </div><!-- /form-group -->
                                <div class="form-group">
                                    <input onkeydown="return processKeyUser(event);" type="text" class="form-control" name="username" id="username" placeholder="Nombre de usuario" >
                                    <small class="help-block text-inverse">
                                        Usuario
                                    </small>
                                </div><!-- /form-group -->
                                <div class="form-group">
                                    <input onkeydown="return processKeyPass(event);" type="text" class="form-control" name="password" id="password" placeholder="Contraseña de acceso" >
                                    <small class="help-block text-inverse">
                                        Contraseña
                                    </small>
                                </div><!-- /form-group -->
                                <div class="form-group">


                                    <button id="btnlogin" class="btn btn-lg btn-primary btn-block" type="submit">
                                        <i class="preloader" style="display: none;"></i>
                                        Iniciar session <span class="fa fa-check" ></span>
                                    </button>

                                </div><!-- /form-group -->
                                <div class="form-group">
                                    <input class="iCheck" id="rememberme" name="rememberme" type="checkbox" checked>
                                    <label class="icheck-label" for="rememberme">Stay sign in</label>
                                </div><!-- /form-group -->
                            </form>
                        </div><!-- /sign-container -->
                    </div><!-- /col -->
                </div><!-- /row -->

                <div class="sign-footer">
                    <a href="#signup" data-toggle="transition-layout" class="btn btn-link text-inverse">Sign Up to syrena</a>
                    <a href="#recover" data-toggle="transition-layout" class="btn btn-link text-inverse">Forgot password</a>
                </div><!-- /sign-footer -->
            </section><!-- /signin -->

            <section id="signup" class="sign-wrapper signup transition-layout">
                <div class="row">
                    <div class="col-md-offset-4 col-sm-offset-0 col-xs-offset-0 col-md-4 col-sm-12 col-xs-12">
                        <div class="sign-brand">
                            <div class="sign-brand-logo">
                                <img src="<?php echo BASE; ?>public/recursos/images/logo/<?= $logo; ?>" alt="Brand"/>
                            </div>
                            <h1 class="sign-brand-name">Sign Up Syrena</h1>
                        </div><!-- /sign-brand -->
                        <div class="sign-container">
                            <form role="form" action="index.html">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="signup-username" placeholder="Username" >
                                </div><!-- /form-group -->
                                <div class="form-group">
                                    <input type="email" class="form-control" name="signup-email" placeholder="Email" >
                                </div><!-- /form-group -->
                                <div class="form-group">
                                    <input type="password" class="form-control" name="signup-password" placeholder="Password" >
                                </div><!-- /form-group -->
                                <div class="form-group">
                                    <input type="password" class="form-control" name="signup-cpassword" placeholder="Repeat password" >
                                </div><!-- /form-group -->
                                <div class="form-group">
                                    <input type="submit" class="btn btn-success btn-block" value="Sign Up" >
                                </div><!-- /form-group -->
                            </form>
                        </div><!-- /sign-container -->
                    </div><!-- /col -->
                </div><!-- /row -->

                <div class="sign-footer">
                    <a href="#signin" data-toggle="transition-layout" class="btn btn-link text-inverse">Already have an account</a>
                </div><!-- /sign-footer -->
            </section><!-- /signup -->

            <section id="recover" class="sign-wrapper recover transition-layout">
                <div class="row">
                    <div class="col-md-offset-4 col-sm-offset-0 col-xs-offset-0 col-md-4 col-sm-12 col-xs-12">
                        <div class="sign-brand">
                            <div class="sign-brand-logo">
                               <img src="<?php echo BASE; ?>public/recursos/images/logo/<?= $logo; ?>" alt="Brand"/>
                            </div>
                            <h1 class="sign-brand-name">Syrena</h1>
                        </div><!-- /sign-brand -->
                        <div class="sign-container">
                            <form role="form" action="index.html">
                                <div class="form-group">
                                    <input type="email" class="form-control input-lg" name="recover-email" placeholder="Email" >
                                    <small class="help-block text-inverse">Enter your email address and we will send you a link to reset your password</small>
                                </div><!-- /form-group -->
                                <div class="form-group">
                                    <input type="submit" class="btn btn-lg btn-success btn-block" value="Send reset link" >
                                </div><!-- /form-group -->
                            </form>
                        </div><!-- /sign-container -->
                    </div><!-- /col -->
                </div><!-- /row -->

                <div class="sign-footer">
                    <a href="#signin" data-toggle="transition-layout" class="btn btn-link text-inverse">Sign In</a>
                    <a href="#signup" data-toggle="transition-layout" class="btn btn-link text-inverse">Sign Up to syrena</a>
                </div><!-- /sign-footer -->
            </section><!-- /recover -->
        </section><!-- /wrapper -->



        <script>var url = '<?php echo BASE; ?>';</script>
        <!-- jQuery, theme required for theme -->
        <script src="<?php echo BASE; ?>public/template/syre/assets/jquery/jquery.js"></script>
        <script src="<?php echo BASE; ?>public/template/syre/assets/bootstrap/js/bootstrap.min.js"></script>

        <!-- theme dependencies -->
        <script src="<?php echo BASE; ?>public/template/syre/assets/isotope/jquery.isotope.min.js"></script>
        <script src="<?php echo BASE; ?>public/template/syre/assets/verge/verge.min.js"></script>
        <script src="<?php echo BASE; ?>public/template/syre/assets/moment/moment.min.js"></script>
        <script src="<?php echo BASE; ?>public/template/syre/assets/morris/raphael-2.1.0.min.js"></script>
        <script src="<?php echo BASE; ?>public/template/syre/assets/google-code-prettify/prettify.js"></script>
        <script src="<?php echo BASE; ?>public/template/metro/assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
        <!-- other dependencies -->
        <script src="<?php echo BASE; ?>public/template/syre/assets/jquery-icheck/jquery.icheck.min.js"></script>
        <script src="<?php echo BASE; ?>public/template/metro/assets/global/plugins/backstretch/jquery.backstretch.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <script src="<?php echo BASE; ?>public/template/metro/assets/global/plugins/bootstrap-toastr/toastr.min.js" type="text/javascript"></script>
        <script src="<?php echo BASE; ?>public/template/metro/assets/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- theme app main.js -->
        <script src="<?php echo BASE; ?>public/template/syre/assets/app/js/main.js"></script>
        <script src="<?php echo BASE; ?>public/template/metro/assets/pages/scripts/functions.js" type="text/javascript"></script>
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="<?php echo BASE; ?>public/template/metro/assets/pages/scripts/login-5.min.js" type="text/javascript"></script>




        <script type="text/javascript">
        $(function () {
            'use strict';

            $('.iCheck').iCheck({
                checkboxClass: 'icheckbox_flat',
                radioClass: 'iradio_flat',
            });
        })
        </script>
    </body>
</html>