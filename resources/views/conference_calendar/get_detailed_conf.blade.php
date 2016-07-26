<?php
$i=$conference_detail['nav_key'];
$month=$conference_detail['month'];
$year=$conference_detail['year'];

$conf_detail_arr_val=$conference_detail['content'][$i];

$conf_detail_arr=$conference_detail['content'];

$array_nav=$conference_detail['nav_key'];

$nav_array_size=sizeof($conf_detail_arr);

if($array_nav>0){
$back_nav=$array_nav-1;
$back_link="return getDetailConf('$back_nav','$month','$year')";
}else{
$back_link="return false;";
}


if($array_nav !=  ($nav_array_size-1)){
$front_nav=$array_nav+1;
$front_link="return getDetailConf('$front_nav','$month','$year')";
}else{
$front_link="return false;";
}

?>

 <div class="modal-header" style="background:#0090D9 !important;">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 id="myModalLabel" class="semi-bold text-white text-left">{{ $conf_detail_arr_val["conf_title"]}}</h4>
              <!--   <p class="no-margin text-black">ARVO 2016 Annual Meeting  | 01 May 2016 - 05 May 2016 | Seattle, United States </p> -->

            </div>
            <div class="modal-body" style="height:300px;overflow-y: auto;">
                <div class="row">
                    <div class="col-md-12">
                        @if(array_key_exists("dates",$conf_detail_arr_val))<p class="semi-bold text-black" >Dates : <span class="normal ">{{$conf_detail_arr_val["dates"]}}</span></p>@endif
    @if(array_key_exists("location",$conf_detail_arr_val))<p class="semi-bold text-black">Location :<span class="normal ">{{$conf_detail_arr_val["location"]}}</span></p>@endif
    @if(array_key_exists("abstract",$conf_detail_arr_val))<p class="semi-bold text-black">Abstract :<span class="normal ">{{$conf_detail_arr_val["abstract"]}}</span></p>@endif
    @if(array_key_exists("related_subject",$conf_detail_arr_val))<p class="semi-bold text-black">Related subject(s) :<span class="normal ">{{$conf_detail_arr_val["related_subject"]}}</span></p>@endif
    @if(array_key_exists("contact",$conf_detail_arr_val))<p class="semi-bold text-black">Contact :<span class="normal ">{{$conf_detail_arr_val["contact"]}}</span></p>@endif
    @if(array_key_exists("topics",$conf_detail_arr_val))<p class="semi-bold text-black">Topics :<span class="normal ">{{$conf_detail_arr_val["topics"]}}</span></p>@endif
    @if(array_key_exists("event_website",$conf_detail_arr_val))<p class="semi-bold text-black">Event website :<span class="normal "> <a href="{{$conf_detail_arr_val["event_website"]}}" target="_blank"> Visit for More Details </a></span></p>@endif
                    </div>
                </div>                         

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary pull-left" onclick="<?php echo $back_link; ?>"><i class="fa fa-angle-left"></i></button>
                <button type="button" class="btn btn-primary pull-left" onclick="<?php echo $front_link; ?>"><i class="fa fa-angle-right"></i></button>
            </div>
            
           	 
