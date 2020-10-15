<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class Item extends Model
{
    
	public function user(){
		return $this->belongsTo('App\User','last_updated_by');
	}

}