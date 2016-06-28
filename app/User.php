<?php

namespace App;

use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class User extends Eloquent implements AuthenticatableContract, CanResetPasswordContract {

    use AuthenticableTrait,
        CanResetPassword;

    protected $collection = 'users'; 

    protected $fillable = ['email', 'password'];
    protected $hidden = ['password', 'remember_token'];

    public function getRememberToken() {
        return $this->remember_token;
    }

    public function setRememberToken($value) {
        $this->remember_token = $value;
    }

    public function getRememberTokenName() {
        return 'remember_token';
    }



    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->password;
    }
   
    public function getAuthIdentifierName()
{
    return $this->getKeyName();
}

public function getAuthIdentifier()
{
    return $this->getKey();
}

}

?>
