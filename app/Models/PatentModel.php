<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class PatentModel extends Eloquent {

    protected $collection = "ci_patent_data";

    public function PatentInsert($insert_details) {

        PatentModel::insert($insert_details);
    }

    /*
     * to fetch all the data in patents collection
     */

    public function loadPatents($skip, $limit, $sort_by, $order_by) {

        if ($skip == 0 && $limit == 0) {
            $model = PatentModel::orderBy($sort_by, $order_by)->get();
        } else {
            $model = PatentModel::orderBy($sort_by, $order_by)->skip($skip)->take($limit)->get();
        }
        return $model;
    }

    public function loadPatentsByYear($year, $shortmonth, $skip, $limit, $sort_by, $order) {

        if ($skip == 0 && $limit == 0) {
            $skip_arr = "";
            $limit_arr = "";
        } else {
            $skip_arr = array('$skip' => $skip);
            $limit_arr = array('$limit' => $limit);
        }


        if (empty($shortmonth)) {
            $query = array('filed_by_year' => $year);
        } else {
            $month = DATE("F", strtotime($shortmonth));
            $query = array('$and' => array(array('filed_by_year' => $year), array('filed_by_month' => $month)));
        }

        $in_array = array(
            array('$unwind' => '$applicant_id'),
            array('$match' => $query),
            array('$group' => array("_id" => '$_id', "title" => array('$first' => '$title'), "abstract" => array('$first' => '$abstract'),
                    "application_no" => array('$first' => '$application_no'), "publication_info" => array('$first' => '$publication_info'),
                    "inventors" => array('$first' => '$inventors'), "cpcClassifications" => array('$first' => '$cpcClassifications'),
                    "filed_date" => array('$first' => '$filed_date'), "ipcClassifications" => array('$first' => '$ipcClassifications'),
                    "link" => array('$first' => '$link'), "filed_by_month" => array('$first' => '$filed_by_month'),
                    "filed_by_year" => array('$first' => '$filed_by_year'), "priority_no" => array('$first' => '$priority_no'),
                    "published_as" => array('$first' => '$published_as'), "priority_date" => array('$first' => '$priority_date'),
                    "applicant_id" => array('$push' => '$applicant_id')
                )), array('$sort' => array("$sort_by" => $order)), $skip_arr, $limit_arr);


        $ob = PatentModel::raw()->aggregate(array_filter($in_array));
        return $ob;
    }

    public function loadPatentsByApplicants($id, $skip, $limit, $sort_by, $order) {

        if ($skip == 0 && $limit == 0) {
            $skip_arr = "";
            $limit_arr = "";
        } else {
            $skip_arr = array('$skip' => $skip);
            $limit_arr = array('$limit' => $limit);
        }

        $in_array = array(
            array('$unwind' => '$applicant_id'),
            array('$match' => array('applicant_id._id' => array('$in' => $id))),
            array('$group' => array("_id" => '$_id', "title" => array('$first' => '$title'), "abstract" => array('$first' => '$abstract'),
                    "application_no" => array('$first' => '$application_no'), "publication_info" => array('$first' => '$publication_info'),
                    "inventors" => array('$first' => '$inventors'), "cpcClassifications" => array('$first' => '$cpcClassifications'),
                    "filed_date" => array('$first' => '$filed_date'), "ipcClassifications" => array('$first' => '$ipcClassifications'),
                    "link" => array('$first' => '$link'), "filed_by_month" => array('$first' => '$filed_by_month'),
                    "filed_by_year" => array('$first' => '$filed_by_year'), "priority_no" => array('$first' => '$priority_no'),
                    "published_as" => array('$first' => '$published_as'), "priority_date" => array('$first' => '$priority_date'),
                    "applicant_id" => array('$push' => '$applicant_id')
                )), array('$sort' => array("$sort_by" => $order)), $skip_arr, $limit_arr);


        $ob = PatentModel::raw()->aggregate(array_filter($in_array));
        return $ob;
    }

    public function loadPatentsByAppandYear($year, $shortmonth, $id, $skip, $limit, $sort_by, $order) {

        if ($skip == 0 && $limit == 0) {
            $skip_arr = "";
            $limit_arr = "";
        } else {
            $skip_arr = array('$skip' => $skip);
            $limit_arr = array('$limit' => $limit);
        }

        if (empty($shortmonth)) {
            $query = array('$match' => array('$and' => array(array('filed_by_year' => $year), array('applicant_id._id' => array('$in' => $id)))));
        } else {
            $month = DATE("F", strtotime($shortmonth));
            $query = array('$match' => array('$and' => array(array('filed_by_year' => $year), array('filed_by_month' => $month), array('applicant_id._id' => array('$in' => $id)))));
        }

        $in_array = array(
            array('$unwind' => '$applicant_id'), $query,
            array('$group' => array("_id" => '$_id', "title" => array('$first' => '$title'), "abstract" => array('$first' => '$abstract'),
                    "application_no" => array('$first' => '$application_no'), "publication_info" => array('$first' => '$publication_info'),
                    "inventors" => array('$first' => '$inventors'), "cpcClassifications" => array('$first' => '$cpcClassifications'),
                    "filed_date" => array('$first' => '$filed_date'), "ipcClassifications" => array('$first' => '$ipcClassifications'),
                    "link" => array('$first' => '$link'), "filed_by_month" => array('$first' => '$filed_by_month'),
                    "filed_by_year" => array('$first' => '$filed_by_year'), "priority_no" => array('$first' => '$priority_no'),
                    "published_as" => array('$first' => '$published_as'), "priority_date" => array('$first' => '$priority_date'),
                    "applicant_id" => array('$push' => '$applicant_id')
                )), array('$sort' => array("$sort_by" => $order)), $skip_arr, $limit_arr);

        $ob = PatentModel::raw()->aggregate(array_filter($in_array));
        return $ob;
    }

}
