<?php

namespace App\Models\Therapeutic;

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
class Therapeutic extends Eloquent {

    protected $collection = "therapy";

    public function checkTherapeuticExists($request) {
        //echo "check molecule exists";
        //exit;        
        if (isset($request->tid)) { // edit
            Therapeutic::where('_id', $request->tid)->update(array('Name' => $request->therapeuticName));
        } else {  // insert            
            $molecule = array(
                '_id' => new \MongoDB\BSON\ObjectId(),
                'Name' => $request->therapeuticName
            );
            Therapeutic::insert(array($molecule));
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


}
