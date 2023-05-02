<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class SetLocaleMiddleware
{
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
	 */
	public function handle(Request $request, Closure $next)
	{
		if (session()->has('locale')) {
			$locale = session('locale');
			if (in_array($locale, ['en', 'ka'])) {
				App::setLocale($locale);
			}
		}
		return $next($request);
	}
}
