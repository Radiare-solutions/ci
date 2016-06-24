<?php
namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class PatentModel extends Eloquent
{
    protected $collection="ci_patent_data";
    
 
    public function PatentInsert($insert_details) {
       
               PatentModel::insert($insert_details);
    }
    
}
