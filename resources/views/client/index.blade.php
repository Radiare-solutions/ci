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
            <div class="sidebar-category sidebar-category-visible">
                <div class="category-content no-padding">
                    <ul class="navigation navigation-main navigation-accordion">
                        <li><a href="home.html"><i class="icon-home4"></i> <span>Home</span></a></li>
                        <li>
                            <a href="#"><i class="icon-stack2"></i> <span>Category Management</span></a>
                            <ul>
                                <li><a href="molecules.html">Molecule</a></li>
                                <li><a href="indication.html">Indication</a></li>
                                <li class="active"><a href="client.html">Client</a></li>
                            </ul>
                        </li>
                        <li><a href="db-setup.html"><i class="icon-steam"></i> <span>Client Setup</span></a></li>
                        <li>
                            <a href="#"><i class="icon-database-arrow"></i> <span>Verify</span></a>
                            <ul>
                                <li><a href="product.html">Product</a></li>
                                <li><a href="condition.html">Condition</a></li>
                                <li><a href="sponsor.html">Sponsor</a></li>
                            </ul>
                        </li>

                    </ul>
                </div>
            </div>
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
                        foreach ($details as $detail) {
                            ?>
                            <tr> 
                                <th BGCOLOR="#99CCFF" >{{ $detail->clientName }}</th>

                                <td> {{ $detail->bgName }}</td> 
                                <td>
                                    <b>Autoimmune</b>-  Adalimumab, Filgrastim, Pegfilgrastim, Etanercept, Bevacizumab, Infliximab, Rituximab <br/>
                                    <b>Oncology</b> -Adalimumab, Filgrastim, Pegfilgrastim, Etanercept, Bevacizumab, Infliximab, Rituximab

                                </td> 
                                <?php
                                $res = $detail->therapy;
                                echo '<td>';
                                foreach ($res as $key => $value) {
                                    echo '<b>' . $key . '</b> - ' . implode(", ", $value) . "<br>";
                                }
                                echo '</td>';
                                ?>                                
                                <td class="text-center">
                                    <ul class="icons-list">
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                <i class="icon-menu9"></i>
                                            </a>



                                            <ul class="dropdown-menu dropdown-menu-right">
                                                <li class="dropdown-header">Options</li>
                                                <li><a data-toggle="modal" data-target="#edit_bg_entry" onclick="edit_bg_entry('<?php echo $detail->cid;?>', '<?php echo $detail->bgid;?>');"><i class="icon-pencil7"></i>Edit entry</a></li>
                                                <li><a href="#"><i class="icon-bin"></i>Remove entry</a></li>
                                                <li class="dropdown-header">Management System</li>
                                                <li><a data-toggle="modal" data-target="#modal_large" onclick="setValues('<?php echo $detail->bgid; ?>', 'add_molecule');"><i class="icon-pencil7" ></i>Molecule entry</a></li>
                                                <li><a data-toggle="modal" data-target="#modal_large1" onclick="setValues('<?php echo $detail->bgid; ?>', 'add_indication_entry');"><i class="icon-pencil7"></i>Indication entry</a></li>													
                                            </ul>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                        <?php } ?>
                        <tr> 
                            <th BGCOLOR="#99CCFF" >Merck</th>
                            <td> bg2</td>
                            <td>
                                <b>Autoimmune</b>-  Adalimumab, Filgrastim, Pegfilgrastim, Etanercept, Bevacizumab, Infliximab, Rituximab <br/>
                                <b>Oncology</b> -Adalimumab, Filgrastim, Pegfilgrastim, Etanercept, Bevacizumab, Infliximab, Rituximab

                            </td> 
                            <td>
                                <b>Autoimmune</b>-  Adalimumab, Filgrastim, Pegfilgrastim, Etanercept, Bevacizumab, Infliximab, Rituximab <br/>
                                <b>Oncology</b> -Adalimumab, Filgrastim, Pegfilgrastim, Etanercept, Bevacizumab, Infliximab, Rituximab

                            </td> 


                            <td class="text-center">
                                <ul class="icons-list">
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                            <i class="icon-menu9"></i>
                                        </a>



                                        <ul class="dropdown-menu dropdown-menu-right">
                                            <li class="dropdown-header">Options</li>
                                            <li><a ><i class="icon-pencil7"></i>Edit entry</a></li>
                                            <li><a href="#"><i class="icon-bin"></i>Remove entry</a></li>
                                            <li class="dropdown-header">Managemnt System</li>
                                            <li><a data-toggle="modal" data-target="#modal_large"><i class="icon-pencil7" ></i>Molecule entry</a></li>
                                            <li><a data-toggle="modal" data-target="#modal_large1"><i class="icon-pencil7"></i>Indication entry</a></li>													
                                        </ul>
                                    </li>
                                </ul>
                            </td>

                        </tr> 




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
                                                <select multiple="multiple" data-placeholder="Enter tags" class="select-icons" name="moleculeName" id="moleculeName">
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



                            <div class="modal-body">
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



                            <div class="modal-body">
                                <div class="row">

                                    <?php
                                    foreach ($details as $detail) {
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
                                    ?>
                                    <div class = "col-md-12">
                                        <div class = "col-md-11">
                                            <h6 class = "text-semibold">Merck- BG2- 1</h6>
                                            <b>Oncology</b> -Adalimumab, Filgrastim, Pegfilgrastim, Etanercept, Bevacizumab, Infliximab, Rituximab
                                        </div>
                                        <div class = "col-md-1"><button type = "button" class = "btn btn-link"><i class = "icon-trash"></i></button></div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="col-md-11">
                                            <h6 class="text-semibold">Merck- BG2- 1</h6>
                                            <b>Oncology</b> -Adalimumab, Filgrastim, Pegfilgrastim, Etanercept, Bevacizumab, Infliximab, Rituximab
                                        </div>
                                        <div class="col-md-1"><button type="button" class="btn btn-link"><i class="icon-trash"></i></button></div>
                                    </div>
                                    <div class="col-md-12">				
                                        <div class="col-md-11">	
                                            <h6 class="text-semibold">Merck- BG2- 2</h6>
                                            <b>Autoimmune</b>-  Adalimumab, Filgrastim, Pegfilgrastim, Etanercept, Bevacizumab, Infliximab, Rituximab

                                        </div>
                                        <div class="col-md-1"><button type="button" class="btn btn-link"><i class="icon-trash"></i></button></div>
                                    </div>

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