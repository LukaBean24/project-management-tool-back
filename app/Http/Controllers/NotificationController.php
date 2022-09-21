<?php

namespace App\Http\Controllers;

use App\Models\Notification;

class NotificationController extends Controller
{
	public function getSenderForNotification(Notification $notification)
	{
		return response()->json($notification->sender);
	}

	public function getReceiverForNotification(Notification $notification)
	{
		return response()->json($notification->receiver);
	}
}
