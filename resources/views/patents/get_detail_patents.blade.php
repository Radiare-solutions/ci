<?php
$i=$patent_detail['nav_key'];
$year=$patent_detail['yr'];
$applicant=$patent_detail['app'];

$patent_detail_arr_val=$patent_detail['content'][$i];


$patent_detail_arr=$patent_detail['content'];

$array_nav=$patent_detail['nav_key'];

$nav_array_size=sizeof($patent_detail_arr);


if($array_nav>0){   
$back_nav=$array_nav-1;
$patent_detail_arr_bk_v=$patent_detail['content'][$back_nav];
$title=$patent_detail_arr_bk_v['title'];
$back_link="return getPatentPopup('$back_nav','$title','$year',".json_encode($applicant).")";
}else{
$back_link="return false;";
}


if($array_nav !=  ($nav_array_size-1)){
$front_nav=$array_nav+1;
$patent_detail_arr_fr_v=$patent_detail['content'][$front_nav];
$title=$patent_detail_arr_fr_v['title'];
$front_link="return getPatentPopup('$front_nav','$title','$year',".json_encode($applicant).")";
}else{
$front_link="return false;";
}

?>

<div class="offcanvas-body" >		
   <p class="text-bold">
                           Bibliographic Data: {{ $patent_detail_arr_val["publication_info"]}}
                        </p>
                        <p><b>Inventor(s) :</b>{{ $patent_detail_arr_val["inventors"]}}</p>
                        <p><b>Applicant(s) :</b>{{ $patent_detail_arr_val["applicants"]}}</p>

                        <p><b> International Classification :</b>{{ $patent_detail_arr_val["ipcClassifications"]}}</p>
                        <p><b> Cooperative Classification :</b> {{ $patent_detail_arr_val["cpcClassifications"]}}</p>
                        <p><b>Application Number :</b> {{ $patent_detail_arr_val["application_no"]}}</p>
                        <p><b>Filed Date :</b>{{ $patent_detail_arr_val["filed_date"]}}</p>
                        <p><b>Abstract :</b>{{ $patent_detail_arr_val["abstract"]}}
   </p>
</div>
 <div class="force-padding stick-bottom-right">

     <a href="#" class="btn btn-icon-toggle btn-accent" onclick="{{$back_link}}">
                 <i class="md md-arrow-back"></i>
     </a>
     <a href="#" class="btn btn-floating-action btn-accent" onclick="{{$front_link}}">
         <i class="md md-arrow-forward"></i>
     </a>
 </div>
   
            
           	 
