<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    //override from AuthenticatesUsers trait
    public function username()
    {
        //will get value of identifier key
        $identifier=request()->input('identifier');
        //will check if $identifier is valid email if true set email else set phone
        $status=filter_var($identifier,FILTER_VALIDATE_EMAIL)?'email':'phone';
        //add email or phone as key and value of identifier in request array and add it to use it in check
        request()->merge([$status=>$identifier]);
        //return check by using email field or phone field
        return $status;
    }
}
