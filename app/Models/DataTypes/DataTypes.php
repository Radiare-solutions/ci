<?php

namespace App\Models\DataTypes;

//use Moloquent;
//use MongoId;
//use Mongodb\Eloquent\Model;
use Jenssegers;
use Jenssegers\Mongodb;
use MongoDB\Model;
use MongoDB\BSON\ObjectID;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

/**
 * Category Model
 *
 * @author Hafiz Waheeduddin
 */
class DataTypes extends Eloquent {

    protected $collection = "data_types";
    protected $fillable = array('typeName');
    
    public function dataTypeExists($request) {
        if(!empty($request->dataTypeID))
            $this->edit_data_type($request);
        else 
            $this->add_data_type($request);
    }

    public function add_data_type($request) {
        $dataType = array('typeName' => "$request->dataTypeName", '_id' => new \MongoDB\BSON\ObjectId(), 'isActive' => 1);
        DataTypes::insert(array($dataType));        
    }

    public function edit_data_type($request) {
        $dataType = array('typeName' => "$request->editDataTypeName");
        DataTypes::where('_id', $request->dataTypeID)->update(($dataType));
    }
    
    public function loadDataTypeDetails($id) {
        $ob = DataTypes::find(new \MongoDB\BSON\ObjectId($id));
        return $ob->attributes['typeName'];
    }
    
    public function removeDataType($id) {        
        DataTypes::where('_id', $id)->update(array('isActive' => 0));
    }
}
