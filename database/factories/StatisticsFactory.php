<?php

namespace Database\Factories;

use Faker\Factory as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class StatisticsFactory extends Factory
{
	/**
	 * Define the model's default state.
	 *
	 * @return array<string, mixed>
	 */
	public function definition(): array
	{
		$faker_ka = Faker::create('ka_GE');
		$location = explode(' ', $faker_ka->country());
		return [
			'location'=> [
				'en' => $this->faker->country(),
				'ka' => $location[0],
			],
			'new_cases' => $this->faker->randomNumber(4, false),
			'deaths'    => $this->faker->randomNumber(4, false),
			'recovered' => $this->faker->randomNumber(4, false),
		];
	}
}
