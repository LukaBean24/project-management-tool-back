<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRegisterRequest extends FormRequest
{
	public function rules()
	{
		return [
			'name'         => 'required|min:2|max:20',
			'last_name'    => 'required|min:4|max:30',
			'email'        => 'required|email|unique:users,email',
			'password'     => 'required|confirmed|min:8|max:16',
		];
	}
}
