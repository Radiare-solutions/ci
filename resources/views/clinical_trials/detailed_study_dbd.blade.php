@extends('layouts.clinical_detailed_study_dbd')

@section('content')

@foreach($clinical_detail as $clinical_detail_val)

<div class="grid simple transparent  no-margin no-padding">
    <div class="grid-title page-title no-border no-margin no-padding">
        <a href="{{$back_url}}"> <i class="fa fa-2x icon-custom-left"></i></a>
        <h3 class="inline semi-bold"><span class="bold" style="color:#FF891F;">Clinical Research: </span> {{ $clinical_detail_val['clinical_title'] }}</h3>
        <div class="tools">
            <button data-placement="left" title="" data-toggle="tooltip" class="btn-large tip btn text-white" style="background:#FF7A00 !important;" type="button" data-original-title="Enrollment">{{ $clinical_detail_val['enrollment'] }}</button>
            <button data-placement="bottom" title="" data-toggle="tooltip" class="btn-large tip btn text-white" style="background:#0B9444 !important;" type="button" data-original-title="Status">{{ $clinical_detail_val['status_name'] }}</button>
        </div>
    </div>
</div>


<hr class="no-margin b-transparent">
<div class="m-t-10 text-black semi-bold">
    <span class="bold text-orange">Official Title :</span> {{ $clinical_detail_val['official_title'] }}.

</div>
<hr class="no-margin b-transparent">
<div class="row">

    <div class="col-md-6 no-margin no-padding"  style="padding-left:15px !important;">
        <div style="background: #D8E0E3 !important;" class="col-md-12 no-padding">
            <div class="col-md-3 no-margin no-padding">
                <div class="tiles tile-bg-custom m-t-5 m-b-5 b-l b-r">
                    <div class="text-center p-t-10 p-b-10">
                        <div class="text-black bold">{{ $clinical_detail_val['phase_name'] }}</div>
                        <div class="text-orange semi-bold">Study Phase </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 no-margin no-padding">
                <div class="tiles tile-bg-custom m-t-5 m-b-5 b-r">
                    <div class="text-center p-t-10 p-b-10">
                        <div class="bold text-black">{{ $clinical_detail_val['condition_name'] }}</div>
                        <div class="text-orange semi-bold">Condition </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 no-margin no-padding">
                <div class="tiles tile-bg-custom m-t-5 m-b-5 b-r">
                    <div class="text-center p-t-10 p-b-10">
                        <div class="bold text-black">{{ $clinical_detail_val['sponsor_name'] }}</div>
                        <div class="text-orange semi-bold">Sponsor </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 no-margin no-padding">
                <div class="tiles tile-bg-custom m-t-5 m-b-5 b-r">
                    <div class="text-center p-t-10 p-b-10">
                        <div class="bold text-black">{{ $clinical_detail_val['collaborator'] }}</div>
                        <div class="text-orange semi-bold">Collaborator </div>
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
                        <div class="bold text-black">{{ $clinical_detail_val['study_type'] }}</div>
                        <div class="text-orange semi-bold">Study Type </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 no-margin no-padding">
                <div class="tiles tile-bg-custom m-t-5 m-b-5 b-r">
                    <div class="text-center p-t-10 p-b-10">
                        <div class="bold text-black">{{ DATE("F Y",strtotime($clinical_detail_val['study_start_date'])) }}</div>
                        <div class="text-orange semi-bold">Start Date</div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 no-margin no-padding">
                <div class="tiles tile-bg-custom m-t-5 m-b-5 b-r">
                    <div class="text-center p-t-10 p-b-10">
                        <div class="bold text-black">{{ DATE("F Y",strtotime($clinical_detail_val['study_completion_date'])) }}</div>
                        <div class="text-orange semi-bold">Completion Date </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 no-margin no-padding">
                <div class="tiles tile-bg-custom m-t-5 m-b-5 b-r">
                    <div class="text-center p-t-10 p-b-10">
                        <div class="bold text-black">{{ DATE("F d, Y",strtotime($clinical_detail_val['last_updated_date'])) }}</div>
                        <div class="text-orange semi-bold">Last Updated Date </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



</div>
<hr class="no-margin b-transparent">



<div class="row m-t-5">
    <!--     <div class="col-md-12 m-b-5">
        <hr class="no-margin b-transparent border-width-t">
      </div> -->
    <div class="col-md-12" >

        <div class="col-md-6 no-padding b-l b-blank" >
            <div class="col-md-12 p-l-5 p-r-5 " >

                <h4 class="bold b-b b-blank p-l-10 p-r-10"><span class="text-blue-custom">Brief Summary</span></h4>

                <div class="scroller scrollbar-hidden" data-height="200px">
                    <p class="text-black p-l-10 p-r-10 text-jusitfy">
                        {{ $clinical_detail_val['brief_summary'] }}
                    </p>
                </div>
                <hr class="no-margin b-blank border-width-t">

            </div>

            <div class="col-md-12 p-l-5 p-r-5 " >

                <h4 class="bold b-b b-blank p-l-10 p-r-10"><span class="text-blue-custom">Study Design</span></h4>

                <div class="scroller scrollbar-hidden" data-height="200px">
                    <p class="text-black p-l-10 p-r-10 text-jusitfy">
                        <?php echo $clinical_detail_val['study_design']; ?>
                    </p>
                </div>
            </div>

        </div>

        <div class="col-md-6 no-padding b-blank b-r b-l" >
            <div class="col-md-12 p-l-5 p-r-5 " >
                <h4 class="bold b-b b-blank p-l-10 p-r-10 "><span class="text-blue-custom">Intervention Details</span></h4>
                <div class="scroller scrollbar-hidden" data-height="377px">
                    <ul class="p-r-10">
                        <?php echo $clinical_detail_val['detailed_intervention']; ?>
                    </ul>
                </div>
            </div>

        </div>
    </div>

    <div class="col-md-12 m-t-5">
        <hr class="no-margin b-transparent border-width-t">
    </div>
</div>


@if($clinical_detail_val['detailed_desc']!='')
<div class="row m-b-10">
    <div class="col-md-12">
        <h4 class="bold no-margin text-black">Detailed Description</h4>
    </div>

    <div class="col-md-12">
        <div class="panel-group" id="accordion1" data-toggle="collapse">
            <div class="row">
                <div class="panel panel-default">


                    <div class="panel-body text-black">
                        <div class="scroller scrollbar-hidden" data-height="400px">
                            <?php echo $clinical_detail_val['detailed_desc'];?>
                        </div>

                    </div>
                </div>


            </div>
        </div>

    </div>



</div>
<hr class="no-margin b-transparent border-width-t">
@endif
<div class="row m-b-10">
    <div class="col-md-12">
        <h4 class="bold no-margin text-black">Recruitment Information</h4>
    </div>

    <div class="col-md-12">
        <div class="panel-group" id="accordion1" data-toggle="collapse">
            <div class="row">
                <div class="panel panel-default">


                    <div class="panel-body text-black">
                        <div class="scroller scrollbar-hidden" data-height="400px">
                            <table cellspacing="0" cellpadding="5" border="1" class="table table-bordered no-margin">
                                <tbody>
                                    <tr>
                                        <th valign="top" align="left" class="text-black">Recruitment Status</th>  
                                        <td valign="top" class="text-black"><?php echo $clinical_detail_val['status_name']; ?></td>
                                    </tr>
                                    <tr>
                                        <th valign="top" align="left" class="text-black">Eligibility Criteria</th>   
                                        <td valign="top" class="text-black"><?php echo $clinical_detail_val['eligibility_criteria'] ?></td>
                                    </tr>
                                    <tr>
                                        <th valign="top" align="left" class="text-black">Gender</th>  
                                        <td valign="top" class="text-black"><?php echo $clinical_detail_val['eligibility_gender'] ?></td>
                                    </tr>
                                    <tr>
                                        <th valign="top" align="left" class="text-black">Ages</th>   
                                        <td valign="top" class="text-black"><?php echo $clinical_detail_val['age'] ?></td>
                                    </tr>
                                    <tr>
                                        <th valign="top" align="left" class="text-black">Accepts Healthy Volunteers</th>  
                                        <td valign="top" class="text-black"><?php echo $clinical_detail_val['healthy_volunteers'] ?></td>
                                    </tr>
                                    <tr>
                                        <th valign="top" align="left" class="text-black">Listed Location Countries</th>  
                                        <td valign="top" class="text-black"><?php echo $clinical_detail_val['location_country'] ?></td>
                                    </tr>
                                </tbody></table>
                        </div>

                    </div>
                </div>


            </div>
        </div>

    </div>



</div>

<hr class="no-margin b-transparent border-width-t">

@if(count($clinical_detail_val['primary_outcome_measure'])!=0)
<div class="row m-t-10">
    <div class="col-md-12">
        <h4 class="bold no-margin text-black">Primary Outcome Measures</h4>
    </div>

    <div class="col-md-12">
        <div class="panel-group" id="accordion" data-toggle="collapse">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a class="collapsed text-black" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                            Primary: Change From Baseline in Modified Total Sharp X-Ray Score at Week 26 [ Time Frame: Baseline, Week 26 ] 
                        </a>
                    </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse">
                    <div class="panel-body" style="height:400px;overflow:auto;">
                        <?php
                        foreach ($clinical_detail_val['primary_outcome_measure'] as $primary_outcome) {
                            echo $primary_outcome;
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

<hr class="no-margin b-transparent border-width-t">
@endif

@if(count($clinical_detail_val['secondary_outcome_measure'])!=0)

<div class="row m-b-10">
    <div class="col-md-12">
        <h4 class="bold no-margin text-black">Secondary Outcome Measures</h4>
    </div>

    <div class="col-md-12">
        <div class="panel-group" id="accordion1" data-toggle="collapse">
            <div class="row">
                <?php
                $secondary_outcome_measure = $clinical_detail_val['secondary_outcome_measure'];
                $total_secondary_measure = count($secondary_outcome_measure);
                $avg = ceil($total_secondary_measure / 2);
                ?>
                <div class="col-md-6 b-blank b-r">
                    <?php
                    for ($left = 0; $left < $avg; $left++) {

                        $collapse_id_increment = $left + 1;
                        ?>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="collapsed text-black" data-toggle="collapse" data-parent="#accordion1" href="#collapseThree{{ $collapse_id_increment }}">
                                        Secondary: Number of Participants Meeting ACR20 Response Criteria at Week 26 (ACR: American College of Rheumatology) [ Time Frame: Week 26 ] 
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseThree{{ $collapse_id_increment }}" class="panel-collapse collapse">
                                <div class="panel-body text-black">
                                    <div class="scroller scrollbar-hidden" data-height="400px">
                                        <?php echo $secondary_outcome_measure[$left]; ?>
                                    </div>

                                </div>

                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
                <div class="col-md-6 b-blank b-r">
                    <?php
                    for ($right = $avg; $right < $total_secondary_measure; $right++) {
                        $collapse_id_increment = $right + 1;
                        ?>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="collapsed text-black" data-toggle="collapse" data-parent="#accordion1" href="#collapseThree{{ $collapse_id_increment }}">
                                        Secondary: Number of Participants Meeting ACR20 Response Criteria at Week 26 (ACR: American College of Rheumatology) [ Time Frame: Week 26 ] 
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseThree{{ $collapse_id_increment }}" class="panel-collapse collapse">
                                <div class="panel-body text-black">
                                    <div class="scroller scrollbar-hidden" data-height="400px">
                                        <?php echo $secondary_outcome_measure[$left]; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>

            </div>
        </div>

    </div>



</div>

<hr class="no-margin b-transparent border-width-t">
@endif


<div class="row m-b-20 m-t-10">

    <div class="col-md-12">

        @if(count($clinical_detail_val['detailed_serious_adverse'])!="")
        <div class="col-md-6 b-blank b-r">
            <h4 class="bold no-margin text-black">Serious Adverse Events</h4>
            <div class="panel-group" id="accordion2" data-toggle="collapse">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a class="collapsed text-black" data-toggle="collapse" data-parent="#accordion2" href="#collapseOneSerious">
                                Serious Adverse Events 
                            </a>
                        </h4>
                    </div>
                    <div id="collapseOneSerious" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="scroller scrollbar-hidden" data-height="400px">
                                <?php echo preg_replace("/&Acirc;/i", "", $clinical_detail_val['detailed_serious_adverse']); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        @endif

        @if(count($clinical_detail_val['detailed_other_adverse'])!="")
        <div class="col-md-6">

            <h4 class="bold no-margin text-black">Other Adverse Events</h4>



            <div class="panel-group" id="accordion3" data-toggle="collapse">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a class="collapsed text-black" data-toggle="collapse" data-parent="#accordion3" href="#collapseOneOther">
                                Other Adverse Events
                            </a>
                        </h4>
                    </div>
                    <div id="collapseOneOther" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="scroller scrollbar-hidden" data-height="400px">
                                <?php echo preg_replace("/&Acirc;/i", "", $clinical_detail_val['detailed_other_adverse']); ?> 
                            </div>
                        </div>
                    </div>
                </div>


            </div>







        </div>

    </div>

</div>

<hr class="no-margin b-transparent border-width-t">
@endif
@endforeach
@endsection

