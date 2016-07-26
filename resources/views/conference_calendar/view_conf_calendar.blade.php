@extends('layouts.conf_calendar')

@section('Calendar')

<div class="grid simple transparent  no-margin no-padding">
    <div class="grid-title page-title no-border no-margin no-padding">
        <a href="home.html"> <i class="fa fa-2x icon-custom-left"></i></a>
        <h3 class="inline semi-bold m-b-5"><span class="bold" style="color:#FF891F;">Conference Calendar</span></h3>
        <div class="pull-right p-t-5">
            <a class="height-5 btn btn-success" id="calender-prev" onclick="prevYear()" href="javascript:void(0);"><i class="fa none-18 fa-2x fa-chevron-left text-white" style="margin-top:-9px !important;"></i></a> 
            <span class="bold p-l-10 p-r-10" id="year_conference" style="font-size:18px;"></span>
            <a class="height-5 btn btn-success" id="calender-next" onclick="nextYear()" href="javascript:void(0);"><i class="fa none-18 fa-2x fa-chevron-right text-white" style="margin-top:-9px !important;"></i></a> 
        </div>
    </div>
</div>

<hr class="no-margin b-transparent">  
<div class="row m-t-5">
    <?php
    $month_arr = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
    ?>


    <div class="col-md-12 no-padding ">
        @for($month=0; $month<=3; $month++)
        <?php
        $month_name = $month_arr[$month];
        $month_value = $monthly_calender[$month_name];
        ?>
        <div class="col-md-3 p-l-15 p-r-5 b-r">

            <div class="grid simple m-b-5-f cal-1">
                <div class="grid-title padding-10-f cal-gird-trans">
                    <a href="/ci_calendar_by_month/yr/<?php echo $yr; ?>/mn/<?php echo $month_name; ?>" ><h4 class="semi-bold no-margin">{{ $month_name }}</h4></a>
                    <div class="tools"> <span class="badge badge-white">{{ $month_value['Total_Conf']}}</span> </div>
                </div>
                <div class="grid-body padding-10-f cal-bg height-130 cal-1">

                    @if(!empty($month_value["Conf_Details"]))

                    <div class="owl-carousel">
                        <?php 
                        $nav_key=0;
                        ?>
                        @foreach($month_value["Conf_Details"] as $Conf_Id=>$val)
                        <?php $Pin_type = rand(1, 4); ?>
                        <div class="height-2 pin pin{{$Pin_type}}">
                            <a href="#" onclick="getDetailConf('<?php echo $nav_key; ?>','<?php echo $month_name; ?>','<?php echo $yr; ?>');">
                                <div class="semi-bold p-t-15">
                                    @if(strlen($val["conf_title"])< 45){{ $val["conf_title"]."..." }}
                                    @else {{ substr($val["conf_title"],0,45)."..." }}
                                    @endif
                                    <small>
                                        {{$val["conf_date"]}}
                                    </small>
                                </div>
                            </a>
                        </div>
                        <?php $nav_key++; ?>
                        @endforeach
                    </div>
                    @else
                   <h4 class="p-t-20"> No conference for this month! </h4>
                   @endif

                </div>
            </div>

        </div>
        @endfor
    </div>

    <div class="col-md-12 m-t-5">
        <hr class="no-margin b-transparent">
    </div>

    <div class="col-md-12 m-t-5 no-padding ">
        @for($month=4; $month<=7; $month++)
           <?php
        $month_name = $month_arr[$month];
        $month_value = $monthly_calender[$month_name];
        ?>
        <div class="col-md-3 p-l-15 p-r-5 b-r">

            <div class="grid simple m-b-5-f cal-1">
                <div class="grid-title padding-10-f cal-gird-trans">
                    <a href="/ci_calendar_by_month/yr/<?php echo $yr; ?>/mn/<?php echo $month_name; ?>" ><h4 class="semi-bold no-margin">{{ $month_name }}</h4></a>
                    <div class="tools"> <span class="badge badge-white">{{ $month_value['Total_Conf']}}</span> </div>
                </div>
                <div class="grid-body padding-10-f cal-bg height-130 cal-1">
                @if(!empty($month_value["Conf_Details"]))

                <div class="owl-carousel">
                    <?php 
                        $nav_key=0;
                        ?>
                    @foreach($month_value["Conf_Details"] as $Conf_Id=>$val)
                    <?php $Pin_type = rand(5, 8); ?>
                    <div class="height-2 pin pin{{$Pin_type}}">
                        <a href="#" onclick="getDetailConf('<?php echo $nav_key; ?>','<?php echo $month_name; ?>','<?php echo $yr; ?>');">
                            <div class="semi-bold p-t-15">
                                @if(strlen($val["conf_title"])< 45){{ $val["conf_title"]."..." }}
                                @else {{ substr($val["conf_title"],0,45)."..." }}
                                @endif
                                <small>
                                    {{$val["conf_date"]}}
                                </small>
                            </div>
                        </a>
                    </div>
                    <?php $nav_key++; ?>
                    @endforeach
                </div>
                @else
                <h4 class="p-t-20"> No conference for this month! </h4>
                @endif 
            </div>
            </div>

        </div>
        @endfor
    </div>

    <div class="col-md-12 m-t-5">
        <hr class="no-margin b-transparent">
    </div>

    <div class="col-md-12 m-t-5 no-padding ">
        @for($month=8; $month<=11; $month++)
           <?php
        $month_name = $month_arr[$month];
        $month_value = $monthly_calender[$month_name];
        ?>
        <div class="col-md-3 p-l-15 p-r-5 b-r">

            <div class="grid simple m-b-5-f cal-1">
                <div class="grid-title padding-10-f cal-gird-trans">
                    <a href="/ci_calendar_by_month/yr/<?php echo $yr; ?>/mn/<?php echo $month_name; ?>" ><h4 class="semi-bold no-margin">{{ $month_name }}</h4></a>
                    <div class="tools"> <span class="badge badge-white">{{ $month_value['Total_Conf']}}</span> </div>
                </div>
                <div class="grid-body padding-10-f cal-bg height-130 cal-1">
                @if(!empty($month_value["Conf_Details"]))

                <div class="owl-carousel">
                    <?php 
                        $nav_key=0;
                        ?>
                    @foreach($month_value["Conf_Details"] as $Conf_Id=>$val)
                    <?php $Pin_type = rand(9, 12); ?>
                    <div class="height-2 pin pin{{$Pin_type}}">
                        <a href="#" onclick="getDetailConf('<?php echo $nav_key; ?>','<?php echo $month_name; ?>','<?php echo $yr; ?>');">
                            <div class="semi-bold p-t-15">
                                @if(strlen($val["conf_title"])< 45){{ $val["conf_title"]."..." }}
                                @else {{ substr($val["conf_title"],0,45)."..." }}
                                @endif
                                <small>
                                    {{$val["conf_date"]}}
                                </small>
                            </div>
                        </a>
                    </div>
                    <?php $nav_key++; ?>
                    @endforeach
                </div>
                @else
                  <h4 class="p-t-20"> No conference for this month! </h4>
                   
                @endif
                </div>
            </div>

        </div>
        @endfor
    </div>


</div>


@endsection
