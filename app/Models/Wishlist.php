<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory;

    protected $table = 'wishlist';

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function car()
    {
    	return $this->belongsTo(SR::class, 'produk_id', 'id');
    }

    public function autoshop()
    {
    	return $this->belongsTo(Bengkel::class, 'produk_id', 'id');
    }

    public function merchandise()
    {
    	return $this->belongsTo(Merchandise::class, 'produk_id', 'id');
    }
}
