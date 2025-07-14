<?php

declare(strict_types=1);

namespace App\Actions\Api;

use App\Models\Project;

final class EditProject
{
    /**
     * Execute's the action
     *
     * @param  array<string, mixed>  $attributes
     */
    public function handle(Project $project, array $attributes): Project
    {
        $project->update($attributes);

        return $project;
    }
}
