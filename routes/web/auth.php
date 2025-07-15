<?php

declare(strict_types=1);

use App\Http\Controllers\AuthController;

Route::get('/login', function () {
    return view('auth.login');
})->middleware('guest')->name('login-form');

Route::post('/login', [AuthController::class, 'createLink'])->name('login');
