<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'users';
    protected $fillable = [ 'nama', 'email', 'password', 'aset'];
    protected $hidden = [ 'password', 'remember_token'];
    protected $casts = [ 'email_verified_at' => 'datetime' ];

}
