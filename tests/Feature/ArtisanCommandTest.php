<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class ArtisanCommandTest extends TestCase
{
	/**
	 * A basic feature test example.
	 */

	/** @test */
	public function it_can_fetch_data_and_store_it_in_the_database()
	{
		Http::fake([
			'https://devtest.ge/countries' => Http::response([
				[
					'name' => 'Country A',
					'code' => 'A',
				],
				[
					'name' => 'Country B',
					'code' => 'B',
				],
			]),
			'https://devtest.ge/get-country-statistics' => Http::response([
				'confirmed' => 100,
				'recovered' => 50,
				'deaths'    => 10,
			]),
		]);

		$this->artisan('renew-data')->assertExitCode(0);

		$this->assertDatabaseCount('statistics', 2);

		$this->assertDatabaseHas('statistics', [
			'location->en' => 'Country A',
			'new_cases'    => 100,
			'recovered'    => 50,
			'deaths'       => 10,
		]);

		$this->assertDatabaseHas('statistics', [
			'location->en' => 'Country B',
			'new_cases'    => 100,
			'recovered'    => 50,
			'deaths'       => 10,
		]);
	}
}
