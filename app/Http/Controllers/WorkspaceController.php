<?php

namespace App\Http\Controllers;

use App\Models\Workspace;

class WorkspaceController extends Controller
{
	public function getAllUsersForWorkspace(Workspace $workspace)
	{
		return response()->json($workspace->users);
	}

	public function getAllProjectsForWorkspace(Workspace $workspace)
	{
		return response()->json($workspace->projects);
	}

	public function getAllTasksForWorkspace(Workspace $workspace)
	{
		return response()->json($workspace->tasks);
	}

	public function getAllTeamsForWorkspace(Workspace $workspace)
	{
		return response()->json($workspace->teams);
	}

	public function getAllEventsForWorkspace(Workspace $workspace)
	{
		return response()->json($workspace->events);
	}
}
