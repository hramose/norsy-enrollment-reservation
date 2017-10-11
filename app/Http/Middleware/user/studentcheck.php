<?php

namespace App\Http\Middleware\user;

use Closure;
use Auth;
class studentcheck
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
            if(Auth::user()->role_id != 2){
                return 'Please login as student';
            }
        }
        return $next($request);
    }
}
