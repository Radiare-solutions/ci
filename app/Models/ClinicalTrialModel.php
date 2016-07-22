<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class ClinicalTrialModel extends Eloquent {

    protected $collection = 'ci_clinical_trial';
    protected $phase = array();
    protected $sponsor = array();
    protected $status = array();
    protected $status_id = array();
    protected $value = array();

    public function ClinicalTrialInsert($ClinicalTrialInsertArray) {
        ClinicalTrialModel::insert($ClinicalTrialInsertArray);
    }

    public function ClinicalTrialUpdate($rss_feed_id, $nct_id, $title, $collaborator_name, $phase_id, $intervention_implode, $status_id, $firstreceived_date, $lastchanged_date, $verification_date, $start_date, $study_completion_date, $primary_completion_date, $study_type, $study_design, $enrollment, $primary_text1, $primary_text2, $primary_text3, $primary_res1, $primary_res2, $primary_res3, $url, $implode_serious_cnt, $implode_other_cnt, $serious_adv_val, $other_adv_val, $official_title, $brief_title, $brief_summary, $detailed_description, $detailed_intervention, $primary_measure_def, $primary_measure_value, $detailed_outcome_measure, $drug_id, $condition_id, $sponsor_id, $secondary_measure_def, $eligibility_criteria, $age, $eligibility_gender, $healthy_volunteers, $location_country) {

        $clinicalTrialarray = array('rss_feed_id' => $rss_feed_id,
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

        ClinicalTrialModel::where("clinical_url", "=", $url)->update($clinicalTrialarray);
    }

    public function getSponsorDashboardResults() {
        $result = \Illuminate\Support\Facades\DB::collection($this->collection)->raw(function($collection) {
            return $collection->aggregate(array(
                        array(
                            '$match' => array(
                                '$and' => array(
                                    array('isActive' => 1),
                                ),
                            ),
                        ),
                        array(
                            '$group' => array(
                                '_id' => '$sponsor_id',
                                'count' => array('$sum' => 1),
                            ),
                        ),
                        array('$project' => array(
                                '_id' => 1,
                                'sponsor_id' => '$_id',
                                'count' => 1,
                            )),
                        array('$sort' => array('count' => -1)),
                        array('$limit' => 10),
            ));
        });
        $details = array();
        foreach ($result as $query) {
            $temp['url'] = "list_studies/sponsor_id/" . (string) $query['_id'];
            $sponsorObj = SponsorModel::find($query['sponsor_id']);
            $temp['y'] = $sponsorObj['attributes']['sponsor_name'];
            $temp['a'] = $query['count'];
            $test = array('y' => $temp['y'], 'a' => $temp['a'], 'url' => $temp['url']);
            array_push($details, $test);
        }
        return $details;
    }

    public function getPhaseDashboardResults() {
        $result = \Illuminate\Support\Facades\DB::collection($this->collection)->raw(function($collection) {
            return $collection->aggregate(array(
                        array(
                            '$match' => array(
                                '$and' => array(
                                    array('isActive' => 1)
                                )
                            ),
                        ),
                        array(
                            '$group' => array(
                                '_id' => '$phase_id',
                                'count' => array('$sum' => 1),
                            ),
                        ),
                        array('$project' => array(
                                '_id' => 1,
                                'phase_id' => '$_id',
                                'count' => 1,
                            )),
                        array('$sort' => array('count' => -1)),
                        array('$limit' => 5),
            ));
        });
        $details = array();
        foreach ($result as $query) {
            $temp['url'] = "list_studies/phase_id/" . (string) $query['_id'];
            $phaseObj = PhaseModel::find($query['phase_id']);
            if ($phaseObj['attributes']['phase_name'] != 'N/a') {
                $temp['y'] = $phaseObj['attributes']['phase_name'];
                $temp['a'] = $query['count'];
                $test = array($temp['y'], $temp['a'], $temp['url']);
                array_push($details, $test);
            }
        }
        return $details;
    }

    public function getStatusDashboardResults() {
        $result = \Illuminate\Support\Facades\DB::collection($this->collection)->raw(function($collection) {
            return $collection->aggregate(array(
                        array(
                            '$match' => array(
                                '$and' => array(
                                    array('isActive' => 1),
                                ),
                            ),
                        ),
                        array(
                            '$group' => array(
                                '_id' => '$status_id',
                                'count' => array('$sum' => 1),
                            ),
                        ),
                        array('$project' => array(
                                '_id' => 1,
                                'status_id' => '$_id',
                                'count' => 1,
                            )),
                        array('$sort' => array('count' => -1)),
                            // array('$limit' => 5),
            ));
        });
        $details = array();
        $totalStatusRecords = 0;
        foreach ($result as $query) {
            $temp['url'] = "list_studies/status_id/" . (string) $query['_id'];
            $statusObj = StatusModel::find($query['status_id']);
            $temp['name'] = $statusObj['attributes']['status_name'];
            $temp['value'] = $query['count'];
            $totalStatusRecords+=$temp['value'];
            array_push($details, $temp);
        }
        return array('details' => $details, 'totalStatusRecords' => $totalStatusRecords);
    }

    public function getConditionDashboardResults() {
        $result = \Illuminate\Support\Facades\DB::collection($this->collection)->raw(function($collection) {
            return $collection->aggregate(array(
                        array(
                            '$match' => array(
                                '$and' => array(
                                    array('isActive' => 1),
                                ),
                            ),
                        ),
                        array(
                            '$group' => array(
                                '_id' => '$condition_id',
                                'count' => array('$sum' => 1),
                            ),
                        ),
                        array('$project' => array(
                                '_id' => 1,
                                'condition_id' => '$_id',
                                'count' => 1,
                            )),
                        array('$sort' => array('count' => -1)),
                        array('$limit' => 5),
            ));
        });
        $details = array();
        foreach ($result as $query) {
            $temp['link'] = "list_studies/condition_id/" . (string) $query['_id'];
            $conditionObj = ConditionModel::find($query['condition_id']);
            $temp['text'] = $conditionObj['attributes']['condition_name'];
            $temp['weight'] = $query['count'];
            array_push($details, $temp);
        }
        return $details;
    }

    public function getDrugDashboardResults() {
        $result = \Illuminate\Support\Facades\DB::collection($this->collection)->raw(function($collection) {
            return $collection->aggregate(array(
                        array('$unwind' => '$drug_id'),
                        array('$unwind' => '$drug_id._id'),
                        array(
                            '$match' => array(
                                '$and' => array(
                                    array('isActive' => 1),
                                ),
                            ),
                        ),
                        array(
                            '$group' => array(
                                '_id' => '$drug_id._id',
                                'count' => array('$sum' => 1),
                            ),
                        ),
                        array('$project' => array(
                                '_id' => 1,
                                'drug_id' => '$_id',
                                'count' => 1,
                            )),
                        array('$sort' => array('count' => -1)),
                        array('$limit' => 20),
            ));
        });
        $details = array();
        foreach ($result as $query) {
            $temp['url'] = "list_studies/drug_id/" . (string) $query['_id'];
            $drugObj = DrugModel::find($query['drug_id']);
            $temp['name'] = $drugObj['attributes']['drug_name'];
            $temp['value'] = $query['count'];
            array_push($details, $temp);
        }

        return $details;
    }

    public function getEstimatedCompletionDashboardResults() {
        $result = \Illuminate\Support\Facades\DB::collection($this->collection)->raw(function($collection) {
            return $collection->aggregate(array(
                        array(
                            '$match' => array(
                                '$and' => array(
                                    array('isActive' => 1),
                                    array('study_completion_date' => array('$ne' => '')),
                                ),
                            ),
                        ),
                        array(
                            '$group' => array(
                                '_id' => array('$substr' => array('$study_completion_date', 0, 4)),
                                'count' => array('$sum' => 1),
                            ),
                        ),
                        array('$project' => array(
                                '_id' => 1,
                                'study_completion_date' => '$_id',
                                'count' => 1,
                            )),
                        array('$sort' => array('study_completion_date' => 1)),
                        array('$limit' => 7),
            ));
        });
        $details = array();
        foreach ($result as $query) {
            $temp['url'] = "list_studies/study_completion_date/" . (string) $query['_id'];
            $temp['x'] = $query['study_completion_date'];
            $temp['y'] = $query['count'];
            array_push($details, $temp);
        }
        return $details;
    }

    public function getEstimatedCompletionForCurrentYear() {
        $result = \Illuminate\Support\Facades\DB::collection($this->collection)->raw(function($collection) {
            return $collection->aggregate(array(
                        array(
                            '$match' => array(
                                '$and' => array(
                                    array('isActive' => 1),
                                    array('study_completion_date' => array('$eq' => 2016)),
                                ),
                            ),
                        ),
                        array(
                            '$group' => array(
                                '_id' => array('$substr' => array('$study_completion_date', 0, 4)),
                                'count' => array('$sum' => 1),
                            ),
                        ),
                        array('$project' => array(
                                '_id' => 1,
                                'study_completion_date' => '$_id',
                                'count' => 1,
                            )),
                        array('$sort' => array('study_completion_date' => 1)),
                        array('$limit' => 7),
            ));
        });
        $details = array();
        foreach ($result as $query) {
            $temp['url'] = "list_studies/study_completion_date/" . (string) $query['_id'];
            $temp['x'] = $query['study_completion_date'];
            $temp['y'] = $query['count'];
            array_push($details, $temp);
        }
        return $details;
    }

    public function FetchClinicalTrial($url) {
        $ClinicalTrialModel = ClinicalTrialModel::where("clinical_url", '=', $url)->count();
        return $ClinicalTrialModel;
    }

    public function loadAdverseValues($id) {
        $ClinicalTrialModel = ClinicalTrialModel::find(new \MongoDB\BSON\ObjectId($id));
        return $ClinicalTrialModel;
    }

    public function loadClinicalTrial($skip, $limit, $field = 'clinical_title', $order = 1) {
        if ($skip == 0 && $limit == 0) {
            $model = ClinicalTrialModel::orderBy($field, $order)->get();
        } else {
            $model = ClinicalTrialModel::orderBy($field, $order)->skip($skip)->take($limit)->get();
        }
        return $model;
    }

    public function loadClinicalTrialByParam($skip, $limit, $search_param, $field = 'clinical_title', $order = 1) {
        if ($skip == 0 && $limit == 0) {
            $skip_arr = "";
            $limit_arr = "";
        } else {
            $skip_arr = array('$skip' => $skip);
            $limit_arr = array('$limit' => $limit);
        }

        $in_array = array(
            array('$project' => array('est_year' => array('$substr' => array('$study_completion_date', 0, 4)),
                    'condition_id' => 1, 'phase_id' => 1, 'intervention' => 1, 'clinical_title' => 1, 'status_id' => 1, '_id' => 1, 'study_start_date' => 1,
                    'study_completion_date' => 1)),
            array('$match' => $search_param),
            array('$group' => array("_id" => '$_id', "condition_id" => array('$first' => '$condition_id'), "status_id" => array('$first' => '$status_id')
                    , "phase_id" => array('$first' => '$phase_id'), "intervention" => array('$first' => '$intervention')
                    , "clinical_title" => array('$first' => '$clinical_title'), "study_completion_date" => array('$first' => '$study_completion_date')
                    , "study_start_date" => array('$first' => '$study_start_date'))),
            array('$sort' => array($field => $order)),
            $skip_arr, $limit_arr);

        $ob = ClinicalTrialModel::raw()->aggregate(array_filter($in_array));
        return $ob;
    }

}
