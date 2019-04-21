<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserGroupes extends Model
{
    public $timestamps = false;    
    protected $fillable = ['user_id', 'groupe_id'];
}
