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
class Molecule extends Eloquent {

    protected $collection = "posts";
    protected $fillable = array('Therapy', 'Indication', 'Molecule');
    public $therapyName = "";
    public $moleculeName = "";
    public $therapyID = "";
    public $moleculeID = "";

    public function posts() {
        // return $this->belongsTo('App\Models\Indication\Indications');
        // return $this-> ('App\Models\Indication\Post');
    }

    public function add($request) {

        $molecule = array('Name' => "$request->moleculeName", '_id' => new \MongoDB\BSON\ObjectId());
        $arr = array("Therapy" => "$request->therapyName");
        $arr['Molecule'] = array($molecule);

        // Indication::create($arr);
        //echo $test;
        //exit;
        Molecule::where('_id', '=', $request->therapyName)
                ->push('Molecule', array($molecule));
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
        if ( $request->therapyID == $request->therapyName) {
            $this->therapyID = new \MongoDB\BSON\ObjectId($request->therapyID);
            $this->moleculeID = new \MongoDB\BSON\ObjectId($request->moleculeID);
            $this->moleculeName = $request->moleculeName;
            $ob = Molecule::find($this->therapyID);
            $molecules = $ob->attributes['Molecule'];
            $index = $this->getIndex($this->moleculeID, $molecules);

            // $story = \Illuminate\Support\Facades\DB::collection('posts')->where('_id', $this->therapyID)->update(array('Indication.0.Name' => 'abc'));
            \Illuminate\Support\Facades\DB::collection('posts')->
                    where('_id', $this->therapyID)->
                    update(array('Molecule.' . $index . '.Name' => $this->moleculeName)
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

    public function loadMoleculeDetails($tid, $mid) {
        $this->therapyID = new \MongoDB\BSON\ObjectId($tid);
        $this->moleculeID = new \MongoDB\BSON\ObjectId($mid);
        $result = \Illuminate\Support\Facades\DB::collection('posts')->raw(function($collection) {
            return $collection->aggregate(array(
                        array('$unwind' => '$Molecule'),
                        array('$unwind' => '$Molecule._id'),
                        array(
                            '$match' => array(
                                '$and' => array(
                                    array('_id' => $this->therapyID),
                                    array('Molecule._id' => array('$in' => array($this->moleculeID))),
                                )
                            )
                        ),
                        array('$project' => array(
                                'Therapy' => 1,
                                'Molecule' => 1,
                            )),
            ));
        });
        $details = "";
        foreach ($result as $query) {
            $details['therapyID'] = (string) $query['_id'];
            $details['moleculeID'] = (string) $query['Molecule']['_id'];
            $details['therapyName'] = $query['Therapy'];
            $details['moleculeName'] = $query['Molecule']['Name'];
        }
        return $details;
    }

    public function checkMoleculeExists($request) {
        // echo "check molecule exists";
        $this->therapyName = new \MongoDB\BSON\ObjectId($request->therapyName);
        $this->moleculeID = new \MongoDB\BSON\ObjectId($request->moleculeID);
        $this->moleculeName = $request->moleculeName;
        $result = \Illuminate\Support\Facades\DB::collection('posts')->raw(function($collection) {
            return $collection->aggregate(array(
                        array('$unwind' => '$Molecule'),
                        array('$unwind' => '$Molecule._id'),
                        array(
                            '$match' => array(
                                '$and' => array(
                                    array('_id' => $this->therapyName),
                                    array('Molecule._id' => array('$in' => array($this->moleculeID))),
                                )
                            )
                        ),
                        array('$project' => array(
                                'Therapy' => 1,
                                'Molecule' => 1,
                            )),
            ));
        });
        $id = "";
        foreach ($result as $query) {
            $id = $query['Molecule']['_id'];
        }
        echo "id : ".$id."<br>";
        if (empty($id)) {
            $this->add($request);
            return "Added";
        } else {
            $this->edit($request);
            return "Modified";
        }
    }

}
