<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class SR extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'show_room';
    protected $fillable = [ 'judul', 
    						'deskripsi',
    						'gambar',
    						'harga',
    						'dagangan',
    						'slug'
    						];


   public function getRouteKeyName(){
   		return 'judul';
   }

    public function comment()
    {
        return $this->hasMany('App\Models\Comments', 'post_id')->whereNull('parent_id');
    }

    public function like()
    {
        return $this->hasMany('App\Models\Like', 'post_id');
    }

}
