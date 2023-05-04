<?php

namespace App\Http\Controllers;

use App\Models\Statistics;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\App;

class DashboardController extends Controller
{
	public function index()
	{
		$recovered = DB::table('statistics')->sum('recovered');
		$deaths = DB::table('statistics')->sum('deaths');
		$newCases = DB::table('statistics')->sum('new_cases');
		return view('dashboard.index', compact('recovered', 'deaths', 'newCases'));
	}

	public function country(Request $request)
	{
		$recovered = DB::table('statistics')->sum('recovered');
		$deaths = DB::table('statistics')->sum('deaths');
		$newCases = DB::table('statistics')->sum('new_cases');

		$sort = $request->query('sort', 'location_asc');
		$search = $request->query('search');

		if (strpos($sort, '_asc') !== false) {
			$column = str_replace('_asc', '', $sort);
			$direction = 'asc';
		} else {
			$column = str_replace('_desc', '', $sort);
			$direction = 'desc';
		}
		$query = DB::table('statistics');
		if ($search) {
			$query->where('location->en', 'like', '%' . $search . '%')
				->orWhere('location->ka', 'like', '%' . $search . '%')
				  ->orWhere('new_cases', 'like', '%' . $search . '%')
				  ->orWhere('deaths', 'like', '%' . $search . '%')
				  ->orWhere('recovered', 'like', '%' . $search . '%');
		}
		$locale = App::getLocale();
		if ($column == 'location') {
			$query->orderByRaw("CAST(JSON_EXTRACT(`location`, '$.\"$locale\"') AS CHAR) $direction");
		} else {
			$query->orderBy($column, $direction);
		}

		$statistics = $query->get();
		$statistics = $statistics->map(function ($item) use ($locale) {
			$translations = json_decode($item->location, true);
			$item->location = $translations[$locale] ?? $item->location;
			return $item;
		});
		return view('dashboard.dashboard-by-country', compact('statistics', 'sort', 'direction', 'recovered', 'deaths', 'newCases', 'search'));
	}

	public function saveDataToDatabase()
	{
		$response = Http::get('https://devtest.ge/countries');
		$data = $response->json();

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
