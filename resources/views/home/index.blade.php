@extends('layouts.dashboard')

@section('content')
<div class="page-container row-fluid" style="padding-top:60px;">

  <!-- BEGIN PAGE CONTAINER-->
  <div class="page-content"> 




    <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
<div id="portlet-config" class="modal hide">
      <div class="modal-header">
        <button data-dismiss="modal" class="close" type="button"></button>
        <h3>Widget Settings</h3>
      </div>
      <div class="modal-body"> Widget settings form goes here </div>
    </div>
    <div class="clearfix"></div>
    <div class="content" style="padding-top:0 !important;">  
      <div class="row">
        <div class="col-md-8">
          <div class="row">
            <div class="col-md-12 m-b-10" >
            <div class="col-md-12">
            <div class="row tiles-container">
              <a href="#">
              <div class="col-md-4 width-200 height-200 tiles dark-blue" style="background:url('{{ URL::asset("images/home/news.png')") }} !important;">
                <div class="overlayer bottom-left">
                  <div class="p-l-5 p-b-5">
                    <h4 class="text-white bold">NEWS</h4>
                  </div>
                </div>
                
              </div>
            </a>
            <a href="#">
              <div class="col-md-4 width-200 height-200 tiles light-blue" style="margin-left:400px;background:url('{{ URL::asset("images/home/publications.png')" ) }} !important;">
                <div class="overlayer bottom-left">
                  <div class="p-l-5 p-b-5">
                    <h4 class="text-white bold">Publications</h4>
                  </div>
                </div>
               
              </div>
            </a>
            </div>
            <div class="row tiles-container">
              <div class="col-md-4 width-200 height-200 tiles no-background no-padding">
                <a href="#">
                 <div class="col-md-6 width-100 height-100 tiles red no-padding" style="margin-left:100px;margin-right:200px;background:url('{{ URL::asset("images/home/ConferenceCalendar.png')") }} !important;">
                 <div class="overlayer bottom-left">
                  <div class="p-l-5">
                    <h5 class="text-white bold">Conference Calendar</h5>
                  </div>
                </div>              
                
              </div>
            </a>
            <a href="#">
              <div class="col-md-6 width-100 height-100 tiles red no-padding" style="margin-left:200px;background:url('{{ URL::asset("images/home/AdverseReaction.png')") }} !important;"> 
              <div class="overlayer bottom-left">
                  <div class="p-l-5">
                    <h5 class="text-white bold">Adverse Reaction</h5>
                  </div>
                </div>              
                
              </div>
            </a>
                
              </div>
            <a href="#">
              <div class="col-md-4 width-200 height-200 tiles light-blue" style="margin-left:100px;background:url('{{ URL::asset("images/home/clinicalresearch.png')") }} !important;">
                <div class="overlayer bottom-left">
                  <div class="p-l-5 p-b-5">
                    <h4 class="text-white bold">Clinical Research</h4>
                  </div>
                </div>
               
              </div>
            </a>
              <div class="col-md-4 width-200 height-200 tiles  no-background no-padding">

            <a href="#">
                 <div class="col-md-6 width-100 height-100 tiles red no-padding" style="margin-left:100px;background:url('{{ URL::asset("images/home/ConferenceCoverage.png')") }} !important;">  
                 <div class="overlayer bottom-left">
                  <div class="p-l-5">
                    <h5 class="text-white bold">Conference Coverage</h5>
                  </div>
                </div>             
                
              </div>
              </a>
            <a href="#">
              <div class="col-md-6 width-100 height-100 tiles red no-padding" style="margin-right:100px;background:url('{{ URL::asset("images/home/Patents.png')") }} !important;"> 
              <div class="overlayer bottom-left">
                  <div class="p-l-5">
                    <h5 class="text-white bold">Patents</h5>
                  </div>
                </div>              
                
              </div>
            </a>
                
              </div>
            </div>
            <div class="row tiles-container">
              <div class="col-md-4 width-200 height-200 tiles no-background no-padding">

            <a href="#">
                 <div class="col-md-4 width-200 height-200 tiles dark-blue" style="background:url('{{ URL::asset("images/home/social.png')") }} !important;">
                <div class="overlayer bottom-left">
                  <div class="p-l-5 p-b-5">
                    <h4 class="text-white bold">Media Monitor</h4>
                  </div>
                </div>
                
              </div>
            </a>
              
                
              </div>
              
              <div class="col-md-4 width-200 height-200 tiles no-background no-padding">

            <a href="#">
              <div class="col-md-4 width-200 height-200 tiles light-blue" style="margin-left:400px;background:url('{{ URL::asset("images/home/PatientReviews.png')") }} !important;">
                <div class="overlayer bottom-left">
                  <div class="p-l-5 p-b-5">
                    <h4 class="text-white bold">Patient Reviews</h4>
                  </div>
                </div>
               
              </div>
                
                </a>
             
                
              </div>
            </div>










          </div>
          </div>

          </div>



         
           






        </div>
        <div class="col-md-4 no-padding">

           <div class="row tiles-container">
          <div class="m-l-10 ">
            <div class="tiles p-t-5 p-b-5 p-l-15 " style="background:#0089D1;">
              <div class="controller p-t-5 p-b-5 p-r-15 text-white">
              <i class="fa fa-2x fa-refresh"></i>
              </div>
              <h5 class="text-white semi-bold">What's New</h5>
  </div>
            <div class="tiles white p-r-5 ">
              <div class="p-t-5 p-b-0 b-b b-grey" style="background:#E9ECEE;">
                <div class="post p-l-20">
                  <div class="info-wrapper small-width1 inline">
                    <div class="info text-black ">
                      <p class="bold">Title</p>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="inline" style="width:20%;">
                    <div class="info text-black ">
                      <p class="bold">Type</p>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                </div>
              </div>
              <div class="p-t-5 p-b-0 b-b b-grey">
                <div class="post p-l-20">
                  <div class="info-wrapper small-width1 inline">
                    <div class="info text-black ">
                      <p>Title 1 </p>
                      <p class="muted small-text"> 28 June 2016 </p>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="inline" style="width:20%;">
                    <div class="info text-black ">
                      <p>News </p>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="inline pull-right">
                    <div class="tiles white p-t-5 p-l-5 p-b-5 p-r-5 inline"> <i class="fa fa-comment-o fa-lg"></i> </div>
                  </div>
                  <div class="clearfix"></div>
                </div>
              </div>
              <div class="p-t-5 p-b-0 b-b b-grey">
                <div class="post p-l-20">
                  <div class="info-wrapper small-width1">
                    <div class="info text-black ">
                      <p>Title 2 </p>
                      <p class="muted small-text"> 28 June 2016 </p>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="inline" style="width:20%;">
                    <div class="info text-black ">
                      <p>Patents</p>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="inline pull-right">
                    <div class="tiles white p-t-5 p-l-5 p-b-5 p-r-5 inline"> <i class="fa fa-comment-o fa-lg"></i> </div>
                  </div>
                  <div class="clearfix"></div>
                </div>
              </div>
              <div class="p-t-5 p-b-0 b-b b-grey">
                <div class="post p-l-20">
                  <div class="info-wrapper small-width1">
                    <div class="info text-black ">
                      <p>Title 3 </p>
                      <p class="muted small-text"> 28 June 2016 </p>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="inline" style="width:20%;">
                    <div class="info text-black ">
                      <p>Patient Review</p>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="inline pull-right">
                    <div class="tiles white p-t-5 p-l-5 p-b-5 p-r-5 inline"> <i class="fa fa-comment-o fa-lg"></i> </div>
                  </div>
                  <div class="clearfix"></div>
                </div>
              </div>
              <div class="p-t-5 p-b-0 b-b b-grey">
                <div class="post p-l-20">
                  <div class="info-wrapper small-width1">
                    <div class="info text-black ">
                      <p>Title 4 </p>
                      <p class="muted small-text"> 28 June 2016 </p>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="inline" style="width:20%;">
                    <div class="info text-black ">
                      <p>Conference Calendra</p>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="inline pull-right">
                    <div class="tiles white p-t-5 p-l-5 p-b-5 p-r-5 inline"> <i class="fa fa-comment-o fa-lg"></i> </div>
                  </div>
                  <div class="clearfix"></div>
                </div>
              </div>
              <div class="p-t-5 p-b-0 ">
                <div class="post p-l-20">
                  <div class="info-wrapper small-width1">
                    <div class="info text-black ">
                      <p>Title 5 </p>
                      <p class="muted small-text"> 28 June 2016 </p>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="inline" style="width:20%;">
                    <div class="info text-black ">
                      <p>News </p>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="inline pull-right">
                    <div class="tiles white p-t-5 p-l-5 p-b-5 p-r-5 inline"> <i class="fa fa-comment-o fa-lg"></i> </div>
                  </div>
                  <div class="clearfix"></div>
                </div>
              </div>
            </div>
            <div class="tiles grey p-t-5 p-b-5 ">
             <p class="text-center"> <a href="javascript:;" class="text-black semi-bold  small-text">Load More</a></p>
            </div>
          </div>
          <div class="m-l-10 ">
            <div class="tiles p-t-5 p-b-5 p-l-15 p-r-5 " style="background:#0089D1;">
              <div class="controller p-t-5 p-b-5 p-r-15 text-white">
              <i class="fa fa-2x fa-refresh"></i>
              </div>
              <h5 class="text-white semi-bold">Patient's Corner</h5>
            </div>
            <div class="tiles white ">
              <div class="p-t-5 p-b-0 b-b b-grey">
                <div class="post p-l-20">
                  <div class="info-wrapper small-width inline">
                    <div class="info text-black ">
                      <p>Lorem ipsum dolor sit amet, consectetuer a dipiscing elit. Aenean commodo ... <span class="bold italic">Read more</span></p>
                      <p class="muted small-text"> 28 June 2016 </p>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="inline pull-right">
                    <div class="tiles text-white p-t-5 p-l-5 p-b-5 p-r-5 inline"> <i class="fa fa-heart-o fa-lg"></i> </div>
                    <div class="tiles white p-t-5 p-l-5 p-b-5 p-r-5 inline"> <i class="fa fa-comment-o fa-lg"></i> </div>
                  </div>
                  <div class="clearfix"></div>
                </div>
              </div>
              <div class="p-t-5 p-b-0 b-b b-grey">
                <div class="post p-l-20">
                  <div class="info-wrapper small-width">
                    <div class="info text-black ">
                       <p>Lorem ipsum dolor sit amet, consectetuer a dipiscing elit. Aenean commodo ... <span class="bold italic">Read more</span></p>
                      <p class="muted small-text"> 28 June 2016 </p>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="inline pull-right">
                    <div class="tiles text-white p-t-5 p-l-5 p-b-5 p-r-5 inline"> <i class="fa fa-heart-o fa-lg"></i> </div>
                    <div class="tiles white p-t-5 p-l-5 p-b-5 p-r-5 inline"> <i class="fa fa-comment-o fa-lg"></i> </div>
                  </div>
                  <div class="clearfix"></div>
                </div>
              </div>
              <div class="p-t-5 p-b-0 ">
                <div class="post p-l-20">
                  <div class="info-wrapper small-width">
                    <div class="info text-black ">
                       <p>Lorem ipsum dolor sit amet, consectetuer a dipiscing elit. Aenean commodo ... <span class="bold italic">Read more</span></p>
                      <p class="muted small-text"> 28 June 2016 </p>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="inline pull-right">
                    <div class="tiles text-white p-t-5 p-l-5 p-b-5 p-r-5 inline"> <i class="fa fa-heart-o fa-lg"></i> </div>
                    <div class="tiles white p-t-5 p-l-5 p-b-5 p-r-5 inline"> <i class="fa fa-comment-o fa-lg"></i> </div>
                  </div>
                  <div class="clearfix"></div>
                </div>
              </div>
            </div>
            <div class="tiles grey p-t-5 p-b-5 ">
             <p class="text-center"> <a href="javascript:;" class="text-black semi-bold  small-text">Load More</a></p>
            </div>
          </div>

        
        </div>



        </div>

      </div>
     
      

    </div>
  </div>

 </div>
@endsection