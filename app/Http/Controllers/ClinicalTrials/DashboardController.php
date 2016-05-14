<?php

namespace App\Http\Controllers\ClinicalTrials;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\ClinicalTrialModel;
use App\Models\ViewHelper;
use App\Models\SponsorModel;
use App\Models\ConditionModel;
use App\Models\DrugModel;
use App\Models\StatusModel;

class DashboardController extends Controller {

    public function index() {
        $obData = new ClinicalTrialModel();
        $statusData = $obData->getStatusDashboardResults();
        $conditionData = $obData->getConditionDashboardResults();
        $estimatedCompletionData = $obData->getEstimatedCompletionDashboardResults();
        $drugData = $obData->getDrugDashboardResults();
        $sponsorData = $obData->getSponsorDashboardResults();
        $phaseData = $obData->getPhaseDashboardResults();
//        echo '<pre>';
//        print_r($estimatedCompletionData);
//        exit;
        return view('clinical_trails\dashboard', array(
            'statusData' => $statusData,
            'phaseData' => $phaseData,
            'estimatedCompletionData' => $estimatedCompletionData,
            'drugData' => $drugData,
            'conditionData' => $conditionData,
            'sponsorData' => $sponsorData
        ));
    }
}
