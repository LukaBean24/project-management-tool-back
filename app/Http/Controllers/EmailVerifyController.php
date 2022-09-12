<?php

namespace App\Http\Controllers;

use App\Models\User;

class EmailVerifyController extends Controller
{
	public function verify(User $user)
	{
		$user->email_verified_at = now();
		$user->save();

		return redirect(env('FRONTEND_URL') . 'login');
	}
}
