<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use MongoDB\Model;
use MongoDB\BSON\ObjectID;

class DashboardController extends Controller {
    
    public function __construct() {
        $this->middleware('auth');
    }
    
    public function index() {
        return view('home/index', array());
    }
}