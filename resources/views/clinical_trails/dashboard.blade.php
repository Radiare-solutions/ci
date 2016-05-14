@extends('layouts.clinical_trial_dashboard', array
(
'statusData' => json_encode($statusData['details']),
'phaseData' => json_encode($phaseData),
'estimatedCompletionData' => json_encode($estimatedCompletionData),
'drugData' => json_encode($drugData),
'conditionData' => json_encode($conditionData),
'sponsorData' => json_encode($sponsorData)        
)
)
@section('content')
<!-- BEGIN BLANK SECTION -->
<section class="section-m">

    <div class="section-body">

        <div class="row" >
            <?php
            echo View::make('clinical_trails\dashboard_statusPartial')->render();
            ?>

            <?php
            echo View::make('clinical_trails\dashboard_phasePartial')->render();
            ?>

            <?php
            echo View::make('clinical_trails\dashboard_estimatedCompletionPartial')->render();
            ?>

            <?php
            echo View::make('clinical_trails\dashboard_drugPartial')->render();
            ?>  

            <?php
            echo View::make('clinical_trails\dashboard_conditionPartial')->render();
            ?>            

            <?php
            echo View::make('clinical_trails\dashboard_sponsorPartial')->render();
            ?>


        </div><!--end .row -->


    </div><!--end .section-body -->
</section>



@endsection