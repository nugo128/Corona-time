<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\ResetPasswordController;
use Illuminate\Support\Facades\Route;

Route::get('locale/{locale}', [LocaleController::class, 'setLocale'])->name('setLocale');
Route::redirect('/', 'login');

Route::middleware('auth')->group(
	function () {
		Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
		Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
		Route::get('/dashboard-by-country', [DashboardController::class, 'country'])->name('dashboard-by-c');
	}
);
Route::middleware('guest')->group(
	function () {
		Route::prefix('register')->group(function () {
			Route::view('/', 'registration.index')->name('register');
			Route::post('/', [RegistrationController::class, 'store'])->name('register');
		});

		Route::prefix('confirm')->group(function () {
			Route::view('/', 'registration.confirm')->name('email-sent');
			Route::get('/{token}', [RegistrationController::class, 'confirm'])->name('confirm');
		});
		Route::get('/confirmation', [RegistrationController::class, 'show'])->name('conf-mail');

		Route::prefix('password')->group(function () {
			Route::view('/reset', 'password.email')->name('password.request');
			Route::post('/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
			Route::view('/email-sent', 'password.email-sent')->name('send');
			Route::get('/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
			Route::post('/reset', [ResetPasswordController::class, 'reset'])->name('password.update');
			Route::view('/changed', 'password.password-changed')->name('changed');
		});

		Route::prefix('login')->group(function () {
			Route::view('/', 'login.index')->name('login');
			Route::post('/', [AuthController::class, 'login'])->name('login-post');
		});
	}
);
