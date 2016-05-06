<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Role_Management_Models;
use Illuminate\Http\Request;
use Validator;
use MongoDB\Model;
use MongoDB\BSON\ObjectID;

class Role_Management_Controller extends Controller {

    public function index() {
        $listroleObj = Role_Management_Models::where('isActive', 1)->get();
        return view('layouts/Role_Management/roles', ['roles' => $listroleObj]);
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
                    'RoleName' => 'required',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            $errors = json_decode($errors);

            return response()->json([
                        'success' => false,
                        'message' => $errors
                            ], 422);
        } else {
            $roleObj = new Role_Management_Models();
            $roleObj->add_role($request);

            return response()->json([
                        'success' => true,
                        'message' => "Role Added Successfully"
                            ], 200);
        }
    }

    public function editrolesubmit(Request $request) {
        $validator = Validator::make($request->all(), [
                    'RoleName' => 'required',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            $errors = json_decode($errors);

            return response()->json([
                        'success' => false,
                        'message' => $errors
                            ], 422);
        } else {
            $roleObj = new Role_Management_Models();
            $roleObj->edit_role_submit($request->RoleID, $request);

            return response()->json([
                        'success' => true,
                        'message' => "Role updated Successfully"
                            ], 200);
        }
    }

    public function editroleform($id) {
        $userdetails = Role_Management_Models::find($id);
        if (!empty($userdetails)) {
            $details['Role_Name'] = $userdetails['attributes']['Role_Name'];
            $details['Role_Id'] = $id;
            return $details;
        }
    }

    public function removeRole($id) {
        $ob = new Role_Management_Models();
        $ob->removeRole($id);
    }

}
