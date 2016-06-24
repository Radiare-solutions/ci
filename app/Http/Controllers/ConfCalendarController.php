<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Models\RssModel as rssModel;

use App\Models\ConfCalendarModel as ConfCalendarModel;

class ConfCalendarController extends Controller
{
    public function Extract(){
        
        set_time_limit(0);
        ini_set('max_execution_time', 0);
        
        new \simple_html_dom();
        
        $api_query="http://www.conference-service.com/conferences/healthcare.html";
        $content = file_get_html($api_query);
        
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


$ConfCalendarModel= new ConfCalendarModel();
  
foreach($content->find('a[class=subjectlinks]') as $current_div){
   
        $href=$current_div->href;
        $specialty_name=trim($current_div->innertext);  

        $conference_url="http://www.conference-service.com/conferences/$href";
        
        $conference_content_extraction = file_get_html($conference_url);
        $insert_details=array();
        foreach($conference_content_extraction->find('div[class=panel panel-primary]') as $conference_html){
    
                        $spans_label=$this->DOM($conference_html);
                        $spans_label_length = $spans_label->query("//*[contains(concat(' ', normalize-space(@class), ' '), 'conflist_label')]");
                        $conflist_label_length =$spans_label_length->length;


                        $conference_title_arr=array();
                        foreach ($conference_html->find('div.panel-heading < div.evnt-title') as $conference_title){ 
                        $conference_title_arr[]=preg_replace('/\s+/', ' ',$conference_title->innertext);    
                        }
                        $conference_title=implode("", $conference_title_arr);
                        
                        $column_array=array();

                        for($i=0; $i<$conflist_label_length; $i++){
                            
                        foreach ($conference_html->find('div.row < div.conflist_label',$i) as $conflist_label) {
                        if(isset($conflist_label->innertext)){
                        array_push($column_array,strip_tags($conflist_label->innertext));
                        }
                        }
                        
                        foreach ($conference_html->find('div.row < div.conflist_value',$i) as $conflist_value){ 
                        if(isset($conflist_value->innertext)){    
                        array_push($column_array,strip_tags($conflist_value->innertext));  
                        }
                        }
                        }

                        $column_ar=array_values(array_filter($column_array));
                        $a=0;
                        $conf_column_arr=array();
                        for($column_index=0; $column_index<$conflist_label_length; $column_index++){
    
                        //fetching column name from array
                        $conf_column_name=$column_ar[$a];
                        $a=$a+1; 
                         //fetching column value from array
                        $conf_column_val=$column_ar[$a];
                        
                        $conf_column_arr[$conf_column_name]=$conf_column_val;
                        
                        $a=$a+1;
                        
                        }
                            
                 $insert_details[] =array("rss_feed_id"=>$rss_feed_id,"specialty_name"=>$specialty_name,"conference_url"=>$conference_url,
                "conference_title"=>$conference_title,"conf_column_name_value"=>$conf_column_arr);
        }
 $ConfCalendarModel->AddCoverage($insert_details); 
}  
}

 public function showConfcalendar()
    {
        $ConfCalendarModel= new ConfCalendarModel();
        $Conf_Calendar_Data = $ConfCalendarModel->FetchConfcalender(); 
        // echo '<pre>'; print_r($Conf_Calendar_Data)."</pre>";

        if(!empty($Conf_Calendar_Data))
        {
            $jan=0;$feb=0;$mar=0;$apr=0;$may=0;$jun=0;$jul=0;$aug=0;$sep=0;$oct=0;$nov=0;$dec=0;
            $month_arr=array("January","February","March","April","May","June","July","August","September","October","November","December");
            
            $Monthly_Calender=array("January"=>array("Total_Conf"=>0, "Conf_Details"=>array()),
                "February"=>array("Total_Conf"=>0, "Conf_Details"=>array()),
                "March"=>array("Total_Conf"=>0, "Conf_Details"=>array()),
                "April"=>array("Total_Conf"=>0, "Conf_Details"=>array()),
                "May"=>array("Total_Conf"=>0, "Conf_Details"=>array()),
                "June"=>array("Total_Conf"=>0, "Conf_Details"=>array()),
                "July"=>array("Total_Conf"=>0, "Conf_Details"=>array()),
                "August"=>array("Total_Conf"=>0, "Conf_Details"=>array()),
                "September"=>array("Total_Conf"=>0, "Conf_Details"=>array()),
                "October"=>array("Total_Conf"=>0, "Conf_Details"=>array()),
                "November"=>array("Total_Conf"=>0, "Conf_Details"=>array()),
                "December"=>array("Total_Conf"=>0, "Conf_Details"=>array())); 
             
           foreach ($Conf_Calendar_Data as $post)
            {
                $attributes=$post['attributes'];
                $Conf_Details = $attributes["conf_column_name_value"];

                $rss_feed_id = isset($attributes["rss_feed_id"]) ? $attributes["rss_feed_id"] : "";
                $specialty_name = isset($attributes["specialty_name"]) ? $attributes["specialty_name"] : "";
                $conference_url = isset($attributes["conference_url"]) ? $attributes["conference_url"] : "";
                $conference_title = isset($attributes["conference_title"]) ? $attributes["conference_title"] : "";

                if(!empty($Conf_Details))
                {
                    $ID = isset($Conf_Details["ID"]) ? $Conf_Details["ID"] : 0;
                    $Dates = isset($Conf_Details["Dates"]) ? $Conf_Details["Dates"] : "";
                    $Location = isset($Conf_Details["Location"]) ? $Conf_Details["Location"] : "";
                    $Abstract = isset($Conf_Details["Abstract"]) ? $Conf_Details["Abstract"] : "";
                    $Contact = isset($Conf_Details["Contact"]) ? $Conf_Details["Contact"] : "";
                    $Topics = isset($Conf_Details["Topics"]) ? $Conf_Details["Topics"] : "";
                    $Related_subject = isset($Conf_Details["Related subject(s)"]) ? $Conf_Details["Related subject(s)"] : "";
                    $Event_website = isset($Conf_Details["Event website"]) ? $Conf_Details["Event website"] : "";
                }
                $explode_date= explode("-", $Dates);

                $year=DATE("Y",strtotime($explode_date[0]));
                $month=DATE("F",strtotime($explode_date[0]));
  
                $conf_details=array();
                
                if(in_array($month, $month_arr)){
                    if($conference_title!="")
                    {
                    $conf_details=array("Conf_Id"=>$ID, "Conf_title"=>$conference_title, "Conf_Date"=>$Dates);   
                    }
                }
//                echo "<pre>";
//                var_dump($month_arr);
//                exit();
                if(isset($Monthly_Calender[$month]) && !empty($conf_details))
                {
                    $Monthly_Calender[$month]["Total_Conf"]++;
                    $Monthly_Calender[$month]["Conf_Details"][$ID]=$conf_details;
                }
//                else 
//                {
//                    $Monthly_Calender[$month]["Total_Conf"]=0;
//                    $Monthly_Calender[$month]["Conf_Details"][$ID]=$conf_details;
//                }
            }
//        echo "<pre>";
//        print_r($Monthly_Calender);
//        echo "</pre>";
//        exit();
//
//        $Monthly_Calender = array("January"=>
//            array("Total_Conf"=>12, "Conf_Details"=>array(
//               "1"=>array("Conf_Id"=> 1, "Conf_title"=>"Jan_Title1", "Conf_Date"=>"01 May 2016 - 05 May 2016"), 
//                2=>array("Conf_Id"=> 2, "Conf_title"=>"Jan_Title1", "Conf_Date"=>"01 May 2016 - 05 May 2016"),
//                3=>array("Conf_Id"=> 3, "Conf_title"=>"Jan_Title1", "Conf_Date"=>"01 May 2016 - 05 May 2016")
//                )), 
//
//            "Feburary"=>
//            array("Total_Conf"=>15, "Conf_Details"=>array("2"=>array("Conf_Id"=> 2, "Conf_title"=>"Feb_Title1", "Conf_Date"=>"01 May 2016 - 05 May 2016"))), 
//
//            "March"=>
//            array("Total_Conf"=>0, "Conf_Details"=>array()) );
        
//         $Monthly_Calender = array("january"=>array("Total_Conf"=>12, "Conf_Details"=>array("1"=>array("Conf_Id"=> 1, "Conf_title"=>"Jan_Title1", "Conf_Date"=>"01 May 2016 - 05 May 2016"))), "Feburary"=>array("Total_Conf"=>0, "Conf_Details"=>array())  );


        return  view('conference_calendar/view_conf_calendar', array('Monthly_Calender'=>$Monthly_Calender));
       
       
     }
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
