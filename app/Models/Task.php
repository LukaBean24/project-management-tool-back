<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
	use HasFactory;

	public function project()
	{
		return $this->belongsTo(Project::class);
	}

	public function workspace()
	{
		return $this->belongsTo(Workspace::class);
	}

	public function comments()
	{
		return $this->hasMany(Comment::class);
	}
}
