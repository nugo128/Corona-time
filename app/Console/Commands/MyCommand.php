<?php

namespace App\Console\Commands;

use App\Models\Statistics;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class MyCommand extends Command
{
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'app:my-command';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Command description';

	/**
	 * Execute the console command.
	 */
	public function handle()
	{
		$response = Http::get('https://devtest.ge/countries');
		$data = $response->json();
		DB::table('statistics')->truncate();

		foreach ($data as $item) {
			$response2 = Http::post('https://devtest.ge/get-country-statistics', [
				'code' => $item['code'],
			]);
			$statistics = new Statistics();
			$statistics->location = $item['name'];
			$statistics->new_cases = $response2->json()['confirmed'];
			$statistics->recovered = $response2->json()['recovered'];
			$statistics->deaths = $response2->json()['deaths'];
			$statistics->save();
		}
	}
}
