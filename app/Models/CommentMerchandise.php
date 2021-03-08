<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentMerchandise extends Model
{
    use HasFactory;

    protected $table = 'comment_merchandise';
    protected $fillable = ['comment', 'post_id'];

    public function user()
    {
    	return $this->hasOne(User::class,'id', 'user_id');
    }
    
    public function comment(){
    	return $this->belongsTo(Merchandise::class);
    } 

}
