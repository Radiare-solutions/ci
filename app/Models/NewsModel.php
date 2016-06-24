<?php
namespace App\Models;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class NewsModel extends Eloquent
{
    protected $collection = 'ci_news';

    public function AddNews($insert_details) {

         NewsModel::insert($insert_details);
    }
    
}
