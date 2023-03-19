<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    use AuthenticatesUsers {
        redirectPath as laravelRedirectPath;
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;

    // public function redirectTo() {
    //     if(Auth::user()->role_as == "admin") {
    //         return "dashboard";
    //         // return redirect('/dashboard')->with('status', 'You are succesfully login');
    //     }

    //     if(Auth::user()->role_as == "vendor") {
    //         return "vendor-dashboard";
    //     }

    //     if(Auth::user()->role_as == "user") {
    //         return "home";
    //     }
    // }

    public function authenticated() {
        if(Auth::user()->role_as == "admin") {
            // return "dashboard";
            return redirect('/dashboard')->with('status', 'Welcome to your dashboard');
        }

        if(Auth::user()->role_as == "vendor") {
            // return "vendor-dashboard";
            return redirect('/dashboard')->with('status', 'Logged in as vendor successfully');
        }

        if(Auth::user()->role_as == "user") {
            // return "home";
            return redirect()->back()->with('status', 'Logged in as user successfully');
        }
    }

    // public function redirectPath()
    // {
    //     // Do your logic to flash data to session...
    //     session()->flash('message', 'Successfully login');

    //     // Return the results of the method we are overriding that we aliased.
    //     return $this->laravelRedirectPath();
    // }

    /**
     * The user has been authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    // protected function authenticated(Request $request, $user)
    // {
    //     $request->session()->flash('flash_notification.success', 'Congratulations, you have cracked the code!');
    //     return redirect()->intended($this->redirectPath());
    // }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
