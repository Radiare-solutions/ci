@extends('layouts.user_mgmt')

@section('content')
<!-- Main sidebar -->
    <div class="sidebar sidebar-main sidebar-default sidebar-fixed bg-blue-800">
        <div class="sidebar-content">
            <!-- Main navigation -->
            @include('layouts/sidebar', array('page' => 'user'))
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
                <h5 class="panel-title">User Management</h5>
                <div class="heading-elements">
                    <ul class="icons-list">
                        <li><a data-action="collapse"></a></li>
                        <li><a data-action="reload"></a></li>
                        <li><a data-action="close"></a></li>
                    </ul>
                </div>
            </div>

            <hr class="no-margin"/>	


            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_form_add"> <i class="icon-plus3"></i>  Add User</button>


            <table class="table datatable-basic table-bordered">
                <thead>
                    <tr>
                        <th>Sl.No</th>
                        <th>User Name</th>
                        <th>Email Id</th>
                        <th>Role</th>
                       
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(count($listUserObj) > 0) { $i = 1;?>
                    @foreach ($listUserObj as $user)
                    <tr>
                        <td><?php echo $i;?></td>
                        <td>{{ $user['userName'] }}</td>
                        <td>{{ $user['email'] }}</td>                                               
                        <td>{{ $user['roleName'] }}</td>
                        <td class="text-center">
                            <ul class="icons-list">
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="icon-menu9"></i>
                                    </a>

                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li class="dropdown-header">Options</li>
                                        <li><a href="javascript:void(0);" data-toggle="modal" data-target="#modal_form_edit" onclick="edit_user_form('<?php echo $user['User_Id']; ?>');" ><i class="icon-pencil7"></i>Edit entry</a></li>
                                      
                                        <li><a href="javascript:void(0);" onclick="delete_user('<?php echo $user['User_Id'];?>')"><i class="icon-bin"></i>Remove entry</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </td>
                    </tr>
                    <?php $i++; ?>
                    @endforeach
                    <?php } ?>
                </tbody>
            </table>
        </div>
<!--Add New User Form-->

        <div id="modal_form_add" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h5 class="modal-title">Add New User</h5>
                    </div>

                    <form method="post" id="add_user" name="add_user">
                        <div id="errorResponse"></div>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="panel panel-flat">
                            <div class="panel-body">
                                <div class="form-group">
                                    <label>User Name :</label>
                                    <input type="text" name="User_Name" class="form-control" placeholder="Enter User Name">
                                </div>
                                <div class="form-group">
                                    <label>Email ID :</label>
                                    <input type="text" name="Email_Id" class="form-control" placeholder="Enter Email Id">
                                </div>
                                <div class="form-group">
                                    <label>Password :</label>
                                    <input type="password" name="Password" class="form-control" placeholder="Enter Password">
                                </div>
                                <div class="form-group">
                                    <label>Role Name :</label>
                                    <!--<input type="text" name="Role_Name" class="form-control" placeholder="Enter the New Molecule">-->
                                    <select name="Role_Name" class="form-control">
                                        <option value="" selected="">Select Role Name</option>
                                        @foreach($role_options as $role)
                                        <option value="{{$role->Role_Id}}">{{$role->Role_Name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                
                                <div class="text-right">
                                    <button type="button" onclick="new_user();" class="btn btn-primary">Submit<i class="icon-arrow-right14 position-right"></i></button>
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
                        <h5 class="modal-title">Edit User</h5>
                    </div>

                    <form method="post" id="edit_user" name="edit_user">
                        <div id="errorResponse"></div>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="editUserID" id="editUserID">
                        <div class="panel panel-flat">
                            <div class="panel-body">
                                <div class="form-group">
                                    <label>User Name :</label>
                                    <input type="text" name="User_Name"  id="Edit_User_Name" class="form-control" placeholder="Enter User Name">
                                </div>
                                <div class="form-group">
                                    <label>Email ID :</label>
                                    <input type="text" name="Email_Id" id="Edit_Email_Id" class="form-control" placeholder="Enter Email Id">
                                </div>
                                <div class="form-group">
                                    <label>Password :</label>
                                    <input type="password" name="Password" id="Edit_Password" class="form-control" placeholder="Enter Password">
                                </div>
                                <div class="form-group">
                                    <label>Role Name :</label>
                                    <!--<input type="text" name="Role_Name" class="form-control" placeholder="Enter the New Molecule">-->
                                    <select name="Role_Name" id="Edit_Role_Id" class="form-control">
                                        <option value="" selected="">Select Role Name</option>
                                        @foreach($role_options as $role)
                                        <option value="{{$role->Role_Id}}">{{$role->Role_Name}}</option>
                                        @endforeach
                                    
                                    </select>
                                </div>
                                
                                <div class="text-right">
                                    <button type="button" onclick="edit_user_submit();" class="btn btn-primary">Submit<i class="icon-arrow-right14 position-right"></i></button>
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