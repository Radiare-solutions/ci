<?php
    $detailSummary = $summaryData['attributes'];
?>
@extends('layouts.clinical_trail', 
            array(
                    'test' => 'hello world'
                )
        )

@section('content')

                <!-- BEGIN PROFILE HEADER -->
                <section class="full-bleed">
                    <div class="section-body no-y-padding ">
                        <!--<div class="img-backdrop" style="background-image: url('assets/img/img16.jpg')"></div>-->
                        <!-- 	<div class="overlay overlay-shade-top stick-top-left height-3"></div> -->
                        <div class="row">
                            <div class="col-md-9 col-xs-12">
                                <h3><?php echo $detailSummary['clinical_title'];?></h3>
                            </div><!--end .col -->
                            <div class="col-md-2 col-xs-8 small-padding">

                                <div class="card-actionbar-row pull-right ">
                                    <a class="width-1 btn btn-icon-toggle btn-white ink-reaction pull-left" href="#"><i class="fa fa-lg fa-chevron-left"></i></a>
                                    <a class="width-1 btn btn-icon-toggle btn-white ink-reaction pull-left" href="results-text.html"><i class="fa fa-lg fa-th-large"></i></a>

                                    <a class="width-1 btn btn-icon-toggle btn-white ink-reaction pull-left" href="#"><i class="fa fa-lg fa-chevron-right"></i></a>

                                </div>



                            </div><!--end .col -->

                            <div class="col-md-1 col-xs-4">
                                <a class="btn ink-reaction btn-floating-action btn-lg btn-accent" href="dashboard-level.html" data-toggle="tooltip" data-placement="top" data-original-title="Deatiled Study">
                                    <i class="md md-find-in-page "></i>
                                </a>
                            </div>



                        </div><!--end .row -->



                    </div><!--end .section-body -->
                </section>
                <!-- END PROFILE HEADER  -->









                <!-- BEGIN PROFILE HEADER -->
                <section class="full-bleed">


                    <div class="col-md-6 no-padding ">
                        <div class="section-body col-md-12 style-default-dark text-shadow">
                            <div class="img-backdrop" style="background:#673AB7"></div>
                            <!-- <div class="overlay overlay-shade-top stick-top-left height-1"></div> -->
                            <div class="row ">

                                <div class="col-md-12 col-xs-12">

                                    <div class="col-md-4 text-center">
                                        <?php
                                            $sponsor = explode(" ", $verifyNames['sponsor_name']);
                                        ?>
                                        <strong class="text-xl" data-toggle="tooltip" data-placement="top" data-original-title="<?php echo $verifyNames['sponsor_name']; ?>" ><?php echo $sponsor[0];?></strong><br/>
                                        <span class="text">Sponsor</span>
                                    </div>
                                    <div class="col-md-4 text-center " >
                                        <strong class="text-xl"><?php echo $detailSummary['phase']; ?></strong><br/>
                                        <span class="text">Study Phase </span>
                                    </div>
                                    <?php
                                        $condition = explode(" ", $verifyNames['condition_name']);
                                    ?>
                                    <div class="col-md-4 text-center " >
                                        <strong class="text-xl" data-toggle="tooltip" data-placement="top" data-original-title="<?php echo $verifyNames['condition_name']; ?>" ><?php echo $condition[0];?></strong><br/>
                                        <span class="text">Condition</span>
                                    </div>



                                </div><!--end .col -->


                                <div class="col-md-12 col-xs-12">
                                    <hr style="border-top-color: rgba(255, 255, 255, 0.20);">
                                    <div class="col-md-4 text-center">
                                        <strong class="text-xl"><?php echo $detailSummary['study_type'];?></strong><br/>
                                        <span class="text">Study Type</span>
                                    </div>
                                    <div class="col-md-4 text-center">
                                        <strong class="text-xl"><?php echo $detailSummary['enrollment'];?></strong><br/>
                                        <span class="text">Enrollment</span>
                                    </div>
                                    <div class="col-md-4 text-center">
                                        <strong class="text-xl"><?php echo $verifyNames['status_name'];?></strong><br/>
                                        <span class="text">Status</span>
                                    </div>





                                </div><!--end .col -->

                                <div class="col-md-12 col-xs-12">
                                    <hr style="border-top-color: rgba(255, 255, 255, 0.20);">
                                    <div class="col-md-4 text-center pull-right">
                                        <strong class="text-lg"><?php echo ViewHelper::convertTimeToClinicalTrialDate($detailSummary['study_completion_date']); ?></strong><br/>
                                        <span class="text">Completion </span>
                                    </div>
                                    <div class="col-md-4 text-center pull-right">
                                        <strong class="text-lg"><?php echo ViewHelper::convertTimeToClinicalTrialDate($detailSummary['primary_completion_date']); ?></strong><br/>
                                        <span class="text">Primary Completion </span>
                                    </div>

                                    <div class="col-md-4 text-center pull-right">
                                        <strong class="text-lg"><?php echo ViewHelper::convertTimeToClinicalTrialDate($detailSummary['study_start_date']); ?></strong><br/>
                                        <span class="text">Start </span>
                                    </div>

                                </div><!--end .col -->

                            </div><!--end .row -->


                        </div><!--end .section-body -->


                        <div class="col-md-12 no-padding">
                            <div class="card no-margin">

                                <div class="card-body no-padding">
                                    <ul class="list divider-full-bleed">
                                        <li class="tile">
                                            <a class="tile-content ink-reaction">
                                                <div class="tile-text text-medium">														
                                                    Brief Summary
                                                    <p class="text-light text-xs no-margin">
                                                        <?php echo ViewHelper::displayRevisedText($detailSummary['brief_summary']); ?>
                                                    </p>
                                                </div>

                                            </a>
                                        </li>
                                        <li class="tile">
                                            <a class="tile-content ink-reaction">
                                                <div class="tile-text text-medium">	
                                                    Intervention
                                                    <p class="text-light text-xs no-margin">
                                                         <?php echo ViewHelper::displayRevisedText($detailSummary['intervention']); ?>
                                                    </p>
                                                </div>

                                            </a>
                                        </li>
                                        <li class="tile">
                                            <a class="tile-content ink-reaction">
                                                <div class="tile-text text-medium">
                                                    Study Design
                                                    <p class="text-light text-xs no-margin">
                                                         <?php echo ViewHelper::displayRevisedText($detailSummary['study_design']); ?>
                                                    </p>
                                                </div>

                                            </a>
                                        </li>
                                        <li class="tile">
                                            <a class="tile-content ink-reaction">
                                                <div class="tile-text text-medium">
                                                    Primary Outcome Measure
                                                    <p class="text-light text-xs no-margin">
                                                        <?php echo ViewHelper::displayRevisedText($detailSummary['primary_measure_def']);?>
                                                    </p>
                                                </div>

                                            </a>
                                        </li>
                                    </ul>
                                </div>




                                <!-- <div class="card-body">
                                        <div class="col-md-12">
                                                <h3 class="text-medium no-margin padding-s">Brief Summary </h3>
                                                <p class="no-margin">To evaluate the potential of adalimumab to inhibit radiographic progression in joint destruction compared with placebo in adult </p>

                                                <hr class="ruler-sm">
                                        </div>



                                        <div class="col-md-6" >
                                                <h3 class="text-medium no-margin padding-s">Intervention</h3>
                                                <p class="no-margin">Biological: Double-blind adalimumab<br/>
                                                        Drug: Double-blind Placebo</p>
                                                
                                                
                                        </div>
                                        <div class="col-md-6">
                                                <h3 class="text-medium no-margin padding-s">Study Design</h3>
                                                        <p class="no-margin">Allocation: Randomized<br/>
                                                                                Endpoint Classification: Safety/Efficacy Study
                                                                                </p>
                                        
                                                
                                        </div>
                                        <div class="col-md-12">
                                                <hr class="ruler-sm">
                                                <h3 class="text-medium no-margin padding-s">Brief Summary</h3>
                                                <p class="no-margin">To evaluate the potential of adalimumab to inhibit radiographic progression in joint destruction compared with placebo in adult </p>
                                        </div>

                                </div> -->
                            </div>
                        </div>



                    </div>


                    <div class="col-md-6 no-padding">

                        <div class="card card-underline" style="margin-bottom:0;">
                            <div class="card-head">
                                <header class="text-xxl text-regular">Study Results</header>

                            </div>




                            <!-- 
                            <div class="nano has-scrollbar" style="height: 240px;">
                                    <div class="nano-content" tabindex="0" style="right: -17px;">
                                            <div class="card-body height-6 scroll style-default-bright" style="height: auto;">
                                                                                                            
                                            </div>
                                    </div>
                                    <div class="nano-pane">
                                            <div class="nano-slider" style="height: 113px; transform: translate(0px, 0px);"></div>
                                    </div>
                            </div>
                            
                            -->














                            <div class="card-body no-padding">
                                <div class="col-md-12  height-7">
                                    <div class="card-head ">

                                        <h4>Primary Outcome Measure</h4>

                                    </div>



                                    <div class="nano has-scrollbar" style="height: 240px;">
                                        <div class="nano-content" tabindex="0" style="right: -17px;">
                                            <div class="card-body height-6 scroll style-default-bright no-padding" style="height: auto;">
                                                <span class="header3">Statistical Analysis 1 for Change From Baseline in Modified Total Sharp X-Ray Score at Week 26</span>
                                                <div class="col-md-6">
                                                    <?php echo $detailSummary['primary_measure_value']; ?>


                                                </div>


                                                <div class="col-md-6 no-padding">
                                                    <h6 class="text-bold">Additional information </h6>
                                                    <div class="text-caption holder">
                                                        <ul class="text-caption">
                                                            <li>No Text Entered</li>
                                                            <li>No Text Entered</li>
                                                            <li>No Text Entered</li>
                                                        </ul>
                                                    </div>
                                                </div>





                                            </div>
                                        </div>
                                        <div class="nano-pane">
                                            <div class="nano-slider" style="height: 113px; transform: translate(0px, 0px);"></div>
                                        </div>
                                    </div>

















                                </div>







                                <div class="col-md-6 no-padding">



                                    <div class="card no-margin">
                                        <div class="card-body small-y-padding">


                                            <h4>Serious Adverse Events</h4>

                                            <div id="morris-bar-graph" class="height-4" data-colors="#9C27B0,#2196F3,#0aa89e"></div>
                                        </div>
                                    </div>


                                </div>	
                                <div class="col-md-6 no-padding">


                                    <div class="card no-margin">
                                        <div class="card-body small-y-padding">
                                            <h4>Other Adverse Events</h4>


                                            <div id="morris-bar-graph1" class="height-4" data-colors="#9C27B0,#2196F3,#0aa89e"></div>
                                        </div>
                                    </div>


                                </div>			
                            </div>
                        </div>


                    </div>

               </section>
                @endsection

            