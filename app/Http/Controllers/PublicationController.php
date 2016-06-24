<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\RssModel as rssModel;

use App\Models\PublicationModel as PublicationModel;

class PublicationController extends Controller {

    public function Extract(Request $request) {
            set_time_limit(0);
            ini_set('max_execution_time', 0);
            $api_query = $request->trial;
            // $api_query="http://www.ncbi.nlm.nih.gov/entrez/eutils/erss.cgi?rss_guid=1LgINZmdEb77TjiyZXGysPSOFZ9v9RU2ocDNq6lSuc_oVhacsY";
            
             //rss feed type is Publications
             $rss_feed_type="Publications";
           
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
       
            $xml=simplexml_load_file($api_query);
            $channel=$xml->channel;
            
            $insert_details=array();
            foreach ($channel->item as $item) {
                
                $publication_title=(String)$item->title;
                
                $publication_link=(String)$item->link;
                
                $publication_desc= preg_replace("/Related Articles/i","",strip_tags($item->description,"<p></p><h1></h1><h2></h2><h3></h3><h4></h4><h5>"
                        . "</h5><h6></h6><hr/><hr><br/><br><strong></strong><b></b><div></div>"));
                $publication_guid=(String)$item->guid;
                
                $insert_details[]= array('rss_feed_id'=>$rss_feed_id,'publication_title'=>$publication_title,'publication_link'=>$publication_link,
                'publication_desc'=>$publication_desc,'publication_guid'=>$publication_guid);
                        
            }
            $PublicationModel= new PublicationModel();
            $PublicationModel->AddPublications($insert_details); 
    }  
    
        public function SpecPubExtract(){
            
            new \simple_html_dom();
            $api_query="http://ete-online.biomedcentral.com/articles/most-recent/rss.xml";

                if(preg_match_all("#journals.lww.com#i", $api_query, $matches) || preg_match_all("#www.jacionline.org#i", $api_query, $matches)
                || preg_match_all("#alcalc.oxfordjournals.org#i", $api_query, $matches) || preg_match_all("#onlinelibrary.wiley.com#i", $api_query, $matches)
                || preg_match_all("#www.medworm.com#i", $api_query, $matches) || preg_match_all("#jdsde.oxfordjournals.org#i", $api_query, $matches)
                || preg_match_all("#tropej.oxfordjournals.org#i", $api_query, $matches)|| preg_match_all("#tau.sagepub.com#i", $api_query, $matches) 
                || preg_match_all("#ajs.sagepub.com#i", $api_query, $matches) || preg_match_all("#adr.sagepub.com#i", $api_query, $matches)
                || preg_match_all("#cpr.sagepub.com#i", $api_query, $matches) || preg_match_all("#bjsm.bmj.com#i", $api_query, $matches)
                || preg_match_all("#thorax.bmj.com#i", $api_query, $matches) || preg_match_all("#bjo.bmj.com#i", $api_query, $matches)
                || preg_match_all("#sti.bmj.com#i", $api_query, $matches) || preg_match_all("#emj.bmj.com#i", $api_query, $matches)
                || preg_match_all("#heart.bmj.com#i", $api_query, $matches) || preg_match_all("#fampra.oxfordjournals.org#i", $api_query, $matches)
                || preg_match_all("#www.ajgponline.org#i", $api_query, $matches) || preg_match_all("#ejo.oxfordjournals.org#i", $api_query, $matches)
                || preg_match_all("#content.onlinejacc.org#i", $api_query, $matches)){
                    
                    
            $xml=simplexml_load_file($api_query);
            $channel=$xml->channel;
            foreach ($channel->item as $item) {
                
                $publication_title=$item->title;
                
                $publication_link=$item->link;

                echo "<a href='".$publication_link."'>".$publication_title."</a><br/>";
                
            }
            
        }else if(preg_match_all("#www.medicalnewstoday.com#i", $api_query, $matches)){
           $xml=simplexml_load_file($api_query);
            $channel=$xml->channel;
            foreach ($channel->item as $item) {
                
                $publication_title=$item->title;
                
                $publication_link=$item->link;
                
                $content = file_get_contents($publication_link);
                $extractDesc=preg_replace("/<img[^>]+\>/i", "",$this->saveDescClass($content,"article_body"));
                $rmvd_anchor=preg_replace("/<a[^>]+\>/i", "",$extractDesc);
                
            } 
        }
        else if(preg_match_all("#www.medicinenet.com#i", $api_query, $matches)){
            $xml=simplexml_load_file($api_query);
            $channel=$xml->channel;
            foreach ($channel->item as $item) {
                
                $publication_title=$item->title;
                
                $publication_link=$item->link;
                
                $content = file_get_html($publication_link);
                $rcontent=array();
                foreach($content->find("div#textArea < p") as $row) {
                   $rcontent[]=preg_replace("/<a[^>]+\>/i", "",$row);
                }
                $rmvd_anchor=implode("", $rcontent);
            } 
        }
        else if(preg_match_all("#www.medpagetoday.com#i", $api_query, $matches)){
            $xml=simplexml_load_file($api_query);
            $channel=$xml->channel;
           foreach ($channel->item as $item) {
                
                $publication_title=$item->title;
                
                $publication_link=$item->link;
                
                $content = file_get_contents($publication_link);
                $extractDesc=preg_replace("/<img[^>]+\>/i", "",$this->saveDescClass($content,"body-content"));
                $rmvd_anchor=preg_replace("/<a[^>]+\>/i", "",$extractDesc);
            } 
        }
        else if(preg_match_all("#ete-online.biomedcentral.com#i", $api_query, $matches) || preg_match_all("#lipidworld.biomedcentral.com#i", $api_query, $matches)){
            $xml=simplexml_load_file($api_query);
            $channel=$xml->channel;
           foreach ($channel->item as $item) {
                
                $publication_title=$item->title;
                
                $publication_link=$item->link;
                
                $content = file_get_html($publication_link);
                $rcontent=array();
                foreach($content->find("div#Test-ImgSrc") as $row) {
                $rcontent[]=preg_replace("/<img[^>]+\>/i", "",$row->children(2)->innertext);     
                }
                $extractDesc=implode(" ", $rcontent);
                $rmvd_anchor=preg_replace("/<a[^>]+\>/i", "",$extractDesc);
                
            } 
        }
        }
        
       public function DOM($html){
       if(!empty($html)){
        $DOM = new \DOMDocument();
        libxml_use_internal_errors(true);
        $DOM->loadHTML($html);
        libxml_use_internal_errors(false);
        $a = new \DOMXPath($DOM);
        return $a;
        }
        else return null;
       }
       
    public function saveDescClass($content,$classname){
        $xpath = $this->DOM($content);

        foreach($xpath->query('.//div[@class="'.$classname.'"]') as $row) {
            $dom = new \DOMDocument();
            $cloned = $row->cloneNode(TRUE);
            $dom->appendChild($dom->importNode($cloned,TRUE));
            $content=$dom->saveHTML();
        }
        return $content;
   }

}
