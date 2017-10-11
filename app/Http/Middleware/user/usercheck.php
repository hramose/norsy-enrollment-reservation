<?php

namespace App\Http\Middleware\user;

use Closure;
use Auth;
class usercheck
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
       
        return $next($request);
    }
}
