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

    public function loadStudyList() {
        $sponsorData = $this->sponsorData();

        return view('clinical_trails\list_studies', array('sponsorData' => $sponsorData));
    }

    public function filterStudies(Request $request, $page = 0, $field='clinical_title', $order='asc') {
        $ob = new ClinicalTrialModel();
        $details = $ob->getFilteredResults($request, $page, $field, $order);
        
        return response()->json([
                    'success' => true,
                    'message' => \View::make('clinical_trails\resultPartial', array('details' => $details, 'page' => $page))->render(),
                    'total' => $details['total'],
                        ], 200);
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
    }

}
