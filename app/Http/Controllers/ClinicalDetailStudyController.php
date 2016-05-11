<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;

use App\Models\ClinicalTrialModel as ClinicalTrialModel;

use App\Models\ConditionModel as ConditionModel;

use App\Models\SponsorModel as SponsorModel;

use App\Models\StatusModel as StatusModel;

use App\Models\DrugModel as DrugModel;
/* 
 * it is used to control the clinical trial data extraction part
 */
class ClinicalDetailStudyController extends Controller
{
    /*
     * used to call as the first function
     * arguments - none
     * return value - none
     *  null - if no match found
     */
   public function index(){
       $ClinicalTrialModel= new ClinicalTrialModel();
       $ConditionModel= new ConditionModel();
       $SponsorModel= new SponsorModel();
       $StatusModel= new StatusModel();
       $clinical_id="5732c7424884822404001f41";
       
       $clinical_content=$ClinicalTrialModel->find($clinical_id);
       $value=$clinical_content['attributes'];
       $condition_id=$value['condition_id'];
       $sponsor_id=$value['sponsor_id'];
       $status_id=$value['status_id'];
       
       $condition_name_array=$ConditionModel->find($condition_id);
       $condition_name=$condition_name_array->condition_name;
       
       $sponsor_name_array=$SponsorModel->find($sponsor_id);
       $sponsor_name=$sponsor_name_array->sponsor_name;
       
       $status_name_array=$StatusModel->find($status_id);
       $status_name=$status_name_array->status_name;
       
       $data=$clinical_content['attributes'];
       $data['condition_name']=$condition_name;
       $data['sponsor_name']=$sponsor_name;
       $data['status_name']=$status_name;
       
       return view('clinical_trails\study_detail_summary',array('clinical_content' => array($data)));
   }
   
}
