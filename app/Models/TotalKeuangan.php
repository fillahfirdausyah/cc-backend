<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TotalKeuangan extends Model
{
    use HasFactory;

    protected $fillable = ['region_id', 'jumlah'];

    public function region()
    {
        return $this->belongsTo(Region::class);
    }
}
