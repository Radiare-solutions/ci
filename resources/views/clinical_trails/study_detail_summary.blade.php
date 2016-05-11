@extends('layouts.clinical_detail_view')
@section('content')
@foreach ($clinical_content as $detail)
                <!-- BEGIN CONTENT-->
                <div id="content">

                        <!-- BEGIN PROFILE HEADER -->
                        <section class="full-bleed">
                                <div class="section-body no-y-padding">
                                        <!--<div class="img-backdrop" style="background-image: url('assets/img/img16.jpg')"></div>-->
                                        <!-- <div class="overlay overlay-shade-top stick-top-left height-3"></div> -->
                                        <div class="row">
                                                <div class="col-md-12 col-xs-12 no-padding">
                                                        <div class="col-md-8 col-xs-8">
                                                                <h3 class="text-normal"><?php echo $detail['clinical_title']; ?></h3>
                                                        </div><!--end .col -->
                                                        <div class="col-md-4 col-xs-4">
                                                                <div class="card-actionbar-row pull-right small-padding">
                                                                        <a class="width-1 btn btn-icon-toggle btn-white ink-reaction pull-left" href="study-summary.html"><i class="fa fa-lg fa-reply"></i></a>
                                                                        <a class="width-1 btn btn-icon-toggle btn-danger ink-reaction pull-left" href="javascript:void(0);"><i class="fa fa-lg fa-heart"></i></a>
                                                                        <a class="width-1 btn btn-icon-toggle btn-white ink-reaction pull-left" href="javascript:void(0);"><i class="fa fa-lg fa-ellipsis-v "></i></a>

                                                                </div>
                                                        </div>
                                                </div>	
                                        </div><!--end .row -->


                                </div><!--end .section-body -->
                        </section>
                        <!-- END PROFILE HEADER  -->





                        <section class="full-bleed">
                                <div class="section-body card small-padding no-margin style-accent">
                                        <div class="row">


                                                <div class="col-md-12 col-xs-12">

                                                        <div class="col-md-12 text-left pull-right">
                                                                <strong class="text-lg">Official Title : </strong>
                                                                <span class="text"> <?php echo $detail['official_title']; ?></span>
                                                        </div>

                                                </div><!--end .col -->

                                                <div class="col-md-12 col-xs-12">
                                                        <hr class="ruler-lg">
                                                        <div class="col-md-3 text-center pull-right">
                                                                <strong class="text-lg">Enrollment</strong><br/>
                                                                <span class="text"> <?php echo $detail['enrollment']; ?></span>
                                                        </div>
                                                        <div class="col-md-3 text-center pull-right">
                                                                <strong class="text-lg">Study Type</strong><br/>
                                                                <span class="text"><?php echo $detail['study_type']; ?></span>
                                                        </div>
                                                        <div class="col-md-3 text-center pull-right">
                                                                <strong class="text-lg">Study Phase </strong><br/>
                                                                <span class="text"><?php echo $detail['phase']; ?></span>
                                                        </div>

                                                        <div class="col-md-3 text-center pull-right">
                                                                <strong class="text-lg">Condition </strong><br/>
                                                                
                                                            <?php 
                                                            if(str_word_count($detail['condition_name'])>2){ 
                                                              $explode_word=explode(" ",$detail['condition_name']);
                                                              echo '<span class="text" data-original-title="'.$detail['condition_name'].'" data-placement="top" data-toggle="tooltip">'.$explode_word[0]." ".$explode_word[1].'</span>';
                                                            }else{ 
                                                             echo '<span class="text">'.$detail['condition_name'].'</span>'; 
                                                            }
                                                          ?>
                                                                     
                                                        </div>


                                                </div><!--end .col -->
                                                <div class="col-md-12 col-xs-12">
                                                        <hr class="ruler-lg">

                                                        <div class="col-md-3 text-center pull-right">
                                                                <strong class="text-lg">Study Start Date</strong><br/>
                                                                <span class="text"><?php echo $detail['study_start_date']; ?>
                                                                </span>
                                                        </div>
                                                        <div class="col-md-3 text-center pull-right">
                                                                <strong class="text-lg">Study Completion Date</strong><br/>
                                                                <span class="text"><?php echo $detail['study_completion_date']; ?></span>
                                                        </div>
                                                        <div class="col-md-3 text-center pull-right">
                                                          <strong class="text-lg">Sponsor</strong><br/>
                                                                <?php 
                                                            if(str_word_count($detail['sponsor_name'])>2){ 
                                                              $explode_word=explode(" ",$detail['sponsor_name']);
                                                              echo '<span class="text" data-original-title="'.$detail['condition_name'].'" data-placement="top" data-toggle="tooltip">'.$explode_word[0]." ".$explode_word[1].'</span>';
                                                            }else{ 
                                                             echo '<span class="text">'.$detail['sponsor_name'].'</span>'; 
                                                            }
                                                          ?>
                                                             
                                                        </div>

                                                        <div class="col-md-3 text-center pull-right">
                                                            <strong class="text-lg">Collaborator</strong><br/>
                                                            <?php 
                                                            if( ($detail['collaborator'])>2){ 
                                                              $explode_word=explode(" ",$detail['collaborator']);
                                                              echo '<span class="text" data-original-title="'.$detail['collaborator'].'" data-placement="top" data-toggle="tooltip">'.$explode_word[0]." ".$explode_word[1].'</span>';
                                                            }else{ 
                                                             echo '<span class="text">'.$detail['collaborator'].'</span>'; 
                                                            }
                                                          ?>
                                                        </div>

                                                </div><!--end .col -->
                                                <div class="col-md-12 col-xs-12">
                                                        <hr  class="ruler-lg">

                                                        <div class="col-md-3 text-center pull-right">
                                                                <strong class="text-lg">First Received Date</strong><br/>
                                                                <span class="text"><?php echo $detail['first_received_date']; ?></span>
                                                        </div>
                                                        <div class="col-md-3 text-center pull-right">
                                                                <strong class="text-lg">Last Updated Date</strong><br/>
                                                                <span class="text"><?php echo $detail['last_updated_date']; ?></span>
                                                        </div>

                                                        <div class="col-md-3 text-center pull-right">
                                                                <strong class="text-lg">Verification Date </strong><br/>
                                                                <span class="text"><?php echo $detail['last_verified_date']; ?></span>
                                                        </div>
                                                        <div class="col-md-3 text-center pull-right">
                                                                <strong class="text-lg">Primary Completion Date</strong><br/>
                                                                <span class="text"><?php echo $detail['primary_completion_date']; ?></span>
                                                        </div>
                                                </div><!--end .col -->
                                        </div><!--end .row -->


                                </div><!--end .section-body -->
                        </section>









                        <section class="no-y-padding">
                                <div class="section-body no-margin">
                                        <div class="row">
                                                <div class="col-lg-12">
                                                        <h4 class="text-xl text-normal">Brief Summary</h4>
                                                </div><!--end .col -->

                                                <div class="col-md-12">
                                                        <div class="card no-margin">
                                                                <div class="card-body">
                                                                        <?php echo $detail['brief_summary']; ?>
                                                                </div><!--end .card-body -->
                                                        </div><!--end .card -->

                                                </div><!--end .col -->
                                        </div><!--end .row -->
                                        <div class="row">
                                                <div class="col-lg-12">
                                                        <h4 class="text-xl text-normal">Intervention Details</h4>
                                                </div><!--end .col -->

                                                <div class="col-md-12">
                                                        <div class="card no-margin">
                                                                <div class="card-body">
                                                                        <ul style="margin:0ex 1em; padding:0ex 0em">
 <?php echo $detail['detailed_intervention']; ?>
</ul>
                                                                </div><!--end .card-body -->
                                                        </div><!--end .card -->

                                                </div><!--end .col -->
                                        </div><!--end .row -->
                                        <div class="row">
                                                <div class="col-lg-12">
                                                        <h4 class="text-xl text-normal">Detailed Description </h4>
                                                </div><!--end .col -->

                                                <div class="col-md-12">
                                                        <div class="card no-margin">
                                                                <div class="card-body">
                                                                        <?php echo $detail['detailed_desc']; ?>
                                                                </div><!--end .card-body -->
                                                        </div><!--end .card -->

                                                </div><!--end .col -->
                                        </div><!--end .row -->
                                        <div class="row">
                                                <div class="col-lg-12">
                                                        <h4 class="text-xl text-normal">Study Design</h4>
                                                </div><!--end .col -->

                                                <div class="col-md-12">
                                                        <div class="card no-margin">
                                                                <div class="card-body">
                                                                        <td valign="top" class="body3"> 
                                                                        <?php 
                                                                        echo $detail['study_design'];
                                                                        ?></td>

                                                                </div><!--end .card-body -->
                                                        </div><!--end .card -->

                                                </div><!--end .col -->
                                        </div><!--end .row -->
                                        <div class="row">
                                                <div class="col-lg-12">
                                                        <h4 class="text-xl text-normal">Recruitment Information</h4>
                                                </div><!--end .col -->

                                                <div class="col-md-12">
                                                        <div class="card no-margin">
                                                                <div class="card-body">
                                                                    <table class="table table-bordered no-margin">
                                                                        <tr>
                                                                            <td><b>Recruitment Status</b></td>  
                                                                            <td><?php echo $detail['status_name']; ?></td>
                                                                        </tr>
                                                                         <tr>
                                                                            <td><b>Eligibility Criteria</b></td>  
                                                                            <td><?php echo $detail['eligibility_criteria'] ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><b>Gender</b></td>  
                                                                            <td><?php echo $detail['eligibility_gender'] ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><b>Ages</b></td>  
                                                                            <td><?php echo $detail['age'] ?></td>
                                                                        </tr>
                                                                          <tr>
                                                                            <td><b>Accepts Healthy Volunteers</b></td>  
                                                                            <td><?php echo $detail['healthy_volunteers'] ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><b>Listed Location Countries</b></td>  
                                                                            <td><?php echo $detail['location_country'] ?></td>
                                                                        </tr>
                                                                    </table>

                                                                </div><!--end .card-body -->
                                                        </div><!--end .card -->

                                                </div><!--end .col -->
                                        </div><!--end .row -->
                                        <?php if($detail['detailed_outcome_measure']!=""){ ?>
                                        <div class="row">
                                                <div class="col-lg-12">
                                                        <h4 class="text-xl text-normal">Outcome Measures</h4>
                                                </div><!--end .col -->

                                                <div class="col-md-12">
                                                        <div class="panel-group no-margin" id="accordion7">

                                                                <div class="card card-underline panel">
                                                                        <div class="card-head collapsed" data-toggle="collapse" data-parent="#accordion7" data-target="#accordion7-1">

                                                                                <ul class="list">
                                                                                        <li class="tile">
                                                                                                        <h4 class="text-normal  no-y-padding">
                                                                                                               Primary & Secondary Outcome Measures

                                                                                                        </h4>
                                                                                                <a class="btn btn-flat"><i class="fa fa-plus"></i></a>
                                                                                        </li>											
                                                                                </ul>
                                                                        </div>
                                                                        <div id="accordion7-1" class="collapse">
                                                                            <div class="card-body">
                                                                              <?php 
                                                                              $replace_outcome=  preg_replace('/Outcome Measures|Hide All/i', "", preg_replace("/&Acirc;/i","",$detail['detailed_outcome_measure']));
                                                                              $remove_div=preg_replace('~<div>(.*?)</div>~is', '$1', $replace_outcome, /* limit */ 1);
                                                                              $rmv_span=preg_replace('~<span>(.*?)</span>~is', '$1', preg_replace('/<a[^>]*><\\/a[^>]*>/', '', $remove_div), /* limit */ 1);
                                                                              $rmv_br=preg_replace('~<br>~i', '', preg_replace('~<img>~i', '$1', $rmv_span,1),1);
                                                                              echo $rmv_br;
                                                                              
                                                                              ?>
                                                                            </div>
                                                                        </div>
                                                                </div><!--end .panel -->
                                                        </div><!--end .panel-group -->

                                                </div><!--end .col -->
                                        </div><!--end .row -->

                                        <?php }else if($detail['detailed_outcome_measure']==""){ ?>
                                        <div class="row">
                                                <div class="col-lg-12">
                                                        <h4 class="text-xl text-normal">Current Primary Outcome Measures</h4>
                                                </div><!--end .col -->

                                               <div class="col-md-12">
                                                        <div class="card no-margin">
                                                                <div class="card-body">
                                                                                 <?php echo $detail['primary_measure_def'];  ?>
                                                                            </div>
                                                                        </div>
                                              </div><!--end .col -->
                                        </div><!--end .row -->
                                        
                                        <div class="row">
                                                <div class="col-lg-12">
                                                        <h4 class="text-xl text-normal">Current Secondary Outcome Measures</h4>
                                                </div><!--end .col -->

                                                <div class="col-md-12">
                                                        <div class="card no-margin">
                                                                <div class="card-body">
                                                                                 <?php echo $detail['secondary_measure_def'];  ?>
                                                                            </div>
                                                        </div>

                                                </div><!--end .col -->
                                        </div><!--end .row -->

                                        <?php }?>
                                        
                                        <?php if($detail['detailed_serious_adverse']!=""){ ?>
                                        <div class="row">
                                                <div class="col-lg-12">
                                                        <h4 class="text-xl text-normal">Serious Adverse Events</h4>
                                                </div><!--end .col -->

                                                <div class="col-md-12">
                                                        <div class="panel-group no-margin" id="accordion7">
                                                                <div class="card card-underline panel">
                                                                        <div class="card-head collapsed" data-toggle="collapse" data-parent="#accordion7" data-target="#accordion7-15">
                                                                                <ul class="list">
                                                                                        <li class="tile">
                                                                                                        <h4 class="text-normal no-y-padding">
                                                                                                        Serious Adverse Events

                                                                                                        </h4>
                                                                                                <a class="btn btn-flat"><i class="fa fa-plus"></i></a>
                                                                                        </li>											
                                                                                </ul>
                                                                        </div>
                                                                        <div id="accordion7-15" class="collapse">
                                                                            <div class="card-body">
                                                                                 <?php $remove_serious_div=preg_replace('~<div>(.*?)</div>~is', '$1', preg_replace("/&Acirc;/i","", $detail['detailed_serious_adverse']), /* limit */ 1); 
                                                                                       $rmv_br1=preg_replace('~<br>~i', '$1', preg_replace('~<img>~i', '', $remove_serious_div));
                                                                                       $rmv_span=preg_replace('~<span>(.*?)</span>~is', '$1', $rmv_br1, /* limit */ 1);
                                                                                       echo preg_replace('~Serious Adverse Events|Show Other Adverse Events|Other Adverse Events~i', '', $rmv_span);
                                                                                 ?>
                                                                            </div>
                                                                        </div>
                                                                </div><!--end .panel -->





                                                        </div><!--end .panel-group -->

                                                </div><!--end .col -->
                                        </div><!--end .row -->


                                        <?php }
                                        
                                        if($detail['detailed_other_adverse']!=""){ ?>
                                        <div class="row">
                                                <div class="col-lg-12">
                                                        <h4 class="text-xl text-normal">Other Adverse Events</h4>
                                                </div><!--end .col -->

                                                <div class="col-md-12">
                                                        <div class="panel-group" id="accordion7">


                                                                <div class="card card-underline panel">
                                                                        <div class="card-head collapsed" data-toggle="collapse" data-parent="#accordion7" data-target="#accordion7-16">

                                                                                <ul class="list">
                                                                                        <li class="tile">
                                                                                                        <h4 class="text-normal no-y-padding">
                                                                                                                Other Adverse Events

                                                                                                        </h4>
                                                                                                <a class="btn btn-flat"><i class="fa fa-plus"></i></a>
                                                                                        </li>											
                                                                                </ul>
                                                                        </div>
                                                                        <div id="accordion7-16" class="collapse">
                                                                                <div class="card-body">
                                                                                     <?php echo preg_replace("/&Acirc;/i","", $detail['detailed_other_adverse']); ?>
                                                                                </div>
                                                                        </div>
                                                                </div><!--end .panel -->
                                                        </div><!--end .panel-group -->

                                                </div><!--end .col -->
                                        </div><!--end .row -->

                                        <?php } ?>


                                        <div class="row">
                                                <div class="col-md-8">






                                                </div><!--end .col -->
                                                <!-- END MESSAGE ACTIVITY -->

                                                <!-- BEGIN PROFILE MENUBAR -->
                                                <div class="col-lg-offset-1 col-lg-3 col-md-4">

                                                </div><!--end .col -->
                                                <!-- END PROFILE MENUBAR -->

                                        </div><!--end .row -->
                                </div><!--end .section-body -->
                        </section>
                </div><!--end #content-->
                <!-- END CONTENT -->
@endforeach
@endsection