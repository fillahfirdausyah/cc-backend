<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{

    protected $table = "news";
    protected $fillable = ['judul','content','tanggal','aset'];

    public $timestamps = false;
}
    use HasFactory;

    protected $fillable = ['judul', 'kategori', 'content', 'gambar'];

}
