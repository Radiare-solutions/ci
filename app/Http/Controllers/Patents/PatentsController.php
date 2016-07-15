<?php

namespace App\Http\Controllers\Patents;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PatentModel as patentModel;
use App\Models\ApplicantModel as applicantModel;
use Validator;
use MongoDB\Model;
use MongoDB\BSON\ObjectID;

class PatentsController extends Controller {
    
    /*
     * to check whether the user has been logged in or not
     */
    public function __construct() {
        // $this->middleware('auth');
        $this->patentModel=new patentModel();
        $this->applicantModel = new applicantModel();
    }
    
    public function index(Request $request){

        $applicantAll=$this->applicantModel->loadApplicants();
        
        $patent_year=$request->input('year');
        $pat_app=$request->input('applicant');      
        
        $applicantArray=array();
        $pos=0;
        foreach($applicantAll as $applicantVal) {
            $applicantAttr = $applicantVal['attributes'];
            $applicantArray[$pos]['applicant_id']=$applicantAttr['_id'];
            $applicantArray[$pos]['applicant_name']=$applicantAttr['applicant_name'];
            $pos++;
        }
        
        if(($patent_year!=0) && ($pat_app==0)){
             $data=array("applicant"=>$applicantArray,"yr"=>$patent_year,"app"=>0);   
         }else if(($patent_year!=0) && ($pat_app!=0)){
            $data=array("applicant"=>$applicantArray,"yr"=>$patent_year,"app"=>$pat_app); 
         }
         else if(($patent_year==0) && ($pat_app!=0)){
            $data=array("applicant"=>$applicantArray,"yr"=>0,"app"=>$pat_app);    
         }else{
            $data=array("applicant"=>$applicantArray,"yr"=>0,"app"=>0);   
         }
         
         return view('patents.dashboard',$data);  
    }
    public function getPatentPopup(Request $request){
        
        $patent_year=$request->get('year');
        $patent_applicant=$request->get('applicant');
        
        if(($patent_year!=0) && ($patent_applicant==0)){
            
        $patentsData = iterator_to_array($this->patentModel->loadPatentsByYear($patent_year,"",0,0,"publication_date",-1));
        } 
        else if(($patent_year!=0) && ($patent_applicant!=0)){
            
           $patentsData=iterator_to_array($this->patentModel->loadPatentsByAppandYear($patent_year,"",$patent_applicant,0,0,"publication_date",-1));
        }
        else if(($patent_year==0) && ($patent_applicant!=0)){

           $patentsData=iterator_to_array($this->patentModel->loadPatentsByApplicants($patent_applicant,0,0,"publication_date",-1));
        }
        else if(($patent_year==0) && ($patent_applicant==0)){
           $patentsData = $this->patentModel->loadPatents(0,0,"publication_date",-1); 
        }
        
       $nav_key=$request->get('nav_key');

        
        $patentArr = array();
        $position=0;
        foreach($patentsData as $patent) {
            
            if(isset($patent['attributes'])){
                $patentAttr = $patent['attributes'];    
            }
            else{
                $patentAttr = $patent;   
            }
            $patentArr[$position]['patent_id']=$patentAttr['_id'];
            $patentArr[$position]['title']=(String)$patentAttr['title'];
            $patentArr[$position]['link']=$patentAttr['link'];
            $patentArr[$position]['abstract']=$patentAttr['abstract'];
            
            $inventor_arr=explode(';',$patentAttr['inventors']);

            if(count($inventor_arr)>1){
               $num=count($inventor_arr)-1;
               $inventors_name= $inventor_arr[0]." (+".$num.")";
            }else{
               $inventors_name= $inventor_arr[0]; 
            }
            $patentArr[$position]['inventors']=$inventors_name;
            
            $patentArr[$position]['cpcClassifications']=$patentAttr['cpcClassifications'];
            $patentArr[$position]['ipcClassifications']=$patentAttr['ipcClassifications'];
            $patentArr[$position]['application_no']=$patentAttr['application_no'];
            $patentArr[$position]['filed_date']=DATE("Y-m-d",strtotime($patentAttr['filed_date']));
            $patentArr[$position]['filed_by_month']=$patentAttr['filed_by_month'];
            $patentArr[$position]['filed_by_year']=$patentAttr['filed_by_year'];
            $patentArr[$position]['priority_no']=$patentAttr['priority_no'];
            $patentArr[$position]['filed_by_year']=$patentAttr['filed_by_year'];
            $patentArr[$position]['publication_info']=$patentAttr['publication_info'];
            $patentArr[$position]['priority_date']=$patentAttr['priority_date'];
            $patentArr[$position]['published_as']=$patentAttr['published_as'];
            $patentArr[$position]['abstract']=$patentAttr['abstract'];
            $applicant_arr=$patentAttr['applicant_id'];
            $applicant_name_arr=array();
            foreach ($applicant_arr as $value){ 
                $applicant_id=$value['_id'];
                $applicnt_arr=$this->applicantModel->applicantsById($applicant_id);
                $applicant_name_arr[]=$applicnt_arr['attributes']['applicant_name'];
            }
            if(count($applicant_name_arr)>1){
               $num=count($applicant_name_arr)-1;
               $applicant_name= $applicant_name_arr[0]." (+".$num.")";
            }else{
               $applicant_name= $applicant_name_arr[0]; 
            }
            $patentArr[$position]['applicants']=$applicant_name;
            $position++;
        }
        
       
        if(($patent_year!=0 ) && ($patent_applicant==0)){
            $data=array("content"=>$patentArr,"nav_key"=>$nav_key,"yr"=>$patent_year,"app"=>0);  
        } 
        else if(($patent_year!=0) && ($patent_applicant!=0)){
            $data=array("content"=>$patentArr,"nav_key"=>$nav_key,"yr"=>$patent_year,"app"=>$patent_applicant);  
        }
        else if(($patent_year==0) && ($patent_applicant!=0)){
           $data=array("content"=>$patentArr,"nav_key"=>$nav_key,"yr"=>0,"app"=>$patent_applicant);  
        }
        else if(($patent_year==0) && ($patent_applicant==0)){
           $data=array("content"=>$patentArr,"nav_key"=>$nav_key,"yr"=>0,"app"=>0);
        }
        
        return view('patents.get_detail_patents',array('patent_detail'=>$data));    
    }
    
    public function getMonthJSON(Request $request){

        $patent_year=$request->input('year'); 
        $pat_app=$request->input('applicant');
                
        if(($patent_year!=0) && ($pat_app==0)){
           $patentsData = iterator_to_array($this->patentModel->loadPatentsByYear($patent_year,"",0,0,"publication_date",-1));
        } 
        else if(($patent_year!= 0) && ($pat_app!=0)){
           $patentsData=iterator_to_array($this->patentModel->loadPatentsByAppandYear($patent_year,"",$pat_app,0,0,"publication_date",-1));
        }
        else if(($patent_year==0) && ($pat_app==0)){
           $patentsData = $this->patentModel->loadPatents(0,0,"publication_date",-1); 
        }
        
        $month_arr=array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
         

       $monthly_patent_count=array();

        if($request->input('area')==1){
           $year = $request->input('year');  
           
           $monthly_patent_count=Array("01"=>array('y'=>"$year-01",'a'=>0),
           "02"=>array('y'=>"$year-02",'a'=>0),
           "03"=>array('y'=>"$year-03",'a'=>0),
           "04"=>array('y'=>"$year-04",'a'=>0),
           "05"=>array('y'=>"$year-05",'a'=>0),
           "06"=>array('y'=>"$year-06",'a'=>0),
           "07"=>array('y'=>"$year-07",'a'=>0),
           "08"=>array('y'=>"$year-08",'a'=>0),
           "09"=>array('y'=>"$year-09",'a'=>0),
           "10"=>array('y'=>"$year-10",'a'=>0),
           "11"=>array('y'=>"$year-11",'a'=>0),
           "12"=>array('y'=>"$year-12",'a'=>0)); 
            
           foreach ($patentsData as $value) {
                $month_number=date('m', strtotime($value['filed_by_month']));

                if($monthly_patent_count[$month_number]['y']=="$patent_year-$month_number"){
                        $monthly_patent_count[$month_number]['a']++;
                } 
           }
       }else{
               $monthly_patent_count=Array("01"=>array('y'=>'Jan','a'=>0),
           "02"=>array('y'=>'Feb','a'=>0),
           "03"=>array('y'=>'Mar','a'=>0),
           "04"=>array('y'=>'Apr','a'=>0),
           "05"=>array('y'=>'May','a'=>0),
           "06"=>array('y'=>'Jun','a'=>0),
           "07"=>array('y'=>'Jul','a'=>0),
           "08"=>array('y'=>'Aug','a'=>0),
           "09"=>array('y'=>'Sep','a'=>0),
           "10"=>array('y'=>'Oct','a'=>0),
           "11"=>array('y'=>'Nov','a'=>0),
           "12"=>array('y'=>'Dec','a'=>0));          
        foreach ($patentsData as $value) {
            $month_number=date('m', strtotime($value['filed_by_month']));
            $short_month=date('M', strtotime($value['filed_by_month']));

          if(in_array($short_month, $month_arr)) {
          if($monthly_patent_count[$month_number]['y']==$short_month){
                  $monthly_patent_count[$month_number]['a']++;
          }  
        }
        }
       }
       
        foreach ($monthly_patent_count as $index => $data) {
            $monthly_patent[]=$monthly_patent_count[$index];
        }
        return $monthly_patent;
    }
    
    public function getYearJSON(Request $request){
        
        $patent_year=$request->input('year');
        $pat_app=$request->input('applicant');
        
        if(($patent_year==0) && ($pat_app!=0)){
           $patentsData=iterator_to_array($this->patentModel->loadPatentsByApplicants($pat_app,0,0,"publication_date",-1));
        }else{
          $patentsData = $this->patentModel->loadPatents(0,0,"publication_date",-1);   
        }
        $current_year=Date('Y');
        $prev_year=$current_year-10;
        
        $year_arr=array();
        $pos=0;
        $year_patent_count=array();
        for($year_i=$prev_year; $year_i<=$current_year; $year_i++){
           $year_arr[]=$year_i; 
           $year_patent_count[$year_i]['y']=$year_i;
           $year_patent_count[$year_i]['a']=0;
           $pos++;
        }

        foreach ($patentsData as $value) {
          $year_number=$value['filed_by_year'];
          
          if($year_patent_count[$year_number]['y']==$year_number){
             $year_patent_count[$year_number]['a']++;
          }  
        }

        foreach ($year_patent_count as $index => $data) {
            $yearly_patent[]=$year_patent_count[$index];
        }
        
       if($request->input('area')==1){
           $area_yearly_patent=array();
           $p=0;
           foreach ($yearly_patent as $value) {
               $year=$value['y']+10;
               $area_yearly_patent[$p]['y']="$year";
               $area_yearly_patent[$p]['a']=$value['a'];
               $p++;
           }
           return $area_yearly_patent;
       }else{
           return $yearly_patent;
       }
        
    }
    public function getPatentResults(Request $request){
        
        $patent_year=$request->get('year');
        $pat_app=$request->get('applicant');
        $month=$request->get('month');
//        echo "Month Name: ".$month."<br/>";
        $take=(int)$request->get('show');
        $pagenum=(int)$request->get('pagenum');
        $sort_by=$request->get('sort_title');
        $order=(int)$request->get('sort_order');
        $ajaxCallName=$request->get('ajax');
        
        $skip= ($pagenum - 1) * $take;
        
        if(($patent_year!=0) && ($pat_app==0)){
          $totalPageArr=iterator_to_array($this->patentModel->loadPatentsByYear($patent_year,$month,0,0,$sort_by,$order));
          $patentsData= iterator_to_array($this->patentModel->loadPatentsByYear($patent_year,$month,$skip,$take,$sort_by,$order));  
          
        } 
        else if(($patent_year!=0) && ($pat_app!=0)){
          $totalPageArr=iterator_to_array($this->patentModel->loadPatentsByAppandYear($patent_year,$month,$pat_app,0,0,$sort_by,$order)); 
          $patentsData=iterator_to_array($this->patentModel->loadPatentsByAppandYear($patent_year,$month,$pat_app,$skip,$take,$sort_by,$order));
        }
        else if(($patent_year==0) && ($pat_app!=0)){
           $totalPageArr=iterator_to_array($this->patentModel->loadPatentsByApplicants($pat_app,0,0,$sort_by,$order));
           
           $patentsData=iterator_to_array($this->patentModel->loadPatentsByApplicants($pat_app,$skip,$take,$sort_by,$order));
        }else{ 
           $totalPageArr =iterator_to_array($this->patentModel->loadPatents(0,0,$sort_by,$order)); 
           $patentsData =iterator_to_array($this->patentModel->loadPatents($skip,$take,$sort_by,$order)); 
        }
//        echo $patentsData;
//        echo "<pre>";
//        print_r($patentsData);
//        echo "</pre>";
//        exit();

        $patentArr=array();
        $position=0;

        foreach($patentsData as $patent) {
            if(isset($patent['attributes'])){
            $patentAttr = $patent['attributes'];}
            else{
             $patentAttr = $patent;   
            }

            $patentArr[$position]['patent_id']=$patentAttr['_id'];
            $patentArr[$position]['title']=(String)$patentAttr['title'];
            $patentArr[$position]['link']=$patentAttr['link'];
            $patentArr[$position]['abstract']=$patentAttr['abstract'];
            
            $inventor_arr=explode(';',$patentAttr['inventors']);

            if(count($inventor_arr)>1){
               $num=count($inventor_arr)-1;
               $inventors_name= $inventor_arr[0]." (+".$num.")";
            }else{
               $inventors_name= $inventor_arr[0]; 
            }
            $patentArr[$position]['inventors']=$inventors_name;
            
            $patentArr[$position]['cpcClassifications']=$patentAttr['cpcClassifications'];
            $patentArr[$position]['ipcClassifications']=$patentAttr['ipcClassifications'];
            $patentArr[$position]['application_no']=$patentAttr['application_no'];
            $patentArr[$position]['filed_date']=DATE("Y-m-d",strtotime($patentAttr['filed_date']));
            $patentArr[$position]['filed_by_month']=$patentAttr['filed_by_month'];
            $patentArr[$position]['filed_by_year']=$patentAttr['filed_by_year'];
            $patentArr[$position]['priority_no']=$patentAttr['priority_no'];
            $patentArr[$position]['filed_by_year']=$patentAttr['filed_by_year'];
            $patentArr[$position]['publication_info']=$patentAttr['publication_info'];
            $patentArr[$position]['priority_date']=$patentAttr['priority_date'];
            $patentArr[$position]['published_as']=$patentAttr['published_as'];
            $applicant_arr=$patentAttr['applicant_id'];
            $applicant_name_arr=array();
            foreach ($applicant_arr as $value){ 
                $applicant_id=$value['_id'];
                $applicnt_arr=$this->applicantModel->applicantsById($applicant_id);
                $applicant_name_arr[]=$applicnt_arr['attributes']['applicant_name'];
            }
            if(count($applicant_name_arr)>1){
               $num=count($applicant_name_arr)-1;
               $applicant_name= $applicant_name_arr[0]." (+".$num.")";
            }else{
               $applicant_name= $applicant_name_arr[0]; 
            }
            $patentArr[$position]['applicants']=$applicant_name;
            $position++;
        }
        
        $cnt1=count($totalPageArr);
        $cnt=count($patentArr);
        $last =ceil($cnt1/$take);
        
        
         if(($patent_year!=0) && ($pat_app==0)){
            $yr=$patent_year;
            $app=0;   
         }
         else if(($patent_year!=0) && ($pat_app!=0)){
            $yr=$patent_year;
            $app=$pat_app;
         }
         else if(($patent_year==0) && ($pat_app!=0)){
            $yr=0;
            $app=$pat_app;
         }
         else{
            $yr=0;
            $app=0;
         }
         $data=array("patentData"=>$patentArr,"yr"=>$yr,"app"=>$app,"pageLimit"=>$take,"pageNum"=>$pagenum,"last"=>$last,"totalPage"=>$cnt,"skip"=>$skip,"sort"=>$sort_by,"order"=>$order,"month"=>$month,"ajax"=>$ajaxCallName);   
         
        return view('patents.get_patent_result',array('patent_rs'=>$data));    
    }
}
