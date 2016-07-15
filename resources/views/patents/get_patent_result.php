<?php
$pagenum = $patent_rs['pageNum']; 
$adjacents=2;
$page_limit =$patent_rs['pageLimit'];
$last =$patent_rs['last'];
$sort =$patent_rs['sort'];
$order =$patent_rs['order'];
$month=$patent_rs['month'];

if ($pagenum < 1) { 
	$pagenum = 1; 
} elseif ($pagenum > $last) { 
	$pagenum = $last; 
}

$ajaxName=$patent_rs['ajax'];

?>
<!-- BEGIN PAGE HEADER -->
<div class="margin-bottom-xxl">
    <span class="text-light text-lg no-y-padding">Search results <strong><?php echo $patent_rs['totalPage']; ?></strong></span>

    <div class="btn-group btn-group-sm pull-right">
        <button type="button" class="btn btn-default-light dropdown-toggle" data-toggle="dropdown">
            <span class="glyphicon glyphicon-arrow-down"></span> Sort
        </button>
        <ul class="dropdown-menu dropdown-menu-right animation-dock" role="menu">
            <li class="active" ><a href="#" onclick='<?php echo $ajaxName; ?>("<?php echo $patent_rs['yr']; ?>","<?php echo $month; ?>",<?php echo $page_limit; ?>,1,"publication_date",1,"<?php echo $ajaxName; ?>");'>Date asc</a></li>
            <li><a href="#" onclick='<?php echo $ajaxName; ?>("<?php echo $patent_rs['yr']; ?>","<?php echo $month; ?>",<?php echo $page_limit; ?>,1,"publication_date",-1,"<?php echo $ajaxName; ?>");'>Date desc</a></li>
            <li><a href="#" onclick='<?php echo $ajaxName; ?>("<?php echo $patent_rs['yr']; ?>","<?php echo $month; ?>",<?php echo $page_limit; ?>,1,"title",1,"<?php echo $ajaxName; ?>");'>Title asc</a></li>
            <li><a href="#" onclick='<?php echo $ajaxName; ?>("<?php echo $patent_rs['yr']; ?>","<?php echo $month; ?>",<?php echo $page_limit; ?>,1,"title",-1,"<?php echo $ajaxName; ?>");'>Title desc</a></li>
        </ul>
    </div>
    <div class="btn-group btn-group-sm pull-right" style="margin-right:10px;">
        <button type="button" class="btn btn-default-light dropdown-toggle" style="text-transform: none !important;" data-toggle="dropdown">
            <span class="glyphicon glyphicon-arrow-down" ></span> No. of Records
        </button>
        <ul class="dropdown-menu dropdown-menu-right animation-dock" role="menu">
            <?php $no_page=array(10,20,30,50,100); 
                     foreach ($no_page as $value) {
                         if($value==$page_limit){
                             $class="active";      
                         }else{
                            $class="";       
                         }
                         ?>
                         <li class='<?php echo $class; ?>'><a href="#" onclick='<?php echo $ajaxName; ?>("<?php echo $patent_rs['yr']; ?>","<?php echo $month; ?>",<?php echo $value; ?>,1,"<?php echo $sort; ?>","<?php echo $order; ?>","<?php echo $ajaxName; ?>");'><?php echo $value; ?></a></li>
                    <?php  }
            ?>
        </ul>
    </div>
</div><!--end .margin-bottom-xxl -->
<!-- BEGIN RESULT LIST -->
<div class="list-results list-results-underlined" >
    <?php 
    $list_no=($patent_rs['skip']-$pagenum)+1; 
        
   foreach($patent_rs['patentData'] as $patentDataVal){ ?>
    
    <div class="col-xs-1 no-padding text-center">
        <p class="text-medium text-lg text-black"><?php echo $list_no + $pagenum; ?></p>
    </div>
    <div class="col-xs-11 no-padding">
        <p class="no-padding no-margin">
            <a class="text-medium text-lg text-primary" href="#offcanvas-demo-size4" data-toggle="offcanvas" 
            onclick='return getPatentPopup(<?php echo $list_no; ?>,"<?php echo $patentDataVal['title']; ?>","<?php echo $patent_rs['yr']; ?>",<?php echo json_encode($patent_rs['app'])?> )'><?php echo $patentDataVal['title']; ?></a><br/>
        </p>
        <div class="col-md-12">
            <div class="col-md-3">
                <b>Inventor: </b> <br/><?php echo $patentDataVal['inventors']; ?>
            </div>
            <div class="col-md-3">
                <b>Applicant: </b> <br/><?php echo $patentDataVal['applicants']; ?>
            </div>

            <div class="col-md-3">
                <b>Publication info:</b> <br/><?php echo $patentDataVal['publication_info']; ?> 
            </div>
            <div class="col-md-3">
                <b>Priority date: </b> <br/><?php echo $patentDataVal['priority_date']; ?>
            </div>
        </div>

    </div><!--end .col -->
    <?php $list_no++;  
   } ?>
 
</div><!--end .list-results -->
<!-- END RESULTS LIST -->  


<?php if($last>0)
        { ?>
<!--<div class="box-tools pull-right footer">-->
<ul class="pagination ">
<?php if ( ($pagenum-1) > 0) {
	?>	
<li><a href="javascript:void(0);" onclick="<?php echo $ajaxName; ?>('<?php echo $patent_rs['yr']; ?>','<?php echo $month; ?>','<?php echo $page_limit;  ?>', '<?php echo $pagenum-1; ?>','<?php echo $sort; ?>','<?php echo $order; ?>','<?php echo $ajaxName; ?>');">&laquo;</a></li>
	<?php
	}
        else
        { 
echo '<li class="disabled"><a href="javascript:void(0);">&laquo;</a></li>';            
        }
    $pmin = ($pagenum > $adjacents) ? ($pagenum - $adjacents) : 1;
    $pmax = ($pagenum < ($last - $adjacents)) ? ($pagenum + $adjacents) : $last;

    for ($i = $pmin; $i <= $pmax; $i++) {
	//for($i=1; $i<=$last; $i++) {
		if ($i == $pagenum ) {
   
?>
    <li class="active"><a href="javascript:void(0);"><?php echo $i ?></a></li>
<?php
	} else {  
?>
        <li><a href="javascript:void(0);" onclick="<?php echo $ajaxName; ?>('<?php echo $patent_rs['yr']; ?>','<?php echo $month; ?>','<?php echo $page_limit;  ?>','<?php echo $i; ?>','<?php echo $sort; ?>','<?php echo $order; ?>','<?php echo $ajaxName; ?>');" ><?php echo $i; ?></a></li>
<?php 
	}
}
if ( ($pagenum+1) <= $last) {

?>
         <li><a href="javascript:void(0);" onclick="<?php echo $ajaxName; ?>('<?php echo $patent_rs['yr']; ?>','<?php echo $month; ?>','<?php echo $page_limit;  ?>', '<?php echo $pagenum+1; ?>','<?php echo $sort; ?>','<?php echo $order; ?>','<?php echo $ajaxName; ?>');">&raquo;</a></li>
<?php }
else
{?>
        <li class="disabled"><a href="javascript:void(0);">&raquo;</a></li>
<?php }
        
        ?>       
</ul>
<!--    </div>-->
<?php } ?>