<?php
namespace App\Models;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

/**
 * Category Model
 *
 * @author Hafiz Waheeduddin
 */
class PatientReviewModelSec extends Eloquent {

    protected $collection = "ci_patient_reviews2";

    public function AddPatientReview($patient_review_arr) {
        
        PatientReviewModelSec::insert($patient_review_arr);
    }

}
