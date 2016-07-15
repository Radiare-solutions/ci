@extends('layouts.patents_dashboard')

@section('content')

<?php                                             
$year = 2005;
$till = date('Y');
?>
    <!-- BEGIN CONTENT-->
    <div id="content">
        <section class="no-margin no-padding">
            <div class="row">
                <div class="col-md-8 no-padding no-margin">
                    <div class="card no-margin">
                        <div class="card-body small-padding" style="background:#1a4dce;">

                            <form class="form" name='patent_form' id='patent_form' action='ci_patents' method='post'>
                                <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                                <div class="col-md-3">
                                    <div class="form-group no-margin">
                                        <select class="form-control select2-list btn ink-reaction btn-default-light" name="year" data-placeholder="Select Year" id="year">
                                            <option value="0">Year</option>
                                            <?php
                                        for($i_year=$year;$i_year<=$till;$i_year++)
                                        { if($yr==$i_year){ ?>
                                           <option value="<?php echo $i_year; ?>" selected><?php echo $i_year; ?></option> 
                                        <?php }else{ ?>
                                           <option value="<?php echo $i_year; ?>"><?php echo $i_year; ?></option> 
                                        <?php } 
                                        }
                                        ?>  
                                        </select>
                                        <label style="color:#fff !important; opacity :1 ; ">Year of Patent</label>
                                    </div>
                                </div>



                                <div class="col-md-7">
                                    <div class="form-group no-margin">
                                        <select class="form-control select2-list btn ink-reaction btn-default-light" name="applicant[]" id="applicant" data-placeholder="Select applicant" multiple >
                                            @foreach($applicant as $applicantVal)
                                            <?php if($app==0){ ?>
                                                <option value="{{ $applicantVal['applicant_id'] }}"> {{ $applicantVal['applicant_name'] }}</option>
                                            <?php }else{ 
                                                if(in_array($applicantVal['applicant_id'], $app)){ ?>
                                                    <option value="{{ $applicantVal['applicant_id'] }}" selected>{{ $applicantVal['applicant_name'] }}</option>
                                                <?php } else { ?>
                                                    <option value="{{ $applicantVal['applicant_id'] }}"> {{ $applicantVal['applicant_name'] }}</option>
                                            <?php } 
                                            } ?>
                                            @endforeach
                                        </select>
                                        <label style="color:#fff !important; opacity :1 ;">Applicant</label>
                                    </div>												
                                </div>
                                <div class="col-md-2" style="padding-top:16px;">
                                    <button class="btn btn-success btn-block" type="submit" id='search'><span class="pull-left"><i class="fa fa-search"></i></span>Search</button>
                                </div>
                            </form>






                        </div>
                    </div>




                    <div class="card no-margin">

                        <div class="card-body no-padding height-12 scroll style-default-bright" style="height:501px;">
                            <div class="card-body tab-content style-default-bright col-md-12" style="border-left:1px solid #C4C4C4;">
                                <div class="">
                                    <div class="row">
                                        <div class="col-lg-12  no-padding">
                                            
                                            <div id="patent_list_result"></div>
                                            
                                        </div><!--end .col -->
                                    </div><!--end .row -->
                                </div><!--end .tab-pane -->
                            </div><!--end .card-body -->
                        </div>
                    </div><!--end .card -->
                </div><!--end .col -->


                <div class="col-md-4 no-padding no-margin">
                    <div class="card card-mb card-underline no-padding no-margin ">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-head  card-head no-y-padding ">

                                    <header class="no-padding no-margin">Patents By Filed</header>
                                </div>
                                <div id="bar-example" class="height-6" ></div>
                            </div>
                        </div>
                    </div>

                    <div class="card card-mb card-underline no-padding no-margin ">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-head  card-head no-y-padding ">

                                    <header class="no-padding no-margin">Patents By Expiry </header>
                                </div>
                                <div id="area-example" class="height-6"></div>
                            </div>
                        </div>
                    </div>

                </div>


            </div><!--end .row -->
        </section>
    </div><!--end #content-->

    @endsection