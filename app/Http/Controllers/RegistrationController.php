<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use App\Mail\ConfirmationEmail;
use Illuminate\Support\Facades\Mail;

class RegistrationController extends Controller
{
	public function store(RegisterRequest $request)
	{
		$attributes = $request->validated();
		$user = new User();
		$user->username = $attributes['username'];
		$user->email = $attributes['email'];
		$user->password = bcrypt($attributes['password']);
		$user->confirmation_token = Str::random(32);
		$user->confirmed = false;
		$user->save();
		Mail::to($user->email)->send(new ConfirmationEmail($user));
		return redirect()->route('email-sent');
	}

	public function confirm($token)
	{
		$user = User::where('confirmation_token', $token)->firstOrFail();
		$user->update([
			'confirmation_token' => null,
			'confirmed'          => true,
		]);
		$user->save();

		return redirect()->route('home')->with('success', 'Account confirmed successfully. Welcome!');
	}

	public function sentEmail(User $user)
	{
		return view('registration.confirm', );
	}
}
