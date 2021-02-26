<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    // use HasFactory, Notifiable;
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime', 
    ];

    public function showroom()
    {
        return $this->belongsTo(SR::class);
    }

    public function like()
    {
        return $this->hasMany(Like::class);
    }

    public function post()
    {
        return $this->hasMany(Post::class)->latest();
    }

    public function region()
    {
        return $this->belongsToMany(Region::class);
    }

    public function comment()
    {
        return $this->belongsToMany(CommentPost::class);
    }

    public function comment_SR()
    {
        return $this->belongsTo(Comment_SR::class);
    }

    public function bengkel()
    {
        return $this->belongsTo(Bengkel::class);
    }
      
    public function keuangan()
    {
        return $this->hasMany(Keuangan::class);
    }
}
