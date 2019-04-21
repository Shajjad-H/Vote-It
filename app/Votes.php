<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

use App\GroupeVotes;
use App\Tags;
use App\VoteResult;
use App\Groupe;

class Votes extends Model
{
    protected $fillable = ['titre', 'description', 'etat', 'user_id'];

    public function VotesEtu()
    {
        return DB::select('SELECT * FROM votes NA');
    }


    public function importGroupe($groupeIds)
    {
        foreach ($groupeIds as $groupeId) {
            GroupeVotes::firstOrCreate([
                'groupe_id' => $groupeId,
                'vote_id' => $this->id
            ]);
        }
    }

    public function importUser($userIds)
    {
        foreach ($userIds as $userId) {
            Tags::firstOrCreate([
                'user_id' => $userId,
                'vote_id' => $this->id
            ]);
        }
    }

    
    public function result(User $user)
    {
        $result = VoteResult::where('vote_id', $this->id)
                    ->where('user_id', $user->id)->get()->first();
        
        if($result != null)
            return $result->outcome;
        return $result;
    }




    public function groupes()
    {
        return $this->belongsToMany(Groupe::class, 'groupe_votes', 'vote_id', 'groupe_id');
    }
    

    public function users()
    {
        return $this->belongsToMany(User::class, 'tags', 'vote_id', 'user_id');
    }

    public function for()
    {
        return VoteResult::where('vote_id', $this->id)
                           ->where('outcome', 'for')->count();

    }

    public function indifferent()
    {
        return VoteResult::where('vote_id', $this->id)
                           ->where('outcome', 'meh')->count();

    }

    public function against()
    {
        return VoteResult::where('vote_id', $this->id)
                           ->where('outcome', '!for')->count();
    }
    
    public function total()
    {
        $total = DB::select("SELECT  COUNT(DISTINCT users.id) as total FROM 
        votes JOIN groupe_votes ON votes.id = groupe_votes.vote_id  
        JOIN groupes ON groupe_votes.groupe_id = groupes.id 
        JOIN user_groupes ON  groupes.id = user_groupes.groupe_id
        JOIN users ON user_groupes.user_id = users.id
            WHERE votes.id = $this->id;");
        return $total[0]->total;
    }
}
