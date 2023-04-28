<?php

namespace App\Http\Controllers;

use App\Models\Statistics;
use Illuminate\Support\Facades\Http;

class DashboardController extends Controller
{
	public function index()
	{
		return view('dashboard.index');
	}

public function getDataFromApi()
{
	$response = Http::get('https://devtest.ge/countries');
	$data = $response->json();
	$data2 = [];
	foreach ($data as $item) {
		$response2 = Http::post('https://devtest.ge/get-country-statistics', [
			'code' => $item['code'],
		]);
		$data2[] = $response2->json();
	}
	return $data2;
}

	public function saveDataToDatabase()
	{
		$data = $this->getDataFromApi();
		foreach ($data as $item) {
			$statistics = new Statistics();
			$statistics->location = $item['country'];
			$statistics->new_cases = $item['confirmed'];
			$statistics->recovered = $item['recovered'];
			$statistics->deaths = $item['deaths'];
			$statistics->save();
		}
	}
}
