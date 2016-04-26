<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Models\rssModel as rssModel;

class ConfCalendarController extends Controller
{
    public function Extract(){
        
        $api_query="http://www.conference-service.com/conferences/healthcare.html";
        $content = file_get_contents($api_query);
        
        //rss feed type 2 is Conference Calendar
        $rss_feed_type="Conference Calendar";
           
        //Checking whether the Feed URL is exist or not.
        $rssModel= new rssModel();
        $feedExist=$rssModel->rssFeedselect($api_query,$rss_feed_type);
        if($feedExist==null){
            
           
            // Inserting RSS FEED into ci_rss_feeds table
           $feedInsert=$rssModel->rssFeedinsert($api_query,$rss_feed_type);
           $rss_feed_id=$feedInsert->_id; 
       }else{
           // fetching primary key from Rss Feed Collection
           $rss_feed_id=$feedExist->_id; 
       }
//       echo $rss_feed_id;
//       exit();
$a=$this->DOM($content);
       //fetching serious adverse header name from html content using class name of html tag
$spans = $a->query("//*[contains(concat(' ', normalize-space(@class), ' '), 'subjectlinks')]");
$count=1;
$count_conference=array();

for($i=0;$i< $spans->length;$i++){
    if($i==3){
        break;
    }else{
        $current_div= $spans->item($i);
        $specialty_tag_name=$current_div->nodeName;
        if($specialty_tag_name=="li"){
          preg_match_all("/\(([^\)]*)\)/", $current_div->nodeValue, $aMatches);   
          $count_conference=  array_values(array_filter(array_map('intval',$aMatches[1])));
        }
        if($specialty_tag_name=="a"){
            
        $href=$current_div->getAttribute('href');
        $specialty=trim($current_div->nodeValue);  

        
        $conference_url="http://www.conference-service.com/conferences/$href";
        echo "<a href='".$conference_url."'>".$specialty."</a><br/>";
        $ob = new \simple_html_dom();
        $conference_content_extraction = file_get_html($conference_url);

//        $g=0;
//        foreach($conference_content_extraction->find('div[class=panel panel-primary]') as $conference_html){
//    
//            if($g==$count_conference[0])
//            {
//                break; 
//            }else{
////                    echo "<pre>";
//                       // conference title
//                        $conference_id=array();
//                        foreach ($conference_html->find('div.panel-heading < div.evnt-title') as $conference_title){ 
//                        $insert_conference=$con->prepare("INSERT INTO ci_conf_calendar(specialty_id,conference_url,conference_title)values(?,?,?)");
//                        $insert_conference->bind_param("iss",$spec_id,$conference_url,  strip_tags($conference_title));
//                        $insert_conference->execute();
//                        $conference_id[]=$insert_conference->insert_id;
//                        }
//                        
//                        $column_array=array();
//                        foreach ($conference_html->find('div.row < div.conflist_label',0) as $conflist_label) {$column=$conflist_label->innertext; 
//                        $column_array[]= strip_tags($column);
//                        }
//                        foreach ($conference_html->find('div.row < div.conflist_value',0) as $conflist_value){ $value=$conflist_value->innertext;
//                        array_push($column_array,strip_tags($value));    
//                        }
//                        foreach ($conference_html->find('div.row < div.conflist_label',1) as $conflist_label1){ $column1=$conflist_label1->innertext;
//                        array_push($column_array,strip_tags($column1));    
//                        }
//                        foreach ($conference_html->find('div.row < div.conflist_value',1) as $conflist_value1){ $value1=$conflist_value1->innertext;
//                        array_push($column_array,strip_tags($value1)); 
//                        }
//                        foreach ($conference_html->find('div.row < div.conflist_label',2) as $conflist_label2){ $column2=$conflist_label2->innertext;
//                        array_push($column_array,strip_tags($column2)); 
//                        }
//                        foreach ($conference_html->find('div.row < div.conflist_value',2) as $conflist_value2){ $value2=$conflist_value2->innertext;
//                        array_push($column_array,strip_tags($value2)); 
//                        }
//                        foreach ($conference_html->find('div.row < div.conflist_label',3) as $conflist_label3){ $column3=$conflist_label3->innertext;
//                        array_push($column_array,strip_tags($column3)); 
//                        }
//                        foreach ($conference_html->find('div.row < div.conflist_value',3) as $conflist_value3){ $value3=$conflist_value3->innertext;
//                        array_push($column_array,strip_tags($value3)); 
//                        }
//                        foreach ($conference_html->find('div.row < div.conflist_label',4) as $conflist_label4){ $column4=$conflist_label4->innertext;
//                        array_push($column_array,strip_tags($column4)); 
//                        }
//                        foreach ($conference_html->find('div.row < div.conflist_value',4) as $conflist_value4){ $value4=$conflist_value4->innertext;
//                        array_push($column_array,strip_tags($value4)); 
//                        }
//                        foreach ($conference_html->find('div.row < div.conflist_label',5) as $conflist_label5){ $column5=$conflist_label5->innertext;
//                        array_push($column_array,strip_tags($column5)); 
//                        }
//                        foreach ($conference_html->find('div.row < div.conflist_value',5) as $conflist_value5){ $value5=$conflist_value5->innertext;
//                        array_push($column_array,strip_tags($value5)); 
//                        }
//                        foreach ($conference_html->find('div.row < div.conflist_label',6) as $conflist_label6){ $column6=$conflist_label6->innertext;
//                        array_push($column_array,strip_tags($column6)); 
//                        }
//                        foreach ($conference_html->find('div.row < div.conflist_value',6) as $conflist_value6){ $value6=$conflist_value6->innertext;
//                        array_push($column_array,strip_tags($value6)); 
//                        }
//                        foreach ($conference_html->find('div.row < div.conflist_label',7) as $conflist_label7){ $column7=$conflist_label7->innertext;
//                        array_push($column_array,strip_tags($column7)); 
//                        }
//                        foreach ($conference_html->find('div.row < div.conflist_value',7) as $conflist_value7){ $value7=$conflist_value7->innertext;
//                        array_push($column_array,strip_tags($value7)); 
//                        }
//                        foreach ($conference_html->find('div.row < div.conflist_label',8) as $conflist_label8){ $column8=$conflist_label8->innertext;
//                        array_push($column_array,strip_tags($column8)); 
//                        }
//                        foreach ($conference_html->find('div.row < div.conflist_value',8) as $conflist_value8){ $value8=$conflist_value8->innertext;
//                        array_push($column_array,strip_tags($value8)); 
//                        }
//                        foreach ($conference_html->find('div.row < div.conflist_label',9) as $conflist_label9){ $column9=$conflist_label9->innertext;
//                        array_push($column_array,strip_tags($column9)); 
//                        }
//                        foreach ($conference_html->find('div.row < div.conflist_value',9) as $conflist_value9){ $value9=$conflist_value9->innertext;
//                        array_push($column_array,strip_tags($value9)); 
//                        }
//
//                        $column_ar=array_values(array_filter($column_array));
//                        var_dump($column_ar);
//                        $a=0;
//                        for($column_index=0;$column_index<10;$column_index++){
//                        $conf_column_name=$column_ar[$a];
//                        
//                        //fetching column name from array
//                        if($column_ar[$a]!=""){
//                        $select_conf_column=$con->prepare("SELECT conf_column_id FROM ci_conf_column WHERE conf_column_name LIKE '%$conf_column_name%'");
//                        $select_conf_column->execute();
//                        $select_conf_column->store_result();
//                        $select_conf_column->bind_result($conf_column_id);
//                        $num_conf=$select_conf_column->num_rows;
//                        if($num_conf==0){
//                        $insert_conf_column=$con->prepare("INSERT INTO ci_conf_column(conf_column_name,created_date,created_by)values(?,NOW(),1)");
//                        $insert_conf_column->bind_param("s",$conf_column_name);
//                        $insert_conf_column->execute();
//                        $conf_column_id=$insert_conf_column->insert_id;
//                        }else{
//                           $select_conf_column->fetch();
//                           $conf_column_id=  trim($conf_column_id);
//                        }
//                        }
//                        $a=$a+1;
//                        
//                         //fetching column value from array
//                        $conf_column_val=$column_ar[$a];
//                        if($conf_column_val!=""){
//                        $insert_conf_val=$con->prepare("INSERT INTO ci_map_conf_column(conference_id,conf_column_id,conf_column_value)"
//                                . "values(?,?,?)");
//                        $insert_conf_val->bind_param("iis",$conference_id[0],$conf_column_id,$conf_column_val);
//                        $insert_conf_val->execute();
//
//                        }
//                        $a=$a+1;
//                        
//                        }
//
//                    $g++;        
//            }
//            
//        }
        $count++; 
        }
    }
}
echo $count;
}
    
    public function DOM($html){
       if(!empty($html)) {
        $DOM = new \DOMDocument();
        libxml_use_internal_errors(true);
        $DOM->loadHTML($html);
        libxml_use_internal_errors(false);
        $a = new \DOMXPath($DOM);
        return $a;
       }
       else 
           return null;
      }
}
