<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class StatusModel extends Eloquent {

    protected $collection = 'ci_clinical_status';
    protected $fillable = array('status_name', 'isActive');

    public function AddStatus($status_name) {
        $status_namearray = array('status_name' => $status_name, 'isActive' => 1);
        $StatusModel = StatusModel::create($status_namearray);
        return $StatusModel->_id;
    }

    public function FetchStatus($status_name) {
        $StatusModel = StatusModel::where("status_name", '=', $status_name)->first();
        return $StatusModel;
    }

    public function loadStatus() {
        $model = StatusModel::all();
        return $model;
    }

}
