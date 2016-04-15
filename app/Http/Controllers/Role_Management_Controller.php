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
//        $listDetails = array();
//        $therapy = Indication::all();
//        $this->indicationExists();
//        foreach ($therapy as $therapyDetail['attributes']) {
//            $details['therapyName'] = $therapyDetail['attributes']['Therapy'];
//            $details['_id'] = $therapyDetail['attributes']['_id'];
//            $ob = new \stdClass();
//            $test = array();
//            $ob->therapyName = $details['therapyName'];
//            $ob->_id = $details['_id'];
//            foreach ($therapyDetail['attributes']['Indication'] as $indicationDetail) {
//                //print_r($indicationDetail['Name']);
//                array_push($test, $indicationDetail['Name']);
//            }
//            $ob->indicationName = $test;
//            array_push($listDetails, $ob);
//            //exit;
//        }
         $listroleObj = Role_Management_Models::all();
           // $listroleObj->list_role();
            

    return view('layouts/Role_Management/roles', ['roles' => $listroleObj]);
//        return view('layouts/roles', );
        //return view('indication/index', array('therapy' => $therapy, 'details' => json_encode($listDetails)));
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
    public function edit_role_submit($rid, Request $request) {
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
            $roleObj->edit_role_submit($rid,$request);

            return response()->json([
                        'success' => true,
                        'message' => "Role updated Successfully"
                            ], 200);
        }
    }

    public function indicationExists() {
        $therapyID = '56efd36c9191b80388f1f1a0';
        $indication = '456';

        $result = \Illuminate\Support\Facades\DB::collection('posts')->raw(function($collection) 
        {
            return $collection->aggregate(array (
                array('$unwind' => '$Indication'),
                array(
                    '$match' => array(
                    '_id' => new \MongoDB\BSON\ObjectId('56efd36c9191b80388f1f1a0'),
                        ),
                    '$and' => array('Indication.Name' => array('456')),
                ),
                array('$project' => array(
                    'Therapy' => 1,
                    'Indication' => 1,
                ))
            ));
        });
        echo '<pre>';
        print_r($result);
        exit;
    }

    public function load($id) {
        $indicationDetails = Indication::find($id);
        if (!empty($indicationDetails)) {
            $details['therapyName'] = $indicationDetails['attributes']['Therapy'];
            $details['indicationName'] = $indicationDetails['attributes']['Indication'][0]['Name'];
            return $details;
        } else {
            return 0;
        }
    }

}
