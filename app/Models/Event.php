<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
	use HasFactory;

	public function creator()
	{
		return $this->belongsTo(User::class);
	}

	public function members()
	{
		return $this->belongsToMany(User::class);
	}

	public function workspace()
	{
		return $this->belongsTo(Workspace::class);
	}
}
