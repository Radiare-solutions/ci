<?php

namespace App\Http\Controllers\Patents;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PatentModel;
use Validator;
use MongoDB\Model;
use MongoDB\BSON\ObjectID;

class PatentsController extends Controller {
    
    /*
     * to check whether the user has been logged in or not
     */
    public function __construct() {
        $this->middleware('auth');
    }
    
    public function index() {
        $patentsData = $this->loadPatents();
        $applicantsArr = array();
        foreach($patentsData as $patent) {
            $patentAttr = $patent->attributes;
            //$applicant[]
            //array_push($applicantsArr, $patentAttr->applicants);
        }
        return view('patents.dashboard', array()); //array('applicants' => $applicantsArr));
    }
    
    /*
     * to fetch all the data in patents collection
     */
    public function loadPatents() {
        return PatentModel::all();
    }
}
