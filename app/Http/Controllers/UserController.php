<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Workspace;
use Illuminate\Support\Facades\DB;

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

	public function getUpcomingEventsForUser(User $user)
	{
		return response()->json($user->upcomingEvents);
	}

	public function getUserRoleForWorkspace(User $user, Workspace $workspace)
	{
		$role = DB::select('select role from user_workspace where user_id = ? AND workspace_id = ?', [$user->id, $workspace->id]);
		return response()->json($role);
	}
}
