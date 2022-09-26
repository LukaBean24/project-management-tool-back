<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use Carbon\Carbon;

class ChatController extends Controller
{
	public function getAllMessagesForChat(Chat $chat)
	{
		return response()->json($chat->messages);
	}

	public function getAllUsersForChat(Chat $chat)
	{
		return response()->json($chat->users);
	}

	public function getAllLastMessageForChat(Chat $chat)
	{
		return response()->json(['message' => $chat->messages->last(), 'ago' => Carbon::createFromDate($chat->messages->last()->created_at)->diffForHumans()]);
	}
}
