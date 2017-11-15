<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
protected $fillable = [
        'filter_id', 'type', 'title','price','description','duration','work_location','status',
    ];

    //a task has many claims
    function taskclaims(){
        return $this->belongsToMany('App\User');
    }
//a task has one filter
    function filters(){
       return $this->belongsToMany('App\User');
    }

    function comment(){
    	return $this->hasMany('App\Comment');
    }
}
