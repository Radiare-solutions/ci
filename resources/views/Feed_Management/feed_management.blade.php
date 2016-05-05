@extends('layouts.app')

@section('content')

<!--Main content -->
<div class="content-wrapper">
    <!--    Content area -->
    <div class="content" id="feed_content">
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">Feed Management</h5>
                <div class="heading-elements">
                    <ul class="icons-list">
                        <li><a data-action="collapse"></a></li>
                        <li><a data-action="reload"></a></li>
                        <li><a data-action="close"></a></li>
                    </ul>
                </div>
            </div>

            <hr class="no-margin"/>	
            <button type="button" onclick="load_previous_feed('<?php echo $lastID;?>');" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_form_add"> <i class="icon-plus3"></i>  Add Feed</button>
            <div id="message_section" style="display: none;">
                <hr class="no-margin"/>
            </div>
            <table class="table datatable-basic table-bordered" id="feed_list">
                <thead>
                    <tr>
                        <th>Sl.No</th>
                        <th>Client Details</th>
                        <th>BG Details</th>
                        <th>Indication</th>
                        <th>Molecule</th>            
                        <?php 
                        foreach ($data_types as $dataType) {              
                          echo '<th>'.$dataType['typeName'].'</th>';
                        }
                        ?>

                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody >
                    <?php $i = 1; ?>
                    @foreach($feeds as $feed) 
                    <?php //echo '<pre>'; print_r($feed); exit; ?>
                    <tr>
                        <td>{{ $i }}</td>

                        <td>{{$feed['clientName']}}</td>
                        <td>{{$feed['bgName']}}</td>
                        <td>{{$feed['indication']}}</td>
                        <td>{{$feed['molecule']}}</td>
                        <?php 
                        foreach ($data_types as $dataType) {              
                          echo '<td>'.str_replace(",", "<br>",$feed[$dataType['typeName']]).'</td>';
                        }
                        ?>
                        <td class="text-center">
                            <ul class="icons-list">
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="icon-menu9"></i>
                                    </a>

                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li class="dropdown-header">Options</li>
                                        <li><a href="javascript:void(0);" data-toggle="modal" data-target="#modal_form_edit" onclick="load_edit_feed('<?php echo $feed['_id']; ?>');" ><i class="icon-pencil7"></i>Edit entry</a></li>
                                        <li><a href="javascript:void(0);" onclick="delete_feed_details('<?php echo $feed['_id']; ?>');"><i class="icon-bin"></i>Remove entry</a></li>

                                    </ul>
                                </li>
                            </ul>
                        </td>

                    </tr>
                    <?php $i++; ?>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!--Add New User Form-->

        <div id="modal_form_add" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h5 class="modal-title">Add New Feeds</h5>
                    </div>

                    <form name="add_feed" id="add_feed" method="post">
                        <div class="panel panel-flat">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="panel-body">


                                <div class="row">

                                    <div class="col-md-6">	
                                        <div class="form-group">
                                            <label>Client:</label>
                                            <select class="select" name="client_details" id="client_details" onchange="loadBG(this.value)">
                                                <option value="">select</option>
                                                <?php
                                                foreach ($client_list as $therapyDetail) {
                                                    echo '<option value="' . $therapyDetail['attributes']['_id'] . '">' . $therapyDetail['attributes']['Name'] . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">	
                                        <div class="form-group">
                                            <label>Business Group:</label>
                                            <select class="select" name="bg_details" id="bg_details">

                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Select: </label>
                                            <input type="radio" name="type" id="type" onclick="displayFeedSection(this.value);" value="indication">&nbsp; Indication&nbsp;&nbsp;
                                            <input type="radio" name="type" id="type" onclick="displayFeedSection(this.value);" value="molecule">&nbsp; Molecule
                                        </div>
                                    </div>

                                    <div id="molecule" class="hide">
                                        <div class="col-md-3">	
                                            <div class="form-group">
                                                <label>level 1:</label>
                                                <select class="select" name="level1_details" id="level1_details" onchange="loadFeedLevel2(this.value)">

                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-3">	
                                            <div class="form-group">
                                                <label>Level 2:</label>
                                                <select class="select" name="level2_details" id="level2_details" onchange="loadFeedMolecule()">

                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6">	
                                            <div class="form-group">
                                                <label>Molecule:</label>
                                                <select class="select" name="molecule_details" id="molecule_details">

                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="indication" class="hide">
                                        <div class="col-md-6">	
                                            <div class="form-group">
                                                <label>Therapeutic Area:</label>
                                                <select class="select" name="thera_details" id="thera_details" onchange="loadIndications(this.value, '')">

                                                </select>
                                            </div>
                                        </div>



                                        <div class="col-md-6">	
                                            <div class="form-group">
                                                <label>Indication:</label>
                                                <select class="select" name="indication_details" id="indication_details">

                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Data Type</label>
                                            <br>
<!--                                            <select name="link_type" id="link_type">
                                                <option value="">select</option> -->
                                            <input type="hidden" name="counter" id="counter" value=1>
                                            <?php
                                            foreach ($data_types as $dataType) {
                                                ?>
                                            <b><?php echo $dataType['typeName']; ?></b><br><input type="text" name="<?php echo $dataType['typeName']; ?>[]">&nbsp;&nbsp; <a href="javascript:void(0);" onclick="add_more('<?php echo $dataType['typeName']; ?>');">Add More</a><br/><div id="<?php echo $dataType['typeName']; ?>"></div><br>
                                                <?php
                                                // echo '<option value="'.$dataType['_id'].'">'.$dataType['typeName'].'</option>';
                                            }
                                            ?>                                           
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label>Add RSS Link:</label>
                                    <textarea rows="2" cols="5" class="form-control" placeholder="Enter RSS Link here" name='rss_feed'></textarea>
                                </div>

                                <div class="text-right">
                                    <button type="button" id="add_feed_details" class="btn btn-primary" onclick="add_new_feed();">Submit<i class="icon-arrow-right14 position-right"></i></button>
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
                        <h5 class="modal-title">Edit Feed</h5>
                    </div>

                    <form name="edit_feed" id="edit_feed" method="post">
                        <div class="panel panel-flat">
                            <input type="hidden" name="fid" id="fid">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="panel-body">


                                <div class="row">

                                    <div class="col-md-6">	
                                        <div class="form-group">
                                            <label>Client:</label>
                                            <select class="select" name="client_details_edit" id="client_details_edit" onchange="loadEditBG(this.value)">
                                                <option value="">select</option>
                                                <?php
                                                foreach ($client_list as $therapyDetail) {
                                                    echo '<option value="' . $therapyDetail['attributes']['_id'] . '">' . $therapyDetail['attributes']['Name'] . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">	
                                        <div class="form-group">
                                            <label>Business Group:</label>
                                            <select class="select" name="bg_details_edit" id="bg_details_edit">

                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Select: </label>
                                            <input type="radio" name="type_edit" id="type_edit" onclick="displayEditFeedSection(this.value, '', 'click');" value="indication">&nbsp; Indication&nbsp;&nbsp;
                                            <input type="radio" name="type_edit" id="type_edit" onclick="displayEditFeedSection(this.value, '', 'click');" value="molecule">&nbsp; Molecule
                                        </div>
                                    </div>

                                    <div id="molecule" class="hide">
                                        <div class="col-md-3">	
                                            <div class="form-group">
                                                <label>level 1:</label>
                                                <select class="select" name="level1_details_edit" id="level1_details_edit" onchange="loadEditFeedLevel2('', this.value)">

                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-3">	
                                            <div class="form-group">
                                                <label>Level 2:</label>
                                                <select class="select" name="level2_details_edit" id="level2_details_edit" onchange="loadEditFeedMolecule('', this.value, '');">

                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6">	
                                            <div class="form-group">
                                                <label>Molecule:</label>
                                                <select class="select" name="molecule_details_edit" id="molecule_details_edit">
                                                    <option value=""></option>

                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="indication" class="hide">
                                        <div class="col-md-6">	
                                            <div class="form-group">
                                                <label>Therapeutic Area:</label>
                                                <select class="select" name="thera_details_edit" id="thera_details_edit" onchange="loadEditIndications(this.value, '')">

                                                </select>
                                            </div>
                                        </div>



                                        <div class="col-md-6">	
                                            <div class="form-group">
                                                <label>Indication:</label>
                                                <select class="select" name="indication_details_edit" id="indication_details_edit">
                                                    <option value=""></option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Data Type</label><br>
                                            <input type="hidden" name="counter" id="counter" value=1>
                                            <?php
                                            foreach ($data_types as $dataType) {                                                
                                            ?>
                                            <b><?php echo $dataType['typeName']; ?></b><br><input type="text" name="<?php echo $dataType['typeName']; ?>[]">&nbsp;&nbsp; <a href="javascript:void(0);" onclick="edit_add_more('<?php echo $dataType['typeName']; ?>');">Add More</a><br/><div id="edit_<?php echo $dataType['typeName']; ?>"></div><br>
                                                <?php
                                            }
                                            ?>                                           

                                        </div>
                                    </div>

                                </div>


                                <div class="form-group">
                                    <label>Add RSS Link:</label>
                                    <textarea rows="2" cols="5" class="form-control" placeholder="Enter RSS Link here" name='rss_feed_edit' id="rss_feed_edit"></textarea>
                                </div>

                                <div class="text-right">
                                    <button type="button" class="btn btn-primary" onclick="update_feed()">Update<i class="icon-arrow-right14 position-right"></i></button>
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