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
        if ($this->therapyID == $request->therapyName) {
            $this->therapyID = new \MongoDB\BSON\ObjectId($request->therapyID);
            $this->indicationID = new \MongoDB\BSON\ObjectId($request->indicationID);
            $ob = Indication::find($this->therapyID);
            $indications = $ob->attributes['Indication'];
            $index = $this->getIndex($this->indicationID, $indications);

            // $story = \Illuminate\Support\Facades\DB::collection('posts')->where('_id', $this->therapyID)->update(array('Indication.0.Name' => 'abc'));
            \Illuminate\Support\Facades\DB::collection('posts')->
                    where('_id', $this->therapyID)->
                    update(array('Indication.' . $index . '.Name' => 'abc')
            );
        }
        // theraptic area changed
        else {
            $this->therapyID = new \MongoDB\BSON\ObjectId($request->therapyID);
            $this->therapyName = new \MongoDB\BSON\ObjectId($request->therapyName);
            $this->indicationID = new \MongoDB\BSON\ObjectId($request->indicationID);
            $this->indicationName = $request->indicationName;

            $indication = array('Name' => "test", '_id' => new \MongoDB\BSON\ObjectId());
            //\Illuminate\Support\Facades\DB::collection('posts')->find('_id', array($therapyName), array('$push' => array('Indication' => ($indication))));

            \Illuminate\Support\Facades\DB::collection('posts')->where('_id', $this->therapyName)->update(
                    // array('_id' => $this->therapyID),           
                    array('$push' => array('Indication' => array('Name' => $this->indicationName, '_id' => new \MongoDB\BSON\ObjectId(), 'isActive' => 1)))
            );
            $ob = Indication::find($this->therapyID);
            $indications = $ob->attributes['Indication'];
            $index = $this->getIndex($this->indicationID, $indications);
            \Illuminate\Support\Facades\DB::collection('posts')->
                    where('_id', $this->therapyID)->
                    update(array('Indication.' . $index . '.isActive' => 0)
            );
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
    
    public function loadIndications($tid) {
        $this->therapyID = new \MongoDB\BSON\ObjectId($tid);
        $result = \Illuminate\Support\Facades\DB::collection($this->collection)->raw(function($collection) {
            return $collection->aggregate(array(
                        array(
                            '$match' => array(
                                
                                    '_id' => $this->therapyID),
                            
                            
                        ),
                        array('$project' => array(
                                //'Therapy' => 1,
                                'Indication' => 1,
                            )),
            ));
        });

        foreach ($result as $query) {  
            return $query;   
        }

    }

    public function checkIndicationExists($request) {
        // echo "check indication exists";
        $this->therapyName = new \MongoDB\BSON\ObjectId($request->therapyName);
        $this->indicationID = new \MongoDB\BSON\ObjectId($request->indicationID);
        $this->indicationName = $request->indicationName;
        $result = \Illuminate\Support\Facades\DB::collection('posts')->raw(function($collection) {
            return $collection->aggregate(array(
                        array('$unwind' => '$Indication'),
                        array('$unwind' => '$Indication._id'),
                        array(
                            '$match' => array(
                                '$and' => array(
                                    array('_id' => $this->therapyName),
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
        $id = "";
        foreach ($result as $query) {
            $id = $query['Indication']['_id'];
        }
        if (empty($id)) {
            $this->add($request);
            return "Added";
        } else {
            $this->edit($request);
            return "Modified";
        }
    }

    public function getIndicationName($iid) {
        // echo "check indication exists";        
        $this->indicationID = $iid;
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
            $testing['therapy'] = $query['Therapy'];
            $testing['indication'] = $query['Indication']['Name'];
            array_push($therapy, $testing);
        }
        return $therapy;
    }
    
    public function getTherapyName($tid) {
        $this->therapyID = new \MongoDB\BSON\ObjectId($tid);
        $res = Indication::find($tid);
        
    }
    
    public function removeIndication($iid) {
        $this->indicationID = new \MongoDB\BSON\ObjectId($iid);
    }
}
