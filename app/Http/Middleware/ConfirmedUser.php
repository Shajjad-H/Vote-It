<?php

namespace App\Http\Middleware;

use Closure;
use App\Providers\CasServiceProvider;
use App\User;

class ConfirmedUser
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
        if(!CasServiceProvider::auth())
            return redirect('/');
        $pseudo = CasServiceProvider::pseudo();
        if(!User::alradyRegistered($pseudo)) {
            $user = new User();
            $user->signeInNewUser(CasServiceProvider::ldapUser($pseudo));
            return redirect('/user/' . $user->id);
        }
        
        return $next($request);
    }
}
