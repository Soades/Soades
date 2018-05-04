<!DOCTYPE html>
<html lang="en-us">
    <head>
        <meta charset="utf-8">
        <!--<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">-->

        <title> SmartAdmin </title>
        <meta name="description" content="">
        <meta name="author" content="">

        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

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

        <!-- FAVICONS -->
        <link rel="shortcut icon" href="img/favicon/favicon.ico" type="image/x-icon">
        <link rel="icon" href="img/favicon/favicon.ico" type="image/x-icon">

        <!-- GOOGLE FONT -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,300,400,700">

        <!-- Specifying a Webpage Icon for Web Clip 
                 Ref: https://developer.apple.com/library/ios/documentation/AppleApplications/Reference/SafariWebContent/ConfiguringWebApplications/ConfiguringWebApplications.html -->
        <link rel="apple-touch-icon" href="img/splash/sptouch-icon-iphone.png">
        <link rel="apple-touch-icon" sizes="76x76" href="img/splash/touch-icon-ipad.png">
        <link rel="apple-touch-icon" sizes="120x120" href="img/splash/touch-icon-iphone-retina.png">
        <link rel="apple-touch-icon" sizes="152x152" href="img/splash/touch-icon-ipad-retina.png">
        <style>
            html {
                font-size: 14px;
                overflow-y: scroll;
                overflow-x: auto;
            }
            body {
                background-color: #ddd;
                font-family: 'Oxygen', Arial, Helvetica, sans-serif;
                font-size: 1rem;
                text-align: left;
                color: #666;
            }

            /* General -------------------------------------------------------------------------------------- */
            * {
                padding: 0;
                border: 0;
                outline: 0;
                margin: 0;
            }

            h1, h2 {
                font-weight: normal;
                font-size: 1rem;
            }

            a {
                cursor: pointer;
                -webkit-transition: all 0.2s ease 0s;
                -moz-transition:    all 0.2s ease 0s;
                -o-transition:      all 0.2s ease 0s;
                transition:         all 0.2s ease 0s;
            }

            ul {
                list-style-type: none;
            }

            table {
                border-collapse: collapse;
            }
            table th,
            table td {
                font-weight: normal;
                text-align: left;
                vertical-align: middle;
            }

            label {
                cursor: pointer;
            }
            input,
            button,
            select {
                background-color: transparent;
                font-family: 'Oxygen', Arial, Helvetica, sans-serif;
                font-size: 1rem;
                color: #666;
            }
            button,
            select {
                cursor: pointer;
            }
            button {
                -webkit-transition: all 0.2s ease 0s;
                -moz-transition:    all 0.2s ease 0s;
                -o-transition:      all 0.2s ease 0s;
                transition:         all 0.2s ease 0s;
            }
            select {
                -webkit-appearance: none;
            }

            input[type=text],
            input[type=number],
            input[type=email],
            input[type=url],
            input[type=password],
            input[type=date],
            input[type=search],
            input[type=tel] {
                -webkit-appearance: none;
            }
            input[type=number] {
                -moz-appearance: textfield;
            }
            input::-webkit-inner-spin-button {
                -webkit-appearance: none;
            }
            input::-webkit-outer-spin-button {
                -webkit-appearance: none;
            }

            input[type=search] {
                -webkit-appearance: none;
                -webkit-border-radius: 0;
            }
            input[type=search]::-webkit-search-decoration,
            input[type=search]::-webkit-search-cancel-button,
            input[type=search]::-webkit-search-results-button,
            input[type=search]::-webkit-search-results-decoration {
                display: none;
            }

            button::-moz-focus-inner,
            input[type="button"]::-moz-focus-inner,
            input[type="submit"]::-moz-focus-inner,
            input[type="reset"]::-moz-focus-inner {
                padding: 0 !important;
                border: 0 none !important;
            }

            /* Page container ------------------------------------------------------------------------------- */
            #page_container {
                width: 980px;
                padding: 40px 5px 55px 5px;
                margin: 0 auto 0 auto;
            }

            /* Header --------------------------------------------------------------------------------------- */
            h1 {
                font-weight: 700;
                font-size: 2.2rem;
                color: #f70;
                margin: 0 0 25px 0;
            }

            button.button {
                height: 35px;
                display: inline-block;
                background-color: #999;
                font-weight: 700;
                text-transform: uppercase;
                color: #fff;
                padding: 0 15px 0 15px;
                -webkit-border-radius: 6px;
                -moz-border-radius:    6px;
                border-radius:         6px;
                margin: 0 0 25px 0;
            }
            button.button:hover,
            button.button:active {
                background-color: #333;
            }

            /* Datatable ------------------------------------------------------------------------------------ */
            .dataTables_wrapper {
                position: relative;
                padding: 50px 0 50px 0;
            }

            .dataTables_length {
                width: auto;
                height: 30px;
                position: absolute;
                top: 0;
                left: 0;
                padding: 0 110px 0 0;
            }
            .dataTables_length label {
                line-height: 30px;
                margin: 0;
            }
            .dataTables_length select {
                width: 100px;
                height: 30px;
                position: absolute;
                top: 0;
                right: 0;
                background-color: #fff;
                color: #666;
                padding: 0 50px 0 10px;
                border: 1px solid #ccc;
                -webkit-border-radius: 6px;
                -moz-border-radius:    6px;
                border-radius:         6px;
                margin: 0;
            }
            .dataTables_length:after {
                width: 30px;
                height: 30px;
                position: absolute;
                top: 0;
                right: 0;
                background-color: #999;
                font-family: 'FontAwesome', Arial, Helvetica, sans-serif;
                font-weight: normal;
                font-size: 1.2rem;
                line-height: 30px;
                text-align: center;
                color: #fff;
                content: '\f107';
                pointer-events: none;
                -webkit-border-top-right-radius:    6px;
                -webkit-border-bottom-right-radius: 6px;
                -moz-border-radius-topright:        6px;
                -moz-border-radius-bottomright:     6px;
                border-top-right-radius:            6px;
                border-bottom-right-radius:         6px;
            }
            .dataTables_length select::-ms-expand {
                display: none;
            }

            .dataTables_filter {
                position: absolute;
                top: 0;
                right: 0;
            }
            .dataTables_filter label {
                line-height: 30px;
            }
            .dataTables_filter input {
                width: 200px;
                height: 30px;
                display: inline-block;
                background-color: #fff;
                line-height: 30px;
                color: #666;
                padding: 0 0 0 10px;
                border: 1px solid #ccc;
                -webkit-border-radius: 6px;
                -moz-border-radius:    6px;
                border-radius:         6px;
                margin: 0 0 0 10px;
            }
            .dataTables_filter input:focus {
                background-color: #ffd;
            }

            .dataTables_paginate {
                position: absolute;
                bottom: 0;
                left: 0;
            }
            .dataTables_paginate a {
                width: 30px;
                height: 30px;
                float: left;
                background-color: #999;
                font-weight: normal;
                line-height: 29px;
                text-align: center;
                color: #fff;
                -webkit-border-radius: 6px;
                -moz-border-radius:    6px;
                border-radius:         6px;
                margin: 0 10px 0 0;
            }
            .dataTables_paginate a.current,
            .dataTables_paginate a:hover,
            .dataTables_paginate a:active,
            .dataTables_paginate a:focus {
                background-color: #333;
            }
            .dataTables_paginate a.previous,
            .dataTables_paginate a.next {
                font-family: 'FontAwesome', Arial, Helvetica, sans-serif;
                font-size: 1.2rem;
                line-height: 30px;
            }
            .dataTables_paginate a.previous:before {
                content: '\f104';
            }
            .dataTables_paginate a.next:before {
                content: '\f105';
            }

            .dataTables_info {
                position: absolute;
                bottom: 0;
                right: 0;
                line-height: 30px;
            }

            table.datatable {
                width: 100% !important;
                line-height: 1.4rem;
            }
            table.datatable th,
            table.datatable td {
                background-color: #fff;
                padding: 5px 10px 5px 10px;
                border: 1px solid #ccc;
            }

            table.datatable thead th {
                background-color: #999;
                font-weight: bold;
                text-transform: uppercase;
                white-space: nowrap;
                color: #fff;
                padding-top: 7px;
                padding-bottom: 8px;
            }
            table.datatable thead th.sorting,
            table.datatable thead th.sorting_desc,
            table.datatable thead th.sorting_asc {
                cursor: pointer;
            }
            table.datatable thead th.sorting:active,
            table.datatable thead th.sorting_desc:active,
            table.datatable thead th.sorting_asc:active {
                background-color: #333;
            }

            table.datatable tbody tr:nth-child(even) td {
                background-color: #eee;
            }
            table.datatable tbody tr:hover th,
            table.datatable tbody tr:hover td {
                background-color: #ffd;
            }
            table.datatable tbody tr:hover td.dataTables_empty {
                background-color: #fff;
            }
            table.datatable tbody td.company_name {
                width: 100%;
            }
            table.datatable tbody td.integer {
                text-align: right;
                white-space: nowrap;
            }
            table.datatable tbody td.nowrap {
                white-space: nowrap;
            }

            table.datatable tbody td.functions .function_buttons {
                width: 70px;
                height: 30px;
                margin: 0 auto 0 auto;
            }
            table.datatable tbody td.functions .function_buttons li {
                float: left;
                padding: 0 10px 0 0;
            }
            table.datatable tbody td.functions .function_buttons li.function_delete {
                padding: 0;
            }
            table.datatable tbody td.functions .function_buttons a {
                width: 30px;
                height: 30px;
                display: inline-block;
                background-color: #999;
                font-family: 'FontAwesome', Arial, Helvetica, sans-serif;
                font-weight: normal;
                line-height: 29px;
                text-align: center;
                color: #fff;
                -webkit-border-radius: 6px;
                -moz-border-radius:    6px;
                border-radius:         6px;
            }
            table.datatable tbody td.functions .function_buttons .function_edit a:before {
                font-size: 1.1rem;
                content: "\f040";
            }
            table.datatable tbody td.functions .function_buttons .function_delete a:before {
                font-size: 1.2rem;
                line-height: 30px;
                content: "\f1f8";
            }
            table.datatable tbody td.functions .function_buttons a:hover,
            table.datatable tbody td.functions .function_buttons a:active,
            table.datatable tbody td.functions .function_buttons a:focus {
                background-color: #333;
            }
            table.datatable tbody td.functions .function_buttons span {
                display: none;
            }

            /* Lightbox ------------------------------------------------------------------------------------- */
            .lightbox_bg {
                display: none;
                width: 100%;
                height: 100%;
                position: fixed;
                top: 0;
                left: 0;
                z-index: 100;
                background-color: #333;
                background-color: rgba(0, 0, 0, 0.85);
                cursor: pointer;
            }

            .lightbox_container {
                display: none;
                width: 80%;
                height: 90%;
                position: fixed;
                top: 5%;
                left: 10%;
                z-index: 200;
                background-color: #fff;
                color: #666;
                overflow-y: scroll;
                overflow-x: auto;
                padding: 50px 0 0 0;
                -webkit-box-sizing: border-box;
                -moz-box-sizing:     border-box;
                box-sizing:          border-box;
                -webkit-border-radius: 6px;
                -moz-border-radius:    6px;
                border-radius:         6px;
            }

            .lightbox_close {
                width: 35px;
                height: 35px;
                position: absolute;
                top: 45px;
                right: 45px;
                font-family: 'FontAwesome', Arial, Helvetica, sans-serif;
                font-weight: normal;
                font-size: 20px;
                line-height: 35px;
                text-align: center;
                color: #f70;
                cursor: pointer;
                border: 2px solid #f70;
                -webkit-border-radius: 35px;
                -moz-border-radius:    35px;
                border-radius:         35px;
            }
            .lightbox_close:before {
                content: '\f00d';
            }
            .lightbox_close:hover {
                color: #333;
                border-color: #333;
            }

            .lightbox_content {
                width: 642px;
                padding: 0 50px 0 50px;
            }
            .lightbox_content h2 {
                font-weight: 700;
                font-size: 2rem;
                line-height: 2rem;
                color: #f70;
                margin: 0 0 25px 0;
            }

            .lightbox_content .input_container {
                width: 600px;
                margin: 0 0 10px 0;
            }
            .lightbox_content .input_container:after {
                clear: both;
                height: 0;
                display: block;
                font-size: 0;
                line-height: 0;
                content: ' ';
            }

            .lightbox_content .input_container label {
                width: 200px;
                float: left;
                font-size: 1rem;
                line-height: 32px;
            }
            .lightbox_content .input_container label span.required {
                font-weight: bold;
                color: #f70;
            }

            .lightbox_content .input_container .field_container {
                width: 400px;
                float: right;
                position: relative;
            }
            .lightbox_content .input_container .field_container label.error {
                width: 400px;
                display: block;
                background-color: #fff1e6;
                line-height: 1.4rem;
                color: #333;
                padding: 5px 0 6px 10px;
                border: 1px solid #f70;
                -webkit-box-sizing: border-box;
                -moz-box-sizing:    border-box;
                box-sizing:         border-box;
                -webkit-border-radius: 6px;
                -moz-border-radius:    6px;
                border-radius:         6px;
                margin: 0 0 5px 0;
            }
            .lightbox_content .input_container .field_container label.error.valid {
                display: none !important;
            }
            .lightbox_content .input_container .field_container input {
                width: 400px;
                height: 32px;
                background-color: #f9f9f9;
                line-height: 30px;
                color: #666;
                padding: 0 0 0 10px;
                border: 1px solid #ccc;
                -webkit-box-sizing: border-box;
                -moz-box-sizing:    border-box;
                box-sizing:         border-box;
                -webkit-border-radius: 6px;
                -moz-border-radius:    6px;
                border-radius:         6px;
            }
            .lightbox_content .input_container .field_container input:focus {
                background-color: #ffd;
                color: #000;
            }

            .lightbox_content .input_container .field_container.error:after,
            .lightbox_content .input_container .field_container.valid:after {
                width: 32px;
                height: 32px;
                position: absolute;
                bottom: 0;
                right: -42px;
                font-family: 'FontAwesome', Arial, Helvetica, sans-serif;
                font-weight: normal;
                font-size: 20px;
                line-height: 32px;
                text-align: center;
            }
            .lightbox_content .input_container .field_container.error:after {
                content: '\f00d';
                color: #c00;
            }
            .lightbox_content .input_container .field_container.valid:after {
                content: '\f00c';
                color: #090;
            }

            .lightbox_content .button_container {
                width: 600px;
                height: 35px;
                text-align: right;
                padding: 15px 0 50px 0;
            }
            .lightbox_content .button_container button {
                height: 35px;
                display: inline-block;
                background-color: #999;
                font-weight: 700;
                text-transform: uppercase;
                color: #fff;
                padding: 0 15px 0 15px;
                -webkit-border-radius: 6px;
                -moz-border-radius:    6px;
                border-radius:         6px;
            }
            .lightbox_content .button_container button:hover {
                background-color: #333;
                color: #fff;
            }

            /* Message / noscript --------------------------------------------------------------------------- */
            #message_container,
            #noscript_container {
                position: fixed;
                bottom: 0;
                left: 0;
                width: 100%;
                background-color: #333;
                text-align: center;
                color: #fff;
            }
            #message_container {
                display: none;
            }
            #message,
            #noscript {
                width: 980px;
                line-height: 20px;
                padding: 10px 5px 10px 6px;
                margin: 0 auto 0 auto;
            }
            #message  p,
            #noscript p {
                display: inline-block;
                position: relative;
                padding: 0 0 0 28px;
            }
            #message  p:before,
            #noscript p:before {
                width: 20px;
                height: 20px;
                position: absolute;
                top: 0;
                left: 0;
                background-color: #f70;
                font-family: 'FontAwesome', Arial, Helvetica, sans-serif;
                font-weight: normal;
                font-size: 12px;
                line-height: 20px;
                text-align: center;
                color: #fff;
                -webkit-border-radius: 20px;
                -moz-border-radius:    20px;
                border-radius:         20px;
            }
            #message.success  p:before,
            #noscript.success p:before {
                content: '\f00c';
            }
            #message.error  p:before,
            #noscript.error p:before {
                content: '\f00d';
            }

            /* Loading message ------------------------------------------------------------------------------ */
            #loading_container {
                width: 100%;
                height: 100%;
                display: none;
                position: fixed;
                top: 0;
                left: 0;
                background-color: #333;
                background-color: rgba(0, 0, 0, 0.85);
                text-align: center;
            }
            #loading_container2 {
                width: 100%;
                height: 100%;
                display: table;
            }
            #loading_container3 {
                display: table-cell;
                vertical-align: middle;
            }
            #loading_container4 {
                width: 350px;
                height: 250px;
                position: relative;
                background-color: #fff;
                font-size: 1.4rem;
                line-height: 1.4rem;
                color: #666;
                padding: 165px 0 0 0;
                -webkit-box-sizing: border-box;
                -moz-box-sizing:     border-box;
                box-sizing:          border-box;
                -webkit-border-radius: 6px;
                -moz-border-radius:    6px;
                border-radius:         6px;
                margin: 0 auto 0 auto;
            }
            #loading_container4:before {
                width: 100%;
                position: absolute;
                top: 80px;
                left: 0;
                font-family: 'FontAwesome', Arial, Helvetica, sans-serif;
                font-weight: normal;
                font-size: 4rem;
                line-height: 4rem;
                text-align: center;
                color: #f70;
                content: '\f013';
                -webkit-animation: spin 2s infinite linear;
                animation:         spin 2s infinite linear;
            }

            @-webkit-keyframes spin {
                0% {
                    -webkit-transform: rotate(0deg);
                    transform:         rotate(0deg);
                }
                100% {
                    -webkit-transform: rotate(359deg);
                    transform:         rotate(359deg);
                }
            }

            @keyframes spin {
                0% {
                    -webkit-transform: rotate(0deg);
                    transform:         rotate(0deg);
                }
                100% {
                    -webkit-transform: rotate(359deg);
                    transform:         rotate(359deg);
                }
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
    |  12. #RIGHT PANEL              |  right panel userlist          |
    |  13. #MAIN PANEL               |  main panel                    |
    |  14. #MAIN CONTENT             |  content holder                |
    |  15. #PAGE FOOTER              |  page footer                   |
    |  16. #SHORTCUT AREA            |  dropdown shortcuts area       |
    |  17. #PLUGINS                  |  all scripts and plugins       |
    
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
    <style>


        html {
            font-size: 14px;
            overflow: hidden;
            /* overflow-y: scroll; */
            /* overflow-x: auto; */
        }

        table tbody tr {
            font-size: 12px !important;
        }
        .demo-btns>li {
            margin-bottom: 0px !important;
            margin-left: 3px;
        }
    </style>
    <body class="">



        <section id="widget-grid" class="" style="padding:10px">



            <h1>Instituciones</h1>

            <button type="button" class="btn btn-default txt-color-blueDark" 
                    id="add_adm_institucion">
                <i class="fa fa-plus fa-lg"></i>
            </button>

            <table style="width:100%" class="table table-striped table-bordered table-hover " id="table_adm_institucion">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Fecha</th>
                        <th>Codigo</th>
                        <th>Estado</th>
                        <th>Accion</th>

                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>





            <div id="loading_container">
                <div id="loading_container2">
                    <div id="loading_container3">
                        <div id="loading_container4">
                            Loading, please wait...
                        </div>
                    </div>
                </div>
            </div>




            <!-- end row -->

            <!-- end row -->

        </section>



        <div class="modal fade" id="modal_adm_institucion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="exampleModalLabel">Gestion de instituciones</h4>
                    </div>
                    <div class="modal-body">
                        <form id="form_adm_institucion" class="smart-form form_adm_institucion" >
                            <fieldset>

                                <div class="form-group">
                                    <label for="in_nombre" class="control-label">Nombre:</label>
                                    <input type="text" class="form-control" id="in_nombre" name="in_nombre" >
                                </div>
                                <div class="form-group">
                                    <label for="in_fecha" class="control-label">Fecha:</label>
                                    <input class="form-control" name="in_fecha" id="in_fecha">
                                </div>
                                <div class="form-group">
                                    <label for="in_codigo" class="control-label">Codigo:</label>
                                    <input class="form-control" name="in_codigo" id="in_codigo">
                                </div>
                                <div class="form-group">
                                    <label class="checkbox">
                                        <input type="checkbox" name="in_estado" id="in_estado">
                                        <i></i>Estado</label>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary guardar">Guardar</button>
                    </div>
                </div>
            </div>
        </div>


        <!--================================================== -->

        <!-- PACE LOADER - turn this on if you want ajax loading to show (caution: uses lots of memory on iDevices)-->
        <script data-pace-options='{ "restartOnRequestAfter": true }' src="<?= base_url(); ?>public/template/smart/js/plugin/pace/pace.min.js"></script>

        <!-- Link to Google CDN's jQuery + jQueryUI; fall back to local -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script>
            if (!window.jQuery) {
                document.write('<script src="js/libs/jquery-3.2.1.min.js"><\/script>');
            }
        </script>

        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
        <script>
            if (!window.jQuery.ui) {
                document.write('<script src="js/libs/jquery-ui.min.js"><\/script>');
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

        <!-- JS TOUCH : include this plugin for mobile drag / drop touch events-->
        <script src="<?= base_url(); ?>public/template/smart/js/plugin/jquery-touch/jquery.ui.touch-punch.min.js"></script> 

        <!-- BOOTSTRAP JS -->
        <script src="<?= base_url(); ?>public/template/smart/js/bootstrap/bootstrap.min.js"></script>

        <!-- CUSTOM NOTIFICATION -->
        <script src="<?= base_url(); ?>public/template/smart/js/notification/SmartNotification.min.js"></script>

        <script charset="utf-8" src="//cdn.jsdelivr.net/jquery.validation/1.13.1/jquery.validate.min.js"></script>
        <!-- PAGE RELATED PLUGIN(S) -->
        <script src="<?= base_url(); ?>public/template/smart/js/plugin/datatables/jquery.dataTables.min.js"></script>
<!--        <script src="<?= base_url(); ?>public/template/smart/js/plugin/datatables/dataTables.colVis.min.js"></script>
        <script src="<?= base_url(); ?>public/template/smart/js/plugin/datatables/dataTables.tableTools.min.js"></script>
        <script src="<?= base_url(); ?>public/template/smart/js/plugin/datatables/dataTables.bootstrap.min.js"></script>
        <script src="<?= base_url(); ?>public/template/smart/js/plugin/datatable-responsive/datatables.responsive.min.js"></script>-->

        <script>

            $(document).on("click", "table tbody tr", function() {
                //      $("#exampleModal").modal("show");
            });




            $(document).ready(function() {

                // On page load: datatable
                var table_adm_institucion = $('#table_adm_institucion').dataTable({
                    "ajax": url + 'index.php/modules/adm/adm_institucion/get_all_data',
                    "columns": [
                        {"data": "in_idinstitucion"},
                        {"data": "in_nombre", "sClass": "company_name"},
                        {"data": "in_fecha"},
                        {"data": "in_codigo", "sClass": "integer"},
                        {"data": "in_estado", "sClass": "integer"},
                        {"data": "functions", "sClass": "functions"}
                    ],
                    "aoColumnDefs": [
                        {"bSortable": false, "aTargets": [-1]}
                    ],
                    "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
                    "oLanguage": {
                        "oPaginate": {
                            "sFirst": " ",
                            "sPrevious": " ",
                            "sNext": " ",
                            "sLast": " ",
                        },
                        "sLengthMenu": "Records per page: _MENU_",
                        "sInfo": "Total of _TOTAL_ records (showing _START_ to _END_)",
                        "sInfoFiltered": "(filtered from _MAX_ total records)"
                    }
                });

                // On page load: form validation
                jQuery.validator.setDefaults({
                    success: 'valid',
                    rules: {
                        fiscal_year: {
                            required: true,
                            min: 2000,
                            max: 2025
                        }
                    },
                    errorPlacement: function(error, element) {
                        error.insertBefore(element);
                    },
                    highlight: function(element) {
                        $(element).parent('.field_container').removeClass('valid').addClass('error');
                    },
                    unhighlight: function(element) {
                        $(element).parent('.field_container').addClass('valid').removeClass('error');
                    }
                });
                var form_adm_institucion = $('#form_adm_institucion');
                form_adm_institucion.validate();

                // Show message
                function show_message(message_text, message_type) {
                    $('#message').html('<p>' + message_text + '</p>').attr('class', message_type);
                    $('#message_container').show();
                    if (typeof timeout_message !== 'undefined') {
                        window.clearTimeout(timeout_message);
                    }
                    timeout_message = setTimeout(function() {
                        hide_message();
                    }, 8000);
                }
                // Hide message
                function hide_message() {
                    $('#message').html('').attr('class', '');
                    $('#message_container').hide();
                }

                // Show loading message
                function show_loading_message() {
                    $('#loading_container').show();
                }
                // Hide loading message
                function hide_loading_message() {
                    $('#loading_container').hide();
                }

                // Show lightbox
                function show_lightbox() {
                    $("#modal_adm_institucion").modal('show')
                }
                // Hide lightbox
                function hide_lightbox() {
                    $("#modal_adm_institucion").modal('hide');
                }
                // Lightbox background
                $(document).on('click', '.lightbox_bg', function() {
                    hide_lightbox();
                });
                // Lightbox close button
                $(document).on('click', '.lightbox_close', function() {
                    hide_lightbox();
                });
                // Escape keyboard key
                $(document).keyup(function(e) {
                    if (e.keyCode == 27) {
                        hide_lightbox();
                    }
                });

                // Hide iPad keyboard
                function hide_ipad_keyboard() {
                    document.activeElement.blur();
                    $('input').blur();
                }

                // Add company button
                $(document).on('click', '#add_adm_institucion', function(e) {
                    e.preventDefault();
                    $('#form_adm_institucion').attr('data-id', '');
                    $('#form_adm_institucion .field_container label.error').hide();
                    $('#form_adm_institucion .field_container').removeClass('valid').removeClass('error');
                    $('#form_adm_institucion #in_nombre').val('');
                    $('#form_adm_institucion #in_fecha').val('');
                    $('#form_adm_institucion #in_codigo').val('');
                    $('#form_adm_institucion #in_estado').attr('checked', false)

        //            $('.lightbox_content h2').text('Add company');
        //            $('#form_adm_institucion button').text('Add company');
        //            $('#form_adm_institucion').attr('class', 'form add');
        //            $('#form_adm_institucion').attr('data-id', '');
        //            $('#form_adm_institucion .field_container label.error').hide();
        //            $('#form_adm_institucion .field_container').removeClass('valid').removeClass('error');
        //            $('#form_adm_institucion #rank').val('');
        //            $('#form_adm_institucion #in_nombre').val('');
        //            $('#form_adm_institucion #industries').val('');
        //            $('#form_adm_institucion #revenue').val('');
        //            $('#form_adm_institucion #fiscal_year').val('');
        //            $('#form_adm_institucion #employees').val('');
        //            $('#form_adm_institucion #market_cap').val('');
        //            $('#form_adm_institucion #headquarters').val('');
                    show_lightbox();
                });

                // Add company submit form
                $(document).on('click', '.guardar', function(e) {
                    e.preventDefault();
                    // Validate form
                    if (form_adm_institucion.valid() == true) {
                        // Send company information to database
                        hide_ipad_keyboard();
                        hide_lightbox();
                        show_loading_message();


                        var id = $('#form_adm_institucion').attr('data-id');
                        var in_nombre = $("#in_nombre").val();
                        var in_fecha = $("#in_fecha").val();
                        var in_codigo = $("#in_codigo").val();
                        var in_estado = $("#in_estado").is("checked") ? 1 : 0;


                        var request = $.ajax({
                            url: url + 'index.php/modules/adm/adm_institucion/save',
                            cache: false,
                            data: ({
                                in_idinstitucion: id,
                                in_nombre: in_nombre,
                                in_fecha: in_fecha,
                                in_codigo: in_codigo,
                                in_estado: in_estado
                            }),
                            dataType: 'json',
                            contentType: 'application/json; charset=utf-8',
                            type: 'get'
                        });
                        request.done(function(output) {
                            if (output.result == 'success') {
                                // Reload datable
                                table_adm_institucion.api().ajax.reload(function() {
                                    hide_loading_message();
                                    var company_name = $('#in_nombre').val();
                                    show_message("Company '" + company_name + "' added successfully.", 'success');
                                }, true);
                            } else {
                                hide_loading_message();
                                show_message('Add request failed', 'error');
                            }
                        });
                        request.fail(function(jqXHR, textStatus) {
                            hide_loading_message();
                            show_message('Add request failed: ' + textStatus, 'error');
                        });
                    }
                });

                // Edit company button
                $(document).on('click', '.function_edit a', function(e) {
                    e.preventDefault();
                    // Get company information from database
                    show_loading_message();
                    var id = $(this).data('id');
                    var request = $.ajax({
                        url: url + 'index.php/modules/adm/adm_institucion/get_by_id',
                        cache: false,
                        data: 'id=' + id,
                        dataType: 'json',
                        contentType: 'application/json; charset=utf-8',
                        type: 'get'
                    });
                    request.done(function(output) {
                        if (output != null) {
                            $('#form_adm_institucion').attr('data-id', output.in_idinstitucion);
                            $('#form_adm_institucion #in_nombre').val(output.in_nombre);
                            $('#form_adm_institucion #in_fecha').val(output.in_fecha);
                            $('#form_adm_institucion #in_codigo').val(output.in_codigo);
                            $('#form_adm_institucion #in_estado').attr("checked", (output.in_estado) ? true : false);
                            hide_loading_message();
                            show_lightbox();
                        } else {
                            hide_loading_message();
                            show_message('Information request failed', 'error');
                        }
                    });
                    request.fail(function(jqXHR, textStatus) {
                        hide_loading_message();
                        show_message('Information request failed: ' + textStatus, 'error');
                    });
                });

//                // Edit company submit form
//                $(document).on('submit', '#form_company.edit', function(e) {
//                    e.preventDefault();
//                    // Validate form
//                    if (form_adm_institucion.valid() == true) {
//                        // Send company information to database
//                        hide_ipad_keyboard();
//                        hide_lightbox();
//                        show_loading_message();
//                        var id = $('#form_adm_institucion').attr('data-id');
//                        var in_nombre = $("#in_nombre").val();
//                        var in_fecha = $("#in_fecha").val();
//                        var in_codigo = $("#in_codigo").val();
//                        var in_estado = $("#in_estado").is("checked") ? 1 : 0;
//
//
//                        var form_data = new FormData();
//
//                        var request = $.ajax({
//                            url: url + 'index.php/adm/get_all_data',
//                            cache: false,
//                            data: ({
//                                in_idinstitucion: id,
//                                in_nombre: in_nombre,
//                                in_fecha: in_fecha,
//                                in_codigo: in_codigo,
//                                in_estado: in_estado
//                            }),
//                            dataType: 'json',
//                            contentType: 'application/json; charset=utf-8',
//                            type: 'get'
//                        });
//                        request.done(function(output) {
//                            if (output.result == 'success') {
//                                // Reload datable
//                                table_adm_institucion.api().ajax.reload(function() {
//                                    hide_loading_message();
//                                    var company_name = $('#company_name').val();
//                                    show_message("Company '" + company_name + "' edited successfully.", 'success');
//                                }, true);
//                            } else {
//                                hide_loading_message();
//                                show_message('Edit request failed', 'error');
//                            }
//                        });
//                        request.fail(function(jqXHR, textStatus) {
//                            hide_loading_message();
//                            show_message('Edit request failed: ' + textStatus, 'error');
//                        });
//                    }
//                });

                // Delete company
                $(document).on('click', '.function_delete a', function(e) {
                    e.preventDefault();
                    var company_name = $(this).data('name');
                    if (confirm("Are you sure you want to delete '" + company_name + "'?")) {
                        show_loading_message();
                        var id = $(this).data('id');
                        var request = $.ajax({
                            url: url + 'index.php/adm/get_all_data',
                            cache: false,
                            dataType: 'json',
                            contentType: 'application/json; charset=utf-8',
                            type: 'get'
                        });
                        request.done(function(output) {
                            if (output.result == 'success') {
                                // Reload datable
                                table_adm_institucion.api().ajax.reload(function() {
                                    hide_loading_message();
                                    show_message("Company '" + company_name + "' deleted successfully.", 'success');
                                }, true);
                            } else {
                                hide_loading_message();
                                show_message('Delete request failed', 'error');
                            }
                        });
                        request.fail(function(jqXHR, textStatus) {
                            hide_loading_message();
                            show_message('Delete request failed: ' + textStatus, 'error');
                        });
                    }
                });

            });





        </script>


    </body>

</html>