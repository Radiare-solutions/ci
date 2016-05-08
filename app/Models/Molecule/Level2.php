<?php

namespace App\Models\Molecule;

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
class Level2 extends Eloquent {

    protected $collection = "level2";
    protected $fillable = array('Molecule');
    
    public $l1id = "";
    public $l2id = "";
    
    public $therapyName = "";
    public $moleculeName = "";
    public $therapyID = "";
    public $moleculeID = "";

    public function posts() {
        // return $this->belongsTo('App\Models\Indication\Indications');
        // return $this-> ('App\Models\Indication\Post');
    }

    public function getIndex($name, $array) {
        foreach ($array as $key => $value) {
            if (is_array($value) && $value['_id'] == $name)
                return $key;
        }
        return null;
    }
    
    public function loadLevel2Name($l2id) {
        $this->l2id = new \MongoDB\BSON\ObjectId($l2id);
        $result = \Illuminate\Support\Facades\DB::collection($this->collection)->raw(function($collection) {
            return $collection->aggregate(array(
                        array('$unwind' => '$Level2'),
                        array('$unwind' => '$Level2._id'),
                        array(
                            '$match' => array(
                                '$and' => array(                                    
                                    array('Level2._id' => array('$in' => array($this->l2id))),
                                )
                            )
                        ),
                        array('$project' => array(
                                'Level2' => 1,
                            )),
            ));
        });
        foreach($result as $res) {
            return $res['Level2']['Name'];
        }
    }
    
    public function getLevel2IDByName($l2name) {
        // $this->l2id = new \MongoDB\BSON\ObjectId($l2id);
        $this->l2id = $l2name;
        $result = \Illuminate\Support\Facades\DB::collection($this->collection)->raw(function($collection) {
            return $collection->aggregate(array(
                        array('$unwind' => '$Level2'),
                        array('$unwind' => '$Level2.Name'),
                        array(
                            '$match' => array(
                                '$and' => array(                                    
                                    array('Level2.Name' => $this->l2id),
                                )
                            )
                        ),
                        array('$project' => array(
                                'Level2' => 1,
                            )),
            ));
        });
        foreach($result as $res) {
            return $res['Level2']['_id'];
        }
    }

    public function loadLevel2Data($l1id, $l2id) {
        $this->l1id = new \MongoDB\BSON\ObjectId($l1id);
        $result = \Illuminate\Support\Facades\DB::collection($this->collection)->raw(function($collection) {
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
                if($id == $l2id)
                    $clas = "selected=selected";
                $name = $arr['Name'];
                $str.= "<option value='".$id."' ".$clas." data-name='".$name."'>".$name."</option>";
            }            
        }
        return $str;
    }
    
    public function addLevel2($l1id, $l2name) {
        $indication = array('_id' => new \MongoDB\BSON\ObjectId(), 'Name' => $l2name, 'isActive' => 1);
        $this->l1id = new \MongoDB\BSON\ObjectId($l1id);
        if(!empty($l2name))
            Level2::where('_id', $this->l1id)->push('Level2', ($indication));
    }

}
