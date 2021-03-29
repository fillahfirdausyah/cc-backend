<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksis';

    protected $fillable = ['item_id', 'buyer_id', 'seller_id'];

    public function seller()
    {
    	return $this->belongsTo(User::class, 'seller_id');
    }

    public function buyer()
    {
    	return $this->belongsTo(User::class, 'buyer_id');
    }

    public function item()
    {
        return $this->belongsTo(Merchandise::class, 'item_id');
    }
}
