<?php

declare(strict_types=1);

use App\Http\Controllers\AuthController;

Route::get('/login', function () {
    return view('auth.login');
})->middleware('guest')->name('login-form');

Route::post('/login', [AuthController::class, 'createLink'])->name('login');

Route::get('/email-sent', function () {
    return view('auth.email-sent');
})->name('email-sent');

Route::get('/login-verify/{token}', [AuthController::class, 'verified'])
    ->name('verified');
