<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VendorMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::user()->role_as == "vendor") {
            if(Auth::check() && Auth::user()->isban) {
                $banned = Auth::user()->isban == "1";
                Auth::logout();
                if($banned == 1) {
                    $message = "Your account has been banned. please contact administrator";
                }

                return redirect()->route('login')
                ->with('status',$message)
                ->withErrors(['email'=>'Your account has been banned. please contact administrator']);
            }
            return $next($request);
        } else {
            return redirect('/home')->with('status', 'You are not allowed to access the VENDOR Dashboard!');
        }

    }
}
