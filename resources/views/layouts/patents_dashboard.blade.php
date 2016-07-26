<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
        <meta charset="utf-8" />
        <title></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <!-- BEGIN PLUGIN CSS -->
        <link href="{{ URL::asset("css/plugins/pace/pace-theme-flash.css") }} " rel="stylesheet" type="text/css" media="screen"/>
        <link rel="stylesheet" href="{{ URL::asset("css/plugins/jquery-morris-chart/morris.css") }} " type="text/css" media="screen">
        <link href="{{ URL::asset("css/plugins/bootstrap-select2/select2.css") }} " rel="stylesheet" type="text/css" media="screen"/>
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
            .b-all
            {
                border-bottom: 1.5px solid #A4A4A4 !important;
                border-left: 1.5px solid #A4A4A4 !important;
                border-right: 1.5px solid #A4A4A4 !important;
            }
            .panel-tab > .panel-heading {
                background-color: #D8E0E3 !important;
            }

            .table-blue-bg{
                background:#0089D1 !important;
                color:#fff !important;
            }

            .table-bordered td:first-child {
                border-left: transparent !important; 
            }

            .table-bordered td:last-child {
                border-right: transparent !important; 
            }

            .table td{
                font-size:11px !important;
            }
            .table > thead > tr > th, .table > tbody > tr > th, .table > tfoot > tr > th, .table > thead > tr > td, .table > tbody > tr > td, .table > tfoot > tr > td {
                padding: 8px 12px !important;
            }

            .easy-pie-custom {
                height: 50px !important;
                width: 50px !important;
            }

            .easy-pie-percent {
                line-height: 50px !important;
            }

            .table-bordered td {
                border-bottom: medium none !important;
                border-top: medium none !important;
            }


            .table > tbody > tr > td, .table > tfoot > tr > td {
                border-top: medium none !important;
            }

    body {
        background:url( {{ URL::asset("images/bg.jpg") }}) !important;            
    }
    .iconset {
        background:url( {{ URL::asset("images/icon/top-tray.png") }}) no-repeat;            
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
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content" id="detailed_patents">
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
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
        <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="{{ URL::asset("js/plugins/jquery-morris-chart/js/morris.min.js") }}"></script>
        <script src="{{ URL::asset("js/plugins/bootstrap-select2/select2.min.js") }}" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS --> 	

        <!-- BEGIN CORE TEMPLATE JS --> 
        <script src="{{ URL::asset("js/core.js") }}" type="text/javascript"></script> 
        <script src="{{ URL::asset("js/chat.js") }}" type="text/javascript"></script> 
        <script src="{{ URL::asset("js/demo.js") }}" type="text/javascript"></script> 
        <!-- END CORE TEMPLATE JS --> 

        <script>
$(document).ready(function () {
    $("#year").select2();
    //Multiselect - Select2 plug-in
    $("#applicant").select2();

    getPatentRS(5, 1, "publication_date", -1, 0, 0);
    getBarChart();
    getAreaChart();

    $("#search").click(function () {
        getPatentRS(5, 1, "publication_date", -1, 0, 0);
        getBarChart();
        getAreaChart();
    });

});


function getBarChart() {

    var year_var = $('#year').val();
    var applicant_var = patent_form.elements["applicant[]"].selectedIndex;
    var applicant_v = $('#applicant').val();
    if (year_var != 0 && applicant_var == -1) {
        var year = year_var;
        var applicant = 0;
        var url = "/filed_by_month";
    } else if (year_var == 0 && applicant_var != -1) {
        var applicant = applicant_v;
        var year = 0;
        var url = "/filed_by_year";
    } else if (year_var != 0 && applicant_var != -1) {
        var year = year_var;
        var applicant = applicant_v;
        var url = "/filed_by_month";
    } else if (year_var == 0 && applicant_var == -1) {
        var year = 0;
        var applicant = 0;
        var url = "/filed_by_year";
    }

    $.ajax({
        url: url,
        type: 'post',
        headers: {'X-CSRF-Token': $('input[name="_token"]').val()},
        data: {"year": year, "applicant": applicant, "area": 0},
        success: function (response) {

            Morris.Bar({
                element: 'bar-example',
                data: response,
                xkey: 'y',
                ykeys: ['a'],
                labels: ['Total Patents'],
                barColors: ["#1AB244", "#B29215"],
                gridTextColor: ["#000"],
                xLabelMargin: 1,
            }).on('click', function (i, row) {
                if (url == "/filed_by_year") {
                    var year_chart = row.y;
                    month_chart = 0;
                } else {
                    var year_chart = year;
                    var month_chart = row.y
                }
                getChartRS(5, 1, "publication_date", -1, month_chart, year_chart);
            });
        }
    });
}
function getAreaChart() {

    var year_var = $('#year').val();
    var applicant_var = patent_form.elements["applicant[]"].selectedIndex;
    var applicant_v = $('#applicant').val();
    if (year_var != 0 && applicant_var == -1) {
        var year = year_var;
        var applicant = 0;
        var url = "/filed_by_month";
    } else if (year_var == 0 && applicant_var != -1) {
        var applicant = applicant_v;
        var year = 0;
        var url = "/filed_by_year";
    } else if (year_var != 0 && applicant_var != -1) {
        var year = year_var;
        var applicant = applicant_v;
        var url = "/filed_by_month";
    } else if (year_var == 0 && applicant_var == -1) {
        var year = 0;
        var applicant = 0;
        var url = "/filed_by_year";
    }

    if (url == "/filed_by_year") {
        $.ajax({
            url: url,
            type: 'post',
            headers: {'X-CSRF-Token': $('input[name="_token"]').val()},
            data: {"year": year, "applicant": applicant, "area": 1},
            success: function (response) {
                Morris.Area({
                    element: 'area-example',
                    data: response,
                    xkey: 'y',
                    ykeys: ['a'],
                    labels: ['Total Patents'],
                    lineColors: ["#0094D2"],
                    gridTextColor: ["#000"],
                    xLabelMargin: 1,
                }).on('click', function (i, row) {
                    var yr = row.y - 10;
                    getChartRS(5, 1, "publication_date", -1, 0, yr)
                });
            }
        });
    } else {
        var months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
        var month_arr = {"01": "Jan", "02": "Feb", "03": "Mar", "04": "Apr", "05": "May", "06": "Jun", "07": "Jul", "08": "Aug", "09": "Sep", "10": "Oct", "11": "Nov", "12": "Dec"};
        $.ajax({
            url: url,
            type: 'post',
            headers: {'X-CSRF-Token': $('input[name="_token"]').val()},
            data: {"year": year, "applicant": applicant, "area": 1},
            success: function (response) {

                Morris.Area({
                    element: 'area-example',
                    data: response,
                    xkey: 'y',
                    ykeys: ['a'],
                    labels: ['Total Patents'],
                    lineColors: ["#0094D2"],
                    gridTextColor: ["#000"],
                    xLabelMargin: 5,
                    xLabelFormat: function (x) { // <--- x.getMonth() returns valid index
                        var month = months[x.getMonth()];
                        return month;
                    },
                    dateFormat: function (x) {
                        var month = months[new Date(x).getMonth()];
                        return month;
                    }
                }).on('click', function (i, row) {
                    var yr = row.y;
                    var split = yr.split('-');
                    var month_number = split[1];
                    var month = month_arr[month_number];
                    getChartRS(5, 1, "publication_date", -1, month, split[0])
                });
            }
        });
    }
}
var APP_URL = {!! json_encode(url('/')) !!};
        </script>
        <script>
            function getPatentPopup(nav_key, yr, applicant) {
                $.ajax({
                    url: APP_URL+'/patent_popup',
                    type: "post",
                    data: {"nav_key": nav_key, "year": yr, "applicant": applicant},
                    headers: {'X-CSRF-Token': $('input[name="_token"]').val()},
                    success: function (data) {
                        $('#myModal').removeData("modal").modal({backdrop: 'static'}, {keyboard: false});
                        $("#myModal").modal('show');
                        $('#detailed_patents').html(data);
                    }
                });
            }

            function getPatentRS(numRecords, pageNum, sort, order, month, year) {

                var year_var = $('#year').val();
                var applicant_var = patent_form.elements["applicant[]"].selectedIndex;
                var applicant_v = $('#applicant').val();

                if (year_var != 0 && applicant_var == -1) {
                    var year = year_var;
                    var applicant = 0;
                } else if (year_var == 0 && applicant_var != -1) {
                    var applicant = applicant_v;
                    var year = 0;
                } else if (year_var != 0 && applicant_var != -1) {
                    var year = year_var;
                    var applicant = applicant_v;
                } else if (year_var == 0 && applicant_var == -1) {
                    var year = 0;
                    var applicant = 0;
                }

                $.ajax({
                    url: '/patent_list_rs',
                    type: "post",
                    headers: {'X-CSRF-Token': $('input[name="_token"]').val()},
                    data: {"year": year, "applicant": applicant, "show": numRecords, "pagenum": pageNum, "sort_title": sort, "sort_order": order, "month": month, "ajax": "getPatentRS"},
                    success: function (data) {
                        $('#patent_list_result').html(data);
                    }
                });
            }

            function getChartRS(numRecords, pageNum, sort, order, month, year) {

                var applicant_var = patent_form.elements["applicant[]"].selectedIndex;
                var applicant_v = $('#applicant').val();

                if (applicant_var == -1) {
                    var applicant = 0;
                } else {
                    var applicant = applicant_v;
                }

                $.ajax({
                    url: '/patent_list_rs',
                    type: "post",
                    headers: {'X-CSRF-Token': $('input[name="_token"]').val()},
                    data: {"year": year, "applicant": applicant, "show": numRecords, "pagenum": pageNum, "sort_title": sort, "sort_order": order, "month": month, "ajax": "getChartRS"},
                    success: function (data) {
                        $('#patent_list_result').html(data);
                    }
                });
            }
        </script>
    </body>
</html>