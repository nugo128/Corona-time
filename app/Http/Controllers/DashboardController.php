<?php

namespace App\Http\Controllers;

use App\Models\Statistics;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class DashboardController extends Controller
{
	public function index()
	{
		$recovered = DB::table('statistics')->sum('recovered');
		$deaths = DB::table('statistics')->sum('deaths');
		$newCases = DB::table('statistics')->sum('new_cases');
		return view('dashboard.index', compact('recovered', 'deaths', 'newCases'));
	}

	public function country()
	{
		$statistics = Statistics::all();
		return view('dashboard.dashboard-by-country', compact('statistics'));
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
