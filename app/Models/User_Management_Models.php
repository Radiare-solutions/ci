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
class User_Management_Models extends Eloquent {

    protected $collection = "CI_Users";
    protected $fillable = array('UserName');

    public function add_user($request) {

        $user = array('User_Id' => new \MongoDB\BSON\ObjectId(),'User_Name' => "$request->User_Name",'Email_Id' => "$request->Email_Id",  'Password' => "$request->Password",  'Role_Id' => "$request->Role_Name", 'Created_Date' => "2013-10-02T01:11:18.965Z");
        User_Management_Models::insert(array($user));
        return redirect('/');
    }
    public function edit_user_submit($id,$request) {

        $user = array('User_Name' => "$request->User_Name",'Email_Id' => "$request->Email_Id",  'Password' => "$request->Password",  'Role_Id' => "$request->Role_Name", 'Created_Date' => "2013-10-02T01:11:18.965Z");
        User_Management_Models::where('CI_Users')
            ->where('_id', '$id')
            ->update(array($user)) ;
        return redirect('/');
    }

    public function list_users() {
        $users = User_Management_Models::all();
        return $users;
    }
    

}
