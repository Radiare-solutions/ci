<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Moloquent;

class ClinicalTrialModel extends Moloquent
{
    protected $collection="ci_clinical_trial";
    
 
    public function ClinicalTrialInsert(
            $rss_feed_id,$nct_id,$title,$sponsor_name,$collaborator_name,$drug_name,$phase,$condition_name,$intervention_implode,
            $status_name,$firstreceived_date,$lastchanged_date,$verification_date,$start_date,$study_completion_date,$primary_completion_date,$study_type,$study_design,$enrollment,
            $primary_text1,$primary_text2,$primary_text3,$primary_res1,$primary_res2,$primary_res3,$url,$implode_serious_cnt,$implode_other_cnt,$serious_adv_val,$other_adv_val,
            $official_title,$brief_title,$brief_summary,$detailed_description,$detailed_intervention,$primary_measure_def,$primary_measure_value,$detailed_outcome_measure) {
        
                $clinicalTrialarray=array('rss_feed_id'=>$rss_feed_id,
                'identifier'=>$nct_id,
                'clinical_title'=>$title,
                'sponsor_name'=>$sponsor_name,
                'collaborator'=>$collaborator_name,
                'drug_name'=>$drug_name,
                'phase'=>$phase,
                'condition_name'=>$condition_name,
                'intervention'=>$intervention_implode,
                'status_name'=>$status_name,
                'first_received_date'=>$firstreceived_date,
                'last_updated_date'=>$lastchanged_date,
                'last_verified_date'=>$verification_date,
                'study_start_date'=>$start_date,
                'study_completion_date'=>$study_completion_date,
                'primary_completion_date'=>$primary_completion_date,
                'study_type'=>$study_type,
                'study_design'=>$study_design,
                'enrollment'=>$enrollment,
                'primary_outcome_text1'=>$primary_text1,
                'primary_outcome_text2'=>$primary_text2,
                'primary_outcome_text3'=>$primary_text3,
                'primary_outcome_res1'=>$primary_res1,
                'primary_outcome_res2'=>$primary_res2,
                'primary_outcome_res3'=>$primary_res3,
                'clinical_url'=>$url,
                'serious_adv_event_val'=>$serious_adv_val,
                'other_adv_event_val'=>$other_adv_val,
                'detailed_serious_adverse'=>$implode_serious_cnt,
                'detailed_other_adverse'=>$implode_other_cnt,
                'official_title'=>$official_title,
                'brief_title'=>$brief_title,
                'brief_summary'=>$brief_summary,
                'detailed_desc'=>$detailed_description,
                'detailed_intervention'=>$detailed_intervention,
                'primary_measure_def'=>$primary_measure_def,
                'primary_measure_value'=>$primary_measure_value,
                'detailed_outcome_measure'=>$detailed_outcome_measure);
                
              ClinicalTrialModel::insert($clinicalTrialarray);
    }
    
}
