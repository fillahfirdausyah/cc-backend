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

    public function user() 
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function comment()
    {
        return $this->hasMany(Comments_SR::class, 'post_id')->whereNull('parent_id');
    }

    public function like()
    {
        return $this->hasMany(Like_SR::class, 'post_id');
    }

}
