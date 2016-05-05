<?php
namespace App\Models;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class SponserModel extends Eloquent
{
    protected $collection = 'ci_clinical_sponser';
    protected $fillable = array('sponsor_name','isActive');

    public function AddSponser($sponsor_name){
        $sponsor_namearray=array('sponsor_name'=>$sponsor_name, 'isActive' => 1);
        $SponserModel=SponserModel::create($sponsor_namearray)->first();
        return $SponserModel->_id;
    }
    
    public function FetchSponser($sponsor_name){
       $SponserModel=SponserModel::where("sponsor_name",'=',$sponsor_name)->first();
       return $SponserModel->_id;
    }
    
    public function editSponsor($request) {
        $sponsor = array('sponsor_name' => "$request->editSponsorName");
        SponserModel::where('_id', $request->sponsorID)->update(($sponsor));
        return "Updated";
    }
    
    public function loadSponsorDetails($id) {
        $ob = SponserModel::find(new \MongoDB\BSON\ObjectId($id));
        return $ob->attributes['sponsor_name'];
    }
    
    public function removeSponsor($id) {        
        SponserModel::where('_id', $id)->update(array('isActive' => 0));
    }
    
}
