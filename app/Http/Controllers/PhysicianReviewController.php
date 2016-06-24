<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\RssModel as rssModel;

class PhysicianReviewController extends Controller {

    public function Extract() {
            set_time_limit(0);
            ini_set('max_execution_time', 0);
            
            new \simple_html_dom();
             
            $drug_name=urlencode("adalimumab");
            $api_query="http://www.firstwordpharma.com/original/physician_views?page=1&tsid=17#axzz4B3pbFTzT";
            
    }  
         
}

