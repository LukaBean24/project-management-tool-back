<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\EmailVerifyController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WorkspaceController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::controller(AuthController::class)->group(function () {
	Route::post('/register', 'register')->name('register');
	Route::post('/login', 'login')->name('login');
});

Route::controller(EmailVerifyController::class)->group(function () {
	Route::get('/verify-email/{user}', 'verify')->name('verify');
});

Route::middleware('auth:api')->group(function () {
	Route::controller(AuthController::class)->group(function () {
		Route::post('/logout', 'logout')->name('logout');
		Route::post('/refresh', 'refresh')->name('refresh_token');
		Route::post('/user', 'user')->name('user_info');
	});
	Route::controller(UserController::class)->group(function () {
		Route::get('/users/{user}/workspaces', 'getAllWorkspacesForUser')->name('users.workspaces');
		Route::get('/users/{user}/teams', 'getAllTeamsForUser')->name('users.teams');
		Route::get('/users/{user}/chats', 'getAllChatsForUser')->name('users.chats');
		Route::get('/users/{user}/notifications', 'getAllNotificationsForUser')->name('users.notifications');
		Route::get('/users/{user}/events', 'getAllEventsForUser')->name('users.events');
		Route::get('/users/{user}/upcoming-events', 'getUpcomingEventsForUser')->name('users.upcoming-events');
		Route::get('/users/{user}/role/{workspace}', 'getUserRoleForWorkspace')->name('users.workspace_role');
	});
	Route::controller(WorkspaceController::class)->group(function () {
		Route::get('/workspaces/{workspace}/users', 'getAllUsersForWorkspace')->name('workspaces.users');
		Route::get('/workspaces/{workspace}/projects', 'getAllProjectsForWorkspace')->name('workspaces.projects');
		Route::get('/workspaces/{workspace}/tasks', 'getAllTasksForWorkspace')->name('workspaces.tasks');
		Route::get('/workspaces/{workspace}/teams', 'getAllTeamsForWorkspace')->name('workspaces.teams');
		Route::get('/workspaces/{workspace}/events', 'getAllEventsForWorkspace')->name('workspaces.events');
	});
	Route::controller(ProjectController::class)->group(function () {
		Route::get('/projects/{project}', 'get')->name('projects.get');
		Route::get('/projects/{project}/tasks', 'getAllTasksForProject')->name('projects.tasks');
		Route::get('/projects/{project}/workspace', 'getWorkspaceForProject')->name('projects.workspace');
	});
	Route::controller(TaskController::class)->group(function () {
		Route::get('/tasks/{task}', 'get')->name('tasks.get');
		Route::get('/tasks/{task}/project', 'getProjectForTask')->name('tasks.project');
		Route::get('/tasks/{task}/workspace', 'getWorkspaceForTask')->name('tasks.workspace');
		Route::get('/tasks/{task}/comments', 'getCommentsForTask')->name('tasks.comments');
	});
	Route::controller(TeamController::class)->group(function () {
		Route::get('/teams/{team}/members', 'getMembersForTeam')->name('teams.members');
		Route::get('/teams/{team}/workspace', 'getWorkspaceForTeam')->name('teams.workspace');
	});
	Route::controller(CommentController::class)->group(function () {
		Route::get('/comments/{comment}/task', 'getTaskForComment')->name('comments.tasks');
		Route::get('/comments/{comment}/author', 'getAuthorForComment')->name('comments.author');
	});
	Route::controller(NotificationController::class)->group(function () {
		Route::get('/notifications/{notification}/sender', 'getSenderForNotification')->name('notifications.sender');
		Route::get('/notifications/{notification}/receiver', 'getReceiverForNotification')->name('notifications.receiver');
	});
	Route::controller(ChatController::class)->group(function () {
		Route::get('/chats/{chat}/messages', 'getAllMessagesForChat')->name('chats.messages');
		Route::get('/chats/{chat}/users', 'getAllUsersForChat')->name('chats.messages');
		Route::get('/chats/{chat}/last-message', 'getAllLastMessageForChat')->name('chats.messages');
	});
	Route::controller(MessageController::class)->group(function () {
		Route::get('/messages/{message}/sender', 'getSenderForMessage')->name('message.sender');
		Route::get('/messages/{message}/receiver', 'getReceiverForMessage')->name('message.receiver');
		Route::get('/messages/{message}/sender', 'getChatForMessage')->name('message.chat');
	});
	Route::controller(EventController::class)->group(function () {
		Route::get('/events/{event}', 'getSingleEvent')->name('message.sender');
		Route::get('/messages/{message}/receiver', 'getReceiverForMessage')->name('message.receiver');
		Route::get('/messages/{message}/sender', 'getChatForMessage')->name('message.chat');
	});

	Route::controller(CalendarController::class)->group(function () {
		Route::post('/calendar', 'GetAllEventsAndDeadlinesForMonth')->name('calendar.all_events');
	});
});
