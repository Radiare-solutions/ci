<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Models\RssModel as rssModel;


class AdverseController extends Controller
{
    public function Extract(){
        
        set_time_limit(0);
        ini_set('max_execution_time', 0);
        
        new \simple_html_dom();
        
        $api_query="https://web.archive.org/web/20130811021619/http://www.drugcite.com/?q=ADALIMUMAB";
        $content = file_get_html($api_query);
        foreach($content->find('div[id=tabregion]') as $div_node_val){
            echo $div_node_val->innertext;
           
       }
        
}

    
}
