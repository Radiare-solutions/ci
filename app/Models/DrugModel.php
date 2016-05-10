<?php
namespace App\Models;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class DrugModel extends Eloquent
{
    protected $collection = 'ci_clinical_drug';
    protected $fillable = array('drug_name','isActive');

    public function AddDrug($drug_name){
         $drug_namearray=array('drug_name'=>$drug_name, 'isActive' => 1);
         $DrugModel=DrugModel::create($drug_namearray);
         return $DrugModel->_id;
    }
    
     public function FetchDrug($drug_name){
       $DrugModel=DrugModel::where("drug_name",'=',$drug_name)->first();
       return $DrugModel;
    }
    
    public function editDrug($request) {
       $drug = array('drug_name' => "$request->editDrugName");
       DrugModel::where('_id', $request->drugID)->update(($drug));
       return "Updated";
}
    
    public function loadDrugDetails($id) {
       $ob = DrugModel::find(new \MongoDB\BSON\ObjectId($id));
       return $ob->attributes['drug_name'];
    }
    
    public function removeDrug($id) {        
       DrugModel::where('_id', $id)->update(array('isActive' => 0));
    }
}
