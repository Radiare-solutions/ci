<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Models\RssModel as rssModel;

use App\Models\ConfCoverageModel as ConfCoverageModel;

class ConfCoverageController extends Controller
{
    public function Extract(){
        
        set_time_limit(0);
        ini_set('max_execution_time', 0);
        
        new \simple_html_dom();
        
        $api_query="http://www.omicsgroup.com/current-conferences.xml";
        $content = file_get_contents($api_query);
        $xml=simplexml_load_string($content);
        $channel=$xml->channel;
        //rss feed type 2 is Conference Calendar
        $rss_feed_type="Conference Coverage";
           
        //Checking whether the Feed URL is exist or not.
        $rssModel= new rssModel();
        $feedExist=$rssModel->rssFeedselect($api_query,$rss_feed_type);
        if($feedExist==null){
            
           
            // Inserting RSS FEED into ci_rss_feeds table
           $feedInsert=$rssModel->rssFeedinsert($api_query,$rss_feed_type);
           $rss_feed_id=$feedInsert->_id; 
       }else{
           // fetching primary key from Rss Feed Collection
           $rss_feed_id=$feedExist->_id; 
       } 
       
        foreach($channel->item as $answer){
            $link=(String)$answer->link;

            $title=(String)$answer->title;

            $description=(String)$answer->description;
            $conf_coverage_cnt=  file_get_html($link);
            
            foreach($conf_coverage_cnt ->find('div[class="middle-column"]') as $item) {
            $item->outertext = '';
            }
            $conf_coverage_cnt->save();
            
            $detail_arr_intro=array();
            foreach($conf_coverage_cnt->find("div[class='article-intro-right']") as $conf_coverage_intro){
            $detail_arr_intro[]=preg_replace('/<\/?a[^>]*>/','',strip_tags($conf_coverage_intro->innertext));
            }
            $conf_coverage_intro=implode(",",$detail_arr_intro);

            $detail_arr_conf=array();
            foreach($conf_coverage_cnt->find("div[class='article-text']") as $conf_coverage_val){
            $detail_arr_conf[]=preg_replace('/<\/?a[^>]*>/','',$conf_coverage_val->innertext);
            }
            $detailed_conf_coverage=implode(",",$detail_arr_conf);

            $ConfCoverageModel=new ConfCoverageModel();
            $ConfCoverageModel->AddCoverage($rss_feed_id,$link,$title,$description,$conf_coverage_intro,$detailed_conf_coverage);
        }
}

    
}
