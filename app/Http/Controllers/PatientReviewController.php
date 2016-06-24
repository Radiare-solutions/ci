<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\RssModel as rssModel;

use App\Models\PatientReviewModelFT as PatientReviewModelFT;

use App\Models\PatientReviewModelSec as PatientReviewModelSec;

use App\Models\PRConditionModel as PRConditionModel;

class PatientReviewController extends Controller {

    public function Extract() {
            set_time_limit(0);
            ini_set('max_execution_time', 0);
            
            new \simple_html_dom();
             
            $drug_name=urlencode("adalimumab");
            $api_query="http://www.drugs.com/comments/".$drug_name;
            
            
             //rss feed type is Publications
            $rss_feed_type="Patient Reviews";
           
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
           
           if(preg_match_all("#www.drugs.com#i", $api_query, $matches)){
               
           $review_content= file_get_html($api_query);

           $count_array=array();
           foreach($review_content->find("span[itemprop='reviewCount']") as $review_count){
             $count_array[]=$review_count->innertext;
           }
               
           $review_count_value=implode(",",$count_array);

           
           $totalPages = ceil($review_count_value/25);
           $api_url="";
           for($i=1;$i<=$totalPages;$i++) {
               
                 $api_url=$api_query."/?page=".$i; 
                 $review_content= file_get_html($api_url); 
                 
                 $insert_details=array();
//                echo memory_get_usage()."<br/>";
                    foreach($review_content->find('div[class="block-wrap comment-wrap"]') as $review_value){

                    $review_title_arr=array();
                    foreach ($review_value->find('div.boxList < div.user-comment < p < b') as $review_title){ 
                        $review_title_arr[]=strip_tags($review_title);
                    }
                    $review_title=implode(",", $review_title_arr);
                    
                    $explode_condition=explode("For",ucwords($review_title));
                    
                    $review_condition=ltrim(trim($explode_condition[1],":"));
                    
                    $review_body_arr=array();
                    foreach ($review_value->find('div.boxList < div.user-comment < p < span') as $review_body){ 
                        $review_body_arr[]=strip_tags($review_body);
                    }
                    $explode_body=explode('"',implode(",", $review_body_arr));

                    $review_body=$explode_body[1];

                    
                    $review_date=trim($explode_body[2],",");

                    $rating_score_arr=array();
                    foreach ($review_value->find('div.rating-score') as $rating_score){ 
                        $rating_score_arr[]=strip_tags($rating_score);
                    }
                    $rating_score=implode(",", $rating_score_arr);
                    if($review_condition!=""){
                    $PRConditionModel= new PRConditionModel();
                    $review_condition=preg_replace("/[^a-zA-Z0-9 -_=#,.%&*(){}\s]/", "", $review_condition);
                    $condition_name=ucfirst(strtolower($review_condition));
                    $condition_name_id1=$PRConditionModel->FetchPRCondition(trim($condition_name)); //checking whether the condition name is exist or not exist
                    $condition_name_id=$condition_name_id1['attributes'];
                        
                 
                    if(count($condition_name_id)==0 || $condition_name_id==null || $condition_name_id=="") //we are adding the condition into the condition collection if condition is not exist
                    {
                      $condition_id=$PRConditionModel->AddPRCondition(trim($condition_name)); 
                    }else{
                      $condition_id=$condition_name_id['_id']; 
                    }
                    }else{
                        $condition_id=0;
                    }
                        
 
                $insert_details[] = array('rss_feed_id'=>$rss_feed_id,'review_title'=>$review_title,'review_body' => $review_body,
                'review_date'=>$review_date,'rating_score'=>$rating_score,'review_condition'=>$review_condition,'review_url'=>$api_url);
               }
//             echo memory_get_usage()."<br/>";
            $PatientReviewModel1=new PatientReviewModelFT();
            $PatientReviewModel1->AddPatientReview($insert_details);
           }
          }else if(preg_match_all("#www.druglib.com#i", $api_query, $matches)){
              
              $review_content= file_get_html($api_query);
              $api_url=$api_query;
              
              $insert_details=array();
               foreach($review_content->find("table < tbody < tr < td < center < table") as $review_value){

                  $rate_count=0;
                  foreach($review_value->find("img") as $img){
                      $img_src=$img->src;
                      
                      if($img_src=="/img/red_star.gif"){
                          $rate_count++;
                      }
                  }
                  
                  $review_condition= strip_tags((string)$review_value->find("tr",7));
                  $review_benefit= strip_tags((string)$review_value->find("tr",12));
                  $review_side_effect=  strip_tags((string)$review_value->find("tr",13));
                  $review_comment= strip_tags((string)$review_value->find("tr",14));
                  
                   
                $insert_details[]= array('rss_feed_id'=>$rss_feed_id,'review_condition'=>$review_condition,'review_benefit' =>$review_benefit,
                'review_side_effect'=>$review_side_effect,'rate_count'=>$rate_count,'review_comment'=>$review_comment,'review_url'=>$api_url);     

               }
               
           $PatientReviewModel2=new PatientReviewModelSec();    
           $PatientReviewModel2->AddPatientReview($insert_details);
          }
    }  
         
}

