<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;
use Illuminate\Support\Facades\DB;

class Post extends Model
{
    protected $fillable = ['titre', 'description', 'user_id', 'groupe_id'];

    static public function userPosts(User $user)
    {
        
        $postIds = DB::select('SELECT DISTINCT posts.id FROM 
                users JOIN user_groupes ON users.id = user_groupes.user_id
                JOIN posts ON posts.groupe_id = user_groupes.user_id OR  posts.user_id = users.id
            WHERE users.id = ' . $user->id);
        
        $user->transformeIds($postIds);
        return Post::whereIn('id', $postIds)->orderByDesc('created_at')->get();
    }

    public function comments()
    {
       return $this->hasMany('App\Comment');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function groupe()
    {
        return $this->belongsTo('App\Groupe');
    }
}
