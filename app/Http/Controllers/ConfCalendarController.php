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
                        array_push($column_array,str_replace(" ", "_", strtolower(strip_tags($conflist_label->innertext))));
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

                        if(array_key_exists("dates",$conf_column_arr)){
                            $dates=explode("-",$conf_column_arr['dates']);
                            
                            $start_year=DATE("Y",strtotime($dates[0]));
                            $end_year=DATE("Y",strtotime($dates[1]));
                            
                            $start_month=DATE("F",strtotime($dates[0]));
                            $end_month=DATE("F",strtotime($dates[1]));
                            
                        }else if(array_key_exists("start_date",$conf_column_arr)){
                              
                            // replacing dates with start date
                            $conf_column_arr['dates']= $conf_column_arr['start_date'];
                            unset($conf_column_arr['start_date']);
                            
                            $dates=$conf_column_arr['dates'];
                            
                            $start_year=DATE("Y",strtotime($dates));
                            $end_year=DATE("Y",strtotime($dates));
                            
                            $start_month=DATE("F",strtotime($dates));
                            $end_month=DATE("F",strtotime($dates));
                        }
                        
                        $conf_column_arr['start_month']=$start_month;
                        $conf_column_arr['end_month']=$end_month;
                        $conf_column_arr['year']=$start_year;
                        
                        if($start_year==$end_year){
                            if($conference_title!=""){
                            if(isset($conf_column_arr['id']))
                            {
                                $conf_count = $ConfCalendarModel->CalenderById($conf_column_arr['id']);

                                if($conf_count!="" || $conf_column_arr!= NULL || count($conf_column_arr)!=0){

                                $ConfCalendarModel->AddCoverage(array("rss_feed_id"=>$rss_feed_id,"specialty_name"=>$specialty_name,"conference_url"=>$conference_url,
                                "conference_title"=>$conference_title,"conf_column_name_value"=>$conf_column_arr));
                                }
                           }else{
                                $ConfCalendarModel->AddCoverage(array("rss_feed_id"=>$rss_feed_id,"specialty_name"=>$specialty_name,"conference_url"=>$conference_url,
                               "conference_title"=>$conference_title,"conf_column_name_value"=>$conf_column_arr));   
                           }
                         }
                    }
                }  
}  
}

 public function showConfcalendar(Request $request){
     
        $year_url=$request->get('year'); 
        $ConfCalendarModel= new ConfCalendarModel();
        $conf_calendar_data = $ConfCalendarModel->CalenderByYear($year_url); 
//         echo "<pre>";
//         print_r($conf_calendar_data);
//         exit();
        if(!empty($conf_calendar_data)){
            
            $jan=0;$feb=0;$mar=0;$apr=0;$may=0;$jun=0;$jul=0;$aug=0;$sep=0;$oct=0;$nov=0;$dec=0;
            $month_arr=array("January","February","March","April","May","June","July","August","September","October","November","December");
//            echo "<pre>";
//            print_r($month_arr);
//            exit();
            $monthly_calender=array("January"=>array("Total_Conf"=>0, "Conf_Details"=>array()),
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
            
                $conf_detail_arr=array();  
                foreach ($conf_calendar_data as $post){
                    
                $attributes=$post['attributes'];

                $conf_details = $attributes["conf_column_name_value"];
                $unique_id = $attributes["_id"];
                $conference_title = isset($attributes["conference_title"]) ? $attributes["conference_title"] : "";

                if(!empty($conf_details)){
                    $id= isset($conf_details["id"]) ? $conf_details["id"] : 0;
                    $dates = isset($conf_details["dates"]) ? $conf_details["dates"] : "";
                    $start_month= isset($conf_details["start_month"]) ? $conf_details["start_month"] : "";
                    $end_month= isset($conf_details["end_month"]) ? $conf_details["end_month"] : "";
                    $year= isset($conf_details["year"]) ? $conf_details["year"] : "";
                }
                
                if($start_month==$end_month){
                    
                    $conf_detail_arr["conf_id"]=$id;
                    $conf_detail_arr["conf_title"]=$conference_title;
                    $conf_detail_arr["conf_date"]=$dates;
                    $conf_detail_arr["unique_id"]=$unique_id;
                    $conf_detail_arr["month"]=$start_month;   
                    $conf_detail_arr["year"]=$year;

                 if(isset($monthly_calender[$start_month]) && !empty($conf_detail_arr)){
                    $monthly_calender[$start_month]["Conf_Details"]["$unique_id"]=$conf_detail_arr;
                    $monthly_calender[$start_month]['Total_Conf']++;
                 }
                 
                }
//                else if("$start_month" != "$end_month"){
//                    $start_mn_index=array_search($start_month,$month_arr);
//
//                    $end_mn_index=array_search($end_month,$month_arr);
//                    
//                    if(abs($start_mn_index - $end_mn_index)==1){ 
//                    for ($month_i=$start_mn_index; $month_i<=$end_mn_index; $month_i++){
//
//                            $conf_detail_arr["conf_id"]=$id;
//                            $conf_detail_arr["conf_title"]=$conference_title;
//                            $conf_detail_arr["conf_date"]=$dates;
//                            $conf_detail_arr["unique_id"]=$unique_id;
//                            $conf_detail_arr["month"]=$month_arr[$month_i];   
//                            $conf_detail_arr["year"]=$year;
//
//                            if(isset($monthly_calender[$month_arr[$month_i]]) && !empty($conf_detail_arr)){
//                                
//                                $monthly_calender[$month_arr[$month_i]]["Conf_Details"]["$unique_id"]=$conf_detail_arr;
//                                $monthly_calender[$month_arr[$month_i]]['Total_Conf']++;
//                            }
//                    }
//
//                }
//                }
                }

//        echo "<pre>";
//        print_r($monthly_calender['November']);
//        echo "</pre>";
//        exit();
        return  view('conference_calendar/view_conf_calendar', array('monthly_calender'=>$monthly_calender));
       
     }
    }
    
    public function getConference(Request $request){
       $ConfCalendarModel= new ConfCalendarModel();
       
       $month=$request->get('month'); 
       $year=$request->get('year');
       $nav_key=$request->get('nav_key');
//       $month="September";
//       $year=2016;
//       $nav_key=0;
       

         $conf_content1=$ConfCalendarModel->CalenderByYearandMonth($month,$year);
         $conf_content=iterator_to_array($conf_content1);

         $conf_detail_arr=array();
         
         $position=0;
         foreach ($conf_content as $conference_detail_key) {

            $conference_id=$conference_detail_key['_id'];
            $conference_title=$conference_detail_key['conference_title'];
            
            $conf_detail_arr[$position]["conf_id"]=$conference_id;
            $conf_detail_arr[$position]["conf_title"]=$conference_title;
            
            foreach ($conference_detail_key['conf_column_name_value'] as $value){
            
            if(array_key_exists("id",$value)){ $conf_detail_arr[$position]["id"]=$value['id'];
            }   
            if(array_key_exists("dates",$value)){ $conf_detail_arr[$position]["dates"]=$value['dates'];
            }               
            if(array_key_exists("location",$value)){ $conf_detail_arr[$position]["location"]=$value['location']; 
            }
            if(array_key_exists("contact",$value)){ $conf_detail_arr[$position]["contact"]=$value['contact']; 
            }
            if(array_key_exists("topics",$value)){ $conf_detail_arr[$position]["topics"]=$value['topics']; 
            }
            if(array_key_exists("related_subject(s)",$value)){ $conf_detail_arr[$position]["related_subject"]=$value['related_subject(s)']; 
            }
            if(array_key_exists("event_website",$value)){ $conf_detail_arr[$position]["event_website"]=$value['event_website']; 
            }
            if(array_key_exists("abstract",$value)){ $conf_detail_arr[$position]["abstract"]=$value['abstract']; 
            }
            }
            $position++;
      }
//         echo "<pre>";
//        print_r($conf_detail_arr);
//        echo "</pre>";
//        exit();
       $data=array("content"=>$conf_detail_arr,"month"=>$month,"year"=>$year,"nav_key"=>$nav_key);
       return view('conference_calendar/get_detailed_conf',array('conference_detail'=>$data));   
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
