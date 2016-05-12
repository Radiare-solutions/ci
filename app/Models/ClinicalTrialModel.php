<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class ClinicalTrialModel extends Eloquent {

    protected $collection = 'ci_clinical_trial';
    protected $sponsor = array();
    protected $fillable = array('rss_feed_id', 'identifier', 'clinical_title', 'collaborator', 'phase', 'intervention', 'status_id', 'first_received_date',
        'last_updated_date', 'last_verified_date', 'study_start_date', 'study_completion_date', 'primary_completion_date', 'study_type',
        'study_design', 'enrollment', 'primary_outcome_text1', 'primary_outcome_text2', 'primary_outcome_text3', 'primary_outcome_res1', 'primary_outcome_res2',
        'primary_outcome_res3', 'clinical_url', 'serious_adv_event_val', 'other_adv_event_val', 'detailed_serious_adverse', 'detailed_other_adverse',
        'official_title', 'brief_title', 'brief_summary', 'detailed_desc', 'detailed_intervention', 'primary_measure_def', 'primary_measure_value',
        'detailed_outcome_measure', 'drug_id', 'condition_id', 'sponsor_id', 'secondary_measure_def', 'eligibility_criteria', 'age', 'eligibility_gender', 'healthy_volunteers', 'location_country', 'isActive');

    public function ClinicalTrialInsert(
    $rss_feed_id, $nct_id, $title, $collaborator_name, $phase, $intervention_implode, $status_id, $firstreceived_date, $lastchanged_date, $verification_date, $start_date, $study_completion_date, $primary_completion_date, $study_type, $study_design, $enrollment, $primary_text1, $primary_text2, $primary_text3, $primary_res1, $primary_res2, $primary_res3, $url, $implode_serious_cnt, $implode_other_cnt, $serious_adv_val, $other_adv_val, $official_title, $brief_title, $brief_summary, $detailed_description, $detailed_intervention, $primary_measure_def, $primary_measure_value, $detailed_outcome_measure, $drug_id, $condition_id, $sponsor_id, $secondary_measure_def, $eligibility_criteria, $age, $eligibility_gender, $healthy_volunteers, $location_country) {

        $clinicalTrialarray = array('rss_feed_id' => $rss_feed_id,
            'identifier' => $nct_id,
            'clinical_title' => $title,
            'collaborator' => $collaborator_name,
            'phase' => $phase,
            'intervention' => $intervention_implode,
            'status_id' => $status_id,
            'first_received_date' => $firstreceived_date,
            'last_updated_date' => $lastchanged_date,
            'last_verified_date' => $verification_date,
            'study_start_date' => $start_date,
            'study_completion_date' => $study_completion_date,
            'primary_completion_date' => $primary_completion_date,
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


        ClinicalTrialModel::create($clinicalTrialarray);
    }

    public function ClinicalTrialUpdate($rss_feed_id, $nct_id, $title, $collaborator_name, $phase, $intervention_implode, $status_id, $firstreceived_date, $lastchanged_date, $verification_date, $start_date, $study_completion_date, $primary_completion_date, $study_type, $study_design, $enrollment, $primary_text1, $primary_text2, $primary_text3, $primary_res1, $primary_res2, $primary_res3, $url, $implode_serious_cnt, $implode_other_cnt, $serious_adv_val, $other_adv_val, $official_title, $brief_title, $brief_summary, $detailed_description, $detailed_intervention, $primary_measure_def, $primary_measure_value, $detailed_outcome_measure, $drug_id, $condition_id, $sponsor_id, $secondary_measure_def, $eligibility_criteria, $age, $eligibility_gender, $healthy_volunteers, $location_country) {

        $clinicalTrialarray = array('rss_feed_id' => $rss_feed_id,
            'identifier' => $nct_id,
            'clinical_title' => $title,
            'collaborator' => $collaborator_name,
            'phase' => $phase,
            'intervention' => $intervention_implode,
            'status_id' => $status_id,
            'first_received_date' => $firstreceived_date,
            'last_updated_date' => $lastchanged_date,
            'last_verified_date' => $verification_date,
            'study_start_date' => $start_date,
            'study_completion_date' => $study_completion_date,
            'primary_completion_date' => $primary_completion_date,
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

        ClinicalTrialModel::where("clinical_url", "=", $url)->update($clinicalTrialarray);
    }

    public function FetchClinicalTrial($url) {
        $ClinicalTrialModel = ClinicalTrialModel::where("clinical_url", '=', $url)->first();
        return $ClinicalTrialModel;
    }

    public function getFilteredResults($request, $page=0, $field='clinical_title', $order='asc') {
        $this->field = $field;
        $this->order = $order;
        $this->page = $page;
        if($this->order == 'asc')
            $this->order = -1;
        else 
            $this->order = 1;
        if (!empty($request->sponsor)) {
            foreach ($request->sponsor as $sponsorValue) {
                array_push($this->sponsor, new \MongoDB\BSON\ObjectId($sponsorValue));
            }
            $result = \Illuminate\Support\Facades\DB::collection($this->collection)->raw(function($collection) {
                return $collection->aggregate(array(
                            array(
                                '$match' => array(
                                    '$or' => array(
                                        array('sponsor_id' => array('$in' => ($this->sponsor))),
                                    ),
                                ),
                            ),
                            array('$project' => array(
                                    '_id' => 1,
                                    'clinical_title' => 1,
                                    'phase' => 1,
                                    'status_id' => 1,
                                    'condition_id' => 1,
                                    'intervention' => 1,
                                )),       
                            array('$skip' => ($this->page * 5)),
                            array('$limit' => 5),
                            array('$sort' => array($this->field => $this->order))
                ));
            });
            $details = array();
            foreach ($result as $query) {
                $temp['id'] = (string) $query['_id'];
                $temp['title'] = $query['clinical_title'];
                $temp['phase'] = $query['phase'];
                $conditionObj = ConditionModel::find($query['condition_id']);
                $temp['condition_name'] = $conditionObj['attributes']['condition_name'];
                $statusObj = StatusModel::find($query['status_id']);
                $temp['status_name'] = $statusObj['attributes']['status_name'];
                $temp['intervention'] = $query['intervention'];
                array_push($details, $temp);
            }
            $details['total'] = $this->getTotalFilteredResults($this->sponsor);
            return $details;
        }
    }

    public function getTotalFilteredResults($request) {        
            $result = \Illuminate\Support\Facades\DB::collection($this->collection)->raw(function($collection) {
                return $collection->aggregate(array(
                            array(
                                '$match' => array(
                                    '$or' => array(
                                        array('sponsor_id' => array('$in' => ($this->sponsor))),
                                    ),
                                ),
                            ),
                            array('$project' => array(
                                    '_id' => 1,
                            )),
                ));
            });
            $details = array();
            foreach ($result as $query) {
                $temp['id'] = (string) $query['_id'];
                array_push($details, $temp);
            }
            return sizeof($details);
        }
}
