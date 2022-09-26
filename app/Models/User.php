<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements JWTSubject
{
	use HasApiTokens, HasFactory, Notifiable;

	public function getJWTIdentifier()
	{
		return $this->getKey();
	}

		public function getJWTCustomClaims()
		{
			return [];
		}

	protected $guarded = ['id'];

	protected $hidden = [
		'password',
		'remember_token',
	];

	protected $casts = [
		'email_verified_at' => 'datetime',
	];

	public function workspaces()
	{
		return $this->belongsToMany(Workspace::class);
	}

	public function teams()
	{
		return $this->belongsToMany(Team::class);
	}

	public function chats()
	{
		return $this->belongsToMany(Chat::class);
	}

	// public function chatsWithPair()
	// {
	// 	$users = [];
	// 	foreach ($this->chats as $chat)
	// 	{
	// 		$users[] = Chat::find($chat['id'])->users;
	// 	}

	// 	return $this->chats;
	// }

	public function notifications()
	{
		return $this->hasMany(Notification::class, 'to_id');
	}

	public function events()
	{
		return $this->belongsToMany(Event::class);
	}

	public function upcomingEvents()
	{
		return $this->events()->whereBetween('start_date', [Carbon::now(), Carbon::now()->addDays(3)]);
	}
}
