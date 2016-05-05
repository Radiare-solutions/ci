<?php
namespace App\Models;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class ConditionModel extends Eloquent
{
    protected $collection = 'ci_clinical_condition';
    protected $fillable = array('condition_name','isActive');
    
    public function AddCondition($condition_name){
         $condition_namearray=array('condition_name'=>$condition_name, 'isActive' => 1);
         $ConditionModel=ConditionModel::create($condition_namearray);
         return $ConditionModel->_id;
    }
    
    public function FetchCondition($condition_name){
       $ConditionModel=DrugModel::where("condition_name",'=',$condition_name)->first();
       return $ConditionModel->_id;
    } 
    
    public function editCondition($request) {
        $condition = array('condition_name' => "$request->editConditionName");
        ConditionModel::where('_id', $request->conditionID)->update(($condition));
        return "Updated";
    }
    
    public function loadConditionDetails($id) {
        $ob = ConditionModel::find(new \MongoDB\BSON\ObjectId($id));
        return $ob->attributes['condition_name'];
    }
    
    public function removeCondition($id) {        
        ConditionModel::where('_id', $id)->update(array('isActive' => 0));
    }
}
