<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLoginRequest extends FormRequest
{
	public function rules(): array
	{
		return [
			'email'    => 'required|email',
			'password' => 'required|min:6|max:16',
		];
	}
}
