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
        <link type="text/css" rel="stylesheet" href="{{ URL::asset("css/theme-1/libs/bootstrap-multiselect/bootstrap-multiselect.css?1419109895") }}"/>
	
	<link type="text/css" rel="stylesheet" href="{{ URL::asset("css/theme-1/libs/select2/select2.css?1424887856") }}" />

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
                                <h2 class="small-padding no-margin" style="border-left:2px #C4C4C4 solid;text-transform: capitalize; color:#FF7900;">Patents</h2>
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
        <script src="{{ URL::asset("js/libs/select2/select2.min.js") }}"></script>
        <script src="{{ URL::asset("js/libs/bootstrap-multiselect/bootstrap-multiselect.js") }}"></script>
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
        
        <script src="{{ URL::asset("js/core/demo/Demo.js") }}"></script>
<script src="{{ URL::asset("js/core/demo/DemoPageSearch.js") }}"></script>
<script src="{{ URL::asset("js/core/demo/DemoFormComponents.js") }}"></script>

   
<script>
$('.dial').each(function () {
	var options = materialadmin.App.getKnobStyle($(this));
	$(this).knob(options);

});

</script>



<script>
Morris.Bar({
  element: 'bar-example',
  data: [
    { y: 'Jan', a: 100},
    { y: 'Feb', a: 75},
    { y: 'Mar', a: 50},
    { y: 'Apr', a: 75},
    { y: 'May', a: 50},
    { y: 'Jun', a: 75},
    { y: 'Jul', a: 100},    
    { y: 'Aug', a: 75},
    { y: 'Sep', a: 50},
    { y: 'Oct', a: 75},
    { y: 'Nov', a: 50},
    { y: 'Dec', a: 75}
  ],
  xkey: 'y',
  ykeys: ['a'],
  labels: ['Total Patents'],
  barColors: ["#1AB244", "#B29215"],
  gridTextColor: ["#000"],
   xLabelMargin: 5,
});
</script>


<script>
var months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];

Morris.Area({
  element: 'area-example',
  data:
   [
   { m: '2021-01', a: 100 },
   { m: '2021-02', a: 54},
   { m: '2021-03', a: 243},
   { m: '2021-04', a: 154},
   { m: '2021-05', a: 43}, 
   { m: '2021-06', a: 524},
   { m: '2021-07', a: 213},  
   { m: '2021-08', a: 222},
   { m: '2021-09', a: 443}, 
   { m: '2021-10', a: 90},
   { m: '2021-11', a: 231}, 
   { m: '2021-12', a: 300}, 
   ],
  xkey: 'm',
  ykeys: ['a'],
  labels: ['Total Patents'],
  lineColors: ["#1531B2"],
  gridTextColor: ["#000"],
   xLabelMargin: 5,
  xLabelFormat: function(x) { // <--- x.getMonth() returns valid index
    var month = months[x.getMonth()];
    return month;
  },
  dateFormat: function(x) {
    var month = months[new Date(x).getMonth()];
    return month;
  },
});



</script>




<script>
var year = 1996;
var till = "<?php echo date('Y');?>";
var options = "";
for(var y=year; y<=till; y++){
  options += "<option>"+ y +"</option>";
}
document.getElementById("year").innerHTML = options;
</script>



<script>
function yearChange(){
var patents_year=$('#patents_year_select').val();
alert(patents_year);
}
</script>
   </body>
</html>
