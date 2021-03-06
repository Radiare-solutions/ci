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
use App\Models\Indication\Indication;
use App\Models\Molecule\Molecule;
use App\Models\Molecule\Level1;

/**
 * Category Model
 *
 * @author Hafiz Waheeduddin
 */
class MapMolecules extends Eloquent {

    protected $collection = "map_molecules";
    public $bgid = "";

    public function loadMoleculeDetails($bgid) {
        $this->bgid = new \MongoDB\BSON\ObjectId($bgid);

        $arr = array();
        $result = MapMolecules::where('BG_id', 'all', array($this->bgid))->groupBy('molecules')->get();

        foreach ($result as $res) {
            $res = $res->attributes['molecules'];
            array_push($arr, $res);
        }       
        return $arr;
    }
    
    public function loadFeedTherapeuticDetails($bgid) {
        $this->bgid = new \MongoDB\BSON\ObjectId($bgid);
        $arr = array();
        $result = MapMolecules::where('BG_id', 'all', array($this->bgid))->groupBy('indication')->get();
        $ob = new Indication();
        foreach ($result as $res) {
            $res = $res->attributes['indication'];
            $str = $ob->getTherapeutic($res);
            foreach($str as $detail) {                
                $tempArr['_id'] = (string) $detail['_id'];
                $tempArr['therapy'] = $detail['therapy'];
                array_push($arr, $tempArr);
            }
        }       
        return $arr;
    }
    
    public function loadFeedLevel1Details($bgid) {
        $this->bgid = new \MongoDB\BSON\ObjectId($bgid);
        $arr = array();
        $result = MapMolecules::where('BG_id', 'all', array($this->bgid))->groupBy('molecules')->get();
        foreach ($result as $res) {
            $res = $res->attributes['molecules'];
            $ob = Molecule::find($res);
            if(isset($ob->attributes['level1id'])) {
                $l1id = new \MongoDB\BSON\ObjectId($ob->attributes['level1id']);
            $l1ob = Level1::find($l1id);
            $tempArr['_id'] = (string) $l1ob->attributes['_id'];
            $tempArr['level1name'] = $l1ob->attributes['Name'];
            array_push($arr, $tempArr); 
            }
        }       
        return $arr;
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
        $bgid = new \MongoDB\BSON\ObjectId($request->bgid);
//            echo '<pre>';
//            print_r($request->indicationName);
//            exit;
        foreach ($request->moleculeName as $name) {
            $ob = new MapMolecules();
            $ob->BG_id = $bgid;
            $ob->molecules = new \MongoDB\BSON\ObjectId($name);
            $ob->indication = '';
            $ob->save();
        }
    }
    
    public function removeIndicationEntry($bgid, $iname) {
        $bgid = new \MongoDB\BSON\ObjectId($bgid);
        $iObj = Indication::where('Therapy', $iname)->get();
        $attrs = $iObj[0]['attributes']['Indication'];
        foreach($attrs as $attr) {
            $iid = $attr['_id'];
            MapMolecules::where(array('BG_id' => $bgid, 'indication' => $iid))->update(array('isActive' => 0));
        }
    }
    
    public function removeMoleculeEntry($bgid, $mname) {
        $bgid = new \MongoDB\BSON\ObjectId($bgid);
        $iObj = Molecule::where('Name', $mname)->get();
        $attrs = $iObj[0]['attributes']['_id'];
        $mid = new \MongoDB\BSON\ObjectId($attrs);
        //foreach($attrs as $attr) {
          //  $iid = $attr['_id'];
            MapMolecules::where(array('BG_id' => $bgid, 'molecules' => $mid))->update(array('isActive' => 0));
        // }
    }

}
