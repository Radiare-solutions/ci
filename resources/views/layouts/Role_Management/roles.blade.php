@extends('layouts.role_mgmt')

@section('content')
<!-- Main sidebar -->
    <div class="sidebar sidebar-main sidebar-default sidebar-fixed bg-blue-800">
        <div class="sidebar-content">
            <!-- Main navigation -->
            @include('layouts/sidebar', array('page' => 'role'))
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
                <h5 class="panel-title">Role Management</h5>
                <div class="heading-elements">
                    <ul class="icons-list">
                        <li><a data-action="collapse"></a></li>
                        <li><a data-action="reload"></a></li>
                        <li><a data-action="close"></a></li>
                    </ul>
                </div>
            </div>

            <hr class="no-margin"/>	
            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_form_vertical"> <i class="icon-plus3"></i>  Add Role</button>
            <table class="table datatable-basic table-bordered">
                <thead>
                    <tr>
                        <th>Sl.No</th>
                        <th>Role Name</th>
                       
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(count($roles) > 0) {
 $i = 1; ?>
                    @foreach ($roles as $role)
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $role->Role_Name }}</td>

                        <td class="text-center">
                            <ul class="icons-list">
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="icon-menu9"></i>
                                    </a>

                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li class="dropdown-header">Options</li>
                                        <li><a href="javascript:void(0);" data-toggle="modal" data-target="#modal_form_edit" onclick="load_edit_role('<?php echo $role->_id;?>');"><i class="icon-pencil7"></i>Edit entry</a></li>
                                        <li><a href="javascript:void(0);" onclick="delete_role('<?php echo $role->_id;?>')"><i class="icon-bin"></i>Remove entry</a></li>
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
                        <h5 class="modal-title">Add New Roles</h5>
                    </div>

                    <form method="post" id="add_role" name="add_role">
                        <div id="errorResponse"></div>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="panel panel-flat">
                            <div class="panel-body">
                                <div class="form-group">
                                    <label>Role Name :</label>
                                    <input type="text" name="RoleName" class="form-control" placeholder="Enter New Role">
                                </div>

                                <div class="text-right">
                                    <button type="button" onclick="add_new_role();" class="btn btn-primary">Submit<i class="icon-arrow-right14 position-right"></i></button>
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
                        <h5 class="modal-title">Edit Role</h5>
                    </div>

                    <form method="post" id="edit_role" name="edit_role">
                        <div id="errorResponse"></div>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="panel panel-flat">
                            <div class="panel-body">
                                <div class="form-group">
                                    <label>Role Name :</label>
                                    <input type="hidden" name="RoleID" id="Edit_Role_Id">
                                    <input type="text" name="RoleName" id="Edit_Role_Name" class="form-control" placeholder="Edit Role Name">
                                </div>

                                <div class="text-right">
                                    <button type="button" onclick="edit_role_submit();" class="btn btn-primary">Submit<i class="icon-arrow-right14 position-right"></i></button>
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