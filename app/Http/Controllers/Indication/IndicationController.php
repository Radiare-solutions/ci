<?php

namespace App\Http\Controllers\Indication;

use App\Http\Controllers\Controller;
use App\Models\Indication\Indication;
use Illuminate\Http\Request;
use Validator;
use MongoDB\Model;
use MongoDB\BSON\ObjectID;

class IndicationController extends Controller {

    public function index() {
        $listDetails = array();
        $therapy = Indication::all();        
        foreach ($therapy as $therapyDetail['attributes']) {
            $details['therapyName'] = $therapyDetail['attributes']['Therapy'];
            $details['_id'] = $therapyDetail['attributes']['_id'];
            $ob = new \stdClass();
            $test = array();
            $ob->therapyName = $details['therapyName'];
            $ob->_id = $details['_id'];
            foreach ($therapyDetail['attributes']['Indication'] as $indicationDetail) {
               $testing['Name'] = $indicationDetail['Name'];
               $testing['_id'] = (string) $indicationDetail['_id'];
               array_push($test, $testing);
            }
            $ob->indicationName = $test;
            array_push($listDetails, $ob);
            //exit;
        }
        
        return view('indication/index', array('therapy' => $therapy, 'details' => json_encode($listDetails)));
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
                    'indicationName' => 'required',
                    'therapyName' => 'required',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            $errors = json_decode($errors);

            return response()->json([
                        'success' => false,
                        'message' => $errors
                            ], 422);
        } else {
            $str = $this->indicationExists($request);
            return response()->json([
                        'success' => true,
                        'message' => "Indication ".$str." Successfully"
                            ], 200);
        }
    }

    public function indicationExists($request) {
             
        $obj = new Indication();        
        return $result = $obj->checkIndicationExists($request);                
        
        
    }

    public function load($tid, $iid) {
        $obj = new Indication();
        return $obj->loadIndicationDetails($tid, $iid);        
    }
    
    public function removeIndication($iid) {
        $obj = new Indication();
        return $obj->removeIndication($iid);
    }

}
