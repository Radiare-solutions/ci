<?php

namespace App\Models\Indication;

//use Moloquent;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use App\Models\Indication\Post;
/**
 * Category Model
 *
 * @author Hafiz Waheeduddin
 */
class Post extends Eloquent {
   
    public function indications() {
        
       return $this->belongsTo('Indication');
       
    }

}
