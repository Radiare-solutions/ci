<?php

namespace App\Models;

use App\Models\Therapeutic\Therapeutic;

use Jenssegers;
use Jenssegers\Mongodb;
use MongoDB\Model;
use MongoDB\BSON\ObjectID;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class ModelHelper extends Eloquent {
    
    protected $collection = "";
    public $l1id;
    public $l2id;
    public $mid;
    
    public function loadLevel2DataByLevel1ID($l1id, $l2id) {        
        $collection = "level2";
        $this->l1id = new \MongoDB\BSON\ObjectId($l1id);
        $result = \Illuminate\Support\Facades\DB::collection($collection)->raw(function($collection) {
            return $collection->aggregate(array(
                        //array('$unwind' => '$_id'),
                        array(
                            '$match' => array(
                                '$and' => array(                                    
                                    array('_id' => array('$in' => array($this->l1id))),
                                )
                            )
                        ),
                        array('$project' => array(
                                'Level2' => 1,
                            )),
            ));
        });
        $str = '<option value="">select</option>';
        foreach ($result as $query) {
            $arra = $query['Level2'];
            foreach($arra as $arr) {
                $clas = "";
                $id = $arr['_id'];
                $name = $arr['Name'];
                if($id == $l2id)
                    $clas = "selected=selected";
                $str.= "<option value='".$id."' data-name='".$name."' ".$clas.">".$name."</option>";
            }            
        }
        return $str;    
    }
    
    public function loadMoleculeDataByLevelID($l1id, $l2id, $mid='') {
        $this->collection = "molecules";
        $this->l1id = new \MongoDB\BSON\ObjectId($l1id);
        $this->l2id = new \MongoDB\BSON\ObjectId($l2id);
        $result = \Illuminate\Support\Facades\DB::collection($this->collection)->raw(function($collection) {
            return $collection->aggregate(array(
                        array(
                            '$match' => array(
                                '$and' => array(
                                    array('level1id' => $this->l1id),
                                    array('level2id' => $this->l2id),
                                )
                            )
                        )
            ));
        });
        $str = "<option value=''>Select</option>";
        foreach ($result as $query) {
            $arr = $query;
            $id = $arr['_id'];
            $name = $arr['Name'];
            $clas = "";
            if($mid == $id)
                $clas = "selected=selected";
            $str.= "<option value='" . $id . "' data-name='" . $name . "' ".$clas.">" . $name . "</option>";
        }
        return $str;
    }
    
    public function getIndicationName($iid) {
        // echo "check indication exists";        
        $this->collection = "posts";
        $this->indicationID = new \MongoDB\BSON\ObjectId($iid);
        $result = \Illuminate\Support\Facades\DB::collection($this->collection)->raw(function($collection) {
            return $collection->aggregate(array(
                        array('$unwind' => '$Indication'),
                        array('$unwind' => '$Indication._id'),
                        array(
                            '$match' => array(
                                '$and' => array(
                                    array('Indication._id' => array('$in' => array($this->indicationID))),
                                )
                            )
                        ),
                        array('$project' => array(
                                'Therapy' => 1,
                                'Indication' => 1,
                            )),
            ));
        });
        $id = array();
        $therapy = array();
        foreach ($result as $query) {
            // array_push($therapy, $query['Therapy']);
            $ob = Therapeutic::find($query['Therapy']);
            
            $testing['therapy'] = $ob->attributes['Name'];
            $testing['_id'] = (string) $query['Indication']['_id'];
            $testing['indication'] = $query['Indication']['Name'];
            array_push($therapy, $testing);
        }
        return $therapy;
    }
    
    public function loadIndicationsDataByTherapeuticID($tid, $iid = "") {
        $arr = array();
        $this->collection = "posts";
        $this->therapyID = new \MongoDB\BSON\ObjectId($tid);
        $result = \Illuminate\Support\Facades\DB::collection($this->collection)->raw(function($collection) {
            return $collection->aggregate(array(
                        array('$unwind' => '$Indication'),
                        array('$unwind' => '$Indication._id'),
                        array(
                            '$match' => array(
                                '$and' => array(
                                    array('Therapy' => $this->therapyID),
                                    // array('Indication.isActive' => array('$in' => array(0))),
                                )
                            )
                        ),
                        array('$project' => array(
                                //'Therapy' => 1,
                                'Indication' => 1,
                            )),
            ));
        });
        $str = '';
        foreach ($result as $query) { 
            $id = (string) $query['Indication']['_id'];
            $name = $query['Indication']['Name'];
            $clas = "";
            if($iid == $id)
                $clas = "selected=selected";
            $str.= "<option value='" . $id . "' data-name='" . $name . "' ".$clas.">" . $name . "</option>";
        }
        return $str;
    }
    
}
