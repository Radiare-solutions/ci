<?php

namespace App\Http\Controllers\Verify;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use MongoDB\Model;
use MongoDB\BSON\ObjectID;

use App\Models\DrugModel as DrugModel;

/**
 * Description of SponsorController
 *
 * @author abhishek
 */
class DrugController extends Controller {
    
    public function index() {
        $listDetails = array();
        $drugObj = DrugModel::where('isActive', 1)->get();
        foreach ($drugObj as $drugDetail) {
            $drugAttr = $drugDetail['attributes'];
            $arr['_id'] = (string) $drugAttr['_id'];
            $arr['name'] = $drugAttr['drug_name'];
            array_push($listDetails, $arr);
        }

        return view('verify/drug/index', array('details' => ($listDetails)));
    }
    
    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
                    'editDrugName' => 'required',
            ]);
        
        if ($validator->fails()) {
            $errors = $validator->errors();
            $errors = json_decode($errors);

            return response()->json([
                        'success' => false,
                        'message' => $errors
                            ], 422);
        } else {
            
            $str =  $this->drugExists($request);              

            return response()->json([
                        'success' => true,
                        'message' => "Drug ".$str." Successfully"
                            ], 200);
        }
    }
    
    public function drugExists($request) {
        $obj = new DrugModel();
        return $obj->editDrug($request);
    }
    
    public function loadDrug($id ) {
        $obj = new DrugModel();
        return $obj->loadDrugDetails($id);        
    }
    
    public function removeDrug($id) {
        $obj = new DrugModel();
        return $obj->removeDrug($id);
    }
    
}
