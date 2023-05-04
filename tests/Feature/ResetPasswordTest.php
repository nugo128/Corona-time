<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class ResetPasswordTest extends TestCase
{
	/**
	 * A basic feature test example.
	 */
	use RefreshDatabase;

	public function testShowResetForm()
	{
		$user = User::factory()->create();
		$response = $this->get(route('password.reset', ['token' => $user->reset_token, 'email' => $user->email]));

		$response->assertSuccessful();
		$response->assertViewIs('password.reset-form');
		$response->assertViewHas(['token' => $user->reset_token, 'email' => $user->email]);
	}

	public function testResetWithInvalidToken()
	{
		$response = $this->post(route('password.update'), [
			'token'                 => 'invalid_token',
			'password'              => 'new_password',
			'password_confirmation' => 'new_password',
		]);

		$response->assertRedirect();
		$response->assertSessionHasErrors(['email' => 'Invalid reset token or token has expired.']);
	}

	public function testResetWithValidToken()
	{
		$user = User::factory()->create(['reset_token' => 'valid_token']);
		$response = $this->post(route('password.update'), [
			'token'                 => 'valid_token',
			'password'              => 'new_password',
			'password_confirmation' => 'new_password',
		]);
		$response->assertRedirect(route('changed'));
		$this->assertTrue(Hash::check('new_password', $user->fresh()->password));
		$this->assertEmpty($user->fresh()->reset_token);
	}

	public function testChange()
	{
		$response = $this->get(route('changed'));

		$response->assertSuccessful();
		$response->assertViewIs('password.password-changed');
	}
}
