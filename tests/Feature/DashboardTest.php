<?php

namespace Tests\Feature;

use App\Models\Statistics;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DashboardTest extends TestCase
{
	use RefreshDatabase;

	/** @test */
	public function it_displays_dashboard()
	{
		$user = User::factory()->create();
		$this->actingAs($user);
		$statistics = Statistics::factory()->create();


		$response = $this->get(route('dashboard'));


		$response->assertSuccessful();
		$response->assertViewHas('recovered', $statistics->recovered);
		$response->assertViewHas('deaths', $statistics->deaths);
		$response->assertViewHas('newCases', $statistics->new_cases);
		$response->assertViewIs('dashboard.index');
	}

	/** @test */
	public function it_displays_dashboard_by_country()
	{
		$user = User::factory()->create();
		$this->actingAs($user);
		$statistics = Statistics::factory()->create();

		$response = $this->get(route('dashboard-by-c'));


		$response->assertSuccessful();
		$response->assertViewHas('statistics');
		$response->assertViewHas('recovered', $statistics->recovered);
		$response->assertViewHas('deaths', $statistics->deaths);
		$response->assertViewHas('newCases', $statistics->new_cases);
		$response->assertViewIs('dashboard.dashboard-by-country');
	}

	public function testCountrySortByLocationAsc()
	{
		$user = User::factory()->create();
		$this->actingAs($user);
		$statistics = [
			Statistics::factory()->create(['location' => 'eligendi']),
			Statistics::factory()->create(['location' => 'dolor']),
			Statistics::factory()->create(['location' => 'sit']),
			Statistics::factory()->create(['location' => 'amet']),
		];
		$response = $this->get(route('dashboard-by-c', ['sort' => 'location_asc']));
		$response->assertStatus(200);
		$response->assertSeeInOrder([
			'amet',
			'dolor',
			'eligendi',
			'sit',
		]);

		$response = $this->get(route('dashboard-by-c', ['sort' => 'location_desc']));
		$response->assertStatus(200);
		$response->assertSeeInOrder([
			'sit',
			'eligendi',
			'dolor',
			'amet',
		]);
	}

	public function testSearchStatistics()
	{
		$user = User::factory()->create();
		$this->actingAs($user);
		$statistics = [
			Statistics::factory()->create(['location' => 'eligendi']),
			Statistics::factory()->create(['location' => 'dolor']),
			Statistics::factory()->create(['location' => 'sit']),
			Statistics::factory()->create(['location' => 'amet']),
		];
		$search = $statistics[1]->location;
		$response = $this->get('/dashboard-by-country?search=' . $search);
		$response->assertStatus(200);
		$response->assertSee($statistics[1]->location);
		$response->assertDontSee($statistics[0]->location);
		$response->assertDontSee($statistics[2]->location);
		$response->assertDontSee($statistics[3]->location);
	}
}
