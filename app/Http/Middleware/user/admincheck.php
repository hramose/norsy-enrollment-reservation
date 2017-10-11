<?php

namespace App\Http\Middleware\user;

use Closure;
use Illuminate\Support\Facades\Auth;
class admincheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(!Auth::check()){
            return redirect()->route('login');
        }
        
        if(Auth::check()){
            if(Auth::user()->role_id != 1){
                return 'Please login as Admin';
            }
        }
       
        return $next($request);
    }
}
