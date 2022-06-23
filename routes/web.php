<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\TourController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('about-us', [HomeController::class, 'aboutUs'])->name('about-us');
Route::get('contact-us', [HomeController::class, 'contactUs'])->name('contact-us');

Route::get('countries', [CountryController::class, 'index'])->name('countries');
Route::get('country/{country_slug}', [CountryController::class, 'show'])->name('country');

Route::get('tours', [TourController::class, 'index'])->name('tours');
Route::get('country/{country_slug}/tour/{tour_slug}', [TourController::class, 'show'])->name('tour');

Route::post('subscribe', [HomeController::class, 'subscribe'])->name('subscribe');

Route::post('send-mail', [TourController::class, 'sendEmailTOAdmin'])->name('sendMail');

require __DIR__.'/auth.php';

require __DIR__.'/admin.php';
