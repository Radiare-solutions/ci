<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\RssModel as RssModel;

use App\Models\PatentModel as PatentModel;

use App\Models\ApplicantModel as ApplicantModel;

use App\Http\Requests;

/* 
 * it is used to control the patents data extraction part
 */
class PatentController extends Controller
{
    /*
     * used to call as the first function
     * arguments - none
     * return value - none
     *  null - if no match found
     */
  // public function Extract(Request $request){
    public function Extract() {
       set_time_limit(0);
       ini_set('max_execution_time', 0);
        //$api_query = $request->trial;
         $api_query="http://worldwide.espacenet.com/websyndication/searchFeed?AB=adalimumab&AP=&CPC=&DB=EPODOC&IC=&IN=&PA=&PD=&PN=&PR=&ST=advanced&Submit=Search&TI=&locale=en_EP";
        
        //rss feed type is Patents
        $rss_feed_type="Patents";
           
        //Checking whether the Feed URL is exist or not.
        $rssModel= new rssModel();
        $patentModal=new patentModel(); 
        $applicantModel= new applicantModel();
        
        $feedExist=$rssModel->rssFeedselect($api_query,$rss_feed_type);
        if($feedExist==null){
            // Inserting RSS FEED into ci_rss_feeds table
           $feedInsert=$rssModel->rssFeedinsert($api_query,$rss_feed_type);
           $rss_feed_id=$feedInsert->_id; 
        }else{
           // fetching primary key from Rss Feed Collection
           $rss_feed_id=$feedExist->_id; 
        }
       
        $content=file_get_contents($api_query);
        $xml=simplexml_load_string($content);

        $channel=$xml->channel;
        $items=$channel->item;
        

        foreach ($items as $answer){
            $patent_title=trim((string)$answer->title);
            $patent_link=(string)$answer->link;
            $patent_pubDate=(string)$answer->pubDate;
            
            //fetch data from <esp:priorityDate>
            //Use that namespace
            $namespaces = $answer->getNameSpaces(true);
            $esp = $answer->children($namespaces['esp']); 
            $priorityDate=(String)$esp->priorityDate;
            $publicationInfo=(String)$esp->publicationCycle;
            $cpcClassifications=(String)$esp->cpcClassifications;
            $ipcClassifications=(String)$esp->ipcClassifications;

            $patent_content = file_get_contents($patent_link);

            $xpath=$this->domElement($patent_content);
            
            
            $pub_no_arr=array();
            $pub_date_arr=array();
            foreach($xpath->query('.//h1[@class="noBottomMargin"]') as $pub_date_and_no){

               $pub_arr=strip_tags(preg_replace('!\s+!','', $pub_date_and_no->nodeValue));
               $pub_no=preg_replace("/Bibliographicdata:/i","", substr($pub_arr,0,-13));
               $pub_no_arr[]=trim(str_replace("&nbsp;","",$pub_no));
               $pub_date_arr[]=substr($pub_arr,-10);
           }
            $pub_no=  implode("", $pub_no_arr);
            $pub_date=  implode("", $pub_date_arr);
    
            $abstract_arr=array();
            foreach($xpath->query('.//p[@class="printAbstract"]') as $abstract_content){ 
                 $abstract_arr[]=preg_replace('!\s+!',' ', trim($abstract_content->nodeValue)); 
            }
            $abstract=implode("", $abstract_arr);
            
            $inventors_arr=array();
            foreach($xpath->query('.//span[@id="inventors"]') as $inventors){ 
                $inventors_arr[]=preg_replace('!\s+!',' ', trim(strip_tags($inventors->nodeValue))); 
            }
            $inventors= implode("", $inventors_arr);
            
            $applicants_arr=array();
            foreach($xpath->query('.//span[@id="applicants"]') as $applicants){ 
                $applicants_arr[]=preg_replace('!\s+!',' ', trim(strip_tags($applicants->nodeValue)));
            }
            
            $applicants=explode(";", implode("", $applicants_arr));
            $index_array=$this->getTable($patent_content);
    
//            if(isset($index_array[3])){
//                 $classification=preg_replace("/Classification:/i","",str_replace("less","",$index_array[3]));
//            }

            if(isset($index_array[4])){
                $Application_node=preg_replace("/Application number:/i","" ,$index_array[4]);
                $application= array_values(array_filter(explode(" ", $Application_node)));
                $application_no=$application[0];
                $filed_date=(int)$application[1];
            }
        
            if(isset($index_array[5])){ 
                $replace=explode(":",$index_array[5]);
                $priority_no1=array_values(array_filter(explode(";",$replace[1])));
                $priority_no=implode(",",$priority_no1);
            }
        
            if(isset($index_array[6])){
                $published_as=str_replace("less","",$index_array[6]);
            }
           
            $applicant_id_arr=array();
            foreach ($applicants as $value){

                $applicant_name= preg_replace("/[^a-zA-Z0-9 -_=#,.%&*(){}\s]/", "",$value);
                $applicant_name_id1=$applicantModel->fetchApplicant(trim($applicant_name)); //checking whether the applicant name is exist or not exist

                 if($applicant_name_id1==0) //we are adding the applicant into the applicant collection if applicant is not exist
                { 
                  $applicant_id_arr[]=$applicantModel->addApplicant($value);
                }else{
                  $applicant_id_arr[]=$applicant_name_id1['_id']; 
                }
            }
             
            $applicant_id=array();
            foreach ($applicant_id_arr as $value) {
               $applicant_id[]=array("_id"=>$value,"isActive"=>1);
            }


        $filed_by_month=DATE("F",strtotime($filed_date));
        $filed_by_year=DATE("Y",strtotime($filed_date));
        
        $insert_details=array("rss_feed_id"=>$rss_feed_id,
            "title"=>$patent_title,
            "link"=>$patent_link,
            "published_date"=>$patent_pubDate,
            "publication_no"=>$pub_no,
            "publication_date"=>$pub_date,
            "applicant_id"=>$applicant_id,
            "abstract"=>$abstract,
            "inventors"=>$inventors,
            "cpcClassifications"=>$cpcClassifications,
            "ipcClassifications"=>$ipcClassifications,
            "application_no"=>$application_no,
            "filed_date"=>$filed_date,
            "filed_by_month"=>$filed_by_month,
            "filed_by_year"=>$filed_by_year,
            "priority_no"=>$priority_no,
            "published_as"=>$published_as,
            "priority_date"=>$priorityDate,
            "publication_info"=>$publicationInfo);
        
        $patentModal->patentInsert($insert_details);  
        }
    
   }
     
    public function getTable($patent_content){
            $xpath =$this->domElement($patent_content);
            $index_array=array();
            foreach($xpath->query('.//table[@class="tableType3"]/tbody/tr') as $row) {
                if(isset($row->nodeValue)){
                $index_array[]=trim(preg_replace('!\s+!',' ',$row->nodeValue));
                }
            }
            return array_values(array_filter($index_array));
    }

    public function domElement($content){
         if(!empty($content)) {
          $dom= new \DOMDocument();
          libxml_use_internal_errors(true);
          $dom->loadHTML($content);
          libxml_use_internal_errors(false);
          $xpath = new \DOMXPath($dom);
          return $xpath;
           }
           else { return null; }
    }

}
