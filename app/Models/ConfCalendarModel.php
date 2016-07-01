<?php
namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class ConfCalendarModel extends Eloquent
{
    protected $collection="ci_conf_calendar";
    
 
    public function AddCoverage($insert_details) {
                
                ConfCalendarModel::insert($insert_details);
    }
	
    public function FetchConfcalender($Conf_id){

        if($Conf_id !='')
        {
	        $ConfCalendarModel=ConfCalendarModel::where("_id",'=',$Conf_id)->get();
	        return $ConfCalendarModel;
        }
        else if($Conf_id=="")
        {
        	$data = ConfCalendarModel::all();
        	return $data;
        }
    }
     public function CalenderByYear($year){
	 return ConfCalendarModel::where("conf_column_name_value.year","=","$year")->get();
    }
    public function CalenderById($id){
	 return ConfCalendarModel::where("conf_column_name_value.id","=","$id")->get();
    }
    public function CalenderByYearandMonth($month,$year){
         
//    $aggregate_array=array(
//    array('$unwind'=>'$conf_column_name_value'),
//    array('$match'=>array("conf_column_name_value.year"=>"$year","conf_column_name_value.start_month"=>"$month" )),
//    array('$group'=>array("_id"=> '$_id',
//          "conference_title"=> array('$first'=>'$conference_title'),
//          "conf_column_name_value"=>array('$push'=> '$conf_column_name_value')
//    )));
    
//    return ConfCalendarModel::raw()->aggregate($aggregate_array);
        return ConfCalendarModel::Where("conf_column_name_value.year","=","$year")->Where("conf_column_name_value.start_month","=","$month")->get();
    }
    
}
