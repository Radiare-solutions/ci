<!DOCTYPE html>
<html lang="en">
	<head>
		<title>@yield('title')</title> 

		<!-- BEGIN META -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="keywords" content="your,keywords">
		<meta name="description" content="Short explanation about this website">
                <meta name="_token" content="{!! csrf_token() !!}"/>
		<!-- END META -->

		<!-- BEGIN STYLESHEETS -->

		<!-- <link href='http://fonts.googleapis.com/css?family=Roboto:300italic,400italic,300,400,500,700,900' rel='stylesheet' type='text/css'/> -->
		<link  href="{{ URL::to('http://fonts.googleapis.com/css?family=Roboto:300italic,400italic,300,400,500,700,900') }}" rel='stylesheet' type='text/css'/>

		<!-- <link type="text/css" rel="stylesheet" href="{{ URL::to('assets/css/theme-1/bootstrap.css?1422792965') }}" />
		<link type="text/css" rel="stylesheet" href="{{ URL::to('assets/css/theme-1/materialadmin.css?1425466319') }}" />
		<link type="text/css" rel="stylesheet" href="{{ URL::to('assets/css/theme-1/font-awesome.min.css?1422529194') }}" />
		<link type="text/css" rel="stylesheet" href="{{ URL::to('assets/css/theme-1/material-design-iconic-font.min.css?1421434286') }}" />
		<link type="text/css" rel="stylesheet" href="{{ URL::to('assets/owl.carousel.css') }}" />
		<link type="text/css" rel="stylesheet" href="{{ URL::to('assets/owl.carousel.theme.css') }}" /> -->

                        <link type="text/css" rel="stylesheet" href="{{ URL::asset("css/theme-1/bootstrap.css?1422792965") }}" />
        <link type="text/css" rel="stylesheet" href="{{ URL::asset("css/theme-1/materialadmin.css?1425466319") }}" />
        <link type="text/css" rel="stylesheet" href="{{ URL::asset("css/theme-1/font-awesome.min.css?1422529194") }}" />
        <link type="text/css" rel="stylesheet" href="{{ URL::asset("css/theme-1/material-design-iconic-font.min.css?1421434286") }}" />
        <link type="text/css" rel="stylesheet" href="{{ URL::asset("css/owl.carousel.css") }}" />
		<link type="text/css" rel="stylesheet" href="{{ URL::asset("css/owl.carousel.theme.css") }}" />
                
<style>

.card-head header {
    display: inline-block;
    font-size: 18px;
    line-height: 15px;
    padding: 11px 24px;
    vertical-align: middle;
}

.card-head {
 
    line-height: 32px;
    min-height: 36px;
 }

#header.header-inverse {
   background: #006699;
    color: rgba(255, 255, 255, 0.6);
}

.extrasmall-padding {
    padding:2px !important;
}
.list .tile .tile-text {
    font-size: 12px;
    padding: 0;
    width: 100%;
}
.small-y-padding {
    padding: 0 12px;
}

.list .tile .tile-text small {
    display: block;
    font-size: 14px;
    opacity: 1;
    color:#090999;
    font-weight: 400;
}
.pin{
	color: #000000;
	font-size: 10px;
	height: 90px;
	line-height: 9px;
	padding: 10px;
	text-align: center;
	width: 90px;
}

.pin1{

background-image: url('images/stick-note/1.png');

}
.pin2{

background-image: url('images/stick-note/2.png');

}
.pin3{

background-image: url('images/stick-note/3.png');

}
.pin4{

background-image: url('images/stick-note/4.png');

}
.pin5{

background-image: url('images/stick-note/5.png');

}
.pin6{

background-image: url('images/stick-note/6.png');

}
.pin7{

background-image: url('images/stick-note/7.png');

}

.pin8{

background-image: url('images/stick-note/8.png');

}
.border-b{
border-bottom:#D2D0D5 1px solid !important;


}
.cal-1{
background-color: #d3935B !important;
color:#fff;


}

.cal-2{
background-color: #56a55b !important;
color:#fff;
}

.cal-3{
background-color: #17becf !important;
color:#fff;
}
.cal-4{
background-color: #ff9896 !important;
color:#fff;
}

.cal-bg{
background: url("images/cal-bg/cal-bg.png");
}

</style>

	</head>
	<body class="menubar-hoverable header-fixed menubar-first ">

		<!-- BEGIN HEADER-->
		<header id="header" class="">
			<div class="headerbar">

				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="headerbar-left">
					<ul class="header-nav header-nav-options">
						<li class="header-nav-brand" >
							<div class="brand-holder">
								<a href="#">
									<img src="assets/logo/rad-logo.png"/>
								</a>
							</div>
						</li>
						<li class="header-nav-brand" >
							<div class="brand-holder">
								<h2 class="small-padding no-margin" style="border-left:2px #C4C4C4 solid;text-transform: capitalize; color:#FF7900;">Conference calendar</h2>
							</div>
						</li>
						<li>
							<a class="btn btn-icon-toggle menubar-toggle" data-toggle="menubar" href="javascript:void(0);">
								<i class="fa fa-bars"></i>
							</a>
						</li>
					</ul>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="headerbar-right">
					<ul class="header-nav header-nav-options">
						<li>
							<!-- Search form -->
							<form role="search" class="navbar-search">
								<div class="form-group">
									<input type="text" placeholder="Enter your keyword" name="headerSearch" class="form-control">
								</div>
								<button class="btn btn-icon-toggle ink-reaction" type="submit"><i class="fa fa-search"></i></button>
							</form>
						</li>
						<li class="dropdown hidden-xs">
							<a data-toggle="dropdown" class="btn btn-icon-toggle btn-default" href="javascript:void(0);">
								<i class="fa fa-bell"></i><sup class="badge style-danger">4</sup>
							</a>
							<ul class="dropdown-menu animation-expand">
								<li class="dropdown-header">Today's messages</li>
								<li>
									<a href="javascript:void(0);" class="alert alert-callout alert-warning">
										<img alt="" src="http://www.codecovers.eu/assets/img/modules/materialadmin/avatar2.jpg?1422538624" class="pull-right img-circle dropdown-avatar">
										<strong>Alex Anistor</strong><br>
										<small>Testing functionality...</small>
									</a>
								</li>
								<li>
									<a href="javascript:void(0);" class="alert alert-callout alert-info">
										<img alt="" src="http://www.codecovers.eu/assets/img/modules/materialadmin/avatar3.jpg?1422538624" class="pull-right img-circle dropdown-avatar">
										<strong>Alicia Adell</strong><br>
										<small>Reviewing last changes...</small>
									</a>
								</li>
								<li class="dropdown-header">Options</li>
								<li><a href="http://www.codecovers.eu/materialadmin/pages/login">View all messages <span class="pull-right"><i class="fa fa-arrow-right"></i></span></a></li>
								<li><a href="http://www.codecovers.eu/materialadmin/pages/login">Mark as read <span class="pull-right"><i class="fa fa-arrow-right"></i></span></a></li>
							</ul><!--end .dropdown-menu -->
						</li><!--end .dropdown -->
						<li class="dropdown hidden-xs">
							<a data-toggle="dropdown" class="btn btn-icon-toggle btn-default" href="javascript:void(0);">
								<i class="fa fa-area-chart"></i>
							</a>
							<ul class="dropdown-menu animation-expand">
								<li class="dropdown-header">Server load</li>
								<li class="dropdown-progress">
									<a href="javascript:void(0);">
										<div class="dropdown-label">
											<span class="text-light">Server load <strong>Today</strong></span>
											<strong class="pull-right">93%</strong>
										</div>
										<div class="progress"><div style="width: 93%" class="progress-bar progress-bar-danger"></div></div>
									</a>
								</li><!--end .dropdown-progress -->
								<li class="dropdown-progress">
									<a href="javascript:void(0);">
										<div class="dropdown-label">
											<span class="text-light">Server load <strong>Yesterday</strong></span>
											<strong class="pull-right">30%</strong>
										</div>
										<div class="progress"><div style="width: 30%" class="progress-bar progress-bar-success"></div></div>
									</a>
								</li><!--end .dropdown-progress -->
								<li class="dropdown-progress">
									<a href="javascript:void(0);">
										<div class="dropdown-label">
											<span class="text-light">Server load <strong>Lastweek</strong></span>
											<strong class="pull-right">74%</strong>
										</div>
										<div class="progress"><div style="width: 74%" class="progress-bar progress-bar-warning"></div></div>
									</a>
								</li><!--end .dropdown-progress -->
							</ul><!--end .dropdown-menu -->
						</li><!--end .dropdown -->
					</ul>
					
					<ul class="header-nav header-nav-profile">
						<li class="dropdown">
							<a href="javascript:void(0);" class="dropdown-toggle ink-reaction" data-toggle="dropdown">
								<img src="assets/img/avatar1.jpg?1403934956" alt="" />
								<span class="profile-info">
									Steve Jobs
									<small>Administrator</small>
								</span>
							</a>
							<ul class="dropdown-menu animation-dock">
								<li class="dropdown-header">Config</li>
								<li><a href="#">My profile</a></li>
								<li><a href="#">My blog <span class="badge style-danger pull-right">16</span></a></li>
								<li><a href="#">My appointments</a></li>
								<li class="divider"></li>
								<li><a href="#"><i class="fa fa-fw fa-lock"></i> Lock</a></li>
								<li><a href="#"><i class="fa fa-fw fa-power-off text-danger"></i> Logout</a></li>
							</ul><!--end .dropdown-menu -->
						</li><!--end .dropdown -->
					</ul><!--end .header-nav-profile -->
					
				</div><!--end #header-navbar-collapse -->
			</div>
		</header>
		<!-- END HEADER-->

		<!-- BEGIN BASE-->
		<div id="base">
                    
                   <!-- BEGIN OFFCANVAS LEFT -->
                   <div class="offcanvas" >
                       	<!-- BEGIN OFFCANVAS DEMO LEFT -->
                        <div id="offcanvas-demo-size4" class="offcanvas-pane width-12" >
                            <div class="offcanvas-head card-bordered style-accent">
                                <header id="conf_month"></header>
                                <div class="offcanvas-tools">
                                        <a class="btn btn-icon-toggle btn-default-light pull-right" data-dismiss="offcanvas">
                                                <i class="md md-close"></i>
                                        </a>
                                </div>
                                </div>

                            <div class="offcanvas-body" id="detailed_conference">
                                
                            </div>
                        </div>
                   </div>

		<!-- BEGIN CONTENT-->
		<div id="content">

			<!-- BEGIN PROFILE HEADER -->
			<section class="full-bleed">
				<div class="section-body no-y-padding ">
					<!--<div class="img-backdrop" style="background-image: url('assets/img/img16.jpg')"></div>-->
				<!-- 	<div class="overlay overlay-shade-top stick-top-left height-3"></div> -->
					<div class="row">
						
						<div class="col-md-4 col-xs-2 ">
							<div class="card-actionbar-row pull-left ">
                                                            <a onclick="prevYear()" id="anchorPrev" class="width-1 btn btn-icon-toggle btn-white" href="#">
                                                                <i class="fa fa-lg fa-chevron-left" ></i>
                                                            </a>
									
							</div>
						</div><!--end .col -->
						<div class="col-md-4 text-center col-xs-8 small-padding">
							<h2 class="text-accent text-ultra-bold no-margin" id="year_conference"></h2>
						</div><!--end .col -->
						<div class="col-md-4 col-xs-2 ">
							<div class="card-actionbar-row pull-right ">
									
                                                            <a onclick="nextYear()" id="anchorNext" class="width-1 btn btn-icon-toggle btn-white" href="#">
                                                                <i class="fa fa-lg fa-chevron-right"></i>
                                                            </a>
									
							</div>
						</div>

					
					</div><!--end .row -->

					
					
				</div><!--end .section-body -->
			</section>
			<!-- END PROFILE HEADER  -->

			@yield('CalenderMonth') <!-- bring all calender months -->

			
				
		</div><!--end #content-->
			<!-- END CONTENT -->

			<!-- BEGIN MENUBAR-->
			<div id="menubar" class="menubar-inverse ">
				<div class="menubar-fixed-panel" style="background:#fff;">
					<div>
						<a class="btn btn-icon-toggle btn-default menubar-toggle" data-toggle="menubar" href="javascript:void(0);">
							<i class="fa fa-bars"></i>
						</a>
					</div>
					<div class="expanded">
						<a href="#">
							<img src="assets/logo/rad-logo.png"/>
						</a>
					</div>
				</div>
				<div class="menubar-scroll-panel">

					<!-- BEGIN MAIN MENU -->
					<ul id="main-menu" class="gui-controls">

					
						<li>
							<a class="active" href="#" >
								<div class="gui-icon"><i class="md md-home"></i></div>
								<span class="title">Dashboard</span>
							</a>
						</li>
						<li>
							<a href="#" >
								<div class="gui-icon"><i class="md md-home"></i></div>
								<span class="title">Dashboard</span>
							</a>
						</li>
						<li>
							<a href="#" >
								<div class="gui-icon"><i class="md md-home"></i></div>
								<span class="title">Dashboard</span>
							</a>
						</li>
						<li>
							<a href="#" >
								<div class="gui-icon"><i class="md md-home"></i></div>
								<span class="title">Dashboard</span>
							</a>
						</li>
						

					

						

					

					

					


					</ul><!--end .main-menu -->
					<!-- END MAIN MENU -->

					<div class="menubar-foot-panel">
						<small class="no-linebreak hidden-folded">
							<!-- <span class="opacity-75">Copyright &copy; 2014</span> <strong>CodeCovers</strong> -->
						</small>
					</div>
				</div><!--end .menubar-scroll-panel-->
			</div><!--end #menubar-->
			<!-- END MENUBAR -->

		

		</div><!--end #base-->
		<!-- END BASE -->

		<!-- BEGIN JAVASCRIPT -->                
                 <script src="{{ URL::asset("js/libs/jquery/jquery-1.11.2.min.js") }}"></script>
        <script src="{{ URL::asset("js/libs/jquery/jquery-migrate-1.2.1.min.js") }}"></script>
        <script src="{{ URL::asset("js/libs/bootstrap/bootstrap.min.js") }}"></script>
        <script src="{{ URL::asset("js/libs/spin.js/spin.min.js") }}"></script>
        <script src="{{ URL::asset("js/libs/autosize/jquery.autosize.min.js") }}"></script>
        <script src="{{ URL::asset("js/libs/nanoscroller/jquery.nanoscroller.min.js") }}"></script>
        
        <script src="{{ URL::asset("js/owl.carousel.min.js") }}"></script>
        
                <script src="{{ URL::asset("js/core/source/App.js") }}"></script>
                        <script src="{{ URL::asset("js/core/source/AppNavigation.js") }}"></script>
        <script src="{{ URL::asset("js/core/source/AppOffcanvas.js") }}"></script>
        <script src="{{ URL::asset("js/core/source/AppCard.js") }}"></script>
        <script src="{{ URL::asset("js/core/source/AppForm.js") }}"></script>
        <script src="{{ URL::asset("js/core/source/AppNavSearch.js") }}"></script>
        <script src="{{ URL::asset("js/core/source/AppVendor.js") }}"></script>
        <script src="{{ URL::asset("js/core/demo/Demo.js") }}"></script>

		<!-- END JAVASCRIPT -->
<script>

$(document).ready(function(){
  $(".owl-carousel").owlCarousel(
		{
			  nav:true,
			  navText: [
      "<i class='icon-chevron-left icon-white'><</i>",
      "<i class='icon-chevron-right icon-white'>></i>"
      ],
		}
  	);
 
});

$(document).ready(function(){
  $(".owl-carousel1").owlCarousel(
		{
			  nav:true,
			    navText: [
      "<i class='icon-chevron-left icon-white'><</i>",
      "<i class='icon-chevron-right icon-white'>></i>"
      ]
		}
  	);
 
});
$(document).ready(function(){
  $(".owl-carousel2").owlCarousel(
		{
			  nav:true,
			    navText: [
      "<i class='icon-chevron-left icon-white'><</i>",
      "<i class='icon-chevron-right icon-white'>></i>"
      ]
		}
  	);
 
});

$(document).ready(function(){
  $(".owl-carousel3").owlCarousel(
		{
			  nav:true,
			    navText: [
      "<i class='icon-chevron-left icon-white'><</i>",
      "<i class='icon-chevron-right icon-white'>></i>"
      ]
		}
  	);
 
});
$(document).ready(function(){
  $(".owl-carousel4").owlCarousel(
		{
			  nav:true,
			    navText: [
      "<i class='icon-chevron-left icon-white'><</i>",
      "<i class='icon-chevron-right icon-white'>></i>"
      ]
		}
  	);
 
});

$(document).ready(function(){
  $(".owl-carousel5").owlCarousel(
		{
			  nav:true,
			    navText: [
      "<i class='icon-chevron-left icon-white'><</i>",
      "<i class='icon-chevron-right icon-white'>></i>"
      ]
		}
  	);
    
if (window.location.href === "<?php $urlname=Route::getCurrentRoute()->getPath(); echo url("$urlname"); ?>") {
    window.history.pushState("object or string", "Title", "<?php $urlname=Route::getCurrentRoute()->getPath(); echo url("$urlname"); ?>"+"?year="+new Date().getFullYear());
    window.location.reload();
}
    $('#year_conference').text(getParameter('year'));
    
});

function getParameter(theParameter) { 
  var params = window.location.search.substr(1).split('&');
  for (var i = 0; i < params.length; i++) {
    var p=params[i].split('=');
	if (p[0] == theParameter) {
	  return decodeURIComponent(p[1]);
	}
  }
  return false;
}

function getDetailConf(nav_key,month,year){
    $.ajax({
              url: '/ci_conf_calendar_1',
              type: "get",
              data:{'month':month,'year':year,'nav_key':nav_key},
              success: function(data){
                $('#conf_month').html(month+" Conference Event");
                $('#detailed_conference').html(data);
              }
        });   
}
function nextYear(){
    var year=$('#year_conference').text();
    var limit_year=parseInt(new Date().getFullYear())+5;
    if(limit_year > year){
    var text=parseInt(year)+1; 
    $('#anchorNext').attr("href","<?php echo Route::getCurrentRoute()->getPath(); ?>"+'?year='+text);
    }else{
    $('#anchorPrev').removeAttr("onclick");
    $('#anchorNext').attr("onclick","return false;");
    }
}

function prevYear(){
  var year=$('#year_conference').text();
  var limit_year=new Date().getFullYear();
  if(limit_year < year){
  var text= parseInt(year)-1; 
  $('#anchorPrev').attr("href","<?php echo Route::getCurrentRoute()->getPath(); ?>"+'?year='+text);
  }else{
  $('#anchorPrev').removeAttr("onclick");
  $('#anchorPrev').attr("onclick","return false;");
  }
}
</script>
>
</body>
</html>
