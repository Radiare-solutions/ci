<?php

namespace App\Models\Therapeutic;

use Jenssegers;
use Jenssegers\Mongodb;
use MongoDB\Model;
use MongoDB\BSON\ObjectID;
use App\Models\Indication\Indication;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

/**
 * Category Model
 *
 * @author Hafiz Waheeduddin
 */
class Therapeutic extends Eloquent {

    protected $collection = "therapy";

    public function checkTherapeuticExists($request) {
        //echo "check molecule exists";
        //exit;        
        if (isset($request->tid)) { // edit
            Therapeutic::where('_id', $request->tid)->update(array('Name' => $request->therapeuticName));
        } else {  // insert            
            $id = new \MongoDB\BSON\ObjectId();
            $molecule = array(
                '_id' => $id,
                'Name' => $request->therapeuticName,
                'isActive' => 1,
            );
            Therapeutic::insert(array($molecule));
            
            // put an entry in indication table during insertion
            $ob = new Indication();
            $ob->Therapy = $id;
            $ob->Indication = array();
            $ob->save();
        }
    }
    
    public function loadTherapeuticDetails($tid) {
        $tid = new \MongoDB\BSON\ObjectId($tid);
        $result = Therapeutic::find($tid);
//        echo '<pre>';
//        print_r($result['attributes']['level1id']);
//        exit;
        $details = "";
        //foreach ($result['attributes'] as $query) {
        $query = $result['attributes'];
        $details['therapeuticID'] = (string) $query['_id'];
        $details['therapeuticName'] = $query['Name'];
        //}
        return $details;
    }
    
    public function removeTherapeutic($tid) {
        $tid = new \MongoDB\BSON\ObjectId($tid);
        Therapeutic::where('_id', $tid)->update(array('isActive' => 0));
    }


}
