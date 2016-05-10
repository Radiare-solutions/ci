<?php

namespace App\Http\Controllers\Verify;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use MongoDB\Model;
use MongoDB\BSON\ObjectID;

use App\Models\ConditionModel as ConditionModel;

/**
 * Description of ConditionController
 *
 * @author abhishek
 */
class ConditionController extends Controller {
    
    public function index() {
        $listDetails = array();
        $sponsorObj = ConditionModel::where('isActive', 1)->get();
        foreach ($sponsorObj as $sponsorDetail) {
            $sponsorAttr = $sponsorDetail['attributes'];
            $arr['_id'] = (string) $sponsorAttr['_id'];
            $arr['name'] = $sponsorAttr['condition_name'];
            array_push($listDetails, $arr);
        }

        return view('verify/condition/index', array('details' => ($listDetails)));
    }
    
    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
                    'editConditionName' => 'required|unique:ci_clinical_condition,condition_name,'.$request->conditionID.',_id',
            ]);
        
        if ($validator->fails()) {
            $errors = $validator->errors();
            $errors = json_decode($errors);

            return response()->json([
                        'success' => false,
                        'message' => $errors
                            ], 422);
        } else {
            
            $str =  $this->conditionExists($request);              

            return response()->json([
                        'success' => true,
                        'message' => "Condition ".$str." Successfully"
                            ], 200);
        }
    }
    
    public function conditionExists($request) {
        $obj = new ConditionModel();
        return $obj->editCondition($request);
    }
    
    public function loadCondition($id ) {
        $obj = new ConditionModel();
        return $obj->loadConditionDetails($id);        
    }
    
    public function removeCondition($id) {
        $obj = new ConditionModel();
        return $obj->removeCondition($id);
    }
    
}
