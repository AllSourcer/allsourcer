<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','phone','provider', 'provider_id','photo'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    function taskclaims(){
        return $this->belongsToMany('App\Task', 'taskClaims', 'user_id', 'task_id');
    }
    function taskCreate(){
         return $this->belongsToMany('App\Task', 'taskcreators', 'user_id', 'task_id');
    }
    function taskClaimed(){
        return $this->hasMany(Taskclaim::class);
    }
    function comment(){
        return $this->hasMany('App\Comment');
    }
}
