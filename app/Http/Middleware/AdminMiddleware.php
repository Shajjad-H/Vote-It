<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use App\Providers\CasServiceProvider as Cas;

class AdminMiddleware
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
        $user = Cas::user();

        if($user == null) 
            return back();
        
        if($user->isAdmin())
            return $next($request);
            
        return back();
    }
    
}
