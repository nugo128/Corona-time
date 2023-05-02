<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\ResetPasswordController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/register', [RegistrationController::class, 'index'])->name('register');

Route::post('/register', [RegistrationController::class, 'store'])->name('register');
Route::get('/confirmation', [RegistrationController::class, 'show'])->name('conf-mail');
Route::get('/confirm', [RegistrationController::class, 'sentEmail'])->name('email-sent');
Route::get('/confirm/{token}', [RegistrationController::class, 'confirm'])->name('confirm');
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login-post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('/password/email-sent', [ForgotPasswordController::class, 'send'])->name('send');

Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');
Route::get('/password/changed', [ResetPasswordController::class, 'change'])->name('changed');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/dashboard-by-country', [DashboardController::class, 'country'])->name('dashboard-by-c');

Route::get('locale/{locale}', [LocaleController::class, 'setLocale'])->name('setLocale');
