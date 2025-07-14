<?php

declare(strict_types=1);

use App\Enums\SkillStatus;
use App\Models\Skill;
use App\Models\User;

test('can create new Skill', function () {
    $user = User::factory()->create();
    $skill = [
        'description' => 'desc',
        'source' => 'github',
    ];

    $this->actingAs($user)
        ->post(route('api:skills:store'), $skill)
        ->assertStatus(201);

    expect(Skill::count())->toBe(1)
        ->and(Skill::first())
        ->description->toBe($skill['description'])
        ->source->toBe($skill['source'])
        ->status->toBe(SkillStatus::Draft);
});
