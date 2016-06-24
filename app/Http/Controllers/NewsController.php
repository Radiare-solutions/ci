<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\RssModel as rssModel;

use App\Models\NewsModel as NewsModel;

// 1. http://feeds2.feedburner.com/LatestResearchNews
// 2. http://feeds2.feedburner.com/press-releases
// 3. http://feeds2.feedburner.com/LatestMedicalPdaNews
// 4. http://feeds2.feedburner.com/LatestCorporateNews
// 5. http://feeds2.feedburner.com/LatestDrugNews

class NewsController extends Controller {

    public function Extract(Request $request) {
            set_time_limit(0);
            ini_set('max_execution_time', 0);
            $api_query = $request->trial;
             // $api_query="http://feeds2.feedburner.com/LatestResearchNews";
            
             //rss feed type is Publications
             $rss_feed_type="News";
           
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
       $content = file_get_contents($api_query);
       $xml=simplexml_load_string($content);
    
       $channel=$xml->channel;
       $items=$channel->item;
       
       $insert_details=array();
        
       foreach ($items as $answer){
                $news_title=(string)$answer->title;
                $news_link=(string)$answer->link;
                $news_description=(string)$answer->description;
                $news_description=strip_tags($news_description);
                
                $news_content = file_get_contents($news_link);

                if(preg_match_all("#www.drugs.com#i", $api_query, $matches))
                {
                $extractDesc=$this->saveDesc($news_content,"contentBox");
                $removetag=preg_replace("/<img[^>]+\>/i", "",$this->removeTag($extractDesc));
                $detailed_news=preg_replace("/<a[^>]+\>/i", "",$removetag);
                }
                else if(preg_match_all("#feeds2.feedburner.com#i", $api_query, $matches)){

                $extractDesc=$this->saveDesc($news_content,"report-content");
                $detailed_news=$this->removeAds($news_description."<br/>".$extractDesc);
                }
                
                $insert_details[] = array('rss_feed_id'=>$rss_feed_id,'news_title'=>$news_title,'news_link' => $news_link,
                'news_description'=>$news_description,'detailed_news'=>$detailed_news);
                
            }
                            
                $NewsModel= new NewsModel();        
                $NewsModel->AddNews($insert_details) ;
    }  
    
    public function DOM($html){
       if(!empty($html)) {
        $DOM = new \DOMDocument();
        libxml_use_internal_errors(true);
        $DOM->loadHTML($html);
        libxml_use_internal_errors(false);
        $a = new \DOMXPath($DOM);
        return $a;
       }
       else 
           return null;
       }
       
    public function saveDesc($content,$classname){
        $xpath = $this->DOM($content);

        foreach($xpath->query('.//div[@class="'.$classname.'"]') as $row) {
            $dom = new \DOMDocument();
            $cloned = $row->cloneNode(TRUE);
            $dom->appendChild($dom->importNode($cloned,TRUE));
            $content=$dom->saveHTML();
        }
        return $content;
   }
   public function removeAds($content) {
       
    $DOM = new \DOMDocument();
    libxml_use_internal_errors(true);
    $DOM->loadHTML($content);
    libxml_use_internal_errors(false);
    $a = new \DOMXPath($DOM);

     $nlist1= $a->query('.//div[@class="it-ads"]');
     foreach ($nlist1 as $value) {
        $value->parentNode->removeChild($value); 
     }
     return $DOM->saveHTML();
   }
   
   function removeTag($content) {
    $DOM = new \DOMDocument();
    libxml_use_internal_errors(true);
    $DOM->loadHTML($content);
    libxml_use_internal_errors(false);
    $xpath = new \DOMXPath($DOM);

    $ad = $xpath->query('.//div[@id="first_ad_unit"]');
    $ad_node = $ad->item(0);
    $ad_node->parentNode->removeChild($ad_node);

    $ad1 = $xpath->query('.//div[@id="second_ad_unit"]');
    $ad_node1 = $ad1->item(0);
    $ad_node1->parentNode->removeChild($ad_node1);

    $nlist = $xpath->query('.//div[@class="nav nav-tabs clearAfter"]');
    $node = $nlist->item(0);
    $node->parentNode->removeChild($node);

    $nlist1 = $xpath->query('.//p/a[@class="iconGo"]');
    $node1 = $nlist1->item(0);
    $node1->parentNode->removeChild($node1);

    $twitter = $xpath->query('.//table[@class="noprint social-media-news"]');
    $twitter_node = $twitter->item(0);
    $twitter_node->parentNode->removeChild($twitter_node);

    return $DOM->saveHTML();
}


}
