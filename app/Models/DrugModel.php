<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Moloquent;

class DrugModel extends Moloquent
{
    protected $collection = 'ci_clinical_drug';
    protected $fillable = array('clinical_trial_id','drug_name');

    public function AddDrug($drug_name){
         $drug_namearray=array('drug_name'=>$drug_name);
         $DrugModel=DrugModel::create($drug_namearray);
         return $DrugModel->_id;
    }
     public function FetchDrug($drug_name){
       $DrugModel=DrugModel::where("drug_name",'=',$drug_name)->first();
       return $DrugModel->_id;
    }
}
