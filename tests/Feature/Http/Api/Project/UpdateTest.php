<?php

declare(strict_types=1);

use App\Models\Project;
use App\Models\User;

test('can update projetc', function () {
    $project = Project::factory()->create();
    $user = User::factory()->create();
    $project_data = [
        'title' => 'test',
        'description' => 'Lorem, ipsum dolor sit amet consectetur adipisicing.',
        'link' => 'https://github.com',
    ];

    $this->actingAs($user)
        ->patch(route('api:projects:update', $project), $project_data)
        ->assertStatus(200);

    expect(Project::count())->toBe(1)
        ->and($project->refresh())
        ->title->toBe($project_data['title'])
        ->description->toBe($project_data['description'])
        ->link->toBe($project_data['link']);
});
