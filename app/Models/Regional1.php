<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Regional1 extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'jumlah', 'kategori'];
}
