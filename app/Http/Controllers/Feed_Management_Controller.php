<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Feed_Management_Models;
use App\Models\Client\Client;
use Illuminate\Http\Request;
use Validator;
use Carbon\Carbon;
use MongoDB\Model;
use MongoDB\BSON\ObjectID;

class Feed_Management_Controller extends Controller {

    public function index() {

        $listfeedObj = Feed_Management_Models::all();
        // $listroleObj->list_role();
        $clientObj = Client::all();
        $feed_list = \App\Models\Feed_Management_Models::all();

        return view('Feed_Management/feed_management', 
                   array(     
                       'feeds' => $listfeedObj, 
                       'feed_list' => $feed_list,
                       'client_list' => $clientObj
                    )
                );
    }

    public function list_feeds() {

        $listfeedObj = Feed_Management_Models::all();
        // $listroleObj->list_role();
        $feed_list = \App\Models\Feed_Management_Models::all();
$clientObj = Client::all();
        return view('Feed_Management/feedlist', ['feeds' => $listfeedObj], ['feed_list' => $feed_list],
                array('client_list' => $clientObj)
                );
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

    public function deletefeeddetails($id) {
        $DelFeedObj = new Feed_Management_Models();
        $DelFeedObj->delete_feed_details($id);

        return response()->json([
                    'success' => true,
                    'message' => "RSS Feed deleted Successfully"
                        ], 200);
    }

}
