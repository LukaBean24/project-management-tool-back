<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workspace extends Model
{
	use HasFactory;

	public function users()
	{
		return $this->belongsToMany(User::class);
	}

	public function projects()
	{
		return $this->hasMany(Project::class);
	}

	public function tasks()
	{
		return $this->hasMany(Project::class);
	}

	public function teams()
	{
		return $this->hasMany(Team::class);
	}

	public function events()
	{
		return $this->hasMany(Event::class);
	}
}
