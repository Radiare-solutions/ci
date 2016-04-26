@extends('layouts/indication_mgmt')

@section('content')


<!-- Page content -->
<div class="page-content">

    <!-- Main sidebar -->
    <div class="sidebar sidebar-main sidebar-default sidebar-fixed bg-blue-800">
        <div class="sidebar-content">
            <!-- Main navigation -->
            @include('layouts/sidebar', array('page' => 'indication'))
            <!-- /main navigation -->
        </div>
    </div>
    <!-- /main sidebar -->



    <!-- Main content -->
    <div class="content-wrapper">



        <!-- Content area -->
        <div class="content">





            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h5 class="panel-title">Indication Management</h5>
                    <div class="heading-elements">
                        <ul class="icons-list">
                            <li><a data-action="collapse"></a></li>
                            <li><a data-action="reload"></a></li>
                            <li><a data-action="close"></a></li>
                        </ul>
                    </div>
                </div>

                <hr class="no-margin"/>	


                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_form_vertical"> <i class="icon-plus3"></i>  Add Indication</button>


                <table class="table datatable-basic table-bordered">
                    <thead>
                        <tr>
                            <th>Sl.No</th>
                            <th>Indication</th>
                            <th>Therapeutic Area</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $details = json_decode($details);
                        $i = 1;
                        foreach ($details as $detail) {
                            foreach ($detail->indicationName as $indicationName) {  

                                ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php if(isset($indicationName->Name)) echo $indicationName->Name; ?></td>
                                    <td><?php echo $detail->therapyName; ?></td>
                                    <td class="text-center">
                                        <ul class="icons-list">
                                            <li class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                    <i class="icon-menu9"></i>
                                                </a>

                                                <ul class="dropdown-menu dropdown-menu-right">
                                                    <li class="dropdown-header">Options</li>
                                                    <li><a href="javascript:void(0);" data-toggle="modal" data-target="#myModal" onclick="load_indication_details('<?php echo $detail->_id;?>', '<?php echo $indicationName->_id;?>');"><i class="icon-pencil7"></i>Edit entry</a></li>
                                                    <li><a href="javascript:void(0);" onclick="delete_indication('<?php echo $detail->_id; ?>', '<?php echo $indicationName->_id; ?>')"><i class="icon-bin"></i>Remove entry</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                                <?php
                                    $i++;
                            }
                        }
                        ?>                        
                    </tbody>
                </table>
            </div>

            <!-- start of edit popup -->
            <!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Indication</h4>
      </div>
      <div class="modal-body">
                                <form action="edit_indication" method="post" name="edit_indication" id="edit_indication"> 
                            <div id="errorResponse"></div>
                            <div class="panel panel-flat">
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label>Indication:</label>
                                        <input type="text" class="form-control" id="indicationName" name="indicationName" placeholder="Enter the New Indication">
                                    </div>

                                    <input type="hidden" name="indicationID" id ="indicationID">
                                    <input type="hidden" name="therapyID" id ="therapyID">
                                    
                                    <div class="form-group">
                                        <label>Therapeutic Area:</label>
                                        <select class="select" name="therapyName" id="therapyName">
                                            <option value=""></option>
                                            <?php
                                            foreach ($therapeutic as $therapyDetail) {
                                                echo '<option value="' . $therapyDetail['attributes']['_id'] . '">' . $therapyDetail['attributes']['Name'] . '</option>';
                                            }
                                            ?>
                                            <!--                                            <option value=""></option>
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
                                                                                        <option value="67">Chronic Fatigue Syndrome</option>-->

                                        </select>
                                    </div>
                                    <div class="text-right">
                                        <button type="button" onclick="edit_indication_submit();" class="btn btn-primary">Update <i class="icon-arrow-right14 position-right"></i></button>
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </form>
      </div>      
    </div>

  </div>
</div>
            <!-- end of edit popup -->
            
            <div id="modal_form_vertical" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h5 class="modal-title">Add New Indication</h5>
                        </div>

                        <form action="add_indication" method="post" name="add_indication" id="add_indication"> 
                            <div id="errorResponse"></div>
                            <div class="panel panel-flat">
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label>Indication:</label>
                                        <input type="text" class="form-control" name="indicationName" placeholder="Enter the New Indication">
                                    </div>


                                    <div class="form-group">
                                        <label>Therapeutic Area:</label>
                                        <select class="select" name="therapyName">
                                            <option value=""></option>
                                            <?php
                                            foreach ($therapeutic as $therapyDetail) {
                                                echo '<option value="' . $therapyDetail['attributes']['_id'] . '">' . $therapyDetail['attributes']['Name'] . '</option>';
                                            }
                                            ?>
                                            <!--                                            <option value=""></option>
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
                                                                                        <option value="67">Chronic Fatigue Syndrome</option>-->

                                        </select>
                                    </div>
                                    <div class="text-right">
                                        <button type="button" onclick="add_indication_submit();" class="btn btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>



            <!-- Footer -->
            <div class="footer text-muted">
                &copy; 2016. <a href="#">Radiare</a> 
            </div>
            <!-- /footer -->

        </div>
        <!-- /content area -->

    </div>
    <!-- /main content -->

</div>
<!-- /page content -->



@endsection
