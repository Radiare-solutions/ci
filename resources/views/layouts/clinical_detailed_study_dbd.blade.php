<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
        <meta charset="utf-8" />
        <title></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <!-- BEGIN PLUGIN CSS -->
        <link href="{{ URL::asset("css/theme-1/libs/pace/pace-theme-flash.css") }}" rel="stylesheet" type="text/css" media="screen"/>
        <!-- END PLUGIN CSS -->
        <!-- BEGIN CORE CSS FRAMEWORK -->
        <link href="{{ URL::asset("css/bootstrap.min.css") }}" rel="stylesheet" type="text/css"/>
        <link href="{{ URL::asset("css/bootstrap-theme.min.css") }}" rel="stylesheet" type="text/css"/>
        <link href="{{ URL::asset("css/font-awesome.css") }}" rel="stylesheet" type="text/css"/>
        <link href="{{ URL::asset("css/animate.min.css") }}" rel="stylesheet" type="text/css"/>
        <link href="{{ URL::asset("css/theme-1/libs/jquery-scrollbar/jquery.scrollbar.css") }}" rel="stylesheet" type="text/css"/>
        <!-- END CORE CSS FRAMEWORK -->
        <!-- BEGIN CSS TEMPLATE -->
        <link href="{{ URL::asset("css/style.css") }}" rel="stylesheet" type="text/css"/>
        <link href="{{ URL::asset("css/responsive.css") }}" rel="stylesheet" type="text/css"/>
        <link href="{{ URL::asset("css/custom-icon-set.css") }}" rel="stylesheet" type="text/css"/>
        <link href="{{ URL::asset("css/custom.css") }}" rel="stylesheet" type="text/css"/>
        <!-- END CSS TEMPLATE -->
        <style>
            .grid.simple .grid-title .tools a, .grid.solid .grid-title .tools a {
                background: none !important;
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
            <div class="page-content bg-white"> 




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
        <script src="{{ URL::asset("js/plugins/jquery-scrollbar/jquery.scrollbar.min.js") }}" type="text/javascript"></script>
        <script src="{{ URL::asset("js/plugins/pace/pace.min.js") }}" type="text/javascript"></script>  
        <script src="{{ URL::asset("js/plugins/jquery-numberAnimate/jquery.animateNumbers.js") }}" type="text/javascript"></script>
        <script src="{{ URL::asset("js/tabs_accordian.js") }}" type="text/javascript"></script>

        <!-- END PAGE LEVEL PLUGINS --> 	

        <!-- BEGIN CORE TEMPLATE JS --> 
        <script src="{{ URL::asset("js/core.js") }}" type="text/javascript"></script> 
        <script src="{{ URL::asset("js/chat.js") }}" type="text/javascript"></script> 
        <script src="{{ URL::asset("js/demo.js") }}" type="text/javascript"></script> 
        <!-- END CORE TEMPLATE JS --> 


    </body>
</html>