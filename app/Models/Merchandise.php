<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Merchandise extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "merchandise";
    protected $dates = ['deleted_at'];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function comment()
    {
        return $this->hasMany(CommentMerchandise::class, 'post_id');
    }

    public function region()
    {
    	return $this->belongsTo(Region::class);
    }

    public function wishlist()
    {
        return $this->hasMany(Wishlist::class, 'produk_id', 'id');
    }

    public function transaction()
    {
        return $this->morphOne(Transaksi::class, 'transactionable');
    }

    public static function boot() {
        parent::boot();
    
        static::deleting(function($bengkel) {
            $bengkel->wishlist()->delete();
        });
    } 
}
