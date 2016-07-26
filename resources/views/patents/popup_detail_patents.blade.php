<?php
$i = $patent_detail['nav_key'];
$year = $patent_detail['yr'];
$applicant = $patent_detail['app'];

$patent_detail_arr_val = $patent_detail['content'][$i];
$patent_detail_arr = $patent_detail['content'];
$array_nav = $patent_detail['nav_key'];

$nav_array_size = sizeof($patent_detail_arr);


if ($array_nav > 0) {
    $back_nav = $array_nav - 1;

    $back_link = "return getPatentPopup('$back_nav','$year'," . json_encode($applicant) . ")";
} else {
    $back_link = "return false;";
}


if ($array_nav != ($nav_array_size - 1)) {
    $front_nav = $array_nav + 1;
    $front_link = "return getPatentPopup('$front_nav','$year'," . json_encode($applicant) . ")";
} else {
    $front_link = "return false;";
}
?>
<div class="modal-header" style="background:#0090D9 !important;">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h4 id="myModalLabel" class="semi-bold text-black text-left">{{$patent_detail_arr_val['title']}}</h4>
</div>
<div class="modal-body" style='height:350px;overflow-y:auto'>
    <div class="row">
        <div class="col-md-12">
            <h4 class="semi-bold">Bibliographic Data:{{ $patent_detail_arr_val["publication_info"]}} </h4>
            <p class="semi-bold text-black">Inventor(s) : <span class="normal ">{{ $patent_detail_arr_val["inventors"]}}</span></p>
            <p class="semi-bold text-black">Applicant(s) : <span class="normal ">{{ $patent_detail_arr_val["applicants"]}}</span></p>
            <p class="semi-bold text-black">International Classification : <span class="normal">{{ $patent_detail_arr_val["ipcClassifications"]}}</span></p>
            <p class="semi-bold text-black">Cooperative Classification : <span class="normal">{{ $patent_detail_arr_val["cpcClassifications"]}}</span></p>
            <p class="semi-bold text-black">Application Number : <span class="normal">{{ $patent_detail_arr_val["application_no"]}}</span></p>
            <p class="semi-bold text-black">Filed Date : <span class="normal ">{{ $patent_detail_arr_val["filed_date"]}} </span></p>
            <p class="semi-bold text-black">Abstract : <span class="normal ">{{ $patent_detail_arr_val["abstract"]}}</span></p>
        </div>
    </div>                         

</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close</button>
    <button type="button" class="btn btn-primary pull-left" onclick="{{$back_link}}"><i class="fa fa-angle-left"></i></button>
    <button type="button" class="btn btn-primary pull-left" onclick="{{$front_link}}"><i class="fa fa-angle-right"></i></button>
</div>



