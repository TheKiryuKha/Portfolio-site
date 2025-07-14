<?php

declare(strict_types=1);

namespace App\Actions\Api;

use App\Models\Project;

final class DeleteProject
{
    /**
     * Execute's the action
     */
    public function handle(Project $project): void
    {
        $project->delete();
    }
}
