<?php

namespace App\Http\Middleware;
use Auth;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
     protected function redirectTo($request)
    {
       // if ($this->auth->guest())
        // {
            // if ($request->ajax())
            // {
            //     return response('Unauthorized.',"you are not allowed to access");
            // }
            // else
            // {
            //     return redirect()->guest('auth/login');
            // }
        // }

        // return $next($request);
        if (! $request->expectsJson()) {
            return route('login');
        }
    }
}
