<?php
namespace App\Http\Controllers\Indication;

use App\Http\Controllers\Controller;
use App\Models\Indication\Indication;

class IndicationController extends Controller {
    
    public function index() {
       $indicationObj = new Indication();
       
       echo $indicationObj->find('56f432f5b720531878f8c92e');
       
    }
    
}
