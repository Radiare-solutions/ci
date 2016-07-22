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

class DashboardController extends Controller {
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
    
    public function index() {
        
        //Status
        $statusData = $this->clinicalTrial->getStatusDashboardResults();

        $conditionData = $this->clinicalTrial->getConditionDashboardResults();
        
        $estimatedCompletionData = $this->clinicalTrial->getEstimatedCompletionDashboardResults();
        
       
        
        $drugData = $this->clinicalTrial->getDrugDashboardResults();
 
        $drugTotal = DrugModel::where('isActive', 1)->count();        
        $conditionTotal = ConditionModel::where('isActive', 1)->count();       
        $sponsorTotal = SponsorModel::where('isActive', 1)->count(); 
        
        $sponsorData = $this->clinicalTrial->getSponsorDashboardResults();
        
        
        $phaseData = $this->clinicalTrial->getPhaseDashboardResults();
//        echo "<pre>";
//        print_r($phaseData);
//        echo "</pre>";
        $phaseTop = $phaseData[0][1];
//        $estimatedCompletionTotal = $this->clinicalTrial->getEstimatedCompletionForCurrentYear();        

        return view('clinical_trials.dashboard', array(
            'statusData' => $statusData,
            'phaseData' => $phaseData,
            'phaseTop' => $phaseTop,
            'estimatedCompletionData' => $estimatedCompletionData,
            'drugData' => $drugData,
            'drugTotal' => $drugTotal,
            'conditionData' => $conditionData,
            'conditionTotal' => $conditionTotal,
            'sponsorData' => $sponsorData,
            'sponsorTotal' => $sponsorTotal,
        ));
    }

}
