<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TotalKeuangan extends Model
{
    use HasFactory;

    protected $fillable = ['region_id', 'jumlah'];

    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    public function keuangan()
    {
        return $this->belongsTo(Keuangan::class);
    }
}
