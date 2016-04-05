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

    public function loadLevel2Data($l1id) {
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
        $str = "";
        foreach ($result as $query) {
            $arra = $query['Level2'];
            foreach($arra as $arr) {
                $id = $arr['_id'];
                $name = $arr['Name'];
                $str.= "<option value='".$id."' data-name='".$name."'>".$name."</option>";
            }            
        }
        return $str;
    }

}
