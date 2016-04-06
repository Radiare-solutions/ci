<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Client\Client;
use Illuminate\Http\Request;
use Validator;
use MongoDB\Model;
use MongoDB\BSON\ObjectID;

class ClientController extends Controller {

    public function index() {
        $listDetails = array();
        $clients = Client::all();
        foreach($clients as $client) {
            $clientDetail = $client['attributes'];
            $test['cid'] = (string) $clientDetail['_id'];
            $test['clientName'] = $clientDetail['Name'];
            array_push($listDetails, $test);
        }
        return view('client/index', array('details' => json_encode($listDetails)));
        // return view('client/index', array('therapy' => $therapy, 'details' => json_encode($listDetails)));
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
                    'clientName' => 'required',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            $errors = json_decode($errors);

            return response()->json([
                        'success' => false,
                        'message' => $errors
                            ], 422);
        } else {
            $str = $this->clientExists($request);
            return response()->json([
                        'success' => true,
                        'message' => "Client ".$str." Successfully"
                            ], 200);
        }
    }

    public function clientExists($request) {             
        $obj = new Client();        
        return $result = $obj->checkClientExists($request);                                
    }

    public function load($cid) {
        $obj = new Client();
        return $obj->loadClientDetails($cid);        
    }
    
    public function storeGroup(Request $request) {
        $validator = Validator::make($request->all(), [
                    'clientName' => 'required',
                    'groupName' => 'required',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            $errors = json_decode($errors);

            return response()->json([
                        'success' => false,
                        'message' => $errors
                            ], 422);
        } else {
            $str = $this->groupExists($request);
            return response()->json([
                        'success' => true,
                        'message' => "Business Group ".$str." Successfully"
                            ], 200);
        }
    }
    
    public function groupExists($request) {             
        $obj = new Client();        
        return $result = $obj->checkGroupExists($request);                                
    }

}
