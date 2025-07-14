<?php

declare(strict_types=1);

use App\Enums\SkillStatus;
use App\Models\Skill;
use App\Models\User;

test('can publish and unpublish skill', function () {
    $user = User::factory()->create();
    $skill = Skill::factory()->create([
        'status' => SkillStatus::Draft,
    ]);

    $this->actingAs($user)
        ->patch(route('api:skills:update', $skill), [
            'status' => SkillStatus::Published->value,
        ])
        ->assertStatus(200);

    expect($skill->refresh()->status)->toBe(SkillStatus::Published);

    $this->actingAs($user)
        ->patch(route('api:skills:update', $skill), [
            'status' => SkillStatus::Draft->value,
        ])
        ->assertStatus(200);

    expect($skill->refresh()->status)->toBe(SkillStatus::Draft);
});
