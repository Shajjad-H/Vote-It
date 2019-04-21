<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use phpCAS;
use View;
use Adldap\Laravel\Facades\Adldap;
use Illuminate\Support\Collection;

use App\User;




class CasServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->bindCas();
    }

    static public function user()
    {
        $pseudo = CasServiceProvider::pseudo();
        if($pseudo == null)
            return null;

        
        if(!User::alradyRegistered($pseudo))
            return User::signeInNewUser(CasServiceProvider::ldapUser($pseudo));

        return User::getUser($pseudo);
    }

    static public function ldapUser(String $uid)
    {
        if(!$uid)
            return null;
        
        $queryResult = Adldap::search()->where('uid', '=', $uid);
        // formates in a collection
        return new Collection($queryResult->get()->first()['attributes']);
    }

    /**
     * force cas login
     * this will result a redirect to $cas_host "cas.univ-lyon1.fr"
     */

    static public function login()
    {
        phpCAS::forceAuthentication();
    }

    /**
     * logs a user out only if the user is logged in
     */

    static public function logout()
    {
        if(CasServiceProvider::auth())
            phpCAS::logout();
    }


    /**
     * Return the current user or null if the user 
     * is not looged in
     * note: After we should use User Model in DB
     */
    static public function pseudo()
    {
        if(phpCAS::isAuthenticated())
            return lcfirst(phpCAS::getUser());
        
        return null;
    }

    /**
     * Return if a user is logged in
     */
    static public function auth()
    {
        return phpCAS::isAuthenticated();
    }

    /**
     * Return true is no user is logged in
     */
    static public function guest()
    {
        return !CasServiceProvider::auth();
    }

    /**
     * bind cas service with it's parameters
     * all other parameters may be defined in here or in the env
     */

    private function bindCas()
    {
        $cas_host = "cas.univ-lyon1.fr";
        $cas_context = '/cas';
        $cas_port = 443;
        //phpCAS::setDebug();
        //phpCas::setVerbose(true);
        phpCAS::client(CAS_VERSION_2_0, $cas_host, $cas_port, $cas_context);
        phpCAS::setNoCasServerValidation();
    }


    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer("*", function ($view) {
            $user = CasServiceProvider::user();
            //dd($user);
            $view->with('user', $user);
        });
    }

}
