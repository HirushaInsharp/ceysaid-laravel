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

// Route::get('/', [HomeController::class, 'index']);
Route::get('/', [CountryController::class, 'view']);
// Route::get('countries', [HomeController::class, 'showCountries']);
// //Route::get('country/{country_slug}/tours', [HomeController::class, 'showTours']);
// Route::get('tours', [HomeController::class, 'showTours']);
// //Route::get('country/{country_slug}/tour/{tour_slug}', [HomeController::class, 'showTour']);
// Route::get('tour', [HomeController::class, 'showTour']);

Route::get('/contries', [CountryController::class, 'view'])->name('contries');
Route::get('country/{country_slug}/tours', [TourController::class, 'view'])->name('tours');
Route::get('country/{country_slug}/tours/{tour_slug}', [TourController::class, 'viewSingleTour'])->name('tour');
Route::get('data-table', function () {
    return view('welcome');
});
require __DIR__.'/auth.php';

require __DIR__.'/admin.php';
