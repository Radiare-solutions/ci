<?php

namespace App\Http\Controllers\Indication;

use App\Http\Controllers\Controller;
use App\Models\Indication\Indication;
use App\Models\Therapeutic\Therapeutic;
use Illuminate\Http\Request;
use App\Http\Requests\IndicationRequest;
use Validator;
use MongoDB\Model;
use MongoDB\BSON\ObjectID;

class IndicationController extends Controller {

    public function index() {
        $listDetails = array();
        // $therapy = Indication::where('isActive', 1)->get();  
        $indicationObj = new Indication();
        $therapy = $indicationObj->loadActiveIndications();
//echo '<pre>';
//               print_r($therapy);
//               exit;
        $therapeutic = Therapeutic::where('isActive', 1)->get();
        foreach ($therapy as $therapyDetail) {
            $ob = new \stdClass();
            $therapyOb = Therapeutic::find($therapyDetail['therapy']);
            $ob->therapyName = $therapyOb['attributes']['Name'];
            $ob->_id = (string) $therapyDetail['therapy'];
            $test = array();
            //foreach ($therapyDetail['indication'] as $indicationDetail) {
//               echo '<pre>';
//               print_r($indicationDetail);
//               exit;
            $testing['Name'] = $therapyDetail['indication']['indication'];
            $testing['_id'] = (string) $therapyDetail['indication']['_id'];
            array_push($test, $testing);
            //}
            $ob->indicationName = $test;
            array_push($listDetails, $ob);
            /* $details['therapyName'] = $therapyDetail['attributes']['Therapy'];
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
              //exit; */
            //$therapyObj = Therapeutic::find($therapyDetail['attributes']['Therapy']);
        }
//        echo '<pre>';
//        print_r($listDetails);
//        exit;
        return view('indication/index', array('therapy' => $therapy, 'therapeutic' => $therapeutic, 'details' => json_encode($listDetails)));
    }

    public function store(IndicationRequest $request) {
        $validator = Validator::make($request->all(), [
                    //'indicationName' => 'required',
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
            $obj = new Indication();
            $str = $this->indicationExists($request);

            return response()->json([
                        'success' => true,
                        'message' => "Indication " . $str . " Successfully"
                            ], 200);
        }
    }    

    public function indicationExists($request) {
        $obj = new Indication();
        return $obj->indicationExists($request);
    }

    public function load($tid, $iid) {
        $obj = new Indication();
        return $obj->loadIndicationDetails($tid, $iid);
    }

    public function removeIndication($tid, $iid) {
        $obj = new Indication();
        return $obj->removeIndication($tid, $iid);
    }

}
