<?php
$i = ($page*5)+1;
$str = '';
$total = 1;
if (count($details) > 0) {
    $total = $details['total'];
    foreach ($details as $detail) {
        $clas = "";
        if ($detail['status_name'] == 'Completed')
            $clas = "knob-success";
        else if ($detail['status_name'] == "Terminated")
            $clas = "knob-danger";
        else
            $clas = "knob-warning";
        if ($detail['title'] != "") {
            $str.='<div class="col-xs-1">
    <p class="text-medium text-lg text-black">' . $i . ')</p>
</div>
<div class="col-xs-11 no-padding">
    <p class="no-padding no-margin">
        <a class="text-medium text-lg text-primary" href="study-summary.html">' . $detail["title"] . '</a><br/>
    </p>
    <div class="col-md-10">
        <div class="col-md-4">
            <b>Phase : </b> ' . $detail["phase"] . '
        </div>
        <div class="col-md-6">
            <b>Condition : </b> ' . $detail["condition_name"] . '
        </div>
        <div class="col-md-12">
            <b>Interventions : </b> ' . strip_tags($detail["intervention"]) . '
        </div>
    </div>
    <div class="col-md-2 text-center ">
        <strong>' . $detail["status_name"] . '</strong>
        <br/>
        <div class="knob ' . $clas . ' knob-success-track knob-default-light-track size-1"><input type="text" class="dial" value="100" data-angleOffset=-125 data-angleArc=250 data-readOnly=true></div>
    </div>
</div>';
            $i++;
        }
    }
    if (($i > 5)||($total > 5)) {
        $str.='<ul class="pagination"><li class="disabled"><a href="#">«</a></li>';
        $pages = ceil($total/5);
        for ($j = 0; $j < $pages; $j++) {
            $active = "";
            $k = $j+1;
            if($page == $j)
                $active = "active";
            $str.='<li class="'.$active.'"><a href="javascript:void(0);" onclick="load_result_pager('.$j.');">' . $k . '<span class="sr-only">(current)</span></a></li>';
        }
        $str.="<li><a href='#'>»</a></li></ul>";
    }
} else {
    $str.= 'No Results Found';
}
$str.='<script>
$(".dial").each(function () {
			var options = materialadmin.App.getKnobStyle($(this));
			$(this).knob(options);
		});
</script>';
echo $str;
?>