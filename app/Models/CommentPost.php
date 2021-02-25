<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentPost extends Model
{
    use HasFactory;

    protected $table = 'comments_post';
    protected $fillable = ['comment'];

    public function comments()
    {
        return belongsTo(Post::class);
    }

	public function child()
    {
        return $this->hasMany(CommentPost::class, 'parent_id');
    }

    public function user()
    {
        return $this->hasMany(User::class, 'id', 'user_id');
    }
}
