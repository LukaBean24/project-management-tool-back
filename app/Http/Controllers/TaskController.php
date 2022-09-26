<?php

namespace App\Http\Controllers;

use App\Models\Task;

class TaskController extends Controller
{
	public function get(Task $task)
	{
		return response()->json($task);
	}

	public function getProjectForTask(Task $task)
	{
		return response()->json($task->project);
	}

	public function getWorkspaceForTask(Task $task)
	{
		return response()->json($task->workspace);
	}

	public function getCommentsForTask(Task $task)
	{
		return response()->json($task->comments);
	}
}
