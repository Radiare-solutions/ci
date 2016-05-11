<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use MongoDB\Model;
use MongoDB\BSON\ObjectID;
use App\Http\Requests\ClientSetupRequest;
use App\Models\Client\Client;
use App\Models\Client\ClientSetup;
/**
 * Description
 *
 * @author abhishek
 */
class ClientSetupController extends Controller {
    
    public function index() {
        $clientsObj = Client::where('isActive', 1)->get();   
        $listArray = array();
        foreach($clientsObj as $clientDetails) {
            $clientAttr = $clientDetails['attributes'];
            $arr['_id'] = $clientAttr['_id'];
            $arr['name'] = $clientAttr['Name'];
            array_push($listArray, $arr);
        }
        return view("client/setup/index", array(
            'clientsList' => $listArray
        ));
    }
    
    public function store(ClientSetupRequest $request) {
        $validator = Validator::make($request->all(), [
                    // 'RoleName' => 'required',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            $errors = json_decode($errors);

            return response()->json([
                        'success' => false,
                        'message' => $errors
                            ], 422);
        } else {
            $roleObj = new ClientSetup();
            $roleObj->add($request);
            
            return response()->json([
                        'success' => true,
                        'trial' => $request->feed_url,
                        'message' => "Role Added Successfully"
                            ], 200);
        }
    }
    
}
