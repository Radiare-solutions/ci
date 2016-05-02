<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Feed_Management_Models;
use App\Models\Client\Client;
use App\Models\Molecule\Molecule;
use App\Models\MapMolecules\MapMolecules;
use App\Models\Indication\Indication;
use App\Models\Molecule\Level1;
use App\Models\Molecule\Level2;
use App\Models\ModelHelper;
use Illuminate\Http\Request;
use Validator;
use Carbon\Carbon;
use MongoDB\Model;
use MongoDB\BSON\ObjectID;

class Feed_Management_Controller extends Controller {

    public function index() {

        $listfeedObj = Feed_Management_Models::all();
        $clientObj = Client::all();
        $feeds = array();
        $clientOb = new Client();
        foreach ($listfeedObj as $feed) {
            $feedAttr = $feed['attributes'];
            $names = $clientOb->getBGName($feedAttr['client_id'], $feedAttr['bg_id']);
            $tempArr['indication'] = '';
            $tempArr['molecule'] = '';
            if ($feedAttr['type'] == 'indication') {
                $indicationObj = new Indication();
                $iNames = $indicationObj->getIndicationName(new \MongoDB\BSON\ObjectId($feedAttr['indication_id']));
                $tempArr['indication'] = $iNames[0]['indication'];
            }

            if ($feedAttr['type'] == 'molecule') {
                $moleculeObj = Molecule::find($feedAttr['molecule_id']);
                $tempArr['molecule'] = $moleculeObj['attributes']['Name'];
            }
            $tempArr['_id'] = $feedAttr['_id'];
            $tempArr['clientName'] = $names['clientName'];
            $tempArr['bgName'] = $names['groupName'];
            $tempArr['rssLink'] = $feedAttr['rss_feed_link'];
            array_push($feeds, $tempArr);
        }

        return view('Feed_Management/feed_management', array(
            'feeds' => $feeds,
            'client_list' => $clientObj
                )
        );
    }

    public function list_feeds() {
        $listfeedObj = Feed_Management_Models::all();
        foreach ($listfeedObj as $feeds) {
            echo '<pre>';
            print_r($feeds);
            exit;
        }
        return view('Feed_Management/feedlist', ['feeds' => $listfeedObj]);
    }

    public function loadBG($cid, $value = "") {
        $clientObj = new Client();
        $ob = $clientObj->loadBG($cid);
        $str = '<option value="">select</option>';
        foreach ($ob as $data) {
            $clas = '';
            if ($value == $data['_id'])
                $clas = "selected=selected";
            $str.='<option value="' . $data['_id'] . '" ' . $clas . '>' . $data['Name'] . '</option>';
        }
        return response()->json([
                    'success' => true,
                    'message' => $str
                        ], 200);
    }

    public function add_feeds(Request $request) {
        $validator = Validator::make($request->all(), [
//                    'User_Name' => 'required',                    
//                    'Email_Id' => 'required',                    
//                    'Password' => 'required',                    
//                    'Role_Name' => 'required',                    
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            $errors = json_decode($errors);

            return response()->json([
                        'success' => false,
                        'message' => $errors
                            ], 422);
        } else {
            $FeedObj = new Feed_Management_Models();
            $FeedObj->add_feeds($request);

            return response()->json([
                        'success' => true,
                        'message' => "Feed Added Successfully"
                            ], 200);
        }
    }

    public function loadTherapeutic($bgid, $tid) {
        $ob = new MapMolecules();
        $therapy = $ob->loadFeedTherapeuticDetails($bgid);
        $str = '<option value="">select</option>';
        foreach ($therapy as $data) {
            $clas = "";
            if($tid == (string) $data['_id'])
                $clas = "selected=selected";            
            $str.='<option value="' . $data['_id'] . '" '.$clas.'>' . $data['therapy'] . '</option>';
        }
        return response()->json([
                    'success' => true,
                    'message' => $str
                        ], 200);
    }

    public function loadIndicationDetail($tid) {
        $ob = new ModelHelper();
        $str = $ob->loadIndicationsDataByTherapeuticID($tid);
        return response()->json([
                    'success' => true,
                    'message' => $str
                        ], 200);
    }

    public function loadLevel1($bgid, $l1id = "") {
        $ob = new MapMolecules();
        $level1 = $ob->loadFeedLevel1Details($bgid);
        $str = '<option value="">select</option>';
        foreach ($level1 as $data) {
            $clas = '';
            if ($l1id == $data['_id'])
                $clas = "selected=selected";
            $str.='<option value="' . $data['_id'] . '" ' . $clas . '>' . $data['level1name'] . '</option>';
        }
        return response()->json([
                    'success' => true,
                    'message' => $str
                        ], 200);
    }

    public function loadLevel2($l1id, $l2id = "") {
        $ob = new MapMolecules();
        $level1 = $ob->loadFeedLevel1Details($bgid);
        $str = '<option value="">select</option>';
        foreach ($level1 as $data) {
            $clas = '';
            if ($lid == $data['_id'])
                $clas = "selected=selected";
            $str.='<option value="' . $data['_id'] . '" ' . $clas . '>' . $data['level1name'] . '</option>';
        }
        return response()->json([
                    'success' => true,
                    'message' => $str
                        ], 200);
    }

    public function loadFeedLevels2($l1id, $l2id) {
        $ob = new ModelHelper();
        $str = $ob->loadLevel2DataByLevel1ID($l1id, $l2id);
        return response()->json([
                    'success' => true,
                    'message' => $str
                        ], 200);
    }

    public function loadFeedMoleculesByLevelID($l1id, $l2id, $mid) {
        $ob = new ModelHelper();
        $str = $ob->loadMoleculeDataByLevelID($l1id, $l2id, $mid);
        return response()->json([
                    'success' => true,
                    'message' => $str
                        ], 200);
    }

    public function editusersubmit($id, Request $request) {
        $validator = Validator::make($request->all(), [
//                    'User_Name' => 'required',                    
//                    'Email_Id' => 'required',                    
//                    'Password' => 'required',                    
//                    'Role_Name' => 'required',                    
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            $errors = json_decode($errors);

            return response()->json([
                        'success' => false,
                        'message' => $errors
                            ], 422);
        } else {
            $FeedObj = new Feed_Management_Models();
            $FeedObj->edit_user_submit($id, $request);

            return response()->json([
                        'success' => true,
                        'message' => "Feed updated Successfully"
                            ], 200);
        }
    }

    public function edit_feed_details($id) {
        $feeddetails = Feed_Management_Models::find($id);
        if (!empty($feeddetails)) {
            $details['User_Name'] = $userdetails['attributes']['User_Name'];
            $details['Email_Id'] = $userdetails['attributes']['Email_Id'];
            $details['Password'] = $userdetails['attributes']['Password'];
            $details['Role_Id'] = $userdetails['attributes']['Role_Id'];
            return $details;
        }
    }

    public function loadFeed($id) {
        $feeddetails = Feed_Management_Models::find($id);

        if (!empty($feeddetails)) {
            $clientObj = new Client();
            $feedAttr = $feeddetails['attributes'];
            $cliObj = Client::find($feedAttr['client_id']);
            $names = $cliObj->getBGName($feedAttr['client_id'], $feedAttr['bg_id']);
            if($feedAttr['type'] == 'molecule') {
                $l1Obj = Level1::find($feedAttr['level1_id']);
                $l2Obj = new Level2();
                $moleObj = Molecule::find($feedAttr['molecule_id']);
                $l2Name = $l2Obj->loadLevel2Name($feedAttr['level2_id']);
                $details['level1ID'] = $feedAttr['level1_id'];
                $details['level1Name'] = $l1Obj['attributes']['Name'];
                $details['level2ID'] = $feedAttr['level2_id'];
                $details['level2Name'] = $l2Name;
                $details['moleculeID'] = $feedAttr['molecule_id'];
                $details['moleculeName'] = $moleObj['attributes']['Name'];            
            }
            if($feedAttr['type'] == 'indication') {
                $ob = new ModelHelper();
                $iNames = $ob->getIndicationName($feedAttr['indication_id']);
                $details['therapeuticID'] = $feedAttr['therapeutic_id'];
                $details['therapeuticName'] = $iNames[0]['therapy'];
                $details['indicationID'] = $feedAttr['indication_id'];
                $details['indicationName'] = $iNames[0]['indication'];                
            }
            $details['clientID'] = $feedAttr['client_id'];
            $details['clientName'] = $names['clientName'];
            $details['groupID'] = (string) $feedAttr['bg_id'];
            $details['groupName'] = $names['groupName'];
            $details['type'] = $feedAttr['type'];
            $details['linkType'] = $feedAttr['link_type'];
            $details['fid'] = $feedAttr['_id'];
            $details['feedLink'] = $feedAttr['rss_feed_link'];
            return $details;
        }
    }
    
    public function edit_feeds(Request $request) {
        $ob = new Feed_Management_Models();
        $ob->updateFeed($request);
    }

    public function deletefeeddetails($id) {
        $DelFeedObj = new Feed_Management_Models();
        $DelFeedObj->delete_feed_details($id);

        return response()->json([
                    'success' => true,
                    'message' => "RSS Feed deleted Successfully"
                        ], 200);
    }

}
