<?php
namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class ConfCoverageModel extends Eloquent
{
    protected $collection="ci_conf_coverage";
    
 
    public function AddCoverage($rss_feed_id,$link,$title,$description,$conf_coverage_intro,$detailed_conf_coverage) {
                
        $insert_details=array("rss_feed_id"=>$rss_feed_id,"coverage_link"=>$link,"coverage_title"=>$title,"coverage_description"=>$description,
            "conf_coverage_intro"=>$conf_coverage_intro,"detailed_conf_coverage"=>$detailed_conf_coverage);
        
         ConfCoverageModel::insert($insert_details);
    }
    
}
