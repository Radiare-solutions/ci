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
class Level1 extends Eloquent {

    protected $collection = "level1";
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

    public function addLevel1($name) {
        $id = new \MongoDB\BSON\ObjectId();
        $molecule = array(
            '_id' => $id,
            'Name' => $name,
            'isActive' => 1,
        );
        Level1::insert(array($molecule));

        // put an entry in indication table during insertion
        $ob = new Level2();
        $ob->_id = $id;
        $ob->Level2 = array();
        $ob->save();
    }

    public function loadLevel2Data($l1id) {
        $this->l1id = new \MongoDB\BSON\ObjectId($l1id);
        $result = \Illuminate\Support\Facades\DB::collection('molecules')->raw(function($collection) {
            return $collection->aggregate(array(
                        array('$unwind' => '$Level1'),
                        array('$unwind' => '$Level1._id'),
                        array('$unwind' => '$Level1.Level2'),
                        array(
                            '$match' => array(
                                '$and' => array(
                                    array('Level1._id' => array('$in' => array($this->l1id))),
                                )
                            )
                        ),
                        array('$project' => array(
                                'Level1.Level2' => 1,
                            )),
            ));
        });
        $str = "<option value=''>Select</option>";
        foreach ($result as $query) {
            $arr = $query['Level1']['Level2'];
            $id = $arr['_id'];
            $name = $arr['Name'];
            $str.= "<option value='" . $id . "' data-name='" . $name . "'>" . $name . "</option>";
        }
        return $str;
    }

}
