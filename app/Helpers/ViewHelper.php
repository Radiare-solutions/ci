<?php

namespace App\Helpers;

class ViewHelper {
    
    const charLimit = 150;
    
    public static function convertTimeToClinicalTrialDate($date) {
        return date('F Y', strtotime($date));
    }
    
    public static function displayRevisedText($text) {
        if(strlen($text) > self::charLimit) { 
            $text = substr($text, 0, self::charLimit);
            $text.= "...&nbsp;&nbsp;<button class='btn btn-flat btn-xs btn-primary hidden-xs' href='index.html'>Read More</button>";
        }
        return $text;
    }
    
    public static function setValues($arr = array(), $type = 'status') {
        $filetSelectionArr = array();
        foreach ($arr as $value) {
            $id = $value['_id'];
            $name = $value['name'];
            $filetSelectionArr[] = '<a href="#" class="btn btn-xs btn-mini" onclick="applyFiltersForButton(\'' . $id . '\',\'' . $type . '\')">' . $name . '<i class="fa fa-times"></i></a>&nbsp';
        }
        return $filetSelectionArr;
    }
    public static function setPaginationLimit($page_limit=5,$pagenum = 1,$ajax_method='', $total) {
        
        $pageLimitHtml='<a href="#" data-toggle="dropdown" class="btn btn-mini btn-success dropdown-toggle btn-demo-space">'.$page_limit.'<span class="caret"></span> </a>
      <ul class="dropdown-menu">';
        $list_arr = array(5, 10, 20, 50, 100);
        foreach ($list_arr as $list_val) {
 
            $class = "";
            if ($list_val == $page_limit) {
                $class = "active";
            }

          $pageLimitHtml.='<li class="'.$class.'"><a href="javascript:void(0);" onclick="'.$ajax_method.'('.$list_val.', '.$pagenum.')">'.$list_val.'</a></li>';
        }
    $pageLimitHtml.='</ul>';
    
    return $pageLimitHtml;
    
    }

    public static function setPagination($page_limit=5,$pagenum = 1, $last=0, $ajax_method='', $field='',$order=1) {
        $adjacents = 2;
        $decrease=$pagenum - 1;
        $increase=$pagenum + 1;
        
        $pagination = '<ul class="pagination ">';
        if (($decrease) > 0) {
            $pagination.='<li><a href="javascript:void(0);" onclick="'.$ajax_method.'('.$page_limit.','.$decrease.',\''.$field.'\','.$order.')">&laquo;</a></li>';
        } else {
            $pagination.='<li class="disabled"><a href="javascript:void(0);">&laquo;</a></li>';
        }
        $pmin = ($pagenum > $adjacents) ? ($pagenum - $adjacents) : 1;
        $pmax = ($pagenum < ($last - $adjacents)) ? ($pagenum + $adjacents) : $last;

        for ($i = $pmin; $i <= $pmax; $i++) {
            if ($i == $pagenum) {
                $pagination.='<li class="active"><a href="javascript:void(0);">' . $i . '</a></li>';
            } else {
                $pagination.='<li><a href="javascript:void(0);" onclick="'.$ajax_method.'('.$page_limit.','.$i.',\''.$field.'\','.$order.')" >' . $i . '</a></li>';
            }
        }
        if (($increase) <= $last) {

            $pagination.='<li><a href="javascript:void(0);" onclick="'.$ajax_method.'('.$page_limit.','.$increase.',\''.$field.'\','.$order.')">&raquo;</a></li>';
        } else {

            $pagination.='<li class="disabled"><a href="javascript:void(0);">&raquo;</a></li>';
        }
        $pagination.='</ul>';

        return $pagination;
    }
    
}