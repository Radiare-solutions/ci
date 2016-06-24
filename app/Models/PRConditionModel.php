<?php
namespace App\Models;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class PRConditionModel extends Eloquent
{
    protected $collection = 'ci_pr_condition';
    protected $fillable = array('condition_name','isActive');
    
    public function AddPRCondition($condition_name){
         $condition_namearray=array('condition_name'=>$condition_name, 'isActive' => 1);
         $ConditionModel=PRConditionModel::create($condition_namearray);
         return $ConditionModel->_id;
    }
    
   public function FetchPRCondition($condition_name){
       $ConditionModel=PRConditionModel::where("condition_name",'=',$condition_name)->first();
       return $ConditionModel;
    } 
}
