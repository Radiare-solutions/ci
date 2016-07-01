<?php
namespace App\Models;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class ApplicantModel extends Eloquent
{
    protected $collection = 'ci_patent_applicant';
    protected $fillable = array('applicant_name','isActive');

    public function AddApplicant($applicant_name){
         $namearray=array('applicant_name'=>$applicant_name, 'isActive' => 1);
         $ApplicantModel=ApplicantModel::create($namearray);
         return $ApplicantModel->_id;
    }
    
    public function FetchApplicant($applicant_name){
       $ApplicantModel=ApplicantModel::where("applicant_name",'=',$applicant_name)->count();
       return $ApplicantModel;
    }
}
