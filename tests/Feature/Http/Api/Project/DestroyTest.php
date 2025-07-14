<?php

declare(strict_types=1);

use App\Models\Project;
use App\Models\User;

test('can delete project', function () {
    $project = Project::factory()->create();
    $user = User::factory()->create();

    $this->actingAs($user)
        ->delete(route('api:projects:destroy', $project))
        ->assertStatus(204);

    expect(Project::count())->toBe(0);
});
