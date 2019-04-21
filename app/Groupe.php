<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\UserGroupes;
use App\Votes;

class Groupe extends Model
{
    protected $fillable = ['nom', 'owner_id'];


    static public function getSimilarTo($name)
    {
        return Groupe::select('nom')
            ->where('nom', 'LIKE','%' . ucwords($name) . '%')
            ->limit(10)
            ->get()->toJson();
    }


    public function userIds()
    {
        return UserGroupes::select('user_id')->where('groupe_id', $this->id)->get()->map(function ($id) {
            return $id->user_id;
        });
    }

    static public function getGroupesFromNames(String $names)
    {
        $names = new \Illuminate\Support\Collection(json_decode($names));
        $names = $names->map(function ($val) {
            return $val->value;
        });

        $groupes = new \Illuminate\Support\Collection();
        foreach ($names as $name) {
            $groupe = Groupe::where('nom', $name)->first();
            $groupes->push($groupe);
        }
        return $groupes;
    }

    public function importUsers($userIds)
    {
        foreach ($userIds as $userId) {
            UserGroupes::firstOrCreate([
                'groupe_id' => $this->id,
                'user_id' => $userId
            ]);
        }   
            
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_groupes', 'groupe_id', 'user_id');
    }

    public function votes()
    {
        return $this->belongsToMany(Votes::class, 'groupe_votes', 'vote_id', 'groupe_id');
    }
}
