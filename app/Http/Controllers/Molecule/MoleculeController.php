<?php

namespace App\Http\Controllers\Molecule;

use App\Http\Controllers\Controller;
use App\Models\Molecule\Molecule;
use App\Models\Molecule\Level1;
use App\Models\Molecule\Level2;
use Illuminate\Http\Request;
use App\Http\Requests\MoleculeRequest;
use Validator;
use MongoDB\Model;
use MongoDB\BSON\ObjectID;

class MoleculeController extends Controller {

    public function index() {
        $listDetails = array();
        $level1Details = Level1::where('isActive', 1)->get();  
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
        
        $moleculeDetails = Molecule::where('isActive', 1)->get();
        foreach($moleculeDetails as $moleculeDetail) {
            $molecule = $moleculeDetail['attributes'];
            //foreach($molecul as $molecule) {
                $l1id = $molecule['level1id'];
                $l2id = $molecule['level2id'];

                $test['level1id'] = (string) $l1id;
                $l1obj = Level1::where('_id', $l1id)->get();
                $test['level1Name'] = $l1obj[0]['attributes']['Name'];
                $test['level2id'] = (string) $l2id;
                $l2obj = new Level2();
                $test['level2Name'] = $l2obj->loadLevel2Name($l2id);
                $test['mid'] = (string) $molecule['_id'];
                $test['moleculeName'] = $molecule['Name'];
                array_push($listDetails, $test);
            //}
        }
        
        return view('molecule/index', array('level1' => $level1, 'details' => json_encode($listDetails)));        
    }

    public function store(MoleculeRequest $request) {
       
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
            return response()->json([
                        'success' => true,
                        'message' => "Molecule ".$str." Successfully"
                            ], 200);
        }
    }

    public function moleculeExists($request) {             
        $obj = new Molecule();        
        return $result = $obj->checkMoleculeExists($request);                                
    }

    public function load($mid, $index) {
        $obj = new Molecule();
        return $obj->loadMoleculeDetails($mid, $index);        
    }
    
    public function loadLevel2Data($l1id, $l2id) {
        // echo "l1id : ".$l1id."<br>";
        $obj = new Level2();
        $result = $obj->loadLevel2Data($l1id, $l2id);
        return response()->json([
                        'success' => true,
                        'message' => $result
                            ], 200);
    }
    
    public function loadMolecules($l1id, $l2id) {
        $ob = new Molecule();
        $result = $ob->loadMolecules($l1id, $l2id);
        return response()->json([
                        'success' => true,
                        'message' => $result
                            ], 200);
    }
    
    public function removeMolecule($mid) {
        $ob = new Molecule();
        return $ob->removeMolecule($mid);
    }

}
