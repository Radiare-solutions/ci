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

class ListStudiesController extends Controller {

    public function loadStudyList($type, $value) {
        $statusData = $this->statusData();
        //  $sponsorData = $this->sponsorData();

        $ob = new ClinicalTrialModel();
        $arr = $ob->displayFilter($type, $value);
//        echo '<pre>';
//        print_r(json_decode($arr['phase']));
//        exit;
        return view('clinical_trails\list_studies', array(
            'statusData' => $statusData['arr'],
            'totalStatusCount' => $statusData['totalStatusCount'],
            'phaseData' => $arr['phase'],
            'conditionData' => $arr['condition'],
            'details' => $arr['details'],
            'type' => $type,
            'value' => $value,
            'totalRecords' => $arr['totalRecords'],
                //'sponsorData' => $sponsorData
        ));
    }

    public function displayFilters() {
        
    }

    public function filterStudies(Request $request, $page = 0, $field = 'clinical_title', $order = 'asc') {
        $ob = new ClinicalTrialModel();
        $details = $ob->getFilteredResults($request, $page, $field, $order);
        return response()->json([
                    'success' => true,
                    'message' => \View::make('clinical_trails\resultPartial', array('details' => $details['details'], 'page' => $page, 'totalRecords' => $details['total']))->render(),
                    'phaseFilter' => \View::make('clinical_trails\filter_phase', array('phaseData' => json_decode($details['phaseData'])))->render(),
                    'conditionFilter' => \View::make('clinical_trails\filter_condition', array('conditionData' => json_decode($details['conditionData'])))->render(),
                    'total' => $details['total'],
                        ], 200);
    }

    public function statusData($field = 'status_name', $order = 1) {
        $ob = StatusModel::where('isActive', 1)->orderBy($field, $order)->get();
        $arr = array();
        $totalStatusCount = 0;
        foreach ($ob as $detail) {
            $attr = $detail['attributes'];
            $details['id'] = (string) $attr['_id'];
            $details['status_name'] = $attr['status_name'];
            $count = ClinicalTrialModel::where('status_id', $attr['_id'])->count();
            $details['total'] = $count;
            $totalStatusCount = $totalStatusCount+$count;
            array_push($arr, $details);
        }
        return array('arr' => $arr, 'totalStatusCount' => $totalStatusCount);
    }

    /* public function filterStudies(Request $request, $page = 0, $field='clinical_title', $order='asc') {
      $ob = new ClinicalTrialModel();
      $details = $ob->getFilteredResults($request, $page, $field, $order);

      return response()->json([
      'success' => true,
      'message' => \View::make('clinical_trails\resultPartial', array('details' => $details, 'page' => $page))->render(),
      'total' => $details['total'],
      ], 200);
      }

      public function statusData($field = 'status_name', $order = 1) {
      $ob = StatusModel::where('isActive', 1)->orderBy($field, $order)->get();
      $arr = array();
      foreach ($ob as $detail) {
      $attr = $detail['attributes'];
      $details['id'] = (string) $attr['_id'];
      $details['status_name'] = $attr['status_name'];
      $count = ClinicalTrialModel::where('status_id', $attr['_id'])->count();
      $details['total'] = $count;
      array_push($arr, $details);
      }
      return $arr;
      }

      public function sponsorData() {
      $ob = SponsorModel::where('isActive', 1)->get();
      $arr = array();
      foreach ($ob as $detail) {
      $attr = $detail['attributes'];
      $details['id'] = (string) $attr['_id'];
      $details['sponsor_name'] = $attr['sponsor_name'];
      $count = ClinicalTrialModel::where('sponsor_id', $attr['_id'])->count();
      $details['total'] = $count;
      array_push($arr, $details);
      }
      return $arr;
      } */
}
