<?php
namespace App\Http\Controllers\ConferenceCalendar;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\ConfCalendarModel as ConfCalendarModel;

class MonthConfCalendarController extends Controller {
    
     public function __construct() {
        $this->confCalendarModel = new ConfCalendarModel;
    }
    
    
    public function index($yr,$mn) {
        $this->year=$yr;
        $this->month=$mn;
        $month_arr = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
        $month_number=array_search($this->month, $month_arr);
        return view('conference_calendar.month_dashboard', array('month'=>$month_number,'year'=>$this->year));
    }
    
    public function getEventMonthWise(Request $request) {
        
        $month_arr = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
        
        $year=$request->get('year');
        $month_no=$request->get('month');
        
        $month=$month_arr[$month_no];
        
        $conf_content1 = $this->confCalendarModel->CalenderByYearandMonth($month, $year);
        $conf_content = iterator_to_array($conf_content1);
        $conf_detail_arr = array();

        $position = 0;
        foreach ($conf_content as $conference_detail_key) {
            
            $conf_detail_arr[$position]["title"] = $conference_detail_key['conference_title'];

            foreach ($conference_detail_key['conf_column_name_value'] as $value) {

                if (array_key_exists("dates", $value)) {
                    $date=$value['dates'];
                    $two_dates=explode(" - ",$date);
                    if(preg_match('/-/', $date)) {
                    $conf_detail_arr[$position]["start"] = $two_dates[0];
                    $conf_detail_arr[$position]["end"] = $two_dates[1]; 
                    }else{
                     $conf_detail_arr[$position]["start"] = $date;   
                    }
                       
                }
                $conf_detail_arr[$position]["nav_key"] = $position;
            }
            $position++;
        }
        
        return $conf_detail_arr;
    }
}
