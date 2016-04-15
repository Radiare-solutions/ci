<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <title></title>

        <!-- Global stylesheets -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
        <link href="{{ URL::asset("css/icons/icomoon/styles.css") }}" rel="stylesheet" type="text/css">
        <link href="{{ URL::asset("css/bootstrap.css") }}" rel="stylesheet" type="text/css">
        <link href="{{ URL::asset("css/core.css") }}" rel="stylesheet" type="text/css">
        <link href="{{ URL::asset("css/components.css") }}" rel="stylesheet" type="text/css">
        <link href="{{ URL::asset("css/colors.css") }}" rel="stylesheet" type="text/css">
        <link href="{{ URL::asset("css/custom.css") }}" rel="stylesheet" type="text/css">
        <!-- /global stylesheets  -->

        <!--Core JS files -->
        <script type="text/javascript" src="{{ URL::asset("js/plugins/loaders/pace.min.js") }}"></script>
        <script type="text/javascript" src="{{ URL::asset("js/core/libraries/jquery.min.js") }}"></script>
        <script type="text/javascript" src="{{ URL::asset("js/core/libraries/bootstrap.min.js") }}"></script>
        <script type="text/javascript" src="{{ URL::asset("js/plugins/loaders/blockui.min.js") }}"></script>
        <!-- /core JS files -->

        <!-- Theme JS files -->
        <script type="text/javascript" src="{{ URL::asset("js/plugins/tables/datatables/datatables.min.js") }}"></script>
        <script type="text/javascript" src="{{ URL::asset("js/plugins/forms/selects/select2.min.js") }}"></script>
        <script type="text/javascript" src="{{ URL::asset("js/plugins/forms/styling/uniform.min.js") }}"></script>

        <script type="text/javascript" src="{{ URL::asset("js/core/app.js") }}"></script>
        <script type="text/javascript" src="{{ URL::asset("js/pages/datatables_basic.js") }}"></script>
        <script type="text/javascript" src="{{ URL::asset("js/pages/form_layouts.js") }}"></script>
        <script type="text/javascript" src="{{ URL::asset("js/common.js") }}"></script>

        <script type="text/javascript">
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
        </script>
        <!-- /theme JS files -->
    </head>

    <body class="navbar-top">

        <!-- Main navbar -->

        <div class="navbar navbar-inverse navbar-default header-highlight navbar-fixed-top bg-blue-800">

            <div class="navbar-header bg-white">
                <a class="navbar-brand" href="index.html">
                    <img src="assets/images/logo1.png" alt=""></a>

                <ul class="nav navbar-nav visible-xs-block">
                    <li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
                    <li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
                </ul>
            </div>

            <div class="navbar-collapse collapse" id="navbar-mobile">
                <ul class="nav navbar-nav pt-10">
                    <li><a class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3"></i></a></li>
                </ul>


                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown dropdown-user pt-10">
                        <a class="dropdown-toggle" data-toggle="dropdown">
                            <img src="assets/images/logo1.png" alt="">
                            <span>Victoria</span>
                            <i class="caret"></i>
                        </a>

                        <ul class="dropdown-menu dropdown-menu-right">
                            <li><a href="#"><i class="icon-user-plus"></i> My profile</a></li>
                            <li><a href="#"><i class="icon-coins"></i> My balance</a></li>
                            <li><a href="#"><span class="badge bg-teal-400 pull-right">58</span> <i class="icon-comment-discussion"></i> Messages</a></li>
                            <li class="divider"></li>
                            <li><a href="#"><i class="icon-cog5"></i> Account settings</a></li>
                            <li><a href="#"><i class="icon-switch2"></i> Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /main navbar -->


        <!-- Page container -->
        <div class="page-container">

            <!-- Page content -->
            <div class="page-content"> 
                <!-- Main sidebar -->
                <div class="sidebar sidebar-main sidebar-default sidebar-fixed bg-blue-800">
                    <div class="sidebar-content">
                        <!-- Main navigation -->
                        <div class="sidebar-category sidebar-category-visible">
                            <div class="category-content no-padding">
                                <ul class="navigation navigation-main navigation-accordion">
                                    <li class="active"><a href="home.html"><i class="icon-home4"></i> <span>Home</span></a></li>
                                    <li>
                                        <a href="#"><i class="icon-stack2"></i> <span>Category Management</span></a>
                                        <ul>
                                            <li><a href="roles.html">Roles</a></li>
                                            <li><a href="users.html">Users</a></li>
                                            <li><a href="molecules.html">Molecule</a></li>
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


                @yield('content')
            </div>
            <!-- /page content -->

        </div>
        <!-- /page container -->

    </body>
</html>
