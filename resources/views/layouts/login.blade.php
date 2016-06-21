<?php
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<meta charset="utf-8" />
<title></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<!-- BEGIN CORE CSS FRAMEWORK -->
<link href="{{ URL::asset("css/pace-theme-flash.css") }}" rel="stylesheet" type="text/css" media="screen"/>
<link href="{{ URL::asset("css/bootstrap.min.css") }}" rel="stylesheet" type="text/css"/>
<link href="{{ URL::asset("css/bootstrap-theme.min.css") }}" rel="stylesheet" type="text/css"/>
<link href="{{ URL::asset("css/font-awesome.css") }}" rel="stylesheet" type="text/css"/>
<link href="{{ URL::asset("css/animate.min.css") }}" rel="stylesheet" type="text/css"/>
<!-- END CORE CSS FRAMEWORK -->
<!-- BEGIN CSS TEMPLATE -->
<link href="{{ URL::asset("css/style.css") }}" rel="stylesheet" type="text/css"/>
<link href="{{ URL::asset("css/responsive.css") }}" rel="stylesheet" type="text/css"/>
<link href="{{ URL::asset("css/custom-icon-set.css") }}" rel="stylesheet" type="text/css"/>
<!-- END CSS TEMPLATE -->
<style>
h3 {
   margin-top:30px !important;
    position: relative;
    text-align: center;
    text-transform: uppercase;
    z-index: 1;
}

h3:before {
    border-top: 2px solid #dfdfdf;
    content:"";
    margin: 0 auto; /* this centers the line to the full width specified */
    position: absolute; /* positioning must be absolute here, and relative positioning must be applied to the parent */
    top: 15px; left: 0; right: 0; bottom: 0;
    width: 95%;
    z-index: -1;
}

h3 span { 
    /* to hide the lines from behind the text, you have to set the background color the same as the container */ 
    background: #0099C4; 
    padding: 0 15px; 
}

</style>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="error-body no-top" style="background:url('{{ URL::asset("images/Login.png") }}');background-size: 100% 100%;">
<div class="container-fluid">
  <div class="row login-container column-seperation">  
        <div class="col-md-8 hidden-md"></div>
        <div class="col-md-4 text-center" style="background:#fff;padding-top:5%;">
          <img class="text-center" src="{{ URL::asset("images/logo/logo.png") }}" />
            @yield('content')
      <footer style="padding-top:100px;">
<div class="row">
<span>Help</span> | <span>Contact Us </span> | <span>Terms and Conditions</span>
<br/>
<span>@ 2016. All Rights Reserved Radiare</span>

</div>

</footer>
        </div>
     
    
  </div>
</div>

<!-- END CONTAINER -->
<!-- BEGIN CORE JS FRAMEWORK-->
<script src="{{ URL::asset("js/plugins/jquery/jquery-1.11.2.min.js") }}" type="text/javascript"></script>
<script src="{{ URL::asset("js/plugins/bootstrap/bootstrap.min.js") }}" type="text/javascript"></script>
<script src="{{ URL::asset("js/plugins/pace/pace.min.js") }}" type="text/javascript"></script>
<script src="{{ URL::asset("js/plugins/jquery-validation/dist/jquery.validate.min.js") }}" type="text/javascript"></script>
<script src="{{ URL::asset("js/login.js") }}" type="text/javascript"></script>
<!-- BEGIN CORE TEMPLATE JS -->
<!-- END CORE TEMPLATE JS -->
</body>
</html>