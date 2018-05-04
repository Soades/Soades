

<script>
    var url = '<?php echo BASE; ?>';
    var Routers = function () {
        return {url: '<?php echo BASE; ?>'};
    }();
//    $(document).ready(function(){
//      
//    });
</script>

<!-- jQuery, theme required for theme -->
<script src="<?php echo BASE; ?>public/template/syre/assets/jquery/jquery.js"></script>
<script src="<?php echo BASE; ?>public/template/syre/assets/bootstrap/js/bootstrap.min.js"></script>

<!-- theme dependencies -->
<script src="<?php echo BASE; ?>public/template/syre/assets/isotope/jquery.isotope.min.js"></script>
<script src="<?php echo BASE; ?>public/template/syre/assets/verge/verge.min.js"></script>
<script src="<?php echo BASE; ?>public/template/syre/assets/moment/moment.min.js"></script>
<script src="<?php echo BASE; ?>public/template/syre/assets/morris/raphael-2.1.0.min.js"></script>
<script src="<?php echo BASE; ?>public/template/syre/assets/google-code-prettify/prettify.js"></script>

<!-- other dependencies -->
<script src="<?php echo BASE; ?>public/template/metro/assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
<script src="<?php echo BASE; ?>public/template/metro/assets/global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>
<script src="<?php echo BASE; ?>public/template/rapido/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js" type="text/javascript"></script>
<script src="<?php echo BASE; ?>public/template/syre/assets/datatables/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="<?php echo BASE; ?>public/template/syre/assets/datatables/js/datatables.js" type="text/javascript"></script>
<script src="<?php echo BASE; ?>public/template/rapido/assets/plugins/bootbox/bootbox.min.js" type="text/javascript"></script>
<script src="<?php echo BASE; ?>public/template/syre/assets/jquery-icheck/jquery.icheck.min.js"></script>
<script src="<?php echo BASE; ?>public/template/syre/assets/bootstrap-jasny/js/fileinput.js" type="text/javascript"></script>
<script src="<?php echo BASE; ?>public/template/syre/assets/bootstrap3-datetimepicker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
<script src="<?php echo BASE; ?>public/template/syre/assets/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="<?php echo BASE; ?>public/template/syre/assets/mjaalnir-bootstrap-colorpicker/js/bootstrap-colorpicker.min.js" type="text/javascript"></script>
<script src="<?php echo BASE; ?>public/template/syre/assets/jquery-simplecolorpicker/jquery.simplecolorpicker.js" type="text/javascript"></script>
<script src="<?php echo BASE; ?>public/template/syre/assets/morris/morris.min.js"></script>
<script src="<?php echo BASE; ?>public/template/syre/assets/jquery-tags-input/jquery.tagsinput.min.js"></script>
<script src="<?php echo BASE; ?>public/template/syre/assets/select2/select2.min.js"></script>
<script src="<?php echo BASE; ?>public/template/syre/assets/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script src="<?php echo BASE; ?>public/template/ministerio/js/toastr.min.js" type="text/javascript"></script>
<script src="<?php echo BASE; ?>public/template/ministerio/js/mask/dist/jquery.mask.js" type="text/javascript"></script>
<!-- theme app main.js -->
<script src="<?php echo BASE; ?>public/template/syre/assets/app/js/main.js"></script>
<script>/*
 (function (b, o, i, l, e, r) {
 b.GoogleAnalyticsObject = l;
 b[l] || (b[l] =
 function () {
 (b[l].q = b[l].q || []).push(arguments)
 });
 b[l].l = +new Date;
 e = o.createElement(i);
 r = o.getElementsByTagName(i)[0];
 e.src = '//www.google-analytics.com/analytics.js';
 r.parentNode.insertBefore(e, r)
 }(window, document, 'script', 'ga'));
 ga('create', 'UA-71722129-1');
 ga('send', 'pageview');
 */
    
    
    function LoadPageModule(subm,modulo_name){
                
        var router = url + 'index.php/modules/' + subm + '/' + modulo_name;
        var contenido = $(".content-main");
                
        $.ajax({
            url: router,
            cache: false,
            type: "GET",            
            dataType: "HTML",
            beforeSend: function () {
                var overlay = $('<div class="refresh-overlay"><i class="refresh-spinner fa fa-spinner fa-spin fa-5x" style="margin-top:10%;opacity:0.7"></i></div>');
                var css = {
                    position: "absolute",
                    top: 0,
                    right: 0,
                    background: "rgba(200,200,200,0.25)",
                    width: "100%",
                    height: "100%",
                    "text-align": "center",
                    "z-index": 4
                };
                overlay.css(css);
                contenido.html(overlay);
            },
            success: function (data) {                
                contenido.css({
                    opacity: "0.0"
                }).html(data).delay(50).animate({
                    opacity: "1.0"
                }, 300);              
            },
            error: function () {
                contenido.html("<h4 style='margin:20% 40% auto' class='ajax-loading-error'><i class='fa fa-refresh fa-spin'></i> Error de datos.</h4>")
            },
            complete: function (jqXHR, textStatus) {
            },
            async: !0
        });
    }

    $(function () {

        $(document).on('click', '.side-nav a.cl_data_router', function (e) {
            
            var contenido = $(".content-main")         
            var page = $(this).attr('href');
            var data = $(this).attr('data');
            var subm = $(this).attr('data-router');
            var modulo_name = $(this).attr('data-modulo-name');
            if (typeof subm !== 'undefined') {
                if (subm != '#') {                    
                    LoadPageModule(subm,modulo_name);
//                    var urlink = url + 'index.php/modules/' + subm + '/' + modulo_name;
//                    contenido.html('<iframe style="position:absolute1;" id="iframe_' + modulo_name + '" src="' + urlink + '" width="100%" height="100%" scrolling="NO" frameborder="0" ></iframe>');
                }
            }     
            
            e.preventDefault();
            e.stopPropagation();
            e.stopImmediatePropagation();
            
        });


//     $(document).on('click', '.side-nav a.cl_data_router', function (e) {
//        e.preventDefault();
//        e.stopPropagation();
//        var contenido   = $(".content-main")
//        var page        = $(this).attr('href');
//        var data        = $(this).attr('data');
//        var subm        = $(this).attr('data-router'); 
//        var modulo_name = $(this).attr('data-modulo-name'); 
//        if (typeof subm !== 'undefined'){
//          if (subm != '#'){
//            var urlink = url + 'index.php/modules/'+subm+'/'+modulo_name;
//            contenido.html('<iframe style="position:absolute1;" id="iframe_'+modulo_name+'" src="'+urlink+'" width="100%" height="100%" scrolling="NO" frameborder="0" ></iframe>');
//           }
//        }        
//    }); 
    });


</script>

<script type="text/javascript">
    $(function () {

//        // date range picker
//        $('#dashboard-range').daterangepicker(
//                {
//                    ranges: {
//                        'Today': [moment(), moment()],
//                        'Yesterday': [moment().subtract('days', 1), moment().subtract('days', 1)],
//                        'Last 7 Days': [moment().subtract('days', 6), moment()],
//                        'Last 30 Days': [moment().subtract('days', 29), moment()],
//                        'This Month': [moment().startOf('month'), moment().endOf('month')],
//                        'Last Month': [moment().subtract('month', 1).startOf('month'), moment().subtract('month', 1).endOf('month')]
//                    },
//                    startDate: moment().subtract('days', 6),
//                    endDate: moment()
//                },
//        function (start, end) {
//            $('#dashboard-range .text-date').text(start.format('MMM D, YYYY') + ' - ' + end.format('MMM D, YYYY'));
//        }
//        );
//
//
//
//        // charts
//        // chart revenue
//        var data1 = [
//            {dates: '2013-10-30', sales: 236},
//            {dates: '2013-10-31', sales: 137},
//            {dates: '2013-11-01', sales: 275},
//            {dates: '2013-11-02', sales: 380},
//            {dates: '2013-11-03', sales: 655},
//            {dates: '2013-11-04', sales: 571}
//        ],
//                revenueChart = Morris.Line({
//                    element: 'revenue-chart',
//                    data: data1,
//                    lineColors: ['#3498db'],
//                    gridTextColor: '#34495e',
//                    pointFillColors: ['#3498db'],
//                    xkey: 'dates',
//                    ykeys: ['sales'],
//                    labels: ['Sales'],
//                    barRatio: 0.4,
//                    hideHover: 'auto'
//                }),
//                salesChart = Morris.Donut({
//                    element: 'sales-chart',
//                    data: [
//                        {label: 'Download Sales', value: 25},
//                        {label: 'In-Store Sales', value: 40},
//                        {label: 'Mail-Order Sales', value: 25},
//                        {label: 'Respond Sales', value: 10}
//                    ],
//                    colors: ['#f39c12', '#3498db', '#2ecc71', '#e74c3c'],
//                    gridTextColor: '#3498db',
//                    formatter: function (y) {
//                        return y + "%"
//                    }
//                }),
//                data_items = [
//                    {themes: 'Stilearn', purchase: 136},
//                    {themes: 'StilMetro', purchase: 137},
//                    {themes: 'Syrena', purchase: 675},
//                    {themes: 'Biosia', purchase: 380},
//                    {themes: 'GlitFlat', purchase: 655},
//                    {themes: 'Zahra', purchase: 1571}
//                ],
//                itemsChart = Morris.Bar({
//                    element: 'items-chart',
//                    data: data_items,
//                    barColors: ['#3498db'],
//                    gridTextColor: '#34495e',
//                    xkey: 'themes',
//                    ykeys: ['purchase'],
//                    labels: ['Purchase'],
//                    barRatio: 0.4,
//                    xLabelAngle: 30,
//                    hideHover: 'auto'
//                });
//
//        // update data on content or window resize
//        var update = function () {
//            revenueChart.redraw();
//            salesChart.redraw();
//            itemsChart.redraw();
//        }
//
//        // handle chart responsive on toggle .content
//        $(window).on('resize', function () {
//            update();
//        })
//        $('#toggle-aside').on('click', function () {
//            // update chart after transition finished
//            $("#content").bind("transitionend webkitTransitionEnd oTransitionEnd MSTransitionEnd", function () {
//                update();
//                $(this).unbind();
//            });
//        })
//        $('#toggle-content').on('click', function () {
//            update();
//        })
//        // end chart
//

//    http://bitec.biword.com/ord/ventas/add_all/credito:1

//
//        // todo list
//        $('.icheck').iCheck({
//            checkboxClass: 'icheckbox_flat-green',
//            radioClass: 'iradio_flat-green',
//            increaseArea: '20%' // optional
//        }).on('ifChanged', function () {
//            var $this = $(this),
//                    todo = $(this).parent().parent().parent();
//
//            todo.toggleClass('todo-marked');
//            todo.find('.label').toggleClass('label-success');
//        });
//
//
//
//        // Quick Mail
//        $('#quick-mail-reseiver').tagsInput({
//            height: '70px',
//            width: 'auto', // support percent (90%)
//            defaultText: '+ reseiver'
//        });
//        // manual style for .tagsinput
//        $('div.tagsinput input').on('focus', function () {
//            var tagsinput = $(this).parent().parent();
//            tagsinput.addClass('focus');
//        }).on('focusout', function () {
//            var tagsinput = $(this).parent().parent();
//            tagsinput.removeClass('focus');
//        });
//        $('#quick-mail-content').wysihtml5({
//            "font-styles": true, //Font styling, e.g. h1, h2, etc. Default true
//            "emphasis": true, //Italics, bold, etc. Default true
//            "lists": false, //(Un)ordered lists, e.g. Bullets, Numbers. Default true
//            "html": false, //Button which allows you to edit the generated HTML. Default false
//            "link": true, //Button to insert a link. Default true
//            "image": true, //Button to insert an image. Default true,
//            "color": false, //Button to change color of font  
//            "size": 'sm' // use button small ion and primary
//        });
    });
    
</script>
</body>
</html>
