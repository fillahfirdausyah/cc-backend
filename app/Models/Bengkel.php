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
        return $this->hasOne(User::class);
    }

    public function comment()
    {
        return $this->hasMany(CommentBengkel::class, 'post_id')->whereNull('parent_id');
    }

    public function like()
    {
        return $this->hasMany(LikeBengkel::class, 'post_id');
    }

}
