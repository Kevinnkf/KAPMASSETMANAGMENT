<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\HttpRequest;
use Illuminate\Support\Facades\Config;
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

    // Login
    public function showLoginForm()
    {
        // check if token is exist to force redirect to dashboard
        if(!empty(session('userdata')['token'])) {
            return redirect('/dashboard');
        }

        $urlSlideLogin = HttpRequest::originPath() . Config::get('constants.SLIDE_LOGIN_GET_DATA');

        return view('auth.login', [
            'urlSlideLogin' => $urlSlideLogin,
        ]);
    }
}