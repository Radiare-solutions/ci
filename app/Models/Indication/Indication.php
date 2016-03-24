<?php

namespace App\Models\Indication;

//use Moloquent;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
/**
 * Category Model
 *
 * @author Hafiz Waheeduddin
 */
class Indication extends Eloquent {

    protected $collection = "posts";
    
    public function posts() {
       // return $this->belongsTo('App\Models\Indication\Post');
       // return $this-> ('App\Models\Indication\Post');
    } 

}
