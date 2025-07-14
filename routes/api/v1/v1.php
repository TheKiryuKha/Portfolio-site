<?php

declare(strict_types=1);

use App\Http\Controllers\Api\V1\ProjectController;

Route::prefix('projects')
    ->as('projects:')
    ->controller(ProjectController::class)
    ->group(
        base_path('routes/api/v1/projects.php')
    );
