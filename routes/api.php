<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmailVerifyController;
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
	Route::post('register', 'register');
	Route::post('login', 'login');
});

Route::controller(EmailVerifyController::class)->group(function () {
	Route::get('/verify-email/{user}', 'verify');
});

Route::middleware('auth:api')->group(function () {
	Route::controller(AuthController::class)->group(function () {
		Route::post('logout', 'logout');
		Route::post('refresh', 'refresh');
		Route::post('user', 'user');
	});
});
