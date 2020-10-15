<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class SR extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'show_room';
    protected $fillable = [ 'judul', 
    						'deskripsi',
    						'gambar',
    						'harga',
    						'dagangan'
    						];
}
