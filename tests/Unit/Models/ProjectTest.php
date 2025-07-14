<?php

declare(strict_types=1);

use App\Models\Project;

test('to array', function () {
    $project = Project::factory()->create()->fresh();

    expect(array_keys($project->toArray()))->toBe([
        'id',
        'title',
        'description',
        'link',
        'created_at',
        'updated_at',
    ]);
});
