 
@extends('layouts.app')

@section('content')
<!-- Main content -->
<div class="content-wrapper">

    <!-- Content area -->
    <div class="content">

        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-flat">
                    <div class="panel-heading">
                        <h6 class="panel-title">Category Management</h6>
                        <div class="heading-elements">
                            <ul class="icons-list">
                                <li><a data-action="collapse"></a></li>
                                <li><a data-action="reload"></a></li>
                                <li><a data-action="close"></a></li>
                            </ul>
                        </div>
                        <a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>

                    <ul class="media-list media-list-linked media-list-bordered">

                        <div class="col-md-4 bg-blue-700 no-padding">

                            <li class="media p-10 pt-20 pb-20">
                                <a class="media-link" href="roles.html">
                                    <div class="media-body">
                                        <h6 class="media-heading text-bold">Roles</h6>
                                    </div>
                                </a>
                            </li>
                        </div>
                        <div class="col-md-4 bg-blue-700 no-padding">

                            <li class="media p-10 pt-20 pb-20">
                                <a class="media-link" href="users.html">
                                    <div class="media-body">
                                        <h6 class="media-heading text-bold">Users</h6>
                                    </div>
                                </a>
                            </li>
                        </div>
                        <div class="col-md-4 bg-blue-700 no-padding">

                            <li class="media p-10 pt-20 pb-20">
                                <a class="media-link" href="molecules.html">
                                    <div class="media-body">
                                        <h6 class="media-heading text-bold">Molecule</h6>
                                    </div>
                                </a>
                            </li>
                        </div>
                        <div class="col-md-4 bg-blue-600 no-padding">
                            <li class="media p-10 pt-20 pb-20">
                                <a class="media-link" href="indication.html">
                                    <div class="media-body">
                                        <h6 class="media-heading text-bold">Indication</h6>
                                    </div>
                                </a>
                            </li>
                        </div>
                        <div class="col-md-4 bg-blue-800 no-padding">

                            <li class="media p-10 pt-20 pb-20">
                                <a class="media-link" href="client.html">
                                    <div class="media-body">
                                        <h6 class="media-heading text-bold">Client</h6>
                                    </div>
                                </a>
                            </li>
                        </div>
                    </ul>
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
@endsection