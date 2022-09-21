<?php

namespace App\Http\Controllers;

use App\Models\Chat;

class ChatController extends Controller
{
	public function getAllMessagesForChat(Chat $chat)
	{
		return response()->json($chat->messages);
	}
}
