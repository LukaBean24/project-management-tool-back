<?php

namespace App\Http\Controllers;

use App\Models\Project;

class ProjectController extends Controller
{
	public function getAllTasksForProject(Project $project)
	{
		return response()->json($project->tasks);
	}

	public function getWorkspaceForProject(Project $project)
	{
		return response()->json($project->workspace);
	}
}
