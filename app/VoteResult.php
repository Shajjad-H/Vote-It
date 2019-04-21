<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VoteResult extends Model
{
    public $timestamps = false;
    protected $fillable = ['user_id', 'vote_id'];

}
