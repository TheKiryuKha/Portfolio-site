<?php

declare(strict_types=1);

use App\Models\Project;
use App\Models\User;

// TODO authorization
it('returns the correct status code if unauthenticated', function () {
    $this->getJson(
        route('api:projects:store')
    )->assertStatus(401);
})->skip();

it('can creates project', function () {
    $project = [
        'title' => 'test',
        'description' => 'Lorem, ipsum dolor sit amet consectetur adipisicing.',
        'link' => 'https://github.com',
    ];
    $user = User::factory()->create();

    $this->actingAs($user)
        ->post(route('api:projects:store', $project))
        ->assertStatus(201);

    expect(Project::count())->toBe(1)
        ->and(Project::first())
        ->title->toBe($project['title'])
        ->description->toBe($project['description'])
        ->link->toBe($project['link']);
});
