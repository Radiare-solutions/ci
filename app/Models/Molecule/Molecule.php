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

    protected $collection = "molecules";
    protected $fillable = array('Molecule');
    public $l1id = "";
    public $l2id = "";
    public $therapyName = "";
    public $moleculeName = "";
    public $mIndex = "";
    protected $primaryKey = '_id';
    public $moleculeID = "";

    public function posts() {
        // return $this->belongsTo('App\Models\Indication\Indications');
        // return $this-> ('App\Models\Indication\Post');
    }

    public function add($request, $id) {

        $molecule = array('Name' => "$request->moleculeName", '_id' => new \MongoDB\BSON\ObjectId());
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
        if ($request->therapyID == $request->therapyName) {
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

    public function loadMoleculeDetails($mid, $index) {
        $this->moleculeID = new \MongoDB\BSON\ObjectId($mid);
        $result = Molecule::find($this->moleculeID);
//        echo '<pre>';
//        print_r($result['attributes']['level1id']);
//        exit;
        $details = "";
        //foreach ($result['attributes'] as $query) {
        $query = $result['attributes'];
        $l1id = new \MongoDB\BSON\ObjectId($query['level1id']);
        $l2id = new \MongoDB\BSON\ObjectId($query['level2id']);
        $l1obj = Level1::find($l1id);
        $l2obj = Level2::find($l1id);
        $l2Name = '';
        foreach($l2obj['attributes']['Level2'] as $detail) {
            if( (string) $l2id  == (string) $detail['_id'])
            {
                $l2Name = $detail['Name'];
            }
        }
        $details['level1id'] = (string) $query['level1id'];
        $details['level1name'] = (string) $l1obj['attributes']['Name'];
        $details['level2id'] = (string) $query['level2id'];
        $details['level2name'] = (string) $l2Name;
        $details['moleculeID'] = (string) $query['_id'];
        $details['moleculeName'] = $query['Name'];
        $details['mIndex'] = $index;
        //}
        return $details;
    }

    public function checkMoleculeExists($request) {
        //echo "check molecule exists";
        //exit;        
        if (isset($request->mid)) { // edit
            $mid = $request->mid;
            $this->l1id = new \MongoDB\BSON\ObjectId($request->level1Name);
            $this->l2id = new \MongoDB\BSON\ObjectId($request->level2Name);
            $this->mIndex = $request->mIndex;
            \Illuminate\Support\Facades\DB::collection($this->collection)->where('_id', $mid)->delete();
            $molecule = array(
                '_id' => new \MongoDB\BSON\ObjectId($mid),
                'Name' => $request->moleculeName,
                'level1id' => $this->l1id,
                'level2id' => $this->l2id,
                'isActive' => 1
            );
            Molecule::insert(array($molecule));
        } else {  // insert
            $this->l1id = new \MongoDB\BSON\ObjectId($request->level1Name);
            $this->l2id = new \MongoDB\BSON\ObjectId($request->level2Name);
            $this->moleculeName = $request->moleculeName;
            $molecule = array(
                '_id' => new \MongoDB\BSON\ObjectId(),
                'Name' => $request->moleculeName,
                'level1id' => $this->l1id,
                'level2id' => $this->l2id,
                'isActive' => 1
            );
            Molecule::insert(array($molecule));
        }
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
       $str = '<option value="">select</option>';
        foreach ($result as $query) {
            $arr = $query['Level1']['Level2'];
            $id = $arr['_id'];
            $name = $arr['Name'];
            $str.= "<option value='" . $id . "' data-name='" . $name . "'>" . $name . "</option>";
        }
        return $str;
    }

    public function loadMolecules($l1id, $l2id) {
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
            $str.= "<option value='" . $id . "' data-name='" . $name . "'>" . $name . "</option>";
        }
        return $str;
    }
    
    public function removeMolecule($mid) {
        $tid = new \MongoDB\BSON\ObjectId($mid);
        Molecule::where('_id', $mid)->update(array('isActive' => 0));
    }

}
