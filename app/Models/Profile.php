<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = ['bio', 'pekerjaan', 'alamat', 'hobi', 'foto_profile', 'foto_sampul'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
