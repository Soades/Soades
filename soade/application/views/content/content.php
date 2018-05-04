<!DOCTYPE html>
<html lang="en-us">
    <head>
        <meta charset="utf-8">
        <title> SmartAdmin </title>
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

        <!-- Demo purpose only: goes with demo.js, you can delete this css when designing your own WebApp -->
        <link rel="stylesheet" type="text/css" media="screen" href="<?= base_url(); ?>public/template/smart/css/demo.min.css">

        <!-- #FAVICONS -->
        <link rel="shortcut icon" href="img/favicon/favicon.ico" type="image/x-icon">
        <link rel="icon" href="img/favicon/favicon.ico" type="image/x-icon">

        <!-- #GOOGLE FONT -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,300,400,700">
        <link href="<?= base_url(); ?>public/template/smart/css/my_style.css" rel="stylesheet" type="text/css"/>
        <!-- #APP SCREEN / ICONS -->
        <!-- Specifying a Webpage Icon for Web Clip 
                 Ref: https://developer.apple.com/library/ios/documentation/AppleApplications/Reference/SafariWebContent/ConfiguringWebApplications/ConfiguringWebApplications.html -->
        <link rel="apple-touch-icon" href="img/splash/sptouch-icon-iphone.png">
        <link rel="apple-touch-icon" sizes="76x76" href="img/splash/touch-icon-ipad.png">
        <link rel="apple-touch-icon" sizes="120x120" href="img/splash/touch-icon-iphone-retina.png">
        <link rel="apple-touch-icon" sizes="152x152" href="img/splash/touch-icon-ipad-retina.png">

        <!-- iOS web-app metas : hides Safari UI Components and Changes Status Bar Appearance -->
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">

        <!-- Startup image for web apps -->
        <link rel="apple-touch-startup-image" href="img/splash/ipad-landscape.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:landscape)">
        <link rel="apple-touch-startup-image" href="img/splash/ipad-portrait.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:portrait)">
        <link rel="apple-touch-startup-image" href="img/splash/iphone.png" media="screen and (max-device-width: 320px)">
        <style>
            .ui-tabs .ui-tabs-nav li a{
                padding-left: 31px;
            }
            .inbox-body .table-wrap {
                background: #fff;
                padding: 0px 0px 0px;
                position: relative;
                margin-left: 0px;
                overflow-x: hidden;
            }
            .ui-tabs .ui-tabs-panel {

                padding: 0px 13px;
            }
            .inbox-body .table-wrap{
                overflow: hidden;
            }
            .no-content-padding {
                margin: -12px -7px 0 -12px;
            }
        </style>
    </head>


    <!--

    TABLE OF CONTENTS.
    
    Use search to find needed section.
    
    ===================================================================
    
    |  01. #CSS Links                |  all CSS links and file paths  |
    |  02. #FAVICONS                 |  Favicon links and file paths  |
    |  03. #GOOGLE FONT              |  Google font link              |
    |  04. #APP SCREEN / ICONS       |  app icons, screen backdrops   |
    |  05. #BODY                     |  body tag                      |
    |  06. #HEADER                   |  header tag                    |
    |  07. #PROJECTS                 |  project lists                 |
    |  08. #TOGGLE LAYOUT BUTTONS    |  layout buttons and actions    |
    |  09. #MOBILE                   |  mobile view dropdown          |
    |  10. #SEARCH                   |  search field                  |
    |  11. #NAVIGATION               |  left panel & navigation       |
    |  12. #MAIN PANEL               |  main panel                    |
    |  13. #MAIN CONTENT             |  content holder                |
    |  14. #PAGE FOOTER              |  page footer                   |
    |  15. #SHORTCUT AREA            |  dropdown shortcuts area       |
    |  16. #PLUGINS                  |  all scripts and plugins       |
    
    ===================================================================
    
    -->

    <!-- #BODY -->
    <!-- Possible Classes

            * 'smart-style-{SKIN#}'
            * 'smart-rtl'         - Switch theme mode to RTL
            * 'menu-on-top'       - Switch to top navigation (no DOM change required)
            * 'no-menu'			  - Hides the menu completely
            * 'hidden-menu'       - Hides the main menu but still accessable by hovering over left edge
            * 'fixed-header'      - Fixes the header
            * 'fixed-navigation'  - Fixes the main menu
            * 'fixed-ribbon'      - Fixes breadcrumb
            * 'fixed-page-footer' - Fixes footer
            * 'container'         - boxed layout mode (non-responsive: will not work with fixed-navigation & fixed-ribbon)
    -->
    <body class="fixed-header fixed-navigation">

        <!-- #HEADER -->
        <header id="header">
            <div id="logo-group">

                <!-- PLACE YOUR LOGO HERE -->
                <span id="logo"> <img src="<?= base_url(); ?>public/template/ministerio/img/logo/logo.png" alt="SmartAdmin"> </span>
                <!-- END LOGO PLACEHOLDER -->

                <!-- Note: The activity badge color changes when clicked and resets the number to 0
                         Suggestion: You may want to set a flag when this happens to tick off all checked messages / notifications -->
                <span id="activity" class="activity-dropdown"> <i class="fa fa-user"></i> <b class="badge"> 21 </b> </span>

                <!-- AJAX-DROPDOWN : control this dropdown height, look and feel from the LESS variable file -->
                <div class="ajax-dropdown">

                    <!-- the ID links are fetched via AJAX to the ajax container "ajax-notifications" -->
                    <div class="btn-group btn-group-justified" data-toggle="buttons">
                        <label class="btn btn-default">
                            <input type="radio" name="activity" id="ajax/notify/mail.html">
                            Msgs (14) </label>
                        <label class="btn btn-default">
                            <input type="radio" name="activity" id="ajax/notify/notifications.html">
                            notify (3) </label>
                        <label class="btn btn-default">
                            <input type="radio" name="activity" id="ajax/notify/tasks.html">
                            Tasks (4) </label>
                    </div>

                    <!-- notification content -->
                    <div class="ajax-notifications custom-scroll">

                        <div class="alert alert-transparent">
                            <h4>Click a button to show messages here</h4>
                            This blank page message helps protect your privacy, or you can show the first message here automatically.
                        </div>

                        <i class="fa fa-lock fa-4x fa-border"></i>

                    </div>
                    <!-- end notification content -->

                    <!-- footer: refresh area -->
                    <span> Last updated on: 12/12/2013 9:43AM
                        <button type="button" data-loading-text="<i class='fa fa-refresh fa-spin'></i> Loading..." class="btn btn-xs btn-default pull-right">
                            <i class="fa fa-refresh"></i>
                        </button> </span>
                    <!-- end footer -->

                </div>
                <!-- END AJAX-DROPDOWN -->
            </div>

            <!-- #PROJECTS: projects dropdown -->
            <div class="project-context hidden-xs">

                <span class="label">CONECTADO COMO:</span>
                <span class="project-selector dropdown-toggle" data-toggle="dropdown">
                    <?= ucfirst($this->session->userdata('in_nombre')); ?> 
                    <i class="fa fa-angle-down"></i></span>

                <!-- Suggestion: populate this list with fetch and push technique -->
                <ul class="dropdown-menu">
                    <li>
                        <a href="javascript:void(0);">Online e-merchant management system - attaching integration with the iOS</a>
                    </li>
                    <li>
                        <a href="javascript:void(0);">Notes on pipeline upgradee</a>
                    </li>
                    <li>
                        <a href="javascript:void(0);">Assesment Report for merchant account</a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="javascript:void(0);"><i class="fa fa-power-off"></i> Clear</a>
                    </li>
                </ul>
                <!-- end dropdown-menu-->

            </div>
            <!-- end projects dropdown -->

            <!-- #TOGGLE LAYOUT BUTTONS -->
            <!-- pulled right: nav area -->
            <div class="pull-right">

                <!-- collapse menu button -->
                <div id="hide-menu" class="btn-header pull-right">
                    <span> <a href="javascript:void(0);" data-action="toggleMenu" title="Collapse Menu"><i class="fa fa-reorder"></i></a> </span>
                </div>
                <!-- end collapse menu -->

                <!-- #MOBILE -->
                <!-- Top menu profile link : this shows only when top menu is active -->
                <ul id="mobile-profile-img" class="header-dropdown-list hidden-xs padding-5">
                    <li class="">
                        <a href="#" class="dropdown-toggle no-margin userdropdown" data-toggle="dropdown"> 
                            <img src="img/avatars/sunny.png" 
                                 alt="<?= ucfirst($this->session->userdata('in_nombre')); ?> " class="online" />  
                        </a>
                        <ul class="dropdown-menu pull-right">
                            <li>
                                <a href="javascript:void(0);" class="padding-10 padding-top-0 padding-bottom-0"><i class="fa fa-cog"></i> Setting</a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="profile.html" class="padding-10 padding-top-0 padding-bottom-0"> <i class="fa fa-user"></i> <u>P</u>rofile</a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="javascript:void(0);" class="padding-10 padding-top-0 padding-bottom-0" data-action="toggleShortcut"><i class="fa fa-arrow-down"></i> <u>S</u>hortcut</a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="javascript:void(0);" class="padding-10 padding-top-0 padding-bottom-0" data-action="launchFullscreen"><i class="fa fa-arrows-alt"></i> Full <u>S</u>creen</a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="login.html" class="padding-10 padding-top-5 padding-bottom-5" data-action="userLogout"><i class="fa fa-sign-out fa-lg"></i> <strong><u>L</u>ogout</strong></a>
                            </li>
                        </ul>
                    </li>
                </ul>

                <!-- logout button -->
                <div id="logout" class="btn-header transparent pull-right">
                    <span> <a href="<?= base_url(); ?>index.php/login/logout" title="Salir" 
                              data-action="userLogout" 
                              data-logout-msg="¿ Deseas cerrar la sesión ?"><i class="fa fa-sign-out"></i></a> </span>
                </div>
                <!-- end logout button -->

                <!-- search mobile button (this is hidden till mobile view port) -->
                <div id="search-mobile" class="btn-header transparent pull-right">
                    <span> <a href="javascript:void(0)" title="Search"><i class="fa fa-search"></i></a> </span>
                </div>
                <!-- end search mobile button -->

                <!-- #SEARCH -->
                <!-- input: search field -->
                <form action="search.html" class="header-search pull-right">
                    <input id="search-fld" type="text" name="param" placeholder="Find reports and more">
                    <button type="submit">
                        <i class="fa fa-search"></i>
                    </button>
                    <a href="javascript:void(0);" id="cancel-search-js" title="Cancel Search"><i class="fa fa-times"></i></a>
                </form>
                <!-- end input: search field -->

                <!-- fullscreen button -->
                <div id="fullscreen" class="btn-header transparent pull-right">
                    <span> <a href="javascript:void(0);" data-action="launchFullscreen" title="Full Screen"><i class="fa fa-arrows-alt"></i></a> </span>
                </div>
                <!-- end fullscreen button -->

                <!-- #Voice Command: Start Speech -->
                <div id="speech-btn" class="btn-header transparent pull-right hidden-sm hidden-xs">
                    <div> 
                        <a href="javascript:void(0)" title="Voice Command" data-action="voiceCommand"><i class="fa fa-microphone"></i></a> 
                        <div class="popover bottom"><div class="arrow"></div>
                            <div class="popover-content">
                                <h4 class="vc-title">Voice command activated <br><small>Please speak clearly into the mic</small></h4>
                                <h4 class="vc-title-error text-center">
                                    <i class="fa fa-microphone-slash"></i> Voice command failed
                                    <br><small class="txt-color-red">Must <strong>"Allow"</strong> Microphone</small>
                                    <br><small class="txt-color-red">Must have <strong>Internet Connection</strong></small>
                                </h4>
                                <a href="javascript:void(0);" class="btn btn-success" onclick="commands.help()">See Commands</a> 
                                <a href="javascript:void(0);" class="btn bg-color-purple txt-color-white" onclick="$('#speech-btn .popover').fadeOut(50);">Close Popup</a> 
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end voice command -->

                <!-- multiple lang dropdown : find all flags in the flags page -->
                <!--                <ul class="header-dropdown-list hidden-xs">
                                    <li>
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <img src="img/blank.gif" class="flag flag-us" alt="United States"> <span> English (US) </span> <i class="fa fa-angle-down"></i> </a>
                                        <ul class="dropdown-menu pull-right">
                                            <li class="active">
                                                <a href="javascript:void(0);"><img src="img/blank.gif" class="flag flag-us" alt="United States"> English (US)</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);"><img src="img/blank.gif" class="flag flag-fr" alt="France"> Français</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);"><img src="img/blank.gif" class="flag flag-es" alt="Spanish"> Español</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);"><img src="img/blank.gif" class="flag flag-de" alt="German"> Deutsch</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);"><img src="img/blank.gif" class="flag flag-jp" alt="Japan"> 日本語</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);"><img src="img/blank.gif" class="flag flag-cn" alt="China"> 中文</a>
                                            </li>	
                                            <li>
                                                <a href="javascript:void(0);"><img src="img/blank.gif" class="flag flag-it" alt="Italy"> Italiano</a>
                                            </li>	
                                            <li>
                                                <a href="javascript:void(0);"><img src="img/blank.gif" class="flag flag-pt" alt="Portugal"> Portugal</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);"><img src="img/blank.gif" class="flag flag-ru" alt="Russia"> Русский язык</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);"><img src="img/blank.gif" class="flag flag-kr" alt="Korea"> 한국어</a>
                                            </li>						
                
                                        </ul>
                                    </li>
                                </ul>-->
                <!-- end multiple lang -->

            </div>
            <!-- end pulled right: nav area -->

        </header>
        <!-- END HEADER -->

        <!-- #NAVIGATION -->
        <!-- Left panel : Navigation area -->
        <!-- Note: This width of the aside area can be adjusted through LESS variables -->
        <aside id="left-panel">

            <!-- User info -->
            <div class="login-info">
                <span> <!-- User image size is adjusted inside CSS, it should stay as it --> 

                    <a href="javascript:void(0);" id="show-shortcut" data-action="toggleShortcut">
                        <img src="<?= base_url(); ?>public/template/ministerio/img/login/avatar.jpg" alt="me" class="online" /> 
                        <span>
                            <?= ucfirst($this->session->userdata('us_usuario')); ?>  
                        </span>
                        <i class="fa fa-angle-down"></i>
                    </a> 

                </span>
            </div>
            <!-- end user info -->

            <nav  id="menu_nav" >
                <!-- 
                NOTE: Notice the gaps after each icon usage <i></i>..
                Please note that these links work a bit different than
                traditional href="" links. See documentation for details.
                -->

                <?= $menu; ?>
            </nav>


            <span class="minifyme" data-action="minifyMenu"> 
                <i class="fa fa-arrow-circle-left hit"></i> 
            </span>

        </aside>
        <!-- END NAVIGATION -->

        <!-- MAIN PANEL -->
        <div id="main" role="main">

            <!-- RIBBON -->
            <!--            <div id="ribbon">
            
                            <span class="ribbon-button-alignment"> 
                                <span id="refresh" class="btn btn-ribbon" data-action="resetWidgets" data-title="refresh"  rel="tooltip" data-placement="bottom" data-original-title="<i class='text-warning fa fa-warning'></i> Warning! This will reset all your widget settings." data-html="true">
                                    <i class="fa fa-refresh"></i>
                                </span> 
                            </span>
            
                             breadcrumb 
                            <ol class="breadcrumb">
                                <li>Home</li><li>Dashboard</li><li>Social Wall</li>
                            </ol>
                             end breadcrumb 
            
                             You can also add more buttons to the
                            ribbon for further usability
            
                            Example below:
            
                            <span class="ribbon-button-alignment pull-right">
                            <span id="search" class="btn btn-ribbon hidden-xs" data-title="search"><i class="fa-grid"></i> Change Grid</span>
                            <span id="add" class="btn btn-ribbon hidden-xs" data-title="add"><i class="fa-plus"></i> Add</span>
                            <span id="search" class="btn btn-ribbon" data-title="search"><i class="fa-search"></i> <span class="hidden-mobile">Search</span></span>
                            </span> 
            
                        </div>-->
            <!-- END RIBBON -->

            <section id="widget-grid" class="">

                <?php include 'main/main.php'; ?>


            </section>
            <!-- WIDGET END -->








        </div>
        <!-- END MAIN CONTENT -->

    </div>
    <!-- END MAIN PANEL -->

    <!-- PAGE FOOTER -->
    <!--		<div class="page-footer">
                            <div class="row">
                                    <div class="col-xs-12 col-sm-6">
                                            <span class="txt-color-white">SmartAdmin 1.9.0 <span class="hidden-xs"> - Web Application Framework</span> © 2017-2019</span>
                                    </div>
    
                                    <div class="col-xs-6 col-sm-6 text-right hidden-xs">
                                            <div class="txt-color-white inline-block">
                                                    <i class="txt-color-blueLight hidden-mobile">Last account activity <i class="fa fa-clock-o"></i> <strong>52 mins ago &nbsp;</strong> </i>
                                                    <div class="btn-group dropup">
                                                            <button class="btn btn-xs dropdown-toggle bg-color-blue txt-color-white" data-toggle="dropdown">
                                                                    <i class="fa fa-link"></i> <span class="caret"></span>
                                                            </button>
                                                            <ul class="dropdown-menu pull-right text-left">
                                                                    <li>
                                                                            <div class="padding-5">
                                                                                    <p class="txt-color-darken font-sm no-margin">Download Progress</p>
                                                                                    <div class="progress progress-micro no-margin">
                                                                                            <div class="progress-bar progress-bar-success" style="width: 50%;"></div>
                                                                                    </div>
                                                                            </div>
                                                                    </li>
                                                                    <li class="divider"></li>
                                                                    <li>
                                                                            <div class="padding-5">
                                                                                    <p class="txt-color-darken font-sm no-margin">Server Load</p>
                                                                                    <div class="progress progress-micro no-margin">
                                                                                            <div class="progress-bar progress-bar-success" style="width: 20%;"></div>
                                                                                    </div>
                                                                            </div>
                                                                    </li>
                                                                    <li class="divider"></li>
                                                                    <li>
                                                                            <div class="padding-5">
                                                                                    <p class="txt-color-darken font-sm no-margin">Memory Load <span class="text-danger">*critical*</span></p>
                                                                                    <div class="progress progress-micro no-margin">
                                                                                            <div class="progress-bar progress-bar-danger" style="width: 70%;"></div>
                                                                                    </div>
                                                                            </div>
                                                                    </li>
                                                                    <li class="divider"></li>
                                                                    <li>
                                                                            <div class="padding-5">
                                                                                    <button class="btn btn-block btn-default">refresh</button>
                                                                            </div>
                                                                    </li>
                                                            </ul>
                                                    </div>
                                            </div>
                                    </div>
                            </div>
                    </div>-->

    <div class="dev-page" >
        <div class="dev-page-footer dev-page-footer-fixed"> <!-- dev-page-footer-closed dev-page-footer-fixed -->
            <ul class="dev-page-footer-controls">
                <li><a class="tip" title="" data-original-title="Settings"><i class="fa fa-cogs"></i></a></li>
                <li><a class="tip" title="" data-original-title="Support"><i class="fa fa-life-ring"></i></a></li>
                <li><a class="tip" title="" data-original-title="Logoff"><i class="fa fa-power-off"></i></a></li>

                <li class="pull-right">
                    <a class="dev-page-sidebar-minimize tip" title="" data-original-title="Toggle navigation"><i class="fa fa-outdent"></i></a>
                </li>
            </ul>

            <!-- page footer buttons -->
            <ul class="dev-page-footer-buttons dev-page-footer-buttons-effect" style="width: 140px; margin-left: -70px;">                    
                <li><a href="#footer_content_1" class="dev-page-footer-container-open"><i class="fa fa-database"></i></a></li>                    
                <li><a href="#footer_content_2" class="dev-page-footer-container-open"><i class="fa fa-bar-chart"></i></a></li>
                <li><a href="#footer_content_3" class="dev-page-footer-container-open"><i class="fa fa-server"></i></a></li>
            </ul>
            <!-- ./page footer buttons -->
            <!-- page footer container -->
            <div class="dev-page-footer-container">

                <!-- loader and close button -->
                <div class="dev-page-footer-container-layer">
                    <a href="#" class="dev-page-footer-container-layer-button"></a>
                </div>
                <!-- ./loader and close button -->                    

                <!-- informers -->
                <div class="dev-page-footer-container-content" id="footer_content_1">                        
                    <div class="dev-list-informers">                            
                        <div class="dev-list-informers-item">
                            <div class="chart">


                                <input class="knob" data-width="100" data-max="100" 
                                       data-fgcolor="#E74E40" value="33" data-anglearc="250"
                                       data-angleoffset="-125" data-thickness=".1" 
                                       >
                            </div>
                            <div class="info">
                                <h5>Disk Usage</h5>
                                <p>Server #1 - <strong>235,4Gb / 500Gb</strong></p>
                                <p>Server #2 - <strong>114,2Gb / 500Gb</strong></p>
                                <p class="text-higlight">33% - Total disk usage</p>
                            </div>
                        </div>

                        <div class="dev-list-informers-item">
                            <div class="chart">


                                <input  data-width="100" data-max="100" 
                                        data-fgcolor="#E74E40" value="30" 
                                        data-anglearc="250" data-angleoffset="-125" 
                                        data-thickness=".1"  class="knob">

                            </div>
                            <div class="info">
                                <h5>Database Usage</h5>
                                <p>Disk Space - <strong>64,3Gb / 100Gb</strong></p>
                                <p>Accounts - <strong>12 / 30</strong></p>
                                <p class="text-higlight">75% - Features usage</p>
                            </div>
                        </div>

                        <div class="dev-list-informers-item">
                            <div class="chart">

                                <input class="knob" data-width="100" data-max="100" data-fgcolor="#82b440" value="62" 
                                       data-thickness=".1" 
                                       >
                            </div>
                            <div class="info">
                                <h5>Memory Usage</h5>
                                <p>Total - <strong>2048Mb</strong></p>
                                <p>Cached - <strong>1291Mb</strong></p>
                                <p>Available - <strong>757Mb</strong></p>
                            </div>
                        </div>                            
                    </div>                        
                </div>
                <!-- ./informers -->

                <!-- informers -->
                <div class="dev-page-footer-container-content" id="footer_content_2">                        
                    <div class="dev-list-informers">                            
                        <div class="dev-list-informers-item dev-list-informers-item-extended">
                            <div class="chart">
                                <span class="sparkline" sparktype="bar" sparkbarcolor="#82b440"
                                      sparkwidth="150" sparkheight="100" sparkbarwidth="15">

                                </span>
                            </div>
                            <div class="info">
                                <h5>Visitors</h5>
                                <p>New - <strong>722</strong></p>
                                <p>Returned - <strong>230</strong></p>
                                <p class="text-higlight">Total - <strong>952</strong></p>
                            </div>
                        </div>                            

                        <div class="dev-list-informers-item dev-list-informers-item-extended">
                            <div class="chart">
                                <span class="sparkline" sparkfillcolor="#85d6de" sparklinewidth="2" 
                                      sparklinecolor="#85d6de" sparkwidth="200" sparkheight="100">


                                </span>
                            </div>
                            <div class="info">
                                <h5>Sales</h5>
                                <p>Total Sales - 35</p>
                                <p>Rate - 25</p>
                                <p class="text-higlight">Ratio - <strong>75%</strong></p>
                            </div>
                        </div>

                        <div class="dev-list-informers-item">
                            <div class="chart">
                                <span class="sparkline"
                                      sparktype="pie" sparkwidth="100" sparkheight="100">
                                </span>
                            </div>
                            <div class="info">
                                <h5>User Stats</h5>
                                <p>Registrated - 1,522</p>
                                <p>Not active - 316</p>
                                <p class="text-higlight">Total - <strong>1,838</strong></p>
                            </div>
                        </div>                            
                    </div>                        
                </div>
                <!-- ./informers -->

                <!-- projects -->
                <div class="dev-page-footer-container-content" id="footer_content_3">                        
                    <ul class="dev-list-projects">
                        <li><a href="#" class="active">Intuitive</a></li>
                        <li><a href="#">Atlant</a></li>
                        <li><a href="#">Gemini</a></li>
                        <li><a href="#">Taurus</a></li>
                        <li><a href="#">Leo</a></li>
                        <li><a href="#">Aries</a></li>
                        <li><a href="#">Virgo</a></li>
                        <li><a href="#">Aquarius</a></li>
                        <li><a href="#" class="dev-list-projects-add"><i class="fa fa-plus"></i></a></li>
                    </ul>                        
                </div>
                <!-- ./projects -->
            </div>
            <!-- ./page footer container -->

            <ul class="dev-page-footer-controls dev-page-footer-controls-auto pull-right">
                <li><a class="dev-page-footer-fix tip" title="" data-original-title="Fixed footer"><i class="fa fa-thumb-tack"></i></a></li>
                <li><a class="dev-page-footer-collapse dev-page-footer-control-stuck"><i class="fa fa-dot-circle-o"></i></a></li>
            </ul>
        </div>
    </div>
    <!-- END PAGE FOOTER -->

    <!-- SHORTCUT AREA : With large tiles (activated via clicking user name tag)
    Note: These tiles are completely responsive,
    you can add as many as you like
    -->
    <div id="shortcut">
        <ul>
            <li>
                <a href="inbox.html" class="jarvismetro-tile big-cubes bg-color-blue"> <span class="iconbox"> <i class="fa fa-envelope fa-4x"></i> <span>Mail <span class="label pull-right bg-color-darken">14</span></span> </span> </a>
            </li>
            <li>
                <a href="calendar.html" class="jarvismetro-tile big-cubes bg-color-orangeDark"> <span class="iconbox"> <i class="fa fa-calendar fa-4x"></i> <span>Calendar</span> </span> </a>
            </li>
            <li>
                <a href="gmap-xml.html" class="jarvismetro-tile big-cubes bg-color-purple"> <span class="iconbox"> <i class="fa fa-map-marker fa-4x"></i> <span>Maps</span> </span> </a>
            </li>
            <li>
                <a href="invoice.html" class="jarvismetro-tile big-cubes bg-color-blueDark"> <span class="iconbox"> <i class="fa fa-book fa-4x"></i> <span>Invoice <span class="label pull-right bg-color-darken">99</span></span> </span> </a>
            </li>
            <li>
                <a href="gallery.html" class="jarvismetro-tile big-cubes bg-color-greenLight"> <span class="iconbox"> <i class="fa fa-picture-o fa-4x"></i> <span>Gallery </span> </span> </a>
            </li>
            <li>
                <a href="profile.html" class="jarvismetro-tile big-cubes selected bg-color-pinkDark"> <span class="iconbox"> <i class="fa fa-user fa-4x"></i> <span>My Profile </span> </span> </a>
            </li>
        </ul>
    </div>
    <!-- END SHORTCUT AREA -->

    <!--================================================== -->

    <!-- PACE LOADER - turn this on if you want ajax loading to show (caution: uses lots of memory on iDevices)-->
    <script data-pace-options='{ "restartOnRequestAfter": true }' src="<?= base_url(); ?>public/template/smart/js/plugin/pace/pace.min.js"></script>

    <!--================================================== -->

    <!-- PACE LOADER - turn this on if you want ajax loading to show (caution: uses lots of memory on iDevices)
    <script data-pace-options='{ "restartOnRequestAfter": true }' src="js/plugin/pace/pace.min.js"></script>-->


    <script src="<?= base_url(); ?>public/template/ministerio/js/modernizr.js" type="text/javascript"></script>

    <!-- #PLUGINS -->
    <!-- Link to Google CDN's jQuery + jQueryUI; fall back to local -->
    <!--<script src="//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>-->
    <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script>
                                    if (!window.jQuery) {
                                        document.write('<script src="<?= base_url(); ?>public/template/smart/js/libs/jquery-3.2.1.min.js"><\/script>');
                                    }
    </script>

    <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script>
                                    if (!window.jQuery.ui) {
                                        document.write('<script src="<?= base_url(); ?>public/template/smart/js/libs/jquery-ui.min.js"><\/script>');
                                    }
    </script>

    <script>
        /* Path ruta files
         * ---------------
         * @url : ruta relativa
         */
        var url = '<?php echo base_url(); ?>';

    </script>

    <!-- IMPORTANT: APP CONFIG -->
    <script src="<?= base_url(); ?>public/template/smart/js/app.config.js"></script>

    <!-- BOOTSTRAP JS -->
    <script src="<?= base_url(); ?>public/template/smart/js/bootstrap/bootstrap.min.js"></script>

    <!--[if IE 8]>
            <h1>Your browser is out of date, please update your browser by going to www.microsoft.com/download</h1>
    <![endif]-->

    <!-- MAIN APP JS FILE -->
    <script src="<?= base_url(); ?>public/template/smart/js/app.js"></script>


    <!-- CUSTOM NOTIFICATION -->
    <script src="<?= base_url(); ?>public/template/smart/js/notification/SmartNotification.min.js"></script>
    <!-- JARVIS WIDGETS -->
    <script src="<?= base_url(); ?>public/template/smart/js/smartwidgets/jarvis.widget.min.js"></script>

    <link href="<?= base_url(); ?>public/template/ministerio/js/bootstrap-toastr/toastr.min.css" rel="stylesheet" type="text/css"/>

    <script src="<?= base_url(); ?>public/template/ministerio/js/bootstrap-toastr/toastr.min.js" type="text/javascript"></script>
    <!-- BOOTSTRAP JS -->

    <script src="<?= base_url(); ?>public/template/ministerio/js/jquery.mCustomScrollbar.min.js" type="text/javascript"></script>
    <script src="<?= base_url(); ?>public/template/ministerio/js/dev/dev-loaders.js" type="text/javascript"></script>

    <script src="<?= base_url(); ?>public/template/ministerio/js/contextmenu/BootstrapMenu.min.js" type="text/javascript"></script>
    <!--<script src="js/plugin/tabs/b.tabs.js"></script>-->
    <script src="<?= base_url(); ?>public/template/ministerio/js/dev/dev-layout-default.js" type="text/javascript"></script>
    <script src="<?= base_url(); ?>public/template/ministerio/js/knob/jquery.knob.min.js" type="text/javascript"></script>
    <script src="<?= base_url(); ?>public/template/ministerio/js/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
    <script>

        $(document).ready(function() {

            pageSetUp();

            $('.jarviswidget-fullscreen-btn').click(function() {
                tableHeightSize()
            });
            
            $(".dev-page").hide();

        });




        $(window).resize(function() {
            tableHeightSize()
        })

        function tableHeightSize() {

            if ($('body').hasClass('menu-on-top')) {
                var menuHeight = 68;
                // nav height

                var tableHeight = ($(window).height() - 224) - menuHeight;
                if (tableHeight < (320 - menuHeight)) {
                    $('.table-wrap').css('height', (320 - menuHeight) + 'px');
                } else {
                    $('.table-wrap').css('height', tableHeight + 'px');
                }

            } else {

                var tableHeight = $(window).height() - 162;
                console.log(tableHeight)
                if (tableHeight < 320) {
                    $('.table-wrap').css('height', 320 + 'px');
                } else {
                    $('.table-wrap').css('height', tableHeight + 'px');
                }

            }

        }

        var charts = {
            init: function() {
                // Sparkline                    
                if ($(".sparkline").length > 0)
                    $(".sparkline").sparkline('html', {enableTagOptions: true, disableHiddenCheck: true});
                // End sparkline
            }
        };

        var knob = {
            init: function() {
                if ($(".knob").length > 0)
                    $(".knob").knob();
            }
        };


        $(function() {

            knob.init();
            charts.init();




            //https://www.jqueryscript.net/demo/Bootstrap-iFrame-Tabs-jQuery-bTabs/
            var hoverTabs = new Array();

            //addTab('tab1', 'inicio','inicio', url + 'index.php/inicio');

            //	$('#mainFrameTabs').tabs();

            var menu = new BootstrapMenu('#mainFrameTabs ul li', {
                actions: [{
                        name: function(row) {
                            // custom action name, with the name of the selected user	
                            hoverTabs.length = 0;
                            var count = 0;
                            var id = $("#mainFrameTabs ul li.ui-state-focus").attr('id');
                            var mod = $("#mainFrameTabs ul li.ui-state-focus").attr('data-mod');
                            var title = $("#mainFrameTabs ul li.ui-state-focus").attr('data-mod');
                            $('li.ui-tabs-tab').each(function(i, row) {
                                if ($(this).attr('data-mod') == mod) {
                                    count++;
                                }
                            });

                            hoverTabs.push(
                                    {
                                        id: id,
                                        url: $("iframe#iframe_" + id.replace("li_", "")).attr("src"),
                                        title: title,
                                        mod: mod,
                                        num: count
                                    }
                            )
                            console.log(hoverTabs[0])
                            return "Duplicar" + $("#mainFrameTabs ul li.ui-state-focus a").text();
                        },
                        iconClass: 'fa-copy',
                        onClick: function() {
                            var $th = $("#mainFrameTabs ul");

                            var mod = hoverTabs[0].mod
                            var id = hoverTabs[0].id + parseInt(hoverTabs[0].num);
                            var url = hoverTabs[0].url;
                            var title = hoverTabs[0].title + "(" + hoverTabs[0].num + ")";

                            addTab(id, title, mod, url);
                            toastr.info("'Action' clicked! " + mod + " id " + hoverTabs[0].id + " url" + hoverTabs[0].url);
                            hoverTabs.length = 0;
                        }
                    }, {
                        name: 'Another action',
                        onClick: function() {
                            toastr.info("'Another action' clicked!");
                        }
                    }, {
                        name: 'A third action',
                        onClick: function() {
                            toastr.info("'A third action' clicked!");
                        }
                    }]
            });

            $('#mainFrameTabs').tabs();

            var tabTitle = $("#tab_title"), tabContent = $("#tab_content"),
                    tabTemplate = "<li id='#{id}' data-mod='#{data-mod}' style='position:relative;'> <span class='air air-top-left delete-tab' style='top:7px; left:7px;'><button class='btn btn-xs font-xs btn-default hover-transparent'><i class='fa fa-times'></i></button></span></span><a href='#{href}'>#{label}</a></li>", tabCounter = 2;

            var tabs = $("#mainFrameTabs").tabs();

            var calcHeight = function() {
                $('#mainFrameTabs').height(420);
            };

            $('.cl_data_router').on('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                if ($(this).attr('data-router') != '#' && $(this).attr('data-router') != '') {
                    var li = $(this).closest('li');
                    var menuId = $(this).attr('data-modulo-name');
                    var path = url + 'index.php/modules/' + $(this).attr('data-router') + '/' + $(this).attr('data-modulo-name');
                    var title = $(this).text();
                    var title_name = $(this).attr('data');
                    addTab(menuId, title, title_name, path);
                }
                //$('#mainFrameTabs').bTabsAdd(menuId,title,url);
            });

            function addTab(id, title, mod, url, loginCheck) {
                var tabCounter = 0;
                var $tabs = this.$container, openTabs = new Array(), p = this.p;
                var label = tabTitle.val() || title, id1 = "tabs-" + tabCounter,
                        li = $(tabTemplate.replace(/#\{id\}/g, "li_" + id)
                                .replace(/#\{data-mod\}/g, mod.replace(/^\s+|\s+$/g, ""))
                                .replace(/#\{href\}/g, "#" + id).replace(/#\{label\}/g, label))
                        ,
                        tabContentHtml = tabContent.val() || "Tab " + tabCounter + " content.";
                var tabId = "li_" + id;


                $('li.ui-tabs-tab').each(function(i, row) {
                    openTabs.push($(this).attr('id'));
                });

                if (openTabs && $.isArray(openTabs) && openTabs.length > 0) {
                    var exist = false;//是否已存在
                    $.each(openTabs, function(i, row) {
                        if (row == tabId) {
                            exist = true;
                            return false;
                        }
                    });

                    if (exist) {
                        //console.log($('ul.ui-tabs-nav a[href="#'+id+'"]'))
                        $('ul.ui-tabs-nav a[href="#' + id + '"]').tab('show');
                        tabs.tabs("option", "active", $("#" + id).index() - 1);
                        return;
                    }
                } else
                    openTabs = new Array();

                openTabs.push(tabId);

                tabs.find(".ui-tabs-nav").append(li);
                tabs.append("<div id='" + id + "'></div>");

                //$('ul.ui-tabs-nav li:last a').tab('show');
                openTabs.push(tabId);

                var openIframe = function() {
                    $("#" + id).append('<div class="inbox-body no-content-padding" ><div class="table-wrap custom-scroll animated fast fadeInRight" ><iframe id="iframe_' + id + '" frameborder="0" scrolling="yes" style="width:100%;height:100%;border:0px;"></iframe></div></div>');
                    $("#iframe_" + id).attr("src", url);
                };

                if (loginCheck && $.isFunction(loginCheck)) {
                    if (loginCheck())
                        openIframe();
                    else if (p && p.loginUrl)
                        window.top.location.replace(p.loginUrl);
                } else
                    openIframe();

                tabs.tabs("refresh");
                tabCounter++;
                tabs.tabs("option", "active", $("#" + id).index() - 1);

                // clear fields
                $("#tab_title").val("");
                $("#tab_content").val("");
            }

            // close icon: removing the tab on click
            $("#mainFrameTabs").on("click", 'span.delete-tab', function() {
                var panelId = $(this).closest("li").remove().attr("aria-controls");
                $("#" + panelId).remove();
                tabs.tabs("refresh");
            });


            tableHeightSize();




            /*
             $('#mainFrameTabs').bTabs({
             resize : calcHeight
             });*/
        });

    </script>


    <!-- Your GOOGLE ANALYTICS CODE Below -->
    <script>


        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-XXXXXXXX-X']);
        _gaq.push(['_trackPageview']);

        (function() {
            var ga = document.createElement('script');
            ga.type = 'text/javascript';
            ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(ga, s);
        })();

    </script>

</body>

</html>