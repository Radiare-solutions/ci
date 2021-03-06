<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RssModel as RssModel;
use App\Models\ClinicalTrialModel as ClinicalTrialModel;
use App\Models\ConditionModel as ConditionModel;
use App\Models\SponsorModel as SponsorModel;
use App\Models\DrugModel as DrugModel;
use App\Models\StatusModel as StatusModel;
use App\Models\PhaseModel as PhaseModel;
use App\Http\Requests;

/*
 * it is used to control the clinical trial data extraction part
 */

class ClinicalController extends Controller {
    /*
     * used to call as the first function
     * arguments - none
     * return value - none
     *  null - if no match found
     */

    public function Extract() {
        set_time_limit(0);
        ini_set('max_execution_time', 0);
        ini_set("display_errors", TRUE);

        $molecule_or_indication = urlencode("adalimumab");

        $api_query = "https://clinicaltrials.gov/search?term=$molecule_or_indication&displayxml=true";

        new \simple_html_dom();

        $content = file_get_contents($api_query);
        $xml = simplexml_load_string($content);

        //Fetching count from Clinical trial rss feed as molecule wise
       $attr = $xml['count'];
//        $attr = 10;

        //rss feed type 1 is clinical trial
        $rss_feed_type = "Clinical Trial";

        $RssModel = new RssModel();
        $ClinicalTrialModel = new ClinicalTrialModel();

        $feedExist = $RssModel->RssFeedselect($api_query, $rss_feed_type);
        if ($feedExist == null) {


            $feedInsert = $RssModel->RssFeedinsert($api_query, $rss_feed_type);
            $rss_feed_id = $feedInsert->_id;
        } else {
            $rss_feed_id = $feedExist->_id;
        }

        $clinical_api_query = file_get_contents("$api_query" . "&count=$attr");
        $clinical_study_xml = simplexml_load_string($clinical_api_query);


        foreach ($clinical_study_xml as $answer) {

            if (isset($answer->url)) {
                $url = (string) $answer->url;

                $title = (string) $answer->title;
//               echo $title;
                $status_name = (string) $answer->status;
//               exit;

                $result_url = "$url?displayxml=true";

                $clinical_result_ext = file_get_contents($result_url);
                $clinical_content_ext = simplexml_load_string($clinical_result_ext);

                $start_date = (string) $clinical_content_ext->start_date;
                $study_completion_date = (string) $clinical_content_ext->completion_date;
                $primary_completion_date = (string) $clinical_content_ext->primary_completion_date;
                $lastchanged_date = (string) $clinical_content_ext->lastchanged_date;
                $firstreceived_date = (string) $clinical_content_ext->firstreceived_date;
                $verification_date = (string) $clinical_content_ext->verification_date;

                $id_info = $clinical_content_ext->id_info;
                $nct_id = (string) $id_info->nct_id[0];

                $study_result_url = "https://clinicaltrials.gov/ct2/show/results/$nct_id";

                $sponsors_array = $clinical_content_ext->sponsors;
                $sponsors = $sponsors_array->lead_sponsor;
                $sponsors_name = (string) $sponsors->agency . " " . (string) $sponsors->agency_class;

                if (preg_match_all("#university#i", $sponsors_name, $matches) || preg_match_all("#college#i", $sponsors_name, $matches)) {
                    $sponsor_name = $sponsors_name;
                } else {
                    $sponsor_name = $sponsors_name;
                }


                $collaborator = $sponsors_array->collaborator;
                $collaborator_name = (string) $collaborator->agency . " " . (string) $collaborator->agency_class;

                $phase_name = (string) $clinical_content_ext->phase;

                $brief_title = (string) $clinical_content_ext->brief_title;

                $official_title = (string) $clinical_content_ext->official_title;

                $detailed_desc = $clinical_content_ext->detailed_description;
                $detailed_description = (string) $detailed_desc->textblock;


                $brief_sum = $clinical_content_ext->brief_summary;
                $brief_summary = (string) $brief_sum->textblock;
                $primary_outcome = $clinical_content_ext->primary_outcome;

                $primary_measure_def_arr = array();
                foreach ($primary_outcome as $primary_measure) {
                    $primary_measure_def_arr[] = "<p class='text-black text-jusitfy'>" . $primary_measure->measure . " [ Time Frame: " . $primary_measure->time_frame . " ] [ Designated as safety issue: " . $primary_measure->safety_issue . " ]</p><p class='text-black text-jusitfy'>" . $primary_measure->description . "</p>";
                }

                $primary_measure_def = implode(" ", $primary_measure_def_arr);

                $secondary_measure_def_arr = array();
                $secondary_outcome = $clinical_content_ext->secondary_outcome;
                foreach ($secondary_outcome as $secondary_measure) {
                    $secondary_measure_def_arr[] = "<p class='text-black text-jusitfy'>" . $secondary_measure->measure . " [ Time Frame: " . $secondary_measure->time_frame . " ] [ Designated as safety issue: " . $secondary_measure->safety_issue . " ]</p><p class='text-black text-jusitfy'>" . $secondary_measure->description . "</p>";
                }

                $secondary_measure_def = implode(" ", $secondary_measure_def_arr);

                $eligibility = $clinical_content_ext->eligibility;
                $criteria = $eligibility->criteria;
                $eligibility_criteria = (string) $criteria->textblock;

                $eligibility_gender = (string) $eligibility->gender;

                $minimum_age = (string) $eligibility->minimum_age;

                $maximum_age = (string) $eligibility->maximum_age;
                $age = $minimum_age . " to " . $maximum_age;

                $healthy_volunteers = (String) $eligibility->healthy_volunteers;

                $countries = $clinical_content_ext->location_countries;
                $location_country = (String) $countries->country;

                $study_type = (string) $clinical_content_ext->study_type;

                $study_design_str = (string) $clinical_content_ext->study_design;
                $explode_study_design = explode(",", $study_design_str);
                $study_design = implode("<br/>", $explode_study_design);

                $enrollment = (string) $clinical_content_ext->enrollment;

                $condition_name = (string) $clinical_content_ext->condition;

                $intervention_array = $clinical_content_ext->intervention;
                $inter_arr = array();
                $drug_arr = array();
                foreach ($intervention_array as $inter_item) {
                    $intervention_type = (string) $inter_item->intervention_type;
                    $intervention_name = (string) $inter_item->intervention_name;
                    if ($intervention_type != 'Drug') {

                        //intervention should not contain the word of placebo
                        if (!preg_match_all("#placebo#i", $intervention_name, $matches)) {
                            $inter_arr[] = $intervention_type . ": " . $intervention_name;
                        }
                    }
                }

                $flag = 0;
                foreach ($intervention_array as $inter_item1) {

                    $intervention_type = (string) $inter_item1->intervention_type;
                    $intervention_name = (string) $inter_item1->intervention_name;
                    if ($intervention_type == 'Drug') {
                        //drug name should not contain the word of placebo
                        if (!preg_match_all("#placebo#i", $intervention_name, $matches)) {
                            $drug_arr[] = trim($intervention_name);
                            $flag++;
                        }
                    } else {
                        //intervention should not contain the word of placebo
                        if ($flag == 0) {
                            if (!preg_match_all("#placebo#i", $intervention_name, $matches)) {
                                $drug_arr[] = $intervention_name;
                            }
                        }
                    }
                }

                $intervention_implode = implode("<br/>", $inter_arr);
                $intervention_array1 = $clinical_content_ext->intervention;
                $detailed_intervention_array = array();
                foreach ($intervention_array1 as $inter_item1) {
                    $intervention_type = (string) $inter_item1->intervention_type;
                    $intervention_name = (string) $inter_item1->intervention_name;
                    $other_name = $inter_item1->other_name;
                    $other_name_array = array();
                    for ($i = 0; $i < count($other_name); $i++) {
                        $other_name_array[] = "<li>" . $other_name[$i] . "</li>";
                    }

                    $detailed_intervention_array[] = "<li class='text-black text-jusitfy'>" . $intervention_type . ": " . $intervention_name . "<br>" . (string) $inter_item1->description . "<br>Other Names:<ul>" . implode("", $other_name_array) . "</ul></li>";
                }

                $detailed_intervention = implode("", $detailed_intervention_array);

                $html_extraction = file_get_contents("$study_result_url?sect=X70156#outcome1");
                $a = $this->DOM($html_extraction);
                if (!is_null($a)) {
                    $spans = $a->query("//*[contains(concat(' ', normalize-space(@class), ' '), 'header3 note_outcome_color')]");

                    $current_div = $spans->item(0);
                    $primary_measure_value = "";
                    $result_next = array();
                    if (isset($current_div->parentNode->parentNode->nodeValue)) {

                        $result_next[] = $current_div->parentNode->parentNode->nodeValue;
                        $implode_array = implode("<br/>", $result_next);

                        $explode_array = explode("[2]", $implode_array);

                        $res_pri = explode(":", trim(str_replace("[1]", "", $explode_array[0])));
                        $primary_text1 = $res_pri[0];
                        $primary_res1 = iconv(mb_detect_encoding(trim(preg_replace('/\s+/', ' ', $res_pri[1])), mb_detect_order(), true), "UTF-8", trim(preg_replace('/\s+/', ' ', $res_pri[1])));

                        $second_array = explode("[3]", $explode_array[1]);
                        $res_pri1 = explode(":", trim($second_array[0]));
                        $primary_text2 = $res_pri1[0];
                        $primary_res2 = iconv(mb_detect_encoding(trim(preg_replace('/\s+/', ' ', $res_pri1[1])), mb_detect_order(), true), "UTF-8", trim(preg_replace('/\s+/', ' ', $res_pri1[1])));

                        $res_pri2 = explode(":", trim($second_array[1]));
                        $primary_text3 = $res_pri2[0];
                        $primary_res3 = iconv(mb_detect_encoding(trim(preg_replace('/\s+/', ' ', $res_pri2[1])), mb_detect_order(), true), "UTF-8", trim(preg_replace('/\s+/', ' ', $res_pri2[1])));
                    }
                }

                $implode_primary = implode("", $this->saveHTML($html_extraction, "indent1", 2));
                $implode_primary_cnt = utf8_decode(implode("", $this->saveHTML($implode_primary, "body3 indent2", 0)));
                $intent2 = implode("", $this->saveHTML($implode_primary_cnt, "indent2", 0));

                $event_a = $this->DOM($intent2);

                if (!is_null($event_a)) {
                    $spans1 = $event_a->query("//*[contains(concat(' ', normalize-space(@class), ' '), 'data_table')]");
                    $no_of_elem = $spans1->item(0);
                    $primary_measure_value1 = preg_replace("/<([a-z][a-z0-9]*)[^>]*?(\/?)>/i", '<$1$2>', $no_of_elem->ownerDocument->saveHTML($no_of_elem)); // Removing table attributes
                    $primary_measure_value = $this->addTableProperties($primary_measure_value1); // // Adding new table attributes
                }
                // getting serious adverse events
                $adverse_link = "$study_result_url?sect=X30156#evnt";
                $html_extraction_event = file_get_contents($adverse_link);
                $serious_event_array = $this->adverseEvent($html_extraction_event, $adverse_link);
                $serious_event_header = $serious_event_array[0];
                $serious_event_values = $serious_event_array[1];
//                        echo "<pre>";
//                        print_r($serious_event_array);
//                        echo "</pre>";
//                        exit();

                $implode_serious = implode("", $this->saveHTML($html_extraction_event, "indent1", 3));
                $implode_serious_cnt2 = preg_replace("/<([a-z][a-z0-9]*)[^>]*?(\/?)>/i", '<$1$2>', $implode_serious);
                $implode_serious_cnt1 = preg_replace('/<\/?a[^>]*>/', '', $implode_serious_cnt2);
                $implode_serious_cnt = $this->addTableClass(str_replace("Hide Serious Adverse Events", "", $implode_serious_cnt1));

                // getting other adverse events
                $adverse_link1 = "$study_result_url?sect=X40156#othr";
                $html_extraction_event1 = file_get_contents($adverse_link1);
                $other_event_array = $this->adverseEvent($html_extraction_event1, $adverse_link1);
                $other_event_header = $other_event_array[0];
                $other_event_values = $other_event_array[1];

                $implode_other = implode("", $this->saveHTML($html_extraction_event1, "indent1", 3));
                $implode_other_cnt1 = preg_replace("/<([a-z][a-z0-9]*)[^>]*?(\/?)>/i", '<$1$2>', utf8_decode(implode("", $this->saveHTML($implode_other, "header3 indent2", 1))));
                $implode_other_cnt = $this->addTableClass(str_replace("Hide Other Adverse Events", "", $implode_other_cnt1));

                $html_extraction_outcome = file_get_contents("$study_result_url?sect=X01256#all");
                $detailed_outcome_measure1 = preg_replace("/<([a-z][a-z0-9]*)[^>]*?(\/?)>/i", '<$1$2>', utf8_decode(implode("", $this->saveHTML($html_extraction_outcome, "indent1", 2))));
                $detailed_outcome_measure = $this->addTableClass(iconv(mb_detect_encoding($detailed_outcome_measure1, mb_detect_order(), true), "UTF-8", $detailed_outcome_measure1));

                $serious_adv_val = array("key" => $serious_event_header, "value" => $serious_event_values);
                $other_adv_val = array("key" => $other_event_header, "value" => $other_event_values);

                $SponsorModel = new SponsorModel();
                $sponsor_name = preg_replace("/[^a-zA-Z0-9 -_=#,.%&*(){}\s]/", "", $sponsor_name);
                $sponsor_name = ucfirst(strtolower($sponsor_name));
                $sponsor_name_id1 = $SponsorModel->FetchSponsor(trim($sponsor_name)); //checking whether the sponsor name is exist or not exist

                if ($sponsor_name_id1 == null || $sponsor_name_id1 == "") {
                    $sponsor_id_to_objectId = $SponsorModel->AddSponsor(trim($sponsor_name));   //we are adding the sponsor into the sponsor collection if sponsor is not exist
                    $sponsor_id=new \MongoDB\BSON\ObjectId($sponsor_id_to_objectId);
                } else {
                    $sponsor_name_id = $sponsor_name_id1['attributes'];
                    $sponsor_id = $sponsor_name_id['_id'];
                }

                $PhaseModel = new PhaseModel();
                $phase_name = preg_replace("/[^a-zA-Z0-9 -_=#,.%&*(){}\s]/", "", $phase_name);
                $phase_name = ucfirst(strtolower($phase_name));
                $phase_name_id1 = $PhaseModel->FetchPhase(trim($phase_name)); //checking whether the sponsor name is exist or not exist
                $phase_name_id = $phase_name_id1['attributes'];

                if (count($phase_name_id) == 0 || $phase_name_id == null || $phase_name_id == "") {
                    $phase_id_to_objectId = $PhaseModel->AddPhase(trim($phase_name));   //we are adding the sponsor into the sponsor collection if sponsor is not exist
                    $phase_id=new \MongoDB\BSON\ObjectId($phase_id_to_objectId);
                } else {
                    $phase_id = $phase_name_id['_id'];
                }


                $DrugModel = new DrugModel();

                $drug_id_arr = array();
                foreach ($drug_arr as $value) {
                    $value = preg_replace("/[^a-zA-Z0-9 -_=#,.%&*(){}\s]/", "", $value);
                    $value = ucfirst(strtolower($value));

                    $drug_name_id1 = $DrugModel->FetchDrug($value); //checking whether the drug name is exist or not exist

                    $drug_name_id = $drug_name_id1['attributes'];

                    if (count($drug_name_id) == 0 || $drug_name_id == null || $drug_name_id == "") {
                        $drug_id_to_objectId = $DrugModel->AddDrug($value);  //we are adding the drug name into the drug collection if drug is not exist 
                        $drug_id_arr[]=new \MongoDB\BSON\ObjectId($drug_id_to_objectId);
                    } else {
                        $drug_id_arr[] = $drug_name_id['_id'];
                    }
                }
                $drug_id = array();
                foreach ($drug_id_arr as $value) {
                    $drug_id[] = array("_id" => $value, "isActive" => 1);
                }
//                         echo "<pre>";
//                        var_dump($drug_id);
//                        echo "</pre>";
//                        exit();
                $ConditionModel = new ConditionModel();
                $condition_name = preg_replace("/[^a-zA-Z0-9 -_=#,.%&*(){}\s]/", "", $condition_name);
                $condition_name = ucfirst(strtolower($condition_name));
                $condition_name_id1 = $ConditionModel->FetchCondition(trim($condition_name)); //checking whether the condition name is exist or not exist
                $condition_name_id = $condition_name_id1['attributes'];


                if (count($condition_name_id) == 0 || $condition_name_id == null || $condition_name_id == "") { //we are adding the condition into the condition collection if condition is not exist
                    $condition_id_to_objectId = $ConditionModel->AddCondition(trim($condition_name));
                    $condition_id=new \MongoDB\BSON\ObjectId($condition_id_to_objectId);
                } else {
                    $condition_id = $condition_name_id['_id'];
                }

                $StatusModel = new StatusModel();
                $status_name = preg_replace("/[^a-zA-Z0-9 -_=#,.%&*(){}\s]/", "", $status_name);
                $status_name = ucfirst(strtolower($status_name));
                $status_name_id1 = $StatusModel->FetchStatus(trim($status_name)); //checking whether the condition name is exist or not exist
                $status_name_id = $status_name_id1['attributes'];
                if (count($status_name_id) == 0 || $status_name_id == null || $status_name_id == "") { //we are adding the condition into the condition collection if condition is not exist
                    $status_id_to_objectId = $StatusModel->AddStatus(trim($status_name));
                    $status_id=new \MongoDB\BSON\ObjectId($status_id_to_objectId);
                } else {
                    $status_id = $status_name_id['_id'];
                }


                $UrlExist = $ClinicalTrialModel->FetchClinicalTrial($url);

                if ($UrlExist == 0) {

                    $ClinicalTrialInsertArray = array('rss_feed_id' => $rss_feed_id,
                        'identifier' => $nct_id,
                        'clinical_title' => $title,
                        'collaborator' => $collaborator_name,
                        'phase_id' => $phase_id,
                        'intervention' => $intervention_implode,
                        'status_id' => $status_id,
                        'first_received_date' => Date("Y-m-d", strtotime($firstreceived_date)),
                        'last_updated_date' => Date("Y-m-d", strtotime($lastchanged_date)),
                        'last_verified_date' => Date("Y-m", strtotime($verification_date)) . "-01",
                        'study_start_date' => Date("Y-m", strtotime($start_date)) . "-01",
                        'study_completion_date' => Date("Y-m", strtotime($study_completion_date)) . "-01",
                        'primary_completion_date' => Date("Y-m", strtotime($primary_completion_date)) . "-01",
                        'study_type' => $study_type,
                        'study_design' => $study_design,
                        'enrollment' => $enrollment,
                        'primary_outcome_text1' => $primary_text1,
                        'primary_outcome_text2' => $primary_text2,
                        'primary_outcome_text3' => $primary_text3,
                        'primary_outcome_res1' => $primary_res1,
                        'primary_outcome_res2' => $primary_res2,
                        'primary_outcome_res3' => $primary_res3,
                        'clinical_url' => $url,
                        'serious_adv_event_val' => $serious_adv_val,
                        'other_adv_event_val' => $other_adv_val,
                        'detailed_serious_adverse' => $implode_serious_cnt,
                        'detailed_other_adverse' => $implode_other_cnt,
                        'official_title' => $official_title,
                        'brief_title' => $brief_title,
                        'brief_summary' => $brief_summary,
                        'detailed_desc' => $detailed_description,
                        'detailed_intervention' => $detailed_intervention,
                        'primary_measure_def' => $primary_measure_def,
                        'primary_measure_value' => $primary_measure_value,
                        'detailed_outcome_measure' => $detailed_outcome_measure,
                        'drug_id' => $drug_id,
                        'condition_id' => $condition_id,
                        'sponsor_id' => $sponsor_id,
                        'secondary_measure_def' => $secondary_measure_def,
                        'eligibility_criteria' => $eligibility_criteria,
                        'age' => $age,
                        'eligibility_gender' => $eligibility_gender,
                        'healthy_volunteers' => $healthy_volunteers,
                        'location_country' => $location_country,
                        'isActive' => 1);
//                    echo "<pre>";
//                    var_dump($ClinicalTrialInsertArray);
//                    echo "</pre>";

                    $ClinicalTrialModel->ClinicalTrialInsert($ClinicalTrialInsertArray);
                } else {
                    $ClinicalTrialModel->ClinicalTrialUpdate($rss_feed_id, $nct_id, $title, $collaborator_name, $phase_id, $intervention_implode, $status_id, $firstreceived_date, $lastchanged_date, $verification_date, $start_date, $study_completion_date, $primary_completion_date, $study_type, $study_design, $enrollment, $primary_text1, $primary_text2, $primary_text3, $primary_res1, $primary_res2, $primary_res3, $url, $implode_serious_cnt, $implode_other_cnt, $serious_adv_val, $other_adv_val, $official_title, $brief_title, $brief_summary, $detailed_description, $detailed_intervention, $primary_measure_def, $primary_measure_value, $detailed_outcome_measure, $drug_id, $condition_id, $sponsor_id, $secondary_measure_def, $eligibility_criteria, $age, $eligibility_gender, $healthy_volunteers, $location_country);
                }
//                exit();
            }
        }
    }

    public function adverseEvent($html, $adverse_link) {

        $adverse_table_a = $this->DOM($html);
        $cnt = file_get_html($adverse_link);
        $ad_result_next = array();
        //fetching serious adverse header name from html content using class name of html tag
        $adverse_table_spans = $adverse_table_a->query("//*[contains(concat(' ', normalize-space(@class), ' '), 'header3 brt bold_events_color')]");

        $adverse_current_div = $adverse_table_spans->item(0);
        $ad_result_next = array();
        if (isset($adverse_current_div->parentNode->parentNode)) {
            $header = $adverse_current_div->parentNode;
            foreach ($header->childNodes as $child) {
                $nodeValue = preg_replace('#\x{00a0}#', '', utf8_decode(preg_replace("/\s/", '', $child->nodeValue)));
                $ad_result_next[] = $nodeValue;
            }
        }

        $explode_array = array_values(array_filter($ad_result_next, function($val) {
                    return $val !== '';
                }));
//var_dump($explode_array);
//exit();
        //fetching serious adverse total values from html content using class name of html tag
        $result_second_element = array();
        $adverse_table_spans = $adverse_table_a->query("//*[contains(concat(' ', normalize-space(@class), ' '), 'header3 brt bold_events_color')]");

        $adverse_current_div = $adverse_table_spans->item(0);

        if (isset($adverse_current_div->parentNode->parentNode)) {
            $secondelement = $adverse_current_div->parentNode->parentNode;

            $i = 0;
            foreach ($secondelement->childNodes as $child) {
                if ($i == 2) {
                    $result_second_element[] = $secondelement->ownerDocument->saveHTML($child);
                    break;
                } else if ($i == 0 || $i == 1) {
                    $i++;
                }
            }
        }

        $implode_val_array = implode("<br/>", $result_second_element);
        $exp_array = explode("<br/>", preg_replace('#\x{00a0}#', '<br/>', utf8_decode(preg_replace("/\s/", '', preg_replace("&# participants affected / at risk&", "", strip_tags($implode_val_array))))));

        $explode_val_array = array_values(array_filter($exp_array, function($val) {
                    return $val !== '';
                }));
        //echo "<pre>";var_dump($explode_val_array);echo "</pre>";
        $odd = array();
        $even = array();
        foreach ($explode_val_array as $k => $v) {
            if ($k % 2 == 0) {
                $even[] = $v;
            } else {
                $odd[] = $v;
            }
        }
//        echo "<pre>";var_dump($even);echo "</pre>";
//        echo "<pre>";var_dump($odd);echo "</pre>";
        $second_elm_val = array();
        for ($index = 0; $index < count($odd); $index++) {
            $adverse_val = $odd[$index];
            $second_elm_val[] = preg_replace('/%/', '', str_replace(")", "", str_replace("(", "", $adverse_val)));
        }

        $two_array = array($explode_array, $second_elm_val);
        return $two_array;
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

    public function saveHTML($html, $class, $item) {

        $event_a = $this->DOM($html);
        $result_element = array();
        if (!is_null($event_a)) {
            $event_spans = $event_a->query("//*[contains(concat(' ', normalize-space(@class), ' '), '$class')]");
            $nextelement = $event_spans->item($item);

            if (isset($nextelement->childNodes)) {
                foreach ($nextelement->childNodes as $child) {
                    $result_element[] = $nextelement->ownerDocument->saveHTML($child);
                }
            }
            return $result_element;
        } else {
            return $result_element;
        }
    }

    public function addTableClass($html) {

        if (!empty($html)) {
            $DOM = new \DOMDocument();
            libxml_use_internal_errors(true);
            $DOM->loadHTML($html);
            libxml_use_internal_errors(false);
            $items = $DOM->getElementsByTagName('table');
            for ($i = 0; $i < $items->length; $i++) {
                $img = $items->item($i);
                $img->removeAttribute('class');
                $img->setAttribute('class', "table table-bordered no-margin");
            }
            $html = $DOM->saveHTML();
            return $html;
        } else {
            return null;
        }
    }

    public function addTableProperties($html) {

        if (!empty($html)) {
            $DOM = new \DOMDocument();
            libxml_use_internal_errors(true);
            $DOM->loadHTML($html);
            libxml_use_internal_errors(false);

            $table_items = $DOM->getElementsByTagName('table');
            $table = $table_items->item(0);
            $table->setAttribute('class', "table table-bordered no-margin");


            $items = $DOM->getElementsByTagName('tr');
            for ($i = 0; $i < $items->length; $i++) {
                $tr = $items->item($i);
                $tr->setAttribute('style', "border:1px solid #000 !important;");
            }

            $th_items = $DOM->getElementsByTagName('th');
            for ($j = 0; $j < $th_items->length; $j++) {
                $th = $th_items->item($j);
                $th->setAttribute('class', "bg-blue-custom");
                $th->setAttribute('align', "left");
            }

            $td_items = $DOM->getElementsByTagName('td');
            for ($k = 0; $k < $td_items->length; $k++) {
                $td = $td_items->item($k);
                $td->setAttribute('class', "text-black");
                $td->setAttribute('style', "border:1px solid #000 !important;");
            }
            $html = $DOM->saveHTML();
            return $html;
        } else {
            return null;
        }
    }

}
