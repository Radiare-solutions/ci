<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
        <meta charset="utf-8" />
        <title></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <!-- BEGIN PLUGIN CSS -->
        <link href="{{ URL::asset("css/plugins/pace/pace-theme-flash.css") }}" rel="stylesheet" type="text/css" media="screen"/>
        <link type="text/css" rel="stylesheet" href="{{ URL::asset("css/plugins/owl/owl.carousel.css") }}" />
        <link type="text/css" rel="stylesheet" href="{{ URL::asset("css/plugins/owl/owl.carousel.theme.css") }}" />
        <!-- END PLUGIN CSS -->
        <!-- BEGIN CORE CSS FRAMEWORK -->
        <link href="{{ URL::asset("css/plugins/bootstrapv3/css/bootstrap.min.css") }}" rel="stylesheet" type="text/css"/>
        <link href="{{ URL::asset("css/plugins/bootstrapv3/css/bootstrap-theme.min.css") }}" rel="stylesheet" type="text/css"/>
        <link href="{{ URL::asset("css/font-awesome.css") }}" rel="stylesheet" type="text/css"/>
        <link href="{{ URL::asset("css/animate.min.css") }}" rel="stylesheet" type="text/css"/>
        <link href="{{ URL::asset("css/plugins/jquery-scrollbar/jquery.scrollbar.css") }}" rel="stylesheet" type="text/css"/>
        <!-- END CORE CSS FRAMEWORK -->
        <!-- BEGIN CSS TEMPLATE -->
        <link href="{{ URL::asset("css/style.css") }}" rel="stylesheet" type="text/css"/>
        <link href="{{ URL::asset("css/responsive.css") }}" rel="stylesheet" type="text/css"/>
        <link href="{{ URL::asset("css/custom-icon-set.css") }}" rel="stylesheet" type="text/css"/>
        <link href="{{ URL::asset("css/custom.css") }}" rel="stylesheet" type="text/css"/>
        <!-- END CSS TEMPLATE -->
        <style>
            body {
                background:url( {{ URL::asset("images/bg.jpg") }}) !important;            
            }
            .owl-controls{
                margin-top:5px;

            }
            .owl-stage-outer{

                margin-top:5px;
            }
            .cal-bg{
 background:url( {{ URL::asset("images/cal-bg/cal-bg.png") }}) !important;
}
.pin1{

background-image: url( {{ URL::asset("images/stick-note/1.png") }}) !important;
}

.pin2{

background-image: url( {{ URL::asset("images/stick-note/2.png") }}) !important;
}
.pin3{

background-image: url( {{ URL::asset("images/stick-note/3.png") }}) !important;

}
.pin4{

background-image: url( {{ URL::asset("images/stick-note/4.png") }}) !important;

}
.pin5{

background-image: url( {{ URL::asset("images/stick-note/5.png") }}) !important;

}
.pin6{

background-image: url( {{ URL::asset("images/stick-note/6.png") }}) !important;

}
.pin7{

background-image: url( {{ URL::asset("images/stick-note/7.png") }}) !important;

}
.pin8{

background-image: url( {{ URL::asset("images/stick-note/8.png") }}) !important;

}
.pin9{

background-image: url( {{ URL::asset("images/stick-note/9.png") }}) !important;

}
.pin10{

background-image: url( {{ URL::asset("images/stick-note/10.png") }}) !important;
}
.pin11{

background-image: url( {{ URL::asset("images/stick-note/11.png") }}) !important;

}
.pin12{

background-image: url( {{ URL::asset("images/stick-note/12.png") }}) !important;

}
.pin13{

background-image: url( {{ URL::asset("images/stick-note/13.png") }}) !important;

}
.pin14{

background-image: url( {{ URL::asset("images/stick-note/14.png") }}) !important;

}
.pin15{

background-image: url( {{ URL::asset("images/stick-note/15.png") }}) !important;

}
.pin16{

background-image: url( {{ URL::asset("images/stick-note/16.png") }}) !important;

}
.pin17{

background-image: url( {{ URL::asset("images/stick-note/17.png") }}) !important;

}
.pin18{

background-image: url( {{ URL::asset("images/stick-note/18.png") }}) !important;

}
.pin19{

background-image: url( {{ URL::asset("images/stick-note/19.png") }}) !important;

}
.pin20{

background-image: url( {{ URL::asset("images/stick-note/20.png") }}) !important;

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
                    @yield('Calendar')
                </div>

            </div>

        </div>
        <!-- END CONTAINER -->
        <div class="modal fade" id="myModal" style="height:100%;overflow-y: auto;top:30px;" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content" id="detailed_conference">

                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- BEGIN CORE JS FRAMEWORK--> 
        <script src="{{ URL::asset("js/plugins/jquery-1.11.2.min.js") }}" type="text/javascript"></script> 
        <script src="{{ URL::asset("js/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js") }}" type="text/javascript"></script> 
        <script src="{{ URL::asset("js/plugins/bootstrapv3/bootstrap.min.js") }}" type="text/javascript"></script> 
        <script src="{{ URL::asset("js/plugins/breakpoints.js") }}" type="text/javascript"></script> 
        <script src="{{ URL::asset("js/plugins/jquery-unveil/jquery.unveil.min.js") }}" type="text/javascript"></script> 
        <!-- END CORE JS FRAMEWORK --> 
        <!-- BEGIN PAGE LEVEL JS --> 	
        <script src="{{ URL::asset("js/plugins/jquery-scrollbar/jquery.scrollbar.min.js") }}" type="text/javascript"></script>
        <script src="{{ URL::asset("js/plugins/pace/pace.min.js") }}" type="text/javascript"></script>  
        <script src="{{ URL::asset("js/plugins/jquery-numberAnimate/jquery.animateNumbers.js") }}" type="text/javascript"></script>
        <script src="{{ URL::asset("js/plugins/owl/owl.carousel.min.js") }}"></script>
        <!-- END PAGE LEVEL PLUGINS --> 	

        <!-- BEGIN CORE TEMPLATE JS --> 
        <script src="{{ URL::asset("js/core.js") }}" type="text/javascript"></script> 
        <script src="{{ URL::asset("js/chat.js") }}" type="text/javascript"></script> 
        <script src="{{ URL::asset("js/demo.js") }}" type="text/javascript"></script> 
        <!-- END CORE TEMPLATE JS --> 

        <script>

$(document).ready(function () {
    $(".owl-carousel").owlCarousel(
            {
                nav: true,
                navText: [
                    "<i class='icon-chevron-left btn icon-white btn-mini '><</i>",
                    "<i class='icon-chevron-right btn icon-white btn-mini '>></i>"
                ],
            }
    );

    $(".owl-carousel1").owlCarousel(
            {
                nav: true,
                navText: [
                    "<i class='icon-chevron-left icon-white btn-mini '><</i>",
                    "<i class='icon-chevron-right icon-white btn-mini '>></i>"
                ],
            }
    );

    $(".owl-carousel2").owlCarousel(
            {
                nav: true,
                navText: [
                    "<i class='icon-chevron-left icon-white'><</i>",
                    "<i class='icon-chevron-right icon-white'>></i>"
                ],
            }
    );


    $(".owl-carousel3").owlCarousel(
            {
                nav: true,
                navText: [
                    "<i class='icon-chevron-left icon-white'><</i>",
                    "<i class='icon-chevron-right icon-white'>></i>"
                ],
            }
    );


    $(".owl-carousel4").owlCarousel(
            {
                nav: true,
                navText: [
                    "<i class='icon-chevron-left icon-white'><</i>",
                    "<i class='icon-chevron-right icon-white'>></i>"
                ],
            }
    );


    $(".owl-carousel5").owlCarousel(
            {
                nav: true,
                navText: [
                    "<i class='icon-chevron-left icon-white'><</i>",
                    "<i class='icon-chevron-right icon-white'>></i>"
                ],
            }
    );

    if (window.location.href === "<?php $urlname = Route::getCurrentRoute()->getPath();
        echo url("$urlname"); ?>") {
        window.history.pushState("object or string", "Title", "<?php $urlname = Route::getCurrentRoute()->getPath();
        echo url("$urlname"); ?>" + "?year=" + new Date().getFullYear());
        window.location.reload();
    }
    $('#year_conference').text(getParameter('year'));

});

function getParameter(theParameter) {
    var params = window.location.search.substr(1).split('&');
    for (var i = 0; i < params.length; i++) {
        var p = params[i].split('=');
        if (p[0] == theParameter) {
            return decodeURIComponent(p[1]);
        }
    }
    return false;
}

function getDetailConf(nav_key, month, year) {
    $.ajax({
        url: '/calendar_popup',
        type: "get",
        data: {'month': month, 'year': year, 'nav_key': nav_key},
        success: function (data) {
            $('#myModal').removeData("modal").modal({backdrop: 'static'},{keyboard: false});   
            $("#myModal").modal('show');
            $('#detailed_conference').html(data);
            
        }
    });
}

function nextYear() {
    var year = $('#year_conference').text();
    var limit_year = parseInt(new Date().getFullYear()) + 5;
    if (limit_year > year) {
        var text = parseInt(year) + 1;
        $('#calender-next').attr("href", "<?php echo Route::getCurrentRoute()->getPath(); ?>" + '?year=' + text);
    } else {
        $('#calender-next').removeAttr("onclick");
        $('#calender-next').attr("onclick", "return false;");
    }
}

function prevYear() {
    var year = $('#year_conference').text();
    var limit_year = new Date().getFullYear();
    if (limit_year < year) {
        var text = parseInt(year) - 1;
        $('#calender-prev').attr("href", "<?php echo Route::getCurrentRoute()->getPath(); ?>" + '?year=' + text);
    } else {
        $('#calender-prev').removeAttr("onclick");
        $('#calender-prev').attr("onclick", "return false;");
    }
}

        </script>

    </body>
</html>