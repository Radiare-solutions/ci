<?php
namespace App\Http\Controllers\ClinicalTrials;

use App\Http\Controllers\Controller;
use App\Models\ClinicalTrialModel;
use App\Models\ViewHelper;

class StudySummaryController extends Controller {
    
    public function loadStudySummary() {   
        $id = "571e0de4e3155e0810007c08";
        $obj = ClinicalTrialModel::find(new \MongoDB\BSON\ObjectId($id));

        return view ('clinical_trails\study_summary', array('summaryData' => $obj));
    }   
}
