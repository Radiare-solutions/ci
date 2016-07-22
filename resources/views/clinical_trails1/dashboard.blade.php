@extends('layouts.clinical_dashboard',array
(
'statusData' => json_encode($statusData['details']),
'phaseData' => json_encode($phaseData),
'estimatedCompletionData' => json_encode($estimatedCompletionData),
'drugData' => json_encode($drugData),
'conditionData' => json_encode($conditionData),
'sponsorData' => json_encode($sponsorData)        
)
)
<?php
//echo json_encode($phaseData);
?>
@section('content')

<div class="page-title no-margin"> <a href="home.html"> <i class="icon-custom-left"></i></a>
    <h3 class="no-margin p-t-10 p-b-5"><span class="bold" style="color:#FF891F;">Clinical Research </span></h3>
</div>
<hr class="no-margin b-transparent">
<div class="row column-seperation">
    <div class="col-md-4">
        <?php
            echo View::make('clinical_trials\dashboard_statusPartial', array('totalStatusRecords' => $statusData['totalStatusRecords']))->render();
        ?>
    </div>

    <div class="col-md-4">
        <?php
            echo View::make('clinical_trials\dashboard_phasePartial', array('phaseTop' => $phaseTop))->render();
        ?>

    </div>
    <div class="col-md-4">
        <?php
            echo View::make('clinical_trials\dashboard_estimatedCompletionPartial',array('totalRecords' => $statusData['totalStatusRecords']))->render();
        ?>
    </div>
</div>
<hr class="no-margin">
<div class="row column-seperation">
    <div class="col-md-4">
           <?php
            echo View::make('clinical_trials\dashboard_drugPartial', array('drugTotal' => $drugTotal))->render();
            ?>  
    </div>
    <div class="col-md-4  ">
        <?php
            echo View::make('clinical_trials\dashboard_conditionPartial', array('conditionTotal' => $conditionTotal))->render();
        ?> 
    </div>
    <div class="col-md-4">
         <?php
            echo View::make('clinical_trials\dashboard_sponsorPartial', array('sponsorTotal' => $sponsorTotal))->render();
            ?>
    </div>



</div>
@endsection