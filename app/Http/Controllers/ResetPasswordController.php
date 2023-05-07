<?php

namespace App\Http\Controllers;

use App\Http\Requests\ResetPasswordRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ResetPasswordController extends Controller
{
	public function showResetForm(Request $request, $token)
	{
		return view('password.reset-form')->with(
			['token' => $token, 'email' => $request->email]
		);
	}

	public function reset(ResetPasswordRequest $request)
	{
		$attributes = $request->validated();

		$user = User::where('reset_token', $attributes['token'])->first();

		$user->password = Hash::make($attributes['password']);
		$user->reset_token = '';
		$user->save();

		return redirect()->route('changed');
	}
}
