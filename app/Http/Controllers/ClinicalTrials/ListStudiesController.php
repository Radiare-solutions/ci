<?php
namespace App\Http\Controllers\ClinicalTrials;

use App\Http\Controllers\Controller;
use App\Models\ClinicalTrialModel;
use App\Models\ViewHelper;
use App\Models\SponsorModel;
use App\Models\ConditionModel;
use App\Models\DrugModel;
use App\Models\StatusModel;

class ListStudiesController extends Controller {
    
    public function loadStudyList() {   
        $id = "5732c7314884822404001f3b";
        
        return view ('clinical_trails\list_studies', array());
    }   
}
