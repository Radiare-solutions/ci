<?php
namespace App\Models;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class PhaseModel extends Eloquent
{
    protected $collection = 'ci_clinical_phase';
    protected $fillable = array('phase_name','isActive');

    public function AddPhase($phase_name){
         $phase_namearray=array('phase_name'=>$phase_name, 'isActive' => 1);
         $PhaseModel=PhaseModel::create($phase_namearray);
         return $PhaseModel->_id;
    }
    
    public function FetchPhase($phase_name){
       $PhaseModel=PhaseModel::where("phase_name",'=',$phase_name)->first();
       return $PhaseModel;
    }
}
