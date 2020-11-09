<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    use HasFactory;

    protected $table = 'comments_showroom';
    protected $fillable = ['comment', 'parent_id', 'post_id'];

    public function comment(){
    	return $this->belongsTo('App\Models\SR');
    } 

    public function user()
    {
    	return $this->belongsTo('App\Models\User');
    }

    public function child()
    {
        return $this->hasMany('App\Models\Comments', 'parent_id');
    }

    public function childs()
    {
        return $this->belongsTo('App\Models\Comments');
    }
}
