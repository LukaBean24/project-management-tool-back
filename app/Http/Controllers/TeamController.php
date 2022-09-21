<?php

namespace App\Http\Controllers;

use App\Models\Team;

class TeamController extends Controller
{
	public function getMembersForTeam(Team $team)
	{
		return response()->json($team->members);
	}

	public function getWorkspaceForTeam(Team $team)
	{
		return response()->json($team->workspace);
	}
}
