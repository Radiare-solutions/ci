@extends('layouts.clinical_summary_dbd')

@section('content')
<?php
$url='&navArr[]='.implode('&amp;navArr[]=', array_map('urlencode', $nav_key));
?>

@foreach($clinical_content as $clinical_cnt_val)

<?php
// Find the index of the current item
$current_index = array_search($clinical_cnt_val['_id'], $nav_key);

// Find the index of the next/prev items
$next = $current_index + 1;
$prev = $current_index - 1;
if ($prev >=0){
    $prev="/clinical_study_summary?id=".$nav_key[$prev].$url;
}else{
    $prev="#";
}
if($next < count($nav_key)){
    $next="/clinical_study_summary?id=".$nav_key[$next].$url;
}else{
   $next="#" ;
}
$full_url=urlencode(URL::full());
?>

<div class="grid simple transparent  no-margin no-padding">
    <div class="grid-title page-title no-border no-margin no-padding">
        <a href="{{$back}}"> <i class="fa fa-2x icon-custom-left"></i></a>
        <h3 class="inline semi-bold"><span class="bold" style="color:#FF891F;">Clinical Research: </span> {{ $clinical_cnt_val['clinical_title'] }}</h3>
        <div class="tools">
            <a class="height-5" href="{{$prev}}"><i class="fa none-18 fa-2x fa-chevron-left text-black"></i></a> 
            <a class="height-5" href="{{$back}}"><i class="fa none-18 fa-2x fa-th text-black"></i></a> 
            <a class="height-5" href="{{$next}}"><i class="fa none-18 fa-2x fa-chevron-right text-black"></i></a> 
            <a class="height-5" href="/clinical_study_detail?id={{$clinical_cnt_val['_id']}}&back={{$full_url}}"><i class="fa info-color-bg fa-3x fa-info-circle text-black"></i></a> 
        </div>
    </div>
</div>


<hr class="no-margin b-transparent">
<div class="m-t-10"></div>
<hr class="no-margin b-transparent">
<div class="row">
    <div class="col-md-6 no-margin no-padding"  style="padding-left:15px !important;">
        <div style="background: #D8E0E3 !important;" class="col-md-12 no-padding">
            <div class="col-md-3 no-margin no-padding">
                <div class="tiles tile-bg-custom m-t-5 m-b-5 b-l b-r">
                    <div class="text-center p-t-10 p-b-10">
                        <div class="text-black bold">{{ $clinical_cnt_val['phase_name'] }}</div>
                        <div class="text-orange semi-bold">Study Phase </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 no-margin no-padding">
                <div class="tiles tile-bg-custom m-t-5 m-b-5 b-r">
                    <div class="text-center p-t-10 p-b-10">
                        <div class="bold text-black">{{ $clinical_cnt_val['condition_name'] }}</div>
                        <div class="text-orange semi-bold">Condition </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 no-margin no-padding">
                <div class="tiles tile-bg-custom m-t-5 m-b-5 b-r">
                    <div class="text-center p-t-10 p-b-10">
                        <div class="bold text-black">{{ $clinical_cnt_val['sponsor_name'] }}</div>
                        <div class="text-orange semi-bold">Sponsor </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 no-margin no-padding">
                <div class="tiles tile-bg-custom m-t-5 m-b-5 b-r">
                    <div class="text-center p-t-10 p-b-10">
                        <div class="bold text-black">{{ $clinical_cnt_val['enrollment'] }}</div>
                        <div class="text-orange semi-bold">Enrollment </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 no-margin no-padding" style="padding-right:15px !important;">
        <div style="background: #D8E0E3 !important;" class="col-md-12 no-padding">
            <div class="col-md-3 no-margin no-padding">
                <div class="tiles tile-bg-custom m-t-5 m-b-5 b-r">
                    <div class="text-center p-t-10 p-b-10">
                        <div class="bold text-black">{{ $clinical_cnt_val['study_type'] }}</div>
                        <div class="text-orange semi-bold">Study Type </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 no-margin no-padding">
                <div class="tiles tile-bg-custom m-t-5 m-b-5 b-r">
                    <div class="text-center p-t-10 p-b-10">
                        <div class="bold text-black">{{ $clinical_cnt_val['status_name'] }}</div>
                        <div class="text-orange semi-bold">Status </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 no-margin no-padding">
                <div class="tiles tile-bg-custom m-t-5 m-b-5 b-r">
                    <div class="text-center p-t-10 p-b-10">
                        <div class="bold text-black">{{ DATE("F Y",strtotime($clinical_cnt_val['study_start_date']))}}</div>
                        <div class="text-orange semi-bold">Start </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 no-margin no-padding">
                <div class="tiles tile-bg-custom m-t-5 m-b-5 b-r">
                    <div class="text-center p-t-10 p-b-10">
                        <div class="bold text-black">{{ DATE("F Y",strtotime($clinical_cnt_val['study_completion_date']))}}</div>
                        <div class="text-orange semi-bold">Completion </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



</div>
<hr class="no-margin b-transparent">


<div class="row no-margin no-padding row-eq-height height-220">
    <div class="col-md-3 b-r b-l m-t-5 m-b-5">
        <h4 class="bold no-margin">Brief Summary</h4>
        <p class="text-black text-jusitfy">
            <?php
            $brief_summary = $clinical_cnt_val['brief_summary'];
            $limit = 420;
            if (strlen(strip_tags($brief_summary)) < $limit) {
                echo strip_tags($brief_summary);
            } 
            else {
                echo substr(strip_tags($brief_summary), 0, $limit).'...<a href="/clinical_study_detail?id='.$clinical_cnt_val['_id'].'"><span class="text-orange bold text-italic">Read more </span></a>';
            }
            ?>
        </p>
    </div>
    <div class="col-md-3 b-r m-t-5 m-b-5">
        <h4 class="bold no-margin">Intervention</h4>
        <p class="text-black ">
            <?php echo $clinical_cnt_val['intervention']; ?>
        </p>
    </div>
    <div class="col-md-3 b-r m-t-5 m-b-5">
        <h4 class="bold no-margin">Study Design</h4>
        <p class="text-black ">
            <?php echo $clinical_cnt_val['study_design']; ?>
        </p>
    </div>
    <div class="col-md-3 b-r m-t-5 m-b-5">
        <h4 class="bold no-margin">Primary Outcome Measures</h4>
        <p class="text-black text-jusitfy">
            <?php
            $primary_measure = $clinical_cnt_val['primary_measure_def'];
            $limit = 420;
            if (strlen(strip_tags($primary_measure)) < $limit) {
                echo strip_tags($primary_measure);
            } 
            else {
                echo substr(strip_tags($primary_measure), 0, $limit).'...<a href="/clinical_study_detail?id='.$clinical_cnt_val['_id'].'"><span class="text-orange bold text-italic">Read more </span></a>';
            }
            ?>
    </div>
</div>
<hr class="no-margin b-transparent">

<h4 class="bold no-margin">Study Results</h4>
<div class="row row-eq-height height-220">
    <div class="col-md-6 b-r">
        <h6 class="bold no-margin">Primary Outcome Measure Statistical Analysis</h6>
        <hr class="no-margin b-transparent">

        <div class="col-md-6 no-padding">
            <div class="scroller scrollbar-hidden" data-height="150px">
                <?php echo $clinical_cnt_val['primary_measure_value']; ?>
            </div>
            
        </div>

        <div class="col-md-6">
            <h6 class="bold no-margin">Additional information </h6>
            <div class="scroller scrollbar-hidden" data-height="150px">
            <ul class="text-black no-padding m-l-20" >

                <li><?php echo $clinical_cnt_val['primary_outcome_res1']; ?></li>
                <li><?php echo $clinical_cnt_val['primary_outcome_res2']; ?></li>
                <li><?php echo $clinical_cnt_val['primary_outcome_res3']; ?></li>
            </ul>
            </div>    
        </div>

    </div>

    <div class="col-md-3 b-r">
        <h6 class="bold no-margin">Serious Adverse Events</h6>
        <hr class="no-margin b-transparent">
        <div id="morris-bar-graph" style="height:200px;" data-colors="#9C27B0,#2196F3,#0aa89e"></div>
    </div>

    <div class="col-md-3">
        <h6 class="bold no-margin">Other Adverse Events</h6>
        <hr class="no-margin b-transparent">
        <div id="morris-bar-graph1" style="height:200px;" data-colors="#9C27B0,#2196F3,#0aa89e"></div>
    </div>


</div>
@endforeach
@endsection