<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>

        <!-- BEGIN META -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="keywords" content="your,keywords">
        <meta name="description" content="Short explanation about this website">
        <!-- END META -->

        <!-- BEGIN STYLESHEETS -->
        <link href='http://fonts.googleapis.com/css?family=Roboto:300italic,400italic,300,400,500,700,900' rel='stylesheet' type='text/css'/>
        <link type="text/css" rel="stylesheet" href="{{ URL::asset("css/theme-1/bootstrap.css?1422792965") }}" />
        <link type="text/css" rel="stylesheet" href="{{ URL::asset("css/theme-1/materialadmin.css?1425466319") }}" />
        <link type="text/css" rel="stylesheet" href="{{ URL::asset("css/theme-1/font-awesome.min.css?1422529194") }}" />
        <link type="text/css" rel="stylesheet" href="{{ URL::asset("css/theme-1/material-design-iconic-font.min.css?1421434286") }}" />
        <link href="{{ URL::asset("js/vend/c3.css") }}" rel="stylesheet" type="text/css">
        <link type="text/css" rel="stylesheet" href="{{ URL::asset("css/theme-1/libs/morris/morris.core.css?1420463396") }}" />
        <link type="text/css" rel="stylesheet" href="{{ URL::asset("js/vend/nvd3/nv.d3.css") }}" />

        <!-- END STYLESHEETS -->

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script type="text/javascript" src="assets/js/libs/utils/html5shiv.js?1403934957"></script>
        <script type="text/javascript" src="assets/js/libs/utils/respond.min.js?1403934956"></script>
        <![endif]-->

        <link rel="stylesheet" href="{{ URL::asset("dist/jqcloud.min.css") }}">


        <style>

            .v-algin{
                position: relative;
                top: 40%;
                transform: translateY(-50%);
            }
            .b-r
            {
                border-right:1px solid #C0C0C0;
            }
            .b-t
            {
                border-top:1px solid #C0C0C0;
            }
            .b-l
            {
                border-left:1px solid #C0C0C0;
            }
            .b-b
            {
                border-bottom:1px solid #C0C0C0;
            }
            .box-shadow{
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            }
            .section-m {
                padding: 19px 19px 10px;
            }
            .row {
                margin-left: -9px;
                margin-right: -9px;
            }

            .row-padding{

                padding-left:5px;
                padding-right:5px;
            }


            section .style-primary-dark, .offcanvas-pane .style-primary-dark, .card .style-primary-dark, section.style-primary-dark, .offcanvas-pane.style-primary-dark, .card.style-primary-dark {
                background-color: #357CA5;
                border-color: #0070d6;
                color: #ffffff;
            }
            section .style-accent-light, .offcanvas-pane .style-accent-light, .card .style-accent-light, section.style-accent-light, .offcanvas-pane.style-accent-light, .card.style-accent-light {
                background-color: #d1d3d4;
                border-color: #9b7ad3;
                color: #000;
            }

            .small-padding-s {
                padding: 0 12px;
            }

            .card-head-height
            {
                line-height: 32px;
                min-height: 36px;
            }


            .col-md-12, .col-lg-12 {
                padding-left: 9px;
                padding-right: 9px;
            }
            #vis > svg{


                width:200px;
                height:200px;
            }
            #hottopics {
                width:100%;
                height:100%;
                border: 1px dotted silver;
            }


            text {
                font: 12px sans-serif;
            }
            svg {
                display: block;
            }
            #test1, svg {
                margin: 0px;
                padding: 0px;
                height: 100%;
                width: 100%;
            }

            .card-mb {
                margin-bottom: 5px;

            }
            /*text {
              pointer-events: none;
            }
            
            .grandparent text {
              font-weight: bold;
            }
            
            rect {
              fill: none;
              stroke: #fff;
            }
            
            rect.parent,
            .grandparent rect {
              stroke-width: 2px;
            }
            
            rect.parent {
                pointer-events: none;
            }
            
            .grandparent rect {
              fill: orange;
            }
            
            .grandparent:hover rect {
              fill: #ee9700;
            }
            
            .children rect.parent,
            .grandparent rect {
              cursor: pointer;
            }
            
            .children rect.parent {
              fill: #bbb;
              fill-opacity: .5;
            }
            
            .children:hover rect.child {
              fill: #bbb;
            }
            */


            .b-radius{

                border-radius: 7px !important;
            }
            .b-radius-tl{

                border-top-left-radius:7px;

            }

            .b-radius-tr{

                border-top-right-radius:7px;

            }

            .b-radius-bl{


                border-bottom-left-radius:7px; 
            }

            .b-radius-br{

                border-bottom-right-radius:7px;

            }



            .section-body:first-child {
                margin-top: 5px;
            }

            #header.header-inverse {
                background: #006699;
                color: rgba(255, 255, 255, 0.6);
            }

        </style>

        <link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">



    </head>
    <body class="menubar-hoverable header-fixed menubar-first " style="background:#9D9D9D;">

        <!-- BEGIN HEADER-->
        <header id="header" class="">
            <div class="headerbar">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="headerbar-left">
                    <ul class="header-nav header-nav-options">
                        <li class="header-nav-brand" >
                            <div class="brand-holder">
                                <a href="#">
                                    <img src="assets/logo/rad-logo.png"/>
                                </a>
                            </div>
                        </li>
                        <li class="header-nav-brand" >
                            <div class="brand-holder">
                                <h2 class="small-padding no-margin" style="border-left:2px #C4C4C4 solid;text-transform: capitalize; color:#FF7900;">Clinical Research</h2>
                            </div>
                        </li>
                        <li>
                            <a class="btn btn-icon-toggle menubar-toggle" data-toggle="menubar" href="javascript:void(0);">
                                <i class="fa fa-bars"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="headerbar-right">
                    <ul class="header-nav header-nav-options">
                        <li>
                            <!-- Search form -->
                            <form role="search" class="navbar-search">
                                <div class="form-group">
                                    <input type="text" placeholder="Enter your keyword" name="headerSearch" class="form-control">
                                </div>
                                <button class="btn btn-icon-toggle ink-reaction" type="submit"><i class="fa fa-search"></i></button>
                            </form>
                        </li>
                        <li class="dropdown hidden-xs">
                            <a data-toggle="dropdown" class="btn btn-icon-toggle btn-default" href="javascript:void(0);">
                                <i class="fa fa-bell"></i><sup class="badge style-danger">4</sup>
                            </a>
                            <ul class="dropdown-menu animation-expand">
                                <li class="dropdown-header">Today's messages</li>
                                <li>
                                    <a href="javascript:void(0);" class="alert alert-callout alert-warning">

                                        <strong>Alex Anistor</strong><br>
                                        <small>Testing functionality...</small>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);" class="alert alert-callout alert-info">

                                        <strong>Alicia Adell</strong><br>
                                        <small>Reviewing last changes...</small>
                                    </a>
                                </li>
                                <li class="dropdown-header">Options</li>
                                <li></li>
                                <li></li>
                            </ul><!--end .dropdown-menu -->
                        </li><!--end .dropdown -->
                        <li class="dropdown hidden-xs">
                            <a data-toggle="dropdown" class="btn btn-icon-toggle btn-default" href="javascript:void(0);">
                                <i class="fa fa-area-chart"></i>
                            </a>
                            <ul class="dropdown-menu animation-expand">
                                <li class="dropdown-header">Server load</li>
                                <li class="dropdown-progress">
                                    <a href="javascript:void(0);">
                                        <div class="dropdown-label">
                                            <span class="text-light">Server load <strong>Today</strong></span>
                                            <strong class="pull-right">93%</strong>
                                        </div>
                                        <div class="progress"><div style="width: 93%" class="progress-bar progress-bar-danger"></div></div>
                                    </a>
                                </li><!--end .dropdown-progress -->
                                <li class="dropdown-progress">
                                    <a href="javascript:void(0);">
                                        <div class="dropdown-label">
                                            <span class="text-light">Server load <strong>Yesterday</strong></span>
                                            <strong class="pull-right">30%</strong>
                                        </div>
                                        <div class="progress"><div style="width: 30%" class="progress-bar progress-bar-success"></div></div>
                                    </a>
                                </li><!--end .dropdown-progress -->
                                <li class="dropdown-progress">
                                    <a href="javascript:void(0);">
                                        <div class="dropdown-label">
                                            <span class="text-light">Server load <strong>Lastweek</strong></span>
                                            <strong class="pull-right">74%</strong>
                                        </div>
                                        <div class="progress"><div style="width: 74%" class="progress-bar progress-bar-warning"></div></div>
                                    </a>
                                </li><!--end .dropdown-progress -->
                            </ul><!--end .dropdown-menu -->
                        </li><!--end .dropdown -->
                    </ul>

                    <ul class="header-nav header-nav-profile">
                        <li class="dropdown">
                            <a href="javascript:void(0);" class="dropdown-toggle ink-reaction" data-toggle="dropdown">
                                <img src="assets/img/avatar1.jpg?1403934956" alt="" />
                                <span class="profile-info">
                                    Steve Jobs
                                    <small>Administrator</small>
                                </span>
                            </a>
                            <ul class="dropdown-menu animation-dock">
                                <li class="dropdown-header">Config</li>
                                <li><a href="#">My profile</a></li>
                                <li><a href="#">My blog <span class="badge style-danger pull-right">16</span></a></li>
                                <li><a href="#">My appointments</a></li>
                                <li class="divider"></li>
                                <li><a href="#"><i class="fa fa-fw fa-lock"></i> Lock</a></li>
                                <li><a href="#"><i class="fa fa-fw fa-power-off text-danger"></i> Logout</a></li>
                            </ul><!--end .dropdown-menu -->
                        </li><!--end .dropdown -->
                    </ul><!--end .header-nav-profile -->

                </div><!--end #header-navbar-collapse -->
            </div>
        </header>
        <!-- END HEADER-->

        <!-- BEGIN BASE-->
        <div id="base">


            <!-- BEGIN CONTENT-->
            <div id="content">
                @yield('content')
            </div><!--end #content-->
            <!-- END CONTENT -->

            <!-- BEGIN MENUBAR-->
            <div id="menubar" class="menubar-inverse ">
                <div class="menubar-fixed-panel" style="background:#fff;">
                    <div>
                        <a class="btn btn-icon-toggle btn-default menubar-toggle" data-toggle="menubar" href="javascript:void(0);">
                            <i class="fa fa-bars"></i>
                        </a>
                    </div>
                    <div class="expanded">
                        <a href="#">
                            <img src="assets/logo/rad-logo.png"/>
                        </a>
                    </div>
                </div>
                <div class="menubar-scroll-panel">

                    <!-- BEGIN MAIN MENU -->
                    <ul id="main-menu" class="gui-controls">


                        <li>
                            <a class="active" href="#" >
                                <div class="gui-icon"><i class="md md-home"></i></div>
                                <span class="title">Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" >
                                <div class="gui-icon"><i class="md md-home"></i></div>
                                <span class="title">Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" >
                                <div class="gui-icon"><i class="md md-home"></i></div>
                                <span class="title">Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" >
                                <div class="gui-icon"><i class="md md-home"></i></div>
                                <span class="title">Dashboard</span>
                            </a>
                        </li>













                    </ul><!--end .main-menu -->
                    <!-- END MAIN MENU -->

                    <div class="menubar-foot-panel">
                        <small class="no-linebreak hidden-folded">
                                <!-- <span class="opacity-75">Copyright &copy; 2014</span> <strong>CodeCovers</strong> -->
                        </small>
                    </div>
                </div><!--end .menubar-scroll-panel-->
            </div><!--end #menubar-->
            <!-- END MENUBAR -->



        </div><!--end #base-->
        <!-- END BASE -->

        <!-- BEGIN JAVASCRIPT -->
        <script src="{{ URL::asset("js/libs/jquery/jquery-1.11.2.min.js") }}"></script>
        <script src="{{ URL::asset("js/libs/jquery/jquery-migrate-1.2.1.min.js") }}"></script>
        <script src="{{ URL::asset("js/libs/bootstrap/bootstrap.min.js") }}"></script>
        <script src="{{ URL::asset("js/libs/spin.js/spin.min.js") }}"></script>
        <script src="{{ URL::asset("js/libs/autosize/jquery.autosize.min.js") }}"></script>
        <script src="{{ URL::asset("js/libs/nanoscroller/jquery.nanoscroller.min.js") }}"></script>




        <!-- BEGIN JAVASCRIPT -->
        <script src="{{ URL::asset("js/libs/moment/moment.min.js") }}"></script>
        <script src="{{ URL::asset("js/libs/raphael/raphael-min.js") }}"></script>
        <script src="{{ URL::asset("js/libs/morris.js/morris.min.js") }}"></script>
        <script src="{{ URL::asset("js/libs/d3/d3.min.js") }}"></script>
        // <!-- <script src="assets/js/libs/d3/d3.v3.js"></script> -->
        <script src="{{ URL::asset("js/core/source/App.js") }}"></script>
        <script src="{{ URL::asset("js/core/source/AppNavigation.js") }}"></script>
        <script src="{{ URL::asset("js/core/source/AppOffcanvas.js") }}"></script>
        <script src="{{ URL::asset("js/core/source/AppCard.js") }}"></script>
        <script src="{{ URL::asset("js/core/source/AppForm.js") }}"></script>
        <script src="{{ URL::asset("js/core/source/AppNavSearch.js") }}"></script>
        <script src="{{ URL::asset("js/core/source/AppVendor.js") }}"></script>
        <script src="{{ URL::asset("js/core/demo/Demo.js") }}"></script>
        <script src="http://d3js.org/d3.v3.min.js" charset="utf-8"></script>
        <script src="{{ URL::asset("js/vend/c3.js") }}"></script>
        <script src="{{ URL::asset("js/libs/morris.js/morris.min.js") }}"></script>
        <script src="{{ URL::asset("js/vend/jquery.tagcloud.js") }}"></script>






        <!--	
        <script>
        $("#tagcloud a").tagcloud({
                size: {start: 16, end: 24, unit: "px"},
                colors: ["#800026", "#bd0026", "#e31a1c", "#fc4e2a", "#fd8d3c", "#feb24c", "#fed976", "#ffeda0", "#ffffcc"],
                // color: {'#4f649b', '#daf252', '#56a55b', '#17becf', '#bf6565', '#e377c2', '#9fdf8a', '#d62728', '#ff9896', '#47315b', '#aa0f3b', '#c49c94', '#5d6b06', '#0d4b77', '#c69345', '#1a4dce', '#d3935b', '#d66119', '#466b40', '#123d36'}
        });
        </script>-->

        <script src="{{ URL::asset("dist/jqcloud.js") }}"></script>
        <!--<script src="dist/core_tests.js"></script>-->
        <script>
        /*var words = [
            {text: "FDA", weight: 1, link: 'results-text.html'},
            {text: "New Launch", weight: 2, link: 'results-text.html'},
            {text: "Clinical Trial", weight: 3, link: 'results-text.html'},
            {text: "Patent", weight: 4, link: 'results-text.html'},
            {text: "Corporate", weight: 4.5, link: 'results-text.html'},
            {text: "Adalimumab", weight: 5, link: 'results-text.html'},
            {text: "Brodalumab", weight: 7, link: 'results-text.html'},
            {text: "siplizumab", weight: 6, link: 'results-text.html'},
            {text: "Efalizumab", weight: 7.5, link: 'results-text.html'},
            {text: "Tildrakizumab", weight: 3.5, link: 'results-text.html'},
            {text: "Fezakinumab", weight: 5, link: 'results-text.html'},
            {text: "Guselkumab", weight: 5.8, link: 'results-text.html'},
            {text: "Ustekinumab", weight: 6.5, link: 'results-text.html'},
        ]; */
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



<!-- <script src="assets/d3.layout.cloud.js"></script> -->
<!-- <script type="text/javascript" src="assets/word-cloud.js"></script> -->

        <script src="{{ URL::asset("js/core/demo/DemoCharts.js") }}"></script>


        <script>
        var samplePhase = <?php echo ($phaseData); ?>;
        /*var samplePhase =[
         ["Phase 1", 100,"results-text.html"],
         ["Phase 2", 200,"results-text.html"],
         ["Phase 3", 140,"results-text.html"],
         ["Phase 4", 45,"results-text.html"],
         ["Phase 5", 78,"results-text.html"],
         ];*/
        var chart = c3.generate({
            bindto: '.c3-donut',
            data: {
                columns: samplePhase,
                type: 'pie',
                // console.log(d);
                // type : 'donut',
                // onmouseover: function (d, i) { console.log("onmouseover", d, i, this); },
                // onmouseout: function (d, i) { console.log("onmouseout", d, i, this); },
                onclick: function (d, i) {

                    for (var j = 0; j < samplePhase.length; j++) {
                        // console.log(samplePhase[j][0]);
                        // console.log(d);
                        if (samplePhase[j][0] == d.id) {
                            console.log(samplePhase[j][2]);
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


        <!--
        <script>
          var fill = d3.scale.category20();
        
          d3.layout.cloud().size([350, 250])
             .words([
                "FDA", "New Launch", "Clinical Trial", "Patent", "Corporate","Adalimumab","Brodalumab","siplizumab","Efalizumab","Tildrakizumab","Fezakinumab","Guselkumab","Ustekinumab"].map(function(d) {
              return {text: d, size: 10 + Math.random() * 20};
              }))
               .padding(1)
               .timeInterval(10)
              .rotate(function(d){return 0;} )
               //.rotate(function(d) { return ~~(Math.random() * 2) * 30 ; })
                .font("Impact")
              .fontSize(function(d) { return d.size; })
              .on("end", draw)
              .start();
              
              
        
          function draw(words) {
            d3.select("#word_cloud").append("svg")
                .attr("width", 350)
                .attr("height", 250)
                .append("g")
                .attr("transform", "translate(120,120)")
              .selectAll("text")
                .data(words)
              .enter().append("text")
              //  .style("-webkit-text-stroke-width", "1px")
              .style("-webkit-text-stroke-color", "black")
                .style("font-size", function(d) { return d.size + "px"; })
                .style("font-family", "Impact")
                .style("fill", function(d, i) { return fill(i); })
                .attr("text-anchor", "start")
                .attr("transform", function(d) {
                  return "translate(" + [d.x, d.y] + ")rotate(" + d.rotate + ")";
                })
                .text(function(d) { return d.text; });
          }
        </script>
        
        -->





        <script src="{{ URL::asset("js/d3plus.js") }}"></script>

        <script>
            var sample_data = <?php echo ($statusData); ?>;
        /*var sample_data = [
            {"value": 300, "name": "Completed", "url": "results-text.html"},
            {"value": 10, "name": "Terminated", "url": "results-text.html"},
            {"value": 100, "name": "Recruiting", "url": "results-text.html"},
            {"value": 200, "name": "Unknown", "url": "results-text.html"},
            {"value": 230, "name": "Active, not recruiting", "url": "results-text.html"},
            {"value": 80, "name": "Not yet recruiting", "url": "results-text.html"},
            {"value": 43, "name": "Enrolling by invitation", "url": "results-text.html"},
            {"value": 54, "name": "Withdrawn", "url": "results-text.html"},
            {"value": 20, "name": "Approved for marketing", "url": "results-text.html"},
            {"value": 70, "name": "Suspended", "url": "results-text.html"}
        ] */
        var visualization = d3plus.viz()
                .container("#viz")
                .data(sample_data)
                .type("tree_map")
                .id("name")
                // .id(["value","name"])    
                // .depth(2)  
                .size("value")
                .labels({"resize": false, "font": {"size": 13}})
                .font({"weight": "500"})
                // .color({ "range":['#4f649b', '#daf252', '#56a55b', '#17becf', '#bf6565', '#e377c2', '#9fdf8a', '#d62728', '#ff9896', '#47315b', '#aa0f3b', '#c49c94', '#5d6b06', '#0d4b77', '#c69345', '#1a4dce', '#d3935b', '#d66119', '#466b40', '#123d36'] })
                .color({
                    "heatmap": ['#47315b', '#aa0f3b', '#c49c94', '#5d6b06', '#0d4b77', '#c69345', '#1a4dce', '#d3935b', '#d66119', '#466b40', '#123d36', '#4f649b', '#daf252', '#56a55b', '#17becf', '#bf6565', '#e377c2', '#9fdf8a', '#d62728', '#ff9896'],
                    "value": "value"
                })
                .mouse({
                    "move": true, // key will also take custom function
                    "click": function (e) {
                        window.location.href = e.url;
                    }
                })
                // .labels({"align": "left", "valign": "top"})          
                .draw()

        /*var sample_data1 = [
            {"value": 330, "name": "Double-blind Placebo", "url": "results-text.html"},
            {"value": 200, "name": "Placebo", "url": "results-text.html"},
            {"value": 45, "name": "Adalimumab", "url": "results-text.html"},
            {"value": 50, "name": "Adalimumab and Infliximab", "url": "results-text.html"},
            {"value": 150, "name": "Humira (adalimumab)", "url": "results-text.html"},
            {"value": 201, "name": "etanercept", "url": "results-text.html"},
            {"value": 120, "name": "NSAIDs and sulfasalazine", "url": "results-text.html"},
            {"value": 210, "name": "Thalidomide", "url": "results-text.html"},
            {"value": 80, "name": "rituximab", "url": "results-text.html"},
            {"value": 55, "name": "TNF inhibitors", "url": "results-text.html"},
            {"value": 450, "name": "NSAIDs and sulfasalazine", "url": "results-text.html"}

        ]*/
     var sample_data1 = <?php echo ($drugData); ?>;
        var visualization = d3plus.viz()
                .container("#viz1")
                .data(sample_data1)
                .type("bubbles")
                .id("name")
                .size("value")
                .labels({"resize": false, "font": {"size": 10}})
                .color({
                    "heatmap": ['#4f649b', '#daf252', '#56a55b', '#17becf', '#bf6565', '#e377c2', '#9fdf8a', '#d62728', '#ff9896', '#47315b', '#aa0f3b', '#c49c94', '#5d6b06', '#0d4b77', '#c69345', '#1a4dce', '#d3935b', '#d66119', '#466b40', '#123d36'],
                    "value": "value"
                })
                .mouse({
                    "move": true, // key will also take custom function
                    "click": function (e) {
                        window.location.href = e.url;
                    }
                })
                // .labels({"align": "left", "valign": "top"})          
                .draw()



        var data_bar = [
            {"value": 1330, "name": "Abbott", "url": "results-text.html"},
            {"value": 200, "name": "Pfizer", "url": "results-text.html"},
            {"value": 45, "name": "AbbVie", "url": "results-text.html"},
            {"value": 50, "name": "Medical University of Vienna", "url": "results-text.html"},
            {"value": 150, "name": "Innovaderm Research Inc", "url": "results-text.html"},
            {"value": 201, "name": "Mylan Inc. Industry", "url": "results-text.html"},
            {"value": 120, "name": "Clalit Health Services Other", "url": "results-text.html"},
            {"value": 210, "name": "UCB Pharma SA Industry", "url": "results-text.html"},
            {"value": 80, "name": "Janssen Research & Development, LLC Industry", "url": "results-text.html"},
            {"value": 55, "name": "Peter Higgins Other", "url": "results-text.html"},
            {"value": 450, "name": "Rabin Medical Center", "url": "results-text.html"}
        ]
        var visualization = d3plus.viz()
                .container("#viz4")
                .data(data_bar)
                .type("bar")
                .id("name")
                .x("name")
                .y("value")
                .font({"weight": "500"})
                .color({
                    "heatmap": ['#4f649b', '#daf252', '#56a55b', '#17becf', '#bf6565', '#e377c2', '#9fdf8a', '#d62728', '#ff9896', '#47315b', '#aa0f3b', '#c49c94', '#5d6b06', '#0d4b77', '#c69345', '#1a4dce', '#d3935b', '#d66119', '#466b40', '#123d36'],
                    "value": "value"
                })
                .mouse({
                    "move": true, // key will also take custom function
                    "click": function (e) {
                        window.location.href = e.url;
                    }
                })
                .draw()


        var sampleDataSponser = <?php echo ($sponsorData); ?>;
        /*var sampleDataSponser = [
         {y: 'Abbott', a: 120, url: "results-text.html"},
         {y: 'Clalit Health Services Other', a: 115, url: "results-text.html"},
         {y: 'Rabin Medical Center', a: 105, url: "results-text.html"},
         {y: 'Pfizer', a: 96, url: "results-text.html"},
         {y: 'Medical University of Vienna', a: 82, url: "results-text.html"},
         {y: 'Mylan Inc. Industry', a: 80, url: "results-text.html"},
         {y: 'UCB Pharma SA Industry', a: 77, url: "results-text.html"},
         {y: 'Peter Higgins Other', a: 75, url: "results-text.html"},
         {y: 'AbbVie', a: 60, url: "results-text.html"},
         {y: 'Innovaderm Research Inc', a: 50, url: "results-text.html"},
         {y: 'Janssen Research & Development, LLC Industry', a: 40, url: "results-text.html"},
         ]; */



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
        //     console.log(arr[index]);
                if (sampleDataSponser[index].y == newValue)
                {
                    window.location = sampleDataSponser[index].url;
                }
            }
        // console.log(sampleDataYear[0].x);
        });
        
        
        var sampleDataYear = <?php echo $estimatedCompletionData;?>;
        /*var sampleDataYear = [
            {x: '2010', y: 10, url: "results-text.html"},
            {x: '2011', y: 30, url: "results-text.html"},
            {x: '2012', y: 20, url: "results-text.html"},
            {x: '2013', y: 25, url: "results-text.html"},
            {x: '2014', y: 55, url: "results-text.html"},
            {x: '2015', y: 14, url: "results-text.html"},
            {x: '2016', y: 34, url: "http://www.google.com"},
        ];*/



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


        </script>




    </body>
</html>
