<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\RssModel as RssModel;

use App\Models\ClinicalTrialModel as ClinicalTrialModel;

use App\Models\ConditionModel as ConditionModel;

use App\Models\SponserModel as SponserModel;

use App\Models\DrugModel as DrugModel;

use App\Http\Requests;

/* 
 * it is used to control the clinical trial data extraction part
 */
class ClinicalController extends Controller
{
    /*
     * used to call as the first function
     * arguments - none
     * return value - none
     *  null - if no match found
     */
   public function Extract(Request $request){
       $name = $request->trial;
       set_time_limit(0);
       ini_set('max_execution_time', 0);
       $molecule_or_indication=urlencode($name);
       //https://clinicaltrials.gov/search?term=adalimumab&displayxml=true
       //$api_query="https://clinicaltrials.gov/search?term=$molecule_or_indication&displayxml=true";
       $api_query = $name;
       $content = file_get_contents($api_query);
       $xml=simplexml_load_string($content);
       
       //Fetching count from Clinical trial rss feed as molecule wise
       $attr = $xml['count'];
       
        //rss feed type 1 is clinical trial
       $rss_feed_type="Clinical Trial";
       
       $RssModel= new RssModel();
       $ClinicalTrialModel= new ClinicalTrialModel();
       
       $feedExist=$RssModel->RssFeedselect($api_query,$rss_feed_type);
       if($feedExist==null){

           
           $feedInsert=$RssModel->RssFeedinsert($api_query,$rss_feed_type);
           $rss_feed_id=$feedInsert->_id;
       }else{
           $rss_feed_id=$feedExist->_id;
       }
           
            $clinical_api_query=file_get_contents("$api_query"."&count=".$attr);
            $clinical_study_xml=simplexml_load_string($clinical_api_query);

            
            foreach($clinical_study_xml as $answer){
                
               if(isset($answer->url)) {
               $url=(string)$answer->url; 

               $title=(string)$answer->title; 
               $status_name=(string)$answer->status; 
               
                        $result_url="$url?displayxml=true";

                        $clinical_result_ext=file_get_contents($result_url);
                        $clinical_content_ext=simplexml_load_string($clinical_result_ext);

                        $start_date=DATE("Y-m",  strtotime((string)$clinical_content_ext->start_date))."-00";
                        $study_completion_date=DATE("Y-m",strtotime((string)$clinical_content_ext->completion_date))."-00";
                        $primary_completion_date=DATE("Y-m",strtotime((string)$clinical_content_ext->primary_completion_date))."-00";
                        $lastchanged_date=DATE("Y-m-d",strtotime((string)$clinical_content_ext->lastchanged_date));
                        $firstreceived_date=DATE("Y-m-d",strtotime((string)$clinical_content_ext->firstreceived_date));
                        $verification_date=DATE("Y-m",strtotime((string)$clinical_content_ext->verification_date))."-00";

                        $id_info=$clinical_content_ext->id_info;
                        $nct_id=(string)$id_info->nct_id[0];

                        $study_result_url="https://clinicaltrials.gov/ct2/show/results/$nct_id";

                        $sponsors_array=$clinical_content_ext->sponsors;
                        $sponsors=$sponsors_array->lead_sponsor;
                        $sponsors_name=(string)$sponsors->agency." ".(string)$sponsors->agency_class;
                        
                        if(preg_match_all("#university#i",$sponsors_name,$matches) || preg_match_all("#college#i",$sponsors_name,$matches)){
                        $sponsor_name=$sponsors_name;    
                        }else{
                        $sponsor_name=$sponsors_name;    
                        }
                        
 
                        $collaborator=$sponsors_array->collaborator;
                        $collaborator_name=(string)$collaborator->agency." ".(string)$collaborator->agency_class;

                        $phase=(string)$clinical_content_ext->phase;
                        
                        $brief_title=(string)$clinical_content_ext->brief_title;
                        
                        $official_title=(string)$clinical_content_ext->official_title;
                        
                        $detailed_desc=$clinical_content_ext->detailed_description;
                        $detailed_description=(string)$detailed_desc->textblock;

                        
                        $brief_sum=$clinical_content_ext->brief_summary;
                        $brief_summary=(string)$brief_sum->textblock;

                        $primary_measure=$clinical_content_ext->primary_outcome;
                        
                        $primary_measure_def=$primary_measure->measure." [ Time Frame: ".$primary_measure->time_frame." ] [ Designated as safety issue: ".$primary_measure->safety_issue." ]<br/> ".$primary_measure->description;


                        $study_type=(string)$clinical_content_ext->study_type;

                        $study_design=(string)$clinical_content_ext->study_design;

                        $enrollment=(string)$clinical_content_ext->enrollment;

                        $condition_name=(string)$clinical_content_ext->condition;

                        $intervention_array=$clinical_content_ext->intervention;
                        $inter_arr=array();
                        $drug_arr=array();
                        foreach($intervention_array as $inter_item){
                            $intervention_type=(string)$inter_item->intervention_type;
                            $intervention_name=(string)$inter_item->intervention_name;
                            if($intervention_type=='Drug'){
                                $drug_arr[]=trim($intervention_name); 
                            }else{
                                $inter_arr[]=$intervention_type.": ".$intervention_name;
                            }
                        }
                        
                        $intervention_implode=implode("<br/>",$inter_arr);
                        $intervention_array1=$clinical_content_ext->intervention;
                        $detailed_intervention_array=array();
                        foreach($intervention_array1 as $inter_item1) {
                        $intervention_type=(string)$inter_item1->intervention_type;
                        $intervention_name=(string)$inter_item1->intervention_name;
                        $other_name=$inter_item1->other_name;
                        $other_name_array=array();
                        for($i=0; $i<count($other_name); $i++)
                        {
                            $other_name_array[]=$other_name[$i];
                        }
                        
                        $detailed_intervention_array[]="<li>".$intervention_type.": ".$intervention_name."</li>".(string)$inter_item1->description."<br/>"."<b>Other Name: </b>".implode(",", $other_name_array);
                        }
                        
                        $detailed_intervention=implode("",$detailed_intervention_array);
                        
                        $drug_name=implode("<br/>",$drug_arr);

                       
                        $html_extraction=file_get_contents("$study_result_url?sect=X70156#outcome1");
                        $a = $this->DOM($html_extraction);
                        if(!is_null($a)){
                        $spans = $a->query("//*[contains(concat(' ', normalize-space(@class), ' '), 'header3 note_outcome_color')]");

                        $current_div= $spans->item(0);
                        $primary_measure_value="";
                        $result_next=array();
                        if(isset($current_div->parentNode->parentNode->nodeValue)) {

                        $result_next[]=$current_div->parentNode->parentNode->nodeValue;
                        $implode_array=implode("<br/>", $result_next);     
                        
                        $explode_array=explode("[2]", $implode_array);
                        
                        $res_pri=explode(":",trim(str_replace("[1]","",$explode_array[0])));
                        $primary_text1=$res_pri[0];
                        $primary_res1=iconv(mb_detect_encoding(trim(preg_replace('/\s+/', ' ', $res_pri[1])), mb_detect_order(), true), "UTF-8", trim(preg_replace('/\s+/', ' ', $res_pri[1])));
                        
                        $second_array=explode("[3]",$explode_array[1]);
                        $res_pri1=explode(":",trim($second_array[0]));
                        $primary_text2=$res_pri1[0];
                        $primary_res2=iconv(mb_detect_encoding(trim(preg_replace('/\s+/', ' ', $res_pri1[1])), mb_detect_order(), true), "UTF-8", trim(preg_replace('/\s+/', ' ', $res_pri1[1])));
                        
                        $res_pri2=explode(":",trim($second_array[1]));
                        $primary_text3=$res_pri2[0];
                        $primary_res3=iconv(mb_detect_encoding(trim(preg_replace('/\s+/', ' ', $res_pri2[1])), mb_detect_order(), true), "UTF-8", trim(preg_replace('/\s+/', ' ', $res_pri2[1])));
                        }
                        }
                        
                        $implode_primary=implode("", $this->saveHTML($html_extraction,"indent1",2));
                        $implode_primary_cnt=utf8_decode(implode("", $this->saveHTML($implode_primary,"body3 indent2",0)));
                        $intent2=implode("",$this->saveHTML($implode_primary_cnt,"indent2",0));
                        
                        $event_a =$this->DOM($intent2);
                        
                        if(!is_null($event_a)) {
                        $spans1 = $event_a->query("//*[contains(concat(' ', normalize-space(@class), ' '), 'data_table')]");
                        $no_of_elem=$spans1->item(0);
                        $primary_measure_value=preg_replace("/<([a-z][a-z0-9]*)[^>]*?(\/?)>/i",'<$1$2>',$no_of_elem->ownerDocument->saveHTML($no_of_elem));
                        }
                        // getting serious adverse events
                        $html_extraction_event=file_get_contents("$study_result_url?sect=X30156#evnt");
                        $serious_event_array=$this->adverseEvent($html_extraction_event);
                        $serious_event_header=$serious_event_array[0];
                        $serious_event_values=$serious_event_array[1];
                          
                        $implode_serious=implode("", $this->saveHTML($html_extraction_event,"indent1",3));
                        $implode_serious_cnt2=preg_replace("/<([a-z][a-z0-9]*)[^>]*?(\/?)>/i",'<$1$2>',$implode_serious);
                        $implode_serious_cnt1=preg_replace('/<\/?a[^>]*>/','',$implode_serious_cnt2);
                        $implode_serious_cnt=str_replace("Hide Serious Adverse Events","",$implode_serious_cnt1);
                         
                        // getting other adverse events
                        $html_extraction_event1=file_get_contents("$study_result_url?sect=X40156#othr");
                        $other_event_array=$this->adverseEvent($html_extraction_event1);
                        $other_event_header=$other_event_array[0];
                        $other_event_values=$other_event_array[1];

                        $implode_other=implode("", $this->saveHTML($html_extraction_event1,"indent1",3)); 
                        $implode_other_cnt=preg_replace("/<([a-z][a-z0-9]*)[^>]*?(\/?)>/i",'<$1$2>',utf8_decode(implode("", $this->saveHTML($implode_other,"header3 indent2",1))));
                        
                        $html_extraction_outcome=file_get_contents("$study_result_url?sect=X01256#all");
                        $detailed_outcome_measure1=preg_replace("/<([a-z][a-z0-9]*)[^>]*?(\/?)>/i",'<$1$2>',utf8_decode(implode("", $this->saveHTML($html_extraction_outcome,"indent1",2)))); 
                        $detailed_outcome_measure=iconv(mb_detect_encoding($detailed_outcome_measure1, mb_detect_order(), true), "UTF-8", $detailed_outcome_measure1);

                        $serious_adv_val=array("key"=>$serious_event_header,"value"=>$serious_event_values);
                        $other_adv_val=array("key"=>$other_event_header,"value"=>$other_event_values);
                         
                        $SponserModel= new SponserModel();
                        $sponser_id=$SponserModel->AddSponser($sponsor_name);
                        
                        $DrugModel= new DrugModel();
                        $drug_id=$DrugModel->AddDrug($drug_name);
                        
                        $ConditionModel= new ConditionModel();
                        $condition_id=$ConditionModel->AddCondition($condition_name);
                        
               $UrlExist=$ClinicalTrialModel->FetchClinicalTrial($url,$molecule_or_indication);
               if($UrlExist==null){        
                        $ClinicalTrialModel->ClinicalTrialInsert($rss_feed_id,$nct_id,$title,$collaborator_name,$phase,$intervention_implode,
                        $status_name,$firstreceived_date,$lastchanged_date,$verification_date,$start_date,$study_completion_date,$primary_completion_date,$study_type,$study_design,$enrollment,
                        $primary_text1,$primary_text2,$primary_text3,$primary_res1,$primary_res2,$primary_res3,$url,$implode_serious_cnt,$implode_other_cnt,$serious_adv_val,$other_adv_val,
                        $official_title,$brief_title,$brief_summary,$detailed_description,$detailed_intervention,$primary_measure_def,$primary_measure_value,$detailed_outcome_measure,$drug_id,$condition_id,$sponser_id);
                        
               }else{
//                        $clinical_trial_id=$UrlExist->_id;
                        $ClinicalTrialModel->ClinicalTrialUpdate($rss_feed_id,$nct_id,$title,$collaborator_name,$phase,$intervention_implode,
                        $status_name,$firstreceived_date,$lastchanged_date,$verification_date,$start_date,$study_completion_date,$primary_completion_date,$study_type,$study_design,$enrollment,
                        $primary_text1,$primary_text2,$primary_text3,$primary_res1,$primary_res2,$primary_res3,$url,$implode_serious_cnt,$implode_other_cnt,$serious_adv_val,$other_adv_val,
                        $official_title,$brief_title,$brief_summary,$detailed_description,$detailed_intervention,$primary_measure_def,$primary_measure_value,$detailed_outcome_measure,$drug_id,$condition_id,$sponser_id);
                          
               }
               }
            }
           
       
   }
   
   public function adverseEvent($html){
        
       $adverse_table_a=$this->DOM($html);
       
        //fetching serious adverse header name from html content using class name of html tag
       $adverse_table_spans = $adverse_table_a->query("//*[contains(concat(' ', normalize-space(@class), ' '), 'header3 brt bold_events_color')]");
        $ad_result_next = array();
       $adverse_current_div= $adverse_table_spans->item(0);
       if(isset($adverse_current_div->parentNode->parentNode->firstChild)) {
       $ad_nextelement = $adverse_current_div->parentNode->parentNode->firstChild;
       $ad_result_next[]=$ad_nextelement->nodeValue;
       }

       $implode_array=implode("<br/>", $ad_result_next);
       $exp_array =explode("<br/>",preg_replace('#\x{00a0}#','<br/>', utf8_decode(preg_replace("/\s/",'',$implode_array))));
       
       $explode_array=  array_values(array_filter($exp_array, function($val) {return $val!=='';}));  
 
        //fetching serious adverse total values from html content using class name of html tag
        $result_second_element=array();
        if(isset($adverse_current_div->parentNode->parentNode)) {
        $secondelement =$adverse_current_div->parentNode->parentNode;
        
       $i=0;
       foreach($secondelement->childNodes as $child)
        {
          if($i==2)
           {
             $result_second_element[]=$secondelement->ownerDocument->saveHTML($child);
             break;
           }else if($i==0 || $i==1){
             $i++;  
           }
          
        }
        }
        
       $implode_val_array=implode("<br/>", $result_second_element);
       $exp_array =explode("<br/>",preg_replace('#\x{00a0}#','<br/>', utf8_decode(preg_replace("/\s/",'',preg_replace("&# participants affected / at risk&","", strip_tags($implode_val_array))))));
     
       $explode_val_array= array_values(array_filter($exp_array, function($val) {return $val!=='';}));
//        echo "<pre>";var_dump($explode_val_array);echo "</pre>";
//       exit();
       $odd = array();
        $even = array();
        foreach ($explode_val_array as $k => $v) {
            if ($k % 2 == 0) {
                $even[] = $v;
            }
            else {
                $odd[] = $v;
            }
        }
        $second_elm_val=array();
        for ($index = 0; $index < count($even); $index++) {
            $second_elm_val[]=$even[$index].$odd[$index];
        }
        
        $two_array=array($explode_array,$second_elm_val);
//        var_dump($two_array);
//exit();
        return $two_array;
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
     public function saveHTML($html,$class,$item){

        $event_a =$this->DOM($html);
        $result_element = array();
        if(!is_null($event_a)){
        $event_spans = $event_a->query("//*[contains(concat(' ', normalize-space(@class), ' '), '$class')]");
        $nextelement=$event_spans->item($item);
        
        if(isset($nextelement->childNodes)) {
        foreach($nextelement->childNodes as $child)
        {
        $result_element[]=$nextelement->ownerDocument->saveHTML($child);
        }
        
        }
        return $result_element; 
        }else{
         return $result_element;    
        }
        

   }
   
}
