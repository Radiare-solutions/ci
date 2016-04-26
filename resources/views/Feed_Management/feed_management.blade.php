@extends('layouts.app')

@section('content')

<!--Main content -->
<div class="content-wrapper">
    <!--    Content area -->
    <div class="content" id="feed_content">
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">Feed Management</h5>
                <div class="heading-elements">
                    <ul class="icons-list">
                        <li><a data-action="collapse"></a></li>
                        <li><a data-action="reload"></a></li>
                        <li><a data-action="close"></a></li>
                    </ul>
                </div>
            </div>

            <hr class="no-margin"/>	
            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_form_add"> <i class="icon-plus3"></i>  Add Feed</button>
            <div id="message_section" style="display: none;">
                <hr class="no-margin"/>
            </div>
            <table class="table datatable-basic table-bordered" id="feed_list">
                <thead>
                    <tr>
                        <th>Sl.No</th>
                        <th>Client Details</th>
                        <th>BG Details</th>
                        <th>Indication</th>
                        <th>Molecule</th>                      
                        <th>RSS Link</th>                      

                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody >
                    @foreach($feeds as $feed) <tr>
                        <td>1</td>

                        <td>{{$feed->client_id}}</td>
                        <td>{{$feed->bg_id}}</td>
                        <td>{{$feed->molecule_id}}</td>
                        <td>{{$feed->indication_id}}</td>
                        <td>{{$feed->rss_feed_link}}</td>
                        <td class="text-center">
                            <ul class="icons-list">
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="icon-menu9"></i>
                                    </a>

                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li class="dropdown-header">Options</li>
                                        <li><a href="javascript:void(0);" data-toggle="modal" data-target="#modal_form_edit" onclick="edit_feed_form('<?php echo $feed->_id; ?>');" ><i class="icon-pencil7"></i>Edit entry</a></li>
                                        <li><a href="javascript:void(0);" onclick="delete_feed_details('<?php echo $feed->_id; ?>');"><i class="icon-bin"></i>Remove entry</a></li>

                                    </ul>
                                </li>
                            </ul>
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!--Add New User Form-->

        <div id="modal_form_add" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h5 class="modal-title">Add New Feeds</h5>
                    </div>

                    <form name="add_feed" id="add_feed" method="post">
                        <div class="panel panel-flat">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="panel-body">


                                <div class="row">

                                    <div class="col-md-6">	
                                        <div class="form-group">
                                            <label>Client:</label>
                                            <select class="select" name="client_details" id="client_details">
                                                <option value="">select</option>
                                                <?php
                                                foreach ($client_list as $therapyDetail) {
                                                    echo '<option value="' . $therapyDetail['attributes']['_id'] . '">' . $therapyDetail['attributes']['Name'] . '</option>';
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
                                            <input type="radio" name="type" id="type" onclick="displayFeedSection(this.value);" value="indication">&nbsp; Indication
                                            <input type="radio" name="type" id="type" onclick="displayFeedSection(this.value);" value="molecule">&nbsp; Molecule
                                        </div>
                                    </div>
                                    
                                    <div id="molecule" class="hide">
                                    <div class="col-md-3">	
                                        <div class="form-group">
                                            <label>level 1:</label>
                                            <select class="select" name="level1_details" id="level1_details">
                                                <option value="1">Autoimmune</option>
                                                <option value="2">Oncology</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-3">	
                                        <div class="form-group">
                                            <label>Level 2:</label>
                                            <select class="select" name="level2_details" id="level2_details">
                                                <option value="1">Autoimmune</option>
                                                <option value="2">Oncology</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">	
                                        <div class="form-group">
                                            <label>Molecule:</label>
                                            <select class="select" name="molecule_details" id="molecule_details">
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

                                    <div id="indication" class="hide">
                                    <div class="col-md-6">	
                                        <div class="form-group">
                                            <label>Therapeutic Area:</label>
                                            <select class="select" name="thera_details">
                                                <option value="1">Autoimmune</option>
                                                <option value="2">Oncology</option>
                                            </select>
                                        </div>
                                    </div>



                                    <div class="col-md-6">	
                                        <div class="form-group">
                                            <label>Indication:</label>
                                            <select class="select" name="indication_details" id="indication_details">
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
                                </div>


                                <div class="form-group">
                                    <label>Add RSS Link:</label>
                                    <textarea rows="2" cols="5" class="form-control" placeholder="Enter RSS Link here" name='rss_feed'></textarea>
                                </div>

                                <div class="text-right">
                                    <button type="button" id="add_feed_details" class="btn btn-primary" onclick="add_new_feed();">Submit<i class="icon-arrow-right14 position-right"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--Edit User Form Starts-->
        <div id="modal_form_edit" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h5 class="modal-title">Edit Feed</h5>
                    </div>

                    <form name="edit_feed" id="edit_feed" method="post">
                        <div class="panel panel-flat">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="panel-body">


                                <div class="row">

                                    <div class="col-md-6">	
                                        <div class="form-group">
                                            <label>Client:</label>
                                            <select class="select" name="client_details_edit" id="client_details_edit">
                                                <option value="AK">Merck</option>
                                                <option value="HI">Merck1</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">	
                                        <div class="form-group">
                                            <label>Business Group:</label>
                                            <select class="select" name="bg_details_edit" id="bg_details_edit">
                                                <option value="CT">Bg1</option>
                                                <option value="DE">Bg2</option>
                                                <option value="FL">Bg3</option>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="col-md-3">	
                                        <div class="form-group">
                                            <label>level 1:</label>
                                            <select class="select" name="level1_details_edit" id="level1_details_edit">
                                                <option value="1">Autoimmune</option>
                                                <option value="2">Oncology</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-3">	
                                        <div class="form-group">
                                            <label>Level 2:</label>
                                            <select class="select" name="level2_details_edit" id="level2_details_edit">
                                                <option value="1">Autoimmune</option>
                                                <option value="2">Oncology</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">	
                                        <div class="form-group">
                                            <label>Molecule:</label>
                                            <select class="select" name="molecule_details_edit" id="molecule_details_edit">
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
                                            <select class="select" name="thera_details_edit">
                                                <option value="1">Autoimmune</option>
                                                <option value="2">Oncology</option>
                                            </select>
                                        </div>
                                    </div>



                                    <div class="col-md-6">	
                                        <div class="form-group">
                                            <label>Indication:</label>
                                            <select class="select" name="indication_details_edit" id="indication_details_edit">
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
                                    <textarea rows="2" cols="5" class="form-control" placeholder="Enter RSS Link here" name='rss_feed_edit'></textarea>
                                </div>

                                <div class="text-right">
                                    <button type="button" class="btn btn-primary" onclick="edit_feed();">Submit<i class="icon-arrow-right14 position-right"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--        Footer -->
        <div class="footer text-muted">
            &copy; 2016. <a href="#">Radiare</a> 
        </div>
        <!--        /footer -->

    </div>
    <!--/content area--> 

</div>

@endsection