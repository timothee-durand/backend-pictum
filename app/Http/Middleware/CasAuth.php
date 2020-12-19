<?php

namespace App\Http\Middleware;

use Closure;


class CasAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if( ! cas()->checkAuthentication() )
        {
           return response("CAS Authentification Failed", 401);
        }

        $request->username = cas()->user();
        return $next($request);
    }
}

