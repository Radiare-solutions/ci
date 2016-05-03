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
         $listuserObj = User_Management_Models::all();
           // $listroleObj->list_role();
             $role_options = \App\Models\Role_Management_Models::all();   

    return view('layouts/User_Management/user_management', ['users' => $listuserObj],['role_options' => $role_options] );
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
    public function editusersubmit($id, Request $request) {
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
            $UserObj->edit_user_submit($id,$request);

            return response()->json([
                        'success' => true,
                        'message' => "User updated Successfully"
                            ], 200);
        }
    }

    
    public function edituserform($id) {
    $userdetails = User_Management_Models::find($id);
        if (!empty($userdetails)) {
            $details['User_Name'] = $userdetails['attributes']['User_Name'];
            $details['Email_Id'] = $userdetails['attributes']['Email_Id'];
            $details['Password'] = $userdetails['attributes']['Password'];
            $details['Role_Id'] = $userdetails['attributes']['Role_Id'];
            return $details;
    }
    }

}
