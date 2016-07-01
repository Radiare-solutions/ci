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


if($array_nav !=  ($nav_array_size-1)) 
{
$front_nav=$array_nav+1;
$front_link="return getDetailConf('$front_nav','$month','$year')";
}else{
$front_link="return false;";
}

?>

		
                   <p class="text-bold">{{ $conf_detail_arr_val["conf_title"]}}</p>
                   @if(array_key_exists("dates",$conf_detail_arr_val))<p><b>Dates : </b>{{$conf_detail_arr_val["dates"]}}</p>@endif
                   @if(array_key_exists("location",$conf_detail_arr_val))<p><b>Location :</b>{{$conf_detail_arr_val["location"]}}</p>@endif
                   @if(array_key_exists("abstract",$conf_detail_arr_val))<p><b>Abstract :</b>{{$conf_detail_arr_val["abstract"]}}</p>@endif
                   @if(array_key_exists("related_subject",$conf_detail_arr_val))<p><b>Related subject(s) :</b>{{$conf_detail_arr_val["related_subject"]}}</p>@endif
                   @if(array_key_exists("contact",$conf_detail_arr_val))<p><b>Contact :</b>{{$conf_detail_arr_val["contact"]}}</p>@endif
                   @if(array_key_exists("topics",$conf_detail_arr_val))<p><b>Topics :</b>{{$conf_detail_arr_val["topics"]}}</p>@endif
                   @if(array_key_exists("event_website",$conf_detail_arr_val))<p><b>Event website :</b> <a href="{{$conf_detail_arr_val["event_website"]}}" target="_blank"> Visit for More Details </a></p>@endif
		</div>

		<div class="force-padding stick-bottom-right">

                    <a href="#" class="btn btn-icon-toggle btn-accent" onclick="<?php echo $back_link; ?>">
				<i class="md md-arrow-back"></i>
		    </a>
                    <a href="#" class="btn btn-floating-action btn-accent" onclick="<?php echo $front_link; ?>">
                        <i class="md md-arrow-forward"></i>
                    </a>
		</div>
            
           	 
