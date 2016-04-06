<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Client\Client;
use App\Models\Indication\Indication;
use App\Models\Molecule\Level1;
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
        $level1Details = $this->loadLevel1Details();
        $therapyDetails = $this->loadIndicationEntry();
        return view('client/index', array(
            'details' => json_encode($listDetails), 
            'therapyDetails' => json_encode($therapyDetails),
            'level1Details' => json_encode($level1Details)
            ));
        // return view('client/index', array('therapy' => $therapy, 'details' => json_encode($listDetails)));
    }
    
    public function loadLevel1Details() {
        $level1 = array();
        $level1Details = Level1::all();
        foreach ($level1Details as $levelDetail['attributes']) {
            /*echo '<pre>';
            print_r($levelDetail);
            exit; */
            foreach($levelDetail as $level1Detail) {
//                echo '<pre>';
//                print_r($level1Detail['_id']);
//                exit;
            $level1details['_id'] = (string) $level1Detail['_id'];
            $level1details['level1Name'] = $level1Detail['Name'];
            array_push($level1, $level1details);
            }
        }
        return $level1;
    }
    
    public function loadIndicationEntry() {
        $listDetails = array();
        $therapy = Indication::all();        
        foreach ($therapy as $therapyDetail['attributes']) {
            $details['therapyName'] = $therapyDetail['attributes']['Therapy'];
            $details['tid'] = (string) $therapyDetail['attributes']['_id'];                        
            
            array_push($listDetails, $details);
            //exit;
        }
        return $listDetails;
    }
    
    public function loadIndications($tid) {
        $str = '';
        $query = new Indication();
        $result = $query->loadIndications($tid);
        foreach($result as $resultset)
        {
            
        }
        foreach($resultset as $res) {
            $id = (string) $res['_id'];
            $name = $res['Name'];
            $str.= '<option value="'.$id.'">'.$name.'</option>';
        }
        return response()->json([
                        'success' => true,
                        'message' => $str
                            ], 200);
        //foreach($res)
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
    
    public function storeIndicationEntry(Request $request) {
        $validator = Validator::make($request->all(), [
                    'therapeuticName' => 'required',
                    'indicationName' => 'required',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            $errors = json_decode($errors);

            return response()->json([
                        'success' => false,
                        'message' => $errors
                            ], 422);
        } else {
            //$str = $this->groupExists($request);
            return response()->json([
                        'success' => true,
                        'message' => "Indication Entry Added Successfully"
                            ], 200);
        }        
    }
    
    public function groupExists($request) {             
        $obj = new Client();        
        return $result = $obj->checkGroupExists($request);                                
    }

}
