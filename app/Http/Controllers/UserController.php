<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Roles;
use App\UserRoles;

use App\Providers\CasServiceProvider as Cas;

class UserController extends Controller
{

    public function welcome()
    {
        if(Cas::auth() && Cas::user()->confirmed == 0)
            return view('unconnected.accept-login');
        
        return view('welcome')->with([
            "total_users" => User::all()->count(),
            "role_users" => User::etudiants()
        ]);
    }


    public function login()
    {
        Cas::login();
        return redirect('/');
    }


    public function comfirme()
    {
        $user = Cas::user();
        $user->confirmed = true;
        $user->save();
        return redirect('/');
    }

    public function get($pseudo)
    {
        return User::getSimilarTo($pseudo); 
    }

    public function edit(User $user)
    {
        
    }

    public function addRole(User $user, Request $request)
    {

        $role = $request->validate([
            'role' => 'required|max:255',
        ]);

        $role = Roles::firstOrCreate([
            'role' => strtolower($role['role'])
        ]);

        $userRoles = UserRoles::firstOrCreate([
            'user_id' => $user->id,
            'role_id' => $role->id
        ]);

        return back();
    }

    public function removeRole(User $user, Roles $role)
    {
        UserRoles::where('user_id', $user->id)
                    ->where('role_id', $role->id)->delete();
        return back();
    }

    public function show(User $user)
    {
        return view('user.show')->with('profile', $user);
    }

    public function logout()
    {
        Cas::logout();
    }

    
}
