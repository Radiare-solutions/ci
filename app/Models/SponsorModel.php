<?php
namespace App\Models;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class SponsorModel extends Eloquent
{
    protected $collection = 'ci_clinical_sponsor';
    protected $fillable = array('sponsor_name','isActive');

    public function AddSponsor($sponsor_name){
        $sponsor_namearray=array('sponsor_name'=>$sponsor_name, 'isActive' => 1);
        $SponsorModel=SponsorModel::create($sponsor_namearray)->first();
        return $SponsorModel->_id;
    }
    
    public function FetchSponsor($sponsor_name){
       $SponsorModel=SponsorModel::where("sponsor_name",'=',$sponsor_name)->first();
       return $SponsorModel;
    }
    
    public function editSponsor($request) {
        $sponsor = array('sponsor_name' => "$request->editSponsorName");
        SponsorModel::where('_id', $request->sponsorID)->update(($sponsor));
        return "Updated";
}
    
    public function loadSponsorDetails($id) {
        $ob = SponsorModel::find(new \MongoDB\BSON\ObjectId($id));
        return $ob->attributes['sponsor_name'];
    }
    
    public function removeSponsor($id) {        
        SponsorModel::where('_id', $id)->update(array('isActive' => 0));
    }
    public function loadSponsor() {
        $model=SponsorModel::all()  ;   
        return $model;
    }
    
}
