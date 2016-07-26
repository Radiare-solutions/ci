<?php
namespace App\Http\Controllers\ConferenceCalendar;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\ConfCalendarModel as ConfCalendarModel;

class YearConfCalendarController extends Controller {
    
     public function __construct() {
        $this->confCalendarModel = new ConfCalendarModel;
    }
    
    
    public function index(Request $request) {

        $year_url = $request->get('year');
        $conf_calendar_data = $this->confCalendarModel->CalenderByYear($year_url);

        if (!empty($conf_calendar_data)) {

            $monthly_calender = array("January" => array("Total_Conf" => 0, "Conf_Details" => array()),
                "February" => array("Total_Conf" => 0, "Conf_Details" => array()),
                "March" => array("Total_Conf" => 0, "Conf_Details" => array()),
                "April" => array("Total_Conf" => 0, "Conf_Details" => array()),
                "May" => array("Total_Conf" => 0, "Conf_Details" => array()),
                "June" => array("Total_Conf" => 0, "Conf_Details" => array()),
                "July" => array("Total_Conf" => 0, "Conf_Details" => array()),
                "August" => array("Total_Conf" => 0, "Conf_Details" => array()),
                "September" => array("Total_Conf" => 0, "Conf_Details" => array()),
                "October" => array("Total_Conf" => 0, "Conf_Details" => array()),
                "November" => array("Total_Conf" => 0, "Conf_Details" => array()),
                "December" => array("Total_Conf" => 0, "Conf_Details" => array()));

            $conf_detail_arr = array();
            foreach ($conf_calendar_data as $post) {

                $attributes = $post['attributes'];

                $conf_details = $attributes["conf_column_name_value"];
                $unique_id = $attributes["_id"];
                $conference_title = isset($attributes["conference_title"]) ? $attributes["conference_title"] : "";

                if (!empty($conf_details)) {
                    $id = isset($conf_details["id"]) ? $conf_details["id"] : 0;
                    $dates = isset($conf_details["dates"]) ? $conf_details["dates"] : "";
                    $start_month = isset($conf_details["start_month"]) ? $conf_details["start_month"] : "";
                    $end_month = isset($conf_details["end_month"]) ? $conf_details["end_month"] : "";
                    $year = isset($conf_details["year"]) ? $conf_details["year"] : "";
                }

                if ($start_month == $end_month) {

                    $conf_detail_arr["conf_id"] = $id;
                    $conf_detail_arr["conf_title"] = $conference_title;
                    $conf_detail_arr["conf_date"] = $dates;
                    $conf_detail_arr["unique_id"] = $unique_id;
                    $conf_detail_arr["month"] = $start_month;
                    $conf_detail_arr["year"] = $year;

                    if (isset($monthly_calender[$start_month]) && !empty($conf_detail_arr)) {
                        $monthly_calender[$start_month]["Conf_Details"]["$unique_id"] = $conf_detail_arr;
                        $monthly_calender[$start_month]['Total_Conf'] ++;
                    }
                }
            }

            return view('conference_calendar/view_conf_calendar', array('monthly_calender' => $monthly_calender,'yr'=>$year_url));
        }
    }

    public function getConference(Request $request) {

        $month = $request->get('month');
        $year = $request->get('year');
        $nav_key = $request->get('nav_key');


        $conf_content1 = $this->confCalendarModel->CalenderByYearandMonth($month, $year);
        $conf_content = iterator_to_array($conf_content1);

        $conf_detail_arr = array();

        $position = 0;
        foreach ($conf_content as $conference_detail_key) {

            $conference_id = $conference_detail_key['_id'];
            $conference_title = $conference_detail_key['conference_title'];

            $conf_detail_arr[$position]["conf_id"] = $conference_id;
            $conf_detail_arr[$position]["conf_title"] = $conference_title;

            foreach ($conference_detail_key['conf_column_name_value'] as $value) {

                if (array_key_exists("id", $value)) {
                    $conf_detail_arr[$position]["id"] = $value['id'];
                }
                if (array_key_exists("dates", $value)) {
                    $conf_detail_arr[$position]["dates"] = $value['dates'];
                }
                if (array_key_exists("location", $value)) {
                    $conf_detail_arr[$position]["location"] = $value['location'];
                }
                if (array_key_exists("contact", $value)) {
                    $conf_detail_arr[$position]["contact"] = $value['contact'];
                }
                if (array_key_exists("topics", $value)) {
                    $conf_detail_arr[$position]["topics"] = $value['topics'];
                }
                if (array_key_exists("related_subject(s)", $value)) {
                    $conf_detail_arr[$position]["related_subject"] = $value['related_subject(s)'];
                }
                if (array_key_exists("event_website", $value)) {
                    $conf_detail_arr[$position]["event_website"] = $value['event_website'];
                }
                if (array_key_exists("abstract", $value)) {
                    $conf_detail_arr[$position]["abstract"] = $value['abstract'];
                }
            }
            $position++;
        }

        $data = array("content" => $conf_detail_arr, "month" => $month, "year" => $year, "nav_key" => $nav_key);
        return view('conference_calendar/get_detailed_conf', array('conference_detail' => $data));
    }

    public function DOM($html) {
        if (!empty($html)) {
            $DOM = new \DOMDocument();
            libxml_use_internal_errors(true);
            $DOM->loadHTML($html);
            libxml_use_internal_errors(false);
            $a = new \DOMXPath($DOM);
            return $a;
        } else
            return null;
    }

}
