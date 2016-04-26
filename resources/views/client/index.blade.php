@extends('layouts/client_mgmt')

@section('content')

<?php
$details = json_decode($details);
$therapyDetails = json_decode($therapyDetails);
$level1 = json_decode($level1Details);
?>
<!-- Page content -->
<div class="page-content">

    <!-- Main sidebar -->
    <div class="sidebar sidebar-main sidebar-default sidebar-fixed bg-blue-800">
        <div class="sidebar-content">
            <!-- Main navigation -->
            @include('layouts/sidebar', array('page' => 'client'))
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
                    <h5 class="panel-title">Client Management</h5>
                    <div class="heading-elements">
                        <ul class="icons-list">
                            <li><a data-action="collapse"></a></li>
                            <li><a data-action="reload"></a></li>
                            <li><a data-action="close"></a></li>
                        </ul>
                    </div>
                </div>

                <hr class="no-margin"/>	


                <button type="button" class="btn btn-primary btn-xlg" data-toggle="modal" data-target="#modal_form_vertical"> <i class="icon-plus3"></i>  Add Client</button>
                <button type="button" class="btn btn-primary btn-xlg" data-toggle="modal" data-target="#modal_form_vertical1"> <i class="icon-plus3"></i>  Add Business Group</button>


                <table class="table datatable-basic table-bordered">
                    <thead>
                        <tr>
                            <th>Client</th>
                            <th>Bussiness Group</th>
                            <th>Molecule</th>
                            <th>Indication</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if(count($details) > 0) {
                        foreach ($details as $detail) {
                            $str = '';
                            ?>
                            <tr> 
                                <th BGCOLOR="#99CCFF" >{{ $detail->clientName }}</th>

                                <td> <?php if(isset($detail->bgName)) echo $detail->bgName; ?></td> 
                                <td>
                                    <?php
                                    if(isset($detail->Name))
                                    {
                                        //foreach($detail->Name as $details)
                                          echo implode(",", $detail->Name);
                                    }
                                        
                                    ?>
                                </td> 
                                <?php
                                $str = '';
                                if(isset($detail->therapy)) {
                                $res = $detail->therapy;
                                $str.='<td>';
                                foreach ($res as $key => $value) {
                                   $str.='<b>' . $key . '</b> - ' . implode(", ", $value) . "<br>";
                                }
                                $str.='</td>';
                                            
                                }
                                else {
                                $str.='<td></td>';
                                }
                                echo $str;
                                ?>
                                <td class="text-center">
                                    <ul class="icons-list">
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                <i class="icon-menu9"></i>
                                            </a>

                                            <?php if(isset($detail->bgid)) { ?>

                                            <ul class="dropdown-menu dropdown-menu-right">
                                                <li class="dropdown-header">Options</li>
                                                <li><a data-toggle="modal" data-target="#edit_bg_entry" onclick="edit_bg_entry('<?php echo $detail->cid;?>', '<?php echo $detail->bgid;?>');"><i class="icon-pencil7"></i>Edit entry</a></li>
                                            <li><a href="javascript:void(0);" onclick="delete_client('<?php echo $detail->cid;?>');"><i class="icon-bin"></i>Remove Client</a></li>
                                            <li><a href="javascript:void(0);" onclick="delete_group('<?php echo $detail->cid;?>', '<?php echo $detail->bgid;?>');"><i class="icon-bin"></i>Remove Business Group</a></li>
                                                <li class="dropdown-header">Management System</li>
                                                <li><a data-toggle="modal" data-target="#modal_large" onclick="setValues('<?php echo $detail->bgid; ?>', 'add_molecule');load_molecule_entry_list('<?php echo $detail->bgid;?>');"><i class="icon-pencil7" ></i>Molecule entry</a></li>
                                                <li><a data-toggle="modal" data-target="#modal_large1" onclick="setValues('<?php echo $detail->bgid; ?>', 'add_indication_entry');load_indication_entry_list('<?php echo $detail->bgid;?>');"><i class="icon-pencil7"></i>Indication entry</a></li>													
                                            </ul>
                                            <?php }  else { } ?>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                        <?php } } ?>
                    </tbody>
                </table>
                
                <div id="modal_form_vertical" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h5 class="modal-title">Add New Client</h5>
                            </div>

                            <form action="add_client" method="post" name="add_client" id="add_client">
                                <div id="errorResponse"></div>
                                <div class="panel panel-flat">
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <label>Client:</label>
                                            <input type="text" class="form-control" name="clientName" id="clientName" placeholder="Enter the New Client">
                                        </div>



                                        <div class="text-right">
                                            <button type="button" onclick="add_client_submit();" class="btn btn-primary">Submit<i class="icon-arrow-right14 position-right"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>


                <div id="modal_form_vertical1" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h5 class="modal-title">Add New Business Group</h5>
                            </div>

                            <form action="add_bg" method="post" name="add_bg" id="add_bg">
                                <div id="errorResponse"></div>
                                <div class="panel panel-flat">
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <label>Client:</label>
                                            <select class="select" name="clientName" id="clientName">
                                                <?php
                                                foreach ($details as $detail) {
                                                    echo '<option value="' . $detail->cid . '">' . $detail->clientName . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>



                                        <div class="form-group">
                                            <label>Business Group:</label>
                                            <input type="text" class="form-control" name="groupName" id="groupName" placeholder="Enter the New Client">
                                        </div>



                                        <div class="text-right">
                                            <button type="button" onclick="add_group_submit();" class="btn btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

<div id="edit_bg_entry" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h5 class="modal-title">Edit Entry</h5>
                            </div>

                            <form action="edit_bg" method="post" name="edit_bg" id="edit_bg">
                                <input type="hidden" name="cid" id="cid">
                                <input type="hidden" name="bgid" id="bgid">
                                <div id="errorResponse"></div>
                                <div class="panel panel-flat">
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <label>Client:</label>
                                            <input type="text" class="form-control" name="clientName" id="clientName" placeholder="Enter the New Client">
                                        </div>



                                        <div class="form-group">
                                            <label>Business Group:</label>
                                            <input type="text" class="form-control" name="groupName" id="groupName" placeholder="Enter the New Client">
                                        </div>



                                        <div class="text-right">
                                            <button type="button" onclick="edit_bg_submit();" class="btn btn-primary">Update <i class="icon-arrow-right14 position-right"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div id="modal_large" class="modal fade">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header bg-primary">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h5 class="modal-title">Molecule Management</h5>
                            </div>

                            <form action="add_molecule" method="post" name="add_molecule" id="add_molecule">
                                <input type="hidden" name="bgid" id="bgid">
                                <div id="errorResponse"></div>
                                <div class="panel panel-flat">
                                    <div class="panel-body">

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Level 1:</label>
                                                <select class="select" name="level1Name" id="level1Name" onchange="load_level2_data(this.value, 'add')" id="level1Name">
                                                    <option value=""></option>
                                                    <?php
                                                    foreach ($level1 as $level1Detail) {
                                                        echo '<option value="' . $level1Detail->_id . '">' . $level1Detail->level1Name . '</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Level 2:</label>
                                                <select class="select" name="level2Name" id="level2Name" onchange="load_molecule_data(this.value);">
                                                    <option value=""></option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Molecule:</label>
                                                <select multiple="multiple" data-placeholder="Enter tags" class="select-icons" name="moleculeName[]" id="moleculeName">
                                                    <option value=""></option>
                                                </select>
                                            </div>
                                        </div>



                                        <div class="text-right">
                                            <button type="button" onclick="add_molecule_entry_submit();" class="btn btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </form>



                            <div class="modal-body" id='list_molecule_entry'>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-11">
                                            <h6 class="text-semibold">Merck- BG1- 1</h6>
                                            <b>Autoimmune</b>-  Adalimumab, Filgrastim, Pegfilgrastim, Etanercept, Bevacizumab, Infliximab, Rituximab
                                        </div>
                                        <div class="col-md-1"><button type="button" class="btn btn-link"><i class="icon-trash"></i></button></div>
                                    </div>
                                    <div class="col-md-12">				
                                        <div class="col-md-11">	
                                            <h6 class="text-semibold">Merck- BG1- 2</h6>
                                            <b>Oncology</b> -Adalimumab, Filgrastim, Pegfilgrastim, Etanercept, Bevacizumab, Infliximab, Rituximab
                                        </div>
                                        <div class="col-md-1"><button type="button" class="btn btn-link"><i class="icon-trash"></i></button></div>
                                    </div>										
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div id="modal_large1" class="modal fade">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header bg-primary">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h5 class="modal-title">Indication Management</h5>
                            </div>

                            <form action="add_indication_entry" method="post" name="add_indication_entry" id="add_indication_entry">
                                <div id="errorResponse"></div>
                                <input type="hidden" name="bgid" id="bgid">
                                <div class="panel panel-flat">
                                    <div class="panel-body">

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Therapeutic Area:</label>
                                                <select class="select" name="therapeuticName" id="therapeuticName" onchange="load_indication_data(this.value);">
                                                    <option value=''>select</option>
                                                    <?php
                                                    foreach ($therapyDetails as $therapyDetail) {
                                                        echo '<option value="' . $therapyDetail->tid . '">' . $therapyDetail->therapyName . '</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Indication:</label>
                                                <select multiple="multiple" data-placeholder="Enter tags" class="select-icons" name="indicationName[]" id="indicationName">
                                                    <option value=""></option>
                                                </select>
                                            </div>
                                        </div>



                                        <div class="text-right">
                                            <button type="button" onclick="add_indication_entry_submit();" class="btn btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </form>



                            <div class="modal-body" id='list_indication_entry'>
                                <div class="row">

                                    <?php                                    
                                    foreach ($details as $detail) {
                                        if(isset($detail->therapy)) {
                                        $res = $detail->therapy;
                                        foreach ($res as $key => $value) {
                                            ?>                                            
                                            <div class = "col-md-12">
                                                <div class = "col-md-11">
                                                    <h6 class = "text-semibold">{{ $detail->clientName }} - {{ $detail->bgName }}</h6>
        <?php echo '<b>' . $key . '</b> - ' . implode(", ", $value) . "<br>"; ?>
                                                </div>
                                                <div class = "col-md-1"><button type = "button" class = "btn btn-link"><i class = "icon-trash"></i></button></div>
                                            </div>

                                            <?php
                                        }
                                    }
                                    }
                                    ?>

                                </div>
                            </div>
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