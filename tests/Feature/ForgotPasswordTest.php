<?php

namespace Tests\Feature;

use App\Http\Controllers\ForgotPasswordController;
use App\Mail\ResetPasswordEmail;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class ForgotPasswordTest extends TestCase
{
	use WithFaker;

	use RefreshDatabase;

	public function testShowLinkRequestForm()
	{
		$response = $this->get(route('password.request'));

		$response->assertStatus(200);
		$response->assertViewIs('password.email');
	}

	public function testSendResetLinkEmailWithInvalidEmail()
	{
		Mail::fake();

		$request = ['email' => 'test@test.com'];

		$response = $this->post(route('password.email'), $request);

		$response->assertSessionHasErrors('email');
		Mail::assertNothingSent();
	}

	public function testSendResetLinkEmailWithNonExistingEmail()
	{
		Mail::fake();

		$request = ['email' => $this->faker->unique()->safeEmail];

		$response = $this->post(route('password.email'), $request);
		$response->assertSessionHasErrors('email');
		Mail::assertNothingSent();
	}

	public function testSendResetLinkEmailWithExistingEmail()
	{
		Mail::fake();
		$user = User::factory()->create();
		$request = ['email' => $user->email];

		$response = $this->post(route('password.email'), $request);

		$response->assertRedirect(route('send'));
		Mail::assertSent(ResetPasswordEmail::class, function ($mail) use ($user) {
			return $mail->hasTo($user->email);
		});
		$this->assertDatabaseHas('users', [
			'id'    => $user->id,
		]);
	}

	public function testSendResetLinkResponse()
	{
		$controller = new class extends ForgotPasswordController {
			public function callSendResetLinkResponse($response)
			{
				return $this->sendResetLinkResponse($response);
			}
		};

		$response = $controller->callSendResetLinkResponse('password.sent');

		$this->assertNotNull($response);
		$this->assertInstanceOf(\Illuminate\Http\RedirectResponse::class, $response);
		$this->assertTrue(session()->has('status'));
		$this->assertEquals('password.sent', session('status'));
	}

	public function testUserCanSeeSentPage()
	{
		$response = $this->get(route('send'));

		$response->assertStatus(200);
		$response->assertViewIs('password.email-sent');
	}
}
