<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;
use Symfony\Component\HttpFoundation\Response;

class CustomMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(session()->get('role')=='NonAdmin'){
             return $next($request);

           
        }
        elseif(session()->get('role')=='Admin'){
           
            return $next($request);

        }
        else{
           return redirect('/'); 
        }
 
    }    
    }
