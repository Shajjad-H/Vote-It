<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Roles;
use App\UserRoles;
use App\UserGroupes;
use App\Groupe;
use App\Tags;
use App\Votes;
use App\GroupeVotes;
use App\Providers\CasServiceProvider as Cas;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection;

class User extends Model
{
    static protected $user;
    
    /**
    *  returns related  
    */
    public function ralatedVotes()
    {
        $user = Cas::user();
        $ids =   DB::select("SELECT DISTINCT votes.id FROM 
                users JOIN user_groupes ON users.id = user_groupes.user_id
                JOIN groupe_votes ON user_groupes.id = groupe_votes.groupe_id
                JOIN votes ON groupe_votes.vote_id = votes.id OR votes.user_id = $user->id
            WHERE users.id = $user->id
        ");
        
        $this->transformeIds($ids);
        return Votes::whereIn('id', $ids)->orderByDesc('created_at')->get();
        return Votes::find($ids)->orderBy('id');
        
    }

    /**
     * trans from an array of ids like 
     * [
     *      id -> 1,
     *      id -> 2
     * ] to [1, 2]
     */
    public function transformeIds(Array & $ids) {

        foreach ($ids as & $value)
            $value = $value->id;
    }


    static public function etudiants()
    {
    
        return DB::select('SELECT roles.role, COUNT(DISTINCT user_roles.user_id) as nb_users 
                FROM roles JOIN user_roles ON roles.id = user_roles.role_id 
                    GROUP BY roles.role');
               
    }

    public function votes()
    {
        return $this->hasMany('App\Votes', 'user_id', 'id');
    }
    


    public function taggedVotes()
    {
        $tags = Tags::where('user_id', $this->id)->get()->map(function ($tag) {
            return $tag->vote_id;
        })->all();

        return Votes::find($tags);
    }

    public function ownedGroupesVotes()
    {
        if(!$this->isAdmin() && !$this->isTeacher())
            return false;

        $groupeVotes = [];
        foreach ($this->ownedGroupes()->get() as $groupe) 
            $groupeVotes = array_merge($groupeVotes, GroupeVotes::where('groupe_id', $groupe->id)->get()->all());
        $voteIds = [];
        foreach ($groupeVotes as $grpVote) 
            array_push($voteIds, $grpVote->vote_id);
        return Votes::find($voteIds);
    }


    /**
     * Levensthein Distance may be
     */
    static public function getSimilarTo($pseudoOrName)
    {
        return User::select('ps_fname')
                 ->where('ps_fname', 'LIKE','%' . $pseudoOrName . '%')
                 ->limit(10)
                 ->get()->toJson();

    }

    static public function alradyRegistered(String $pseudo) 
    {
        return !empty(User::getUser($pseudo));
    }

    static public function getUser($pseudo)
    {
        if(empty(User::$user))
            User::$user =  User::where('pseudo', $pseudo)->first();
        
        return User::$user;
    }

    static public function getUserFromJson($jsonString)
    {
        $json = new Collection(json_decode($jsonString));
        $ps_fnames = $json->map(function ($val) {
            return $val->value;
        });
        $users = [];
        foreach ($ps_fnames as $ps_fname) {
            $user = User::select('id')->where('ps_fname', $ps_fname)->firstOrFail();
            array_push($users, $user->id);
        }
        return $users;
    }

    /**
     * Signe in a new user 
     * should not be called twice for a same user
     */
    static public function signeInNewUser($ldapUserInfo)
    {
        $user = new User();

        // parsing ldap informations
        $user->pseudo = $ldapUserInfo->get('uid')[0];
        // $user->fullname = $ldapUserInfo->get('sn')[0] . " " . $ldapUserInfo->get('givenname')[0];
        $user->ps_fname = $ldapUserInfo->get('gecos')[0];
        $user->email = $ldapUserInfo->get('mail')[0];
        $user->sex = $ldapUserInfo->get('supanncivilite')[0];

        $userRole = $ldapUserInfo->get('title')[0];

        $user->save();

        $role = Roles::firstOrCreate([
            'role' => $userRole
        ]);
        
        $userRoles = UserRoles::firstOrCreate([
            'user_id' => $user->id,
            'role_id' => $role->id
        ]);

        User::$user = $user;

        return $user;

    }

    public function ownedGroupes()
    {
        return $this->hasMany('App\Groupe', 'owner_id', 'id')->orderByDesc('id');        
    }

    public function groupes()
    {
        return $this->belongsToMany(Groupe::class, 'user_groupes', 'user_id', 'groupe_id');   
    }

    public function roles()
    {
        $UserRoles = UserRoles::where('user_id', $this->id)->get();
        $rolesId = $UserRoles->map(function ($userRole) {
            return $userRole->role_id;
        })->all();
        
        return Roles::find($rolesId)->all();    
    }

    public function hasRole(String $role)
    {
        $roles = $this->roles();
        foreach ($roles as $m_role) {
            if($m_role->role == $role)
                return true;
        }

        return false;
    }

    public function isStudent()
    {
        return $this->hasRole('etudiant');
    }

    public function isTeacher()
    {
        return $this->hasRole('personnel');
    }

    public function isAdmin()
    {
        return $this->hasRole('admin');
    }

}
