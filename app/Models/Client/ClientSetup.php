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
class ClientSetup extends Eloquent {

    protected $collection = "clients_setup";
    public $clientName = "";
    public $clientID = "";
    public $groupID = "";
    public $groupName = "";

    public function add($request) {
        $insert_details = array(
            '_id' => new \MongoDB\BSON\ObjectId(),
            'client_id' => "$request->client_details",
            'bg_id' => "$request->bg_details",
            'type' => "$request->type",
            'level1_id' => "$request->level1_details",
            'level2_id' => "$request->level2_details",
            'molecule_id' => "$request->molecule_details",
            'therapeutic_id' => "$request->thera_details",
            'indication_id' => "$request->indication_details",
            'rss_feed_link' => "$request->rss_feed", 
            'isActive' => 1
        );

        ClientSetup::insert($insert_details);
    }

}
