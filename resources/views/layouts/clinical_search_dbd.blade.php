<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
        <meta charset="utf-8" />
        <title></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <!-- BEGIN PLUGIN CSS -->
        <link href="{{ URL::asset("css/theme-1/libs/pace/pace-theme-flash.css") }}" rel="stylesheet" type="text/css" media="screen"/>
        <link type="text/css" rel="stylesheet" href="{{ URL::asset("css/theme-1/libs/morris/morris.core.css?1420463396") }}" />
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
                        body {
                background:url( {{ URL::asset("images/bg.jpg") }}) !important;            
            }
            .easy-pie-success{
                color:#4AAE4D
            }

            .easy-pie-danger{
                color:red
            }

            .easy-pie-warning{
                color:orange
            }
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

            .hr-aaa{
                margin: 5px 0 !important;
                border: 0;
                border-top: 1px solid #aaaaaa;
                border-bottom: 1px solid #aaaaaa;

            }
            .hr-aaa-b{
                margin: 5px 0 !important;
                border: none !important;

            }

            .b-c-aaa{

                border-right:2px solid #aaaaaa !important;

            }

            .table td.no-padding-margin
            {
                margin:0 !important;
                padding:0 !important;
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
        <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="{{ URL::asset("js/plugins/pace/pace.min.js") }}" type="text/javascript"></script>  
        <script src="{{ URL::asset("js/plugins/jquery-numberAnimate/jquery.animateNumbers.js") }}" type="text/javascript"></script>
        <script src="{{ URL::asset("js/tabs_accordian.js")}}" type="text/javascript"></script>
        <script src="{{ URL::asset("js/plugins/jquery-morris-chart/js/morris.min.js") }}"></script>
        <script src="{{ URL::asset("js/plugins/jquery-easy-pie-chart/js/jquery.easypiechart.min.js") }}"></script>
        <!-- END PAGE LEVEL PLUGINS --> 	

        <!-- BEGIN CORE TEMPLATE JS --> 
        <script src="{{ URL::asset("js/core.js") }}" type="text/javascript"></script> 
        <script src="{{ URL::asset("js/chat.js") }}" type="text/javascript"></script> 
        <script src="{{ URL::asset("js/demo.js") }}" type="text/javascript"></script> 
        <!-- END CORE TEMPLATE JS --> 
        <script>
$(document).ready(function () {
    getClinicalRS(5, 1);
});

function getClinicalRS(numRecords, pageNum, field, order) {

    var returnValue = filters();
    var statusArr = returnValue.status;
    var phaseArr = returnValue.phase;
    var conditionArr = returnValue.condition;
    var drugArr = returnValue.drug;
    var sponsorArr = returnValue.sponsor;
    var yearArr = returnValue.year;

    $.ajax({
        url: '/get_clinical_rs',
        type: "get",
        data: {"show": numRecords, "pagenum": pageNum, "status_arr": statusArr, "phase_arr": phaseArr, "condition_arr": conditionArr,
            "drug_arr": drugArr, "sponsor_arr": sponsorArr, "year_arr": yearArr, 'back': '<?php echo urlencode(URL::full()); ?>',
            'field': field, 'order': order},
        success: function (data) {

            $('#clinicaltrial_result').html(data);
            easyPieChart();
        }
    });
}

function filters() {

    var statusArr = new Array();
    var arr = new Array();

    var status = $('[name="status[]"]');
    var statusLength = status.length;
    for (var st = 0; st < statusLength; st++)
    {
        if (status[st].checked)
        {
            statusArr.push(status[st].value);
        }
    }

    var phaseArr = new Array();
    var phase = $('[name="phase[]"]');
    var phaseLength = phase.length;
    for (var ph = 0; ph < phaseLength; ph++)
    {
        if (phase[ph].checked)
        {
            phaseArr.push(phase[ph].value);
        }
    }

    var conditionArr = new Array();
    var condition = $('[name="condition[]"]');
    var conditionLength = condition.length;
    for (var cn = 0; cn < conditionLength; cn++)
    {
        if (condition[cn].checked)
        {
            conditionArr.push(condition[cn].value);
        }
    }

    var drugArr = new Array();
    var drug = $('[name="drug[]"]');
    var drugLength = drug.length;
    for (var dr = 0; dr < drugLength; dr++)
    {
        if (drug[dr].checked)
        {
            drugArr.push(drug[dr].value);
        }
    }

    var sponsorArr = new Array();
    var sponsor = $('[name="sponsor[]"]');
    var sponsorLength = sponsor.length;
    for (var sp = 0; sp < sponsorLength; sp++)
    {
        if (sponsor[sp].checked)
        {
            sponsorArr.push(sponsor[sp].value);
        }
    }

    var yearArr = new Array();
    var year = $('[name="year[]"]');
    var yearLength = year.length;
    for (var yr = 0; yr < yearLength; yr++)
    {
        if (year[yr].checked)
        {
            yearArr.push(year[yr].value);
        }
    }

    arr["status"] = statusArr;
    arr["phase"] = phaseArr;
    arr["condition"] = conditionArr;
    arr["drug"] = drugArr;
    arr["sponsor"] = sponsorArr;
    arr["year"] = yearArr;

    return arr;
}

function applyFilters()
{
    getClinicalRS(5, 1);
}

function select_all(name, value) {
    var checkbox = $('[name="' + name + '[]"]');
    for (var i = 0; i < checkbox.length; i++) {
        if (value == '1') {
            checkbox[i].checked = true;
        } else {
            checkbox[i].checked = false;
        }
    }

}

function Enableother(name)
{
    var y = $('#' + name + '_all:checked').val();
    if (y == "all")
    {
        select_all(name, '1');
    }
    else {
        select_all(name, '0');
    }
}

function applyFiltersForButton(id, type)
{
    var statusArr = new Array();

    var cbs1 = document.getElementsByName('status[]');
    for (var n = 0; n < cbs1.length; n++)
    {
        if (cbs1[n].checked)
        {
            if (type == 'status')
            {
                if (cbs1[n].value == id) {

                    cbs1[n].checked = false;
                } else {
                    statusArr.push(cbs1[n].value);
                }

            } else {
                statusArr.push(cbs1[n].value);
            }
        }
    }

    var phaseArr = new Array();


    var phase = document.getElementsByName('phase[]');
    for (var n = 0; n < phase.length; n++)
    {
        if (phase[n].checked)
        {
            if (type == 'phase')
            {
                if (phase[n].value == id) {

                    phase[n].checked = false;
                } else {
                    phaseArr.push(phase[n].value);
                }
            }
            else {
                phaseArr.push(phase[n].value);
            }
        }
    }
    var conditionArr = new Array();

    var condition = document.getElementsByName('condition[]');
    for (var n = 0; n < condition.length; n++)
    {
        if (condition[n].checked)
        {
            if (type == 'condition')
            {
                if (condition[n].value == id) {

                    condition[n].checked = false;
                } else {
                    conditionArr.push(condition[n].value);
                }
            }
            else {
                conditionArr.push(condition[n].value);
            }
        }
    }
    var drugArr = new Array();

    var drug = document.getElementsByName('drug[]');
    for (var n = 0; n < drug.length; n++)
    {
        if (drug[n].checked)
        {

            if (type == 'drug')
            {
                if (drug[n].value == id) {

                    drug[n].checked = false;
                } else {
                    drugArr.push(drug[n].value);
                }
            } else {
                drugArr.push(drug[n].value);
            }
        }
    }

    var sponsorArr = new Array();

    var sponsor = document.getElementsByName('sponsor[]');
    for (var n = 0; n < sponsor.length; n++)
    {
        if (sponsor[n].checked)
        {

            if (type == 'sponsor')
            {
                if (sponsor[n].value == id) {

                    sponsor[n].checked = false;
                } else {
                    sponsorArr.push(sponsor[n].value);
                }
            } else {
                sponsorArr.push(sponsor[n].value);
            }
        }
    }

    var yearArr = new Array();

    var year = document.getElementsByName('sponsor[]');
    for (var n = 0; n < year.length; n++)
    {
        if (year[n].checked)
        {

            if (type == 'year')
            {
                if (year[n].value == id) {

                    year[n].checked = false;
                } else {
                    yearArr.push(year[n].value);
                }
            } else {
                yearArr.push(year[n].value);
            }
        }
    }

    $.ajax({
        url: '/get_clinical_rs',
        type: "get",
        data: {"show": 5, "pagenum": 1, "status_arr": statusArr, "phase_arr": phaseArr, "condition_arr": conditionArr,
            "drug_arr": drugArr, "sponsor_arr": sponsorArr, "year_arr": yearArr, 'back': '<?php echo urlencode(URL::full()); ?>'},
        success: function (data) {
            $('#clinicaltrial_result').html(data);
            easyPieChart();
        }
    });
}
function easyPieChart() {
    $('.easy-pie-success').easyPieChart({
        lineWidth: 5,
        barColor: '#4AAE4D',
        trackColor: '#e5e9ec',
        scaleColor: false,
        size: 50
    });
    $('.easy-pie-warning').easyPieChart({
        lineWidth: 5,
        barColor: 'orange',
        trackColor: '#e5e9ec',
        scaleColor: false,
        size: 50
    });
    $('.easy-pie-danger').easyPieChart({
        lineWidth: 5,
        barColor: 'red',
        trackColor: '#e5e9ec',
        scaleColor: false,
        size: 50
    });
}

        </script>

    </body>
</html>