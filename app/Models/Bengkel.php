<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bengkel extends Model
{
    use HasFactory;

    protected $table = 'bengkel';

    public function daerah()
    {
        return $this->hasOne(Region::class,'id', 'region_id');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function comment()
    {
        return $this->hasMany(CommentBengkel::class, 'post_id');
    }

    public function like()
    {
        return $this->hasMany(LikeBengkel::class, 'post_id');
    }


    public function wishlist()
    {
        return $this->hasMany(Wishlist::class, 'produk_id', 'id');
    }

    public static function boot() {
        parent::boot();
    
        static::deleting(function($bengkel) {
            $bengkel->comment()->delete();
            $bengkel->wishlist()->delete();
        });
    } 
}
