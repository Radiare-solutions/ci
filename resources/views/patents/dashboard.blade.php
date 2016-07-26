@extends('layouts.patents_dashboard')

@section('content')
<?php
$year = 2005;
$till = date('Y');
?>

<div class="page-title no-margin"> <a href="home.html"> <i class="icon-custom-left"></i></a>
    <h3 class="no-margin p-t-10 p-b-5"><span class="bold" style="color:#FF891F;">Patents</span></h3>
</div> 
<hr class="no-margin b-transparent">
<div class="row">
    <div class="col-md-12">
        <div class="col-md-8 no-padding b-r">
            <div class="grid simple no-margin" >
                <div class="grid-body " style="background:#0089D1 !important; padding:5px 10px !important;">
                    <div class="col-md-12">

                        <form class="form" name='patent_form' id='patent_form' action='ci_patents' method='post'>
                             <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                            <div class="col-md-3">
                                <div class="form-group no-margin">
                                    <label style="color:#fff !important; opacity :1 ; ">Year of Patent</label>
                                    <select name="year" data-placeholder="Select Year" id="year"  style="width:100%;background:#ffffff;">
                                        <option value="0">Year</option>
                                        <?php
                                        for ($i_year = $year; $i_year <= $till; $i_year++) {
                                            if ($yr == $i_year) {
                                                ?>
                                                <option value="<?php echo $i_year; ?>" selected><?php echo $i_year; ?></option> 
                                            <?php } else { ?>
                                                <option value="<?php echo $i_year; ?>"><?php echo $i_year; ?></option> 
                                            <?php
                                            }
                                        }
                                        ?>  
                                    </select>
                                </div>
                            </div>



                            <div class="col-md-7">
                                <div class="form-group no-margin">
                                    <label style="color:#fff !important; opacity :1 ;">Applicant</label>
                                    <select style="width:100%;background:#ffffff;" data-placeholder="Select applicant" multiple name="applicant[]" id="applicant">
                                        @foreach($applicant as $applicantVal)
                                        <?php if ($app == 0) { ?>
                                            <option value="{{ $applicantVal['applicant_id'] }}"> {{ $applicantVal['applicant_name'] }}</option>
                                        <?php } else {
                                            if (in_array($applicantVal['applicant_id'], $app)) {
                                                ?>
                                                <option value="{{ $applicantVal['applicant_id'] }}" selected>{{ $applicantVal['applicant_name'] }}</option>
                                            <?php } else { ?>
                                                <option value="{{ $applicantVal['applicant_id'] }}"> {{ $applicantVal['applicant_name'] }}</option>
                                                <?php }
                                            }
                                            ?>
                                        @endforeach
                                    </select>

                                </div>                        
                            </div>
                            <div class="col-md-2" style="padding-top:24px;">
                                <button class="btn btn-green btn-block " type="submit"><span class="pull-left"><i class="fa fa-search"></i></span>Search</button>

                            </div>
                        </form>






                    </div>
                </div>
            </div>
            <div id="patent_list_result">
                
            </div>

        </div>
        <div class="col-md-4 p-r-5 p-l-5">
            <div class="col-md-12 no-padding">
                <h4 class="text-black semi-bold">Patents By Filing</h4>
                <div id="bar-example" class=""  style="height:200px;"></div>
                <hr class="no-margin b-transparent">
            </div>

            <div class="col-md-12 no-padding">
                <h4 class="text-black semi-bold">Patents By Expiry</h4>
                <div id="area-example" class=""  style="height:200px;"></div>
            </div>
        </div>

    </div>

</div> 

@endsection