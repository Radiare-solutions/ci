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
use Validator;
use MongoDB\Model;
use MongoDB\BSON\ObjectID;

class SummaryController extends Controller {
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

    public function studySummary(Request $request) {
        $clinical_id = $request->get('id');
        $back_url= $request->get('back');
        $navArr = $request->get('navArr');

        $clinical_content = $this->clinicalTrial->find($clinical_id);
        $value = $clinical_content['attributes'];
        $condition_id = $value['condition_id'];
        $sponsor_id = $value['sponsor_id'];
        $status_id = $value['status_id'];
        $phase_id = $value['phase_id'];

        $condition_name_array = $this->conditionModel->find($condition_id);
        $condition_name = $condition_name_array->condition_name;

        $sponsor_name_array = $this->sponsorModel->find($sponsor_id);
        $sponsor_name = $sponsor_name_array->sponsor_name;

        $status_name_array = $this->statusModel->find($status_id);
        $status_name = $status_name_array->status_name;

        $phase_name_array = $this->phaseModel->find($phase_id);
        $phase_name = $phase_name_array->phase_name;

        $data = $clinical_content['attributes'];

        $data['condition_name'] = $condition_name;
        $data['sponsor_name'] = $sponsor_name;
        $data['status_name'] = $status_name;
        $data['phase_name'] = $phase_name;

        return view('clinical_trials.summary_dbd', array('clinical_content' => array($data), 'nav_key' => $navArr, 'back' => $back_url));
    }

    public function createAdverseChart(Request $request) {
        $clinical_id = $request->input('clinical_id');
        $adverse_type = $request->input('adverse_type');

        $AdverseData = $this->clinicalTrial->loadAdverseValues($clinical_id);
        $clinicalAttr = $AdverseData['attributes'];
        if ($adverse_type == "serious") {
            $serious_arr = $clinicalAttr['serious_adv_event_val'];
            $serious_arr_key = $serious_arr['key'];
            $serious_arr_val = $serious_arr['value'];
            $adverse_arr = array();
            for ($pos = 0; $pos < count($serious_arr_key); $pos++) {
                $adverse_arr[$pos]['x'] = $serious_arr_key[$pos];
                $adverse_arr[$pos]['y'] = $serious_arr_val[$pos];
            }
        } else if ($adverse_type == "other") {
            $other_arr = $clinicalAttr['other_adv_event_val'];
            $other_arr_key = $other_arr['key'];
            $other_arr_val = $other_arr['value'];

            $adverse_arr = array();
            for ($pos = 0; $pos < count($other_arr_key); $pos++) {
                $adverse_arr[$pos]['x'] = $other_arr_key[$pos];
                $adverse_arr[$pos]['y'] = $other_arr_val[$pos];
            }
        }
        return $adverse_arr;
    }

}
