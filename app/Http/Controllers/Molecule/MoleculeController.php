<?php

namespace App\Http\Controllers\Molecule;

use App\Http\Controllers\Controller;
use App\Models\Molecule\Molecule;
use App\Models\Molecule\Level1;
use App\Models\Molecule\Level2;
use Illuminate\Http\Request;
use Validator;
use MongoDB\Model;
use MongoDB\BSON\ObjectID;

class MoleculeController extends Controller {

    public function index() {
        $listDetails = array();
        $level1Details = Level1::all();  
        $level1 = array();
        $level2 = array();
        $molecule = array();
        foreach ($level1Details as $levelDetail['attributes']) {
            /*echo '<pre>';
            print_r($levelDetail);
            exit; */
            foreach($levelDetail as $level1Detail) {
//                echo '<pre>';
//                print_r($level1Detail['_id']);
//                exit;
            $level1details['_id'] = (string) $level1Detail['_id'];
            $level1details['level1Name'] = $level1Detail['Name'];
            array_push($level1, $level1details);
            }
        }
        
        $moleculeDetails = Molecule::all();
        
        echo '<pre>';
        print_r($moleculeDetails->attributes);
        exit;
        
        return view('molecule/index', array('level1' => $level1));        
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
                    'level1Name' => 'required',
                    'level2Name' => 'required',
                    'moleculeName' => 'required',
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
    
    public function loadLevel2Data($l1id) {
        // echo "l1id : ".$l1id."<br>";
        $obj = new Level2();
        $result = $obj->loadLevel2Data($l1id);
        return response()->json([
                        'success' => true,
                        'message' => $result
                            ], 200);
    }

}
