@extends('layouts.cm')

@section('content')
<!-- Main sidebar -->
    <div class="sidebar sidebar-main sidebar-default sidebar-fixed bg-blue-800">
        <div class="sidebar-content">
            <!-- Main navigation -->
            @include('layouts/sidebar', array('page' => 'sponsor'))
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
                <h5 class="panel-title">Sponsor Management</h5>
                <div class="heading-elements">
                    <ul class="icons-list">
                        <li><a data-action="collapse"></a></li>
                        <li><a data-action="reload"></a></li>
                        <li><a data-action="close"></a></li>
                    </ul>
                </div>
            </div>

            <hr class="no-margin"/>	            
            <table class="table datatable-basic table-bordered">
                <thead>
                    <tr>
                        <th>Sl.No</th>
                        <th>Sponsor Name</th>
                       
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
                                        <li><a href="javascript:void(0);" data-toggle="modal" data-target="#modal_form_edit" onclick="load_edit_sponsor('<?php echo $detail['_id'];?>');"><i class="icon-pencil7"></i>Edit entry</a></li>
                                        <li><a href="javascript:void(0);" onclick="delete_sponsor('<?php echo $detail['_id']; ?>')"><i class="icon-bin"></i>Remove entry</a></li>
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
        <!--Edit role Starts-->
        <div id="modal_form_edit" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h5 class="modal-title">Edit Sponsor</h5>
                    </div>

                    <form method="post" id="edit_sponsor" name="edit_sponsor">
                        <div id="errorResponse"></div>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="panel panel-flat">
                            <div class="panel-body">
                                <div class="form-group">
                                    <label>Sponsor Name :</label>
                                    <input type="hidden" name="sponsorID" id="sponsorID">
                                    <input type="text" name="editSponsorName" id="editSponsorName" class="form-control" placeholder="Edit Sponsor Name">
                                </div>

                                <div class="text-right">
                                    <button type="button" onclick="edit_sponsor_submit();" class="btn btn-primary">Update<i class="icon-arrow-right14 position-right"></i></button>
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