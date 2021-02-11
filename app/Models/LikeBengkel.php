<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LikeBengkel extends Model
{
    use HasFactory;    

    protected $table = 'like_bengkel';
    protected $fillable = ['like', 'dislike'];
    protected $guarded = ['post_id', 'user_id'];

    public function post()
    {
    	return $this->belongsTo(Bengkel::class);
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
