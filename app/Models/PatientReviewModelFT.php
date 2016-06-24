<?php
namespace App\Models;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

/**
 * Category Model
 *
 * @author Hafiz Waheeduddin
 */
class PatientReviewModelFT extends Eloquent {

    protected $collection = "ci_patient_reviews1";

    public function AddPatientReview($patient_review_arr) {
  
        PatientReviewModelFT::insert($patient_review_arr);
    }

}
