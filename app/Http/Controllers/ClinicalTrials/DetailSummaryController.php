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

class DetailSummaryController extends Controller {
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


    public function detailedStudy(Request $request) {
        $clinical_id = $request->get('id');
        $back_url = $request->get('back');

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
        if ($data['detailed_outcome_measure'] != "") {
            $explode_secondary_arr = explode("Secondary:", $data['detailed_outcome_measure']);
            $primary_measure_arr = array();
            $secondary_measure = array();
            foreach ($explode_secondary_arr as $value) {
                if (preg_match_all("/Primary:/i", $value)) {
                    $primary_measure_arr[] = $value;
                } else {
                    $secondary_measure[] = $this->addOutcome(preg_replace("/&Acirc;/i", "", $value));
                }
            }
            $explode_primary_arr = explode("Primary:", implode("<br/>", $primary_measure_arr));
            $primary_measure = array();
            $var = 0;
            foreach ($explode_primary_arr as $value) {
                if ($var != 0) {
                    $primary_measure[] = $this->addOutcome(preg_replace("/&Acirc;/i", "", $value));
                }
                $var++;
            }
            $data['primary_outcome_measure'] = $primary_measure;
            $data['secondary_outcome_measure'] = $secondary_measure;
        } else {
            $data['primary_outcome_measure'] = array();
            $data['secondary_outcome_measure'] = array();
        }
        return view('clinical_trials.detailed_study_dbd', array('clinical_detail' => array($data), 'back_url' => $back_url));
    }

    public function addOutcome($html) {

        if (!empty($html)) {
            $DOM = new \DOMDocument();
            libxml_use_internal_errors(true);
            $DOM->loadHTML($html);
            libxml_use_internal_errors(false);
            $items = $DOM->getElementsByTagName('div');
            $child = $items[0];
            return $child->ownerDocument->saveHTML($child);
        } else {
            return null;
        }
    }

}
