<?php

declare(strict_types=1);

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\VerifyController;

Route::get('/', [VerifyController::class, 'create'])
    ->name('verify:create');

Route::post('/', [VerifyController::class, 'store'])
    ->name('verify:store');

Route::get('/verify', [LoginController::class, 'create'])->name('create');

Route::get('/{token}', [LoginController::class, 'store'])
    ->name('store');
