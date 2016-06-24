<?php
namespace App;

use Illuminate\Auth\Authenticatable as AuthenticableTrait;;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class User extends Eloquent implements AuthenticatableContract, CanResetPasswordContract {

    use AuthenticableTrait, CanResetPassword;

    // protected $collection = 'users'; 

    protected $fillable = ['email', 'password'];
    
    protected $hidden = ['password','remember_token'];
}

?>
