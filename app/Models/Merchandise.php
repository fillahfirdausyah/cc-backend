<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Merchandise extends Model
{
    use HasFactory;

    protected $table = "merchandise";

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function region()
    {
    	return $this->belongsTo(Region::class);
    }

    public function wishlist()
    {
        return $this->hasMany(Wishlist::class, 'produk_id', 'id');
    }
}
