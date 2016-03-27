<?php
namespace App\Http\Controllers\Indication;

use App\Http\Controllers\Controller;
use App\Models\Indication\Indication;

class IndicationController extends Controller {
    
    public function index() {   
       $listDetails = array();       
       $therapy = Indication::all();
       foreach($therapy as $therapyDetail['attributes']) {
           $details['therapyName'] = $therapyDetail['attributes']['Name'];
           $ob = new \stdClass();
           $test = array();
           $ob->therapyName = $details['therapyName'];
           foreach($therapyDetail['attributes']['Indication'] as $indicationDetail) {
               //print_r($indicationDetail['Name']);
               array_push($test, $indicationDetail['Name']);               
           }
           $ob->indicationName = $test;
           array_push($listDetails, $ob);
           //exit;
       }
       //print_r(json_encode($listDetails));
//       $test = array(
//           'Therapy' => "AutoImmunine",
//           'Indication' => array(
//               0 => array('Name' => 'Adalimumab'),
//               1 => array('Name' => 'Adalimumab')
//            )
//           
//       );
//       
//       //$test1['Indication'] = 1;
//       //array_push($test, "abc");
//       //$test['Therapy']['indication'] = "Adalimumab";
//       //$test['Therapy']['indication'] = "Adalimumab";
//       echo '<pre>';
//       print_r(json_encode($test));
       //exit;
       return view('indication/index', array('therapy' => $therapy, 'details' => json_encode($listDetails)));
    }
    
}
