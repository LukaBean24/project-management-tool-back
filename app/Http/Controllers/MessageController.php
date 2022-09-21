<?php

namespace App\Http\Controllers;

use App\Models\Message;

class MessageController extends Controller
{
	public function getSenderForMessage(Message $message)
	{
		return response()->json($message->sender);
	}

	public function getReceiverForMessage(Message $message)
	{
		return response()->json($message->receiver);
	}

	public function getChatForMessage(Message $message)
	{
		return response()->json($message->chat);
	}
}
