<!DOCTYPE html>
<html lang="en">
    
 <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta charset="utf-8" />
        <title>david-rosapharma</title>

        <meta name="description" content="overview &amp; stats" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
        <link href="<?php echo site_url(B_TEMPLATE . 'dist/css/bootstrap.css'); ?>" rel="stylesheet" />
        <link href="<?php echo site_url(B_CSS . 'font-awesome.min.css'); ?>" rel="stylesheet" />
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300" />
        <link href="<?php echo site_url(B_TEMPLATE . 'dist/css/ace.min.css'); ?>" rel="stylesheet" />
        
        <script src="<?php echo site_url(B_TEMPLATE . 'dist/js/ace-extra.min.js'); ?>" ></script>
        <script src="<?php echo site_url(B_JS . 'jquery.min.js'); ?>" ></script>
        <style>
            .required{
                color:red !important;
            }
        </style>

        <!-- include file upload libs --> <!-- link: http://www.jasny.net/bootstrap/javascript/#fileinput-usage -->
        <link rel="stylesheet" href="<?php echo site_url(B_TEMPLATE . 'jasny-bootstrap-file-upload/css/jasny-bootstrap.min.css'); ?>"> 
        <script src="<?php echo site_url(B_TEMPLATE . 'jasny-bootstrap-file-upload/js/jasny-bootstrap.min.js'); ?>"></script>

    </head>

    <body class="no-skin">
        <div id="navbar" class="navbar navbar-default">
            <?php
                echo $this->load->view(B_INC_PAGES . 'header');
            ?>
        </div>

        <div class="main-container" id="main-container">
            <?php
                echo $this->load->view(B_INC_PAGES . 'left_menu');
            ?>
        </div>

            <div class="main-content">
                <div class="main-content-inner">
                    <div class="page-content">
                        <div class="ace-settings-container" id="ace-settings-container">
                             <?php
                                 echo $this->load->view(B_INC_PAGES . 'setting');
                             ?>
                        </div><!-- /.ace-settings-container -->

                        <div class="row">
                            <div class="col-xs-12">
                                <!-- PAGE CONTENT BEGINS -->
                                    <?php
                                    if (isset($page_not_found) && $page_not_found != "") {
                                        $this->load->view(B_INC_PAGES . 'page_not_found');
                                    } else {
                                        if (isset($page) && $page != "") {
                                            $this->load->view(B_INC_PAGES . 'pages');
                                        } else {
                                            if ($this->uri->segment(1) == "") {

                                                echo $this->load->view(B_INC_PAGES . 'content');
                                                //                        $this->load->view(F_TEMPLATE . $this->uri->segment(1) . '/' . $this->uri->segment(2) . '.php');
                                            } else {

                                                $this->load->view(B_TEMPLATE . str_replace('-', '_', segment(1)) . '/' . ((segment(2) == '') ? 'index' : str_replace('-', '_', segment(2))));
                                            }
                                        }
                                    }
                                    ?>
                                <!-- PAGE CONTENT ENDS -->
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div><!-- /.page-content -->
                </div>
            </div><!-- /.main-content -->

            <div class="footer">
                <?php
                     echo $this->load->view(B_INC_PAGES . 'footer');
                 ?>
            </div>

            <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
                <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
            </a>
        </div><!-- /.main-container -->

       <script src="<?php echo site_url(B_JS . 'jquery.min.js'); ?>"></script>
        <!-- <![endif]-->
        <script type="text/javascript">
                        window.jQuery || document.write("<script src='<?php echo site_url(F_TEMPLATE . 'dist/js/jquery.min.js'); ?>
                                '>"+"<"+"/script>");
        </script>

        <!-- <![endif]-->

        <!--[if IE]>
        <script type="text/javascript">
        window.jQuery || document.write("<script src='dist/js/jquery1x.min.js'>"+"<"+"/script>");
        </script>
        <![endif]-->
        <script type="text/javascript">
                            if ('ontouchstart' in document.documentElement)
                            document.write()
                            "<script src='<?php echo site_url(F_TEMPLATE . 'dist/js/jquery.mobile.custom.min.js'); ?>'>" + "<" + "/script>");</script>

        <script src="<?php echo site_url(B_JS . 'bootstrap.min.js'); ?>"></script>
        <!-- page specific plugin scripts -->
        <!-- page specific plugin scripts -->
        <script src="<?php echo site_url(B_TEMPLATE . 'dist/js/dataTables/jquery.dataTables.min.js'); ?>"></script>
        <script src="<?php echo site_url(B_TEMPLATE . 'dist/js/dataTables/jquery.dataTables.bootstrap.min.js'); ?>"></script>
 
        <script src="<?php echo site_url(B_TEMPLATE . 'dist/js/jquery-ui.custom.min.js'); ?>"></script>
        <script src="<?php echo site_url(B_TEMPLATE . 'dist/js/jquery.ui.touch-punch.min.js'); ?>"></script>
        <script src="<?php echo site_url(B_TEMPLATE . 'dist/js/chosen.jquery.min.js'); ?>"></script>
        <script src="<?php echo site_url(B_TEMPLATE . 'dist/js/jquery.easypiechart.min.js'); ?>"></script>
        <script src="<?php echo site_url(B_TEMPLATE . 'dist/js/jquery.sparkline.min.js'); ?>"></script>
        <script src="<?php echo site_url(B_TEMPLATE . 'dist/js/flot/jquery.flot.min.js'); ?>"></script>
        <script src="<?php echo site_url(B_TEMPLATE . 'dist/js/flot/jquery.flot.pie.min.js'); ?>"></script>
        <script src="<?php echo site_url(B_TEMPLATE . 'dist/js/flot/jquery.flot.resize.min.js'); ?>"></script>
        <script src="<?php echo site_url(B_TEMPLATE . 'dist/js/flot/jquery.flot.resize.min.js'); ?>"></script>

        <script src="<?php echo site_url(B_TEMPLATE . 'dist/js/flot/fuelux.spinner.min.js'); ?>"></script>
        <script src="<?php echo site_url(B_TEMPLATE . 'dist/js/date-time/bootstrap-datepicker.min.js'); ?>"></script>
        <script src="<?php echo site_url(B_TEMPLATE . 'dist/js/date-time/bootstrap-timepicker.min.js'); ?>"></script>
        <script src="<?php echo site_url(B_TEMPLATE . 'dist/js/date-time/moment.min.js'); ?>"></script>
        <script src="<?php echo site_url(B_TEMPLATE . 'dist/js/jquery.autosize.min.js'); ?>"></script>
        <!-- ace scripts -->
        
        <script src="<?php echo site_url(B_TEMPLATE . 'dist/js/ace-elements.min.js'); ?>"></script>
        <script src="<?php echo site_url(B_TEMPLATE . 'dist/js/ace.min.js'); ?>"></script>


  <script>
      $(function() {
        $('.chosen-select').chosen();
        $('.chosen-select-deselect').chosen({ allow_single_deselect: true });
      });
    
    </script>
     <!-- for text editor TinyMCE-->

    <!--<script src="<?php echo site_url(B_TEMPLATE . 'jscripts/tiny_mce/tiny_mce.js'); ?>"></script>-->
    <script src="<?php echo site_url('jscripts/tiny_mce/tiny_mce.js'); ?>"></script>
    <script type="text/javascript">
        tinyMCE.init({
            // General options
            mode : "textareas",
            theme : "advanced",
            plugins : "openmanager,autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave,visualblocks",

            // Theme options
            theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
            theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
            theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
            theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft,visualblocks,|,openmanager",
            theme_advanced_toolbar_location : "top",
            theme_advanced_toolbar_align : "left",
            theme_advanced_statusbar_location : "bottom",
            theme_advanced_resizing : true,
            
            //Open Manager Options
            file_browser_callback: "openmanager",
            open_manager_upload_path: '../../../../uploads/',

            // Example content CSS (should be your site CSS)
            content_css : "css/content.css",

            // Drop lists for link/image/media/template dialogs
            template_external_list_url : "lists/template_list.js",
            external_link_list_url : "lists/link_list.js",
            external_image_list_url : "lists/image_list.js",
            media_external_list_url : "lists/media_list.js",

            // Style formats
            style_formats : [
                {title : 'Bold text', inline : 'b'},
                {title : 'Red text', inline : 'span', styles : {color : '#ff0000'}},
                {title : 'Red header', block : 'h1', styles : {color : '#ff0000'}},
                {title : 'Example 1', inline : 'span', classes : 'example1'},
                {title : 'Example 2', inline : 'span', classes : 'example2'},
                {title : 'Table styles'},
                {title : 'Table row 1', selector : 'tr', classes : 'tablerow1'}
            ],

            // Replace values for the template plugin
            template_replace_values : {
                username : "Some User",
                staffid : "991234"
            }
        });
    </script>
    <!-- /TinyMCE -->
    </body>
</html>
<!-- inline scripts related to this page -->
        <script type="text/javascript">
                    jQuery(function($) {
                    //data table
                    var oTable1 = 
                    $('#sample-table-10')
                //.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
                .dataTable( {
                    bAutoWidth: false,
                    "aoColumns": [
                      { "bSortable": false },
                      null, null,null, null, null,null,null,null,
                      { "bSortable": false }
                    ],
                    "aaSorting": [],
            
                    //,
                    //"sScrollY": "200px",
                    //"bPaginate": false,
            
                    //"sScrollX": "100%",
                    //"sScrollXInner": "120%",
                    //"bScrollCollapse": true,
                    //Note: if you are applying horizontal scrolling (sScrollX) on a ".table-bordered"
                    //you may want to wrap the table inside a "div.dataTables_borderWrap" element
            
                    //"iDisplayLength": 50
                });
                $('#sample-table-9')
                //.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
                .dataTable( {
                    bAutoWidth: false,
                    "aoColumns": [
                      { "bSortable": false },
                      null, null,null, null, null,null,null,
                      { "bSortable": false }
                    ],
                    "aaSorting": [],
            
                    //,
                    //"sScrollY": "200px",
                    //"bPaginate": false,
            
                    //"sScrollX": "100%",
                    //"sScrollXInner": "120%",
                    //"bScrollCollapse": true,
                    //Note: if you are applying horizontal scrolling (sScrollX) on a ".table-bordered"
                    //you may want to wrap the table inside a "div.dataTables_borderWrap" element
            
                    //"iDisplayLength": 50
                });
                $('#sample-table-8')
                //.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
                .dataTable( {
                    bAutoWidth: false,
                    "aoColumns": [
                      { "bSortable": false },
                      null, null,null, null, null,null,
                      { "bSortable": false }
                    ],
                    "aaSorting": [],
            
                    //,
                    //"sScrollY": "200px",
                    //"bPaginate": false,
            
                    //"sScrollX": "100%",
                    //"sScrollXInner": "120%",
                    //"bScrollCollapse": true,
                    //Note: if you are applying horizontal scrolling (sScrollX) on a ".table-bordered"
                    //you may want to wrap the table inside a "div.dataTables_borderWrap" element
            
                    //"iDisplayLength": 50
                } );
                 $('#sample-table-7')
                    //.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
                    .dataTable( {
                        bAutoWidth: false,
                        "aoColumns": [
                          { "bSortable": false },
                          null, null,null, null, null,null,null,null,null,
                          { "bSortable": false }
                        ],
                        "aaSorting": [],
                
                        //,
                        //"sScrollY": "200px",
                        //"bPaginate": false,
                
                        //"sScrollX": "100%",
                        //"sScrollXInner": "120%",
                        //"bScrollCollapse": true,
                        //Note: if you are applying horizontal scrolling (sScrollX) on a ".table-bordered"
                        //you may want to wrap the table inside a "div.dataTables_borderWrap" element
                
                        //"iDisplayLength": 50
                } );

                $('#sample-table-6')
                //.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
                .dataTable( {
                    bAutoWidth: false,
                    "aoColumns": [
                      { "bSortable": false },
                      null, null,null, null, 
                      { "bSortable": false }
                    ],
                    "aaSorting": [],
            
                    //,
                    //"sScrollY": "200px",
                    //"bPaginate": false,
            
                    //"sScrollX": "100%",
                    //"sScrollXInner": "120%",
                    //"bScrollCollapse": true,
                    //Note: if you are applying horizontal scrolling (sScrollX) on a ".table-bordered"
                    //you may want to wrap the table inside a "div.dataTables_borderWrap" element
            
                    //"iDisplayLength": 50
                } );
                 $('#sample-table-5')
                //.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
                .dataTable( {
                    bAutoWidth: false,
                    "aoColumns": [
                      { "bSortable": false },
                      null, null,null,
                      { "bSortable": false }
                    ],
                    "aaSorting": [],
            
                    //,
                    //"sScrollY": "200px",
                    //"bPaginate": false,
            
                    //"sScrollX": "100%",
                    //"sScrollXInner": "120%",
                    //"bScrollCollapse": true,
                    //Note: if you are applying horizontal scrolling (sScrollX) on a ".table-bordered"
                    //you may want to wrap the table inside a "div.dataTables_borderWrap" element
            
                    //"iDisplayLength": 50
                } );
                $('#sample-table-2')
                //.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
                .dataTable( {
                    bAutoWidth: false,
                    "aoColumns": [
                      { "bSortable": false },
                      null, null,null, null, null,
                      { "bSortable": false }
                    ],
                    "aaSorting": [],
            
                    //,
                    //"sScrollY": "200px",
                    //"bPaginate": false,
            
                    //"sScrollX": "100%",
                    //"sScrollXInner": "120%",
                    //"bScrollCollapse": true,
                    //Note: if you are applying horizontal scrolling (sScrollX) on a ".table-bordered"
                    //you may want to wrap the table inside a "div.dataTables_borderWrap" element
            
                    //"iDisplayLength": 50
                } );
                
                $('#sample-table-3')
                //.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
                .dataTable( {
                    bAutoWidth: false,
                    "aoColumns": [
                      { "bSortable": false },
                      null, null,null, null,
                      { "bSortable": false }
                    ],
                    "aaSorting": [],
            
                    //,
                    //"sScrollY": "200px",
                    //"bPaginate": false,
            
                    //"sScrollX": "100%",
                    //"sScrollXInner": "120%",
                    //"bScrollCollapse": true,
                    //Note: if you are applying horizontal scrolling (sScrollX) on a ".table-bordered"
                    //you may want to wrap the table inside a "div.dataTables_borderWrap" element
            
                    //"iDisplayLength": 50
                } );
                
                $('#sample-table-4')
                //.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
                .dataTable( {
                    bAutoWidth: false,
                    "aoColumns": [
                      { "bSortable": false },
                      null, null,
                      { "bSortable": false }
                    ],
                    "aaSorting": [],
            
                    //,
                    //"sScrollY": "200px",
                    //"bPaginate": false,
            
                    //"sScrollX": "100%",
                    //"sScrollXInner": "120%",
                    //"bScrollCollapse": true,
                    //Note: if you are applying horizontal scrolling (sScrollX) on a ".table-bordered"
                    //you may want to wrap the table inside a "div.dataTables_borderWrap" element
            
                    //"iDisplayLength": 50
                } );
                    
                    // Date picker 
                    $('.date-picker').datepicker({
                    autoclose: true,
                            todayHighlight: true
                    })
                            //show datepicker when clicking on the icon
                            .next().on(ace.click_event, function(){
                    $(this).prev().focus();
                    });
                            //or change it into a date range picker
                            $('.input-daterange').datepicker({autoclose:true});
                            $('.easy-pie-chart.percentage').each(function() {
                    var $box = $(this).closest('.infobox');
                            var barColor = $(this).data('color') || (!$box.hasClass('infobox-dark') ? $box.css('color') : 'rgba(255,255,255,0.95)');
                            var trackColor = barColor == 'rgba(255,255,255,0.95)' ? 'rgba(255,255,255,0.25)' : '#E2E2E2';
                            var size = parseInt($(this).data('size')) || 50;
                            $(this).easyPieChart({
                    barColor : barColor,
                            trackColor : trackColor,
                            scaleColor : false,
                            lineCap : 'butt',
                            lineWidth : parseInt(size / 10),
                            animate : /msie\s*(8|7|6)/.test(navigator.userAgent.toLowerCase()) ? false : 1000,
                            size : size
                    });
                    })

                            $('.sparkline').each(function() {
                    var $box = $(this).closest('.infobox');
                            var barColor = !$box.hasClass('infobox-dark') ? $box.css('color') : '#FFF';
                            $(this).sparkline('html', {
                    tagValuesAttribute : 'data-values',
                            type : 'bar',
                            barColor : barColor,
                            chartRangeMin : $(this).data('min') || 0
                    });
                    });
                            //flot chart resize plugin, somehow manipulates default browser resize event to optimize it!
                            //but sometimes it brings up errors with normal resize event handlers
                            $.resize.throttleWindow = false;
                            var placeholder = $('#piechart-placeholder').css({
                    'width' : '90%',
                            'min-height' : '150px'
                    });
                            var data = [{
                            label : "social networks",
                                    data : 38.7,
                                    color : "#68BC31"
                            }, {
                            label : "search engines",
                                    data : 24.5,
                                    color : "#2091CF"
                            }, {
                            label : "ad campaigns",
                                    data : 8.2,
                                    color : "#AF4E96"
                            }, {
                            label : "direct traffic",
                                    data : 18.6,
                                    color : "#DA5430"
                            }, {
                            label : "other",
                                    data : 10,
                                    color : "#FEE074"
                            }]
                            function drawPieChart(placeholder, data, position) {
                            $.plot(placeholder, data, {
                            series : {
                            pie : {
                            show : true,
                                    tilt : 0.8,
                                    highlight : {
                                    opacity : 0.25
                                    },
                                    stroke : {
                                    color : '#fff',
                                            width : 2
                                    },
                                    startAngle : 2
                            }
                            },
                                    legend : {
                                    show : true,
                                            position : position || "ne",
                                            labelBoxBorderColor : null,
                                            margin : [ - 30, 15]
                                    },
                                    grid : {
                                    hoverable : true,
                                            clickable : true
                                    }
                            })
                            }

                    drawPieChart(placeholder, data);
                            /**
                             we saved the drawing function and the data to redraw with different position later when switching to RTL mode dynamically
                             so that's not needed actually.
                             */
                            placeholder.data('chart', data);
                            placeholder.data('draw', drawPieChart);
                            //pie chart tooltip example
                            var $tooltip = $("<div class='tooltip top in'><div class='tooltip-inner'></div></div>").hide().appendTo('body');
                            var previousPoint = null;
                            placeholder.on('plothover', function(event, pos, item) {
                            if (item) {
                            if (previousPoint != item.seriesIndex) {
                            previousPoint = item.seriesIndex;
                                    var tip = item.series['label'] + " : " + item.series['percent'] + '%';
                                    $tooltip.show().children(0).text(tip);
                            }
                            $tooltip.css({
                            top : pos.pageY + 10,
                                    left : pos.pageX + 10
                            });
                            } else {
                            $tooltip.hide();
                                    previousPoint = null;
                            }

                            });
                            /////////////////////////////////////
                            $(document).one('ajaxloadstart.page', function(e) {
                    $tooltip.remove();
                    });
                            var d1 = [];
                            for (var i = 0; i < Math.PI * 2; i += 0.5) {
                    d1.push([i, Math.sin(i)]);
                    }

                    var d2 = [];
                            for (var i = 0; i < Math.PI * 2; i += 0.5) {
                    d2.push([i, Math.cos(i)]);
                    }

                    var d3 = [];
                            for (var i = 0; i < Math.PI * 2; i += 0.2) {
                    d3.push([i, Math.tan(i)]);
                    }

                    var sales_charts = $('#sales-charts').css({
                    'width' : '100%',
                            'height' : '220px'
                    });
                            $.plot("#sales-charts", [{
                            label : "Domains",
                                    data : d1
                            }, {
                            label : "Hosting",
                                    data : d2
                            }, {
                            label : "Services",
                                    data : d3
                            }], {
                            hoverable : true,
                                    shadowSize : 0,
                                    series : {
                                    lines : {
                                    show : true
                                    },
                                            points : {
                                            show : true
                                            }
                                    },
                                    xaxis : {
                                    tickLength : 0
                                    },
                                    yaxis : {
                                    ticks : 10,
                                            min : - 2,
                                            max : 2,
                                            tickDecimals : 3
                                    },
                                    grid : {
                                    backgroundColor : {
                                    colors : ["#fff", "#fff"]
                                    },
                                            borderWidth : 1,
                                            borderColor : '#555'
                                    }
                            });
                            $('#recent-box [data-rel="tooltip"]').tooltip({
                    placement : tooltip_placement
                    });
                            function tooltip_placement(context, source) {
                            var $source = $(source);
                                    var $parent = $source.closest('.tab-content')
                                    var off1 = $parent.offset();
                                    var w1 = $parent.width();
                                    var off2 = $source.offset();
                                    //var w2 = $source.width();

                                    if (parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2))
                                    return 'right';
                                    return 'left';
                            }


                    $('.dialogs,.comments').ace_scroll({
                    size : 300
                    });
                            //Android's default browser somehow is confused when tapping on label which will lead to dragging the task
                            //so disable dragging when clicking on label
                            var agent = navigator.userAgent.toLowerCase();
                            if ("ontouchstart" in document && /applewebkit/.test(agent) && /android/.test(agent))
                            $('#tasks').on('touchstart', function(e) {
                    var li = $(e.target).closest('#tasks li');
                            if (li.length == 0)
                            return;
                            var label = li.find('label.inline').get(0);
                            if (label == e.target || $.contains(label, e.target))
                            e.stopImmediatePropagation();
                    });
                            $('#tasks').sortable({
                    opacity : 0.8,
                            revert : true,
                            forceHelperSize : true,
                            placeholder : 'draggable-placeholder',
                            forcePlaceholderSize : true,
                            tolerance : 'pointer',
                            stop : function(event, ui) {
                            //just for Chrome!!!! so that dropdowns on items don't appear below other items after being moved
                            $(ui.item).css('z-index', 'auto');
                            }
                    });
                            $('#tasks').disableSelection();
                            $('#tasks input:checkbox').removeAttr('checked').on('click', function() {
                    if (this.checked)
                            $(this).closest('li').addClass('selected');
                            else
                            $(this).closest('li').removeClass('selected');
                    });
                            //show the dropdowns on top or bottom depending on window height and menu position
                            $('#task-tab .dropdown-hover').on('mouseenter', function(e) {
                    var offset = $(this).offset();
                            var $w = $(window)
                            if (offset.top > $w.scrollTop() + $w.innerHeight() - 100)
                            $(this).addClass('dropup');
                            else
                            $(this).removeClass('dropup');
                    });
                    })
        </script>
