<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promo_SR extends Model
{
    use HasFactory;

    protected $table = 'promo';

    public function promo()
    {
    	return $this->belongsTo('App\Models\SR');
    }
}
