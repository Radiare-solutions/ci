@extends('layouts/therapeutic_mgmt')

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
                                <li><a href="molecules.html">Molecule</a></li>
                                <li><a href="indication.html">Indication</a></li>
                                <li><a href="client.html">Client</a></li>
                                <li class="active"><a href="therapeutic.html">Therapeutic</a></li>
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
                    <h5 class="panel-title">Therapeutic Management</h5>
                    <div class="heading-elements">
                        <ul class="icons-list">
                            <li><a data-action="collapse"></a></li>
                            <li><a data-action="reload"></a></li>
                            <li><a data-action="close"></a></li>
                        </ul>
                    </div>
                </div>

                <hr class="no-margin"/>


                <button type="button" class="btn btn-primary btn-xlg" data-toggle="modal" data-target="#modal_form_vertical"> <i class="icon-plus3"></i>  Add Therapeutic</button>	

                <table class="table datatable-basic table-bordered">
                    <thead>
                        <tr>
                            <th>S.No</th>
                            <th>Therapeutic Area</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $details = json_decode($details);
                        $i = 1;
                        foreach ($details as $detail) {
                            ?>
                            <tr> 
                                <th><?php echo $i; ?></th>
                                <td><?php echo $detail->therapeuticName; ?></td>

                                <td class="text-center">
                                    <ul class="icons-list">
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                <i class="icon-menu9"></i>
                                            </a>



                                            <ul class="dropdown-menu dropdown-menu-right">
                                                <li class="dropdown-header">Options</li>
                                                <li><a href="javascript:void(0);" data-toggle="modal" data-target="#myModal" onclick="load_therapeutic_details('<?php echo $detail->tid;?>');"><i class="icon-pencil7"></i>Edit entry</a></li>
                                                <li><a href="#"><i class="icon-bin"></i>Remove entry</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </td>

                            </tr> 
                            <?php
                            $i++;
                        }
                        ?>



                    </tbody>

                </table>



            </div>


            <div id="modal_form_vertical" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h5 class="modal-title">Add New Therapeutic Area</h5>
                        </div>

                        <form action="add_therapeutic" method="post" name="add_therapeutic" id="add_therapeutic">
                            <div id="errorResponse"></div>
                            <div class="panel panel-flat">
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label>Therapeutic Area:</label>
                                        <input type="text" class="form-control" name="therapeuticName" id="therapeuticName" placeholder="Enter the New Therapeutic Name">
                                    </div>



                                    <div class="text-right">
                                        <button type="button" onclick="add_therapeutic_submit();" class="btn btn-primary">Submit<i class="icon-arrow-right14 position-right"></i></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>




            <!-- start of edit popup -->

            <div id="myModal" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h5 class="modal-title">Edit Therapeutic Area</h5>
                        </div>

                      <form action="edit_therapeutic" method="post" name="edit_therapeutic" id="edit_therapeutic">
                            <div id="errorResponse"></div>
                              
                            <div class="panel panel-flat">
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label>Therapeutic Area:</label>
                                        <input type="text" class="form-control" name="therapeuticName" id="therapeuticName" placeholder="Enter the New Therapeutic Name">
                                        <input type="hidden" name="tid" id="tid">
                                    </div>



                                    <div class="text-right">
                                        <button type="button" onclick="edit_therapeutic_submit();" class="btn btn-primary">Update<i class="icon-arrow-right14 position-right"></i></button>
                                    </div>
                                </div>
                                  
                            </div>
                      </form>
                    </div>
                </div>
            </div>
            <!-- end of edit popup -->
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
</div>
<!-- /page content -->
@endsection