<?php

use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\Auth\PasswordResetLinkController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\ImageController;
use App\Http\Controllers\Admin\TourController;

Route::prefix('administrator')->name('admin.')->group(function () {

    Route::middleware(['admin:admin'])->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('home');

        Route::resource('countries', CountryController::class);

        Route::resource('tours', TourController::class);
    });

    Route::get('/login', [AuthenticatedSessionController::class, 'create'])
        ->middleware('guest')
        ->name('login');

    Route::post('/login', [AuthenticatedSessionController::class, 'store'])
        ->middleware('guest');

    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
        ->middleware(['admin:admin'])
        ->name('logout');

    Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])
        ->middleware('guest:admin')
        ->name('password.request');

    Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])
        ->middleware('guest:admin')
        ->name('password.email');
});
