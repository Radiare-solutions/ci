<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Moloquent;

class ConditionModel extends Moloquent
{
    protected $collection = 'ci_clinical_condition';
    protected $fillable = array('condition_name');
    
    public function AddCondition($condition_name){
         $condition_namearray=array('condition_name'=>$condition_name);
         $ConditionModel=ConditionModel::create($condition_namearray);
         return $ConditionModel->_id;
    }
   public function FetchCondition($condition_name){
       $ConditionModel=DrugModel::where("condition_name",'=',$condition_name)->first();
       return $ConditionModel->_id;
    } 
}
