
@extends('layouts.clinical_trail', 
array(
'test' => 'hello world'
)
)

@section('content')
<section class="no-margin no-padding">
    <div class="section-body no-margin">


        <div class="card tabs-left  style-default-bright">















            <!-- BEGIN SEARCH BAR -->
            <div class="card-body  no-y-padding col-md-12  style-accent">


                <!-- 							<div class="card-head style-default-light">
                                                <div class="tools pull-right">
                                                        <form role="search" class="navbar-search">
                                                                <div class="form-group">
                                                                        <input type="text" placeholder="Enter your keyword" name="contactSearch" class="form-control">
                                                                </div>
                                                                <button class="btn btn-icon-toggle ink-reaction" type="submit"><i class="fa fa-search"></i></button>
                                                        </form>
                                                </div>
                                                <div class="tools pull-left">
                                                        <a href="index.html" class="btn btn-flat btn-primary hidden-xs"><span class="glyphicon glyphicon-arrow-left"></span> &nbsp;Back to Dashboard</a>
                                                </div>
                                        </div> 
                -->
                <div class="col-md-2">
                    <div class="tools pull-left small-padding">
                        <a href="index.html" class="btn btn-flat hidden-xs"><span class="glyphicon glyphicon-arrow-left"></span> &nbsp;Back to Dashboard</a>
                    </div>

                </div>

                <form class="form form-inverse col-md-10 ">
                    <div class="form-group small-padding no-margin">
                        <div class="input-group input-group-lg">
                            <div class="input-group-content no-padding">
                                <input type="text" class="form-control" id="searchInput" placeholder="Enter your search here">
                                <div class="form-control-line"></div>
                            </div>
                            <div class="input-group-btn">
                                <button class="btn btn-floating-action btn-default-bright" type="button"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>












            <ul class="card-head nav nav-tabs tabs-accent  " data-toggle="tabs" >
                <!-- <h1 class="no-y-padding">Category</h1> -->
                <h4 class="text-xl text-normal small-padding">Category</h4>

                <li class="active"><a href="#web1">Study Status</a></li>
                <li ><a href="#web2">Phase</a></li>
                <li><a href="#web1">Drug</a></li>
                <li><a href="#web1">Condition</a></li>
                <li><a href="#web5">Sponsor</a></li>
            </ul> 


            <form name="filter_data" id="filter_data">
            <div class="col-sm-3 no-padding tab-content ">
                <div class="tab-pane active" id="web1">
                    <div class="small-padding ">
                        <h4 class="text-normal text-xl">Study Status</h4>
                        <ul class="nav nav-pills nav-stacked nav-transparent">
                            <li>
                                <div class="checkbox checkbox-styled tile-text">
                                    <label>
                                        <input type="checkbox" checked>
                                        <span>
                                            Completed
                                        </span>
                                    </label>
                                    <span class="badge pull-right">155</span>
                                </div>
                            </li>
                            <li>
                                <div class="checkbox checkbox-styled tile-text">
                                    <label>
                                        <input type="checkbox">
                                        <span>
                                            Terminated
                                        </span>
                                    </label>
                                    <span class="badge pull-right">45</span>
                                </div>
                            </li>
                            <li>
                                <div class="checkbox checkbox-styled tile-text">
                                    <label>
                                        <input type="checkbox">
                                        <span>
                                            Recruiting
                                        </span>
                                    </label>
                                    <span class="badge pull-right">20</span>
                                </div>
                            </li>
                            <li>
                                <div class="checkbox checkbox-styled tile-text">
                                    <label>
                                        <input type="checkbox">
                                        <span>
                                            Unknown
                                        </span>
                                    </label>
                                    <span class="badge pull-right">48</span>
                                </div>
                            </li>
                            <li>
                                <div class="checkbox checkbox-styled tile-text">
                                    <label>
                                        <input type="checkbox">
                                        <span>
                                            Active, not recruiting
                                        </span>
                                    </label>
                                    <span class="badge pull-right">56</span>
                                </div>
                            </li>
                            <li>
                                <div class="checkbox checkbox-styled tile-text">
                                    <label>
                                        <input type="checkbox">
                                        <span>
                                            Not yet recruiting
                                        </span>
                                    </label>
                                    <span class="badge pull-right">88</span>
                                </div>
                            </li>
                            <li>
                                <div class="checkbox checkbox-styled tile-text">
                                    <label>
                                        <input type="checkbox">
                                        <span>
                                            Enrolling by invitation
                                        </span>
                                    </label>
                                    <span class="badge pull-right">78</span>
                                </div>
                            </li>
                            <li>
                                <div class="checkbox checkbox-styled tile-text">
                                    <label>
                                        <input type="checkbox">
                                        <span>
                                            Withdrawn
                                        </span>
                                    </label>
                                    <span class="badge pull-right">20</span>
                                </div>
                            </li>
                            <li>
                                <div class="checkbox checkbox-styled tile-text">
                                    <label>
                                        <input type="checkbox">
                                        <span>
                                            Approved for marketing
                                        </span>
                                    </label>
                                    <span class="badge pull-right">66</span>
                                </div>
                            </li>
                            <li>
                                <div class="checkbox checkbox-styled tile-text">
                                    <label>
                                        <input type="checkbox">
                                        <span>
                                            Suspended
                                        </span>
                                    </label>
                                    <span class="badge pull-right">20</span>
                                </div>
                            </li>
                        </ul>


                    </div>
                </div>


                <div class="tab-pane" id="web2">
                    <div class="small-padding  ">
                        <h4 class="text-normal text-xl">Study Phase</h4>
                        <ul class="nav nav-pills nav-stacked nav-transparent">
                            <li>
                                <div class="checkbox checkbox-styled tile-text">
                                    <label>
                                        <input type="checkbox" checked>
                                        <span>
                                            Phase 1
                                        </span>
                                    </label>
                                    <span class="badge pull-right">155</span>
                                </div>
                            </li>
                            <li>
                                <div class="checkbox checkbox-styled tile-text">
                                    <label>
                                        <input type="checkbox">
                                        <span>
                                            Phase 2
                                        </span>
                                    </label>
                                    <span class="badge pull-right">45</span>
                                </div>
                            </li>
                            <li>
                                <div class="checkbox checkbox-styled tile-text">
                                    <label>
                                        <input type="checkbox">
                                        <span>
                                            Phase 3
                                        </span>
                                    </label>
                                    <span class="badge pull-right">20</span>
                                </div>
                            </li>
                            <li>
                                <div class="checkbox checkbox-styled tile-text">
                                    <label>
                                        <input type="checkbox">
                                        <span>
                                            Phase 4
                                        </span>
                                    </label>
                                    <span class="badge pull-right">48</span>
                                </div>
                            </li>
                            <li>
                                <div class="checkbox checkbox-styled tile-text">
                                    <label>
                                        <input type="checkbox">
                                        <span>
                                            Phase 5
                                        </span>
                                    </label>
                                    <span class="badge pull-right">56</span>
                                </div>
                            </li>										
                        </ul>


                    </div>
                </div>
                
                                <div class="tab-pane" id="web5">
                    <div class="small-padding  ">
                        <h4 class="text-normal text-xl"></h4>
                        <ul class="nav nav-pills nav-stacked nav-transparent">
                            <?php
                            foreach($sponsorData as $sponsor_data) {
                            ?>
                            <li>
                                <div class="checkbox checkbox-styled tile-text">
                                    <label>
                                        <input type="checkbox" value="<?php echo $sponsor_data['id'];?>" name="sponsor[]" id="sponsor" onclick="load_studies_by_filter('sponsor', 0, 'clinical_trial', 'asc');">
                                        <span>
                                            <?php echo $sponsor_data['sponsor_name'];?>
                                        </span>
                                    </label>
                                    <span class="badge pull-right"><?php echo $sponsor_data['total'];?></span>
                                </div>
                            </li>
                            <?php } ?>								
                        </ul>
                    </div>
                </div>
                
            </div>
        </form>

<input type="hidden" name="page" id="page" value="0">
<input type="hidden" name="field" id="field" value="clinical_name">
<input type="hidden" name="order" id="order" value="asc">
            <!-- BEGIN TAB CONTENT -->
            <div class="card-body tab-content style-default-bright" style="border-left:1px solid #C4C4C4;">
                <div class="">
                    <div class="row">
                        <div class="col-lg-12  no-padding">

                            <!-- BEGIN PAGE HEADER -->
                            <div class="margin-bottom-xxl">
                                <span class="text-light text-lg">Search results: <strong id="total">0</strong></span>
                                <div class="btn-group btn-group-sm pull-right">
                                    <button type="button" class="btn btn-default-light dropdown-toggle" data-toggle="dropdown">
                                        <span class="glyphicon glyphicon-arrow-down"></span> Sort
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-right animation-dock" role="menu">
                                        <li class="active"><a href="#">Date asc</a></li>
                                        <li><a href="#">Date desc</a></li>
                                        <li><a href="javascript:void(0);" onclick="sort_result_pager('clinical_title', 'asc');">Title asc</a></li>
                                        <li><a href="javascript:void(0);" onclick="sort_result_pager('clinical_title', 'desc');">Title desc</a></li>
                                    </ul>
                                </div>
                            </div><!--end .margin-bottom-xxl -->
                            <!-- END PAGE HEADER -->

                            <!-- BEGIN RESULT LIST -->
                            <div class="list-results list-results-underlined">
                                
                            </div><!--end .list-results -->
                            <!-- END RESULTS LIST -->

                            <!-- BEGIN PAGING -->
<!--                            <ul class="pagination">
                                <li class="disabled"><a href="#">«</a></li>                                
                                <li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#">5</a></li>
                                <li><a href="#">»</a></li>
                            </ul>-->
                            <!-- END PAGING -->




                        </div><!--end .col -->
                    </div><!--end .row -->
                </div><!--end .tab-pane -->
            </div><!--end .card-body -->
            <!-- END TAB CONTENT -->

        </div><!--end .card -->
    </div><!--end .section-body -->
</section>
@endsection

