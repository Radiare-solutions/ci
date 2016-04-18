<?php

namespace App\Models\Client;

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
class Client extends Eloquent {

    protected $collection = "clients";
    protected $fillable = array('Name');
    public $clientName = "";
    public $clientID = "";
    public $groupID = "";
    public $groupName = "";

    public function clients() {
        // return $this->belongsTo('App\Models\Indication\Indications');
        // return $this-> ('App\Models\Indication\Post');
    }

    public function add($request) {

        $client = array('Name' => "$request->clientName", '_id' => new \MongoDB\BSON\ObjectId(), 'isActive' => 1, 'BusinessGroup' => array());

        Client::insert($client);

        // Indication::create($arr);
        //echo $test;
        //exit;
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
        return 0;
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

    public function loadBGEntryValues($cid, $bgid) {
        $this->clientID = new \MongoDB\BSON\ObjectId($cid);
        $this->groupID = new \MongoDB\BSON\ObjectId($bgid);
        $result = \Illuminate\Support\Facades\DB::collection($this->collection)->raw(function($collection) {
            return $collection->aggregate(array(
                        array('$unwind' => '$BusinessGroup'),
                        array('$unwind' => '$BusinessGroup._id'),
                        array(
                            '$match' => array(
                                '$and' => array(
                                    array('_id' => $this->clientID),
                                    array('BusinessGroup._id' => array('$in' => array($this->groupID))),
                                )
                            )
                        ),
                        array('$project' => array(
                                'Name' => 1,
                                'BusinessGroup' => 1,
                            )),
            ));
        });
        $details = "";
        foreach ($result as $query) {
            //$details['therapyID'] = (string) $query['_id'];
            //$details['indicationID'] = (string) $query['Indication']['_id'];
            $details['clientName'] = $query['Name'];
            $details['groupName'] = $query['BusinessGroup']['Name'];
        }
        return $details;
    }

    public function loadBGEntryListValues($bgid) {
        $this->groupID = new \MongoDB\BSON\ObjectId($bgid);
        $result = \Illuminate\Support\Facades\DB::collection($this->collection)->raw(function($collection) {
            return $collection->aggregate(array(
                        array('$unwind' => '$BusinessGroup'),
                        array('$unwind' => '$BusinessGroup._id'),
                        array(
                            '$match' => array(
                                '$and' => array(
                                    array('BusinessGroup._id' => array('$in' => array($this->groupID))),
                                )
                            )
                        ),
                        array('$project' => array(
                                'Name' => 1,
                                'BusinessGroup' => 1,
                            )),
            ));
        });
        $details = "";
        foreach ($result as $query) {
            //$details['therapyID'] = (string) $query['_id'];
            //$details['indicationID'] = (string) $query['Indication']['_id'];
            $details['clientName'] = $query['Name'];
            $details['groupName'] = $query['BusinessGroup']['Name'];
        }
        return $details;
    }

    public function addGroup($request) {
        $cid = new \MongoDB\BSON\ObjectId($request->clientName);
        \Illuminate\Support\Facades\DB::collection($this->collection)->where('_id', $cid)->update(
                // array('_id' => $this->therapyID),           
                array('$push' => array('BusinessGroup' => array('Name' => $request->groupName, '_id' => new \MongoDB\BSON\ObjectId())))
        );
    }

    public function editBGEntry($request) {
        $this->clientID = new \MongoDB\BSON\ObjectId($request->cid);
        $this->groupID = new \MongoDB\BSON\ObjectId($request->bgid);

        \Illuminate\Support\Facades\DB::collection($this->collection)->where('_id', $this->clientID)->update(
                // array('_id' => $this->therapyID),           
                array('$pull' => array('BusinessGroup' => array('_id' => $this->groupID)))
        );
        \Illuminate\Support\Facades\DB::collection($this->collection)->where('_id', $this->clientID)->update(
                //array('Name' => $request->clientName),           
                array('$push' => array('BusinessGroup' => array('Name' => $request->groupName, '_id' => $this->groupID)))
        );
        \Illuminate\Support\Facades\DB::collection($this->collection)->where('_id', $this->clientID)->update(
                array('Name' => $request->clientName)                
        );
//        foreach($result as $res) {
//            echo '<pre>';
//            echo array_search($this->groupID, (array) $res['BusinessGroup'])."<br>";
//            echo "index : ".$this->getIndex($this->groupID, $res['BusinessGroup'])."<br>";
//            print_r($res);
//            exit;
//        }
    }

    public function checkGroupExists($request) {
        if (isset($request->cid)) {
            $this->editBGEntry($request);
            return "Updated";
        } else {
            $this->addGroup($request);
            return "Added";
        }
    }

    public function checkClientExists($request) {
        $this->add($request);
        return "Added";
        // echo "check indication exists";
        /* $this->therapyName = new \MongoDB\BSON\ObjectId($request->therapyName);
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
          } */
    }

    public function removeClient($cid) {
        $cid = new \MongoDB\BSON\ObjectId($cid);
        Client::where('_id', $cid)->update(array('isActive' => 0));
    }

    public function removeGroup($cid, $bgid) {
        $this->clientID = new \MongoDB\BSON\ObjectId($cid);
        $this->groupID = new \MongoDB\BSON\ObjectId($bgid);

        $result = Client::find($this->clientID);
        $index = $this->getIndex($this->groupID, $result->attributes['BusinessGroup']);
        \Illuminate\Support\Facades\DB::collection($this->collection)->
                where('_id', $this->clientID)->
                update(array('BusinessGroup.' . $index . '.isActive' => 0)
        );
    }

    public function removeIndicationEntry($bgid, $iid) {
        $iid = new \MongoDB\BSON\ObjectId($iid);
        // Client::where('_id', $iid)->update(array('isActive' => 0));
    }

    public function removeMoleculeEntry($bgid, $mid) {
        $mid = new \MongoDB\BSON\ObjectId($mid);
        //Client::where('_id', $mid)->update(array('isActive' => 0));
    }

}
