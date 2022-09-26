<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Project;
use App\Models\Task;
use Carbon\Carbon;

class CalendarController extends Controller
{
	public function GetAllEventsAndDeadlinesForMonth()
	{
		$data = [];
		$events = Event::select('start_date', 'id')->whereBetween('start_date', [request('date') . ' 00:00:00', date_format(Carbon::createFromDate(request('date'))->addMonth()->subDay(), 'Y-m-d') . ' 23:59:59'])->where('workspace_id', request('workspace'))->get();
		$projects = Project::select('finish_date', 'id')->whereBetween('finish_date', [request('date'), date_format(Carbon::createFromDate(request('date'))->addMonth()->subDay(), 'Y-m-d')])->where('workspace_id', request('workspace'))->get();
		$tasks = Task::select('finish_date', 'id')->whereBetween('finish_date', [request('date'), date_format(Carbon::createFromDate(request('date'))->addMonth()->subDay(), 'Y-m-d')])->where('workspace_id', request('workspace'))->get();
		foreach ($events as $event)
		{
			$event['type'] = 'Event';
			$event['start_date'] = substr($event['start_date'], 0, 10);
			$data[] = $event;
		}
		foreach ($projects as $project)
		{
			$project['type'] = 'Project';
			$data[] = $project;
		}
		foreach ($tasks as $task)
		{
			$task['type'] = 'Task';
			$data[] = $task;
		}
		return response()->json($data);
	}
}
