<?php

namespace App\Models;

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
    
    public function loadMoleculeDataByLevelID($l1id, $l2id, $mid) {
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
    
}
