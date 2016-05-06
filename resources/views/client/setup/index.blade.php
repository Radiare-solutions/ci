@extends('layouts.cm')

@section('content')
<!-- Main sidebar -->
<div class="sidebar sidebar-main sidebar-default sidebar-fixed bg-blue-800">
    <div class="sidebar-content">
        <!-- Main navigation -->
        @include('layouts/sidebar', array('page' => 'client_setup'))
        <!-- /main navigation -->
    </div>
</div>
<!-- /main sidebar -->
<!--Main content -->
<div class="content-wrapper">




    <!-- Content area -->
    <div class="content">







        <form name="client_setup" id="client_setup" method="post">
            <div id="errorResponse"></div>
            <div class="panel panel-flat">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="panel-body">


                    <div class="row">

                        <div class="col-md-6">	
                            <div class="form-group">
                                <label>Client:</label>
                                <select class="select" name="client_details" id="client_details" onchange="loadBG(this.value)">
                                    <option value="">select</option>
                                    <?php
                                    foreach ($clientsList as $clientDetail) {
                                        echo '<option value="' . $clientDetail['_id'] . '">' . $clientDetail['name'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">	
                            <div class="form-group">
                                <label>Business Group:</label>
                                <select class="select" name="bg_details" id="bg_details">

                                </select>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Select: </label>
                                <input type="radio" name="type" id="type" onclick="displayFeedSection(this.value);" value="indication">&nbsp; Indication&nbsp;&nbsp;
                                <input type="radio" name="type" id="type" onclick="displayFeedSection(this.value);" value="molecule">&nbsp; Molecule
                            </div>
                        </div>

                        <div id="molecule" class="hide">
                            <div class="col-md-3">	
                                <div class="form-group">
                                    <label>level 1:</label>
                                    <select class="select" name="level1_details" id="level1_details" onchange="loadFeedLevel2(this.value)">

                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3">	
                                <div class="form-group">
                                    <label>Level 2:</label>
                                    <select class="select" name="level2_details" id="level2_details" onchange="loadFeedMolecule()">

                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">	
                                <div class="form-group">
                                    <label>Molecule:</label>
                                    <select class="select" name="molecule_details" id="molecule_details">

                                    </select>
                                </div>
                            </div>
                        </div>

                        <div id="indication" class="hide">
                            <div class="col-md-6">	
                                <div class="form-group">
                                    <label>Therapeutic Area:</label>
                                    <select class="select" name="thera_details" id="thera_details" onchange="loadIndications(this.value, '')">

                                    </select>
                                </div>
                            </div>



                            <div class="col-md-6">	
                                <div class="form-group">
                                    <label>Indication:</label>
                                    <select class="select" name="indication_details" id="indication_details">

                                    </select>
                                </div>
                            </div>


                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Rss Feed:</label>
                                <input type="text" name="feed_url" id="feed_url" class="form-control">
                            </div>
                        </div>
                    </div>                              

                    <div class="text-right">
                        <button type="button" id="add_feed_details" class="btn btn-primary" onclick="add_client_setup();">Submit<i class="icon-arrow-right14 position-right"></i></button>
                    </div>
                </div>
            </div>
        </form>









        <!-- Footer -->
        <div class="footer text-muted">
            &copy; 2016. <a href="#">Radiare</a> 
        </div>
        <!-- /footer -->

    </div>
    <!-- /content area -->

</div>
<!-- /main content -->
@endsection