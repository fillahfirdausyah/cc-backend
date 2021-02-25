<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments_SR extends Model
{
    use HasFactory;

    protected $table = 'comments_showroom';
    protected $fillable = ['comment', 'parent_id', 'post_id'];

    public function comment(){
    	return $this->belongsTo('App\Models\SR');
    } 

    public function user()
    {
    	return $this->hasOne('App\Models\User','id', 'user_id');
    }

    public function child()
    {
        return $this->hasMany('App\Models\Comments_SR', 'parent_id');
    }

    public function childs()
    {
        return $this->belongsTo('App\Models\Comments_SR');
    }
}
