<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Mail\ConfirmationEmail;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class RegisterTest extends TestCase
{
	/**
	 * A basic feature test example.
	 */
	public function test_register_page_is_accessible(): void
	{
		$response = $this->get('/register');
		$response->assertSuccessful();
		$response->assertViewIs('registration.index');
	}

	public function test_inputs_blank(): void
	{
		$response = $this->post('/register');
		$response->assertSessionHasErrors(['username', 'email', 'password', 'password_confirmation']);
	}

	public function test_username_blank(): void
	{
		$response = $this->post('/register', ['email'=>'email@email.com', 'password'=>'password', 'password_confirmation'=>'password']);
		$response->assertSessionHasErrors(['username']);
		$response->assertSessionDoesntHaveErrors(['email']);
		$response->assertSessionDoesntHaveErrors(['password']);
		$response->assertSessionDoesntHaveErrors(['password_confirmation']);
	}

	public function test_email_blank(): void
	{
		$response = $this->post('/register', ['username'=>'nugo', 'password'=>'password', 'password_confirmation'=>'password']);
		$response->assertSessionHasErrors(['email']);
		$response->assertSessionDoesntHaveErrors(['username']);
		$response->assertSessionDoesntHaveErrors(['password']);
		$response->assertSessionDoesntHaveErrors(['password_confirmation']);
	}

	public function test_password_blank(): void
	{
		$response = $this->post('/register', ['username'=>'nugo', 'email'=>'email@email.com', 'password_confirmation'=>'password']);
		$response->assertSessionHasErrors(['password']);
		$response->assertSessionDoesntHaveErrors(['username']);
		$response->assertSessionDoesntHaveErrors(['email']);
		$response->assertSessionDoesntHaveErrors(['password_confirmation']);
	}

	public function test_store_to_database_and_send_email()
	{
		$data = [
			'username'              => 'johndoe',
			'email'                 => 'johndoe@example.com',
			'password'              => 'password123',
			'password_confirmation' => 'password123',
		];

		Mail::fake();

		$response = $this->post('/register', $data);

		$this->assertDatabaseHas('users', [
			'username' => 'johndoe',
			'email'    => 'johndoe@example.com',
		]);

		$this->assertFalse(session('confirmed'));
		Mail::assertSent(ConfirmationEmail::class, function ($mail) use ($data) {
			return $mail->hasTo('johndoe@example.com') &&
				$mail->user->username === 'johndoe' &&
				$mail->user->email === 'johndoe@example.com';
		});

		$response->assertRedirect(route('email-sent'));
	}

	public function test_confirm_email_and_delete_confirmation_token()
	{
		$user = User::factory()->create([
			'confirmation_token' => Str::random(32),
			'confirmed'          => false,
		]);

		$token = $user->confirmation_token;

		$response = $this->get(route('confirm', ['token' => $token]));
		$user->confirmed = true;

		$this->assertTrue($user->confirmed);

		$this->assertTrue(session('confirmed'));

		$response->assertRedirect(route('email-sent'));
	}

	public function test_confirmed_registration_page_is_accessible(): void
	{
		$response = $this->get('/confirm');
		$response->assertSuccessful();
		$response->assertViewIs('registration.confirm');
	}
}
