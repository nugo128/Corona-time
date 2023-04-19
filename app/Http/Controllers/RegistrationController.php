<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;

class RegistrationController extends Controller
{
	public function create(RegisterRequest $request)
	{
		$attributes = $request->validated();
		$user = new User();
		$user->username = $attributes['username'];
		$user->email = $attributes['email'];
		$user->password = bcrypt($attributes['password']);
		$user->save();
		return redirect('/');
	}
}
