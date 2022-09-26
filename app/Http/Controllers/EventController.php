<?php

namespace App\Http\Controllers;

use App\Models\Event;

class EventController extends Controller
{
	public function getSingleEvent(Event $event)
	{
		return response()->json($event);
	}
}
