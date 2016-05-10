<?php

namespace App\Http\Controllers\DataTypes;

use App\Http\Controllers\Controller;
use App\Models\DataTypes\DataTypes;
use Illuminate\Http\Request;
use Validator;
use MongoDB\Model;
use MongoDB\BSON\ObjectID;

class DataTypesController extends Controller {

    public function index() {
        $listDetails = array();
        $dataTypes = DataTypes::where('isActive', 1)->get();
        foreach ($dataTypes as $typeDetail) {
            $typeAttr = $typeDetail['attributes'];
            $arr['_id'] = (string) $typeAttr['_id'];
            $arr['name'] = $typeAttr['typeName'];
            array_push($listDetails, $arr);
        }

        return view('data_types/index', array('details' => ($listDetails)));
    }

    public function store(Request $request) {
        if(empty($request->dataTypeID)) {
            $validator = Validator::make($request->all(), [
                    'dataTypeName' => 'required|unique:data_types,typeName,_id',
            ]);
        }
        else {
            $validator = Validator::make($request->all(), [
                    'editDataTypeName' => 'required|unique:data_types,typeName,'.$request->dataTypeID.',_id',
            ]);
        }

        if ($validator->fails()) {
            $errors = $validator->errors();
            $errors = json_decode($errors);

            return response()->json([
                        'success' => false,
                        'message' => $errors
                            ], 422);
        } else {
            
            $str =  $this->dataTypeExists($request);              

            return response()->json([
                        'success' => true,
                        'message' => "Data Type ".$str." Successfully"
                            ], 200);
        }
    }

    public function dataTypeExists($request) {             
        $obj = new DataTypes();                
        return $obj->dataTypeExists($request);                        
    }

    public function load($id ) {
        $obj = new DataTypes();
        return $obj->loadDataTypeDetails($id);        
    }
    
    public function removeDataType($id) {
        $obj = new DataTypes();
        return $obj->removeDataType($id);
    }

}
