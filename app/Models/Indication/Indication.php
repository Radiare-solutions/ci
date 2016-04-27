<?php

namespace App\Models\Indication;

//use Moloquent;
//use MongoId;
//use Mongodb\Eloquent\Model;
use Jenssegers;
use Jenssegers\Mongodb;
use MongoDB\Model;
use MongoDB\BSON\ObjectID;
use App\Models\Therapeutic\Therapeutic;
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

    public function add($request) {

        $indication = array('Name' => "$request->indicationName", '_id' => new \MongoDB\BSON\ObjectId(), 'isActive' => 1);
        //$arr = array("Therapy" => "$request->therapyName");

        $this->therapyName = new \MongoDB\BSON\ObjectId($request->therapyName);
        //Indication::create($arr);
        //echo $test;
        //exit;
        Indication::where('Therapy', $this->therapyName)->push('Indication', ($indication));

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
        if ($request->therapyID == $request->therapyName) {
            $this->therapyID = new \MongoDB\BSON\ObjectId($request->therapyID);
            $this->indicationID = new \MongoDB\BSON\ObjectId($request->indicationID);
            
            $ob1 = Indication::where('Therapy',$this->therapyID)->get();
            foreach($ob1 as $ob) { }
            $indications = $ob->attributes['Indication'];
            $index = $this->getIndex($this->indicationID, $indications);

            // $story = \Illuminate\Support\Facades\DB::collection('posts')->where('_id', $this->therapyID)->update(array('Indication.0.Name' => 'abc'));
            \Illuminate\Support\Facades\DB::collection($this->collection)->
                    where('Therapy', $this->therapyID)->
                    update(array('Indication.' . $index . '.Name' => $request->indicationName)
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

            \Illuminate\Support\Facades\DB::collection($this->collection)->where('Therapy', $this->therapyName)->update(
                    // array('_id' => $this->therapyID),           
                    array('$push' => array('Indication' => array('Name' => $this->indicationName, '_id' => new \MongoDB\BSON\ObjectId(), 'isActive' => 1)))
            );
            $ob1 = Indication::where('Therapy',$this->therapyID)->get();
            foreach($ob1 as $ob) { }
            // print_r($ob);
            // exit;
            $indications = $ob->attributes['Indication'];
            $index = $this->getIndex($this->indicationID, $indications);
            \Illuminate\Support\Facades\DB::collection($this->collection)->
                    where('Therapy', $this->therapyID)->
                    update(array('Indication.' . $index . '.isActive' => 0)
            );
            
        }
    }

    public function loadIndicationDetails($tid, $iid) {
        $this->therapyID = new \MongoDB\BSON\ObjectId($tid);
        $this->indicationID = new \MongoDB\BSON\ObjectId($iid);
        $result = \Illuminate\Support\Facades\DB::collection($this->collection)->raw(function($collection) {
            return $collection->aggregate(array(
                        array('$unwind' => '$Indication'),
                        array('$unwind' => '$Indication._id'),
                        array(
                            '$match' => array(
                                '$and' => array(
                                    array('Therapy' => $this->therapyID),
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
            $details['therapyID'] = (string) $query['Therapy'];
            $details['indicationID'] = (string) $query['Indication']['_id'];
            
            $therapyObj = Therapeutic::find($this->therapyID);
            
            $details['therapyName'] = $therapyObj->attributes['Name'];
            $details['indicationName'] = $query['Indication']['Name'];
        }
        return $details;
    }

    public function loadIndications($tid) {
        $arr = array();
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

        foreach ($result as $query) { 
            //foreach($queries as $query) {
//                print_r($query);
//                exit;
            $id = (string) $query['Indication']['_id'];
            $name = $query['Indication']['Name'];
            $tempArr['_id'] = $id;
            $tempArr['name'] = $name;
            array_push($arr, $tempArr);
            //}
        }
//        print_r($arr);
//        exit;
        return $arr;
    }

    public function indicationExists($request) {
        
        $this->therapyName = new \MongoDB\BSON\ObjectId($request->therapyName);
        //$this->indicationID = new \MongoDB\BSON\ObjectId($request->indicationID);
        $this->indicationName = $request->indicationName;

        $result = \Illuminate\Support\Facades\DB::collection($this->collection)->raw(function($collection) {
            return $collection->aggregate(array(
                        array('$unwind' => '$Indication'),
                        array('$unwind' => '$Indication._id'),
                        array(
                            '$match' => array(
                                '$and' => array(
                                    array('Therapy' => $this->therapyName),
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
        // echo "id : ".$id."<br>";
        if (empty($request->indicationID)) {
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
            $ob = Therapeutic::find($query['Therapy']);
            
            $testing['therapy'] = $ob->attributes['Name'];
            $testing['_id'] = (string) $query['Indication']['_id'];
            $testing['indication'] = $query['Indication']['Name'];
            array_push($therapy, $testing);
        }
        return $therapy;
    }
    
    public function getTherapeutic($iid) {
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
            $tid = $query['Therapy'];
            $this->therapyID = new \MongoDB\BSON\ObjectId($tid);
            $ob = Therapeutic::find($this->therapyID);
            
            $testing['therapy'] = $ob->attributes['Name'];
            $testing['_id'] = $tid;            
            array_push($therapy, $testing);
        }
        return $therapy;
    }

    public function getTherapyName($tid) {
        $this->therapyID = new \MongoDB\BSON\ObjectId($tid);
        $res = Indication::find($tid);
    }

    public function removeIndication($tid, $iid) {
        $this->therapyID = new \MongoDB\BSON\ObjectId($tid);
        $this->indicationID = new \MongoDB\BSON\ObjectId($iid);
        $ob1 = Indication::where('Therapy',$this->therapyID)->get();
            foreach($ob1 as $ob) { }
            // print_r($ob);
            // exit;
            $indications = $ob->attributes['Indication'];
            $index = $this->getIndex($this->indicationID, $indications);
            \Illuminate\Support\Facades\DB::collection($this->collection)->
                    where('Therapy', $this->therapyID)->
                    update(array('Indication.' . $index . '.isActive' => 0)
            );
    }

}
