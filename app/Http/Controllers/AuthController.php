<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLoginRequest;
use App\Http\Requests\StoreRegisterRequest;
use App\Mail\VerifyEmail;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
	public function register(StoreRegisterRequest $request): JsonResponse
	{
		$user = User::create([
			'name'      => $request->name,
			'last_name' => $request->last_name,
			'email'     => $request->email,
			'password'  => bcrypt($request->password),
		]);

		Mail::to($request->email)->send(new VerifyEmail('http://localhost:8000/api/verify-email/' . $user->id, $user));

		return response()->json($user, 201);
	}

	public function login(StoreLoginRequest $request): JsonResponse
	{
		if (!$token = auth()->attempt($request->validated()))
		{
			return response()->json(['error' => 'User cant be found'], 401);
		}

		return $this->respondWithToken($token);
	}

	public function user(): JsonResponse
	{
		return response()->json(auth()->user());
	}

	public function logout(): JsonResponse
	{
		auth()->logout();

		return response()->json(['message' => 'Successfully logged out']);
	}

	public function refresh(): JsonResponse
	{
		return $this->respondWithToken(auth()->refresh());
	}

	protected function respondWithToken($token): JsonResponse
	{
		return response()->json([
			'access_token' => $token,
			'token_type'   => 'bearer',
			'expires_in'   => auth()->factory()->getTTL() * 60,
		]);
	}
}
