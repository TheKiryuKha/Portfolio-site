<?php

declare(strict_types=1);

use App\Http\Controllers\Api\ProjectController;
use Illuminate\Support\Facades\Route;

Route::prefix('api')->as('api:')->group(function () {
    Route::prefix('projects')
        ->as('projects:')
        ->controller(ProjectController::class)
        ->group(
            base_path('routes/api/projects.php')
        );
});
