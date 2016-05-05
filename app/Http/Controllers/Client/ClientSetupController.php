<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use MongoDB\Model;
use MongoDB\BSON\ObjectID;

use App\Models\Client\Client;
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
    
}
