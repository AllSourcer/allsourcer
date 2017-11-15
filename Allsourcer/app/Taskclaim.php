<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Taskclaim extends Model
{
    //
    public function users(){
    	return $this->belongsTo(User::class);
    }
  
}
