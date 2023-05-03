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
		$location = explode(' ', $faker_ka->word());
		return [
			'location'=> [
				'en' => $this->faker->word(),
				'ka' => $location,
			],
			'new_cases' => $this->faker->randomNumber(5, false),
			'deaths'    => $this->faker->randomNumber(5, false),
			'recovered' => $this->faker->randomNumber(5, false),
		];
	}
}
