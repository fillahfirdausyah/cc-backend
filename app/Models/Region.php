<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;

    protected $fillable = ['region'];

    public function user()
    {
        return $this->belongsToMany(User::class);
    }

    public function keuangan()
    {
        return $this->hasMany(Keuangan::class);
    }

    public function bengkel()
    {
        return $this->belongsTo(Bengkel::class);
    }

    public function merchandise()
    {
        return $this->hasOne(Merchandise::class);
    }
}
