<?php

namespace App\Models;

//use Moloquent;
//use MongoId;
//use Mongodb\Eloquent\Model;
use Jenssegers;
use Carbon\Carbon;
use Jenssegers\Mongodb;
use App\Models\DataTypes\DataTypes as DataTypes;
use MongoDB\Model;
use MongoDB\BSON\ObjectID;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

/**
 * Category Model
 *
 * @author Hafiz Waheeduddin
 */
class Feed_Management_Models extends Eloquent {

    protected $collection = "CI_RSS_Feeds";
    public $ldate = '';

//    protected $fillable = array('UserName');

    public function add_feeds($request) {
        $this->ldate = Carbon::now('Asia/Kolkata');
        $types = DataTypes::where('isActive', 1)->get();
        $arr = array();
        foreach ($types as $typeDetail) {
            $typeAttr = $typeDetail['attributes'];
            $tmp = str_replace(" ", "", $typeAttr['typeName']);
            $temp = $request->$tmp;
            $arr[str_replace(" ", "", $typeAttr['typeName'])] = implode(",", $temp);
        }
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
            'link_type' => "$request->link_type",
            $arr,
            //'rss_feed_link' => "$request->rss_feed", 
            'Created_Date' => "$this->ldate"
        );

        Feed_Management_Models::insert(array($insert_details));
        return $arr;
    }

    public function edit_user_submit($id, $request) {

        $user = array('User_Name' => "$request->User_Name", 'Email_Id' => "$request->Email_Id", 'Password' => "$request->Password", 'Role_Id' => "$request->Role_Name", 'Created_Date' => "2013-10-02T01:11:18.965Z");
        User_Management_Models::table('CI_Users')
                ->where('_id', '$id')
                ->update(array($user));
        return redirect('/');
    }

    public function updateFeed($request) {
        $types = DataTypes::where('isActive', 1)->get();
        $arr = array();
        foreach ($types as $typeDetail) {
            $typeAttr = $typeDetail['attributes'];
            $str = implode(",", $request->$typeAttr['typeName']);
            $arr[$typeAttr['typeName']] = substr($str, 1);
        }
        $update_details = array(
            'client_id' => "$request->client_details_edit",
            'bg_id' => "$request->bg_details_edit",
            'type' => "$request->type_edit",
            'level1_id' => "$request->level1_details_edit",
            'level2_id' => "$request->level2_details_edit",
            'molecule_id' => "$request->molecule_details_edit",
            'therapeutic_id' => "$request->thera_details_edit",
            'indication_id' => "$request->indication_details_edit",
            $arr
                // 'link_type' => "$request->link_type",
                //'rss_feed_link' => "$request->rss_feed_edit", 
        );
        \Illuminate\Support\Facades\DB::collection($this->collection)
                ->where('_id', new \MongoDB\BSON\ObjectId($request->fid))
                ->update(($update_details));
    }

    public function delete_feed_details($id) {

        // Feed_Management_Models::where('_id', '=', $id)->delete();
        //       return "/";
    }

}
