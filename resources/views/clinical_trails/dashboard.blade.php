@extends('layouts.clinical_trial_dashboard', array
    (
        'phaseData' => json_encode($phaseData),
        'sponsorData' => json_encode($sponsorData)        
    )
)
@section('content')
<!-- BEGIN BLANK SECTION -->
<section class="section-m">

    <div class="section-body">

        <div class="row" >
            <div class="col-md-4 no-padding ">
                <div class="card card-mb box-shadow b-radius-tl b-radius-tr b-radius-br b-radius-bl ">
                    <div class="row">
                        <div class="col-md-12 ">
                            <div class="card-head card-head-height style-accent-light  b-radius-tl b-radius-tr">
                                <header>Study Status</header>
                                <div class="tools">
                                    <a class="btn btn-icon-toggle"><i class="md md-cloud-download"></i></a>
                                </div>
                            </div>
                            <div class="card-body no-padding" style="height:201px;">


                                <div id="viz"></div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="card card-mb no-margin b-radius-br b-radius-bl ">
                                <div class="card-body no-padding">
                                    <div class="alert no-margin small-padding-s">
                                        <h2 class="pull-right text-xxl text-success no-margin"><i class="md fa-lg md-school"></i></h2>
                                        <strong class="text-xl">477</strong>
                                        <span class="text">Total Studies</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <?php
                echo View::make('clinical_trails\dashboard_phasePartial')->render();
            ?>

            <div class="col-md-4 no-padding">
                <div class="card card-mb box-shadow b-radius-tl b-radius-tr b-radius-br b-radius-bl ">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-head card-head-height style-accent-light  b-radius-tl b-radius-tr">
                                <header>Estimated Completion</header>
                                <div class="tools">
                                    <a class="btn btn-icon-toggle"><i class="md md-cloud-download"></i></a>
                                </div>
                            </div><!--end .card-head -->
                            <div class="card-body" style="padding:0px 10px;height:201px;">
                                <div id="morris-area-graph" class="height-5" data-colors="#0D4C78"></div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="card card-mb no-margin b-radius-br b-radius-bl ">
                                <div class="card-body no-padding">
                                    <div class="alert no-margin small-padding-s">
                                        <h2 class="pull-right text-xxl text-success no-margin"><i class="md fa-lg md-insert-chart"></i></h2>
                                        <strong class="text-xl">25</strong>
                                        <span class="text">Current Year studies</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>







            <div class="col-md-4 no-padding ">
                <div class="card card-mb box-shadow b-radius-tl b-radius-tr b-radius-br b-radius-bl ">
                    <div class="row">
                        <div class="col-md-12">

                            <div class="card-head card-head-height style-accent-light  b-radius-tl b-radius-tr">
                                <header>Drug</header>
                                <div class="tools">
                                    <a class="btn btn-icon-toggle"><i class="md md-cloud-download"></i></a>
                                </div>
                            </div><!--end .card-head -->
                            <div class="card-body no-padding" style="height:201px;">

                                <!-- <div class="bubbleChart height-5 style-gray-light"></div> -->

                                <div id="viz1"></div>


                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="card card-mb no-margin b-radius-br b-radius-bl ">
                                <div class="card-body no-padding">
                                    <div class="alert no-margin small-padding-s">
                                        <h2 class="pull-right text-xxl text-success no-margin"><i class="fa fa-lg fa-medkit"></i></h2>
                                        <strong class="text-xl">200</strong>
                                        <span class="text">Drug Types</span>
                                    </div>										
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>


            <div class="col-md-4 row-padding">
                <div class="card card-mb box-shadow b-radius-tl b-radius-tr b-radius-br b-radius-bl ">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-head card-head-height style-accent-light  b-radius-tl b-radius-tr">
                                <header>Condition</header>
                                <div class="tools">
                                    <a class="btn btn-icon-toggle"><i class="md md-cloud-download"></i></a>
                                </div>
                            </div><!--end .card-head -->
                            <!-- <div class="card-body no-padding" >
                                    <div id="tagcloud" class="height-5 small-padding">
                                    <a href="#" style="color:#4f649b !important;" rel="0.1">FDA</a>
                                    <a href="#" style="color:#000 !important;" rel="2">New Launch</a>
                                    <a href="#" rel="3">Clinical Trial</a>
                                    <a href="#" rel="4">Patent</a>
                                    <a href="#" rel="5">Corporate</a>
                                    <a href="#" rel="6">Adalimumab</a>
                                    <a href="#" rel="7">Brodalumab</a>
                                    <a href="#" rel="8">siplizumab</a>
                                    <a href="#" rel="5">Efalizumab</a>
                                    <a href="#" rel="7">Tildrakizumab</a>
                                    <a href="#" rel="3">Fezakinumab</a>
                                    <a href="#" rel="1">Guselkumab</a>
                                    <a href="#" rel="12">Ustekinumab</a>
                                </div>
                            </div> -->

                            <div id="condition" class="height-5"></div>
                        </div>
                        <div class="col-md-12">
                            <div class="card card-mb no-margin b-radius-br b-radius-bl ">
                                <div class="card-body no-padding">
                                    <div class="alert no-margin small-padding-s">
                                        <h2 class="pull-right text-xxl text-success no-margin"><i class="fa fa-lg fa-heartbeat"></i></h2>
                                        <strong class="text-xl">22</strong>
                                        <span class="text">Conditions</span>
                                    </div>										
                                </div>
                            </div>
                        </div>										
                    </div>
                </div>
            </div>






            <?php
                echo View::make('clinical_trails\dashboard_sponsorPartial')->render();
            ?>
            

        </div><!--end .row -->


    </div><!--end .section-body -->
</section>



@endsection