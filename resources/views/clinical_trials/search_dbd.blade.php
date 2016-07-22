@extends('layouts.clinical_search_dbd')

@section('content')

<?php
if(count($status)!=0){
    $collapse_in_status="in";
    $collapse_in_anchor_status="";
}else{
    $collapse_in_status="";
    $collapse_in_anchor_status="collapsed text-black";
}

if(count($phase)!=0){
    $collapse_in_phase="in";
    $collapse_in_anchor_phase="";
}else{
    $collapse_in_phase="";
    $collapse_in_anchor_phase="collapsed text-black";
}

if(count($sponsor)!=0 ){
    $collapse_in_sr="in";
    $collapse_in_anchor_sr="";
}else{
    $collapse_in_sr="";
    $collapse_in_anchor_sr="collapsed text-black";
}

if(count($drug)!=0 ){
    $collapse_in_dr="in";
    $collapse_in_anchor_dr="";
}else{
    $collapse_in_dr="";
    $collapse_in_anchor_dr="collapsed text-black";
}

if(count($condition)!=0){
    $collapse_in_cn="in";
    $collapse_in_anchor_cn="";
}else{
    $collapse_in_cn="";
    $collapse_in_anchor_cn="collapsed text-black";
}

if(count($est_date)!=0){
    $collapse_in_yr="in";
    $collapse_in_anchor_yr="";
}else{
    $collapse_in_yr="";
    $collapse_in_anchor_yr="collapsed text-black";
}
?>

<div class="page-title no-margin"> <a href="/clinicaltrial_dashboard"> <i class="icon-custom-left"></i></a>
    <h3 class="no-margin p-t-10 p-b-5"><span class="bold" style="color:#FF891F;">Clinical Research: </span> Search Results</h3>
</div>
<hr class="no-margin b-transparent">
<div class="row">
    <div class="col-md-3">
        <h4 class="semi-bold">Filters</h4>

        <div class="panel-group" id="accordion">
            <div class="panel panel-tab">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a class="<?php echo $collapse_in_anchor_status; ?>" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                            <h6 class="no-margin inline bold text-black">Study Status</h6>
                        </a>
                    </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse <?php echo $collapse_in_status ;?>">
                    <div class="panel-body b-all">
                        <div class="row-fluid">
                            <div class="checkbox check-success p-t-5 b-b p-b-5  ">
                                <input type="checkbox" value="all" id="status_all" name="status_all" onchange="Enableother('status');applyFilters();">
                                <label for="status_all" class="text-black no-margin">Select All </label>
                            </div>
                        </div>
                        <?php
                        $st=1;
                        $status_name=array();
                        ?>
                        @foreach($statusArr as $status_val)
                        <div class="row-fluid">
                            <div class="checkbox check-success p-t-5 b-b p-b-5  ">
                                @if($status_val['status_id']==$status)
                                <input type="checkbox" checked value="{{ $status_val['status_id'] }}" onchange="applyFilters()" name="status[]" id="status_{{ $st }}">
                                <label for="status_{{ $st }}" class="text-black no-margin">{{ $status_val['status_name'] }}</label>
                                @else
                                <input type="checkbox" value="{{ $status_val['status_id'] }}" onchange="applyFilters()" name="status[]" id="status_{{ $st }}">
                                <label for="status_{{ $st }}" class="text-black no-margin">{{ $status_val['status_name'] }}</label>
                                @endif
                                
                            </div>
                        </div>
                        <?php $st++; ?>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a class="<?php echo $collapse_in_anchor_phase; ?>" data-toggle="collapse" data-parent="#accordion"  href="#collapseTwo">
                            <h6 class="no-margin inline bold text-black">Phase</h6> 
                        </a>
                    </h4>
                </div>
                <div id="collapseTwo" class="panel-collapse collapse <?php echo $collapse_in_phase ;?>">
                    <div class="panel-body b-all">
                        <div class="row-fluid">
                            <div class="checkbox check-success p-t-5 b-b p-b-5  ">
                                
                                <input type="checkbox" value="all" id="phase_all" name="phase_all" onchange="Enableother('phase');applyFilters();">
                                <label for="phase_all" class="text-black no-margin">Select All </label>
                            </div>
                        </div>
                        <?php
                        $ph=1;
                        ?>
                        @foreach($phaseArr as $phase_val)
                        <div class="row-fluid">
                            <div class="checkbox check-success  p-t-5 b-b p-b-5">
                                @if($phase_val['phase_id']==$phase)
                                <input type="checkbox" value="{{ $phase_val['phase_id'] }}" checked onchange="applyFilters()" name="phase[]" id="phase_{{ $ph }}">
                                @else
                                <input type="checkbox" value="{{ $phase_val['phase_id'] }}" onchange="applyFilters()" name="phase[]" id="phase_{{ $ph }}">
                                @endif
                                <label for="phase_{{ $ph }}" class="text-black no-margin">{{ $phase_val['phase_name'] }}</label>
                            </div>
                        </div>
                        <?php $ph++ ;?>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a class="<?php echo $collapse_in_anchor_dr; ?>" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                            <h6 class="no-margin inline bold text-black">Drug</h6>
                        </a>
                    </h4>
                </div>
                <div id="collapseThree" class="panel-collapse collapse <?php echo $collapse_in_dr ;?>">
                    <div class="panel-body b-all">
                        <div class="row-fluid">
                            <div class="checkbox check-success p-t-5 b-b p-b-5  ">
                                <input type="checkbox" value="all" id="drug_all" name="drug_all" onchange="Enableother('drug');applyFilters();">
                                <label for="drug_all" class="text-black no-margin">Select All </label>
                            </div>
                        </div>
                        
                         <?php
                        $dr=1;
                        ?>
                        @foreach($drugArr as $drug_val)
                        <div class="row-fluid">
                            <div class="checkbox check-success  p-t-5 b-b p-b-5">
                                @if($drug_val['drug_id']==$drug)
                                <input type="checkbox" checked value="{{ $drug_val['drug_id'] }}" name="drug[]" onchange="applyFilters()" id="drug_{{$dr}}">
                                @else
                                <input type="checkbox" value="{{ $drug_val['drug_id'] }}" name="drug[]" onchange="applyFilters()" id="drug_{{$dr}}">
                                @endif
                                
                                <label for="drug_{{$dr}}" class="text-black no-margin">{{ $drug_val['drug_name'] }}</label>
                            </div>
                        </div>
                        <?php $dr++; ?>
                        @endforeach
                    </div>
                </div>

            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a class="<?php echo $collapse_in_anchor_cn; ?>" data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
                            <h6 class="no-margin inline bold text-black">Condition</h6>
                        </a>
                    </h4>
                </div>
                <div id="collapseFour" class="panel-collapse collapse <?php echo $collapse_in_cn ;?>">
                    <div class="panel-body b-all">
                        <div class="row-fluid">
                            <div class="checkbox check-success p-t-5 b-b p-b-5  ">
                                <input type="checkbox" value="all" id="condition_all" name="condition_all" onchange="Enableother('condition');applyFilters();">
                                <label for="condition_all" class="text-black no-margin">Select All </label>
                            </div>
                        </div>
                        <?php
                        $cn=1;
                        ?>
                        @foreach($conditionArr as $condition_val)
                        <div class="row-fluid">
                            <div class="checkbox check-success  p-t-5 b-b p-b-5">
                                @if($condition_val['condition_id']==$condition)
                                <input type="checkbox" checked value="{{ $condition_val['condition_id'] }}" onchange="applyFilters()" name="condition[]" id="condition_{{$cn}}">
                                @else
                                <input type="checkbox" value="{{ $condition_val['condition_id'] }}" onchange="applyFilters()" name="condition[]" id="condition_{{$cn}}">
                                @endif
                                
                                <label for="condition_{{$cn}}" class="text-black no-margin">{{ $condition_val['condition_name'] }}</label>
                            </div>
                        </div>
                        <?php $cn++ ;?>
                        @endforeach
                        
                    </div>
                </div>

            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a class="<?php echo $collapse_in_anchor_sr; ?>" data-toggle="collapse" data-parent="#accordion" href="#collapseFive">
                            <h6 class="no-margin inline bold text-black">Sponsor</h6>
                        </a>
                    </h4>
                </div>
                <div id="collapseFive" class="panel-collapse collapse <?php echo $collapse_in_sr ;?>">
                    <div class="panel-body b-all">
                        <div class="row-fluid">
                            <div class="checkbox check-success p-t-5 b-b p-b-5  ">
                                <input type="checkbox" value="all" id="sponsor_all" name="sponsor_all" onchange="Enableother('sponsor');applyFilters();">
                                <label for="sponsor_all" class="text-black no-margin">Select All </label>
                            </div>
                        </div>
                        <?php
                        $sp=1;
                        ?>
                        @foreach($sponsorArr as $sponsor_val)
                        <div class="row-fluid">
                            <div class="checkbox check-success  p-t-5 b-b p-b-5">
                                @if($sponsor_val['sponsor_id']==$sponsor)
                                <input type="checkbox" checked value="{{ $sponsor_val['sponsor_id'] }}" onchange="applyFilters()" name="sponsor[]" id="sponsor_{{$sp}}">
                                @else
                                <input type="checkbox" value="{{ $sponsor_val['sponsor_id'] }}" onchange="applyFilters()" name="sponsor[]" id="sponsor_{{$sp}}">
                                @endif
                                
                                <label for="sponsor_{{$sp}}" class="text-black no-margin">{{ $sponsor_val['sponsor_name'] }}</label>
                            </div>
                        </div>
                        <?php $sp++; ?>
                        @endforeach
                    </div>
                </div>

            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a class="<?php echo $collapse_in_anchor_yr ;?>" data-toggle="collapse" data-parent="#accordion" href="#collapseSix">
                            <h6 class="no-margin inline bold text-black">Estimated Year of Completion</h6>
                        </a>
                    </h4>
                </div>
                <div id="collapseSix" class="panel-collapse collapse <?php echo $collapse_in_yr ;?>">
                    <div class="panel-body b-all ">
                        <div class="row-fluid">
                            <div class="checkbox check-success p-t-5 b-b p-b-5  ">
                                <input type="checkbox" value="all" id="year_all" name="year_all" onchange="Enableother('year');applyFilters();">
                                <label for="year_all" class="text-black no-margin" >Select All </label>
                            </div>
                        </div>
                        @foreach($estYearArr as $estYearArr_val)
                        <div class="row-fluid">
                            <div class="checkbox check-success  p-t-5 b-b p-b-5">
                                @if($estYearArr_val==$est_date)
                                <input type="checkbox" checked value="{{ $estYearArr_val }}" onchange="applyFilters()" name="year[]" id="est_{{$estYearArr_val}}">
                                @else
                                <input type="checkbox" value="{{ $estYearArr_val }}" onchange="applyFilters()" name="year[]" id="est_{{$estYearArr_val}}">
                                @endif
                                
                                <label for="est_{{$estYearArr_val}}" class="text-black no-margin">{{ $estYearArr_val }}</label>
                            </div>
                        </div>
                        @endforeach
                        
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="col-md-9" id="clinicaltrial_result" style="padding-left:0 !important;">

    </div>


</div>
@endsection
