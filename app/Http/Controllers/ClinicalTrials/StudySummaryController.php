<?php
namespace App\Http\Controllers\ClinicalTrials;

use App\Http\Controllers\Controller;
use App\Models\ClinicalTrialModel;
use App\Models\ViewHelper;
use App\Models\SponserModel;
use App\Models\ConditionModel;
use App\Models\DrugModel;

class StudySummaryController extends Controller {
    
    public function loadStudySummary() {   
        $id = "573072d6488482220c005c1f";
        $obj = ClinicalTrialModel::find(new \MongoDB\BSON\ObjectId($id))->first();
        $trialAttr = $obj['attributes'];
        $sponsorObj = SponserModel::find($trialAttr['sponser_id']);
        $arr['sponsor_name'] = $sponsorObj['attributes']['sponsor_name'];
        $conditionObj = ConditionModel::find($trialAttr['condition_id']);
        $arr['condition_name'] = $conditionObj['attributes']['condition_name'];
        $drugObj = DrugModel::find($trialAttr['drug_id']);
        $arr['drug_name'] = $drugObj['attributes']['drug_name'];
        
        return view ('clinical_trails\study_summary', array('summaryData' => $obj, 'verifyNames' => $arr));
    }   
}
