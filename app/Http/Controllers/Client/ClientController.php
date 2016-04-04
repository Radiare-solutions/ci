<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Molecule\Molecule;
use Illuminate\Http\Request;
use Validator;
use MongoDB\Model;
use MongoDB\BSON\ObjectID;

class ClientController extends Controller {

    public function index() {
        $listDetails = array();
        $therapy = Molecule::all();        
        foreach ($therapy as $therapyDetail['attributes']) {
            $details['therapyName'] = $therapyDetail['attributes']['Therapy'];
            $details['_id'] = $therapyDetail['attributes']['_id'];
            $ob = new \stdClass();
            $test = array();
            $ob->therapyName = $details['therapyName'];
            $ob->_id = $details['_id'];
            
            foreach ($therapyDetail['attributes']['Molecule'] as $moleculeDetail) {
               $testing['Name'] = $moleculeDetail['Name'];
               $testing['_id'] = (string) $moleculeDetail['_id'];
               array_push($test, $testing);
            }
            $ob->moleculeName = $test;
            array_push($listDetails, $ob);
            //exit;
        }
        return view('client/index');
        // return view('client/index', array('therapy' => $therapy, 'details' => json_encode($listDetails)));
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
                    'clientName' => 'required',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            $errors = json_decode($errors);

            return response()->json([
                        'success' => false,
                        'message' => $errors
                            ], 422);
        } else {
            $str = $this->clientExists($request);
            return response()->json([
                        'success' => true,
                        'message' => "Client ".$str." Successfully"
                            ], 200);
        }
    }

    public function clientExists($request) {
             
        $obj = new Client();        
        return $result = $obj->checkClientExists($request);                
        
        
    }

    public function load($cid) {
        $obj = new Client();
        return $obj->loadClientDetails($cid);        
    }

}
