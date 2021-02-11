<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuktiIuran extends Model
{
    use HasFactory;

    protected $fillable = ['keuangan_id', 'gambar'];

    public function Keuangan()
    {
        return $this->belongsTo(Keuangan::class);
    }
}
