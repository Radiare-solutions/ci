<?php

namespace App\Http\Controllers\Therapeutic;

use App\Http\Controllers\Controller;
use App\Models\Therapeutic\Therapeutic;
use Illuminate\Http\Request;
use Validator;
use MongoDB\Model;
use MongoDB\BSON\ObjectID;

class TherapeuticController extends Controller {

    public function index() {
        $listDetails = array();
               
        $therapyDetails = Therapeutic::where('isActive', 1)->get();

        foreach($therapyDetails as $therapyDetail) {
            $therapy = $therapyDetail['attributes'];
            $test['tid'] = (string) $therapy['_id'];
            $test['therapeuticName'] = $therapy['Name'];
            array_push($listDetails, $test);
        }        
        return view('therapeutic/index', array('details' => json_encode($listDetails)));        
    }

    public function store(Request $request) {
        
        $validator = Validator::make($request->all(), [
                    'therapeuticName' => 'required|unique:therapy,Name,'.$request->tid.',_id',                    
        ]);        
        if ($validator->fails()) {
            $errors = $validator->errors();
            $errors = json_decode($errors);

            return response()->json([
                        'success' => false,
                        'message' => $errors
                            ], 422);
        } else {
            $str = $this->therapeuticExists($request);
            return response()->json([
                        'success' => true,
                        'message' => "Molecule ".$str." Successfully"
                            ], 200);
        }
    }

    public function therapeuticExists($request) {             
        $obj = new Therapeutic();        
        return $result = $obj->checkTherapeuticExists($request);                                
    }

    public function load($tid) {
        $obj = new Therapeutic();
        return $obj->loadTherapeuticDetails($tid);        
    }
    
    public function removeTherapeutic($tid) {
        $obj = new Therapeutic();
        return $obj->removeTherapeutic($tid);
    }
}
