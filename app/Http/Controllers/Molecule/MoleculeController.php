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
        $levels = Molecule::all();  
        $level1 = array();
        $level2 = array();
        $molecule = array();
        foreach ($levels as $levelDetail) {
            /*echo '<pre>';
            print_r($levelDetail);
            exit; */
            foreach($levelDetail['attributes']['Level1'] as $level1Detail) {
            $level1Details['_id'] = $level1Detail['_id'];
            $level1Details['level1Name'] = $level1Detail['Name'];
            array_push($level1, $level1Details);
            }
        }
//        echo '<pre>';
//        print_r($level1);
//        exit;
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
        $obj = new Molecule();
        $result = $obj->loadLevel2Data($l1id);
        return response()->json([
                        'success' => true,
                        'message' => $result
                            ], 200);
    }

}
