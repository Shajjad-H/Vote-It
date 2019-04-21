<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GroupeVotes extends Model
{
    public $timestamps = false;    
    protected $fillable = ['vote_id', 'groupe_id'];
}
