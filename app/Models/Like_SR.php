<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like_SR extends Model
{
    use HasFactory;
    
    protected $table = 'like';
    protected $fillable = ['like', 'dislike'];
    protected $guarded = ['post_id', 'user_id'];

    public function post()
    {
    	return $this->belongsTo('App\Models\SR');
    }

    public function user()
    {
    	return $this->belongsTo('App\Models\User');
    }
}
