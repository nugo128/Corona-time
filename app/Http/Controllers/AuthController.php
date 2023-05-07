<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;

class AuthController extends Controller
{
	public function login(LoginRequest $request)
	{
		$attributes = $request->validated();
		$fieldType = filter_var($attributes['user'], FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
		if (auth()->attempt([$fieldType => $attributes['user'], 'password' => $attributes['password']], request()->get('remember'))) {
			request()->session()->regenerate();
			return redirect()->route('dashboard');
		}

		return back()->withErrors([
			'login' => 'Invalid credentials',
		]);
	}

	public function logout()
	{
		auth()->logout();
		return redirect()->route('login');
	}
}
