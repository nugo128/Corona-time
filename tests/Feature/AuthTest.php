<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthTest extends TestCase
{
	use RefreshDatabase;

	public function test_login_page_is_accessible(): void
	{
		$response = $this->get('/login');
		$response->assertSuccessful();
		$response->assertViewIs('login.index');
	}

	public function test_inputs_blank(): void
	{
		$response = $this->post('/login');
		$response->assertSessionHasErrors(['user', 'password']);
	}

	public function test_user_blank(): void
	{
		$response = $this->post('/login', ['password'=>'password']);
		$response->assertSessionHasErrors(['user']);
		$response->assertSessionDoesntHaveErrors(['password']);
	}

	public function test_password_blank(): void
	{
		$response = $this->post('/login', ['user'=>'nugo']);
		$response->assertSessionHasErrors(['password']);
		$response->assertSessionDoesntHaveErrors(['user']);
	}

	public function test_user_not_correct(): void
	{
		$response = $this->post('/login', ['user'=>'rame', 'password'=>'123']);
		$response->assertSessionHasErrors(['login']);
	}

	public function test_successfull_login(): void
	{
		$username = 'nugo';
		$pass = '1234';
		$user = User::factory()->create(['username'=>$username, 'password'=>bcrypt($pass)]);
		$response = $this->post('/login', ['user'=>$username, 'password'=>$pass]);
		$response->assertRedirect('/dashboard');
	}

	public function test_user_can_logout(): void
	{
		$username = 'nugo';
		$pass = '1234';
		$user = User::factory()->create(['username'=>$username, 'password'=>bcrypt($pass)]);
		$this->actingAs($user);
		$response = $this->post('/logout');
		$response->assertRedirect('/login');
		$this->assertGuest();
	}

	public function test_auth_middleware()
	{
		$username = 'nugo';
		$pass = '1234';
		$user = User::factory()->create(['username'=>$username, 'password'=>bcrypt($pass)]);
		$response = $this->post('/login', ['user'=>$username, 'password'=>$pass]);
		$this->actingAs($user);
		$response = $this->get('/dashboard');
		$response->assertOk();
	}
}
