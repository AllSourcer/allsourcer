<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Filter extends Model
{
    function tasks(){
        return $this->belongsTo(Task::class);
    }
}
