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
use App\Models\PhaseModel;

class ListStudiesController extends Controller {

    public $type = "";
    public $value = "";

    public function loadStudyList($type='status_id', $value='all') {
        $statusData = $this->statusData();
        $this->type = $type;
        $this->value = $value;
        $ob = new ClinicalTrialModel();
        $arr = $ob->displayFilter($type, $value);
        $tempPhase = $this->displayDefaultFilters('phase', $arr);
        $tempStatus = $this->displayDefaultFilters('status', $arr);
        // $tempStatus = json_decode($tempStatus);
        // $tempPhase = json_decode($tempPhase);
   //     echo '<pre>';
//       print_r($tempStatus);
//           print_r($arr);
//     print_r($tempPhase);
//        exit;
//        // $tempSponsor = $this->displayDefaultFilters('sponsor', $arr);
        // $tempCondition = $this->displayDefaultFilters('condition', $arr);
        return view('clinical_trails\list_studies', array(
            // 'statusData' => $statusData['arr'],
            'statusData' => ($tempStatus['data']),
            'phaseData' => ($tempPhase['data']),
            'phaseTotal' => $tempPhase['phaseTotal'],
            'statusTotal' => $tempStatus['statusTotal'],
            'phaseAllValue' => ($arr['phaseAllValue']),
            'statusAllValue' => ($arr['statusAllValue']),
           // 'conditionData' => ($tempCondition),
           // 'sponsorData' => ($tempSponsor),
           // 'drugData' => $arr['drug'],
            'details' => $arr['details'],
            'type' => $this->type,
            'value' => $this->value,
            'totalRecords' => $arr['totalRecords'],
            //'totalRecords' => 1,
        ));
    }

    public function displayDefaultFilters($type, $arr) {
        $fnName = $type."Data";
        if ($this->type == $type."_id")
            $temp = ($this->$fnName());
        else
            $temp = $arr[$type];
        return ($temp);
    }

    public function filterStudies(Request $request, $page = 0, $field = 'clinical_title', $order = 'asc') {
        $ob = new ClinicalTrialModel();
        $details = $ob->getFilteredResults($request, $page, $field, $order);
        // echo '<pre>';
        // print_r($details);
        // exit;
        //$details = json_encode($details);
        
        return response()->json([
                    'success' => true,
                    'message' => \View::make('clinical_trails\resultPartial', array('details' => $details['details'], 'page' => $page, 'totalRecords' => $details['total']))->render(),
                    'phaseFilter' => \View::make('clinical_trails\filter_phase', array('phaseData' => ($details['phaseData']), 'phaseTotal' => $details['phaseTotal'], 'type' => $this->type, 'value' => $this->value, 'phaseAllValue' => json_decode($details['phaseAllValue'])))->render(),
                    'statusFilter' => \View::make('clinical_trails\filter_status', array('statusData' => ($details['statusData']), 'statusTotal' => $details['statusTotal'], 'statusAllValue' => json_decode($details['statusAllValue']), 'type' => $this->type, 'value' => $this->value, 'totalStatusCount' => 1))->render(),
                    // 'message' => \View::make('clinical_trails\resultPartial', array('details' => $details['details'], 'page' => $page, 'totalRecords' => $details['total']))->render(),
                    // 'phaseFilter' => \View::make('clinical_trails\filter_phase', array('phaseData' => ($details['phaseData']), 'phaseTotal' => $details['phaseTotal'], 'type' => $this->type, 'value' => $this->value))->render(),
                    // 'sponsorFilter' => \View::make('clinical_trails\filter_sponsor', array('sponsorData' => ($details['sponsorData']), 'type' => $this->type, 'value' => $this->value))->render(),
                    // 'conditionFilter' => \View::make('clinical_trails\filter_condition', array('conditionData' => ($details['conditionData']), 'type' => $this->type, 'value' => $this->value))->render(),
                    // 'statusFilter' => \View::make('clinical_trails\filter_status', array('statusData' => ($details['statusData']), 'statusTotal' => $details['statusTotal'], 'type' => $this->type, 'value' => $this->value, 'totalStatusCount' => 1))->render(),
                    // 'drugFilter' => \View::make('clinical_trails\filter_drug', array('drugData' => json_decode($details['drugData'])))->render(),
                    // 'total' => $details['total'],
                    'total' => $details['total'],
                        ], 200);
    }

    public function statusData($field = 'status_name', $order = 1) {
        $ob = StatusModel::where('isActive', 1)->orderBy($field, $order)->get();
        $arr = array();
        $totalStatusCount = 0;
        $statusAllValue = array();
        foreach ($ob as $detail) {
            $attr = $detail['attributes'];
            $details['status_id'] = (string) $attr['_id'];
            $details['status_name'] = $attr['status_name'];
            array_push($statusAllValue, $attr['_id']);
            $count = ClinicalTrialModel::where('status_id', $attr['_id'])->count();
            $details['status_count'] = $count;
            $totalStatusCount = $totalStatusCount + $count;
            array_push($arr, $details);
        }
        return array('data' => $arr, 'statusTotal' => $totalStatusCount, 'statusAllValue' => ($statusAllValue));
    }
    
    public function phaseData() {
        $ob = PhaseModel::where('isActive', 1)->get();
        $arr = array();
        $totalPhaseCount = 0;
        $phaseAllValue = array();
        foreach ($ob as $detail) {
            $attr = $detail['attributes'];
            $details['phase_id'] = (string) $attr['_id'];
            $details['phase_name'] = $attr['phase_name'];
            array_push($phaseAllValue, $attr['_id']);
            $count = ClinicalTrialModel::where('phase_id', $attr['_id'])->count();
            $details['phase_count'] = $count;
            $totalPhaseCount = $totalPhaseCount+$count;
            array_push($arr, $details);
        }
        return array('data' => $arr, 'phaseTotal' => $totalPhaseCount, 'phaseAllValue' => ($phaseAllValue));
    }    

    public function sponsorData() {
        $ob = SponsorModel::where('isActive', 1)->get();
        $arr = array();
        foreach ($ob as $detail) {
            $attr = $detail['attributes'];
            $details['sponsor_id'] = (string) $attr['_id'];
            $details['sponsor_name'] = $attr['sponsor_name'];
            $count = ClinicalTrialModel::where('sponsor_id', $attr['_id'])->count();
            $details['sponsor_count'] = $count;
            array_push($arr, $details);
        }
        return $arr;
    }
    
    public function conditionData() {
        $ob = ConditionModel::where('isActive', 1)->get();
        $arr = array();
        foreach ($ob as $detail) {
            $attr = $detail['attributes'];
            $details['condition_id'] = (string) $attr['_id'];
            $details['condition_name'] = $attr['condition_name'];
            $count = ClinicalTrialModel::where('condition_id', $attr['_id'])->count();
            $details['condition_count'] = $count;
            array_push($arr, $details);
        }
        return $arr;
    }
}
