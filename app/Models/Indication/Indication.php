<?php

namespace App\Models\Indication;

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
class Indication extends Eloquent {

    protected $collection = "posts";
    protected $fillable = array('Therapy', 'Indication');
    public $therapyName = "";
    public $indicationName = "";
    public $therapyID = "";
    public $indicationID = "";

    public function posts() {
        // return $this->belongsTo('App\Models\Indication\Indications');
        // return $this-> ('App\Models\Indication\Post');
    }

    public function add($request) {

        $indication = array('Name' => "$request->indicationName", '_id' => new \MongoDB\BSON\ObjectId());
        $arr = array("Therapy" => "$request->therapyName");
        $arr['Indication'] = array($indication);

        // Indication::create($arr);
        //echo $test;
        //exit;
        Indication::where('_id', '=', $request->therapyName)
                ->push('Indication', array($indication));
        //$test = $test->pushAttributeValues("Indication", $indication);
//        $ob->Therapy = $request->therapyName;
//        $indication = array(array('Name' => $request->indicationName));
//        $ob->Indication = ($indication);
//        $ob->save();
    }

    public function getIndex($name, $array) {
        foreach ($array as $key => $value) {
            if (is_array($value) && $value['_id'] == $name)
                return $key;
        }
        return null;
    }

    public function edit($request) {
        // theraptic area not changed
        if (1) {
            $this->therapyID = new \MongoDB\BSON\ObjectId($request->therapyID);
            $this->indicationID = new \MongoDB\BSON\ObjectId($request->indicationID);
            $ob = Indication::find($this->therapyID);
            $indications = $ob->attributes['Indication'];            
            $index = $this->getIndex($this->indicationID, $indications);
            
            // $story = \Illuminate\Support\Facades\DB::collection('posts')->where('_id', $this->therapyID)->update(array('Indication.0.Name' => 'abc'));
            \Illuminate\Support\Facades\DB::collection('posts')->
                    where('_id', $this->therapyID)->
                    update(array('Indication.'.$index.'.Name' => 'abc')
            );
        }
        // theraptic area changed
        else {
            $this->therapyID = new \MongoDB\BSON\ObjectId($request->therapyID);
            $this->indicationID = new \MongoDB\BSON\ObjectId($request->indicationID);
            
        $indication = array('Name' => "test", '_id' => new \MongoDB\BSON\ObjectId());
        Indication::find('_id', '=',  new \MongoDB\BSON\ObjectId($request->therapyName), array('$push' => array('Indication' => array($indication))));
        exit;
        \Illuminate\Support\Facades\DB::collection('posts')->where(array('_id', '=', new \MongoDB\BSON\ObjectId($request->therapyName)), array('$push' => array('Indication' => array($indication))));
            echo "not same";
            exit;
        }
    }

    public function loadIndicationDetails($tid, $iid) {
        $this->therapyID = new \MongoDB\BSON\ObjectId($tid);
        $this->indicationID = new \MongoDB\BSON\ObjectId($iid);
        $result = \Illuminate\Support\Facades\DB::collection('posts')->raw(function($collection) {
            return $collection->aggregate(array(
                        array('$unwind' => '$Indication'),
                        array('$unwind' => '$Indication._id'),
                        array(
                            '$match' => array(
                                '$and' => array(
                                    array('_id' => $this->therapyID),
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
        $details = "";
        foreach ($result as $query) {
            $details['therapyID'] = (string) $query['_id'];
            $details['indicationID'] = (string) $query['Indication']['_id'];
            $details['therapyName'] = $query['Therapy'];
            $details['indicationName'] = $query['Indication']['Name'];
        }
        return $details;
    }

    public function checkIndicationExists($request) {
        // echo "check indication exists";
        $this->therapyName = new \MongoDB\BSON\ObjectId($request->therapyName);
        $this->indicationName = $request->indicationName;
        $result = \Illuminate\Support\Facades\DB::collection('posts')->raw(function($collection) {
            return $collection->aggregate(array(
                        array('$unwind' => '$Indication'),
                        array('$unwind' => '$Indication.Name'),
                        array(
                            '$match' => array(
                                '$and' => array(
                                    array('_id' => $this->therapyName),
                                    array('Indication.Name' => array('$in' => array($this->indicationName))),
                                )
                            )
                        ),
                        array('$project' => array(
                                'Therapy' => 1,
                                'Indication' => 1,
                            )),
            ));
        });
        $id = "";
        foreach ($result as $query) {
            $id = $query['Indication']['_id'];
        }
        /* if (empty($id)) {
          $this->add($request);
          } else { */
        $this->edit($request);
        //}
    }

}
