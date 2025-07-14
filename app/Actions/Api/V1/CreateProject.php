<?php

declare(strict_types=1);

namespace App\Actions\Api\V1;

use App\Models\Project;

final readonly class CreateProject
{
    /**
     * Execute's the action
     *
     * @param  array<string, mixed>  $attr
     */
    public function handle(array $attr): Project
    {
        return Project::create($attr);
    }
}
