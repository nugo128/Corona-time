<?php

namespace Tests\Feature;

use Tests\TestCase;

class LocaleTest extends TestCase
{
	/** @test */
	public function it_sets_the_locale_in_session_and_redirects_back()
	{
		$locale = 'ka';
		$response = $this->get(route('setLocale', $locale));

		$response->assertRedirect();
		$this->assertEquals($locale, session('locale'));
	}
}
