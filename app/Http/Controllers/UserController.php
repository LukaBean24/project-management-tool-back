<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
	public function getAllWorkspacesForUser(User $user)
	{
		return response()->json($user->workspaces);
	}

	public function getAllTeamsForUser(User $user)
	{
		return response()->json($user->teams);
	}

	public function getAllChatsForUser(User $user)
	{
		return response()->json($user->chats);
	}

	public function getAllNotificationsForUser(User $user)
	{
		return response()->json($user->notifications);
	}

	public function getAllEventsForUser(User $user)
	{
		return response()->json($user->events);
	}
}
