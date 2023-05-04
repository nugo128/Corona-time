<?php

namespace App\Http\Controllers;

use App\Mail\ResetPasswordEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{
	public function showLinkRequestForm()
	{
		return view('password.email');
	}

	public function send()
	{
		return view('password.email-sent');
	}

	public function sendResetLinkEmail(Request $request)
	{
		$this->validateEmail($request);

		$user = User::where('email', $request->email)->first();

		if (!$user) {
			return back()->withErrors(['email' => trans('passwords.user')]);
		}

		$token = Str::random(60);

		$user->reset_token = $token;
		$user->save();

		$resetUrl = url('password/reset', $token);

		Mail::to($user->email)->send(new ResetPasswordEmail($resetUrl));

		return redirect()->route('send');
	}

	protected function sendResetLinkResponse($response)
	{
		return back()->with('status', trans($response));
	}

protected function validateEmail(Request $request)
{
	$request->validate(['email' => 'required|email']);
}
}
