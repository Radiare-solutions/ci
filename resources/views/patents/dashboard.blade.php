@extends('layouts.patents_dashboard')

@section('content')
<div id="base">

    <!-- BEGIN OFFCANVAS LEFT -->
    <div class="offcanvas">

        <!-- BEGIN OFFCANVAS DEMO LEFT -->
        <div id="offcanvas-demo-size4" class="offcanvas-pane width-12">
            <div class="offcanvas-head card-bordered style-accent">
                <header >Buffer formulations for enhanced antibody stability </header>
                <div class="offcanvas-tools">
                    <a class="btn btn-icon-toggle btn-default-light pull-right" data-dismiss="offcanvas">
                        <i class="md md-close"></i>
                    </a>
                </div>
            </div>
            <div class="offcanvas-body">
                <p class="text-bold">
                    Bibliographic Data: AU2014337263 (A1) ― 2016-04-28
                </p>
                <p><b>Inventor(s) :</b>CINI JOHN; NAGI ATHENA; TADDEI MARIA</p>
                <p><b>Applicant(s) :</b>ONCOBIOLOGICS INC</p>

                <p><b> International Classification :</b> A61K39/395 </p>
                <p><b> Cooperative Classification :</b> A61K39/39591; C07K16/241  </p>
                <p><b>Application Number :</b> 03/372,63</p>
                <p><b>Filed Date :</b> 2014-10-16  </p>
                <p><b>Abstract :</b>The invention provides buffered formulations of adalimumab. The formulations comprise a buffer comprising an acetate salt, mannitol, glacial acetic acid, sodium chloride, and polysorbate 80. The formulations have an acidic pH, and enhance the thermal, conformational and colloidal stability of antibodies, including the adalimumab antibody.
                </p>
            </div>
            <div class="force-padding stick-bottom-right">
                <a data-toggle="offcanvas" href="#" class="btn btn-icon-toggle btn-accent">
                    <i class="md md-arrow-back"></i>
                </a>
                <a class="btn btn-floating-action btn-accent " href="#offcanvas-demo-size2" data-toggle="offcanvas">
                    <i class="md md-arrow-forward"></i>
                </a>
            </div>
        </div>
        <!-- END OFFCANVAS DEMO LEFT -->

    </div><!--end .offcanvas-->
    <!-- END OFFCANVAS LEFT -->

    <!-- BEGIN CONTENT-->
    <div id="content">
        <section class="no-margin no-padding">
            <div class="row">
                <div class="col-md-8 no-padding no-margin">
                    <div class="card no-margin">
                        <div class="card-body small-padding" style="background:#1a4dce;">

                            <form class="form">
                                <div class="col-md-3">
                                    <div class="form-group no-margin">
                                        <select class="form-control select2-list btn ink-reaction btn-default-light" data-placeholder="Select Year" id="year">
                                            <option value="AK">Alaska</option>
                                            <option value="HI">Hawaii</option>

                                        </select>
                                        <label style="color:#fff !important; opacity :1 ; ">Year of Patent</label>
                                    </div>
                                </div>



                                <div class="col-md-7">
                                    <div class="form-group no-margin">
                                        <select class="form-control select2-list btn ink-reaction btn-default-light" data-placeholder="Select applicant" multiple>
                                            
                                            <option value="1">ONCOBIOLOGICS INC</option>
                                            <option value="2">COHERUS BIOSCIENCES INC</option>
                                            <option value="3">ABBVIE BIOTECHNOLOGY LTD</option>
                                            <option value="4">ABMAX BIOTECHNOLOGY CO LTD</option>
                                            <option value="5">ABBVIE INC</option>
                                            <option value="6">GLAXOSMITHKLINE IP DEV LTD</option>
                                            <option value="7">MEIJI SEIKA PHARMA CO LTD</option>
                                            <option value="8">GLAXO GROUP LTD</option>
                                            <option value="9">DONG A SOCIO HOLDINGS CO LTD</option>
                                            <option value="10">INTAS PHARMACEUTICALS LTD</option>
                                            <option value="11">RICHTER GEDEON NYRT</option>
                                            <option value="12">SHANGHAI MEDICILON INC</option>
                                        </select>
                                        <label style="color:#fff !important; opacity :1 ;">Applicant</label>
                                    </div>												
                                </div>
                                <div class="col-md-2" style="padding-top:24px;">
                                    <button class="btn btn-success btn-block " type="submit"><span class="pull-left"><i class="fa fa-search"></i></span>Search</button>

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

                                            <!-- BEGIN PAGE HEADER -->
                                            <div class="margin-bottom-xxl">
                                                <span class="text-light text-lg no-y-padding">Search results <strong>34</strong></span>

                                                <div class="btn-group btn-group-sm pull-right">
                                                    <button type="button" class="btn btn-default-light dropdown-toggle" data-toggle="dropdown">
                                                        <span class="glyphicon glyphicon-arrow-down"></span> Sort
                                                    </button>
                                                    <ul class="dropdown-menu dropdown-menu-right animation-dock" role="menu">
                                                        <li class="active"><a href="#">Date asc</a></li>
                                                        <li><a href="#">Date desc</a></li>
                                                        <li><a href="#">Title asc</a></li>
                                                        <li><a href="#">Title desc</a></li>
                                                    </ul>
                                                </div>
                                                <div class="btn-group btn-group-sm pull-right" style="margin-right:10px;">
                                                    <button type="button" class="btn btn-default-light dropdown-toggle" style="text-transform: none !important;" data-toggle="dropdown">
                                                        <span class="glyphicon glyphicon-arrow-down" ></span> No. of Records
                                                    </button>
                                                    <ul class="dropdown-menu dropdown-menu-right animation-dock" role="menu">
                                                        <li class="active"><a href="#">10</a></li>
                                                        <li><a href="#">20</a></li>
                                                        <li><a href="#">30</a></li>
                                                        <li><a href="#">50</a></li>
                                                        <li><a href="#">100</a></li>
                                                    </ul>
                                                </div>
                                            </div><!--end .margin-bottom-xxl -->
                                            <!-- END PAGE HEADER -->

                                            <!-- BEGIN RESULT LIST -->
                                            <div class="list-results list-results-underlined">
                                                <div class="col-xs-1 no-padding text-center">
                                                    <p class="text-medium text-lg text-black">1)</p>
                                                </div>
                                                <div class="col-xs-11 no-padding">
                                                    <p class="no-padding no-margin">
                                                        <a class="text-medium text-lg text-primary" href="#offcanvas-demo-size4" data-toggle="offcanvas">Buffer formulations for enhanced antibody stability </a><br/>
                                                    </p>
                                                    <div class="col-md-12">
                                                        <div class="col-md-3">
                                                            <b>Inventor: </b> <br/>CINI JOHN; NAGI ATHENA(+1) 
                                                        </div>
                                                        <div class="col-md-3">
                                                            <b>Applicant: </b> <br/> ONCOBIOLOGICS INC 
                                                        </div>

                                                        <div class="col-md-3">
                                                            <b>Publication info:</b> <br/> AU2014337263 (A1) 2016-04-28 
                                                        </div>
                                                        <div class="col-md-3">
                                                            <b>Priority date: </b> <br/> 2013-10-16 
                                                        </div>
                                                    </div>

                                                </div><!--end .col -->
                                                <div class="col-xs-1 no-padding text-center">
                                                    <p class="text-medium text-lg text-black">2)</p>
                                                </div>
                                                <div class="col-xs-11 no-padding">
                                                    <p class="no-padding no-margin">
                                                        <a class="text-medium text-lg text-primary" href="#offcanvas-demo-size4" data-toggle="offcanvas">Buffer formulations for enhanced antibody stability </a><br/>
                                                    </p>
                                                    <div class="col-md-12">
                                                        <div class="col-md-3">
                                                            <b>Inventor: </b> <br/>CINI JOHN; NAGI ATHENA(+1) 
                                                        </div>
                                                        <div class="col-md-3">
                                                            <b>Applicant: </b> <br/> ONCOBIOLOGICS INC 
                                                        </div>
                                                        <div class="col-md-3">
                                                            <b>Publication info:</b> <br/> AU2014337263 (A1) 2016-04-28 
                                                        </div>
                                                        <div class="col-md-3">
                                                            <b>Priority date: </b> <br/> 2013-10-16 
                                                        </div>
                                                    </div>

                                                </div><!--end .col -->
                                                <div class="col-xs-1 no-padding text-center">
                                                    <p class="text-medium text-lg text-black">3)</p>
                                                </div>
                                                <div class="col-xs-11 no-padding">
                                                    <p class="no-padding no-margin">
                                                        <a class="text-medium text-lg text-primary" href="#offcanvas-demo-size4" data-toggle="offcanvas">Buffer formulations for enhanced antibody stability </a><br/>
                                                    </p>
                                                    <div class="col-md-12">
                                                        <div class="col-md-3">
                                                            <b>Inventor: </b> <br/>CINI JOHN; NAGI ATHENA(+1) 
                                                        </div>
                                                        <div class="col-md-3">
                                                            <b>Applicant: </b> <br/> ONCOBIOLOGICS INC 
                                                        </div>

                                                        <div class="col-md-3">
                                                            <b>Publication info:</b> <br/> AU2014337263 (A1) 2016-04-28 
                                                        </div>
                                                        <div class="col-md-3">
                                                            <b>Priority date: </b> <br/> 2013-10-16 
                                                        </div>
                                                    </div>

                                                </div><!--end .col -->
                                                <div class="col-xs-1 no-padding text-center">
                                                    <p class="text-medium text-lg text-black">4)</p>
                                                </div>
                                                <div class="col-xs-11 no-padding">
                                                    <p class="no-padding no-margin">
                                                        <a class="text-medium text-lg text-primary" href="#offcanvas-demo-size4" data-toggle="offcanvas">Buffer formulations for enhanced antibody stability </a><br/>
                                                    </p>
                                                    <div class="col-md-12">
                                                        <div class="col-md-3">
                                                            <b>Inventor: </b> <br/>CINI JOHN; NAGI ATHENA(+1) 
                                                        </div>
                                                        <div class="col-md-3">
                                                            <b>Applicant: </b> <br/> ONCOBIOLOGICS INC 
                                                        </div>

                                                        <div class="col-md-3">
                                                            <b>Publication info:</b> <br/> AU2014337263 (A1) 2016-04-28 
                                                        </div>
                                                        <div class="col-md-3">
                                                            <b>Priority date: </b> <br/> 2013-10-16 
                                                        </div>
                                                    </div>

                                                </div><!--end .col -->
                                                <div class="col-xs-1 no-padding text-center">
                                                    <p class="text-medium text-lg text-black">5)</p>
                                                </div>
                                                <div class="col-xs-11 no-padding">
                                                    <p class="no-padding no-margin">
                                                        <a class="text-medium text-lg text-primary" href="#offcanvas-demo-size4" data-toggle="offcanvas">Buffer formulations for enhanced antibody stability </a><br/>
                                                    </p>
                                                    <div class="col-md-12">
                                                        <div class="col-md-3">
                                                            <b>Inventor: </b> <br/>CINI JOHN; NAGI ATHENA(+1) 
                                                        </div>
                                                        <div class="col-md-3">
                                                            <b>Applicant: </b> <br/> ONCOBIOLOGICS INC 
                                                        </div>
                                                        <div class="col-md-3">
                                                            <b>Publication info:</b> <br/> AU2014337263 (A1) 2016-04-28 
                                                        </div>
                                                        <div class="col-md-3">
                                                            <b>Priority date: </b> <br/> 2013-10-16 
                                                        </div>
                                                    </div>

                                                </div><!--end .col -->
                                                <div class="col-xs-1 no-padding text-center">
                                                    <p class="text-medium text-lg text-black">6)</p>
                                                </div>
                                                <div class="col-xs-11 no-padding">
                                                    <p class="no-padding no-margin">
                                                        <a class="text-medium text-lg text-primary" href="#offcanvas-demo-size4" data-toggle="offcanvas">Buffer formulations for enhanced antibody stability </a><br/>
                                                    </p>
                                                    <div class="col-md-12">
                                                        <div class="col-md-3">
                                                            <b>Inventor: </b> <br/>CINI JOHN; NAGI ATHENA(+1) 
                                                        </div>
                                                        <div class="col-md-4">
                                                            <b>Applicant: </b> <br/> ONCOBIOLOGICS INC 
                                                        </div>

                                                        <div class="col-md-4">
                                                            <b>Publication info:</b> <br/> AU2014337263 (A1) 2016-04-28 
                                                        </div>
                                                        <div class="col-md-4">
                                                            <b>Priority date: </b> <br/> 2013-10-16 
                                                        </div>
                                                    </div>

                                                </div><!--end .col -->





                                            </div><!--end .list-results -->
                                            <!-- END RESULTS LIST -->

                                            <!-- BEGIN PAGING -->
                                            <ul class="pagination">
                                                <li class="disabled"><a href="#">«</a></li>
                                                <li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>
                                                <li><a href="#">2</a></li>
                                                <li><a href="#">3</a></li>
                                                <li><a href="#">4</a></li>
                                                <li><a href="#">5</a></li>
                                                <li><a href="#">»</a></li>
                                            </ul>
                                            <!-- END PAGING -->




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