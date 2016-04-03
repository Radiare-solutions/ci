<?php

namespace App\Http\Controllers\Molecule;

use App\Http\Controllers\Controller;
use App\Models\Molecule\Molecule;
use Illuminate\Http\Request;
use Validator;
use MongoDB\Model;
use MongoDB\BSON\ObjectID;

class MoleculeController extends Controller {

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
        
        return view('molecule/index', array('therapy' => $therapy, 'details' => json_encode($listDetails)));
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
                    'moleculeName' => 'required',
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
            $str = $this->moleculeExists($request);
//            return response()->json([
//                        'success' => true,
//                        'message' => "Molecule ".$str." Successfully"
//                            ], 200);
        }
    }

    public function moleculeExists($request) {
             
        $obj = new Molecule();        
        return $result = $obj->checkMoleculeExists($request);                
        
        
    }

    public function load($tid, $mid) {
        $obj = new Molecule();
        return $obj->loadMoleculeDetails($tid, $mid);        
    }

}
