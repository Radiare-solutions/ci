<?php

namespace App\Models\MapMolecules;

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
class MapMolecules extends Eloquent {

    protected $collection = "map_molecules";
    public $bgid = "";

    public function loadMoleculeDetails($bgid) {
        
    }

    public function loadIndicationDetails($bgid) {
        $this->bgid = new \MongoDB\BSON\ObjectId($bgid);

        $arr = array();
        $result = MapMolecules::where('BG_id', 'all', array($this->bgid))->groupBy('indication')->get();
        
        foreach ($result as $res) {
            $res = $res->attributes['indication'];
            array_push($arr, $res);
        }
        return $arr;
    }
    
    public function loadIndicationEntryList($bgid) {
        $this->bgid = new \MongoDB\BSON\ObjectId($bgid);

        $arr = array();
        $result = MapMolecules::where('BG_id', 'all', array($this->bgid))->groupBy('indication')->get();
        
        foreach ($result as $res) {
            $res = $res->attributes['indication'];
            array_push($arr, $res);
        }
        return $arr;
    }

    public function saveIndicationEntry($request) {
        //foreach ($request as $req) {
        $bgid = new \MongoDB\BSON\ObjectId($request->bgid);
//            echo '<pre>';
//            print_r($request->indicationName);
//            exit;
            foreach ($request->indicationName as $name) {
                $ob = new MapMolecules();
                $ob->BG_id = $bgid;
                $ob->molecules = '';
                $ob->indication = new \MongoDB\BSON\ObjectId($name);
                $ob->save();
            }
    }

    public function saveMoleculeEntry($request) {
        
    }

}
