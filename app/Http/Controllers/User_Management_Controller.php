<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User_Management_Models;
use Illuminate\Http\Request;
use Validator;
use MongoDB\Model;
use MongoDB\BSON\ObjectID;

class User_Management_Controller extends Controller {

    public function index() {
        $listUserObj = array();
        $userObj = User_Management_Models::where('isActive', 1)->get();
        $role_options = \App\Models\Role_Management_Models::where('isActive', 1)->get();
        foreach($userObj as $userDetail) {
            $userAttr = $userDetail['attributes'];
            $arr['_id'] = $userAttr['_id'];
            $arr['User_Id'] = $userAttr['User_Id'];
            $arr['userName'] = $userAttr['User_Name'];
            $arr['email'] = $userAttr['Email_Id'];
            $roleObj = new \App\Models\ModelHelper();
            $arr['roleName'] = $roleObj->getRoleName($userAttr['Role_Id']);            
            array_push($listUserObj, $arr);
        }
        return view('layouts/User_Management/user_management', ['listUserObj' => $listUserObj], ['role_options' => $role_options]);
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
                    'User_Name' => 'required',
                    'Email_Id' => 'required|email',
                    'Password' => 'required',
                    'Role_Name' => 'required',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            $errors = json_decode($errors);

            return response()->json([
                        'success' => false,
                        'message' => $errors
                            ], 422);
        } else {
            $UserObj = new User_Management_Models();
            $UserObj->add_user($request);

            return response()->json([
                        'success' => true,
                        'message' => "User Added Successfully"
                            ], 200);
        }
    }

    public function editusersubmit(Request $request) {
        $validator = Validator::make($request->all(), [
                    'User_Name' => 'required',
                    'Email_Id' => 'required|email',
                    'Password' => 'required',
                    'Role_Name' => 'required',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            $errors = json_decode($errors);

            return response()->json([
                        'success' => false,
                        'message' => $errors
                            ], 422);
        } else {
            $UserObj = new User_Management_Models();
            $UserObj->edit_user_submit($request);

            return response()->json([
                        'success' => true,
                        'message' => "User updated Successfully"
                            ], 200);
        }
    }

    public function edituserform($id) {
        $userdetails = User_Management_Models::where('User_Id', new \MongoDB\BSON\ObjectID($id))->first();
        if (!empty($userdetails)) {
            $details['User_Name'] = $userdetails['attributes']['User_Name'];
            $details['Email_Id'] = $userdetails['attributes']['Email_Id'];
            $details['Password'] = $userdetails['attributes']['Password'];
            $details['Role_Id'] = $userdetails['attributes']['Role_Id'];
            return $details;
        }
    }
    
    public function removeUser($id) {
        $ob = new User_Management_Models();
        $ob->removeUser($id);
    }

}
