<?php

namespace App\Http\Middleware;

use Closure;
use  App\Providers\CasServiceProvider;

class CasUnconfirmedLogin
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
        CasServiceProvider::login();
        if( $request->path() != "user/logout" && CasServiceProvider::user()->confirmed != 0) 
            return redirect('/');

        return $next($request);
    }
}
