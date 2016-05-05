<?php

namespace App\Http\Controllers\Verify;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use MongoDB\Model;
use MongoDB\BSON\ObjectID;

use App\Models\SponserModel as SponserModel;

/**
 * Description of SponsorController
 *
 * @author abhishek
 */
class SponsorController extends Controller {
    
    public function index() {
        $listDetails = array();
        $sponsorObj = SponserModel::where('isActive', 1)->get();
        foreach ($sponsorObj as $sponsorDetail) {
            $sponsorAttr = $sponsorDetail['attributes'];
            $arr['_id'] = (string) $sponsorAttr['_id'];
            $arr['name'] = $sponsorAttr['sponsor_name'];
            array_push($listDetails, $arr);
        }

        return view('verify/sponsor/index', array('details' => ($listDetails)));
    }
    
    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
                    'editSponsorName' => 'required',
            ]);
        
        if ($validator->fails()) {
            $errors = $validator->errors();
            $errors = json_decode($errors);

            return response()->json([
                        'success' => false,
                        'message' => $errors
                            ], 422);
        } else {
            
            $str =  $this->sponsorExists($request);              

            return response()->json([
                        'success' => true,
                        'message' => "Sponsor ".$str." Successfully"
                            ], 200);
        }
    }
    
    public function sponsorExists($request) {
        $obj = new SponserModel();
        return $obj->editSponsor($request);
    }
    
    public function loadSponsor($id ) {
        $obj = new SponserModel();
        return $obj->loadSponsorDetails($id);        
    }
    
    public function removeSponsor($id) {
        $obj = new SponserModel();
        return $obj->removeSponsor($id);
    }
    
}
