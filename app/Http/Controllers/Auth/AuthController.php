<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    
    protected  $username = 'email';

    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
    
    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required', 'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::guard($this->getGuard())->attempt($credentials, $request->has('remember')))
       // if($request->get('email') == "admin@test.com")
        { //this if validate if the user is on the database line 1
            return redirect()->intended($this->redirectPath());
            //this redirect if user is the db line 2
        }

        return redirect($this->loginPath())
                    ->withInput($request->only('email', 'remember'))
                    ->withErrors([
                        'email' => $this->getFailedLoginMessage(),
                    ]);
          //redirect again to login view with some errors line 3
    }
}
