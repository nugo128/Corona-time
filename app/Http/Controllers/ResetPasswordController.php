<?php

namespace App\Http\Controllers;

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

	public function reset(Request $request)
	{
		$request->validate([
			'token'    => 'required',
			'password' => 'required|min:3|confirmed',
		]);

		$user = User::where('reset_token', $request->token)->first();

		if (!$user) {
			return back()->withErrors([
				'email' => ['Invalid reset token or token has expired.'],
			]);
		}

		$user->password = Hash::make($request->password);
		$user->reset_token = '';
		$user->save();

		return redirect()->route('home')->with('status', 'Your password has been reset.');
	}
}
