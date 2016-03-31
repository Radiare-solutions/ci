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
        $this->indicationExists();
        foreach ($therapy as $therapyDetail['attributes']) {
            $details['therapyName'] = $therapyDetail['attributes']['Therapy'];
            $details['_id'] = $therapyDetail['attributes']['_id'];
            $ob = new \stdClass();
            $test = array();
            $ob->therapyName = $details['therapyName'];
            $ob->_id = $details['_id'];
            foreach ($therapyDetail['attributes']['Indication'] as $indicationDetail) {
                //print_r($indicationDetail['Name']);
                array_push($test, $indicationDetail['Name']);
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
            $indicationObj = new Indication();
            $indicationObj->add($request);

            return response()->json([
                        'success' => true,
                        'message' => "Indication Added Successfully"
                            ], 200);
        }
    }

    public function indicationExists() {
        $therapyID = '56efd36c9191b80388f1f1a0';
        $indication = '456';

        $result = \Illuminate\Support\Facades\DB::collection('posts')->raw(function($collection) 
        {
            return $collection->aggregate(array (
                array('$unwind' => '$Indication'),
                array(
                    '$match' => array(
                    '_id' => new \MongoDB\BSON\ObjectId('56efd36c9191b80388f1f1a0'),
                        ),
                    '$and' => array('Indication.Name' => array('456')),
                ),
                array('$project' => array(
                    'Therapy' => 1,
                    'Indication' => 1,
                ))
            ));
        });
        echo '<pre>';
        print_r($result);
        exit;
    }

    public function load($id) {
        $indicationDetails = Indication::find($id);
        if (!empty($indicationDetails)) {
            $details['therapyName'] = $indicationDetails['attributes']['Therapy'];
            $details['indicationName'] = $indicationDetails['attributes']['Indication'][0]['Name'];
            return $details;
        } else {
            return 0;
        }
    }

}
