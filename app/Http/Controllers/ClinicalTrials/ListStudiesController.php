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
        $sponsorData = $this->sponsorData();
        
        return view ('clinical_trails\list_studies', array('sponsorData' => $sponsorData));
    }
    
    public function sponsorData() {
        $ob = SponsorModel::where('isActive', 1)->get();
        $arr = array();
        foreach($ob as $detail) {
            $attr = $detail['attributes'];
            $details['id'] = (string) $attr['_id'];
            $details['sponsor_name'] = $attr['sponsor_name'];
            $count = ClinicalTrialModel::where('sponsor_id', $attr['_id'])->count();
            $details['total'] = $count;
            array_push($arr, $details);
        }
        return $arr;
    }
}
