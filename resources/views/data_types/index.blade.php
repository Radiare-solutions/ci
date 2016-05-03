@extends('layouts.types_mgmt')

@section('content')
<!-- Main sidebar -->
    <div class="sidebar sidebar-main sidebar-default sidebar-fixed bg-blue-800">
        <div class="sidebar-content">
            <!-- Main navigation -->
            @include('layouts/sidebar', array('page' => 'data_type'))
            <!-- /main navigation -->
        </div>
    </div>
    <!-- /main sidebar -->
<!--Main content -->
<div class="content-wrapper">
<!--    Content area -->
    <div class="content">
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">Data Type Management</h5>
                <div class="heading-elements">
                    <ul class="icons-list">
                        <li><a data-action="collapse"></a></li>
                        <li><a data-action="reload"></a></li>
                        <li><a data-action="close"></a></li>
                    </ul>
                </div>
            </div>

            <hr class="no-margin"/>	
            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_form_vertical"> <i class="icon-plus3"></i>  Add Data Type</button>
            <table class="table datatable-basic table-bordered">
                <thead>
                    <tr>
                        <th>Sl.No</th>
                        <th>DataType Name</th>
                       
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(count($details) > 0) {
 $i = 1; ?>
                    @foreach ($details as $detail)
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $detail['name'] }}</td>

                        <td class="text-center">
                            <ul class="icons-list">
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="icon-menu9"></i>
                                    </a>

                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li class="dropdown-header">Options</li>
                                        <li><a href="javascript:void(0);" data-toggle="modal" data-target="#modal_form_edit" onclick="load_edit_datatype('<?php echo $detail['_id'];?>');"><i class="icon-pencil7"></i>Edit entry</a></li>
                                        <li><a href="javascript:void(0);" onclick="delete_datatype('<?php echo $detail['_id']; ?>')"><i class="icon-bin"></i>Remove entry</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </td>
                    </tr>
                    <?php $i++; 
                    ?>
                    @endforeach
                    <?php } ?>
                </tbody>
            </table>
        </div>
<!--AddRole Starts-->

        <div id="modal_form_vertical" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h5 class="modal-title">Add New Data Type</h5>
                    </div>

                    <form method="post" id="add_data_type" name="add_data_type">
                        <div id="errorResponse"></div>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="panel panel-flat">
                            <div class="panel-body">
                                <div class="form-group">
                                    <label>Data Type Name :</label>
                                    <input type="text" name="dataTypeName" id="dataTypeName" class="form-control" placeholder="Enter New Data Type">
                                </div>

                                <div class="text-right">
                                    <button type="button" onclick="add_new_data_type_submit();" class="btn btn-primary">Submit<i class="icon-arrow-right14 position-right"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--Edit role Starts-->
        <div id="modal_form_edit" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h5 class="modal-title">Edit Data Type</h5>
                    </div>

                    <form method="post" id="edit_data_type" name="edit_data_type">
                        <div id="errorResponse"></div>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="panel panel-flat">
                            <div class="panel-body">
                                <div class="form-group">
                                    <label>Data Type Name :</label>
                                    <input type="hidden" name="dataTypeID" id="dataTypeID">
                                    <input type="text" name="editDataTypeName" id="editDataTypeName" class="form-control" placeholder="Edit Data Type Name">
                                </div>

                                <div class="text-right">
                                    <button type="button" onclick="edit_data_type_submit();" class="btn btn-primary">Update<i class="icon-arrow-right14 position-right"></i></button>
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