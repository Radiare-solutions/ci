@extends('layouts/molecule_mgmt')

@section('content')


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
                                <li class="active"><a href="molecules.html">Molecule</a></li>
                                <li><a href="indication.html">Indication</a></li>
                                <li><a href="client.html">Client</a></li>
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
                    <h5 class="panel-title">Molecule Management</h5>
                    <div class="heading-elements">
                        <ul class="icons-list">
                            <li><a data-action="collapse"></a></li>
                            <li><a data-action="reload"></a></li>
                            <li><a data-action="close"></a></li>
                        </ul>
                    </div>
                </div>

                <hr class="no-margin"/>	


                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_form_vertical"> <i class="icon-plus3"></i>  Add Molecule</button>


                <table class="table datatable-basic table-bordered">
                    <thead>
                        <tr>
                            <th>Sl.No</th>                           
                            <th>Molecule</th>
                             <th>Level 2</th>
                            <th>Level 1</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $details = json_decode($details);
                        $i = 1;
                        foreach($details as $detail) {
                            $j = $i-1;
                        ?>
                        <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $detail->moleculeName; ?></td>
                                    <td><?php echo $detail->level2id; ?></td>
                                    <td><?php echo $detail->level1id; ?></td>
                                    <td class="text-center">
                                        <ul class="icons-list">
                                            <li class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                    <i class="icon-menu9"></i>
                                                </a>

                                                <ul class="dropdown-menu dropdown-menu-right">
                                                    <li class="dropdown-header">Options</li>
                                                    <li><a href="javascript:void(0);" data-toggle="modal" data-target="#myModal" onclick="load_molecule_details('<?php echo $detail->mid;?>', '<?php echo $j;?>');"><i class="icon-pencil7"></i>Edit entry</a></li>
                                                    <li><a href="#"><i class="icon-bin"></i>Remove entry</a></li>
                                                    <li class="dropdown-header">Export</li>
                                                    <li><a href="#"><i class="icon-file-pdf"></i> Export to .pdf</a></li>
                                                    <li><a href="#"><i class="icon-file-excel"></i> Export to .csv</a></li>
                                                    <li><a href="#"><i class="icon-file-word"></i> Export to .doc</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                        <?php $i++; } ?>
                        <!--
                        <?php
                       /* $details = json_decode($details);
                        $i = 1;
                        foreach ($details as $detail) {
                            foreach ($detail->moleculeName as $molecule) {                               
                                ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $molecule->Name; ?></td>
                                    <td><?php echo $detail->therapyName; ?></td>
                                    <td class="text-center">
                                        <ul class="icons-list">
                                            <li class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                    <i class="icon-menu9"></i>
                                                </a>

                                                <ul class="dropdown-menu dropdown-menu-right">
                                                    <li class="dropdown-header">Options</li>
                                                    <li><a href="javascript:void(0);" data-toggle="modal" data-target="#myModal" onclick="load_molecule_details('<?php echo $detail->_id;?>', '<?php echo $molecule->_id;?>');"><i class="icon-pencil7"></i>Edit entry</a></li>
                                                    <li><a href="#"><i class="icon-bin"></i>Remove entry</a></li>
                                                    <li class="dropdown-header">Export</li>
                                                    <li><a href="#"><i class="icon-file-pdf"></i> Export to .pdf</a></li>
                                                    <li><a href="#"><i class="icon-file-excel"></i> Export to .csv</a></li>
                                                    <li><a href="#"><i class="icon-file-word"></i> Export to .doc</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                                <?php
                                    $i++;
                            }
                        } */
                        ?>    
                        -->
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
        <h4 class="modal-title">Edit Molecule</h4>
      </div>
      <div class="modal-body">
                                <form action="edit_molecule" method="post" name="edit_molecule" id="edit_molecule"> 
                            <div id="errorResponse"></div>
                            <div class="panel panel-flat">
                                <div class="panel-body">
                                    
                                    <div class="form-group">
                                        <label>Level 1:</label>
                                        <select class="select" name="level1Name" onchange="load_level2_data(this.value,'edit')" id="level1Name">
                                            <option value=""></option>
                                            <?php                                            
                                            foreach ($level1 as $level1Detail) {
                                                echo '<option value="' . $level1Detail['_id'] . '">' . $level1Detail['level1Name'] . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Level 2:</label>
                                        <select class="select" name="level2Name" id="level2Name">
                                            <option value=""></option>                                            
                                        </select>
                                    </div>
                                   
                                    <div class="form-group">
                                        <label>Molecule:</label>
                                        <input type="text" class="form-control" name="moleculeName" id="moleculeName" placeholder="Enter the New Molecule">
                                        <input type="hidden" name="mid" id="mid" >
                                        <input type="hidden" name="mIndex" id="mIndex" >
                                        
                                    </div>
                                    
                                    <div class="text-right">
                                        <button type="button" onclick="edit_molecule_submit();" class="btn btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>
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
                            <h5 class="modal-title">Add New Molecule</h5>
                        </div>

                        <form action="add_molecule" method="post" name="add_molecule" id="add_molecule"> 
                            <div id="errorResponse"></div>
                            <div class="panel panel-flat">
                                <div class="panel-body">
                                    
                                    <div class="form-group">
                                        <label>Level 1:</label>
                                        <select class="select" name="level1Name" onchange="load_level2_data(this.value, 'add')" id="level1Name">
                                            <option value=""></option>
                                            <?php                                            
                                            foreach ($level1 as $level1Detail) {
                                                echo '<option value="' . $level1Detail['_id'] . '">' . $level1Detail['level1Name'] . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Level 2:</label>
                                        <select class="select" name="level2Name" id="level2Name">
                                            <option value=""></option>                                            
                                        </select>
                                    </div>
                                   
                                    <div class="form-group">
                                        <label>Molecule:</label>
                                        <input type="text" class="form-control" name="moleculeName" placeholder="Enter the New Molecule">
                                    </div>
                                    
                                    <div class="text-right">
                                        <button type="button" onclick="add_molecule_submit();" class="btn btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>
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
