<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
        <meta charset="utf-8" />
        <title></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <link href='http://fonts.googleapis.com/css?family=Roboto:300italic,400italic,300,400,500,700,900' rel='stylesheet' type='text/css'/>
        <!-- END STYLESHEETS -->

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script type="text/javascript" src="assets/js/libs/utils/html5shiv.js?1403934957"></script>
        <script type="text/javascript" src="assets/js/libs/utils/respond.min.js?1403934956"></script>
        <![endif]-->

        <link rel="stylesheet" href="{{ URL::asset("dist/jqcloud.min.css") }}">
        <!-- BEGIN PLUGIN CSS -->
        <link href="{{ URL::asset("css/theme-1/libs/pace/pace-theme-flash.css") }}" rel="stylesheet" type="text/css" media="screen"/>
        <link type="text/css" rel="stylesheet" href="{{ URL::asset("css/theme-1/libs/morris/morris.core.css?1420463396") }}" />
        <!-- END PLUGIN CSS -->
        <!-- BEGIN CORE CSS FRAMEWORK -->
        <link type="text/css" rel="stylesheet" href="{{ URL::asset("css/theme-1/bootstrap.css?1422792965") }}" />
        <link href="{{ URL::asset("css/bootstrap-theme.min.css")}}" rel="stylesheet" type="text/css"/>
        <link href="{{ URL::asset("css/font-awesome.css")}}" rel="stylesheet" type="text/css"/>
        <link href="{{ URL::asset("css/animate.min.css")}}" rel="stylesheet" type="text/css"/>
        <link href="{{ URL::asset("css/theme-1/libs/jquery-scrollbar/jquery.scrollbar.css")}}" rel="stylesheet" type="text/css"/>
        <!-- END CORE CSS FRAMEWORK -->
        <!-- BEGIN CSS TEMPLATE -->
        <link href="{{ URL::asset("css/style.css")}}" rel="stylesheet" type="text/css"/>
        <link href="{{ URL::asset("css/responsive.css")}}" rel="stylesheet" type="text/css"/>
        <link href="{{ URL::asset("css/custom-icon-set.css")}}" rel="stylesheet" type="text/css"/>
        <link href="{{ URL::asset("css/custom.css")}}" rel="stylesheet" type="text/css"/>
        
        <link href="{{ URL::asset("css/theme-2/libs/c3/c3.css")}}" rel="stylesheet" type="text/css">
        <style>
            .height-60{
                height:55px

            }
            .bg-head-blue{
                background:#0094D2;

            }
            body {
                background:url( {{ URL::asset("images/bg.jpg") }}) !important;            
            }
        </style>


    </head>
    <!-- END HEAD -->

    <!-- BEGIN BODY -->
    <body class="horizontal-menu">

        <?php echo View::make('header')->render(); ?>

        <!-- BEGIN CONTAINER -->
        <div class="page-container row-fluid" style="padding-top:60px;">

            <!-- BEGIN PAGE CONTAINER-->
            <div class="page-content"> 




                <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
                <div id="portlet-config" class="modal hide">
                    <div class="modal-header">
                        <button data-dismiss="modal" class="close" type="button"></button>
                        <h3>Widget Settings</h3>
                    </div>
                    <div class="modal-body"> Widget settings form goes here </div>
                </div>
                <div class="clearfix"></div>
                <div class="content " style="padding-top:10px !important;">  
                    @yield('content')
                </div>
            </div>

        </div>
        <!-- END CONTAINER -->
        <!-- BEGIN CORE JS FRAMEWORK--> 
        <script src="{{ URL::asset("js/plugins/jquery-1.8.3.min.js") }}" type="text/javascript"></script> 
        <script src="{{ URL::asset("js/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js") }}" type="text/javascript"></script> 
        <script src="{{ URL::asset("js/plugins/bootstrapv3/bootstrap.min.js") }}" type="text/javascript"></script> 
        <script src="{{ URL::asset("js/plugins/breakpoints.js") }}" type="text/javascript"></script> 
        <script src="{{ URL::asset("js/plugins/jquery-unveil/jquery.unveil.min.js") }}" type="text/javascript"></script> 
        <!-- END CORE JS FRAMEWORK --> 
        <!-- BEGIN PAGE LEVEL JS --> 	
        <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="{{ URL::asset("js/plugins/jquery-scrollbar/jquery.scrollbar.min.js") }}" type="text/javascript"></script>
        <script src="{{ URL::asset("js/plugins/pace/pace.min.js") }}" type="text/javascript"></script>  
        <script src="{{ URL::asset("js/plugins/jquery-numberAnimate/jquery.animateNumbers.js") }}" type="text/javascript"></script>
        <script src="{{ URL::asset("js/plugins/morris.js/morris.min.js") }}"></script>
        <!-- END PAGE LEVEL PLUGINS --> 	

        <!-- BEGIN CORE TEMPLATE JS --> 
        <script src="{{ URL::asset("js/core.js") }}" type="text/javascript"></script> 
        <script src="{{ URL::asset("js/chat.js") }}" type="text/javascript"></script> 
        <script src="{{ URL::asset("js/demo.js") }}" type="text/javascript"></script> 
        <!-- END CORE TEMPLATE JS --> 

        <script src="http://d3js.org/d3.v3.min.js" charset="utf-8"></script>
        <script src="{{ URL::asset("js/plugins/c3/c3.js") }}"></script>
        <script src="{{ URL::asset("js/plugins/jqcloud/jqcloud.js") }}"></script>
         <!--<script src="dist/core_tests.js"></script>-->
        <script>

var words = <?php echo ($conditionData); ?>;

var colors = ['#4f649b', '#daf252', '#56a55b', '#17becf', '#bf6565', '#e377c2', '#9fdf8a', '#d62728', '#ff9896', '#47315b', '#aa0f3b', '#c49c94', '#5d6b06', '#0d4b77', '#c69345', '#1a4dce', '#d3935b', '#d66119', '#466b40', '#123d36'];

// $('#condition').jQCloud(words);


$('#condition').jQCloud(words
        // , {
        // classPattern: null,
        // colors: ['#4f649b', '#daf252', '#56a55b', '#17becf', '#bf6565', '#e377c2', '#9fdf8a', '#d62728', '#ff9896', '#47315b', '#aa0f3b', '#c49c94', '#5d6b06', '#0d4b77', '#c69345', '#1a4dce', '#d3935b', '#d66119', '#466b40', '#123d36'],
        // fontSize: {
        //   from: 0.1,
        //   to: 0.02
        // }
        // }
        );
setTimeout(function () {
    var obj = $("#condition").data("jqcloud");
    var data = obj.word_array;
    // console.log(data);
    for (var i in data) {
        $("#" + data[i]["attr"]["id"]).css("color", colors[i]);
    }
}, 100);



        </script>
        <script>
            var sampleDataYear = <?php echo ($estimatedCompletionData); ?>;

            // Morris Area demo
            if ($('#morris-area-graph').length > 0) {
                var labelColor = $('#morris-area-graph').css('color');
                Morris.Area({
                    element: 'morris-area-graph',
                    behaveLikeLine: true,
                    data: sampleDataYear,
                    xkey: 'x',
                    ykeys: ['y'],
                    labels: ['Studies'],
                    gridTextColor: labelColor,
                    lineColors: $('#morris-area-graph').data('colors').split(',')
                });
            }
            $("#morris-area-graph").click(function () {
                var newValue;
                var newValue = $(this).find("div.morris-hover-row-label").text();

                console.log(newValue);
                for (var index = 0; index < sampleDataYear.length; index++)
                {
                    //     console.log(arr[index]);
                    if (sampleDataYear[index].x == newValue)
                    {
                        window.location = sampleDataYear[index].url;
                    }
                }
                // console.log(sampleDataYear[0].x);
            });
            
            var sampleDataSponser =<?php echo ($sponsorData); ?>

            if ($('#morris-bar-graph').length > 0) {
                Morris.Bar({
                    element: 'morris-bar-graph',
                    data: sampleDataSponser,
                    xkey: 'y',
                    ykeys: ['a'],
                    labels: ['Studies'],
                    gridTextColor: '#000',
                    barColors: $('#morris-bar-graph').data('colors').split(',')
                });
            }
            $("#morris-bar-graph").click(function () {
                var newValue;
                var newValue = $(this).find("div.morris-hover-row-label").text();

                console.log(newValue);
                for (var index = 0; index < sampleDataSponser.length; index++)
                {
                    if (sampleDataSponser[index].y == newValue)
                    {
                        window.location = sampleDataSponser[index].url;
                    }
                }
            });


            var samplePhase =<?php echo ($phaseData); ?>;
            var chart = c3.generate({
                bindto: '.c3-donut',
                data: {
                    columns: samplePhase,
                    type: 'pie',
                    onclick: function (d, i) {

                        for (var j = 0; j < samplePhase.length; j++) {
                            // console.log(samplePhase[j][0]);
                            // console.log(d);
                            if (samplePhase[j][0] == d.id) {
                              //console.log(samplePhase[j][2]);
                                window.location = samplePhase[j][2];
                            }
                        }
                    },
                    order: null // set null to disable sort of data. desc is the default.
                },
                color: {
                    pattern: ['#4f649b', '#56a55b', '#17becf', '#bf6565', '#e377c2', '#9fdf8a', '#daf252', '#d62728', '#ff9896', '#47315b', '#aa0f3b', '#c49c94', '#5d6b06', '#0d4b77', '#c69345', '#1a4dce', '#d3935b', '#d66119', '#466b40', '#123d36']
                },
                legend: {
                    show: true,
                    position: 'right'
                },
                pie: {
                    label: {
                        format: function (value) {
                            return value;
                        }
                    },
                    title: "Phase",
                    width: 40
                }

            });





        </script>



        <script src="{{ URL::asset("js/d3plus.js") }}"></script>

        <script>
            var sample_status =<?php echo ($statusData); ?>;
            var visualization = d3plus.viz()
                    .container("#viz")
                    .data(sample_status)
                    .type("tree_map")
                    .id("name")
                    .size("value")
                    .labels({"resize": false, "font": {"size": 13}})
                    .font({"weight": "500"})
                    .mouse({
                        "move": true, // key will also take custom function
                        "click": function (e) {
                            window.location.href = e.url;
                        }
                    })
                    .draw();

            var sample_drug = <?php echo ($drugData); ?>;

            var visualization = d3plus.viz()
                    .container("#viz1")
                    .data(sample_drug)
                    .type("bubbles")
                    .id("name")
                    .size("value")
                    .labels({"resize": false, "font": {"size": 10}})
                    .mouse({
                        "move": true, // key will also take custom function
                        "click": function (e) {
                            window.location.href = e.url;
                        }
                    })
                    .draw()
        </script>

    </body>
</html>