<?php
$pagenum = $patent_rs['pageNum']; 
$page_limit =$patent_rs['pageLimit'];
$last =$patent_rs['last'];
$field =$patent_rs['sort'];
$order =$patent_rs['order'];
$month=$patent_rs['month'];

if ($pagenum < 1) { 
	$pagenum = 1; 
} elseif ($pagenum > $last) { 
	$pagenum = $last; 
}



$ajaxName=$patent_rs['ajax'];

$limitquery=',\''.$field.'\','.$order.','.$month.','.$patent_rs['yr'];

?>
            <div class="col-md-12" style="padding-left:0 !important;">
                <h4 class="semi-bold inline">Search Results</h4>
                <br>
                <div class="btn-group pull-right p-t-10"> 
                <?php echo ViewHelper::setPaginationLimit($page_limit, $pagenum, $ajaxName,$limitquery); ?>
                </div>
                <table class="table table-hover no-more-tables" style="background:#fff !important;" >
                    <thead>
                        <tr>
                            <th class="table-blue-bg" style="wdith:45%;">
                                Title
                                <a href="javascript:void(0);" onclick="<?php echo $ajaxName; ?>('<?php echo $page_limit; ?>', '<?php echo $pagenum; ?>', 'title', -1,'<?php echo $month; ?>','<?php echo $patent_rs['yr']; ?>')">
                                <i class="fa p-l-5 text-white p-r-5 fa-caret-down"></i></a> 
                                <a href="javascript:void(0);" onclick="<?php echo $ajaxName; ?>('<?php echo $page_limit; ?>', '<?php echo $pagenum; ?>', 'title', 1,'<?php echo $month; ?>','<?php echo $patent_rs['yr']; ?>')">
                                <i class="fa p-l-5 text-white p-r-5 fa-caret-up"></i></a>                             
                            </th>
                            <th class="text-center table-blue-bg" style="width:15%;">Inventor</th>
                            <th class="text-center table-blue-bg" style="width:20%;">Applicant</th>
                            <th class="text-center table-blue-bg" style="width:20%;">Publication info</th>

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
                        $nav_key=0;
                        ?>
                        @foreach($patent_rs['patentData'] as $patentDataVal)
                        <tr>
                            <td class="b-c-aaa">
                                <a href="javascript:void(0);" onclick='getPatentPopup(<?php echo $nav_key; ?>,"<?php echo $patent_rs['yr']; ?>",<?php echo json_encode($patent_rs['app']); ?>)'>
                                    <h6 class="bold"><?php echo $patentDataVal['title']; ?> </h6>
                                    <h6 class="semi-bold"><span class="bold">Priority Date: </span><?php echo $patentDataVal['priority_date']; ?> </h6>
                                </a>
                            </td>
                            <td class="semi-bold text-left v-align-middle b-c-aaa">
                                <?php echo $patentDataVal['inventors']; ?>
                            </td>
                            <td class="semi-bold  text-center b-c-aaa">
                               <?php echo $patentDataVal['applicants']; ?>
                            </td>
                            <td class="semi-bold text-left" >
                               <?php echo $patentDataVal['publication_info']; ?> 

                            </td>

                        </tr>

                        <tr>
                            <td class="no-padding-margin"><hr class="hr-aaa"></td>
                            <td class="no-padding-margin"><hr class="hr-aaa"></td>
                            <td class="no-padding-margin"><hr class="hr-aaa"></td>
                            <td class="no-padding-margin"><hr class="hr-aaa"></td>
                        </tr>
                        <?php 
                        $nav_key++;
                        ?>
                        @endforeach

                    </tbody>
                </table>


              
            </div>

<?php 
if ($last > 0) {
    $query=','.$month.','.$patent_rs['yr'];
    echo ViewHelper::setPagination($page_limit, $pagenum, $last, $ajaxName, $field, $order,$query);
}
?>
<div class="inline pull-right">
    <h6 class="semi-bold"> Total Results: <?php echo $patent_rs['totalPage']; ?></h6>
</div>
