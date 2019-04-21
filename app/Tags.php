<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    public $timestamps = false;
    protected $fillable = ['vote_id', 'user_id'];
    
}
