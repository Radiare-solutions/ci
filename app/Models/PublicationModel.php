<?php
namespace App\Models;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

/**
 * Category Model
 *
 * @author Hafiz Waheeduddin
 */
class PublicationModel extends Eloquent {

    protected $collection = "ci_publications";

    public function AddPublications($insert_details) {
        PublicationModel::insert($insert_details);
    }

}
