<?php

namespace App\Http\Controllers\ClinicalTrials;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ClinicalTrialModel as ClinicalTrialModel;
use App\Models\ConditionModel as ConditionModel;
use App\Models\SponsorModel as SponsorModel;
use App\Models\DrugModel as DrugModel;
use App\Models\StatusModel as StatusModel;
use App\Models\PhaseModel as PhaseModel;
use ViewHelper;
use Validator;
use MongoDB\Model;
use MongoDB\BSON\ObjectID;

class ClinicalSearchController extends Controller {
    /*
     * to check whether the user has been logged in or not
     */
   
    public function __construct() {
        $this->clinicalTrial = new ClinicalTrialModel;
        $this->conditionModel = new ConditionModel;
        $this->sponsorModel = new SponsorModel;
        $this->drugModel = new DrugModel;
        $this->statusModel = new StatusModel;
        $this->phaseModel = new PhaseModel;
         
    }

    public function searchStudy($type='status_id',$value) {

        if($type=='status_id')
        {
           $status = $value; 
        }else{
           $status = array();  
        }
        
        if($type=='$phase')
        {
           $phase = $value; 
        }else{
           $phase = array();
        }

        if($type=='condition_id')
        {
           $condition = $value; 
        }else{
           $condition = array();
        }

        if($type=='drug_id')
        {
           $drug = $value; 
        }else{
           $drug = array();
        }
        
        if($type=='sponsor_id')
        {
           $sponsor = $value; 
        }else{
           $sponsor = array();
        }

        if($type=='study_completion_date')
        {
           $est_date = $value; 
        }else{
           $est_date = array();
        }

        $status_content = $this->statusModel->loadStatus();
        $statusArray = array();
        $pos = 0;
        foreach ($status_content as $statusVal) {
            $statusAttr = $statusVal['attributes'];
            $statusArray[$pos]['status_id'] = $statusAttr['_id'];
            $statusArray[$pos]['status_name'] = $statusAttr['status_name'];
            $pos++;
        }

        $phase_content = $this->phaseModel->loadPhase();

        $phaseArray = array();
        $phase_pos = 0;
        foreach ($phase_content as $phaseVal) {
            $phaseAttr = $phaseVal['attributes'];
            $phaseArray[$phase_pos]['phase_id'] = $phaseAttr['_id'];
            $phaseArray[$phase_pos]['phase_name'] = $phaseAttr['phase_name'];
            $phase_pos++;
        }

        $sponsor_content = $this->sponsorModel->loadSponsor();

        $sponsorArray = array();
        $sponsor_pos = 0;
        foreach ($sponsor_content as $sponsorVal) {
            $sponsorAttr = $sponsorVal['attributes'];
            $sponsorArray[$sponsor_pos]['sponsor_id'] = $sponsorAttr['_id'];
            $sponsorArray[$sponsor_pos]['sponsor_name'] = $sponsorAttr['sponsor_name'];
            $sponsor_pos++;
        }

        $drug_content = $this->drugModel->loadDrugs();

        $drugArray = array();
        $drug_pos = 0;
        foreach ($drug_content as $drugVal) {
            $drugAttr = $drugVal['attributes'];
            $drugArray[$drug_pos]['drug_id'] = new \MongoDB\BSON\ObjectId($drugAttr['_id']);
            $drugArray[$drug_pos]['drug_name'] = $drugAttr['drug_name'];
            $drug_pos++;
        }

        $condition_content = $this->conditionModel->loadCondition();

        $conditionArray = array();
        $condition_pos = 0;
        foreach ($condition_content as $conditionVal) {
            $conditionAttr = $conditionVal['attributes'];
            $conditionArray[$condition_pos]['condition_id'] = $conditionAttr['_id'];
            $conditionArray[$condition_pos]['condition_name'] = $conditionAttr['condition_name'];
            $condition_pos++;
        }

        $year_content = $this->clinicalTrial->getEstimatedCompletionDashboardResults();

        $estYearArr = array();

        foreach ($year_content as $yearVal) {
            $estYearArr[] = $yearVal['x'];
        }

        return view('clinical_trials.search_dbd', array("statusArr" => $statusArray, "conditionArr" => $conditionArray, "drugArr" => $drugArray, "phaseArr" => $phaseArray,
            "sponsorArr" => $sponsorArray, "estYearArr" => $estYearArr, "status" => $status, "phase" => $phase, "condition" => $condition, "drug" => $drug, "sponsor" => $sponsor, "est_date" => $est_date));
    }

    public function getAllClinicalRS(Request $request) {

        $take = (int) $request->get('show');
        $pagenum = (int) $request->get('pagenum');
        $statusArr = $request->get('status_arr');
        $phaseArr = $request->get('phase_arr');
        $drugArr = $request->get('drug_arr');
        $conditionArr = $request->get('condition_arr');
        $sponsorArr = $request->get('sponsor_arr');
        $yearArr = $request->get('year_arr');
        $back = $request->get('back');
        $field = $request->get('field');
        if($field==""){
            $field='clinical_title';
        }
        $order = $request->get('order');
        if($order==""){
            $order=1;
        }else{
            $order=(int)$order;
        }
        $skip = ($pagenum - 1) * $take;


//        var_dump($statusArr1);
        $search_param = array();
        $status_name_arr = array();
        $status_pos = 0;
        if (count($statusArr) != 0) {
            foreach ($statusArr as $value) {
                $statusArr1[] = new \MongoDB\BSON\ObjectId($value);

                $status_name_array = $this->statusModel->find($value);
                $status_name_arr[$status_pos]['_id'] = $value;
                $status_name_arr[$status_pos]['name'] = $status_name_array->status_name;
                $status_pos++;
            }
            $search_param[] = array('status_id' => array('$in' => $statusArr1));
        }

        $phase_name_arr = array();
        $phase_pos = 0;
        if (count($phaseArr) != 0) {
            foreach ($phaseArr as $value) {
                $phaseArr1[] = new \MongoDB\BSON\ObjectId($value);

                $phase_name_array = $this->phaseModel->find($value);
                $phase_name_arr[$phase_pos]['_id'] = $value;
                $phase_name_arr[$phase_pos]['name'] = $phase_name_array->phase_name;
                $phase_pos++;
            }
            $search_param[] = array('phase_id' => array('$in' => $phaseArr1));
        }

        $condition_name_arr = array();
        $condition_pos = 0;
        if (count($conditionArr) != 0) {
            foreach ($conditionArr as $value) {
                $conditionArr1[] = new \MongoDB\BSON\ObjectId($value);
                $condition_name_array = $this->conditionModel->find($value);
                $condition_name_arr[$condition_pos]['name'] = $condition_name_array->condition_name;
                $condition_name_arr[$condition_pos]['_id'] = $value;
                $condition_pos++;
            }
            $search_param[] = array('condition_id' => array('$in' => $conditionArr1));
        }

        $drug_name_arr = array();
        $drug_pos = 0;
        if (count($drugArr) != 0) {
            foreach ($drugArr as $value) {
                $drugArr1[] = new \MongoDB\BSON\ObjectId($value);
                $drug_name_array = $this->drugModel->find($value);
                $drug_name_arr[$drug_pos]['name'] = $drug_name_array->drug_name;
                $drug_name_arr[$drug_pos]['_id'] = $value;
                $drug_pos++;
            }
            $search_param[] = array('drug_id._id' => array('$in' => $drugArr1));
        }

        $sponsor_name_arr = array();
        $sponsor_pos = 0;
        if (count($sponsorArr) != 0) {
            foreach ($sponsorArr as $value) {
                $sponsorArr1[] = new \MongoDB\BSON\ObjectId($value);

                $sponsor_name_array = $this->sponsorModel->find($value);
                $sponsor_name_arr[$sponsor_pos]['name'] = $sponsor_name_array->sponsor_name;
                $sponsor_name_arr[$sponsor_pos]['_id'] = $value;
                $sponsor_pos++;
            }
            $search_param[] = array('sponsor_id' => array('$in' => $sponsorArr1));
        }

        $study_year_arr = array();
        
        $year_pos=0;
        if (count($yearArr) != 0) {
                foreach ($yearArr as $value) {
                $study_year_arr[$year_pos]['name'] = $value;
                $study_year_arr[$year_pos]['_id'] = $value;
                $year_pos++;
                }
                $search_param[] = array('est_year' => array('$in' =>$yearArr));
        }

        if (count($search_param) != 0) {
            if (count($search_param) > 1) {
                $search_param_and = array('$and' => $search_param);
            } else {
                $search_param_and = $search_param[0];
            }

            $totalPageArr = iterator_to_array($this->clinicalTrial->loadClinicalTrialByParam(0, 0, $search_param_and,$field,$order));
            $clinical_list_arr = iterator_to_array($this->clinicalTrial->loadClinicalTrialByParam($skip, $take, $search_param_and,$field,$order));
        } else {
            $totalPageArr = iterator_to_array($this->clinicalTrial->loadClinicalTrial(0, 0,$field,$order));
            $clinical_list_arr = iterator_to_array($this->clinicalTrial->loadClinicalTrial($skip,$take,$field,$order));
        }


        $pos = 0;
        $data = array();
//        echo "<pre>";
//        print_r($clinical_list_arr);
//        echo "</pre>";
        foreach ($clinical_list_arr as $clinical_content) {
            if (isset($clinical_content['attributes'])) {
                $value = $clinical_content['attributes'];
            } else {
                $value = $clinical_content;
            }

            $condition_id = $value['condition_id'];
            $status_id = $value['status_id'];
            $phase_id = $value['phase_id'];
            $intervention = $value['intervention'];
            $clinical_title = $value['clinical_title'];

            $condition_name_array = $this->conditionModel->find($condition_id);
            $condition_name = $condition_name_array->condition_name;

            $status_name_array = $this->statusModel->find($status_id);
            $status_name = $status_name_array->status_name;

            $phase_name_array = $this->phaseModel->find($phase_id);
            $phase_name = $phase_name_array->phase_name;

            $data[$pos]['condition_name'] = $condition_name;
            $data[$pos]['status_name'] = $status_name;
            $data[$pos]['intervention'] = $intervention;
            $data[$pos]['_id'] = $value['_id'];
            $data[$pos]['title'] = $clinical_title;
            $data[$pos]['phase_name'] = $phase_name;
            $data[$pos]['study_completion_date'] = $value['study_completion_date'];
            $data[$pos]['study_start_date'] = $value['study_start_date'];
            $pos++;
        }
        $nav = array();
        foreach ($totalPageArr as $clinical_content_id) {
            if (isset($clinical_content_id['attributes'])) {
                $value = $clinical_content_id['attributes'];
            } else {
                $value = $clinical_content_id;
            }
            $nav[] = $value['_id'];
        }


//        echo "<pre>";
//        var_dump($data);
//        echo "</pre>";
        $cnt1 = count($totalPageArr);
        $last = ceil($cnt1 / $take);
//        var_dump($statusArr);
        return view('clinical_trials.get_clinical_trial_rs', array('clinical_rs_content' => $data, "pageLimit" => $take, "pageNum" => $pagenum,
            "last" => $last, "total" => $cnt1, "statusArr" => $status_name_arr, "phaseArr" => $phase_name_arr, "conditionArr" => $condition_name_arr,
            "sponsorArr" => $sponsor_name_arr, "estYearArr" => $study_year_arr, "drugArr" => $drug_name_arr, "navArr" => $nav, "back" => $back,
            "field" => $field, "order" => $order));
    }

}
