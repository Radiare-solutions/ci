<?php
namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
class RssModel extends Eloquent
{
    protected $collection="ci_rss_feeds";
    protected $fillable=array('rss_feed_url','rss_feed_type','created_by') ;
    
    public function RssFeedselect($api_query,$rss_feed_type) {
        
       $feedExist=RssModel::where("rss_feed_url",'=',$api_query)->where('rss_feed_type', '=', $rss_feed_type)->first();
       return $feedExist;
    }
    
    public function RssFeedinsert($api_query,$rss_feed_type) {
        
       $feedExist=RssModel::create(["rss_feed_url"=>$api_query,"rss_feed_type"=>$rss_feed_type,"created_by"=>1])->first();
       return $feedExist;
    }
}
