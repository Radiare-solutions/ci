<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<meta charset="utf-8" />
<title></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<!-- BEGIN PLUGIN CSS -->
<link href="{{ URL::asset("css/theme-1/libs/pace/pace-theme-flash.css") }}" rel="stylesheet" type="text/css" media="screen"/>
<!-- END PLUGIN CSS -->
<!-- BEGIN CORE CSS FRAMEWORK -->
<link href="{{ URL::asset("css/bootstrap.min.css") }}" rel="stylesheet" type="text/css"/>
<link href="{{ URL::asset("css/bootstrap-theme.min.css") }}" rel="stylesheet" type="text/css"/>
<link href="{{ URL::asset("css/font-awesome.css") }}" rel="stylesheet" type="text/css"/>
<link href="{{ URL::asset("css/animate.min.css") }}" rel="stylesheet" type="text/css"/>
<link href="{{ URL::asset("css/theme-1/libs/jquery-scrollbar/jquery.scrollbar.css") }}" rel="stylesheet" type="text/css"/>
<!-- END CORE CSS FRAMEWORK -->
<!-- BEGIN CSS TEMPLATE -->
<link href="{{ URL::asset("css/style.css") }}" rel="stylesheet" type="text/css"/>
<link href="{{ URL::asset("css/responsive.css") }}" rel="stylesheet" type="text/css"/>
<link href="{{ URL::asset("css/custom-icon-set.css") }}" rel="stylesheet" type="text/css"/>
<link href="{{ URL::asset("css/custom.css") }}" rel="stylesheet" type="text/css"/>
<!-- END CSS TEMPLATE -->        
<style>
    body {
        background:url( {{ URL::asset("images/bg.jpg") }}) !important;            
    }
    .iconset {
        background:url( {{ URL::asset("images/icon/top-tray.png") }}) no-repeat;            
    }
</style>
</head>
<!-- END HEAD -->

<!-- BEGIN BODY -->
<body class="horizontal-menu">
<!-- BEGIN HEADER -->
<div class="header navbar navbar-inverse "> 
  <!-- BEGIN TOP NAVIGATION BAR -->
  <div class="navbar-inner">
  <div class="header-seperation"> 
    <ul class="nav pull-left notifcation-center" id="main-menu-toggle-wrapper" style="display:none">  
     <li class="dropdown"> 
      <a id="horizontal-menu-toggle" href="#"  class="" > <div class="iconset top-menu-toggle-white"></div> </a> 
     </li>     
    </ul>
      <!-- BEGIN LOGO --> 
      <a href="index.html"><img src="{{ URL::asset("images/logo/logo-inner.png") }}" class="logo" alt=""  data-src="{{ URL::asset("images/logo/logo-inner.png") }}" data-src-retina="{{ URL::asset("images/logo/logo-inner.png") }}" height="50%"/></a>
      <!-- END LOGO --> 
      <ul class="nav pull-right notifcation-center">  
        <li class="dropdown" id="header_task_bar"> <a href="index.html" class="dropdown-toggle active" data-toggle=""> <div class="iconset top-home"></div> </a> </li>
        <li class="dropdown" id="header_inbox_bar" > <a href="email.html" class="dropdown-toggle" > <div class="iconset top-messages"></div>  <span class="badge" id="msgs-badge">2</span> </a></li>
    <li class="dropdown" id="portrait-chat-toggler" style="display:none"> <a href="#sidr" class="chat-menu-toggle"> <div class="iconset top-chat-white "></div> </a> </li>        
      </ul>
      </div>
      <!-- END RESPONSIVE MENU TOGGLER --> 
      <div class="header-quick-nav text-center " > 
      <!-- BEGIN TOP NAVIGATION MENU -->
    <div class="pull-left">
        <ul class="nav quick-section m-t-0">
        <li class="quicklinks"> 
          <a href="#" class="">
            <img src="{{ URL::asset("images/logo/logo-inner.png") }}" width="50" height="50"/>
            </a> 
        </li>
        <li class="quicklinks  m-t-15 "> <span class="h-seperate"></span></li>
        <li class="quicklinks"> 
          <a href="#" class="" >
            <h3 class="text-Black"><span class="semi-bold">Welcome,</span>  <span class="light underline">Hi David </span></h3>
            </a> 
        </li>
    
      </ul>
    </div>   

    <!-- END TOP NAVIGATION MENU -->
   <!-- BEGIN CHAT TOGGLER -->
      <div class="pull-right"> 
        <ul class="nav quick-section ">
          <li class="m-r-10 input-prepend inside search-form no-boarder">
        <span class="add-on"> <span class="iconset top-search"></span></span>
        <input name="" type="text"  class="no-border " placeholder="Search" style="width:250px;">
      </li> 
      <li class="quicklinks"> <span class="h-seperate"></span></li> 
          <li class="quicklinks"> 
        <a href="#">            
          <i class="fa fa-bookmark-o"  style="color:#fff !important;"></i>
        </a>
      </li> 
      <li class="quicklinks"> <span class="h-seperate"></span></li> 
      <li class="quicklinks"> 
        <a href="#">            
          <i class="fa fa-bell-o"  style="color:#fff !important;"></i>
        </a>
      </li> 
    </ul>
    <div class="chat-toggler">  
        <a href="#" class="dropdown-toggle" id="my-task-list" data-placement="bottom"  data-content='' data-toggle="dropdown" data-original-title="Notifications">
          <div class="profile-pic"> 
          <img src="{{ URL::asset("images/profiles/avatar_small.jpg") }}"  alt="" data-src="{{ URL::asset("images/profiles/avatar_small.jpg") }}" data-src-retina="{{ URL::asset("images/profiles/avatar_small.jpg") }}" width="60" height="60" /> 
        </div> 
          
        </a>  
        
                    
      </div>
     <ul class="nav quick-section m-l-0 ">
      <li class="quicklinks">   
      <a id="chat-menu-toggle" href="#sidr" class="chat-menu-toggle" ><i class="fa fa-2x fa-comments" style="color:#fff !important;"><span class="badge badge-important" id="chat-message-count">1</span></i>
      </a> 
      </li> 
    </ul>
      </div>
     <!-- END CHAT TOGGLER -->
      </div> 
      <!-- END TOP NAVIGATION MENU --> 
   
  </div>
  <!-- END TOP NAVIGATION BAR --> 
</div>
<!-- END HEADER -->
<!-- BEGIN CONTAINER -->
@yield('content')
<!-- END CONTAINER -->
<!-- BEGIN CORE JS FRAMEWORK--> 
 <script src="{{ URL::asset("js/libs/jquery/jquery-1.11.2.min.js") }}"></script>
<script src="{{ URL::asset("js/libs/jquery-ui/jquery-ui-1.10.1.custom.min.js") }}" type="text/javascript"></script> 
<script src="{{ URL::asset("js/libs/breakpoints/breakpoints.js") }}" type="text/javascript"></script> 
<script src="{{ URL::asset("js/libs/jquery-unveil/jquery.unveil.min.js") }}" type="text/javascript"></script> 
<!-- END CORE JS FRAMEWORK --> 
<!-- BEGIN PAGE LEVEL JS --> 	
<script src="{{ URL::asset("js/libs/jquery-scrollbar/jquery.scrollbar.min.js") }}" type="text/javascript"></script>
<script src="{{ URL::asset("js/libs/pace/pace.min.js") }}" type="text/javascript"></script>  
<script src="{{ URL::asset("js/libs/jquery-numberAnimate/jquery.animateNumbers.js") }}" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS --> 	

<!-- BEGIN CORE TEMPLATE JS --> 
<script src="{{ URL::asset("js/core.js") }}" type="text/javascript"></script> 
<script src="{{ URL::asset("js/chat.js") }}" type="text/javascript"></script> 
<script src="{{ URL::asset("js/demo.js") }}" type="text/javascript"></script> 
<!-- END CORE TEMPLATE JS --> 


        <script src="{{ URL::asset("js/libs/jquery/jquery-migrate-1.2.1.min.js") }}"></script>
        <script src="{{ URL::asset("js/libs/bootstrap/bootstrap.min.js") }}"></script>
</body>
</html>