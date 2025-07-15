<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;

Route::as('web:')->group(function () {

    /**
     * Auth
     */
    Route::prefix('auth')->as('auth:')->group(
        base_path('routes/web/auth.php')
    );

    Route::get('/', function () {
        request()->user();
    });

});
