<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Moloquent;

class SponserModel extends Moloquent
{
    protected $collection = 'ci_clinical_sponser';
    protected $fillable = array('clinical_trial_id','sponsor_name');

    public function AddSponser($sponsor_name){
        $sponsor_namearray=array('sponsor_name'=>$sponsor_name);
        $SponserModel=SponserModel::create($sponsor_namearray)->first();
        return $SponserModel->_id;
    }
    
    public function FetchSponser($sponsor_name){
       $SponserModel=SponserModel::where("sponsor_name",'=',$sponsor_name)->first();
       return $SponserModel->_id;
    }
    
}
