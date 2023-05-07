<?php

namespace App\Http\Controllers;

use App\Http\Requests\ForgotPasswordRequest;
use App\Mail\ResetPasswordEmail;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{
	public function sendResetLinkEmail(ForgotPasswordRequest $request)
	{
		$email = $request->validated()['email'];
		$user = User::where('email', $email)->first();
		$token = Str::random(60);

		$user->reset_token = $token;
		$user->save();

		$resetUrl = url('password/reset', $token);

		Mail::to($email)->send(new ResetPasswordEmail($resetUrl));

		return redirect()->route('send');
	}

	protected function sendResetLinkResponse($response)
	{
		return back()->with('status', trans($response));
	}
}
