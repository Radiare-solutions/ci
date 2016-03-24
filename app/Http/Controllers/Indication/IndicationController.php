<?php
namespace App\Http\Controllers\Indication;

use App\Http\Controllers\Controller;
use App\Models\Indication\Indication;

class IndicationController extends Controller {
    
    public function index() {
       $indicationObj = new Indication();
       
       print_r(Indication::all()); 
       
    }
    
}
