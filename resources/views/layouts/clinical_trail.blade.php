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
        <link type="text/css" rel="stylesheet" href="{{ URL::asset("css/theme-1/libs/morris/morris.core.css?1420463396") }}" />
        <!-- END STYLESHEETS -->

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script type="text/javascript" src="{{ URL::asset("assets/js/libs/utils/html5shiv.js?1403934957") }}"></script>
        <script type="text/javascript" src="{{ URL::asset("assets/js/libs/utils/respond.min.js?1403934956") }}"></script>
        <![endif]-->
        <style>
            .panel-group .card.expanded {
                margin: 0px 0;
            }

            hr {
                margin-bottom: 5px;
                margin-top: 5px;
            }

            .card-body {
                padding: 0px 24px;

            }

            .card-head {
                line-height: 32px;
                min-height:36px;
            }

            .timeline-inverted .timeline-entry .card {
                margin-bottom: 10px;

            }

            .card-actionbar {
                padding-bottom: 0px;
                margin-top:-30px;
            }

            .card-actionbar-row {
                padding: 0px 0px 0px 16px;

            }

            .timeline {
                padding: 10px 0 0;
            }
            .timeline-inverted .timeline-entry .card {
                margin-bottom: 5px;
            }
            .padding-s{
                padding-top:6px;
                padding-bottom:3px;
                padding-right:0;
                padding-left:0;

            }
            .ruler-sm{
                margin:4px 0;


            }
            .extrasmall-padding {
                padding: 6px;
            }
            .small-y-padding {
                padding: 0 12px;
            }
            .list .tile .tile-text {
                font-size: 16px;
                padding: 6px 0 0px;
                width: 100%;
            }

            .list .tile .tile-icon {
                min-width: 56px;
                padding: 8px 0;
                text-align: right;
                width: 56px;
            }
            .list .tile .tile-content > div {
                vertical-align: bottom;
            }

            .no-margin{


                margin:0 !important;
            }

            #header.header-inverse {
                background: #006699;
                color: rgba(255, 255, 255, 0.6);
            }

        </style>
    </head>
    <body class="menubar-hoverable header-fixed menubar-first ">

        <!-- BEGIN HEADER-->
        <header id="header" class="">
            <div class="headerbar">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="headerbar-left">
                    <ul class="header-nav header-nav-options">
                        <li class="header-nav-brand" >
                            <div class="brand-holder">
                                <a href="#">
                                    <img src="{{ URL::asset("images/logo/rad-logo.png") }}"/>
                                </a>
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
                                        <img alt="" src="http://www.codecovers.eu/assets/img/modules/materialadmin/avatar2.jpg?1422538624" class="pull-right img-circle dropdown-avatar">
                                        <strong>Alex Anistor</strong><br>
                                        <small>Testing functionality...</small>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);" class="alert alert-callout alert-info">
                                        <img alt="" src="http://www.codecovers.eu/assets/img/modules/materialadmin/avatar3.jpg?1422538624" class="pull-right img-circle dropdown-avatar">
                                        <strong>Alicia Adell</strong><br>
                                        <small>Reviewing last changes...</small>
                                    </a>
                                </li>
                                <li class="dropdown-header">Options</li>
                                <li><a href="http://www.codecovers.eu/materialadmin/pages/login">View all messages <span class="pull-right"><i class="fa fa-arrow-right"></i></span></a></li>
                                <li><a href="http://www.codecovers.eu/materialadmin/pages/login">Mark as read <span class="pull-right"><i class="fa fa-arrow-right"></i></span></a></li>
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
                                <img src="{{ URL::asset("images/img/avatar1.jpg") }}" alt="" />
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
                            <img src="{{ URL::asset("images/logo/rad-logo.png") }}"/>
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
        <script src="{{ URL::asset("js/core/source/App.js") }}"></script>
        <script src="{{ URL::asset("js/core/source/AppNavigation.js") }}"></script>
        <script src="{{ URL::asset("js/core/source/AppOffcanvas.js") }}"></script>
        <script src="{{ URL::asset("js/core/source/AppCard.js") }}"></script>
        <script src="{{ URL::asset("js/core/source/AppForm.js") }}"></script>
        <script src="{{ URL::asset("js/core/source/AppNavSearch.js") }}"></script>
        <script src="{{ URL::asset("js/libs/raphael/raphael-min.js") }}"></script>
        <script src="{{ URL::asset("js/libs/morris.js/morris.min.js") }}"></script>
        <script src="{{ URL::asset("js/core/source/AppVendor.js") }}"></script>
        <script src="{{ URL::asset("js/core/demo/Demo.js") }}"></script>
        <script src="http://d3js.org/d3.v3.min.js" charset="utf-8"></script>
        <script src="{{ URL::asset("js/vend/c3.js") }}"></script>

		<script src="{{ URL::asset("js/libs/moment/moment.min.js") }}"></script>
		<script src="{{ URL::asset("js/libs/bootstrap-datepicker/bootstrap-datepicker.js") }}"></script>
		<script src="{{ URL::asset("js/libs/bootstrap-multiselect/bootstrap-multiselect.js") }}"></script>
		<script src="{{ URL::asset("js/libs/microtemplating/microtemplating.min.js") }}"></script>
		<script src="{{ URL::asset("js/libs/jquery-knob/jquery.knob.min.js") }}"></script>
		<script src="{{ URL::asset("js/core/demo/DemoPageSearch.js") }}"></script>
        <!-- END JAVASCRIPT -->
        <script>
            if ($('#morris-bar-graph').length > 0) {
                Morris.Bar({
                    element: 'morris-bar-graph',
                    data: [
                        {x: '<?php echo $test;?> ', y:  4.09},
                        {x: 'DB Placebo ', y: 4 / 163 * 100},
                        {x: 'Any Adalimumab ', y: 21 / 326 * 100}

                    ],
                    xkey: 'x',
                    ykeys: ['y'],
                    hideHover: true,
                    labels: ['#participants affected / at risk  '],
                    barColors: function (row, series, type) {
                        if (type === 'bar') {
                            var red = Math.ceil(200 * row.y / this.ymax);
                            return 'rgb(' + red + ',0,255)';
                        } else {
                            return '#000';
                        }
                    }
                });
            }




        </script>

        <script>
            if ($('#morris-bar-graph1').length > 0) {
                Morris.Bar({
                    element: 'morris-bar-graph1',
                    data: [
                        {x: 'DB Adalimumab ', y: 104 / 171 * 100},
                        {x: 'DB Placebo ', y: 83 / 163 * 100},
                        {x: 'Any Adalimumab ', y: 277 / 326 * 100}

                    ],
                    xkey: 'x',
                    ykeys: ['y'],
                    hideHover: true,
                    labels: ['#participants affected / at risk  '],
                    barColors: function (row, series, type) {
                        if (type === 'bar') {
                            var blue = Math.ceil(100 * row.y / this.ymax);
                            return 'rgb(' + blue + ',20,12)';
                        } else {
                            return '#000';
                        }
                    }





                });
            }

</script>
<script>
$('.dial').each(function () {
			var options = materialadmin.App.getKnobStyle($(this));
			$(this).knob(options);

		});

</script>


        </script>



    </body>
</html>
