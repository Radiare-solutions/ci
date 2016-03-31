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
        Indication::where('_id', '=', $request->therapyName )
            ->push('Indication', array( $indication)); 
        //$test = $test->pushAttributeValues("Indication", $indication);
//        $ob->Therapy = $request->therapyName;
//        $indication = array(array('Name' => $request->indicationName));
//        $ob->Indication = ($indication);
//        $ob->save();
    }
    
    

}
