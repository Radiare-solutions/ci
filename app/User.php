<?php

namespace App;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
//class User extends Eloquent
{
        protected $collection = 'users';
    protected $fillable = array('email','pass');
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
//    protected $fillable = [
//        'name', 'email', 'password',
//    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'pass'
    ];
}
