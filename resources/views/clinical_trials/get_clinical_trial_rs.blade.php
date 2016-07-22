<?php
$pagenum = $pageNum;
$page_limit = $pageLimit;


if ($pagenum < 1) {
    $pagenum = 1;
} elseif ($pagenum > $last) {
    $pagenum = $last;
}
?>

<h4 class="semi-bold inline">Search Results: </h4>
<?php
if (count($statusArr) != 0) {
    echo implode("", ViewHelper::setValues($statusArr, 'status'));
}
if (count($phaseArr) != 0) {
    echo implode("", ViewHelper::setValues($phaseArr, 'phase'));
}
if (count($sponsorArr) != 0) {
    echo implode("", ViewHelper::setValues($sponsorArr, 'sponsor'));
}
if (count($conditionArr) != 0) {
    echo implode("", ViewHelper::setValues($conditionArr, 'condition'));
}
if (count($drugArr) != 0) {
    echo implode("", ViewHelper::setValues($drugArr, 'drug'));
}
if (count($estYearArr) != 0) {
    echo implode("", ViewHelper::setValues($estYearArr, 'year'));
}
?>

<div class="btn-group pull-right p-t-10"> 
    <?php echo ViewHelper::setPaginationLimit($page_limit, $pagenum, $ajax_method = 'getClinicalRS', $total); ?>
</div>

<br>
<table class="table table-hover no-more-tables" style="background:#fff !important;" >
    <thead>
        <tr>
            <th class="table-blue-bg" style="wdith:45%;">
                Title
                <a href="javascript:void(0);" onclick="getClinicalRS('<?php echo $pageLimit; ?>', '<?php echo $pagenum; ?>', 'clinical_title', -1)"><i class="fa p-l-5 text-white p-r-5 fa-caret-down"></i></a>
                <a href="javascript:void(0);" onclick="getClinicalRS('<?php echo $pageLimit; ?>', '<?php echo $pagenum; ?>', 'clinical_title', 1)"><i class="fa p-l-5 text-white p-r-5 fa-caret-up"></i></a>                             
            </th>
            <th class="text-center table-blue-bg" style="width:15%;">Condition</th>
            <th class="text-center table-blue-bg" style="width:25%;">Interventions</th>
            <th class="text-center table-blue-bg" style="width:15%;">Status
            </th>

        </tr>
    </thead>
    <tbody>

        <tr>
            <td class="no-padding-margin"><hr class="hr-aaa-b"></td>
            <td class="no-padding-margin"><hr class="hr-aaa-b"></td>
            <td class="no-padding-margin"><hr class="hr-aaa-b"></td>
            <td class="no-padding-margin"><hr class="hr-aaa-b"></td>
        </tr>
        <?php
        ?>
        @foreach($clinical_rs_content as $clinical_rs_val)
        <?php
        $id = $clinical_rs_val['_id'];
        $url = "/clinical_study_detail?id=$id&back=$back";
        if ($clinical_rs_val['status_name'] == "Completed") {
            $url = "/clinical_study_summary?back=$back&id=$id";
            $url.='&navArr[]=' . implode('&amp;navArr[]=', array_map('urlencode', $navArr));
            $easy_pie_class="easy-pie-success easy-pie-custom";
        }else if($clinical_rs_val['status_name'] == "Terminated"){
             $easy_pie_class="easy-pie-danger easy-pie-custom";
        }else{
            $easy_pie_class="easy-pie-warning easy-pie-custom";
        }
        ?>
        <tr>
            <td class="b-c-aaa">
                <a href="{{ $url }}">
                    <h6 class="bold">{{ $clinical_rs_val['title'] }}</h6>
                    <h6 class="semi-bold">{{ $clinical_rs_val['phase_name'] }}</h6>
                </a>
            </td>
            <td class="semi-bold text-center v-align-middle b-c-aaa">
                {{ $clinical_rs_val['condition_name'] }} 

            </td>
            <?php
                $start_date=$clinical_rs_val['study_start_date'];
                $end_date=$clinical_rs_val['study_completion_date'];
                $end_year=DATE('Y',strtotime($end_date));
                $diff = abs(strtotime($end_date) - strtotime($start_date));
                $days=floor($diff/(60*60*24));

                $days_2008=date("z", mktime(0,0,0,12,31,$end_year)) + 1;
                
                $percent=floor(($days/$days_2008)*100);
                
                ?>
            <td class="semi-bold b-c-aaa">
                <?php echo $clinical_rs_val['intervention'].'-->'.$clinical_rs_val['study_start_date'].'-->'.$clinical_rs_val['study_completion_date'].'-->'.$days.'-->'.$days_2008; ?>
            </td>
            <td class="semi-bold text-center" >
                <strong>{{ $clinical_rs_val['status_name'] }}</strong>
                <br/>
                
                <div class="<?php echo  $easy_pie_class; ?>" data-percent="<?php echo $percent; ?>" data-status='{{ $clinical_rs_val['status_name'] }}'>
                    
                    <span class="easy-pie-percent"><?php echo $percent; ?></span></div>
            </td>

        </tr>

        <tr>
            <td class="no-padding-margin"><hr class="hr-aaa"></td>
            <td class="no-padding-margin"><hr class="hr-aaa"></td>
            <td class="no-padding-margin"><hr class="hr-aaa"></td>
            <td class="no-padding-margin"><hr class="hr-aaa"></td>
        </tr> 
        @endforeach


    </tbody>
</table>


<?php
if ($last > 0) {

    echo ViewHelper::setPagination($page_limit, $pagenum, $last, 'getClinicalRS', $field, $order);
}
?>

<div class="inline pull-right">
    <h6 class="semi-bold"> Total Results: <?php echo $total; ?></h6>
</div>