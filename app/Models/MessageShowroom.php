<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MessageShowroom extends Model
{
    use HasFactory;

    protected $fillable = [
    'sender_id', 'receiver_id', 'message', 'read_at'
	];
	protected $casts = [
	    'read_at' => 'datetime',
	];

	public function users()
	{
	    return $this->belongsTo(User::class, 'sender_id');
	}
	public function userFrom()
	{
	    return $this->belongsTo(User::class, 'sender_id');
	}
	public function userTo()
	{
	    return $this->belongsTo(User::class, 'receiver_id');
	}
}
