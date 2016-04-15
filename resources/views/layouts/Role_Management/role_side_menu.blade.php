@extends('layouts.app')
@section('sidemenu')
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
                @endsection