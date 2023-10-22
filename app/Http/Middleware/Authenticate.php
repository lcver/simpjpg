<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Closure;
use Auth;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()){
            return route('login');
        }    
    }

    //this method will be triggered before your controller constructor
    public function handle($request, Closure $next, ...$guards)
    {
        if (Auth::check()) {
            return $next($request);
        }
        return redirect()->route('login');
    }
}
