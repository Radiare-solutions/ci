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
    protected $fillable = array('rss_feed_id', 'identifier', 'clinical_title', 'collaborator', 'phase_id', 'intervention', 'status_id', 'first_received_date',
        'last_updated_date', 'last_verified_date', 'study_start_date', 'study_completion_date', 'primary_completion_date', 'study_type',
        'study_design', 'enrollment', 'primary_outcome_text1', 'primary_outcome_text2', 'primary_outcome_text3', 'primary_outcome_res1', 'primary_outcome_res2',
        'primary_outcome_res3', 'clinical_url', 'serious_adv_event_val', 'other_adv_event_val', 'detailed_serious_adverse', 'detailed_other_adverse',
        'official_title', 'brief_title', 'brief_summary', 'detailed_desc', 'detailed_intervention', 'primary_measure_def', 'primary_measure_value',
        'detailed_outcome_measure', 'drug_id', 'condition_id', 'sponsor_id', 'secondary_measure_def', 'eligibility_criteria', 'age', 'eligibility_gender', 'healthy_volunteers', 'location_country', 'isActive');

    public function ClinicalTrialInsert(
    $rss_feed_id, $nct_id, $title, $collaborator_name, $phase_id, $intervention_implode, $status_id, $firstreceived_date, $lastchanged_date, $verification_date, $start_date, $study_completion_date, $primary_completion_date, $study_type, $study_design, $enrollment, $primary_text1, $primary_text2, $primary_text3, $primary_res1, $primary_res2, $primary_res3, $url, $implode_serious_cnt, $implode_other_cnt, $serious_adv_val, $other_adv_val, $official_title, $brief_title, $brief_summary, $detailed_description, $detailed_intervention, $primary_measure_def, $primary_measure_value, $detailed_outcome_measure, $drug_id, $condition_id, $sponsor_id, $secondary_measure_def, $eligibility_criteria, $age, $eligibility_gender, $healthy_volunteers, $location_country) {

        $clinicalTrialarray = array('rss_feed_id' => $rss_feed_id,
            'identifier' => $nct_id,
            'clinical_title' => $title,
            'collaborator' => $collaborator_name,
            'phase_id' => $phase_id,
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

    public function ClinicalTrialUpdate($rss_feed_id, $nct_id, $title, $collaborator_name, $phase_id, $intervention_implode, $status_id, $firstreceived_date, $lastchanged_date, $verification_date, $start_date, $study_completion_date, $primary_completion_date, $study_type, $study_design, $enrollment, $primary_text1, $primary_text2, $primary_text3, $primary_res1, $primary_res2, $primary_res3, $url, $implode_serious_cnt, $implode_other_cnt, $serious_adv_val, $other_adv_val, $official_title, $brief_title, $brief_summary, $detailed_description, $detailed_intervention, $primary_measure_def, $primary_measure_value, $detailed_outcome_measure, $drug_id, $condition_id, $sponsor_id, $secondary_measure_def, $eligibility_criteria, $age, $eligibility_gender, $healthy_volunteers, $location_country) {

        $clinicalTrialarray = array('rss_feed_id' => $rss_feed_id,
            'identifier' => $nct_id,
            'clinical_title' => $title,
            'collaborator' => $collaborator_name,
            'phase_id' => $phase_id,
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

    public function getFilteredResults($request, $page = 0, $field = 'clinical_title', $order = 'asc') {
        $this->field = $field;
        $this->order = $order;
        $this->page = $page;
        if ($this->order == 'asc')
            $this->order = -1;
        else
            $this->order = 1;
        if (!empty($request->status)) {
            foreach ($request->status as $statusValue) {
                if ($statusValue == "all") {
                    array_push($this->status, ($statusValue));
                    $this->pipeline = '$ne';
                    break;
                } else {
                    array_push($this->status, new \MongoDB\BSON\ObjectId($statusValue));
                    $this->pipeline = '$in';
                }

                if (in_array("all", $request->status))
                    $this->status = "all";
            }
        }
        else {
            $this->status = "all";
            $this->pipeline = '$ne';
        }
        if (!empty($request->phase)) {
            $this->phasePipeline = '$in';
            foreach ($request->phase as $phaseValue) {
                array_push($this->phase, new \MongoDB\BSON\ObjectId($phaseValue));
            }
        } else {
            $this->phase = "all";
            $this->phasePipeline = '$ne';
        }
        if (!empty($request->sponsor)) {
            $this->sponsorPipeline = '$in';
            foreach ($request->sponsor as $sponsorValue) {
                array_push($this->sponsor, new \MongoDB\BSON\ObjectId($sponsorValue));
            }
        } else {
            $this->sponsor = "all";
            $this->sponsorPipeline = '$ne';
        }
        if (!empty($request->condition)) {
            $this->conditionPipeline = '$in';
            foreach ($request->condition as $conditionValue) {
                array_push($this->condition, new \MongoDB\BSON\ObjectId($conditionValue));
            }
        } else {
            $this->condition = "all";
            $this->conditionPipeline = '$ne';
        }
        $result = \Illuminate\Support\Facades\DB::collection($this->collection)->raw(function($collection) {
            return $collection->aggregate(array(
                        array(
                            '$match' => array(
                                '$and' => array(
                                    array('phase_id' => array($this->phasePipeline => ($this->phase))),
                                    array('sponsor_id' => array($this->sponsorPipeline => ($this->sponsor))),
                                    array('condition_id' => array($this->conditionPipeline => ($this->condition))),
                                    array('status_id' => array($this->pipeline => ($this->status))),
                                ),
                            ),
                        ),
                        array('$project' => array(
                                '_id' => 1,
                                'clinical_title' => 1,
                                'phase_id' => 1,
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
            $conditionObj = ConditionModel::find($query['condition_id']);
            $temp['condition_name'] = $conditionObj['attributes']['condition_name'];
            $statusObj = StatusModel::find($query['status_id']);
            $temp['status_name'] = $statusObj['attributes']['status_name'];
            $phaseObj = PhaseModel::find($query['phase_id']);
            $temp['phase_name'] = $phaseObj['attributes']['phase_name'];
            $temp['intervention'] = $query['intervention'];
            array_push($details, $temp);
        }
        $details['total'] = $this->getTotalFilteredResults($request);
        $datas = $this->getFilterValuesByFilter($request);

        // $details['phaseData'] = $datas['phaseData'];
        // array_push($details['phaseData'], $datas['phaseData']);
        return array(
            'details' => $details,
            // $details,
            'total' => $details['total'],
            'phaseData' => $datas['phaseData'],
            'conditionData' => $datas['conditionData'],
            'drugData' => $datas['drugData'],
            'sponsorData' => $datas['sponsorData'],
            'statusData' => $datas['statusData'],
        );
        //}
    }

    public function getFilterValuesByFilter($request, $page = 0, $field = 'clinical_title', $order = 'asc') {
//        $this->field = $field;
//        $this->order = $order;
//        $this->page = $page;
//        if ($this->order == 'asc')
//            $this->order = -1;
//        else
//            $this->order = 1;
        if (!empty($request->status)) {
            foreach ($request->status as $statusValue) {
                if ($statusValue == "all") {
                    array_push($this->status, ($statusValue));
                    $this->pipeline = '$ne';
                    break;
                } else {
                    array_push($this->status, new \MongoDB\BSON\ObjectId($statusValue));
                    $this->pipeline = '$in';
                }

                if (in_array("all", $request->status))
                    $this->status = "all";
            }
        }
        else {
            $this->status = "all";
            $this->pipeline = '$ne';
        }
        if (!empty($request->phase)) {
            $this->phasePipeline = '$in';
            foreach ($request->phase as $phaseValue) {
                array_push($this->phase, new \MongoDB\BSON\ObjectId($phaseValue));
            }
        } else {
            $this->phase = "all";
            $this->phasePipeline = '$ne';
        }
        if (!empty($request->sponsor)) {
            $this->sponsorPipeline = '$in';
            foreach ($request->sponsor as $sponsorValue) {
                array_push($this->sponsor, new \MongoDB\BSON\ObjectId($sponsorValue));
            }
        } else {
            $this->sponsor = "all";
            $this->sponsorPipeline = '$ne';
        }
        if (!empty($request->condition)) {
            $this->conditionPipeline = '$in';
            foreach ($request->condition as $conditionValue) {
                array_push($this->condition, new \MongoDB\BSON\ObjectId($conditionValue));
            }
        } else {
            $this->condition = "all";
            $this->conditionPipeline = '$ne';
        }
        $result = \Illuminate\Support\Facades\DB::collection($this->collection)->raw(function($collection) {
            return $collection->aggregate(array(
                        array(
                            '$match' => array(
                                '$and' => array(
                                    array('phase_id' => array($this->phasePipeline => ($this->phase))),
                                    array('sponsor_id' => array($this->sponsorPipeline => ($this->sponsor))),
                                    array('status_id' => array($this->pipeline => ($this->status))),
                                    array('condition_id' => array($this->conditionPipeline => ($this->condition))),
                                ),
                            ),
                        ),
                        array('$project' => array(
                                '_id' => 1,
                                'phase_id' => 1,
                                'status_id' => 1,
                                'condition_id' => 1,
                                'sponsor_id' => 1,
                                'drug_id' => 1,
                            )),
            ));
        });
        $details = array();
        $phase = array();
        $condition = array();
        $sponsor = array();
        $drug = array();
        $status = array();
        foreach ($result as $query) {
            array_push($phase, (string) $query['phase_id']);
            array_push($condition, (string) $query['condition_id']);
            array_push($sponsor, (string) $query['sponsor_id']);
            array_push($drug, (string) $query['drug_id']);
            array_push($status, (string) $query['status_id']);
        }
        $status = array_count_values($status);
        $tempStatus = array();
        foreach ($status as $key => $value) {
            $status['status_id'] = (string) $key;
            $status['status_count'] = $value;
            $statusObj = StatusModel::find(new \MongoDB\BSON\ObjectId($key));
            $status['status_name'] = $statusObj['status_name'];
            array_push($tempStatus, $status);
        }
        $phase = array_count_values($phase);
        $tempPhase = array();
        foreach ($phase as $key => $value) {
            $phase['phase_id'] = (string) $key;
            $phase['phase_count'] = $value;
            $phaseObj = PhaseModel::find(new \MongoDB\BSON\ObjectId($key));
            $phase['phase_name'] = $phaseObj['phase_name'];
            array_push($tempPhase, $phase);
        }
        $condition = array_count_values($condition);
        $tempCondition = array();
        foreach ($condition as $key => $value) {
            $condition['condition_id'] = (string) $key;
            $condition['condition_count'] = $value;
            $conditionObj = ConditionModel::find(new \MongoDB\BSON\ObjectId($key));
            $condition['condition_name'] = $conditionObj['condition_name'];
            array_push($tempCondition, $condition);
        }
        $sponsor = array_count_values($sponsor);
        $tempSponsor = array();
        foreach ($sponsor as $key => $value) {
            $sponsor['sponsor_id'] = (string) $key;
            $sponsor['sponsor_count'] = $value;
            $sponsorObj = SponsorModel::find(new \MongoDB\BSON\ObjectId($key));
            $sponsor['sponsor_name'] = $sponsorObj['sponsor_name'];
            array_push($tempSponsor, $sponsor);
        }
        $drug = array_count_values($drug);
        $tempDrug = array();
        foreach ($drug as $key => $value) {
            $drug['drug_id'] = (string) $key;
            $drug['drug_count'] = $value;
            // $drugObj = DrugModel::find(new \MongoDB\BSON\ObjectId($key));
            // $drug['drug_name'] = $drugObj['drug_name'];
            array_push($tempDrug, $drug);
        }
        return array(
            'phaseData' => json_encode($tempPhase),
            'conditionData' => json_encode($tempCondition),
            'sponsorData' => json_encode($tempSponsor),
            'drugData' => json_encode($tempDrug),
            'statusData' => json_encode($tempStatus),
        );
    }

    public function getTotalFilteredResults($request) {
        if (!empty($request->status)) {
            foreach ($request->status as $statusValue) {
                if ($statusValue == "all") {
                    array_push($this->status, ($statusValue));
                    $this->pipeline = '$ne';

                    break;
                } else {
                    array_push($this->status, new \MongoDB\BSON\ObjectId($statusValue));
                    $this->pipeline = '$in';
                }

                if (in_array("all", $request->status))
                    $this->status = "all";
            }
        }
        else {
            $this->status = "all";
            $this->pipeline = '$ne';
        }
        if (!empty($request->phase)) {
            $this->phasePipeline = '$in';
            foreach ($request->phase as $phaseValue) {
                array_push($this->phase, new \MongoDB\BSON\ObjectId($phaseValue));
            }
        } else {
            $this->phase = "all";
            $this->phasePipeline = '$ne';
        }
        if (!empty($request->sponsor)) {
            $this->sponsorPipeline = '$in';
            foreach ($request->sponsor as $sponsorValue) {
                array_push($this->sponsor, new \MongoDB\BSON\ObjectId($sponsorValue));
            }
        } else {
            $this->sponsor = "all";
            $this->sponsorPipeline = '$ne';
        }
        if (!empty($request->condition)) {
            $this->conditionPipeline = '$in';
            foreach ($request->condition as $conditionValue) {
                array_push($this->condition, new \MongoDB\BSON\ObjectId($conditionValue));
            }
        } else {
            $this->condition = "all";
            $this->conditionPipeline = '$ne';
        }
        $result = \Illuminate\Support\Facades\DB::collection($this->collection)->raw(function($collection) {
            return $collection->aggregate(array(
                        array(
                            '$match' => array(
                                '$and' => array(
                                    array('phase_id' => array($this->phasePipeline => ($this->phase))),
                                    array('sponsor_id' => array($this->sponsorPipeline => ($this->sponsor))),
                                    array('status_id' => array($this->pipeline => ($this->status))),
                                    array('condition_id' => array($this->conditionPipeline => ($this->condition))),
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
                                    array('isActive' => 1),
                                ),
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
            $temp['y'] = $phaseObj['attributes']['phase_name'];
            $temp['a'] = $query['count'];
            $test = array($temp['y'], $temp['a'], $temp['url']);
            array_push($details, $test);
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
                        array(
                            '$match' => array(
                                '$and' => array(
                                    array('isActive' => 1),
                                ),
                            ),
                        ),
                        array(
                            '$group' => array(
                                '_id' => '$drug_id',
                                'count' => array('$sum' => 1),
                            ),
                        ),
                        array('$project' => array(
                                '_id' => 1,
                                'drug_id' => '$_id',
                                'count' => 1,
                            )),
                        array('$sort' => array('count' => -1)),
                        array('$limit' => 10),
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
                                '_id' => array('$substr' => array('$study_completion_date', 4, -1)),
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

    public function displayFilter($field, $values, $page = 0) {
        $this->page = $page;
        $this->field = $field;
        if ($values == "all") {
            $this->value = "";
        } else {
            $this->value = new \MongoDB\BSON\ObjectId($values);
        }
        if ($this->page != 0)
            $this->page = $page;
        else
            $this->page = 0;
        $result = \Illuminate\Support\Facades\DB::collection($this->collection)->raw(function($collection) {
            return $collection->aggregate(array(
                        array(
                            '$match' => array(
                                '$and' => array(
                                    array('isActive' => 1),
                                    array($this->field => array('$in' => array($this->value))),
                                ),
                            ),
                        ),
                        array('$project' => array(
                                '_id' => 1,
                                $this->field => '$_id',
                                'count' => 1,
                                'clinical_title' => 1,
                                'phase_id' => 1,
                                'status_id' => 1,
                                'sponsor_id' => 1,
                                'drug_id' => 1,
                                'condition_id' => 1,
                                'intervention' => 1,
                            )),
                        array('$skip' => $this->page),
                        // array('$sort' => array($this->field => 1)),
                        array('$limit' => 5),
            ));
        });
        $details = array();
        $phase = array();
        $condition = array();
        $sponsor = array();
        $drug = array();
        $status = array();
        foreach ($result as $query) {
            $temp['url'] = (string) $query['_id'];
            array_push($phase, (string) $query['phase_id']);
            array_push($condition, (string) $query['condition_id']);
            array_push($sponsor, (string) $query['sponsor_id']);
            array_push($drug, (string) $query['drug_id']);
            array_push($status, (string) $query['status_id']);
            $temp['title'] = $query['clinical_title'];
            $conditionObj = ConditionModel::find($query['condition_id']);
            $temp['condition_name'] = $conditionObj['attributes']['condition_name'];
            $statusObj = StatusModel::find($query['status_id']);
            $temp['status_name'] = $statusObj['attributes']['status_name'];
            $phaseObj = PhaseModel::find($query['phase_id']);
            $temp['phase_name'] = $phaseObj['attributes']['phase_name'];
            $temp['intervention'] = $query['intervention'];
            array_push($details, $temp);
        }
        $status = array_count_values($status);
        $tempStatus = array();
        foreach ($status as $key => $value) {
            $status['status_id'] = $key;
            $status['status_count'] = $value;
            $statusObj = StatusModel::find(new \MongoDB\BSON\ObjectId($key));
            $status['status_name'] = $statusObj['status_name'];
            array_push($tempStatus, $status);
        }
        $phase = array_count_values($phase);
        $tempPhase = array();
        foreach ($phase as $key => $value) {
            $phase['phase_id'] = $key;
            $phase['phase_count'] = $value;
            $phaseObj = PhaseModel::find(new \MongoDB\BSON\ObjectId($key));
            $phase['phase_name'] = $phaseObj['phase_name'];
            array_push($tempPhase, $phase);
        }
        $condition = array_count_values($condition);
        $tempCondition = array();
        foreach ($condition as $key => $value) {
            $condition['condition_id'] = $key;
            $condition['condition_count'] = $value;
            $conditionObj = ConditionModel::find(new \MongoDB\BSON\ObjectId($key));
            $condition['condition_name'] = $conditionObj['condition_name'];
            array_push($tempCondition, $condition);
        }
        $sponsor = array_count_values($sponsor);
        $tempSponsor = array();
        foreach ($sponsor as $key => $value) {
            $sponsor['sponsor_id'] = $key;
            $sponsor['sponsor_count'] = $value;
            $sponsorObj = SponsorModel::find(new \MongoDB\BSON\ObjectId($key));
            $sponsor['sponsor_name'] = $sponsorObj['phase_name'];
            array_push($tempSponsor, $sponsor);
        }
        $drug = array_count_values($drug);
        $tempDrug = array();
        foreach ($drug as $key => $value) {

            $drug['drug_id'] = $key;
            $drug['drug_count'] = $value;
            // $drugObj = DrugModel::find(new \MongoDB\BSON\ObjectId($key));
            // $drug['drug_name'] = $drugObj['drug_name'];
            $drug['drug_name'] = "test";
            array_push($tempDrug, $drug);
        }
        $datas = $this->generateFilterValues();
        return array(
            'phase' => $datas['phase'],
            'condition' => $datas['condition'],
            'sponsor' => $datas['sponsor'],
            'drug' => $datas['drug'],
            'status' => $datas['status'],
            'details' => $details,
            'totalRecords' => $this->displayTotalRecordsFilter($field, $values, '$in', 0),
        ); //$details;
    }

    public function generateFilterValues() {
        $result = \Illuminate\Support\Facades\DB::collection($this->collection)->raw(function($collection) {
            return $collection->aggregate(array(
                        array(
                            '$match' => array(
                                '$and' => array(
                                    array('isActive' => 1),
                                    array($this->field => array('$in' => array($this->value))),
                                ),
                            ),
                        ),
                        array('$project' => array(
                                '_id' => 1,
                                $this->field => '$_id',
                                'phase_id' => 1,
                                'status_id' => 1,
                                'drug_id' => 1,
                                'sponsor_id' => 1,
                                'condition_id' => 1,
                            )),
            ));
        });
        $details = array();
        $phase = array();
        $condition = array();
        $sponsor = array();
        $drug = array();
        $status = array();
        foreach ($result as $query) {
            array_push($phase, (string) $query['phase_id']);
            array_push($condition, (string) $query['condition_id']);
            array_push($sponsor, (string) $query['sponsor_id']);
            array_push($drug, (string) $query['drug_id']);
            array_push($status, (string) $query['status_id']);
        }
        $status = array_count_values($status);
        $tempStatus = array();
        foreach ($status as $key => $value) {
            $status['status_id'] = $key;
            $status['status_count'] = $value;
            $statusObj = StatusModel::find(new \MongoDB\BSON\ObjectId($key));
            $status['status_name'] = $statusObj['status_name'];
            array_push($tempStatus, $status);
        }
        $phase = array_count_values($phase);
        $tempPhase = array();
        foreach ($phase as $key => $value) {
            $phase['phase_id'] = $key;
            $phase['phase_count'] = $value;
            $phaseObj = PhaseModel::find(new \MongoDB\BSON\ObjectId($key));
            $phase['phase_name'] = $phaseObj['phase_name'];
            array_push($tempPhase, $phase);
        }
        $condition = array_count_values($condition);
        $tempCondition = array();
        foreach ($condition as $key => $value) {
            $condition['condition_id'] = $key;
            $condition['condition_count'] = $value;
            $conditionObj = ConditionModel::find(new \MongoDB\BSON\ObjectId($key));
            $condition['condition_name'] = $conditionObj['condition_name'];
            array_push($tempCondition, $condition);
        }
        $sponsor = array_count_values($sponsor);
        $tempSponsor = array();
        foreach ($sponsor as $key => $value) {
            $sponsor['sponsor_id'] = $key;
            $sponsor['sponsor_count'] = $value;
            $sponsorObj = SponsorModel::find(new \MongoDB\BSON\ObjectId($key));
            $sponsor['sponsor_name'] = $sponsorObj['sponsor_name'];
            array_push($tempSponsor, $sponsor);
        }
        $drug = array_count_values($drug);
        $tempDrug = array();
        foreach ($drug as $key => $value) {
            $drug['drug_id'] = $key;
            $drug['drug_count'] = $value;
            // $drugObj = DrugModel::find(new \MongoDB\BSON\ObjectId($key));
            // $drug['drug_name'] = $drugObj['drug_name'];
            $drug['drug_name'] = "testing";
            array_push($tempDrug, $drug);
        }
        return array(
            'phase' => json_encode($tempPhase),
            'condition' => json_encode($tempCondition),
            'sponsor' => json_encode($tempSponsor),
            'drug' => json_encode($tempDrug),
            'status' => json_encode($tempStatus),
            'details' => $details,
                // 'totalRecords' => $this->displayTotalRecordsFilter($field, $values, '$in', 0),
        ); //$details;
    }

    public function displayTotalRecordsFilter($field, $values, $pipeline = '$in', $page = 0) {
        $this->field = $field;
        $this->value = new \MongoDB\BSON\ObjectId($values);
        $this->pipeline = $pipeline;
        $result = \Illuminate\Support\Facades\DB::collection($this->collection)->raw(function($collection) {
            return $collection->aggregate(array(
                        array(
                            '$match' => array(
                                '$and' => array(
                                    array('isActive' => 1),
                                    array($this->field => array($this->pipeline => array($this->value))),
                                ),
                            ),
                        ),
                        array('$project' => array(
                                '_id' => 1,
                                $this->field => '$_id',
                            )),
            ));
        });
        $details = array();
        $phase = array();
        foreach ($result as $query) {
            array_push($details, $query['_id']);
        }
        return sizeof($details);
    }

}
