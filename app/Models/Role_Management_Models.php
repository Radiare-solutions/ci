<?php

namespace App\Models;

//use Moloquent;
//use MongoId;
//use Mongodb\Eloquent\Model;
use Jenssegers;
use Jenssegers\Mongodb;
use MongoDB\Model;
use MongoDB\BSON\ObjectID;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

/**
 * Category Model
 *
 * @author Hafiz Waheeduddin
 */
class Role_Management_Models extends Eloquent {

    protected $collection = "CI_Role";
    protected $fillable = array('RoleName');

    public function add_role($request) {

        $role = array('Role_Name' => "$request->RoleName", 'isActive'=> 1, 'Role_Id' => new \MongoDB\BSON\ObjectId());
        Role_Management_Models::insert(array($role));
        return redirect('/');
    }

    public function edit_role_submit($rid, $request) {

        $role = array('Role_Name' => "$request->RoleName", 'Created_Date' => "2013-10-02T01:11:18.965Z");
        Role_Management_Models::where('CI_Role')
                ->where('_id', $rid)
                ->update(($role));
        return redirect('/');
    }

    public function list_role() {
        $roles = Role_Management_Models::all();
        return $roles;
    }
    
    public function removeRole($id) {
        $role = array('isActive' => 0);
        Role_Management_Models::where('_id', new \MongoDB\BSON\ObjectId($id))->update(($role)) ;
    }    

}
