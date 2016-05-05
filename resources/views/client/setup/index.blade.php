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







        <form action="#">
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h5 class="panel-title">Client Setup</h5>
                    <div class="heading-elements">
                        <ul class="icons-list">
                            <li><a data-action="collapse"></a></li>
                            <li><a data-action="reload"></a></li>
                            <li><a data-action="close"></a></li>
                        </ul>
                    </div>
                </div>
                <hr class="no-margin"/>
                <div class="panel-body">


                    <div class="row">

                        <div class="col-md-6">	
                            <div class="form-group">
                                <label>Client:</label>
                                <select class="select" name="client_name" id="client_name">
                                    <option value=''>select</option>
                                    <?php                                    
                                    foreach($clientsList as $clientDetail) {
                                        echo '<option value="'.$clientDetail['_id'].'">'.$clientDetail['name'].'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">	
                            <div class="form-group">
                                <label>Business Group:</label>
                                <select class="select">
                                    <option value="CT">Bg1</option>
                                    <option value="DE">Bg2</option>
                                    <option value="FL">Bg3</option>
                                </select>
                            </div>
                        </div>


                        <div class="col-md-3">	
                            <div class="form-group">
                                <label>level 1:</label>
                                <select class="select">
                                    <option value="1">Autoimmune</option>
                                    <option value="2">Oncology</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">	
                            <div class="form-group">
                                <label>Level 2:</label>
                                <select class="select">
                                    <option value="1">Autoimmune</option>
                                    <option value="2">Oncology</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">	
                            <div class="form-group">
                                <label>Molecule:</label>
                                <select class="select">
                                    <option value=""></option>
                                    <option value="174">Abo-incompatible Renal Transplant</option>
                                    <option value="189">Acute Graft-Versus-Host Disease</option>
                                    <option value="36">Acute myeloid leukemia</option>
                                    <option value="212">Age-related macular degeneration</option>
                                    <option value="24">All Autoimmune Indications</option>
                                    <option value="111">Alzheimer Disease</option>
                                    <option value="26">ANCA-associated systemic vasculitis</option>
                                    <option value="92">ANCA-Associated Vasculitis</option>
                                    <option value="1">Ankylosing spondylitis</option>
                                    <option value="211">Anti-Synthetase Syndrome</option>
                                    <option value="179">Antineutrophil Cytoplasmic Antibody Associated Vasculitis</option>
                                    <option value="162">Appendiceal Epithelial Neoplasms</option>
                                    <option value="93">Autoimmune Diseases</option>
                                    <option value="81">Autoimmune Thrombocytopenia</option>
                                    <option value="10">Axial Spondylarthritis</option>
                                    <option value="77">B Cell Indolent Lymphomas</option>
                                    <option value="169">B-cell Lymphoma</option>
                                    <option value="202">B-cell non-Hodgkin lymphoma</option>
                                    <option value="98">Behçet’s Syndrome</option>
                                    <option value="18">Behcet’s disease</option>
                                    <option value="128">Branch Retinal Vein Occlusion</option>
                                    <option value="38">Breast cancer</option>
                                    <option value="71">Burkitt Lymphoma</option>
                                    <option value="56">Cancer</option>
                                    <option value="160">Central Serous Chorioretinopathy</option>
                                    <option value="46">Cervical Cancer</option>
                                    <option value="181">Childhood-Onset Systemic Lupus Erythematosus</option>
                                    <option value="134">Chorioretinopathy</option>
                                    <option value="41">Choroidal Neovascularization</option>
                                    <option value="67">Chronic Fatigue Syndrome</option>
                                </select>
                            </div>
                        </div>



                        <div class="col-md-6">	
                            <div class="form-group">
                                <label>Therapeutic Area:</label>
                                <select class="select">
                                    <option value="1">Autoimmune</option>
                                    <option value="2">Oncology</option>
                                </select>
                            </div>
                        </div>



                        <div class="col-md-6">	
                            <div class="form-group">
                                <label>Indication:</label>
                                <select class="select">
                                    <option value=""></option>
                                    <option value="174">Abo-incompatible Renal Transplant</option>
                                    <option value="189">Acute Graft-Versus-Host Disease</option>
                                    <option value="36">Acute myeloid leukemia</option>
                                    <option value="212">Age-related macular degeneration</option>
                                    <option value="24">All Autoimmune Indications</option>
                                    <option value="111">Alzheimer Disease</option>
                                    <option value="26">ANCA-associated systemic vasculitis</option>
                                    <option value="92">ANCA-Associated Vasculitis</option>
                                    <option value="1">Ankylosing spondylitis</option>
                                    <option value="211">Anti-Synthetase Syndrome</option>
                                    <option value="179">Antineutrophil Cytoplasmic Antibody Associated Vasculitis</option>
                                    <option value="162">Appendiceal Epithelial Neoplasms</option>
                                    <option value="93">Autoimmune Diseases</option>
                                    <option value="81">Autoimmune Thrombocytopenia</option>
                                    <option value="10">Axial Spondylarthritis</option>
                                    <option value="77">B Cell Indolent Lymphomas</option>
                                    <option value="169">B-cell Lymphoma</option>
                                    <option value="202">B-cell non-Hodgkin lymphoma</option>
                                    <option value="98">Behçet’s Syndrome</option>
                                    <option value="18">Behcet’s disease</option>
                                    <option value="128">Branch Retinal Vein Occlusion</option>
                                    <option value="38">Breast cancer</option>
                                    <option value="71">Burkitt Lymphoma</option>
                                    <option value="56">Cancer</option>
                                    <option value="160">Central Serous Chorioretinopathy</option>
                                    <option value="46">Cervical Cancer</option>
                                    <option value="181">Childhood-Onset Systemic Lupus Erythematosus</option>
                                    <option value="134">Chorioretinopathy</option>
                                    <option value="41">Choroidal Neovascularization</option>
                                    <option value="67">Chronic Fatigue Syndrome</option>
                                </select>
                            </div>
                        </div>






















                    </div>


                    <div class="form-group">
                        <label>Add RSS Link:</label>
                        <textarea rows="2" cols="5" class="form-control" placeholder="Enter RSS Link here"></textarea>
                    </div>

                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Submit<i class="icon-arrow-right14 position-right"></i></button>
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