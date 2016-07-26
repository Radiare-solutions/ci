<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
        <meta charset="utf-8" />
        <title></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <!-- BEGIN PLUGIN CSS -->
        <link href="{{ URL::asset("css/plugins/pace/pace-theme-flash.css") }} " rel="stylesheet" type="text/css" media="screen"/>
<!--        <link href="{{ URL::asset("css/plugins/fullcalendar/fullcalendar.min.css") }} " rel="stylesheet" type="text/css" media="screen"/>
        <link href="{{ URL::asset("css/plugins/fullcalendar/fullcalendar.print.css") }} " rel="stylesheet" type="text/css" media="screen"/>-->
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/1.6.4/fullcalendar.min.css" type="text/css">
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/1.6.4/fullcalendar.print.css" type="text/css">
        <!-- END PLUGIN CSS -->
        <!-- BEGIN CORE CSS FRAMEWORK -->
        <link href="{{ URL::asset("css/plugins/bootstrapv3/css/bootstrap.min.css") }} " rel="stylesheet" type="text/css"/>
        <link href="{{ URL::asset("css/plugins/bootstrapv3/css/bootstrap-theme.min.css") }} " rel="stylesheet" type="text/css"/>
        <link href="{{ URL::asset("css/font-awesome.css") }} " rel="stylesheet" type="text/css"/>
        <link href="{{ URL::asset("css/animate.min.css") }} " rel="stylesheet" type="text/css"/>
        <link href="{{ URL::asset("css/plugins/jquery-scrollbar/jquery.scrollbar.css") }} " rel="stylesheet" type="text/css"/>
        <!-- END CORE CSS FRAMEWORK -->
        <!-- BEGIN CSS TEMPLATE -->
        <link href="{{ URL::asset("css/style.css") }} " rel="stylesheet" type="text/css"/>
        <link href="{{ URL::asset("css/responsive.css") }} " rel="stylesheet" type="text/css"/>
        <link href="{{ URL::asset("css/custom-icon-set.css") }} " rel="stylesheet" type="text/css"/>
        <link href="{{ URL::asset("css/custom.css") }} " rel="stylesheet" type="text/css"/>
        <!-- END CSS TEMPLATE -->
        <style>
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
                    @yield('CalendarByMonth')
                </div>

            </div>

        </div>

        <div class="modal fade" id="myModal" style="height:100%;overflow-y: auto;top:30px;" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content" id="detailed_conference">                       

                </div>
            </div>
            <!-- /.modal-content -->
        </div>


        <!-- END CONTAINER -->
        <!-- BEGIN CORE JS FRAMEWORK--> 
        <script src="{{ URL::asset("js/plugins/jquery-1.11.2.min.js") }} " type="text/javascript"></script> 
        <script src="{{ URL::asset("js/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js") }} " type="text/javascript"></script> 
        <script src="{{ URL::asset("js/plugins/bootstrapv3/bootstrap.min.js") }} " type="text/javascript"></script> 
        <script src="{{ URL::asset("js/plugins/breakpoints.js") }} " type="text/javascript"></script> 
        <script src="{{ URL::asset("js/plugins/jquery-unveil/jquery.unveil.min.js") }} " type="text/javascript"></script> 
        <!-- END CORE JS FRAMEWORK --> 
        <!-- BEGIN PAGE LEVEL JS --> 	
        <script src="{{ URL::asset("js/plugins/jquery-scrollbar/jquery.scrollbar.min.js") }} " type="text/javascript"></script>
        <script src="{{ URL::asset("js/plugins/pace/pace.min.js") }} " type="text/javascript"></script>  
        <script src="{{ URL::asset("js/plugins/jquery-numberAnimate/jquery.animateNumbers.js") }} " type="text/javascript"></script>
        <script src="{{ URL::asset("js/plugins/fullcalendar/moment.min.js") }} "></script>
<!--        <script src="{{ URL::asset("js/plugins/fullcalendar/fullcalendar.js") }} "></script>-->
        <script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/1.6.4/fullcalendar.min.js"></script>
        <!-- END PAGE LEVEL PLUGINS --> 	

        <!-- BEGIN CORE TEMPLATE JS --> 
        <script src="{{ URL::asset("js/core.js") }} " type="text/javascript"></script> 
        <script src="{{ URL::asset("js/chat.js") }} " type="text/javascript"></script> 
        <script src="{{ URL::asset("js/demo.js") }} " type="text/javascript"></script> 
        <!-- END CORE TEMPLATE JS --> 

        <script>


$(document).ready(function () {
    var year = "<?php echo $year; ?>";
    var month = "<?php echo $month; ?>";

    getConferenceEvent(year, month);

});

function getConferenceEvent(year, month) {
    var month_arr = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
    $.ajax({
        url: '/ci_conf_month_event',
        type: "get",
        data: {'month': month, 'year': year, 'timezone':'utc'},
        success: function (data) {
            $('#calendar').fullCalendar('destroy');
            $('#calendar').fullCalendar({
//                header: {
//				left: 'prev,next today',
//				center: 'title',
//			},
                height: 200,
                editable: false,
                eventClick: function (event, jsEvent, view) {
                    getDetailConf(event.nav_key, month_arr[month], year);
                },
                droppable: false,
                events: data
            });
            
            $('.fc-button-next').click(function () {
                var date1 = $('#calendar').fullCalendar('next').fullCalendar('getDate');
                var year = date1.getFullYear();
                var m_no = date1.getMonth();
                getConferenceEvent(year, m_no);
            });

            $('.fc-button-prev').click(function () {

                var date1 = $('#calendar').fullCalendar('prev').fullCalendar('getDate');
                var year = date1.getFullYear();
                var m_no = date1.getMonth();
                getConferenceEvent(year, m_no);
            });
            $('#calendar').fullCalendar('gotoDate', year, month);
        }
    });

}

function getDetailConf(nav_key, month, year) {
    $.ajax({
        url: '/calendar_popup',
        type: "get",
        data: {'month': month, 'year': year, 'nav_key': nav_key},
        success: function (data) {
            $('#myModal').removeData("modal").modal({backdrop: 'static'}, {keyboard: false});
            $("#myModal").modal('show');
            $('#detailed_conference').html(data);

        }
    });
}
        </script>


    </body>
</html>