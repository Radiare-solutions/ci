<?php
namespace App\Http\Controllers\ClinicalTrials;

use App\Http\Controllers\Controller;
use App\Models\ClinicalTrialModel;
use App\Models\ViewHelper;
use App\Models\SponsorModel;
use App\Models\ConditionModel;
use App\Models\DrugModel;
use App\Models\StatusModel;
use App\Models\PhaseModel;

class StudySummaryController extends Controller {
    
    public function loadStudySummary($id) {   
        $obj = ClinicalTrialModel::find(new \MongoDB\BSON\ObjectId($id));
        $trialAttr = $obj['attributes'];
        $sponsorObj = SponsorModel::find($trialAttr['sponsor_id']);
        $arr['sponsor_name'] = $sponsorObj['attributes']['sponsor_name'];
        $conditionObj = ConditionModel::find($trialAttr['condition_id']);
        $arr['condition_name'] = $conditionObj['attributes']['condition_name'];
        //$drugObj = DrugModel::find($trialAttr['drug_id']);
        $arr['drug_name'] = "test";// $drugObj['attributes']['drug_name'];
        $statusObj = StatusModel::find($trialAttr['status_id']);
        $arr['status_name'] = $statusObj['attributes']['status_name'];
        $phaseObj = PhaseModel::find($trialAttr['phase_id']);
        $arr['phase_name'] = $phaseObj['attributes']['phase_name'];
        return view ('clinical_trails\study_summary', array('summaryData' => $obj, 'verifyNames' => $arr));
    }   
}
